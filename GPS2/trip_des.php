<?php session_start() ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style80 {color: #999999}
.style81 {color: #FF0000}
.style82 {color: #FF9900}

.style83 {color: #66CC00}
-->
</style>
<link rel="stylesheet" type="text/css" href="css/main_mail.css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true">
</script>

 <script type="text/javascript">
function initialize() {
  var mapDiv = document.getElementById('map');
  var map = new google.maps.Map(mapDiv, {
    center: new google.maps.LatLng(13.7312933, 100.7811),
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
  var path = [
    <?php
		$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
	
	$sql = "select * from gps.location where trip_id =".$_GET["id"];
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		$lat = floatval($row["lattitude"]);
		$long = floatval($row["longtitude"]);
			
			echo "new google.maps.LatLng(".$lat.",".$long."),";
			
			
	}	
	echo "];";
	?>

  var line = new google.maps.Polyline({
    path: path,
    strokeColor: '#ff0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  line.setMap(map);
  
  var latLng = new google.maps.LatLng(
  <?php
		$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
	
	$sql = "select * from gps.location where trip_id =".$_GET["id"]." order by id desc limit 1";
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		echo $row["lattitude"].",".$row["longtitude"];
	}
	
?>	
  
  
  
  );
   var image = 'http://s.thumbs.canstockphoto.com/canstock5842980.jpg';
  var myLatLng = new google.maps.LatLng(13.7312933, 100.7811);
  var beachMarker = new google.maps.Marker({
    position: latLng,
    map: map,
    icon: image
  });
  
  
}
</script>
</head>

<body onload="initialize()" bgcolor="#000000">
<?php $id=$_GET["id"];
		mysql_select_db("gps",$cn);
	
	$sql = "select * from gps.trip where trip_id =".$id;
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		if($row["finish_time"]=="0000-00-00 00:00:00"){
			echo "<p align='left' class='style80'><u>Status</u> :Not Success</p>";
		}
		else{
			echo "<p align='left' class='style80'><u>Status</u> :Send Success</p>";
		}
		
	}

?>
<table width="800" height="360" border="0">
  <tr>
    <th width="257" scope="row" ><?php $sql = "select * from gps.trip where trip_id =".$id;
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		echo "<p align='left' class='style80'><u>Trip Name</u> :".$row["trip_name"]."</p>";
		echo "<p align='left' class='style80'><u>Start Time</u> :".$row["start_time"]."</p>";
		echo "<p align='left' class='style80'><u>Finsh Time</u> :".$row["finish_time"]."</p>";
		echo "<p align='left' class='style80'><u>Car ID</u> :".$row["car_id"]."</p>";
		echo "<p align='left' class='style80'><u>Driver ID</u> :".$row["user_id"]."</p>";
		echo "<p align='left' class='style80'><u>Start Location</u> :".$row["start_location"]."</p>";
		echo "<p align='left' class='style80'><u>End Location</u> :".$row["end_location"]."</p>";
		
		if($_SESSION["rank"]=="admin"){
			echo "<p align='left' class='style82'> Create By :".$row["create_by"]."<hr></p>";
		}
		
		}
		$sql2 = "select * from gps.log where trip_id =".$id;
	$result2 = mysql_query($sql2,$cn);
	while($row2 = mysql_fetch_array($result2)){
			echo "<p align='left' class='style83'>LOG </p>";
			echo "<p align='left' class='style83'>".$row2["log"]."</p>";	
			echo "<p align='left' class='style83'>      ".$row2["time"]."<hr></p>";	
	}
	?></th>
    <td width="700"><div id="map">

</div></td>
  </tr>
</table>

<div id="foot">
<a href='calendar/mailmail.php'><img src="Arrow back.png" width='80' height="80"/></a>
</div>

</body>
</html>
