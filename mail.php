<?php
session_start();
$cn = @mysql_connect("localhost", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link rel="stylesheet" type="text/css" href="css/main_mail.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/main_mail.css" />
        <script src="Scripts/jquery.min.js"></script>
        <script src="Scripts/modernizr.foundation.js"></script>
        <script src="Scripts/foundation.js"></script>
        <script src="Scripts/app.js"></script>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/app.css" />
        <link rel="stylesheet" href="TH Sarabun New/fonts/thsarabunnew.css" />
        <title>GPS Tracking</title>


        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAwCJvXcuK-yhXg5-rmW_WSRSjPdg9q1PN1dBkFmcXVY9-C4qgKhRtq_Zn49VlscMWhoBzIqVGJRbTVA" type="text/javascript"></script>

        <script type="text/javascript">
            var icongreen = new GIcon(); 
            icongreen.image = 'http://pegasus.it.kmitl.ac.th/GPS/bird.jpg';
            icongreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
            icongreen.iconSize = new GSize(20, 22);
            icongreen.shadowSize = new GSize(1, 1);
            icongreen.iconAnchor = new GPoint(12, 8);
            icongreen.infoWindowAnchor = new GPoint(5, 1);
            function showAddress(address) {
                if (GBrowserIsCompatible()) {
                    map = new GMap2(document.getElementById("map"));
                    map.addControl(new GLargeMapControl()); 
                    map.addControl(new GMapTypeControl()); 
                    map.setCenter(new GLatLng(13.7312933, 100.7811), 14);
                    map.enableScrollWheelZoom();
                    geocoder = new GClientGeocoder();
                }
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
            function load() {
                //window.alert("test");
	
	
                if (GBrowserIsCompatible()) {

                    // กำหนด DIV tag สำหรับ Map โดยเข้าถึงแบบ DOM

                    var map = new GMap2(document.getElementById("map"));

                    // Add Map Control และ Map Type

                    map.addControl(new GSmallMapControl());

                    map.addControl(new GMapTypeControl());

                    // กำหนด ค่าพิกัดของตำแหน่งเริ่มต้นบนแผนที่ 
                    var point = new GPoint(13.7312933, 100.7811);
                    map.setCenter(new GLatLng(13.7312933, 100.7811), 14);
		
		
                    var marker = new GMarker(point,icongreen);
                    map.addOverlay(marker);
                    //เมื่อเลื่อนแมฟ จะแสดง long lat ใต้ภาพ
                    /*GEvent.addListener(map, "moveend", function() {
                  var center = map.getCenter();
                  document.getElementById("message").innerHTML = center.toString();
                });*/
		
                    //click แล้วแสดงที่ mark ไว้
	
	
                    /*GEvent.addListener(map,"click", function(overlay,latlng) {     
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
		  
              });*/
	
                }

            }
	
            function Addpoint(lat,lon){
                //ติดต่อ database
                var map = new GMap2(document.getElementById("map"));
                var point = new GLatLng(lat,lon);
	
                map.setCenter(point, 15);
                var marker = new GMarker(point);
                map.addOverlay(marker);
                map.closeInfoWindow();
                document.getElementById("start_long").value =lon;
                document.getElementById("start_lat").value =lat;
			
                //window.location="ex_3p.php?lat="+lat+"&lng="+lon;
            }
	

	
            //]]>
	
            function driver(){
                document.getElementById('map').style.display = 'none';
                document.getElementById('showdetail').style.display = 'none';
                document.getElementById("mail").style.display="inline";
                document.getElementById("mail").innerHTML=
                    "<p align='left' style=\"  margin-top: 10px;\"> <span style= \"color: #888; font-family: THSarabunNew,Tahoma, sans-serif;\" class='style14'>ข้อมูลคนขับรถ</span> </p>"
		
                <!--"<img src='bus-driver[1].gif' width='100px' height='100px' ><span class='style2'>Driver</span>" +"<center><table width='200' border='0' bordercolor='#000000' width='50px'>"-->
<?php
$sql = "SELECT * FROM gps.driver";
$result = mysql_query($sql, $cn);
while ($row = mysql_fetch_array($result)) {
?>
                    +"<table width='499' height='171' border='0' style= \"color: #888; font-family: THSarabunNew,Tahoma, sans-serif; font-size:20px;\">"
                    +"<tr><th width='160' scope='row'><img src='<?php echo $row['pic']; ?>' width='142' height='130' border='1' style=\"margin-top:15px; margin-bottom:10px;\"/></th>"
                    + "<td width='329'><br/><br/><p align='left'><span class='style13'>Driver name : <?php echo $row['name']; ?> </span></p>"
                    +"<p align='left'>Age : <?php echo $row['age']; ?></p>"
                    +"<p align='left'>Piority :  <?php echo $row["ac_time"]; ?>%  </p>"
                    +"<p align='left'>Created By : <?php echo $row['created_by']; ?> </p>"
                    +"<p align='right'><a href ='#' class = 'link2' onclick='profile_driver(<?php echo $row['user_id']; ?> )'>Read more.... </a></p></td></tr>"
                    +"</table>"     			
                            			
<?php }mysql_close($cn); ?>
        ;
    }
	
	
	
    function profile_driver(str)
    {
		
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("mail").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","profile.php?id="+str,true);
        xmlhttp.send();
    }
	
    function trip_des(){
        document.getElementById("map").innerHTML=""
	
<?php
//$cn = @mysql_connect("localhost", "root", "adminadmin");
//mysql_select_db("gps", $cn);
//$sql = "SELECT * FROM gps.trip order by trip_id desc ";
//$result = mysql_query($sql, $cn);
//while ($row = mysql_fetch_array($result)) {
?>
        <!--"<table width='420' height='344' border='0'><tr><th height='61'  colspan='3' scope='row'><div align='left'>Trip Name :<?php //echo $row["trip_name"];    ?> </div></th></tr>"-->
        <!--+ "<tr><th width='140' rowspan='2' scope='row'><img src='<?php //$carid = $row["car_id"];    ?>' width='100' height='100' border='1' /></th></tr></table>"-->
                	
<?php //} mysql_close($cn);    ?>
        ;
    }

    function car(){
        document.getElementById('map').style.display = 'none';
        document.getElementById('showdetail').style.display = 'none';
        document.getElementById("mail").style.display="inline";
        document.getElementById("mail").innerHTML=
            <!--document.getElementById("tttt").innerHTML=-->
	
       
        "<p align='left'> <span class='style14'>ข้อมูลรถยนต์</span> </p>" 
<?php
$cn = @mysql_connect("localhost", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
$sql = "SELECT * FROM gps.car";
$result = mysql_query($sql, $cn);

while ($row = mysql_fetch_array($result)) {
    ?>
                    +"<table width='499' height='171' border='0'><tr>"
                    +"<td width='165'><img src='<?php echo $row['pic']; ?>' width='155' height='150' border='1' /></td>"
                    +"<td width='329'><p align='left'><b>Car ID :<?php echo $row['car_id']; ?> </b></p>"
                    +"<p align='left'>Type : <?php echo $row['type']; ?></p><p align='left'>Priority : <?php echo $row["ac_time"]; ?>%  </p>"
                    +"<p align='left'><span class='style15'>Created_By : <?php echo $row['created_by']; ?>  </span></p>"
                    +"<p align='right'><a href ='#' class = 'link2' onclick=\"profile_car('<?php echo $row['car_id']; ?> ')\">Read more.... </a></p></td></tr>"
                    +"<tr><th>&nbsp;</th><td>&nbsp;</td></tr></table><hr>"
                            			
                            			
<?php } mysql_close($cn); ?>
        ;
    }
	
	
	
    function profile_car(str){
	
        //alert(str);
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("mail").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","profile_car.php?id="+str,true);
        xmlhttp.send();
    }


    function edit(str){
        document.getElementById('map').style.display = 'none';
        document.getElementById('showdetail').style.display = 'none';
        document.getElementById("mail").style.display="inline";
        
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("mail").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","edit_car.php?id="+str,true);
        xmlhttp.send();
    }
	
    function editfile_finish(str){
        document.getElementById('map').style.display = 'none';
        document.getElementById('showdetail').style.display = 'none';
        document.getElementById("mail").style.display="inline";
        var car_id = document.getElementById("car_id").value;
        var brand = document.getElementById("brand").value;
        var color = document.getElementById("color").value;
        var type = document.getElementById("type").value;
		
		
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("mail").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","chk_edit_car.php?car_id="+car_id+"&brand="+brand+"&color="+color+"&type="+type,true);
        xmlhttp.send();
    }
		
	
    function edit_driver(str){
        document.getElementById('map').style.display = 'none';
        document.getElementById('showdetail').style.display = 'none';
        document.getElementById("mail").style.display="inline";
		
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("mail").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","edit_driver.php?id="+str,true);
        xmlhttp.send();
    }
	
    function editdriver_finish(str){
        document.getElementById('map').style.display = 'none';
        document.getElementById('showdetail').style.display = 'none';
        document.getElementById("mail").style.display="inline";
        var name = document.getElementById("name").value;
        var sex = document.getElementById("sex").value;
        var age = document.getElementById("age").value;
        var PID = document.getElementById("PID").value;
		
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("mail").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","chk_edit_driver.php?name="+name+"&sex="+sex+"&age="+age+"&PID="+PID,true);
        xmlhttp.send();
    }
	
	
    function searchja(){

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("trip").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","show_search.php",true);
        xmlhttp.send();
    }
	
	
    function search_ja(){
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("trip").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","show_search.php?name="+document.getElementById("search").value,true);
        xmlhttp.send();
	
		
    }
	
	
    function delete_driver(str){
		
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("map").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","delete_driver.php?id="+str,true);
        xmlhttp.send();
    }
	
    function delete_car(str){
		
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("map").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","delete_car.php?id="+str,true);
        xmlhttp.send();
    }
	
    function show_map_trip(start_lat,start_long,end_lat,end_long){
        document.getElementById("mail").style.display="none";
        document.getElementById("map").style.display="inline";
		
        //alert(start_lat +" " + start_long + " " + end_lat +" " + end_long);
        var start = parseFloat(start_lat);
        var start1 = parseFloat(start_long);
        var start_lat1 = start_lat +"";
        var start_long1 = start_long +"";
        var end_lat1 = end_lat +"";
        var end_long1 = end_long +"";
		
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
        document.getElementById("showdetail").innerHTML="<b>---Show Detail---</b>";
        /*directionsDisplay.setPanel(document.getElementById("show_detail"));*/

        var request = {
            origin:  start_lat1 + "," + start_long1,
            destination: end_lat1 + "," + end_long1,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
        });
		
    }
		
    function detail(user,car,id){
        document.getElementById('showdetail').style.display = 'inline';		
        //document.getElementById("show_detail").innerHTML=user+":"+car;
			
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("showdetail").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","show_detail.php?user="+user+"&car="+car+"&id="+id,true);
        xmlhttp.send();
    }
		
    function detail2(){
        document.getElementById("show_detail").innerHTML="<b>---Show Detail---</b>";
    }	
	
    function login(){
        document.getElementById("login").innerHTML="| User:<input type='text' name='username' id='username' size=10 >Pass:<input type='password' name='password' id='password' size=10 ><input type='submit' value='Login' onclick='login_process()'><br>";
    }
    function login_process(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("login").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","login_process.php?username="+username+"&password="+password,true);
        xmlhttp.send();
    }
	
    function logout(){
        
		
    }
	
	
    function cre_trip(){
        //alert("test");
        window.open("create_trip.php","link","height=600,width=1000,scrollbars=no");
    }
    function cre_car(){
        //alert("test");
        window.open("create_car.php","link","height=380,width=300,scrollbars=no");
    }
    function cre_driver(){
        //alert("test");
        window.open("create_driver.php","link","height=380,width=300,scrollbars=no");
    }
	
    function showHint(str){
	
        if (str.length==0){ 
            document.getElementById("txtHint").innerHTML="";
            return;
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
		
        xmlhttp.open("GET","eiei.php?q="+document.getElementById("str").value,true);
        xmlhttp.send();}
	
	
    
        </script>


        <script type="text/javascript">
            function sss(str2){
                var str3 = str2+"";
                document.getElementById("str").value=str3;
                document.getElementById("txtHint").innerHTML="";
            }
	
	
            function searchja2(){
                document.getElementById("txtHint").innerHTML="";
                var str=document.getElementById("str").value;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById('mail').style.display = 'inline';
                        document.getElementById('map').style.display = 'none';
                        document.getElementById("mail").innerHTML=xmlhttp.responseText;
                       }
                }
                xmlhttp.open("GET","profile_car_and_driver.php?id="+str,true);
                xmlhttp.send();
                document.getElementById("str").value="";
		
            }
        </script>
    </head>

    <div align="center">

        <body onLoad="load()" onUnload="GUnload()">

            <div id="center" >
                <div id="header">

                </div>
                <div class="style4" id="nevigator">
                    <?php if ($_SESSION["rank"] == 'admin') { ?>
                    <span class="style1"><a href="mail.php" class="link" > HOME </a> | <a href="#" onclick="searchja()" class="link"> DETAIL </a> | <a href="#" onclick="driver()" class="link">DRIVER</a> | <a href="#" class="link" onclick="car()"> CAR </a>| <a href="#" class="link" onclick="trip_des()">TRIP</a>|<a href="javascript:void(0)"onclick="window.open('calendar/mailmail.php','link','height=380, width=500,scrollbars=no')"class="link" > History </a></span><div><?php echo "<span class='welcome'>Hi: <a href='home2.php' class='link3'>" . $_SESSION["user"] . "</a> | " . $_SESSION["rank"] . "<a href='logout.php'><img src='logout.png' width='40px' height='20px'></a></span>"; ?></div>

                        <div id="login">
                            <span class="style1"> </span>
                        </div>

                    </div>


                    <div id="cenbody" align="left">

                        <div id="krop">
                            <div id="tablena">

                                <table width="100%" height="490" border="1">
                                    <tr>
                                        <th  height="30" bgcolor="#666666" scope="row" style="padding-left: 10px;padding-top: 10px;padding-bottom: 0"><span class="style2" > เข้าสู่หน้าติดตามระบบ &nbsp;&nbsp;</span></th>
                                    </tr>
                                    <tr>
                                        <th height="20" bgcolor="#fcfcbf" scope="row"><div align="left" style="padding-left: 12px; margin-top: 5px;"><span class="style10" ><a href="#" onclick="driver()" class="link2">ประวัติคนขับ</a></span></div></th>
                                    </tr>
                                    <tr>
                                        <th height="26" bgcolor="#ffffcc" scope="row"><div align="left" style="padding-left: 12px; margin-top: 5px;"><span class="style10"><a href="#" onclick="car()" class="link2">ประวัติรถยนต์</a></span></div></th>
                                    </tr>
                                    <tr>
                                        <th height="25" bgcolor="#fcfcbf" scope="row"><div align="left" style="padding-left: 12px; margin-top: 5px;"><span class="style10"><a href="javascript:void(0)"onclick="window.open('create_driver.php','link','height=380, width=300,scrollbars=no')"  class="link2">เพิ่มข้อมูลคนขับ</a></span></div></th>
                                    </tr>
                                    <tr>
                                        <th height="29" bgcolor="#ffffcc" scope="row"><div align="left" style="padding-left: 12px; margin-top: 5px;"><span class="style10"><a href="javascript:void(0)"onclick="window.open('create_car.php','link','height=380, width=300,scrollbars=no')"  class="link2">เพิ่มข้อมูลรถ</a></span></div></th>
                                    </tr>
                                    <tr>
                                        <th height="26"  bgcolor="#fcfcbf" scope="row"><div align="left" style="padding-left: 12px;"><span class="style8"><a href="javascript:void(0)" class="link2"onclick="window.open('create_trip2.php','link','height=650, width=1000,scrollbars=no')">เพิ่มการเดินทางใหม่</a></span><a href="javascript:void(0)" class="link2"onclick="window.open('create_trip.php','link','height=600, width=1000,scrollbars=no')"></a></span> </div></th>
                                    </tr>

                                    <tr>
                                        <th height="298" bgcolor="#CCCCCC"  scope="row"> 

                                                <table width="100%" border="0">
                                                    <tr>
                                                        <th height="30" colspan="2" bgcolor="#666666"  scope="row" style="padding-top: 5px; padding-bottom: 0;"><span class="style1" style="font-family:THSarabunNew,Tahoma, sans-serif; margin: 0; padding: 0">Recent trip</span></th>
                                                    </tr>

                                                    <?php
                                                    $cn = @mysql_connect("localhost", "root", "adminadmin");
                                                    if (!$cn) {
                                                        echo "fail<br>";
                                                        exit;
                                                    }
                                                    $i = 0;
                                                    mysql_select_db("gps", $cn);
                                                    $sql = "SELECT * FROM gps.trip order by trip_id desc";
                                                    $result = mysql_query($sql);
                                                    while ($row = mysql_fetch_array($result)) {
                                                        if ($row["finish_time"] <> "" && $i < 5) {

                                                            echo "<tr><th bgcolor='#FFFFFF' scope='row'><img src='truck3green.png' width='52' height='50'></th>" . "<td bgcolor='#FFFFFF'  ><span class='style3'><a href='#' onmouseover='detail(" . $row["user_id"] . "," . $row["car_id"] . "," . $row["trip_id"] . ")' class='link2' onclick='show_map_trip(" . $row["start_lat"] . "," . $row["start_long"] . "," . $row["end_lat"] . "," . $row["end_long"] . ")'>" . $row["trip_name"] . "</a></span></td>";
                                                            echo "</tr>";
                                                            $i = $i + 1;
                                                        } else if ($row["finish_time"] == "" && $i < 5) {

                                                            echo "<tr><th bgcolor='#FFFFFF' scope='row'><img src='truckorange.png' width='52' height='50'></th>" . "<td bgcolor='#FFFFFF' ><span class='style3'><a href='#'  onmouseover='detail(" . $row["user_id"] . "," . $row["car_id"] . "," . $row["trip_id"] . ")' class='link2' onclick='show_map_trip(" . $row["start_lat"] . "," . $row["start_long"] . "," . $row["end_lat"] . "," . $row["end_long"] . ")'>" . $row["trip_name"] . "</a></span></td>";
                                                            echo "</tr>";
                                                            $i = $i + 1;
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th bgcolor="#CCCCCC" colspan="2" bgcolor="#FFFFFF"  scope="row"><div align="left"><img src="truck3green.png" width="30" height="30" /> Finish trip<br/>
                                                                <img src="truckorange.png" width="30" height="30" />Not Finish trip</div></th>
                                                    </tr>

                                                    <tr>
                                                        <th bgcolor="#CCCCCC" colspan="2" bgcolor="#FFFFFF" scope="row"><div align="left"><img src="trucknotification2.png" width="30" height="30" />Finish trip notification</div></th>
                                                    </tr>
                                                    <tr>
                                                        <th bgcolor="#CCCCCC" colspan="2" bgcolor="#FFFFFF" scope="row"><div align="left"><img src="trucknotification.png" width="30" height="30" />Not Finish trip Notification</div></th>
                                                    </tr>
                                                </table>	
                                        </th>
                                    </tr>
                                </table>

                            </div>
                            <br />
                            <!--
                            <div class="style1" id="notification">
                            
                            <b class="style1">Notification</b>
                            <hr />
                            <?php 
                            $cn = @mysql_connect("localhost", "root", "adminadmin");
                            if (!$cn) {
                                echo "fail<br>";
                                exit;
                            }
                            mysql_select_db("gps", $cn);
                            $sql = "select * from gps.log order by id desc";
                            $result = mysql_query($sql, $cn);
                            while ($row = mysql_fetch_array($result)) {
                                echo "Trip " . $row["trip_id"] . "<br>Log :  " . $row["log"] . "<br>Time : " . $row["time"];
                                echo "<hr>";
                            }
                            ?>
                            </div>-->


                            <!--<div id="trip"> <br />
                                <b>TRIP</b> <br />
                                <table width="200" cellpadding="4" cellspacing="1" style="border:1px solid #dcdc77;">
                                  <tr>
                                    <td bgcolor="#dcdc77"style="border-style:solid;border-width:4px;border-color:#dcdc77 gray gray #dcdc77;"><center>
                                      <b>TRIP</b>
                                    </center></td>
                                  </tr>
                            <?php
                            $cn = @mysql_connect("localhost", "root", "adminadmin");
                            if (!$cn) {
                                echo "fail<br>";
                                exit;
                            }
                            mysql_select_db("gps", $cn);
                            $sql = "SELECT * FROM gps.trip order by trip_id desc";
                            $result = mysql_query($sql, $cn);
                            $color_green = '#99FF00';
                            $color_red = '#FF0000';
                            $color_yellow = '#FFD700';
                            while ($row = mysql_fetch_array($result)) {
                                if ($row["finish_time"] <> "") {

                                    echo "<td bordercolor='#009900' bgcolor=$color_green ><span class='style3'><a href='#' onmouseover='detail(" . $row["user_id"] . "," . $row["car_id"] . "," . $row["trip_id"] . ")' class='link2' onclick='show_map_trip(" . $row["start_lat"] . "," . $row["start_long"] . "," . $row["end_lat"] . "," . $row["end_long"] . ")'>" . $row["trip_name"] . "</a></span></td>";
                                    echo "</tr>";
                                }
                                if ($row["finish_time"] == "") {

                                    echo "<td bordercolor='#009900' bgcolor=$color_yellow><span class='style3'><a href='#'  onmouseover='detail(" . $row["user_id"] . "," . $row["car_id"] . "," . $row["trip_id"] . ")' class='link2' onclick='show_map_trip(" . $row["start_lat"] . "," . $row["start_long"] . "," . $row["end_lat"] . "," . $row["end_long"] . ")'>" . $row["trip_name"] . "</a></span></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                                </table>
                            </div>-->


                        </div>



                        <div id="mailja">
                            <div id="map"></div>
                            <div id="mail"></div>
                            <div id="showdetail">
                            </div>
                        </div>


                    </div>


                </div>

                <script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&language=th'></script>

                <div id="foodter">
                    <br /><br />	

                </div>
                <?php
            } else {
                echo $_SESSION["rank"];
            }
            ?>
        </body>


</html>
