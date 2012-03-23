<? session_start() ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$id = $_GET["id"];
	
		echo "<h3>Driver PROFILE</h3><br>";
		$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
		$sql = "SELECT * FROM gps.driver where user_id =". $id;
		$result = mysql_query($sql,$cn);
		
		while($row = mysql_fetch_array($result)){
			//echo "<center>";
			echo "<img src='../".$row["pic"]."' width='150px' height='200px'/><br><br>";
			echo "<b>Name : </b>" . $row["name"] . "<br>";
			echo "<b>Sex : </b>" . $row["sex"] . "<br>";
			echo "<b>Age : </b>" . $row["age"] . "<br>";
			echo "<b>Personal ID : </b>" . $row["PID"] . "<br>";
			echo "<b>Accident Time : </b>" . $row["ac_time"] . " Time<br>";
			//echo "</center>";
		}
		//if($_SESSION["rank"]=="admin"){
			//echo "<center>";
			echo "<input type='submit' value='Edit User' onclick='edit_driver($id)' >";
			echo "<input type ='submit' value='DELETE User' onclick='delete_driver($id)'>";
			//echo "</center>";
			//}

	
		
			
	?>
    
</body>
</html>
