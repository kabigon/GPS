<html>
<title>Test</title>
<head>
<style type = "text/css">
#header { background-color:#C6F ; width:1000pt;height:100pt;}
#head { background-color:#9FF; width:1000pt;height:1000pt;}
#mail {padding-top::15pt;margin-top:15pt;background-color:#36F;color:red; width:200pt ; height:200pt 

}
</style>
</head>
<body>
<div id="header">
LOGO</div>
<div id="head">
<center>
<div id="mail">
Login<hr>
Username: <input type="text" name = "username"> <br><br>
Password: <input type="text" name="password"> <br><br>
<center><input type="button" value="OK"><input type="button" value="cancle"></center><br>
<?php
$long = $_GET["long"];
$lat = $_GET["lat"];
echo $long;
echo $lat;


$cn = @mysql_connect("127.0.0.1","GPS","cTTKBA0p");

if(!$cn){
	echo "fail<br>";
	exit;
}
else{
mysql_select_db("GPS",$cn);
$sql = "INSERT INTO GPS.LOCATION VALUES(null,'{$long}' ,'{$lat}')";
$result = mysql_query($sql,$cn);


mysql_close($cn);
}
?>

</div>
</center>
</div>

</body>
</html>