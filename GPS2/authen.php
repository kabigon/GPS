<?php session_start();?>
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
	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true">
</script>

 <script type="text/javascript">
 function initialize() {
  var mapDiv = document.getElementById("map");
  var map = new google.maps.Map(mapDiv, {
    center: new google.maps.LatLng(13.7312933, 100.7811),
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
  var path = [
    <?php
		$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
	
	$sql = "select * from gps.location where trip_id =".$_SESSION["authen"];
	$result = mysql_query($sql,$cn);
	
	while($row = mysql_fetch_array($result)){
		$lat = floatval($row["lattitude"]);
		$long = floatval($row["longtitude"]);
			
			echo "new google.maps.LatLng(".$lat.",".$long."),";
			
			
	}	
	echo "];";
	?>

  var line = new google.maps.Polyline({
    path: path,
    strokeColor: '#ff0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  line.setMap(map);
  var latLng = new google.maps.LatLng(
  <?php
		$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
	
	$sql = "select * from gps.location where trip_id =".$_SESSION["authen"]." order by id desc limit 1";
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		echo $row["lattitude"].",".$row["longtitude"];
	}
	
?>	
  
  
  
  );
   var image = 'http://s.thumbs.canstockphoto.com/canstock5842980.jpg';
  var myLatLng = new google.maps.LatLng(13.7312933, 100.7811);
  var beachMarker = new google.maps.Marker({
    position: latLng,
    map: map,
    icon: image
  });
  
  
	//setTimeout(function(){initialize();},5000);
}


function recieve(){
	var response = confirm('Do you want Recieve Item?');
     // OR var response = window.confirm('Confirm Test: Continue?');

     if (response){
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
				alert("Delete Successfull");
				//window.opener.document.location.href='GPS2/authen.php';
                document.getElementById("recieve").innerHTML="";
				//setTimeout("location.reload(true);",1000);
               }
        }
        xmlhttp.open("GET","update_authen.php",true);
        xmlhttp.send();
		}
		}
 </script>
</head>

<body onload="initialize()">
    <div id="page">
        <div id="header">
            <h1><a href="#"><span>Tracking </span>For Logistic </a></h1>
            <p id="subtitle">Template designed by Alpha Studio</p>
        </div>   					
        <div id="menu">
			
            <ul>
                <li><a href="#"><h2>Wellcome To Authentication</h2></a></li>
                <!--<li><a href="#">Detail</a></li>
                <li><a href="#">Driver</a></li>
                <li><a href="#">Car</a></li>
                <li><a href="#">Trip</a></li>
                <li><a href="#">History</a></li>
				<li><a href="#">Register</a></li>-->
            </ul>
        </div><!-- header -->    
        <div id="main">
            <div id="sidebar">
                <h3>เข้าสู่หน้าติดตามระบบ  </h3>
                <ul>
                    <li><a href="#">Hi : <?php echo "Authentication"; ?></a> <a href="../logout.php"><img src="../logout.png" /></a></li>
                    <!--<li><a href="#">ประวัติรถยนต์</a></li>
                    <li><a href="#">เพิ่มข้อมูลคนขับ</a></li>
                    <li><a href="#">เพิ่มข้อมูลรถ</a></li>
                    <li><a href="#">เพิ่มการเดินทางใหม่</a></li>-->
                </ul>
                <h2>Trip Description</h2>
                <div class="box">
                    <?php
		$cn = @mysql_connect("localhost","root","adminadmin");
		mysql_select_db("gps",$cn);
		$authen = $_SESSION["authen"];
		$sql = "select * from gps.trip where trip_id =".$authen;
		$result = mysql_query($sql,$cn);
		while($row = mysql_fetch_array($result)){
		
			$user_id2 =$row["user_id"];
			$car_id = $row["car_id"];
			
		}
		//echo $car_id;
		
		$sql2 = "select * from gps.driver where user_id =".$user_id2;
		$result2 = mysql_query($sql2,$cn);
		
		while($row2 = mysql_fetch_array($result2)){
			
			echo "Driver Name : ".$row2["name"]." <br><img src='../".$row2["pic"]."' width='150px' height='150px'><br>";	
		}
		
		$sql3 = "select * from gps.car where car_id ='".$car_id."'";
		$result3 = mysql_query($sql3,$cn);
		while($row3 = mysql_fetch_array($result3)){
			echo "Car ID : ".$row3["car_id"]." <br><img src='../".$row3["pic"]."' width='150px' height='150px'><br>";	
		}
		
	
	?>
                </div>
				<div id="recieve">
                <?php
		$cn = @mysql_connect("localhost","root","adminadmin");
		mysql_select_db("gps",$cn);
		$authen = $_SESSION["authen"];
		$sql = "select * from gps.trip where trip_id =".$authen;
		$result = mysql_query($sql,$cn);
		while($row = mysql_fetch_array($result)){
			//$datedate = datetime("0000-00-00 00:00:00");
			if($row["finish_time"] == "0000-00-00 00:00:00"){
			echo "<input type='submit' value='Recieve Item' onclick='recieve()' />";
			}
		}
		
		
		?></div>
          </div><!-- sidebar -->               
            <div id="content">
                <div id="map" style="width: 600px; height: 600px"><br /><br />
                    
                    <div class="entry">
                        
                    </div> 
                </div><!-- post -->             
                <div class="post">
                   
                    <div class="entry">
                        
                    </div>
                </div><!-- post -->
            </div><!-- content -->
            <div class="clearing">&nbsp;</div> 
        </div><!-- main -->
    </div><!-- page -->
    <div id="footer">
        <p>Copyright &copy; 2012, designed by <a href="http://www.alphastudio.pl/" target="_blank">Alpha Studio</a> | <a href="#">Privacy Policy</a><!--%@##--> Design provided by <a href="http://www.freewebtemplates.com/">Free Website Templates</a>.<!--##@%--></p>
    </div>
</body>
</html>
