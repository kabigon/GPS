<!-- Original script taken from: http://conversationswithmyself.com/googleMapDemo.html -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
	<title>Recieve Server</title>
	</head>
	<body>
  

 
	<?php
		$long = $_GET["long"];
		$lat = $_GET["lat"];
		$trip_id = $_GET["trip_id"];
		$time = $_GET["time"];
		$speed = $_GET["speed"];
		
		$cn = @mysql_connect("127.0.0.1","GPS","cTTKBA0p");
		
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		else{
		mysql_select_db("GPS",$cn);
		$sql = "INSERT INTO GPS.location VALUES(null,'{$trip_id}' ,'{$long}','{$lat}','{$time}','{$speed}')";
		$result = mysql_query($sql,$cn);
		if($result){
			echo "Daileawja";
		}
		else{
			echo "Fail";
		}


		mysql_close($cn);
		}
		
		?>




  </body>
</html>