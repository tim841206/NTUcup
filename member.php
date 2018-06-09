<?php
$db = mysql_connect('localhost', 'root', '');
mysql_query("SET NAMES 'utf8'");
mysql_select_db('NTUcup', $db);

function queryMember() {
	$sql = mysql_query("SELECT MEMBER FROM setup");
	$fetch = mysql_fetch_row($sql);
	$return = ($fetch[0] == 1) ? 1 : 0;
	return $return;
}

$acceptMember = queryMember();
if (!$acceptMember){
    ?>
    <script>
        alert('團體賽隊員名單暫不開放');
        location.replace("index.html");
    </script>
    <?php
}
else {
	$content = '';
	$sql1 = mysql_query("SELECT * FROM G");
	while ($fetch1 = mysql_fetch_array($sql1)) {
		$content .= $fetch1['Gmajor'].' '.$fetch1['Gname'].'<br>';
		for ($i = 1; $i <= 12; $i++) {
			$content .= $fetch1['NAME_'.$i].' ';
		}
		$content .= '<br>';
	}
	echo $content;
}
?>