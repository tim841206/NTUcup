<?php
$db = mysql_connect('localhost', 'root', '');
mysql_query("SET NAMES 'utf8'");
mysql_select_db('NTUcup', $db);

function querySignup() {
	$sql = mysql_query("SELECT SIGNUP FROM setup");
	$fetch = mysql_fetch_row($sql);
	$return = ($fetch[0] == 1) ? 1 : 0;
	return $return;
}

$acceptSignup = querySignup();
if (!$acceptSignup){
    ?>
    <script>
        alert('已不開放報名');
        location.replace("index.html");
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="icon.png">
	<meta name="description" content="國立臺灣大學台大盃羽球賽報名系統">
	<meta name="author" content="國立臺灣大學羽球校隊">
	<title>國立臺灣大學台大盃羽球賽</title>
	<link href="bootstrap.min.css" rel="stylesheet">
	<link href="custom.css" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container">
			<h1 class="center">2018台大盃羽球賽報名表-男單</h1>
		</div>
	</header>

	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<p>項目：<input type="text" value="男單" readonly /></p>
					<p>學號：<input type="text" id="id" onchange="check_id()" /></p>
					<p class="text-danger" id="id_result"></p>
					<p>姓名：<input type="text" id="name" /></p>
					<p>系別：<input type="text" id="major" /></p>
					<p>年級：<select id="grade">
							<option value=""></option>
							<option value="B1">大一</option><option value="B2">大二</option>
							<option value="B3">大三</option><option value="B4">大四</option>
							<option value="B5">大五</option><option value="B6">大六</option>
							<option value="B7">大七</option><option value="R1">碩一</option>
							<option value="R2">碩二</option><option value="R3">碩三</option>
							<option value="R4">碩四</option><option value="D1">博一</option>
							<option value="D2">博二</option><option value="D3">博三</option>
							<option value="D4">博四</option><option value="D5">博五</option>
							<option value="D6">博六</option><option value="D7">博七</option>
					</select></p>
					<p>聯絡電話：<input type="text" id="phone" onchange="check_phone()" /></p>
					<p class="text-danger" id="phone_result"></p>
					<p>出生日期：<input class="smaller_box" type="text" id="birthy" placeholder="西元" /> 年
						<input class="smallest_box" type="text" id="birthm" /> 月
						<input class="smallest_box" type="text" id="birthd" onchange="check_birth()" /> 日</p>
					<p class="text-danger" id="birth_result"></p>
					<p>身分證字號：<input type="text" id="identity" onchange="check_identity()" /></p>
					<p class="text-danger" id="identity_result"></p>
					<p><input type="checkbox" id="check" value="Y" /> 報名確認</p>
					<button onclick="sign_up()">確定報名</button>
				</div>
			</div>
		</div>
	</section>

	<section class="footer">
		<div class="container">
			<div class="row center">
				<span><a href="https://www.facebook.com/ntubadminton2012/?fref=ts" target="_blank"><img src="facebook.png" class="small_pic" /></a></span>
				<span class="small">&copy; 2018 NTU Badminton All Rights Reserved</span>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		function check_id() {
			var request = new XMLHttpRequest();
			request.open("POST", "service.php");
			var data = "type=MS&id=" + document.getElementById("id").value;
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send(data);

			request.onreadystatechange = function() {
				if (request.readyState === 4 && request.status === 200) {
					var data = JSON.parse(request.responseText);
					if (data.msg != 'ok') {
						document.getElementById("id_result").innerHTML = data.msg;
					}
					else {
						document.getElementById("id_result").innerHTML = "";
					}
				}
			}
		}

		function check_phone() {
			var request = new XMLHttpRequest();
			request.open("POST", "service.php");
			var data = "phone=" + document.getElementById("phone").value;
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send(data);

			request.onreadystatechange = function() {
				if (request.readyState === 4 && request.status === 200) {
					var data = JSON.parse(request.responseText);
					if (data.msg != 'ok') {
						document.getElementById("phone_result").innerHTML = data.msg;
					}
					else {
						document.getElementById("phone_result").innerHTML = "";
					}
				}
			}
		}

		function check_birth() {
			var request = new XMLHttpRequest();
			request.open("POST", "service.php");
			var data = "birthy=" + document.getElementById("birthy").value
					+ "&birthm=" + document.getElementById("birthm").value
					+ "&birthd=" + document.getElementById("birthd").value;
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send(data);

			request.onreadystatechange = function() {
				if (request.readyState === 4 && request.status === 200) {              
					var data = JSON.parse(request.responseText);
					if (data.msg != 'ok') {
						document.getElementById("birth_result").innerHTML = data.msg;
					}
					else {
						document.getElementById("birth_result").innerHTML = "";
					}
				}
			}
		}

		function check_identity() {
			var request = new XMLHttpRequest();
			request.open("POST", "service.php");
			var data = "identity=" + document.getElementById("identity").value;
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send(data);

			request.onreadystatechange = function() {
				if (request.readyState === 4 && request.status === 200) {              
					var data = JSON.parse(request.responseText);
					if (data.msg != 'ok') {
						document.getElementById("identity_result").innerHTML = data.msg;
					}
					else {
						document.getElementById("identity_result").innerHTML = "";
					}
				}
			}
		}

		function sign_up() {
			var request = new XMLHttpRequest();
			request.open("POST", "service.php");
			var data = "new=MS&type=MS" + 
					   "&id=" + document.getElementById("id").value +
					   "&name=" + document.getElementById("name").value +
					   "&major=" + document.getElementById("major").value +
					   "&grade=" + document.getElementById("grade").value +
					   "&phone=" + document.getElementById("phone").value +
					   "&birthy=" + document.getElementById("birthy").value +
					   "&birthm=" + document.getElementById("birthm").value +
					   "&birthd=" + document.getElementById("birthd").value +
					   "&identity=" + document.getElementById("identity").value;
			var check = document.getElementById("check");
			if (check.checked){
				data = data + "&check=" + check.value;
			}
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send(data);

			request.onreadystatechange = function() {
				if (request.readyState === 4 && request.status === 200){  
					var data = JSON.parse(request.responseText);
					if (data.msg == 'ok'){
						alert('報名成功，您的編號為 ' + data.num + '。請於指定時間內繳費');
						location.replace("index.html");
					}
					else {
						alert(data.msg);
					}
				}
			}
		}
	</script>
</body>
</html>