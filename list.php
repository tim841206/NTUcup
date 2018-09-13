<?php
function translate_grade($grade) {
    if ($grade == 'B1') return '大一';
    elseif ($grade == 'B2') return '大二';
    elseif ($grade == 'B3') return '大三';
    elseif ($grade == 'B4') return '大四';
    elseif ($grade == 'B5') return '大五';
    elseif ($grade == 'B6') return '大六';
    elseif ($grade == 'B7') return '大七';
    elseif ($grade == 'R1') return '碩一';
    elseif ($grade == 'R2') return '碩二';
    elseif ($grade == 'R3') return '碩三';
    elseif ($grade == 'R4') return '碩四';
    elseif ($grade == 'D1') return '博一';
    elseif ($grade == 'D2') return '博二';
    elseif ($grade == 'D3') return '博三';
    elseif ($grade == 'D4') return '博四';
    elseif ($grade == 'D5') return '博五';
    elseif ($grade == 'D6') return '博六';
    elseif ($grade == 'D7') return '博七';
}

function translate_paystat($paystat) {
    if ($paystat == 0) return '未繳費';
    elseif ($paystat == 1) return '已繳費';
}

$mysql = mysqli_connect('localhost', 'root', '');
mysqli_query($mysql, "SET NAMES 'utf8'");
mysqli_select_db($mysql, 'NTUcup');
$queryMS = mysqli_query($mysql, "SELECT * FROM MS");
$numMS = ($queryMS == false) ? 0 : mysqli_num_rows($queryMS);
$queryWS = mysqli_query($mysql, "SELECT * FROM WS");
$numWS = ($queryWS == false) ? 0 : mysqli_num_rows($queryWS);
$queryMD = mysqli_query($mysql, "SELECT * FROM MD");
$numMD = ($queryMD == false) ? 0 : mysqli_num_rows($queryMD);
$queryWD = mysqli_query($mysql, "SELECT * FROM WD");
$numWD = ($queryWD == false) ? 0 : mysqli_num_rows($queryWD);
$queryXD = mysqli_query($mysql, "SELECT * FROM XD");
$numXD = ($queryXD == false) ? 0 : mysqli_num_rows($queryXD);
$queryG = mysqli_query($mysql, "SELECT * FROM G");
$numG = ($queryG == false) ? 0 : mysqli_num_rows($queryG);
?>
    <header>
        <div class="container">
            <h1 class="center">國立臺灣大學台大盃羽球賽報名系統</h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-1 center">
                <h3>查看報名名單</h3><br>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h4 class="panel-title">男單 組數：<?php echo $numMS;?></h4></a>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table border="2" width="100%">
                                    <?php
                                    if ($numMS == 0) {
                                        echo "目前尚無選手報名";
                                    }
                                    else {
                                        echo "<tr><th>編號</th><th>系級</th><th>姓名</th><th>繳費狀態</th></tr>";
                                        while ($result = mysqli_fetch_array($queryMS)) {
                                            echo "<tr><td>".$result['NUM']."</td><td>".$result['MAJOR'].translate_grade($result['GRADE'])."</td><td>".$result['NAME']."</td><td>".translate_paystat($result['PAYSTAT'])."</td></tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><h4 class="panel-title">女單 組數：<?php echo $numWS;?></h4></a>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table border="2" width="100%">
                                    <?php
                                    if ($numWS == 0) {
                                        echo "目前尚無選手報名";
                                    }
                                    else {
                                        echo "<tr><th>編號</th><th>系級</th><th>姓名</th><th>繳費狀態</th></tr>";
                                        while ($result = mysqli_fetch_array($queryWS)){
                                            echo "<tr><td>".$result['NUM']."</td><td>".$result['MAJOR'].translate_grade($result['GRADE'])."</td><td>".$result['NAME']."</td><td>".translate_paystat($result['PAYSTAT'])."</td></tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><h4 class="panel-title">男雙 組數：<?php echo $numMD;?></h4></a>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table border="2" width="100%">
                                    <?php
                                    if ($numMD == 0) {
                                        echo "目前尚無選手報名";
                                    }
                                    else {
                                        echo "<tr><th>編號</th><th>系級</th><th>姓名</th><th>系級</th><th>姓名</th><th>繳費狀態</th></tr>";
                                        while ($result = mysqli_fetch_array($queryMD)){
                                            echo "<tr><td>".$result['NUM']."</td><td>".$result['MAJOR_1'].translate_grade($result['GRADE_1'])."</td><td>".$result['NAME_1']."</td><td>".$result['MAJOR_2'].translate_grade($result['GRADE_2'])."</td><td>".$result['NAME_2']."</td><td>".translate_paystat($result['PAYSTAT'])."</td></tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><h4 class="panel-title">女雙 組數：<?php echo $numWD;?></h4></a>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table border="2" width="100%">
                                    <?php
                                    if ($numWD == 0) {
                                        echo "目前尚無選手報名";
                                    }
                                    else {
                                        echo "<tr><th>編號</th><th>系級</th><th>姓名</th><th>系級</th><th>姓名</th><th>繳費狀態</th></tr>";
                                        while ($result = mysqli_fetch_array($queryWD)){
                                            echo "<tr><td>".$result['NUM']."</td><td>".$result['MAJOR_1'].translate_grade($result['GRADE_1'])."</td><td>".$result['NAME_1']."</td><td>".$result['MAJOR_2'].translate_grade($result['GRADE_2'])."</td><td>".$result['NAME_2']."</td><td>".translate_paystat($result['PAYSTAT'])."</td></tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><h4 class="panel-title">混雙 組數：<?php echo $numXD;?></h4></a>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table border="2" width="100%">
                                    <?php
                                    if ($numXD == 0) {
                                        echo "目前尚無選手報名";
                                    }
                                    else {
                                        echo "<tr><th>編號</th><th>系級</th><th>姓名</th><th>系級</th><th>姓名</th><th>繳費狀態</th></tr>";
                                        while ($result = mysqli_fetch_array($queryXD)){
                                            echo "<tr><td>".$result['NUM']."</td><td>".$result['MAJOR_1'].translate_grade($result['GRADE_1'])."</td><td>".$result['NAME_1']."</td><td>".$result['MAJOR_2'].translate_grade($result['GRADE_2'])."</td><td>".$result['NAME_2']."</td><td>".translate_paystat($result['PAYSTAT'])."</td></tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><h4 class="panel-title">團體 組數：<?php echo $numG;?></h4></a>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table border="2" width="100%">
                                    <?php
                                    if ($numG == 0) {
                                        echo "目前尚無隊伍報名";
                                    }
                                    else {
                                        echo "<tr><th>編號</th><th>隊別</th><th>繳費狀態</th></tr>";
                                        while ($result = mysqli_fetch_array($queryG)){
                                            echo "<tr><td>".$result['NUM']."</td><td>".$result['Gmajor'].$result['Gname']."</td><td>".translate_paystat($result['PAYSTAT'])."</td></tr>";
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 center">
                <h3>查看繳費狀態</h3><br>
                <h4>請輸入學生證號碼或項目及編號</h4>
                <p>學生證號碼：<input type="text" id="id"><button onclick="search1()">查詢</button></p>
                <p>項目：<select id="type">
                        <option value="MS">男單</option>
                        <option value="WS">女單</option>
                        <option value="MD">男雙</option>
                        <option value="WD">女雙</option>
                        <option value="XD">混雙</option>
                        <option value="G">團體</option></select>
                編號：<input type="text" id="num"><button onclick="search2()">查詢</button></p>
                <h4>查詢結果</h4>
                <div class="row">
                    <div class="col-sm-3 center">
                        <h4>項目編號</h4>
                        <p id="num_1"></p>
                        <p id="num_2"></p>
                        <p id="num_3"></p>
                    </div>
                    <div class="col-sm-3 center">
                        <h4>系級</h4>
                        <p id="grade_1"></p>
                        <p id="grade_2"></p>
                        <p id="grade_3"></p>
                    </div>
                    <div class="col-sm-3 center">
                        <h4>姓名</h4>
                        <p id="name_1"></p>
                        <p id="name_2"></p>
                        <p id="name_3"></p>
                    </div>
                    <div class="col-sm-3 center">
                        <h4>繳費狀態</h4>
                        <p id="paystat_1"></p>
                        <p id="paystat_2"></p>
                        <p id="paystat_3"></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="center"><a href="index.php"><button>返回首頁</button></a></div>
    </div>

    <script type="text/javascript">
        function search1() {
            var request = new XMLHttpRequest();
            request.open("POST", "index.php");
            var data = "service=search&id=" + document.getElementById("id").value;
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.send(data);

            request.onreadystatechange = function() {
                if (request.readyState === 4 && request.status === 200) {
                    var data = JSON.parse(request.responseText);
                    if (data.num_1) {
                        document.getElementById("num_1").innerHTML = data.num_1;
                        document.getElementById("grade_1").innerHTML = data.grade_1;
                        document.getElementById("name_1").innerHTML = data.name_1;
                        document.getElementById("paystat_1").innerHTML = data.paystat_1;
                    }
                    if (data.num_2) {
                        document.getElementById("num_2").innerHTML = data.num_2;
                        document.getElementById("grade_2").innerHTML = data.grade_2;
                        document.getElementById("name_2").innerHTML = data.name_2;
                        document.getElementById("paystat_2").innerHTML = data.paystat_2;
                    }
                    if (data.num_3) {
                        document.getElementById("num_3").innerHTML = data.num_3;
                        document.getElementById("grade_3").innerHTML = data.grade_3;
                        document.getElementById("name_3").innerHTML = data.name_3;
                        document.getElementById("paystat_3").innerHTML = data.paystat_3;
                    }
                    if (data.null) {
                        alert("查無資料");
                    }
                }
            }
        }

        function search2() {
            var request = new XMLHttpRequest();
            request.open("POST", "index.php");
            var data = "service=search&type=" + document.getElementById("type").value + "&num=" + document.getElementById("num").value;
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.send(data);

            request.onreadystatechange = function() {
                if (request.readyState === 4 && request.status === 200) {
                    var data = JSON.parse(request.responseText);
                    if (data.num_1) {
                        document.getElementById("num_1").innerHTML = data.num_1;
                        document.getElementById("grade_1").innerHTML = data.grade_1;
                        document.getElementById("name_1").innerHTML = data.name_1;
                        document.getElementById("paystat_1").innerHTML = data.paystat_1;
                    }
                    if (data.num_2) {
                        document.getElementById("num_2").innerHTML = data.num_2;
                        document.getElementById("grade_2").innerHTML = data.grade_2;
                        document.getElementById("name_2").innerHTML = data.name_2;
                        document.getElementById("paystat_2").innerHTML = data.paystat_2;
                    }
                    if (data.null) {
                        alert("查無資料");
                    }
                }
            }
        }
    </script>