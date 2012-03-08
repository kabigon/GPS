<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script language="javascript">
function initialize() {
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
                //directionsDisplay.setPanel(document.getElementById("route"));

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
</head>

<body>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&language=th'></script>

</body>
</html>
