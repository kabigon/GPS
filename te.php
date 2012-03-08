<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA6C4bndUCBastUbawfhKGURTPcAgFsBQ5lmS5najHkCztcsKGexSNpYrYB9Y276wTymXFY2BGeSHhFw" type="text/javascript"></script> 
<style type="text/css"> 

</style>
<script type="text/javascript"> 
 
    var map = null;
    var geocoder = null;
 
    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map"));
     map.addControl(new GLargeMapControl()); 
     map.addControl(new GMapTypeControl()); 
     map.setCenter(new GLatLng(13.7312933, 100.7811), 14);
     map.enableScrollWheelZoom();
        geocoder = new GClientGeocoder();
        GEvent.addListener(map, "click", clicked);
      }
    }
 
    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert("We're sorry but '" + address + "' cannot be found on Google Maps. Please try again.");
            } else {
     	     map.panTo(point); 
        }
      });
    }
  }
 
    function clicked(overlay, latlng) {
      if (latlng) {
	  	var matchll = /\(([-.\d]*), ([-.\d]*)/.exec( latlng );
		var lat = parseFloat( matchll[1] );
		var lng = parseFloat( matchll[2] );
        geocoder.getLocations(latlng, function(addresses) {
          if(addresses.Status.code != 200) {
            alert("reverse geocoder failed to find an address for " + latlng.toUrlValue());
          }
          else {
            address = addresses.Placemark[1] ;
			var myHtml2 = address.address;
            var myHtml = address.address + "<br> Lattitude = " + lat + "<br>Longtitude ="+lng +"<input type='button' onClick='javascript:Addpoint("+lat+","+lng+");' value='Save'>";
            map.openInfoWindow(latlng, myHtml);
			document.getElementById("textja").value = myHtml2;
          }
        });
      }
    }
	
		function Addpoint(lat,lon){
		//?????? database
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
		
		
    </script> 
</head> 
<body onload="initialize()" onunload="GUnload()"> 
<div id="searchenclosure"> 
<form action="#" onsubmit="showAddress(this.address.value); return false" onreset="resetOverlay();"> 

<p> 
<input type="text" size="50" name="address" value="Enter your location here.." onfocus="this.value=''"/> 
<input type="submit" value="Search"/> 
<br/>
</p>
</form>
</div>
<div id="map" style="width:850px; height:500px"></div>


<body>

<input type="text" id="textja"  size="50"/>
Start Point <br /> lattitude :<input type="text" name="start_lat" id="start_lat" /><br />
longtitude :<input type="text" name="start_long" id="start_long" />
</body>
</html>
