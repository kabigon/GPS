<?php session_start() ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/main_mail.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true">
</script>

 <script type="text/javascript">
function initialize2() {
  if (GBrowserIsCompatible()) {
    var map = new GMap2(document.getElementById("map"));
    map.setCenter(new GLatLng(13.7312933, 100.7811), 13);

    // Add 10 markers to the map at random locations
    var bounds = map.getBounds();

    <?php
		$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);

	$sql = "select * from gps.location where trip_id =".$_SESSION["authen"];
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
			echo "var latlng = new GLatLng(".$row["lattitude"].",".$row["longtitude"].");";
      		echo "map.addOverlay(new GMarker(latlng));";
	}	
	?>
      
    
  }
}

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
	
	$sql = "select * from gps.location where trip_id =".$_SESSION["authen"];
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
	
	$sql = "select * from gps.location where trip_id =".$_SESSION["authen"]." order by id desc limit 1";
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
  
  
	setTimeout(function(){initialize();},5000);
}








</script>
</head>

<body onload="initialize()">

<div id="center" >
                <div id="header">

                </div>
                <div class="style4" id="nevigator">
				Company : <?php echo $_SESSION["company"]; ?>
				</div>
				<div id="krop">
                        <div id="tablena">
				
				<br />
				</div></div>
				<div id="map"></div>
				</div>
</body>
</html>
