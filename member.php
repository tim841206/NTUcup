<?php
$mysql = mysql_connect('localhost', 'root', '');
mysqli_query($mysql, "SET NAMES 'utf8'");
mysqli_select_db($mysql, 'NTUcup');

$sql = mysqli_query($mysql, "SELECT MEMBER FROM setup");
$fetch = mysqli_fetch_row($sql);
$acceptMember = ($fetch[0] == 1) ? 1 : 0;

if (!$acceptMember){
    ?>
    <script>
        alert('團體賽隊員名單暫不開放');
        location.replace("index.php");
    </script>
    <?php
}
else {
	$sql1 = mysqli_query($mysql, "SELECT * FROM G");
	while ($fetch1 = mysqli_fetch_array($sql1)) {
		echo "<table><tr><th colspan='2'>隊別</th><th colspan='4'>".$fetch1['Gmajor'].$fetch1['Gname']."</th></tr>";
		echo "<tr>";
		for ($i = 1; $i <= 6; $i++) {
			echo "<td>".$fetch1['NAME_'.$i]."</td>";
		}
		echo "</tr><tr>";
		for ($i = 7; $i <= 12; $i++) {
			echo "<td>".$fetch1['NAME_'.$i]."</td>";
		}
		echo "</tr></table><br>";
	}
}