<?php
	//Car

	$cn = @mysql_connect("localhost","root","adminadmin");
	mysql_select_db("gps",$cn);
	$eiei = $_GET['q']."";
	$sql = "SELECT * FROM gps.car where car_id like '".$eiei."%' ";
	$result = mysql_query($sql,$cn);
	if($eiei == ""){
		echo "";
	}
	else{
	while($row = mysql_fetch_array($result)){
		
		echo "<a href='#' class='link2' onclick='sss(".$row["car_id"].")'>".$row["car_id"]."</a>";
		echo "<b class='tt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Car ID</b>";
		echo "<br>";
	}
	}
	//driver
	$sql = "SELECT * FROM gps.driver where name like '".$eiei."%' ";
	$result = mysql_query($sql,$cn);
	if($eiei == ""){
		echo "";
	}
	else{
	while($row = mysql_fetch_array($result)){
		
		echo "<a href='#' class='link2' onclick='sss(".$row["name"].")'>".$row["name"]."</a>";
		echo "<b class='tt'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;&nbsp;&nbsp;&nbsp;Driver</b>";
		echo "<br>";
	}
	}


?>
