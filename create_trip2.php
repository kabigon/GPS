<?php
session_start();
$_SESSION["user"] = "Kabigon2";
$cn = @mysql_connect("localhost", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <script src="Scripts/jquery.min.js"></script>
        <script src="Scripts/modernizr.foundation.js"></script>
        <script src="Scripts/foundation.js"></script>
        <script src="Scripts/app.js"></script>
        <link rel="stylesheet" href="css/foundation.css">
            <link rel="stylesheet" href="css/app.css">

                <style type = "text/css">

                    #content {background-image:url(Img/bg5.png); width:530pt ; height:500pt; margin-left: 10px}
                    #showpiccar{}
                    #center{float:left;width:100%;}
                    #map{float:left;width:100%}
                    #rightmap{float:right;width:24%;font-size:5px}
                    #searchenclosure{visibility: hidden;padding-top: 10px;}
                    #showshow{}
                    #txtHint{margin-left:70px;background-color:#FFFFFF;width:215px}

                    .link2:link{

                        color:#333333;
                        text-decoration:none;
                        font-family:Verdana, Arial, Helvetica, sans-serif;
                    }
                    .link2:visited{
                        color:#2F4F4F;
                        text-decoration:none;
                    }
                    .link2:active{
                        color:#2F4F4F;
                        text-decoration:none;
                    }
                    .link2:hover{
                        color:#FF6600;
                        text-decoration:none;
                    }
                </style>
                <script type="text/javascript">
                    function picuser(){
                        //window.alert(document.getElementById("user_id").value);
                        document.getElementById("searchenclosure").style.visibility = 'hidden';
                        var t=document.getElementById("user_id").value;
		        
	
                        document.getElementById("map").innerHTML="<img src="+document.getElementById("user_id").value+ " width=300px height =300px/>" ;	
                        //document.getElementById("route").innerHTML = "ohh" ;
                    }
                    function piccar(){
                        document.getElementById("searchenclosure").style.visibility = 'hidden';
		
                        document.getElementById("map").innerHTML="<img src="+document.getElementById("car_id").value+ " width=300px height =300px/>" ;	
                    }
	
                </script>


                <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAwCJvXcuK-yhXg5-rmW_WSRSjPdg9q1PN1dBkFmcXVY9-C4qgKhRtq_Zn49VlscMWhoBzIqVGJRbTVA" type="text/javascript"></script>

                <script type="text/javascript">


                    var map = null;
                    var geocoder = null;
 
                    function load() {
                        document.getElementById("searchenclosure").style.visibility = 'visible';
                        document.getElementById("almap1").style.display="block";
                        document.getElementById("almap2").style.display="none";
                        var lat = parseFloat(document.getElementById("start_lat").value);
                        var lng = parseFloat(document.getElementById("start_long").value);
                        if (GBrowserIsCompatible()) {
                            map = new GMap2(document.getElementById("map"));
                            map.addControl(new GLargeMapControl3D()); 
                            map.addControl(new GMapTypeControl()); 
                            map.setCenter(new GLatLng(lat, lng), 14);
                            map.enableScrollWheelZoom();
                            geocoder = new GClientGeocoder(); //ตัวแปรเอาไว้ search 
                            GEvent.addListener(map, "click", clicked);
					
                        }
                    }
                    function load2() {
                        document.getElementById("searchenclosure").style.visibility = 'visible';
                        document.getElementById("almap1").style.display="none";
                        document.getElementById("almap2").style.display="block";
                        if (GBrowserIsCompatible()) {
                            map = new GMap2(document.getElementById("map"));
                            map.addControl(new GLargeMapControl()); 
                            map.addControl(new GMapTypeControl()); 
                            map.setCenter(new GLatLng(13.7312933, 100.7811), 14);
                            map.enableScrollWheelZoom();
                            geocoder = new GClientGeocoder();
                            GEvent.addListener(map, "click", clicked2);
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
                                    address = addresses.Placemark[0] ;
                                    var tt = address.address;
                                    var myHtml = address.address;
                                    map.openInfoWindow(latlng, myHtml);
                                    document.getElementById("location1").value=tt;
                                    document.getElementById("start_long").value =lng;
                                    document.getElementById("start_lat").value =lat;
                                }
                            });
                            /*geocoder.getLocations(latlng, function(addresses) {
                          if(addresses.Status.code != 200) {
                            alert("reverse geocoder failed to find an address for " + latlng.toUrlValue());
                          }
                          else {
                            address = addresses.Placemark[1] ;
                                        var tt = address.address;
                            var myHtml = address.address + "<br><input type='button' onClick='javascript:Addpoint("+lat+","+lng+");' value='Save'>";
                            map.openInfoWindow(latlng, myHtml);
                                        document.getElementById("location1").value=tt;
			
                          }
                        });*/
                        }
                    }
                    function clicked2(overlay, latlng) {
                        if (latlng) {
                            var matchll = /\(([-.\d]*), ([-.\d]*)/.exec( latlng );
                            var lat = parseFloat( matchll[1] );
                            var lng = parseFloat( matchll[2] );
                            geocoder.getLocations(latlng, function(addresses) {
                                if(addresses.Status.code != 200) {
                                    alert("reverse geocoder failed to find an address for " + latlng.toUrlValue());
                                }
                                else {
                                    address = addresses.Placemark[0] ;
                                    var tt = address.address;
                                    var myHtml = address.address;
                                    map.openInfoWindow(latlng, myHtml);
                                    document.getElementById("location2").value = tt;
                                    document.getElementById("end_long").value =lng;
                                    document.getElementById("end_lat").value =lat;
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
                        document.getElementById("loaction1").value =tt;
			
                        //window.location="ex_3p.php?lat="+lat+"&lng="+lon;
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

                    function initialize() {
                        document.getElementById("searchenclosure").style.visibility = 'hidden';
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

                    function showHint(){
	
                        if(document.getElementById("location1").value ==""){
                            document.getElementById("txtHint").innerHTML="";
                        }
		
                        if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                        }else{// code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function(){
		
                            if (xmlhttp.readyState==4&&xmlhttp.status==200){
                                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
                            }
                        }
		
                        xmlhttp.open("GET","eiei2.php?q="+document.getElementById("location1").value,true);
                        xmlhttp.send();}
	
                    function ssss(test){
		
		
                        document.getElementById("txtHint").innerHTML="";
		
                        if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                        }else{// code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function(){
		
                            if (xmlhttp.readyState==4&&xmlhttp.status==200){
                                document.getElementById("start_lat").value=xmlhttp.responseText;
                            }
                        }
		
                        xmlhttp.open("GET","552.php?q="+test,true);
                        xmlhttp.send();}

                    function genAuthen(){
                        var austlat = document.getElementById("start_lat").value;
                        var auedlng = document.getElementById("end_long").value;
                        if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                        }else{// code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function(){
		
                            if (xmlhttp.readyState==4&&xmlhttp.status==200){
                                document.getElementById("md5").value=xmlhttp.responseText;
                            }
                        }
		
                        xmlhttp.open("GET","genMD5.php?start_lat="+austlat+"&end_lng="+auedlng,true);
                        xmlhttp.send();
                    }	
		
	
	
	
                </script>

                <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>



                </head>

                <body>
                    <script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&language=th'></script>
                    <div id="content" style="padding-top: 10px">
                        <h3 style="color: #888">Create Trip</h3>
                        <form action="insert_trip.php">


                            <div id="left" style="float: left">
                                <div style="float: left;">
                                    <label>Trip Name</label> 

                                    <input type="text" name="trip_name" class="input-text" value=""/>
                                    Select Car 
                                    <select name="car_id" id ="car_id" onchange="piccar()" class="">
                                        <option value=""><-- Please Select Item --></option>
                                        <?php
                                        $sql = "SELECT * FROM gps.car where created_by='".$_SESSION["user"]."'";
                                        $result = mysql_query($sql, $cn);
                                        $i = 1;
                                        while ($row = mysql_fetch_array($result)) {
                                            if ($i == 20) {
                                                mysql_close($cn);
                                            } else {
                                                ?>
                                                <option value="<?php echo $row['pic'] ?>"> <?php echo $row['car_id'] ?> </option>
                                            <?php }
                                        } ?>
                                    </select>
                                    Module Serial
                                    <input type="text" name="module_id" class="input-text"/>
                                    Select Driver
                                    <select name="user_id" id="user_id" onchange="picuser()">
                                        <option value=""><-- Please Select Item --></option>

                                        <?php
                                        $sql = "SELECT * FROM gps.driver where created_by='".$_SESSION["user"]."'";
                                        $result = mysql_query($sql, $cn);
                                        $i = 1;
                                        while ($row = mysql_fetch_array($result)) {
                                            if ($i == 20) {
                                                mysql_close($cn);
                                            } else {
                                                ?>
                                                <option value="<?php echo $row['pic'] ?>"> <?php echo $row['name'] ?> </option>
                                            <?php }
                                        } ?>
                                    </select>
                                    
                                    Destination Email
                                    <input type="text" name="des_email" value="Insert Email to send Authen code" class="input-text" onClick="this.value=''"/>
                                    <span>Start Point  <img src="simpleMap.png" width="30px" height="10px" id = "1" onclick="load()"  /></span>
                                    <?php
                                    $username = $_SESSION["user"];
                                    $sql = "select * from gps.user where username = '$username'";
                                    $result = mysql_query($sql, $cn);
                                    $row1 = mysql_fetch_array($result);
                                    $address = $row1["address"];
                                    ?>
                                    <input type="text"  name="location1" id="location1" onKeyUp ="showHint()" size="30" value="<?php echo($address); ?>" class="input-text"/><div id="txtHint" ></div>

                                    Latitude <input type="text" name="start_lat" id="start_lat" value="<?php echo($row1["lat"]); ?>" class="input-text"/>
                                    Longitude <input type="text" name="start_long" id="start_long" value="<?php echo($row1["long"]); ?>" class="input-text"/>
                                    <span>End Point <img src="simpleMap.png" width="30px" height="10px" id = "2" onclick="load2()"  /></span>
                                    <input type="text" name="location2" id="location2" size="30" class="input-text"/>
                                    Latitude <input type="text" name="end_lat" id="end_lat" class="input-text"/>
                                    Longitude <input type="text" name="end_long" id="end_long" class="input-text"/>
                                    Find route <img src="google_maps_icon.png" width="50px" height="50px" onclick="initialize()"/><br/><br/>
                                    Authen Code
                                    <input type="text" name="authen_code" id="md5" class="input-text" onfocus="genAuthen()"/>

                                    <input type="submit" value="Create Trip" class="small nice button" style="float: right"/>
                                </div>

                            </div>
                        </form>


                        <div id="right" style="float: right;">
                            <div id="searchenclosure"> 
                                <form action="#" onsubmit="showAddress(this.address.value); return false " onreset="resetOverlay();"> 
                                    <p> 
                                        <input type="text" size="50" name="address" value="Enter your location here.." onfocus="this.value=''" /> 
                                        <input type="submit" value="Search" /> 
                                        <br/>
                                    </p>
                                    <small class="error" style="display: none" id="almap1">***Select start place </small>
                                    <small class="error" style="display: none" id="almap2">***Select destination place</small>
                                </form>
                            </div>
                            <div id="map" style=" height: 300px" align="center">


                            </div>
                        </div>

                    </div>

                    <!--<div id="rightmap" style="width: 50px; height: 50px">
                    
                    </div>-->	
                    <div id="route" style="width: 25%; height:480px; float:right; border: 1px solid black; overflow: auto; visibility: hidden;"></div>
                </body>
                </html>