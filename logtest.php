<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {
	color: #000000;
	font-weight: bold;
}
-->
</style>

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

      if (GBrowserIsCompatible()) {

       // ????? DIV tag ?????? Map ????????????? DOM

        var map = new GMap2(document.getElementById("map"));

      // Add Map Control ??? Map Type

        map.addControl(new GSmallMapControl());

        map.addControl(new GMapTypeControl());

    // ????? ?????????????????????????????????? 
		var point = new GPoint(13.7312933, 100.7811);
        map.setCenter(new GLatLng(13.7312933, 100.7811), 17);
		
		
		var marker = new GMarker(point,icongreen);
		map.addOverlay(marker);
		map.addOverlay(new GMarker(point, icongreen));
		
		//?????????????? ?????? long lat ??????
		/*GEvent.addListener(map, "moveend", function() {
          var center = map.getCenter();
          document.getElementById("message").innerHTML = center.toString();
        });*/
		
		//click ??????????? mark ???
		GEvent.addListener(map, "click", function(marker, point) {
		map.addOverlay(new GMarker(point, icongreen));});
	
	
      }

    }
	

	
    //]]>

    </script>

    <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


</head>

<body onLoad="load()" onUnload="GUnload()" ><span class="style1"> </span>
<p class="style2">TRIP 1 </p>
<table width="560" height="160" border="0" bordercolor="#999999">
  <tr>
    <th width="106" height="33" bgcolor="#CC9900" scope="row"><div align="center" class="style1">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;</div></th>
    <td width="108" bgcolor="#CC9900"><div align="center" class="style1">&#3648;&#3623;&#3621;&#3634;</div></td>
    <td width="109" bgcolor="#CC9900"><div align="center" class="style1">Lattitude</div></td>
    <td width="108" bgcolor="#CC9900"><div align="center" class="style1">Longtitude</div></td>
    <td width="95" bgcolor="#CC9900"><div align="center" class="style1">Speed</div></td>
  </tr>
  <?php
  	$cn = @mysql_connect("localhost","root","adminadmin");
			if(!$cn){
				echo "fail<br>";
				exit;
			}
			
			mysql_select_db("gps",$cn);
			$sql = "SELECT * FROM gps.location where trip_id=20";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)){
		
			?>
  <tr>
    <th height="24" bgcolor="#FFFFFF" scope="row"> </th>
    <td bgcolor="#FFFFFF"><? echo $row["time"]; ?></td>
    <td bgcolor="#FFFFFF"><? echo $row["lattitude"]; ?></td>
    <td bgcolor="#FFFFFF"><? echo $row["longtitude"]; ?></td>
    <td bgcolor="#FFFFFF"><? echo $row["speed"]; ?></td>
  </tr>
  <? } ?>
  <tr>
    <th height="28" bgcolor="#FFFFFF" scope="row">&nbsp;</th>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <th height="32" bgcolor="#FFFFFF" scope="row">&nbsp;</th>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <th height="29" bgcolor="#FFFFFF" scope="row">&nbsp;</th>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

<div id="map" style="width: 500px; height: 300px"></div>
</body>
</html>
