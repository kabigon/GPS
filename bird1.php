<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Strict//EN”

    “http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd”>

<html xmlns=”http://www.w3.org/1999/xhtml”>

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<title>Project 1</title>
<script src="jquery-1.6.3.min.js"></script>



<!– Embed API Key–>
	<style type = "text/css">
	#test {background-image:url(Img/bg2.jpg);width:100%;height:100%;color:#FFFFFF}
	#mapja {margin-left:auto;margin-right:auto; width:100%;height:100%;}
	#map {color:#000000;margin-left:auto;margin-right:auto; text-align:center;}
	#comment{float:left;margin-left:50px}
	#nevigator{text-align:right;margin-left:100px;margin-right:100px}
	#end {margin-left:0px;margin-right:0px}
	#krop{width:100%;height:500px;text-align:center;display:inline}
	#long{}
	body{text-align:center}
	#tripbar{float:left;margin-left:100px;}
	#showlat{}
	.style1 {font-family: "Comic Sans MS"}
	hr {margin-top:0px;size:20px}
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
	#eiei{
	background-color:#FFFF00;
	color:
	#FFFFFF
	width:30px;
	}
	#eiei2{
	background-color:#990000;
	width:30px;
	}
	#eiei3{
	background-color:#0099FF;
	width:30px;
	}
	#search{
	float:right;
	margin-bottom:0px;
	}
	#login{
	visibility:hidden;
	}
.style3 {color: #666666}
    </style>
<script language="javascript">
	function test(){
		
	}
</script>
<!-- AJAX -->
<script type="text/javascript">
var i =0;
function Ajax(){


var xmlHttp;
	try{	
		xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e){
		    try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){
				alert("No AJAX!?");
				return false;
			}
		}
	}

xmlHttp.onreadystatechange=function(){
	if(xmlHttp.readyState==4){
		
		document.getElementById('ReloadThis').innerHTML=xmlHttp.responseText;
		//setTimeout("Ajax()",1000);
	}
}
i++;
xmlHttp.open("GET","/GPS/999.php?name="+i,true);
xmlHttp.send(null);
setTimeout("Ajax()",5000);
}


</script>

<SCRIPT language=JAVASCRIPT>
  function herher(){
	javascript:NewWindow=window.open('Login.php','newWin','width=450,height=400,left=0,top=0,toolbar=No,location=No,scrollbars=No,status=No,resizable=No,fullscreen=No');
NewWindow.focus();
void 0;}
</SCRIPT>
<div id="showlat">
<?php
$cn = @mysql_connect("localhost","GPS","cTTKBA0p");
if(!$cn){
	echo "fail<br>";
	exit;
}
mysql_select_db("GPS",$cn);
$sql="select * from GPS.location order by id desc limit 1;";;
$result = mysql_query($sql,$cn);
while($row = mysql_fetch_array($result)){
		$lat = $row['lat'];
		$long = $row['long'];
		$time = $row['time'];
		$trip_id =$row["trip_id"];
		//echo $lat . "<br>" . $long;
	}
mysql_close($cn);

//แปลงค่า longtitude lattitude ให้เป็นค่าที่ต้องการ

echo "Lat Database : ". $lat;//1343.8960
echo " Long Database : ".$long . "<br>";//10046.8924

$newlong = substr($long,3); //เอาตัวที่ 4 ถึงตัวสุดท้าย
$newlat = substr($lat,2);


$floatlong = floatval($newlong); // แปลงเป็น float
$floatlat = floatval($newlat);
$floatlong= $floatlong/60; //เอาค่าที่ได้มา หาร 60
$floatlat= $floatlat/60;
$newlong2 = substr($long,0,3); //เอาตัวที่ 0 ถึง 2

echo " Lat : " . $newlat . " /60 = ".$floatlat . " Long : " .$newlong ." /60 = ".$floatlong . "<BR>" ;
echo " Time : ".$time . "   Trip id : " . $trip_id . "<br>";

$long = $newlong2 + $floatlong; // นำตัว 0 ถึง 2 มารวมกับตัวที่หาร 60 แล้ว

$newlat2 = substr($lat,0,2);
$lat = $newlat2 + $floatlat;
echo "Lat = " .$lat;
echo "long = ".$long;

?>
</div>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAwCJvXcuK-yhXg5-rmW_WSRSjPdg9q1PN1dBkFmcXVY9-C4qgKhRtq_Zn49VlscMWhoBzIqVGJRbTVA" type="text/javascript"></script>

<script type="text/javascript">


    //<![CDATA[
	
	
	var icongreen = new GIcon(); 
    icongreen.image = 'http://pegasus.it.kmitl.ac.th/GPS/bird.jpg';
    icongreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    icongreen.iconSize = new GSize(20, 22);//normal 20 22
    icongreen.shadowSize = new GSize(1, 1);
    icongreen.iconAnchor = new GPoint(12, 8);
    icongreen.infoWindowAnchor = new GPoint(5, 1);
	
	var map;
	 var geocoder;


    function load() {
	
	
      if (GBrowserIsCompatible()) {

       // กำหนด DIV tag สำหรับ Map โดยเข้าถึงแบบ DOM

        map = new GMap2(document.getElementById("map"));
		//geocoder = new GClientGeocoder();
      // Add Map Control และ Map Type
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
    // กำหนด ค่าพิกัดของตำแหน่งเริ่มต้นบนแผนที่ 
		var lat = parseFloat(<?php  echo $lat ?> );
		var long = parseFloat(<?php echo $long ?> );
		var point = new GLatLng(lat,long);
        map.setCenter(new GLatLng(lat, long), 17);
		var marker = new GMarker(point,icongreen);
		map.addOverlay(marker);
		//setTimeout("load()",1000);
      }

    }
	function initialize() {
		  GEvent.addListener(map,"click", function(overlay,latlng) {     
          if (latlng) {   
		  	var matchll = /\(([-.\d]*), ([-.\d]*)/.exec( latlng );
			if ( matchll ) { 
					var lat = parseFloat( matchll[1] );
					var lng = parseFloat( matchll[2] );
					lat = lat.toFixed(6);
					lng = lng.toFixed(6);
				}
            var myHtml = "Latitude : " +lat + "Longtitude : " + lng + "<br>"+ "ต้องการจุดหมายที่นี่ คลิ๊ก :<br> <input type='button' onClick='javascript:Addpoint("+lat+","+lng+");' value='ทำการบันทึก'>";

            map.openInfoWindow(latlng, myHtml);
			
          }
		  
      });
 }

	function Addpoint(lat,lon){
		//ติดต่อ database
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
		//window.location="ex_3p.php?lat="+lat+"&lng="+lon;
		}
	
function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(address,
          function(point) {
            if (!point) {
              alert("ไม่เจอสถานที่ ที่ต้องการค้นหา");
            } else {
				
              map.setCenter(point, 15);
              var marker = new GMarker(point);
              map.addOverlay(marker);
              marker.openInfoWindowHtml(address);
			  
            }
          }
        );
      }
    }
	
    //]]>
	

	
	
    </script>

    <!--<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>-->
</head>
<div align="center">
<body onLoad="load(),initialize()" onUnload="GUnload()" align="center"><span class="style1"> </span>
<div id="test" align="left">
<div id="eiei">&nbsp;&nbsp </div>
<div id="eiei2">&nbsp;&nbsp </div>
<div id="eiei3">&nbsp;&nbsp </div>
	<center><h1>&nbsp;GOOGLE MAP </h1></center>
<div id="nevigator">

  <!--&nbsp;&nbsp;&nbsp;&nbsp;คนขับรถ &nbsp;&nbsp;|&nbsp;&nbsp;รถขนส่ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a onClick="loginja()" class="link" > Login </a></b>-->
<!--<div id="search">
<form action="#" onSubmit="showAddress(this.address.value); return false">
<input id="huhu" type="text" size="80" name="address"  value="ใส่จังหวัด อำเภอ ตำบล ถนน เพื่อทำการค้นหาตำแหน่ง" />
<input name="submit" type="submit" value="ทำการค้นหา" />
</form>
</div><br><br><br>-->
<hr>
<script>

/* Using multiple unit types within one animation. */

/*$("#eiei").mousemove(function(){
  $("#map").hide("slow");
});*/

$("#eiei").mouseout(function () {
      $("#map").show(2000);
    });
	
$("#eiei2").click(function () {
if ($("#map").is(":hidden")) {
$("#map").slideDown("slow");
} else {
$("#map").hide();
}
});

$("#eiei3").click(function(){
	$("#map").fadeToggle("slow","linear");
});

$("#huhu").focus(function(){

	$("#huhu").val("");
});
$("#huhu").blur(function(){
	$("#huhu").val("ใส่จังหวัด อำเภอ ตำบล ถนน เพื่อทำการค้นหาตำแหน่ง");
});

</script>
<br><br>

  <div id="mapja" align="center" >


    	<div id="krop">
     
      <div id="map" style="width: 500px; height: 300px" align="center">  </div>
      
      </div>
      <!--<div id="tripbar">TRIP<br>
      
      <table width="200" border="1">
        <tr>
          <td bordercolor="#009900" bgcolor="#FFFF00"><span class="style3">TEST</span></td>
        </tr>
        <tr>
          <td bordercolor="#009900" bgcolor="#FFFF00"><span class="style3">TEST</span></td>
        </tr>
        <tr>
          <td bordercolor="#009900"  bgcolor="#FFFF00"><span class="style3">TEST</span></td>
        </tr>
        <tr>
          <td bordercolor="#009900" bgcolor="#FFFF00"><span class="style3">TEST</span></td>
        </tr>
        <tr>
          <td bordercolor="#009900" bgcolor="#FFFF00"><span class="style3">TEST</span></td>
        </tr>
      </table>
      </div>-->
      <br>
      
      

  
    
    <?php //echo "Long: " . $long . " Lat: " . $lat ?>
    
    <br><br>
<div id="end">
<hr>
</div><!--close div end --> 
 	
</div><!--close div mapja-->


</body>
</div>
</html>
