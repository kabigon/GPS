<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
	echo "<b>---Show Detail---</b><br><br>";
	$user_id = $_GET["user"];
	$car_id = $_GET["car"];
	$id = $_GET["id"];
	$cn = @mysql_connect("localhost","root","adminadmin");
	if(!$cn){
		echo "fail<br>";
		exit;
	}
	mysql_select_db("gps",$cn);
	$sql = "SELECT * FROM gps.trip where trip_id=".$id;
	$result = mysql_query($sql,$cn);
	if($result){
	while($row = mysql_fetch_array($result)){
		echo "Date : " . $row["Date"] . "<br>";
		echo "Start Time : " . $row["start_time"] . "<br>";
		echo "Finish Time : " . $row["finish_time"] . "<br>";
	}
	}
	
	mysql_select_db("gps",$cn);
	$sql = "SELECT * FROM gps.car where car_id ='".$car_id."'";
	$result = mysql_query($sql,$cn);
	if($result){
	while($row = mysql_fetch_array($result)){
		echo "<br><b>Car</b><br>";
		echo "<img src='".$row["pic"]."' width=100px height=100px ><br>";
	}
	}
	
	$cn = @mysql_connect("localhost","root","adminadmin");
	if(!$cn){
		echo "fail<br>";
		exit;
	}
	mysql_select_db("gps",$cn);
	$sql = "SELECT * FROM gps.driver where user_id =".$user_id;
	$result = mysql_query($sql,$cn);
	if($result){
	while($row = mysql_fetch_array($result)){
		echo "<b>Driver </b><br>";
		echo "<img src='".$row["pic"]."' width=100px height=100px >";
	}
	}
	
	
	
	
	
?>
</body>
</html>
