<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
$cn = @mysql_connect("localhost","root","adminadmin");
if(!$cn){
	echo "fail<br>";
	exit;
}
mysql_select_db("gps",$cn);
$sql="select * from gps.location order by id desc limit 1;";;
$result = mysql_query($sql,$cn);
while($row = mysql_fetch_array($result)){
		$lat = $row['lat'];
		$long = $row['long'];
		//echo $lat . "<br>" . $long;
	}
mysql_close($cn);

//แปลงค่า longtitude lattitude ให้เป็นค่าที่ต้องการ



$newlong = substr($long,2); //เอาตัวที่ 4 ถึงตัวสุดท้าย
$newlat = substr($lat,2);
$floatlong = floatval($newlong); // แปลงเป็น float
$floatlat = floatval($newlat);
$floatlong= $floatlong/60; //เอาค่าที่ได้มา หาร 60
$floatlat= $floatlat/60;
$newlong2 = substr($long,0,2); //เอาตัวที่ 0 ถึง 2
$long = $newlong2 + $floatlong; // นำตัว 0 ถึง 2 มารวมกับตัวที่หาร 60 แล้ว
$newlat2 = substr($lat,0,3);
$lat = $newlat2 + $floatlat;


echo $long . "<br>";
echo $lat;

?>

</body>
</html>
