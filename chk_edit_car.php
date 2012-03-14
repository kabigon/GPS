<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="0;url=http://www.google.com/"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT LANGUAGE="JAVASCRIPT" TYPE="TEXT/JAVASCRIPT"> 
var StayAlive = 3; // เวลาเป็นวินาทีที่ต้องการให้ WIndows เปิดออก 
function KillMe(){ 
alert("tesT");
//setTimeout("self.close()",StayAlive * 500); 
window.parent.opener.document.location.href='member.php';
} 
</SCRIPT>

<title>Untitled Document</title>


</head>

<body >

<?php
	$car_id = $_GET["car_id"] ;
	$brand =  $_GET["brand"];
	$color =  $_GET["color"];
	$type =  $_GET["type"];
	
	$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
		
	$sql = "update gps.car set brand='" .$brand. "',color='".$color."',type='".$type."' where car_id='".$car_id."'";
	$result = mysql_query($sql,$cn);

	if($result){
		echo " <center><h1> Edit Successfull </h1>";
		echo "<img src='loading.gif'/></center>";
		echo"<script language = 'javascript'>";
           echo"KillMe()";
           echo"</script>";
	}
?>
</body>
</html>
