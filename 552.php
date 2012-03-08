<?php
$cn = @mysql_connect("localhost","root","adminadmin");
	mysql_select_db("gps",$cn);
	if($_GET['q'] != null){
	$eiei = $_GET['q'];
	$sql = "SELECT * FROM gps.trip where trip_id =" .$eiei;
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		echo $row["start_lat"];
	}
	}
	else if ($_GET["q2"] != null){
		echo "test";
	}
?>
