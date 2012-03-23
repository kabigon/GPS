<?php
session_start();
$username = $_SESSION["user"];
$cn = @mysql_connect("localhost", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>

    <body>


<?php
	$id = $_GET["id"];
		
		
		echo "<h3>Car PROFILE</h3><br>";
		$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
		$sql = "SELECT * FROM gps.car where car_id ='". $id. "'";
		$result = mysql_query($sql,$cn);
		
		while($row = mysql_fetch_array($result)){
			//echo "<form action='edit_car.php'>";
			//echo "<center>";
			echo "<img src='../".$row["pic"]."' width='300px' height='200px'/><br><br>";
			echo "<b>Car License : </b>" . $row["car_id"] . "<br>";
			echo "<b>Brand : </b>" . $row["brand"] . "<br>";
			echo "<b>Color : </b>" . $row["color"] . "<br>";
			echo "<b>Type : </b>" . $row["type"] . "<br>";
			echo "<b>Accident Time : </b>" . $row["ac_time"] . " Time<br>";
			
			//echo "</center>";
			
			
		}
		//if($_SESSION["rank"]=="admin"){
			//echo "<center>";
			echo "<input type='submit' value='Edit Car' onclick=\"edit('$id')\" >";
			echo "<input type ='submit' value='DELETE Car' onclick=\"delete_car('$id')\">";
			//echo "</center>";
			//}
		
	?>
    

        

    </body>

</html>
