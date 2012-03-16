<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAwCJvXcuK-yhXg5-rmW_WSRSjPdg9q1PN1dBkFmcXVY9-C4qgKhRtq_Zn49VlscMWhoBzIqVGJRbTVA" type="text/javascript"></script>

<script type="text/javascript">
var icongreen = new GIcon(); 
    icongreen.image = 'http://pegasus.it.kmitl.ac.th/GPS/bird.jpg';
    icongreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
    icongreen.iconSize = new GSize(20, 22);
    icongreen.shadowSize = new GSize(1, 1);
    icongreen.iconAnchor = new GPoint(12, 8);
    icongreen.infoWindowAnchor = new GPoint(5, 1);
	
	


    function load() {
	//window.alert("test");
	/*document.getElementById("rightmap").innerHTML = "<form action='#' onSubmit='showAddress(this.address.value); return false'>" + "<input id='huhu' type='text' size='30' name='address'  value='' />" + "<input name='submit' type='submit' value='??????????' /> </form>";*/
	
      if (GBrowserIsCompatible()) {

       // ????? DIV tag ?????? Map ????????????? DOM

        var map = new GMap2(document.getElementById("map"));

      // Add Map Control ??? Map Type

        map.addControl(new GSmallMapControl());//????????????????????????????????????????????Google 

        map.addControl(new GMapTypeControl());//??????????????????????????????map????????Google Map

    // ????? ?????????????????????????????????? 
		var point = new GPoint(13.730433, 100.781279);
        map.setCenter(new GLatLng(13.7312933, 100.7811), 17);
		
        
		var marker = new GMarker(point,icongreen);
		map.addOverlay(marker);
		
		GEvent.addListener(map,"click", function(overlay,latlng) {     
          if (latlng) {   
		  	var matchll = /\(([-.\d]*), ([-.\d]*)/.exec( latlng );
			if ( matchll ) { 
					var lat = parseFloat( matchll[1] );
					var lng = parseFloat( matchll[2] );
					lat = lat.toFixed(6);
					lng = lng.toFixed(6);
				}
				
            var myHtml = "Latitude : " +lat + "<br>" + "Longtitude : " + lng + "<br>"+ "????????????? ????? :<br> <input type='button' onClick='javascript:Addpoint("+lat+","+lng+");' value='???????????'>" ;

            map.openInfoWindow(latlng, myHtml);
			
          }
		  
      });
	
      }

    }

</script>
</head>

<body onload="load()">
<div id="map">

</div>
</body>
</html>
