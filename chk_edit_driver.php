<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="2;URL=mail.php">
<title>Untitled Document</title>
</head>

<body>

<?
	$name = $_GET["name"] ;
	$sex =  $_GET["sex"];
	$age =  $_GET["age"];
	$PID =  $_GET["PID"];
	
	$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
		
	$sql = "update gps.driver set name='" .$name. "',sex='".$sex."',age='".$age."' where PID='".$PID."'";
	$result = mysql_query($sql,$cn);

	if($result){
		echo " <center><h1> Edit Successfull </h1>";
		echo "<img src='loading2.gif'/></center>";
	}
?>
</body>
</html>
