<?php
$mysql = mysql_connect("localhost", "root", "");
mysqli_query($mysql, "SET NAMES utf8");
mysql_select_db($mysql, "tournament");