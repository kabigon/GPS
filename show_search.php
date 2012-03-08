<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type = "text/css">
#w{color:#FFFFFF};
</style>

</head>

<body>
<br/>
<div id="w"><b>Detail Trip & Car & Driver</b></div>
<select name="search" onchange="search_ja()" id ="search">
<option value=""><-- Please Select Item --></option>
<option value="trip">   Trip  </option>
<option value="car">   Car  </option>
<option value="driver">   Driver </option>
</select>
<br /><br /><hr />
<?	

	if($_GET["name"]){
	$name = $_GET["name"];
	if($name == "trip"){
	echo "<table width='200' border='0' bordercolor='#000000'>";
	echo "<tr>";
	echo "<td bordercolor='#009900' bgcolor='#b9c9fe' ><span class='style3'><center><b>Trip Detail</b></center></span></td></tr>";
	$cn = @mysql_connect("localhost","root","adminadmin");
	if(!$cn){
		echo "fail<br>";
		exit;
	}
	mysql_select_db("gps",$cn);
	$sql ="select * from gps.trip";
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		echo "<td bordercolor='#009900' bgcolor='#e8edff'><span class='style3'>Trip Name-  <a href='#' onclick='show_map_trip(".$row["start_lat"].",".$row["start_long"].",".$row["end_lat"].",".$row["end_long"].")'>". $row["trip_name"] . "</a></span></td>";
		echo "</tr>";
			
			
					//driver
		
	$cn = @mysql_connect("localhost","root","adminadmin");
	mysql_select_db("gps",$cn);
	$sql2 ="select * from gps.driver where user_id=".$row["user_id"];
	$result2 = mysql_query($sql2,$cn);
	while($row2 = mysql_fetch_array($result2)){
		echo "<td bordercolor='#009900' bgcolor='#FFFFFF'><span class='style3'>Name : " . "<a href='#' onclick='profile_driver(".$row2["user_id"].")'>" . $row2["name"] . "</a></span></td>";
		echo "</tr>";
		
			
	}
			//Car
			
	$cn = @mysql_connect("localhost","root","adminadmin");
	mysql_select_db("gps",$cn);
	$sql1 ="select * from gps.car where car_id ='".$row["car_id"]."'";
	$result1 = mysql_query($sql1,$cn);
	while($row1 = mysql_fetch_array($result1)){
		echo "<td bordercolor='#009900' bgcolor='#FFFFFF'><span class='style3'>Car-ID : " . "<a href='#' onclick='profile_car(".$row1["car_id"].")'>" . $row1["car_id"] . "</a></span></td>";
		echo "</tr>";
		}
		

	
	
	
	}
	echo "</table>";
	}
	
	
	if($name == "car"){
	echo "<table width='200' border='0' bordercolor='#000000'>";
	echo "<tr>";
	echo "<td bordercolor='#009900' bgcolor='#b9c9fe' ><span class='style3'><center><b>Car ID & Trip</b></center></span></td></tr>";
	
	$cn = @mysql_connect("localhost","root","adminadmin");
	if(!$cn){
		echo "fail<br>";
		exit;
	}
	mysql_select_db("gps",$cn);
	$sql ="select * from gps.car";
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		echo "<td bordercolor='#009900' bgcolor='#e8edff'><span class='style3'>Id-License : " . "<a href='#' onclick='profile_car(".$row["car_id"].")'>" . $row["car_id"] . "</a></span></td>";
		echo "</tr>";
		
		$cn1 = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn1);
		$sql1 ="select * from gps.trip where car_id='".$row["car_id"]."'";
		$result1 = mysql_query($sql1,$cn1);
		while($row1 = mysql_fetch_array($result1)){
			echo "<td bordercolor='#009900' bgcolor='#FFFFFF'><span class='style3'>-  <a href='#' onclick='show_map_trip(".$row1["start_lat"].",".$row1["start_long"].",".$row1["end_lat"].",".$row1["end_long"].")'>". $row1["trip_name"] . "</a></span></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	
	}
	if($name == "driver"){

	echo "<table width='200' border='0' bordercolor='#000000'>";
	echo "<tr>";
	echo "<td bordercolor='#009900' bgcolor='#b9c9fe' ><span class='style3'><center><b>Driver Name</b></center></span></td></tr>";
	$cn = @mysql_connect("localhost","root","adminadmin");
	if(!$cn){
		echo "fail<br>";
		exit;
	}
	mysql_select_db("gps",$cn);
	$sql ="select * from gps.driver";
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		echo "<td bordercolor='#009900' bgcolor='#e8edff'><span class='style3'>Name : " . "<a href='#' onclick='profile_driver(".$row["user_id"].")'>" . $row["name"] . "</a></span></td>";
		echo "</tr>";
		$cn1 = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn1);
		$sql1 ="select * from gps.trip where user_id=".$row["user_id"];
		$result1 = mysql_query($sql1,$cn1);
		while($row1 = mysql_fetch_array($result1)){
			echo "<td bordercolor='#009900' bgcolor='#FFFFFF'><span class='style3'>-Trip : <a href='#' onclick='show_map_trip(".$row1["start_lat"].",".$row1["start_long"].",".$row1["end_lat"].",".$row1["end_long"].")'>". $row1["trip_name"] . "</a></span></td>";
			echo "</tr>";
		}
		
	}
	
	echo "</table>";
	}
	}

?>
</body>
</html>
