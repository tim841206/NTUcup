<?php

function querySignup() {
	$mysql = mysqli_connect('localhost', 'root', '');
	mysqli_query($mysql, "SET NAMES 'utf8'");
	mysqli_select_db($mysql, 'NTUcup');
	$sql = mysqli_query($mysql, "SELECT SIGNUP FROM setup");
	$fetch = mysqli_fetch_row($sql);
	$return = ($fetch[0] == 1) ? 1 : 0;
	return $return;
}

function checkManager() {
	if (isset($_COOKIE['account']) && $_COOKIE['account'] == "NTUcup") return true;
	else return false;	
}
if (isset($_GET['signup'])) {
	if (in_array($_GET['signup'], array("MS", "WS", "MD", "WD", "XD", "G"))) {
		if (querySignup()) {
			include_once("view/header.html");
			include_once("view/".$_GET['signup'].".html");
			include_once("view/footer.html");
		}
		else {
			alert("報名時間已過");
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	elseif (in_array($_GET['signup'], array("directMS", "directWS", "directMD", "directWD", "directXD"))) {
		if (checkManager()) {
			include_once("view/header.html");
			include_once("view/".$_GET['signup'].".html");
			include_once("view/footer.html");
		}
		else {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	else {
		include_once("view/header.html");
		include_once("view/index.html");
		include_once("view/footer.html");
	}
}
elseif (isset($_GET['route'])) {
	if ($_GET['route'] == "login") {
		include_once("view/header.html");
		include_once("view/login.html");
	}
	elseif ($_GET['route'] == "document") {
		include_once("view/header.html");
		include_once("view/document.html");
		include_once("view/footer.html");
	}
	elseif (in_array($_GET['route'], array("list", "member"))) {
		include_once("view/header.html");
		include_once($_GET['route'].".php");
		include_once("view/footer.html");
	}
	elseif ($_GET['route'] == "output") {
		if (checkManager()) {
			include_once("output.php");
		}
		else {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	elseif (in_array($_GET['route'], array("manager", "update_playerdata"))) {
		if (checkManager()) {
			include_once("view/header.html");
			include_once("view/".$_GET['route'].".html");
		}
		else {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	elseif ($_GET['route'] == "update_paystat" && checkManager()) {
		include_once("view/header.html");
		include_once("update_paystat.php");
		include_once("view/footer.html");
	}
	else {
		include_once("view/header.html");
		include_once("view/index.html");
		include_once("view/footer.html");
	}
}
elseif (isset($_POST['service'])) {
	if ($_POST['service'] == "login") {
		if ($_POST['account'] == "NTUcup" && $_POST['password'] == "0986036999") {
			if (setcookie("account", "NTUcup")) {
				echo json_encode(array("msg" => "ok"));
			}
			else {
				echo json_encode(array("msg" => "Unable to perform login"));
			}
		}
		else {
			echo json_encode(array("msg" => "Wrong account or password"));
		}
	}
	elseif ($_POST['service'] == "signup") {
		if (in_array($_POST['type'], array("MS", "WS", "MD", "WD", "XD", "G"))) echo curl_post($_POST);
		elseif (in_array($_POST['type'], array('directMS', 'directWS', 'directMD', 'directWD', 'directXD'))) {
			if (checkManager()) echo curl_post($_POST);
			else echo json_encode(array("msg" => "Only available for manager"));
		}
	}
	elseif (in_array($_POST['service'], array("search", "delete", "checkId", "checkBirth", "checkPhone", "checkIdentityM", "checkIdentityF"))) {
		echo curl_post($_POST);
	}
}
elseif (isset($_GET['service'])) {
	$mysql = mysqli_connect('localhost', 'root', '');
	mysqli_query($mysql, "SET NAMES 'utf8'");
	mysqli_select_db($mysql, 'NTUcup');
	if ($_GET['service'] == "clearList") {
		if (checkManager()) {
			if (querySignup()) {
				alert("報名功能開啟狀態無法清空報名資料");
			}
			else {
				$deleteMS = "DELETE FROM MS WHERE 1";
				mysqli_query($mysql, $deleteMS);
				$deleteWS = "DELETE FROM WS WHERE 1";
				mysqli_query($mysql, $deleteWS);
				$deleteMD = "DELETE FROM MD WHERE 1";
				mysqli_query($mysql, $deleteMD);
				$deleteWD = "DELETE FROM WD WHERE 1";
				mysqli_query($mysql, $deleteWD);
				$deleteXD = "DELETE FROM XD WHERE 1";
				mysqli_query($mysql, $deleteXD);
				$deleteG = "DELETE FROM G WHERE 1";
				mysqli_query($mysql, $deleteG);
				$init = "UPDATE setup SET MS_NUM=1, WS_NUM=1, MD_NUM=1, WD_NUM=1, XD_NUM=1, G_NUM=1";
				mysqli_query($mysql, $init);
				alert("成功清空報名資料");
			}
			include_once("view/header.html");
			include_once("view/manager.html");
		}
		else {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	elseif ($_GET['service'] == "checkList") {
		if (checkManager()) {
			if (querySignup()) {
				alert("報名功能開啟狀態無法清空報名資料");
			}
			else {
				$deleteMS = "DELETE FROM MS WHERE PAYSTAT=0";
				mysqli_query($mysql, $deleteMS);
				$deleteWS = "DELETE FROM WS WHERE PAYSTAT=0";
				mysqli_query($mysql, $deleteWS);
				$deleteMD = "DELETE FROM MD WHERE PAYSTAT=0";
				mysqli_query($mysql, $deleteMD);
				$deleteWD = "DELETE FROM WD WHERE PAYSTAT=0";
				mysqli_query($mysql, $deleteWD);
				$deleteXD = "DELETE FROM XD WHERE PAYSTAT=0";
				mysqli_query($mysql, $deleteXD);
				$deleteG = "DELETE FROM G WHERE PAYSTAT=0";
				mysqli_query($mysql, $deleteG);
				alert("成功確認比賽名單");
			}
			include_once("view/header.html");
			include_once("view/manager.html");
		}
		else {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	elseif ($_GET['service'] == "closeSignup") {
		if (checkManager()) {
			$sql = "UPDATE setup SET SIGNUP=0";
			if (mysqli_query($mysql, $sql)) alert("成功關閉報名功能");
			else alert(mysqli_error(mysqli_query($mysql, $sql)));
			include_once("view/header.html");
			include_once("view/manager.html");
		}
		else {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	elseif ($_GET['service'] == "openSignup") {
		if (checkManager()) {
			$sql = "UPDATE setup SET SIGNUP=1";
			if (mysqli_query($mysql, $sql)) alert("成功開啟報名功能");
			else alert(mysqli_error(mysqli_query($mysql, $sql)));
			include_once("view/header.html");
			include_once("view/manager.html");
		}
		else {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	elseif ($_GET['service'] == "closeMember") {
		if (checkManager()) {
			$sql = "UPDATE setup SET MEMBER=0";
			if (mysqli_query($mysql, $sql)) alert("成功關閉團賽名單");
			else alert(mysqli_error(mysqli_query($mysql, $sql)));
			include_once("view/header.html");
			include_once("view/manager.html");
		}
		else {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	elseif ($_GET['service'] == "openMember") {
		if (checkManager()) {
			$sql = "UPDATE setup SET MEMBER=1";
			if (mysqli_query($mysql, $sql)) alert("成功開啟團賽名單");
			else alert(mysqli_error(mysqli_query($mysql, $sql)));
			include_once("view/header.html");
			include_once("view/manager.html");
		}
		else {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
	}
	elseif ($_GET['service'] == "logout") {
		if (setcookie("account", "", time()-3600)) {
			include_once("view/header.html");
			include_once("view/index.html");
			include_once("view/footer.html");
		}
		else {
			alert("Unable to perform logout");
			include_once("view/header.html");
			include_once("view/manager.html");
		}
	}
}
else {
	include_once("view/header.html");
	include_once("view/index.html");
	include_once("view/footer.html");
}

function curl_post($post) {
	$ch = curl_init();
	$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http";
	curl_setopt($ch, CURLOPT_URL, $protocol.'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/model.php');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function alert($content) {
	echo "<script>alert('".$content."')</script>";
}