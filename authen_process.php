<?php session_start() ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php
	$code = $_GET["code"];
	
	$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);

	$sql = "select * from gps.trip where authen_code =".$code;
	$result = mysql_query($sql,$cn);
	while($row = mysql_fetch_array($result)){
		$_SESSION["authen"]=$row["trip_id"];
		$_SESSION["create_by"] =$row["create_by"];
		
	}
	
	$sql2 = "select * from gps.user where username ='".$_SESSION["create_by"]."'";
		$result2 = mysql_query($sql2,$cn);
		
		while($row2 = mysql_fetch_array($result2)){
			echo "Company : " .$row2["company_name"]."<br>";
			$_SESSION["company"]=$row2["company_name"];
			echo "<a href='authen.php' ><input type='submit' value='Go To Web'></a>";
		}	

?>
</body>
</html>
