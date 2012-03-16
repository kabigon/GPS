<!--
You are free to copy and use this sample in accordance with the terms of the
Apache license (http://www.apache.org/licenses/LICENSE-2.0.html)
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps V3 API Sample</title>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">

      function initialize() {
        var mapDiv = document.getElementById('map-canvas');
        var map = new google.maps.Map(mapDiv, {
          center: new google.maps.LatLng(13.7312933, 100.7811),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var path = [new google.maps.LatLng(13.730433, 100.78127900000004),
          new google.maps.LatLng(13.730443, 100.78047400000003),
          new google.maps.LatLng(13.730141, 100.78126799999995),
          new google.maps.LatLng(13.730443, 100.78034500000001)];
      
        var line = new google.maps.Polyline({
          path: path,
          strokeColor: '#ff0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });
      
        line.setMap(map);
      }
      

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body style="font-family: Arial; border: 0 none;">
    <div id="map-canvas" style="width: 500px; height: 400px"></div>
  </body>
</html>
​