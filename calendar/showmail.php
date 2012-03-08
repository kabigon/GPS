<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$date22 = $_GET["dayja"];
	$car = $_GET["car"];
	
	
	
	
	$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
		$sql = "SELECT * FROM gps.trip where car_id=".$car." and Date='".$date22."'";
		$result = mysql_query($sql,$cn);
	
		if($result){
		while($row = mysql_fetch_array($result)){
			$trip_id = $row["trip_id"];
			echo "<b>TRIP NAME : </b>" .$row["trip_name"]."<br>";
			echo "<b>Driver ID : </b>". $row["user_id"]."<br>";
			echo "<b>Start Location : </b>" .$row["start_location"] ."<br>";
			echo "<b>End Location : </b>" .$row["end_location"] ."<br><hr>";
		}
		
		
		}
		
		$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
		$sql = "SELECT * FROM gps.location where trip_id=".$trip_id;
		$result = mysql_query($sql,$cn);
		if($result){
		echo "<table width='427' height='79' border='0'>".
  "<tr>
    <th width='39' bgcolor='#0099FF' scope='row'>&nbsp;</th>
    <td width='90' bgcolor='#0099FF'>Time</td>
    <td width='104' bgcolor='#0099FF'>Longtitude</td>
    <td width='113' bgcolor='#0099FF'>Lattitude</td>
    <td width='47' bgcolor='#0099FF'>Speed</td>
  </tr>";
		while($row = mysql_fetch_array($result)){
			
			if($row["speed"] <> 0){
				echo "<th scope='row'><img src='C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\GPS/truckyellow.PNG' width='30px' height='30px'></th>";
			}
			echo "<td>" .$row["time"]."</td>";
			echo "<td>" .$row["longtitude"]."</td>";
			echo "<td>".$row["lattitude"]."</td>";
			echo "<td>".$row["speed"]."</td>";
			echo "</tr>";
		}
		echo "<tr>
    <th colspan='5' scope='row'></th>
  </tr>";
		echo "</table>";
		}
		else{
			echo "Not Found";
		}
		

?>

</body>
</html>