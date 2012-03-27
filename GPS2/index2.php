<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Tracking For Logistic</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="TH Sarabun New/fonts/thsarabunnew.css" />
        <!--<link rel="stylesheet" type="text/css" href="css/main_mail.css" />-->
        <script src="jquery-1.6.3.min.js"></script>



        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAuPsJpk3MBtDpJ4G8cqBnjRRaGTYH6UMl8mADNa0YKuWNNa8VNxQCzVBXTx2DYyXGsTOxpWhvIG7Djw" type="text/javascript"></script>


        <script type="text/javascript">
            function initialize() {
                if (GBrowserIsCompatible()) {
                    var map = new GMap2(document.getElementById("map"));
                    map.addControl(new GSmallMapControl());

                    map.addControl(new GMapTypeControl());
                    map.setCenter(new GLatLng(13.7312933, 100.7811), 13);
                }
            }
	
	
            function driver(){
                //document.getElementById("map").style.display = "none";
                //document.getElementById("content").style.display = "block";
                document.getElementById("content").innerHTML =
                
                    "<p align='left'> <span class='style14'><h3>ข้อมูลคนขับรถ</h3></span> </p>"
		
                <!--"<img src='bus-driver[1].gif' width='100px' height='100px' ><span class='style2'>Driver</span>" +"<center><table width='200' border='0' bordercolor='#000000' width='50px'>"-->
<?php
$cn = @mysql_connect("localhost", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
$sql = "SELECT * FROM gps.driver";
$result = mysql_query($sql, $cn);

while ($row = mysql_fetch_array($result)) {
    ?>
                    +"<table width='499' height='171' border='0'>"
                    +"<tr><th width='180' scope='row'><img src='../<?php echo $row['pic']; ?>' width='150' height='180' border='1' /></th>"
                    + "<td width='329'><p align='left'><span class='style13'><b>Name Driver :<?php echo $row['name']; ?> </b></span></p>"
                    +"<p align='left'>Age : <?php echo $row['age']; ?></p>"
                    +"<p align='left'>Accident Time :  <?php echo $row["ac_time"]; ?> Time  </p>"
                    +"<p align='left'><span class='style15'>Created_By : <?php echo $row['created_by']; ?>  </span></p>"
                    +"<p class='readmore'><a href='#' onclick='profile_driver(<?php echo $row['user_id']; ?> )' >read more</a></p></td></tr>"
                    +"<tr><th scope='row'>&nbsp;</th><td>&nbsp;</td></tr></table>"     			
                    			
<?php }mysql_close($cn); ?>
        ;
    }


    function profile_driver(str){
        //asdf
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
				
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","profile.php?id="+str,true);
        xmlhttp.send();
    }
	
    function edit_driver(str){
        //document.getElementById('map').style.display = 'none';
        //document.getElementById('showdetail').style.display = 'none';
        //document.getElementById("mail").style.display="inline";
		
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
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","edit_driver.php?id="+str,true);
        xmlhttp.send();
    }
	
    function editdriver_finish(str){
        //document.getElementById('map').style.display = 'none';
        //document.getElementById('showdetail').style.display = 'none';
        //document.getElementById("mail").style.display="inline";
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
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","chk_edit_driver.php?name="+name+"&sex="+sex+"&age="+age+"&PID="+PID,true);
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
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","delete_driver.php?id="+str,true);
        xmlhttp.send();
    }
	
	
    function car(){
	
	
        document.getElementById("content").innerHTML=
            <!--document.getElementById("tttt").innerHTML=-->

       
        "<p align='left'> <span class='style14'><h3>ข้อมูลรถยนต์</h3></span> </p>" 
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
                    +"<td width='165'><img src='../<?php echo $row['pic']; ?>' width='155' height='150' border='1' /></td>"
                    +"<td width='329'><p align='left'><b>Car ID :<?php echo $row['car_id']; ?> </b></p>"
                    +"<p align='left'>Type : <?php echo $row['type']; ?></p><p align='left'>Accident Time : <?php echo $row["ac_time"]; ?> Time  </p>"
                    +"<p align='left'><span class='style15'>Created_By : <?php echo $row['created_by']; ?>  </span></p>"
                    +"<p class='readmore'><a href ='#' class = 'link2' onclick=\"profile_car('<?php echo $row['car_id']; ?> ')\">read more </a></p></td></tr>"
    					
    				
                    +"<tr><th>&nbsp;</th><td>&nbsp;</td></tr></table>"
                                			
                                			
<?php } mysql_close($cn); ?>
        ;
    }
	
    function profile_car(str){
        //asdf
		
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
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","profile_car.php?id="+str,true);
        xmlhttp.send();
    }
	
	
    function edit(str){
        //document.getElementById('map').style.display = 'none';
        //document.getElementById('showdetail').style.display = 'none';
        // document.getElementById("mail").style.display="inline";
        
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
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","edit_car.php?id="+str,true);
        xmlhttp.send();
    }
	
    function editfile_finish(str){
        //document.getElementById('map').style.display = 'none';
        // document.getElementById('showdetail').style.display = 'none';
        //document.getElementById("mail").style.display="inline";
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
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","chk_edit_car.php?car_id="+car_id+"&brand="+brand+"&color="+color+"&type="+type,true);
        xmlhttp.send();
    }
	
    function editfile_finish(str){
        //document.getElementById('map').style.display = 'none';
        //document.getElementById('showdetail').style.display = 'none';
        //document.getElementById("mail").style.display="inline";
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
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","chk_edit_car.php?car_id="+car_id+"&brand="+brand+"&color="+color+"&type="+type,true);
        xmlhttp.send();
    }
	
	
    function delete_car(str){
        alert(str);
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
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","delete_car.php?id="+str,true);
        xmlhttp.send();
    }
	
	
	
	
	
    function show_map_trip(start_lat,start_long,end_lat,end_long){
        //alert(start_lat);
        //document.getElementById("mail").style.display="none";
        //document.getElementById("map").style.display="inline";
		
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
        //document.getElementById("showdetail").innerHTML="<b>---Show Detail---</b>";
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
	
	
    function trip_des(){
        document.getElementById("content").innerHTML="<br>"
            +"<table width='600' height='237' border='0' class='style5' bordercolor='#000000'><tr><th colspan='7' scope='row'><span class='style4'>Trip Description </span></th></tr><tr><th width='100' bgcolor='#EAEAEA' scope='row' >Trip Name </th><td width='150' bgcolor='#EAEAEA'><strong>Start Time </strong></td><td width='150' bgcolor='#EAEAEA'><strong>Finish Time </strong></td><td width='80' bgcolor='#EAEAEA'><strong>Car ID</strong></td><td width='44' bgcolor='#EAEAEA'><strong>User ID </strong></td><td width='117' bgcolor='#EAEAEA'><strong>Create By</strong></td><td width='44' bgcolor='#EAEAEA'><strong>Status</strong></td></tr>"  
	
<?php
$cn = @mysql_connect("localhost", "root", "adminadmin");

mysql_select_db("gps", $cn);
$sql = "SELECT * FROM gps.trip order by trip_id desc ";
$result = mysql_query($sql, $cn);


while ($row = mysql_fetch_array($result)) {
    ?>
                    +"<tr><th bgcolor='#F9F9F9' scope='row'><a href=\"javascript:void(0)\"onclick=\"window.open('trip_des.php?id=<?php echo $row["trip_id"]; ?>','link','height=600, width=800,scrollbars=no')\"  class=\"link2\"> <?php echo $row["trip_name"]; ?></a></th><td bgcolor='#F9F9F9'><?php echo $row["start_time"]; ?> </td><td bgcolor='#F9F9F9'><?php echo $row["finish_time"]; ?></td><td bgcolor='#F9F9F9'><?php echo $row["car_id"]; ?></td><td bgcolor='#F9F9F9'><?php echo $row["user_id"]; ?></td><td bgcolor='#F9F9F9'><?php echo $row["create_by"]; ?></td><td bgcolor='#F9F9F9'><?php
    $trip_id = $row["trip_id"];
    $sql2 = "SELECT * FROM gps.log where trip_id=" . $trip_id;
    $result2 = mysql_query($sql2, $cn);
    $i = 0;
    $check = 1;
    while ($row2 = mysql_fetch_array($result2)) {

        if ($i == 0 and $row["finish_time"] == "0000-00-00 00:00:00") {
            echo "<img src='../img_status/orangecar_log.png' width='31' height='25' />";
            $check = 0;
        }
        if ($i == 0 and $row["finish_time"] != "0000-00-00 00:00:00") {
            echo "<img src='../img_status/greencar_log.png' width='31' height='25' />";
            $check = 0;
        }
        $i = $i + 1;
    }

    if ($row["finish_time"] != "0000-00-00 00:00:00" and $check != 0) {
        echo"<img src='../img_status/greencar.png' width='31' height='25' />";
    }if ($row["finish_time"] == "0000-00-00 00:00:00" and $check != 0) {
        echo"<img src='../img_status/orangecar.png' width='31' height='25' />";
    }
    ?></td></tr>"
                      	
<?php } mysql_close($cn); ?>
        ;
    }
        </script>

    </head>

    <body onload="initialize()" onunload="GUnload()" style="font-family: Arial;border: 0 none;">
        <div id="page">
            <div id="header">
                <h1><a href="#"><span>Tracking</span> For Logistic</a></h1>
                <p id="subtitle">Create by :Sakkarin And Jakkrapan</p>
            </div>   					
            <div id="menu">
                <ul>
                    <li><a href="index2.php">Home</a></li>
                    <li><a href="#" onclick="driver()">Driver</a></li>
                    <li><a href="#" onclick="car()">Car</a></li>
                    <li><a href="#" onclick="trip_des()">Trip</a></li>
                    <li><a href="javascript:void(0)"onclick="window.open('../calendar/mailmail.php','link','height=800, width=800,scrollbars=no')">History</a></li>
                    <li><a href="javascript:void(0)"onclick="window.open('../register.php','link','height=650, width=800,scrollbars=no')">Register</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div><!-- header -->    
            <div id="main">
                <div id="sidebar">
                    <h3>เข้าสู่หน้าติดตามระบบ  </h3>
                    <p><?php echo "Hi : <a href='../login_process.php'>" . $_SESSION["user"] . "</a> <a href='../logout.php'><img src='../logout.png'></a>"; ?></p>

                    <ul>
                        <li><a href="#" onclick="driver()">ประวัติคนขับ</a></li>
                        <li><a href="#" onclick="car()">ประวัติรถยนต์</a></li>
                        <li><a href="javascript:void(0)"onclick="window.open('../create_driver.php','link','height=400, width=500,scrollbars=no')" >เพิ่มข้อมูลคนขับ</a></li>
                        <li><a href="javascript:void(0)"onclick="window.open('../create_car.php','link','height=400, width=500,scrollbars=no')">เพิ่มข้อมูลรถ</a></li>
                        <li><a href="javascript:void(0)" class="link2"onclick="window.open('../create_trip2.php','link','height=650, width=800,scrollbars=no')">เพิ่มการเดินทางใหม่</a></li>
                    </ul>
                    <h2 class="thsarabunnew">Notification</h2>
                    <div class="box">
                        <p>Not.</p>
                    </div>
                    <h2><span class="thsarabunnew">Recently Trip </span></h2>
                    <ul>
                        <?php
                        $cn = @mysql_connect("localhost", "root", "adminadmin");
                        $i = 0;
                        mysql_select_db("gps", $cn);
                        $sql = "SELECT * FROM gps.trip order by trip_id desc";
                        $result = mysql_query($sql);
                        echo "<table width='220' height='231' border='0'>";
                        while ($row = mysql_fetch_array($result)) {
                            if ($row["finish_time"] == "0000-00-00 00:00:00") {
                                echo "<tr><th width='44' scope='row'><img src='orangecar.png' width='52' height='50'></th><td width='135'><li><a href='#' onclick='show_map_trip(" . $row["start_lat"] . "," . $row["start_long"] . "," . $row["end_lat"] . "," . $row["end_long"] . ")'>" . $row["trip_name"] . "</a></li></td></tr>";
                            }
                            if ($row["finish_time"] != "0000-00-00 00:00:00") {
                                echo "<tr><th width='44' scope='row'><img src='greencar.png' width='52' height='50'></th><td width='135'><li><a href='#' onclick='show_map_trip(" . $row["start_lat"] . "," . $row["start_long"] . "," . $row["end_lat"] . "," . $row["end_long"] . ")'>" . $row["trip_name"] . "</a></li></td></tr>";
                            }

                            $i = $i + 1;
                        }
                        echo "</table>";
                        ?>
                        <!-- <li><a href="#">Vestibulum ante ipsum primis</a></li>
                         <li><a href="#">Aenean rutrum tortor a purus</a></li>
                         <li><a href="#">Intger non enim nec tellus</a></li>
                         <li><a href="#">Lobortis tempus vel nec lorem</a></li>
                         <li><a href="#">Magnis dis parturient monte</a></li>-->
                    </ul>
                    <p>&nbsp;</p>
                </div><!-- sidebar -->               
                <div id="content">
                    <h3>Google Map</h3><br />
                    <center><div id="map" style="width: 500px; height: 300px"></div></center><br /><br />

                    <h3>New Driver</h3>
                    <p class="postmeta">Create By <?php
                        $cn = @mysql_connect("localhost", "root", "adminadmin");
                        mysql_select_db("gps", $cn);
                        $sql = "SELECT * FROM gps.driver order by user_id desc limit 1";
                        $result = mysql_query($sql, $cn);
                        while ($row = mysql_fetch_array($result)) {
                            echo "<a href='#'>" . $row["created_by"] . "</a>";
                            ?>

                        </p>
                        <div class="entry">


                            <?php
                            echo "<table width='500' height='159' border='0'><tr><th width='150'  rowspan='4' scope='row'><img src='../" . $row["pic"] . "' width='130' height='160'></th><td width='200' height='35'>Name : " . $row["name"] . "</td></tr><tr><td height='31'>Age : " . $row["age"] . "</td></tr><tr<td height='39'>Sex : " . $row["sex"] . "</td></tr><tr><td height='42'>Accident Time : " . $row["ac_time"] . "</td></tr></table>";
                            /* echo "<table width='209' height='200' border='0'>"."<tr><th width='80' scope='row'><img src='../". $row['pic']. "' width='142' height='150' border='1' /></th>". "<td width='329'><p align='left'><span class='style13'><b>Name Driver :<".$row['name']. "</b></span></p>"."<p align='left'>Age : ". $row['age']."</p>"."<p align='left'>Accident Time :  ". $row["ac_time"]."> Time  </p>"."<p align='left'><span class='style15'>Created_By : ". $row['created_by']."  </span></p>"; */
                            echo "<p class='readmore'><a href='#' onclick='profile_driver(" . $row['user_id'] . " )'>read more</a></p>";
                        }
                        ?>

                    </div> 
                    <h3>New Car</h3>

                    <p class="postmeta">Create By <?php
                        $cn = @mysql_connect("localhost", "root", "adminadmin");
                        mysql_select_db("gps", $cn);
                        $sql = "SELECT * FROM gps.car order by car_id desc limit 1";
                        $result = mysql_query($sql, $cn);
                        while ($row = mysql_fetch_array($result)) {
                            echo "<a href='#'>" . $row["created_by"] . "</a></p>";

                            echo "<table width='500' height='159' border='0'><tr><th width='150' rowspan='4' scope='row'><img src='../" . $row["pic"] . "' width='130' height='134'></th><td width='200' height='35'>Car Id : " . $row["car_id"] . "</td></tr><tr><td height='31'>Brand : " . $row["brand"] . "</td></tr><tr<td height='39'>Type : " . $row["type"] . "</td></tr><tr><td height='42'>Accident Time : " . $row["ac_time"] . "</td></tr></table>";
                            echo "<p class='readmore'><a href ='#' class = 'link2' onclick=\"profile_car('" . $row['car_id'] . "')\">read more </a></p>";
                        }
                        ?>


                        <!-- map -->            
                        <div class="post">

                            <div class="entry" >
                                <h3>Product Us</h3><br />
                                                    <!--<img src="Product/IMG_0754.jpg" width="400" height="300" />-->  
                                <table width='500' height='159' border='0'><tr><th width='150' rowspan='4' scope='row'><img src="Product/IMG_0754.jpg" width="130" height="134" name="image_name"
                                                                                                                            onmouseover="image_name.width='300';image_name.height='200';"
                                                                                                                            onmouseout="image_name.width='130';image_name.height='134';" /></th><td width='200' height='35'>Module : </td></tr><tr><td height='31'>GPS Module </td></tr><tr<td height='39'>GPRS Module </td></tr><tr><td height='42'>AVR Module </td></tr></table>
                                <p class='readmore'><a href ='#' class = 'link2'>read more </a></p>
                            </div>
                        </div><!-- post -->
                </div><!-- content -->
                <div class="clearing">&nbsp;</div> 
            </div><!-- main -->
        </div><!-- page -->
        <script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&language=th'></script>
        <div id="footer">
            <p>Copyright &copy; 2012, designed by <a href="http://www.alphastudio.pl/" target="_blank">Alpha Studio</a> | <a href="#">Privacy Policy</a><!--%@##--> Design provided by <a href="http://www.freewebtemplates.com/">Free Website Templates</a>.<!--##@%--></p>
        </div>
    </body>
</html>
