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
		$sql = "SELECT * FROM gps.driver where user_id =". (int)$id;
		$result = mysql_query($sql,$cn);
		
		while($row = mysql_fetch_array($result)){
			//echo "<form action='edit_car_finish.php'>";
			$pic =$row["pic"];
			echo "<img src='".$row["pic"]."' width='170px' height='200px'/><br><br>";
			echo "<b>Name : </b> <input type='text' id='name'  value='" . $row["name"] . "'><br>";
			echo "<b>Sex : </b> <input type='text' id='sex' value='" . $row["sex"] . "'><br>";
			echo "<b>Age : </b> <input type='text' id='age' value='" . $row["age"] . "'><br>";
			echo "<b>PID : </b> <input type='text' id='PID' disabled='disabled' value='" . $row["PID"] . "'><br>";
			
			echo "<b>Priority : </b> " . $row["priority"] . "%<br>";
			
			
			echo "<input type='submit' value='Change Edit Car' onclick='editdriver_finish($id)' >";
			//echo "</form>";
		}


?>


</body>
</html>
