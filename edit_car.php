<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
$id = $_GET["id"];
	
		echo "<center><h1>Edit Car PROFILE</h1></center>";
		$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
		$sql = "SELECT * FROM gps.car where car_id =". $id;
		$result = mysql_query($sql,$cn);
		
		while($row = mysql_fetch_array($result)){
			//echo "<form action='edit_car_finish.php'>";
			echo "<img src='".$row["pic"]."' width='300px' height='200px'/><br><br>";
			echo "<b>Car License : </b> <input type='text' id='car_id' disabled='disabled' value='" . $row["car_id"] . "'><br>";
			echo "<b>Brand : </b> <input type='text' id='brand' value='" . $row["brand"] . "'><br>";
			echo "<b>Color : </b> <input type='text' id='color' value='" . $row["color"] . "'><br>";
			echo "<b>Type : </b> <input type='text' id='type' value='" . $row["type"] . "'><br>";
			
			echo "<b>Priority : </b> " . $row["priority"] . "%<br>";
			
			
			echo "<input type='submit' value='Change Edit Car' onclick='editfile_finish($id)' >";
			//echo "</form>";
		}


?>


</body>
</html>
