<?php
$db = mysql_connect('localhost', 'root', '');
mysql_query("SET NAMES 'utf8'");
mysql_select_db('NTUcup', $db);

$sql = mysql_query("SELECT * FROM G");
$total_list = '';
while ($fetch = mysql_fetch_array($sql)) {
	$output_list = $fetch['Gmajor'].' '.$fetch['Gname'];
	$NAME_1 = $fetch['NAME_1'];
	$NAME_2 = $fetch['NAME_2'];
	$NAME_3 = $fetch['NAME_3'];
	$NAME_4 = $fetch['NAME_4'];
	$NAME_5 = $fetch['NAME_5'];
	$NAME_6 = $fetch['NAME_6'];
	$NAME_7 = $fetch['NAME_7'];
	$NAME_8 = $fetch['NAME_8'];
	$NAME_9 = $fetch['NAME_9'];
	$NAME_10 = $fetch['NAME_10'];
	$NAME_11 = $fetch['NAME_11'];
	$NAME_12 = $fetch['NAME_12'];
	if (!is_null($NAME_1)) $output_list .= $NAME_1;
	if (!is_null($NAME_2)) $output_list .= $NAME_2;
	if (!is_null($NAME_3)) $output_list .= $NAME_3;
	if (!is_null($NAME_4)) $output_list .= $NAME_4;
	if (!is_null($NAME_5)) $output_list .= $NAME_5;
	if (!is_null($NAME_6)) $output_list .= $NAME_6;
	if (!is_null($NAME_7)) $output_list .= $NAME_7;
	if (!is_null($NAME_8)) $output_list .= $NAME_8;
	if (!is_null($NAME_9)) $output_list .= $NAME_9;
	if (!is_null($NAME_10)) $output_list .= $NAME_10;
	if (!is_null($NAME_11)) $output_list .= $NAME_11;
	if (!is_null($NAME_12)) $output_list .= $NAME_12;
	$output_list .= '<br>';
	$total_list .= $output_list;
}
