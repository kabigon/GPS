<?php //session_start() ;

	//$_SESSION["user"]=$_GET["user"];
 ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$date22 = $_GET["dayja"];
	$car = $_GET["car"];
	$choose =$_GET["choose"];
	$dateja = $_GET["dateja"];
	$user = $_GET["driver"];
	echo $_GET["user"];
	//if($_SESSION["rank"]=="admin"){
		if($choose=="car"){
		if($dateja !=""){
			
		$cn = @mysql_connect("localhost", "root", "adminadmin");

	mysql_select_db("gps", $cn);
	$sql = "SELECT * FROM gps.trip where start_time like '%".$dateja."%' and car_id='".$car."'";
	$result = mysql_query($sql, $cn);
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
	
    if($i==0){
	echo "<table width='769' height='237' border='0'><tr><th colspan='7' scope='row'><span class='style22'>Trip Description </span></th></tr><tr><th width='100' bgcolor='#EAEAEA' scope='row'>Trip Name </th><td width='160' bgcolor='#EAEAEA'><strong>Start Time </strong></td><td width='160' bgcolor='#EAEAEA'><strong>Finish Time </strong></td><td width='80' bgcolor='#EAEAEA'><strong>Car ID</strong></td><td width='44' bgcolor='#EAEAEA'><strong>User ID </strong></td><td width='117' bgcolor='#EAEAEA'><strong>Create By</strong></td><td width='44' bgcolor='#EAEAEA'><strong>Status</strong></td></tr>";
	}
	$i = $i+1;
	echo "<tr><th bgcolor='#F9F9F9' scope='row'><a href=\"javascript:void(0)\"onclick=\"window.open('../trip_des.php?id=".$row["trip_id"] ."','link','height=500, width=600,scrollbars=no')\"  class=\"link2\">".$row["trip_name"] ."</a></th><td bgcolor='#F9F9F9'>". $row['start_time'] ." </td><td bgcolor='#F9F9F9'>".$row["finish_time"]."</td><td bgcolor='#F9F9F9'>". $row["car_id"]."</td><td bgcolor='#F9F9F9'>".$row["user_id"]."</td><td bgcolor='#F9F9F9'>".$row["create_by"]."</td><td bgcolor='#F9F9F9'><img src='truck3green.png' width='31' height='25' /></td></tr>";
	
	}
		}
		}
		
		if($choose=="driver"){
		if($dateja !=""){
		
		$cn = @mysql_connect("localhost", "root", "adminadmin");

	mysql_select_db("gps", $cn);
	$sql = "SELECT * FROM gps.trip where start_time like '%".$dateja."%' and user_id=".$user;
	$result = mysql_query($sql, $cn);

	
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
    if($i==0){
	echo "<table width='769' height='237' border='0'><tr><th colspan='7' scope='row'><span class='style22'>Trip Description </span></th></tr><tr><th width='100' bgcolor='#EAEAEA' scope='row'>Trip Name </th><td width='160' bgcolor='#EAEAEA'><strong>Start Time </strong></td><td width='160' bgcolor='#EAEAEA'><strong>Finish Time </strong></td><td width='80' bgcolor='#EAEAEA'><strong>Car ID</strong></td><td width='44' bgcolor='#EAEAEA'><strong>User ID </strong></td><td width='117' bgcolor='#EAEAEA'><strong>Create By</strong></td><td width='44' bgcolor='#EAEAEA'><strong>Status</strong></td></tr>";
	}
	$i = $i+1;
	echo "<tr><th bgcolor='#F9F9F9' scope='row'><a href=\"javascript:void(0)\"onclick=\"window.open('trip_des.php?id==".$row["trip_id"] ."','link','height=500, width=600,scrollbars=no')\"  class=\"link2\">".$row["trip_name"] ."</a></th><td bgcolor='#F9F9F9'>". $row['start_time'] ." </td><td bgcolor='#F9F9F9'>".$row["finish_time"]."</td><td bgcolor='#F9F9F9'>". $row["car_id"]."</td><td bgcolor='#F9F9F9'>".$row["user_id"]."</td><td bgcolor='#F9F9F9'>".$row["create_by"]."</td><td bgcolor='#F9F9F9'><img src='truck3green.png' width='31' height='25' /></td></tr>";
	
	}
		}
		}

	//}
	/*else{ //member
		//$member = $_SESSION["user"];
		echo $member;
		if($choose=="car"){
		if($dateja !=""){
		
		$cn = @mysql_connect("localhost", "root", "adminadmin");

	mysql_select_db("gps", $cn);
	
	$sql = "SELECT * FROM gps.trip where start_time like '%".$dateja."%' and car_id='".$car."' and create_by='".$member."'";
	$result = mysql_query($sql, $cn);

	
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
    if($i==0){
	echo "<table width='769' height='237' border='0'><tr><th colspan='7' scope='row'><span class='style22'>Trip Description </span></th></tr><tr><th width='100' bgcolor='#EAEAEA' scope='row'>Trip Name </th><td width='160' bgcolor='#EAEAEA'><strong>Start Time </strong></td><td width='160' bgcolor='#EAEAEA'><strong>Finish Time </strong></td><td width='80' bgcolor='#EAEAEA'><strong>Car ID</strong></td><td width='44' bgcolor='#EAEAEA'><strong>User ID </strong></td><td width='117' bgcolor='#EAEAEA'><strong>Create By</strong></td><td width='44' bgcolor='#EAEAEA'><strong>Status</strong></td></tr>";
	}
	$i = $i+1;
	echo "<tr><th bgcolor='#F9F9F9' scope='row'><a href=\"javascript:void(0)\"onclick=\"window.open('../trip_des.php?id=".$row["trip_id"] ."','link','height=500, width=600,scrollbars=no')\"  class=\"link2\">".$row["trip_name"] ."</a></th><td bgcolor='#F9F9F9'>". $row['start_time'] ." </td><td bgcolor='#F9F9F9'>".$row["finish_time"]."</td><td bgcolor='#F9F9F9'>". $row["car_id"]."</td><td bgcolor='#F9F9F9'>".$row["user_id"]."</td><td bgcolor='#F9F9F9'>".$row["create_by"]."</td><td bgcolor='#F9F9F9'><img src='truck3green.png' width='31' height='25' /></td></tr>";
	
	}
		}
		}
		
		if($choose=="driver"){
		if($dateja !=""){
		
		$cn = @mysql_connect("localhost", "root", "adminadmin");

	mysql_select_db("gps", $cn);
	$sql = "SELECT * FROM gps.trip where start_time like '%".$dateja."%' and user_id=".$user." and create_by='".$member."'";
	$result = mysql_query($sql, $cn);

	
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
    if($i==0){
	echo "<table width='769' height='237' border='0'><tr><th colspan='7' scope='row'><span class='style22'>Trip Description </span></th></tr><tr><th width='100' bgcolor='#EAEAEA' scope='row'>Trip Name </th><td width='160' bgcolor='#EAEAEA'><strong>Start Time </strong></td><td width='160' bgcolor='#EAEAEA'><strong>Finish Time </strong></td><td width='80' bgcolor='#EAEAEA'><strong>Car ID</strong></td><td width='44' bgcolor='#EAEAEA'><strong>User ID </strong></td><td width='117' bgcolor='#EAEAEA'><strong>Create By</strong></td><td width='44' bgcolor='#EAEAEA'><strong>Status</strong></td></tr>";
	}
	$i = $i+1;
	echo "<tr><th bgcolor='#F9F9F9' scope='row'><a href=\"javascript:void(0)\"onclick=\"window.open('trip_des.php?id==".$row["trip_id"] ."','link','height=500, width=600,scrollbars=no')\"  class=\"link2\">".$row["trip_name"] ."</a></th><td bgcolor='#F9F9F9'>". $row['start_time'] ." </td><td bgcolor='#F9F9F9'>".$row["finish_time"]."</td><td bgcolor='#F9F9F9'>". $row["car_id"]."</td><td bgcolor='#F9F9F9'>".$row["user_id"]."</td><td bgcolor='#F9F9F9'>".$row["create_by"]."</td><td bgcolor='#F9F9F9'><img src='truck3green.png' width='31' height='25' /></td></tr>";
	
	}*/
		//}
		//}
	//}
?>

</body>
</html>