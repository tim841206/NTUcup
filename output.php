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
// $fp = fopen('NTUcup_MS.csv', 'w');
// $queryMS = mysqli_query($mysql, "SELECT * FROM MS");
// while($MS = mysqli_fetch_array($queryMS)){
//     $content = $MS['NAME'].','.$MS['MAJOR'].translate_grade($MS['GRADE']);
//     fputcsv($fp, split(',', $content));
// }
// fclose($fp);
// $fp = fopen('NTUcup_WS.csv', 'w');
// $queryWS = mysqli_query($mysql, "SELECT * FROM WS");
// while($WS = mysqli_fetch_array($queryWS)){
//     $content = $WS['NAME'].','.$WS['MAJOR'].translate_grade($WS['GRADE']);
//     fputcsv($fp, split(',', $content));
// }
// fclose($fp);
// $fp = fopen('NTUcup_MD.csv', 'w');
// $queryMD = mysqli_query($mysql, "SELECT * FROM MD");
// while($MD = mysqli_fetch_array($queryMD)){
//     $content = $MD['NAME_1'].','.$MD['MAJOR_1'].translate_grade($MD['GRADE_1']).','.$MD['NAME_2'].','.$MD['MAJOR_2'].translate_grade($MD['GRADE_2']);
//     fputcsv($fp, split(',', $content));
// }
// fclose($fp);
// $fp = fopen('NTUcup_WD.csv', 'w');
// $queryWD = mysqli_query($mysql, "SELECT * FROM WD");
// while($WD = mysqli_fetch_array($queryWD)){
//     $content = $WD['NAME_1'].','.$WD['MAJOR_1'].translate_grade($WD['GRADE_1']).','.$WD['NAME_2'].','.$WD['MAJOR_2'].translate_grade($WD['GRADE_2']);
//     fputcsv($fp, split(',', $content));
// }
// fclose($fp);
// $fp = fopen('NTUcup_XD.csv', 'w');
// $queryXD = mysqli_query($mysql, "SELECT * FROM XD");
// while($XD = mysqli_fetch_array($queryXD)){
//     $content = $XD['NAME_1'].','.$XD['MAJOR_1'].translate_grade($XD['GRADE_1']).','.$XD['NAME_2'].','.$XD['MAJOR_2'].translate_grade($XD['GRADE_2']);
//     fputcsv($fp, split(',', $content));
// }
// fclose($fp);
// $fp = fopen('NTUcup_G.csv', 'w');
// $queryG = mysqli_query($mysql, "SELECT * FROM G");
// while($G = mysqli_fetch_array($queryG)){
//     $content = $G['Gmajor'].','.$G['Gname'];
//     fputcsv($fp, split(',', $content));
// }
// fclose($fp);

header('Content-type:application/vnd.ms-excel');  //宣告網頁格式
header('Content-Disposition: attachment; filename=NTUcup.xls');  //設定檔案名稱
?>
<html>
<head>
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
</head>
<body>
    <?php
    echo '<table>';
    echo '<tr><th>男單</th></tr>';
    echo '<tr><th>姓名</th><th>系級</th><th>學號</th><th>聯絡電話</th><th>出生日期</th><th>身分證字號</th></tr>';
    $queryMS = mysqli_query($mysql, "SELECT * FROM MS");
    if ($queryMS) {
        while ($MS = mysqli_fetch_array($queryMS)) {
            echo '<tr><td>'.$MS['NAME'].'</td><td>'.$MS['MAJOR'].translate_grade($MS['GRADE']).'</td><td>'.$MS['ID'].'</td><td>'.$MS['PHONE'].'</td><td>'.$MS['BIRTH'].'</td><td>'.$MS['IDENTITY'].'</td></tr>';
        }
    }
    echo '<tr></tr>';
    echo '<tr><th>女單</th></tr>';
    echo '<tr><th>姓名</th><th>系級</th><th>學號</th><th>聯絡電話</th><th>出生日期</th><th>身分證字號</th></tr>';
    $queryWS = mysqli_query($mysql, "SELECT * FROM WS");
    if ($queryWS) {
        while ($WS = mysqli_fetch_array($queryWS)) {
            echo '<tr><td>'.$WS['NAME'].'</td><td>'.$WS['MAJOR'].translate_grade($WS['GRADE']).'</td><td>'.$WS['ID'].'</td><td>'.$WS['PHONE'].'</td><td>'.$WS['BIRTH'].'</td><td>'.$WS['IDENTITY'].'</td></tr>';
        }
    }
    echo '<tr></tr>';
    echo '<tr><th>男雙</th></tr>';
    echo '<tr><th>姓名</th><th>系級</th><th>學號</th><th>聯絡電話</th><th>出生日期</th><th>身分證字號</th><th>姓名</th><th>系級</th><th>學號</th><th>聯絡電話</th><th>出生日期</th><th>身分證字號</th></tr>';
    $queryMD = mysqli_query($mysql, "SELECT * FROM MD");
    if ($queryMD) {
        while ($MD = mysqli_fetch_array($queryMD)) {
            echo '<tr><td>'.$MD['NAME_1'].'</td><td>'.$MD['MAJOR_1'].translate_grade($MD['GRADE_1']).'</td><td>'.$MD['ID_1'].'</td><td>'.$MD['PHONE_1'].'</td><td>'.$MD['BIRTH_1'].'</td><td>'.$MD['IDENTITY_1'].'</td><td>'.$MD['NAME_2'].'</td><td>'.$MD['MAJOR_2'].translate_grade($MD['GRADE_2']).'</td><td>'.$MD['ID_2'].'</td><td>'.$MD['PHONE_2'].'</td><td>'.$MD['BIRTH_2'].'</td><td>'.$MD['IDENTITY_2'].'</td></tr>';
        }
    }
    echo '<tr></tr>';
    echo '<tr><th>女雙</th></tr>';
    echo '<tr><th>姓名</th><th>系級</th><th>學號</th><th>聯絡電話</th><th>出生日期</th><th>身分證字號</th><th>姓名</th><th>系級</th><th>學號</th><th>聯絡電話</th><th>出生日期</th><th>身分證字號</th></tr>';
    $queryWD = mysqli_query($mysql, "SELECT * FROM WD");
    if ($queryWD) {
        while ($WD = mysqli_fetch_array($queryWD)) {
            echo '<tr><td>'.$WD['NAME_1'].'</td><td>'.$WD['MAJOR_1'].translate_grade($WD['GRADE_1']).'</td><td>'.$WD['ID_1'].'</td><td>'.$WD['PHONE_1'].'</td><td>'.$WD['BIRTH_1'].'</td><td>'.$WD['IDENTITY_1'].'</td><td>'.$WD['NAME_2'].'</td><td>'.$WD['MAJOR_2'].translate_grade($WD['GRADE_2']).'</td><td>'.$WD['ID_2'].'</td><td>'.$WD['PHONE_2'].'</td><td>'.$WD['BIRTH_2'].'</td><td>'.$WD['IDENTITY_2'].'</td></tr>';
        }
    }
    echo '<tr></tr>';
    echo '<tr><th>混雙</th></tr>';
    echo '<tr><th>姓名</th><th>系級</th><th>學號</th><th>聯絡電話</th><th>出生日期</th><th>身分證字號</th><th>姓名</th><th>系級</th><th>學號</th><th>聯絡電話</th><th>出生日期</th><th>身分證字號</th></tr>';
    $queryXD = mysqli_query($mysql, "SELECT * FROM XD");
    if ($queryXD) {
        while ($XD = mysqli_fetch_array($queryXD)) {
            echo '<tr><td>'.$XD['NAME_1'].'</td><td>'.$XD['MAJOR_1'].translate_grade($XD['GRADE_1']).'</td><td>'.$XD['ID_1'].'</td><td>'.$XD['PHONE_1'].'</td><td>'.$XD['BIRTH_1'].'</td><td>'.$XD['IDENTITY_1'].'</td><td>'.$XD['NAME_2'].'</td><td>'.$XD['MAJOR_2'].translate_grade($XD['GRADE_2']).'</td><td>'.$XD['ID_2'].'</td><td>'.$XD['PHONE_2'].'</td><td>'.$XD['BIRTH_2'].'</td><td>'.$XD['IDENTITY_2'].'</td></tr>';
        }
    }
    echo '<tr></tr>';
    echo '<tr><th>團體</th></tr>';
    $queryG = mysqli_query($mysql, "SELECT * FROM G");
    if ($queryG) {
        while ($G = mysqli_fetch_array($queryG)) {
            echo '<tr><th>系別</th><th>'.$G['Gmajor'].'</th><th>隊名</th><th>'.$G['Gname'].'</th></tr>';
            echo '<tr><th>姓名</th><th>系級</th><th>學號</th><th>聯絡電話</th><th>出生日期</th><th>身分證字號</th></tr>';
            echo '<tr><td>'.$G['NAME_1'].'</td><td>'.$G['MAJOR_1'].translate_grade($G['GRADE_1']).'</td><td>'.$G['ID_1'].'</td><td>'.$G['PHONE_1'].'</td><td>'.$G['BIRTH_1'].'</td><td>'.$G['IDENTITY_1'].'</td></tr>';
            echo '<tr><td>'.$G['NAME_2'].'</td><td>'.$G['MAJOR_2'].translate_grade($G['GRADE_2']).'</td><td>'.$G['ID_2'].'</td><td>'.$G['PHONE_2'].'</td><td>'.$G['BIRTH_2'].'</td><td>'.$G['IDENTITY_2'].'</td></tr>';
            echo '<tr><td>'.$G['NAME_3'].'</td><td>'.$G['MAJOR_3'].translate_grade($G['GRADE_3']).'</td><td>'.$G['ID_3'].'</td><td>'.$G['PHONE_3'].'</td><td>'.$G['BIRTH_3'].'</td><td>'.$G['IDENTITY_3'].'</td></tr>';
            echo '<tr><td>'.$G['NAME_4'].'</td><td>'.$G['MAJOR_4'].translate_grade($G['GRADE_4']).'</td><td>'.$G['ID_4'].'</td><td>'.$G['PHONE_4'].'</td><td>'.$G['BIRTH_4'].'</td><td>'.$G['IDENTITY_4'].'</td></tr>';
            echo '<tr><td>'.$G['NAME_5'].'</td><td>'.$G['MAJOR_5'].translate_grade($G['GRADE_5']).'</td><td>'.$G['ID_5'].'</td><td>'.$G['PHONE_5'].'</td><td>'.$G['BIRTH_5'].'</td><td>'.$G['IDENTITY_5'].'</td></tr>';
            echo '<tr><td>'.$G['NAME_6'].'</td><td>'.$G['MAJOR_6'].translate_grade($G['GRADE_6']).'</td><td>'.$G['ID_6'].'</td><td>'.$G['PHONE_6'].'</td><td>'.$G['BIRTH_6'].'</td><td>'.$G['IDENTITY_6'].'</td></tr>';
            echo '<tr><td>'.$G['NAME_7'].'</td><td>'.$G['MAJOR_7'].translate_grade($G['GRADE_7']).'</td><td>'.$G['ID_7'].'</td><td>'.$G['PHONE_7'].'</td><td>'.$G['BIRTH_7'].'</td><td>'.$G['IDENTITY_7'].'</td></tr>';
            echo '<tr><td>'.$G['NAME_8'].'</td><td>'.$G['MAJOR_8'].translate_grade($G['GRADE_8']).'</td><td>'.$G['ID_8'].'</td><td>'.$G['PHONE_8'].'</td><td>'.$G['BIRTH_8'].'</td><td>'.$G['IDENTITY_8'].'</td></tr>';
            if (!empty($G['ID_9'])){
                echo '<tr><td>'.$G['NAME_9'].'</td><td>'.$G['MAJOR_9'].translate_grade($G['GRADE_9']).'</td><td>'.$G['ID_9'].'</td><td>'.$G['PHONE_9'].'</td><td>'.$G['BIRTH_9'].'</td><td>'.$G['IDENTITY_9'].'</td></tr>';
            }
            if (!empty($G['ID_10'])){
                echo '<tr><td>'.$G['NAME_10'].'</td><td>'.$G['MAJOR_10'].translate_grade($G['GRADE_10']).'</td><td>'.$G['ID_10'].'</td><td>'.$G['PHONE_10'].'</td><td>'.$G['BIRTH_10'].'</td><td>'.$G['IDENTITY_10'].'</td></tr>';
            }
            if (!empty($G['ID_11'])){
                echo '<tr><td>'.$G['NAME_11'].'</td><td>'.$G['MAJOR_11'].translate_grade($G['GRADE_11']).'</td><td>'.$G['ID_11'].'</td><td>'.$G['PHONE_11'].'</td><td>'.$G['BIRTH_11'].'</td><td>'.$G['IDENTITY_11'].'</td></tr>';
            }
            if (!empty($G['ID_12'])){
                echo '<tr><td>'.$G['NAME_12'].'</td><td>'.$G['MAJOR_12'].translate_grade($G['GRADE_12']).'</td><td>'.$G['ID_12'].'</td><td>'.$G['PHONE_12'].'</td><td>'.$G['BIRTH_12'].'</td><td>'.$G['IDENTITY_12'].'</td></tr>';
            }
        }
    }
    echo '<tr></tr>';
    echo '</table>';
    ?>
</body>
</html>