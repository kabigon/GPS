<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Strict//EN”

    “http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd”>

<html xmlns=”http://www.w3.org/1999/xhtml”>

  <head>

    <meta http-equiv=”content-type” content=”text/html; charset=utf-8″/>

    <title>Google Maps JavaScript API Example</title>

<!– Embed API Key–>

    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAjYXu5YfqSZiHnTKn3ppgbRSjVONRCa6KKI4nTp1-ce8w9jZ_IBSEktvN9adS4RwvTRa3zLyYiTRehQ" type="text/javascript"></script>

    <script type=”text/javascript”>

    //<![CDATA[


    function load() {

      if (GBrowserIsCompatible()) {

       // กำหนด DIV tag สำหรับ Map โดยเข้าถึงแบบ DOM

        var map = new GMap2(document.getElementById("map"));

      // Add Map Control และ Map Type

        map.addControl(new GSmallMapControl());

        map.addControl(new GMapTypeControl());

    // กำหนด ค่าพิกัดของตำแหน่งเริ่มต้นบนแผนที่ 

        map.setCenter(new GLatLng(37.4419, -122.1419), 13);

      }

    }


    //]]>

    </script>

  </head>

  <body onload=”load()” onunload=”GUnload()”>

    <div id=”map” style=”width: 500px; height: 300px”></div>

  </body>

</html>