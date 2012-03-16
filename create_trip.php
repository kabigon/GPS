 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style type = "text/css">
	#header{color:#FFFFFF}
	#showpiccar{}
	#center{float:left;width:30%;color:#FFFFFF}
	#map{float:left;width:43%}
	#rightmap{float:right;width:24%;font-size:5px}
	body{background-image:url(Img/bg2.jpg);color:#000000}
</style>
<script type="text/javascript">
	function picuser(){
		//window.alert("<img src="+document.getElementById("car_id").value+ " width=300px height =300px/>");
		//window.alert(document.getElementById("user_id").value);
		var t=document.getElementById("user_id").value;
		
	
		document.getElementById("map").innerHTML="<img src="+document.getElementById("user_id").value+ " width=300px height =300px/>" ;	
		//document.getElementById("route").innerHTML = "ohh" ;
	}
	function piccar(){
		
		document.getElementById("map").innerHTML="<img src="+document.getElementById("car_id").value+ " width=300px height =300px/>" ;	
	}
	
</script>


<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAwCJvXcuK-yhXg5-rmW_WSRSjPdg9q1PN1dBkFmcXVY9-C4qgKhRtq_Zn49VlscMWhoBzIqVGJRbTVA" type="text/javascript"></script>

<script type="text/javascript">


    //<![CDATA[
	
	
	var icongreen = new GIcon(); 
    icongreen.image = 'http://pegasus.it.kmitl.ac.th/GPS/bird.jpg';
    icongreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    icongreen.iconSize = new GSize(20, 22);
    icongreen.shadowSize = new GSize(1, 1);
    icongreen.iconAnchor = new GPoint(12, 8);
    icongreen.infoWindowAnchor = new GPoint(5, 1);
	
	


    function load() {
	//window.alert("test");
	/*document.getElementById("rightmap").innerHTML = "<form action='#' onSubmit='showAddress(this.address.value); return false'>" + "<input id='huhu' type='text' size='30' name='address'  value='' />" + "<input name='submit' type='submit' value='ทำการค้นหา' /> </form>";*/
	
      if (GBrowserIsCompatible()) {

       // กำหนด DIV tag สำหรับ Map โดยเข้าถึงแบบ DOM

        var map = new GMap2(document.getElementById("map"));

      // Add Map Control และ Map Type

        map.addControl(new GSmallMapControl());//คือการเพิ่มเครื่องมือปรับระดับความละเอียดของGoogle 

        map.addControl(new GMapTypeControl());//คือการเพิ่มเครื่องมือเรียกชนิดmapต่างๆของGoogle Map

    // กำหนด ค่าพิกัดของตำแหน่งเริ่มต้นบนแผนที่ 
		var point = new GPoint(13.730433, 100.781279);
        map.setCenter(new GLatLng(13.7312933, 100.7811), 17);
		
        
		var marker = new GMarker(point,icongreen);
		map.addOverlay(marker);
		//เมื่อเลื่อนแมฟ จะแสดง long lat ใต้ภาพ
		/*GEvent.addListener(map, "moveend", function() {
          var center = map.getCenter();
          document.getElementById("message").innerHTML = center.toString();
        });*/
		
		//click แล้วแสดงที่ mark ไว้
	
	
		GEvent.addListener(map,"click", function(overlay,latlng) {     
          if (latlng) {   
		  	var matchll = /\(([-.\d]*), ([-.\d]*)/.exec( latlng );
			if ( matchll ) { 
					var lat = parseFloat( matchll[1] );
					var lng = parseFloat( matchll[2] );
					lat = lat.toFixed(6);
					lng = lng.toFixed(6);
				}
				
            var myHtml = "Latitude : " +lat + "<br>" + "Longtitude : " + lng + "<br>"+ "ต้องการจุดนี้ คลิ๊ก :<br> <input type='button' onClick='javascript:Addpoint("+lat+","+lng+");' value='ทำการบันทึก'>" ;

            map.openInfoWindow(latlng, myHtml);
			
          }
		  
      });
	
      }

    }
	
	function Addpoint(lat,lon){
		//ติดต่อ database
		var map = new GMap2(document.getElementById("map"));
		var point = new GLatLng(lat,lon);
		/*var icongreen = new GIcon(); 
    icongreen.image = 'http://pegasus.it.kmitl.ac.th/GPS/bird.jpg';
    icongreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    icongreen.iconSize = new GSize(20, 22);//normal 20 22
    icongreen.shadowSize = new GSize(1, 1);
    icongreen.iconAnchor = new GPoint(12, 8);
    icongreen.infoWindowAnchor = new GPoint(5, 1);
		map.addOverlay(new GMarker(point, icongreen));});*/
		map.setCenter(point, 15);
              var marker = new GMarker(point);
              map.addOverlay(marker);
			map.closeInfoWindow();
			document.getElementById("start_long").value =lon;
			document.getElementById("start_lat").value =lat;
			
		//window.location="ex_3p.php?lat="+lat+"&lng="+lon;
		}
	

	
    //]]>
	
	 function load2() {
	//window.alert("test");
	/*document.getElementById("rightmap").innerHTML = "<form action='#' onSubmit='showAddress(this.address.value); return false'>" + "<input id='huhu' type='text' size='30' name='address'  value='' />" + "<input name='submit' type='submit' value='ทำการค้นหา' /> </form>";*/
	
      if (GBrowserIsCompatible()) {

       // กำหนด DIV tag สำหรับ Map โดยเข้าถึงแบบ DOM

        var map = new GMap2(document.getElementById("map"));

      // Add Map Control และ Map Type

        map.addControl(new GSmallMapControl());

        map.addControl(new GMapTypeControl());

    // กำหนด ค่าพิกัดของตำแหน่งเริ่มต้นบนแผนที่ 
		var point = new GPoint(13.7312933, 100.7811);
        map.setCenter(new GLatLng(13.7312933, 100.7811), 17);
		
		
		var marker = new GMarker(point,icongreen);
		map.addOverlay(marker);
		//เมื่อเลื่อนแมฟ จะแสดง long lat ใต้ภาพ
		/*GEvent.addListener(map, "moveend", function() {
          var center = map.getCenter();
          document.getElementById("message").innerHTML = center.toString();
        });*/
		
		//click แล้วแสดงที่ mark ไว้
	
	
		GEvent.addListener(map,"click", function(overlay,latlng) {     
          if (latlng) {   
		  	var matchll = /\(([-.\d]*), ([-.\d]*)/.exec( latlng );
			if ( matchll ) { 
					var lat = parseFloat( matchll[1] );
					var lng = parseFloat( matchll[2] );
					lat = lat.toFixed(6);
					lng = lng.toFixed(6);
				}
            var myHtml = "Latitude : " +lat + "Longtitude : " + lng + "<br>"+ "ต้องการจุดหมายที่นี่ คลิ๊ก :<br> <input type='button' onClick='javascript:Addpoint2("+lat+","+lng+");' value='ทำการบันทึก'>";

            map.openInfoWindow(latlng, myHtml);
			
          }
		  
      });
	
      }

    }
	
	function Addpoint2(lat,lon){
		//ติดต่อ database
		var map = new GMap2(document.getElementById("map"));
		var point = new GLatLng(lat,lon);
		/*var icongreen = new GIcon(); 
    icongreen.image = 'http://pegasus.it.kmitl.ac.th/GPS/bird.jpg';
    icongreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    icongreen.iconSize = new GSize(20, 22);//normal 20 22
    icongreen.shadowSize = new GSize(1, 1);
    icongreen.iconAnchor = new GPoint(12, 8);
    icongreen.infoWindowAnchor = new GPoint(5, 1);
		map.addOverlay(new GMarker(point, icongreen));});*/
		map.setCenter(point, 15);
              var marker = new GMarker(point);
              map.addOverlay(marker);
			map.closeInfoWindow();
			document.getElementById("end_long").value =lon;
			document.getElementById("end_lat").value =lat;
			
		//window.location="ex_3p.php?lat="+lat+"&lng="+lon;
		}
		
		function show_map(){
			var start_lat = document.getElementById("start_lat").value;
			var end_lat = document.getElementById("end_lat").value;
			var start_long = document.getElementById("start_long").value;
			var end_lat = document.getElementById("end_lat").value;
			
			document.getElementById("map").innerHTML = document.getElementById("start_lat").value;
		
		}
		function initialize() {
			var start_lat = document.getElementById("start_lat").value;
			var end_lat = document.getElementById("end_lat").value;
			var start_long = document.getElementById("start_long").value;
			var end_long = document.getElementById("end_long").value;
			var start = parseFloat(start_lat);
			var start1 = parseFloat(start_long);
                var center = new google.maps.LatLng(start,start1);
                var myOptions = {
                    zoom: 17,
                    center: center,
                    scrollwheel: false,
                    mapTypeControl: false,
                    navigationControl: true,
            	    disableDefaultUI: true,
            	    streetViewControl: false,
                    noClear: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
//                map = new google.maps.Map(document.getElementById("map"), myOptions);
		map_div = document.getElementById("map");
		map = new google.maps.Map(map_div,myOptions);

                var rendererOptions = {
                    draggable: true
                };

                var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
                var directionsService = new google.maps.DirectionsService();

                directionsDisplay.setMap(map);
                directionsDisplay.setPanel(document.getElementById("route"));

            var request = {
                origin:  start_lat + "," + start_long,
                destination: end_lat + "," + end_long,
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            };
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });
        }

    </script>

    <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
    
    
    
</head>

<body>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&language=th'></script>
<div id="header"><h1>CREATE TRIP</h1><hr /></div>

<div id="center">
<form action="insert_trip.php">
TRIP NAME : <input type="text" name="trip_name"  /><br /><br />
Start Point <br /> lattitude :<input type="text" name="start_lat" id="start_lat" /><br />
longtitude :<input type="text" name="start_long" id="start_long" /><img src="simpleMap.png" width="30px" height="30px" id = "1" onclick="load()"  /><br /><br />
End Point<br /> lattitude :<input type="text" name="end_lat" id="end_lat"/><br />
longtitude :<input type="text" name="end_long" id="end_long" /><img src="simpleMap.png" width="30px" height="30px" id = "2" onclick="load2()"  /><br /><br />
Show Trip <img src="google_maps_icon.png" width="50px" height="50px" onclick="initialize()"/><br /><br />

CarID : <select name="car_id" id ="car_id" onchange="piccar()">
<option value=""><-- Please Select Item --></option>

<?php

$cn = @mysql_connect("localhost","root","adminadmin");
if(!$cn){
	echo "fail<br>";
	exit;
}
mysql_select_db("gps",$cn);
$sql = "SELECT * FROM gps.car";
$result = mysql_query($sql,$cn);
$i=1;
while($row = mysql_fetch_array($result)){
	if($i==20){
	mysql_close($cn);
	
	}

	else{ ?>
	<option value="<? echo $row['pic'] ?>"> <? echo $row['car_id'] ?> </option>
	<? }
	
}?>



</select><br /><br />
Driver Name :<select name="user_id" id="user_id" onchange="picuser()">
<option value=""><-- Please Select Item --></option>

<?php

$cn = @mysql_connect("localhost","root","adminadmin");
if(!$cn){
	echo "fail<br>";
	exit;
}
mysql_select_db("gps",$cn);
$sql = "SELECT * FROM gps.driver";
$result = mysql_query($sql,$cn);
$i=1;
while($row = mysql_fetch_array($result)){
	if($i==20){
	mysql_close($cn);
	
	}

	else{ ?>
	<option value="<? echo $row['pic'] ?>"> <? echo $row['name'] ?> </option>
	<? }
	
}?>



</select><br /><br />
<input type="submit" value="Create Trip" />
</form>
</div>

<div id="map" style=" height: 300px">

</div>
<!--<div id="rightmap" style="width: 50px; height: 50px">

</div>-->	
<div id="route" style="width: 25%; height:480px; float:right; border: 1px solid black; overflow: auto;"></div>
            
</body>
</html>
