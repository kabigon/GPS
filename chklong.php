<!-- เอาค่า longtitude lattitude มาแปลง /60 เพื่อใช้ใน google map -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$lat = "10046.8660";
$long = "1343.8692";
$countlng = strlen ($long);

$newlong = substr($long,3); //เอาตัวที่ 4 ถึงตัวสุดท้าย
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

//$sql="select * from gps.location order by desc limit 1"; ดึงข้อมูลล่าสุด



?>

</body>
</html>
