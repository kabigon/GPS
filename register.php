<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="Scripts/jquery.min.js"></script>
        <script src="Scripts/modernizr.foundation.js"></script>
        <script src="Scripts/foundation.js"></script>
        <script src="Scripts/app.js"></script>
        <title>Register</title>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/app.css" />
        <link rel="stylesheet" href="TH Sarabun New/fonts/thsarabunnew.css" />
        <style type = "text/css">
            #test {background-image:url(Img/bg5.png); width:400pt ; height:500pt; margin-left: 10px}
            #register {float:right}
            #checkstatus {color:#FF0000}
            #chkpass{color:red}
            #chkpassok{color:green ; size:auto ;}



        </style>
        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAwCJvXcuK-yhXg5-rmW_WSRSjPdg9q1PN1dBkFmcXVY9-C4qgKhRtq_Zn49VlscMWhoBzIqVGJRbTVA" type="text/javascript"></script>
        <script  language="javascript">
            var map = null;
            var geocoder = null;
 
            function load() {
                document.getElementById("map_canvas").style.visibility = 'visible';
                if (GBrowserIsCompatible()) {
                    map = new GMap2(document.getElementById("map_canvas"));
                    map.addControl(new GLargeMapControl3D()); 
                    map.addControl(new GMapTypeControl()); 
                    map.setCenter(new GLatLng(13.7312933, 100.7811), 14);
                    map.enableScrollWheelZoom();
                    geocoder = new GClientGeocoder(); //ตัวแปรเอาไว้ search 
                    GEvent.addListener(map, "click", clicked);
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
                            document.getElementById("longitude").style.display="block";
                            document.getElementById("latitude").style.display="block";
                            document.getElementById("standardTexted").value=tt;
                            document.getElementById("long").value =lng;
                            document.getElementById("lat").value =lat;
                        }
                    });
                           
                }
            }
                   
            function chkpass(){

                var pass = document.register1.pass.value;
                var Rep= document.register1.rep.value;
                if(pass !="" || pass ==null){
                    if(pass == Rep){
                        $("#repassword").removeClass("red");
                        document.getElementById("alert").style.display="none";
                    }
                    else{
                        //   alert("kkkk");
                        $("#repassword").addClass("red");
                        document.getElementById("alert").style.display="block";
                    }
                }else{
                    $("#")
                }
                //  alert("SDF");

            }
                 
                    
        </script>

    </head>

    <body onload="load()">

        <div id="test">
            <h3 style="color: #888;font-family: THSarabunNew,Tahoma, sans-serif;">Register Form</h3>
            <form name="register1" action="register_process.php">

                <label for="username">Username </label>
                <input type="text" name="user"  class="input-text" id="username"/>
                <label for="password">Password </label> 
                <input type="password"  name="pass" id="password" class="input-text"/>
                <label for="repassword">Re - Password </label>  
                <input type="password" name="rep" onblur="javascript:chkpass()" id="repassword" class="input-text"/>
                <small class="error" style="display: none" id="alert">Wrong Password</small>
                <label for="email">Email</label> 
                <input type="text" name="email" class="input-text" id="email"/>
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="input-text" id="phone"/>
                <label for="company">Company name</label>
                <input type="text" name="company" class="medium input-text"/>
                <label for="standardTexted">Address </label>
                <small class="error" >Please choose location from the google map</small>
                <div id="map_canvas" style="height: 300px;width: 100%;">

                </div> 
                <textarea cols="15" rows="2" id="standardTexted" name="add" style="margin-top: 10px;"></textarea>
                <div class="row display">
                    <div class="two columns" id="latitude" style="display: none;">Latitude: <input type="text" name="long" id="long" class="input-text" style=" width: 100px"/></div>
                    <div class="two columns" id="longitude" style="display: none;">Longitude: <input type="text" name="lat"  id="lat" class="input-text" style=" width: 100px"/></div>
                    <div class="six columns"></div>
                </div>

                <label for="standardDropdown">Role :</label>
                <select name="role" id="standardDropdown">
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
                <input type="submit" value="register" class="nice radius small blue button" style="float: right"/>
            </form>


        </div>




    </body>
</html>
