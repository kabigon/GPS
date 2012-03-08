<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<title>Find Postal Address of any Location on Google Maps</title> 
<meta name="Description" content="Find the Postal Address of any Location on Google Maps"/> 
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA6C4bndUCBastUbawfhKGURTPcAgFsBQ5lmS5najHkCztcsKGexSNpYrYB9Y276wTymXFY2BGeSHhFw" type="text/javascript"></script> 
<style type="text/css"> 
    @import url("http://www.labnol.org/assets/css/labnol.css");
    @import url("http://www.labnol.org/assets/css/gmaps/readers.css");
    #searchenclosure { padding: 10px 0px 10px 20px; width: 870px; }
</style> 
<script type="text/javascript"> 
 
    var map = null;
    var geocoder = null;
 
    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map"));
     map.addControl(new GLargeMapControl()); 
     map.addControl(new GMapTypeControl()); 
     map.setCenter(new GLatLng(37.4419, -122.1419), 14);
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
        geocoder.getLocations(latlng, function(addresses) {
          if(addresses.Status.code != 200) {
            alert("reverse geocoder failed to find an address for " + latlng.toUrlValue());
          }
          else {
		  
            address = addresses.Placemark[0];
            var myHtml = address.address;
            map.openInfoWindow(latlng, myHtml);
          }
        });
      }
    }
    </script> 
</head> 
<body onload="initialize()" onunload="GUnload()"> 
<div id="frame"> 
<div id="contentheader"> 
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#990000"> 
<tr> 
<td width="250"><a name="top" href="http://www.labnol.org/"><img src="http://www.labnol.org/assets/images/digital-inspiration.gif" alt="Digital Inspiration Technology Guide" width="240" height="50" border="0" align="middle"/></a></td> 
<td> 
<!-- Google CSE Search Box Begins --> 
<form action="http://www.labnol.org/"> 
<div align="center"> 
<input id="google-search-box" name="s" size="45" type="text"> 
<input type="submit" id="google-search-button" value="Search"> 
</div> 
</form></td> 
<td><p id="labnol-menu"><a href="http://www.labnol.org/">Tech Blog</a>&nbsp; &nbsp; <a href="http://digitalinspiration.com/">Tech Answers</a>&nbsp; &nbsp; <a href="http://www.labnol.org/about/">About Us</a></p> </td> 
</tr> 
</table> 
</div> 
<div id="searchenclosure"> 
<form action="#" onsubmit="showAddress(this.address.value); return false" onreset="resetOverlay();"> 
<h3 class="post-title">Find the exact address of any point on earth with Google Maps</h3> 
<p id="instruction">Step 1: Use the search box to find an approximate location on Google Maps. <br/> 
Step 2: Now click any point on Google Maps to see its address.</p> 
<p> 
<input type="text" size="50" name="address" value="Enter your location here.." onfocus="this.value=''"/> 
<input type="submit" value="Search"/> 
<br/> 
<font color="#808080">Tip: You can use your zip code, address or city name.</font> </p> 
<div id="map" style="width:850px; height:500px"></div> 
</form> 
</div> 
<div style="clear: both;">&#160;</div> 
</div> 
<!-- google_ad_section_start(weight=ignore) --> 
<p class="foot">&copy; 2004-2010 <a href="http://www.labnol.org/">Digital Inspiration</a> - Technology, &aacute; la Carte</p> 
</body> 
</html> 