<?php

	$cn = @mysql_connect("localhost","root","adminadmin");
	mysql_select_db("gps",$cn);
	$eiei = $_GET['q'];
	$sql = "SELECT * FROM gps.trip where start_location like '".$eiei."%' ";
	$result = mysql_query($sql,$cn);
	if($eiei == ""){
		echo "";
	}
	else{
	while($row = mysql_fetch_array($result)){
		echo "<a href='#' class='link2' onclick='ssss(".$row["trip_id"].")'>".$row["start_location"]."</a><hr>";
		echo "<br>";
	}
	}
	

?>
