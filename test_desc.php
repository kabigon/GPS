<!--ติดต่อ Database ดึงข้อมูลล่าสุด -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="jquery-1.6.3.min.js"></script>
<!– Embed API Key–>
	<style type = "text/css">
	#test {background-image:url(Img/bg2.jpg);width:100%;height:100%;color:#FFFFFF}
	#mapja {margin-left:20px;}
	#map {}
	#comment{float:left;margin-left:50px}
	#nevigator{margin-left:100px;margin-right:100px}
	#end {margin-left:100px;margin-right:100px}
	#krop{margin-left:100px;background-color:#D5FFD5;margin-right:100px}
	#long{}
	.style1 {font-family: "Comic Sans MS"}
	hr {margin-top:0px;}
	.mytextbox{background:#CCFFFF}
	
	.link:link{
	color:#FFFFFF;
	text-decoration:none;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	}
	.link:visited{
	color:#FFFFFF;
	text-decoration:none;
	}
	.link:active{
	color:#FFFFFF;
	text-decoration:none;
	}
	.link:hover{
	color:#FF9900;
	text-decoration:none;
	}
	
	
	
</style>





<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAwCJvXcuK-yhXg5-rmW_WSRSjPdg9q1PN1dBkFmcXVY9-C4qgKhRtq_Zn49VlscMWhoBzIqVGJRbTVA" type="text/javascript"></script>

<!-- ติดต่อ database ดึงข้อมูลล่าสุด -->
<?php
$cn = @mysql_connect("localhost","root","adminadmin");
if(!$cn){
	echo "fail<br>";
	exit;
}
mysql_select_db("gps",$cn);
$sql="select * from gps.location order by id desc limit 1;";;
$result = mysql_query($sql,$cn);
while($row = mysql_fetch_array($result)){
		$lat = $row['lat'];
		$long = $row['long'];
		//echo $lat . "<br>" . $long;
	}
mysql_close($cn);

//แปลงค่า longtitude lattitude ให้เป็นค่าที่ต้องการ



$newlong = substr($long,2); //เอาตัวที่ 4 ถึงตัวสุดท้าย
$newlat = substr($lat,2);
$floatlong = floatval($newlong); // แปลงเป็น float
$floatlat = floatval($newlat);
$floatlong= $floatlong/60; //เอาค่าที่ได้มา หาร 60
$floatlat= $floatlat/60;
$newlong2 = substr($long,0,2); //เอาตัวที่ 0 ถึง 2
$long = $newlong2 + $floatlong; // นำตัว 0 ถึง 2 มารวมกับตัวที่หาร 60 แล้ว
$newlat2 = substr($lat,0,3);
$lat = $newlat2 + $floatlat;


echo $long . "<br>";
echo $lat;

?>





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

		


      if (GBrowserIsCompatible()) {

       // กำหนด DIV tag สำหรับ Map โดยเข้าถึงแบบ DOM

        var map = new GMap2(document.getElementById("map"));

      // Add Map Control และ Map Type

        map.addControl(new GSmallMapControl());

        map.addControl(new GMapTypeControl());
    // กำหนด ค่าพิกัดของตำแหน่งเริ่มต้นบนแผนที่ 
		var long = <?php $long ?>;
		var lat = <?php $lat ?>;
		
		var point = new GPoint(long,lat);
        map.setCenter(new GLatLng(long,lat), 17);
		
		
		var marker = new GMarker(point);
		map.addOverlay(marker);
		//เมื่อเลื่อนแมฟ จะแสดง long lat ใต้ภาพ
		/*GEvent.addListener(map, "moveend", function() {
          var center = map.getCenter();
          document.getElementById("message").innerHTML = center.toString();
        });*/
		
		//click แล้วแสดงที่ mark ไว้
		GEvent.addListener(map, "click", function(marker, point) {
		map.addOverlay(new GMarker(point, icongreen));});
	
	
      }

    }
	

	
    //]]>

    </script>

    <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>


<body onLoad="load()" onUnload="GUnload()" ><span class="style1"> </span>
<div id="test">
<br>
	<center><h1>&nbsp;GOOGLE MAP </h1></center>
<div id="nevigator">
	
  &nbsp;&nbsp;&nbsp;&nbsp;HOME&nbsp;&nbsp;&nbsp;&nbsp;Setting&nbsp;&nbsp;&nbsp;&nbsp;People&nbsp;&nbsp;&nbsp;&nbsp;Setting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="Login.php" class="link" > Login </a></b>
  <button id="55">Test </button>
  <div id="google">google</div>
<hr></div>
<script>

/* Using multiple unit types within one animation. */

$("#55").click(function(){
  $("#google").animate({
    width: "70%",
    opacity: 0.4,
    marginLeft: "0.6in",
    fontSize: "3em",
    borderWidth: "10px"
  }, 1500 );
});
</script>
<br><br>
  <div id="mapja">

    <center>
    	<div id="krop">
        <br><br>
      <div id="map" style="width: 500px; height: 300px"></div>
      <br><br>
      </div>
    </center>
    <br><br>
 <div id="end">
 
<hr>
</div>  	
</div>


</body>
</html>
