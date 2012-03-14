<?php session_start() ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<meta http-equiv="refresh" content="2;URL=mail.php">-->
<title>Untitled Document</title>
<style type = "text/css">
body{background-image:url(Img/bg2.jpg);color:#FFFFFF}
</style>
<SCRIPT LANGUAGE="JAVASCRIPT" TYPE="TEXT/JAVASCRIPT"> 
var StayAlive = 3; // เวลาเป็นวินาทีที่ต้องการให้ WIndows เปิดออก 
function KillMe(){ 
setTimeout("self.close()",StayAlive * 1000); 
window.parent.opener.document.location.href='member.php';
} 

function KillMe2(){ 
setTimeout("self.close()",StayAlive * 1000); 
window.parent.opener.document.location.href='mail.php';
} 
</SCRIPT> 
</head>

<body onload="KillMe();self.focus()";> 
<?php
$dest ="C:\AppServ\www\GPS/".$_FILES['userfile']['name'];
	if(move_uploaded_file($_FILES['userfile']['tmp_name'],$dest)){
	//echo "finish move file <br>";
	define("MAX_SHOW_SIZE",500000);
	if($_FILES['userfile']['size']> MAX_SHOW_SIZE){
		echo '<a href ="/GPS/' .$_FILES['userfile']['name'].'"> click see </a>';
	}
	}
	else{
		echo "Upload Picture Fail<br>";
	}

$cn = @mysql_connect("localhost","root","adminadmin");
if(!$cn){
	echo "fail<br>";
	exit;
}
mysql_select_db("gps",$cn);
$name =$_POST["name"];
$sex=$_POST["sex"];
$age=$_POST["age"];
$PID=$_POST["PID"];
$pic =$_FILES['userfile']['name'];
$userja = $_SESSION["user"];


$sql = "INSERT INTO gps.driver VALUES(null , '{$name}', '{$sex}','{$age}','{$PID}',100,'{$pic}',
'{$userja}')";
$result = mysql_query($sql,$cn);

if($result){
	echo "<img src=" .$_FILES['userfile']['name'] ." width='150px' height='200px'>" ."<br>";
	echo "Add Successful"."<br>";
	echo "<img src='loading.gif'/><br>";
	//echo( "<a href=\"#\" onclick=\"window.close(); return false\">CLOSE WINDOW</a>"); ;
	if ($_SESSION["rank"]=="member") {
	echo "<SCRIPT LANGUAGE='javascript'><!--n";
	echo "KillMe();n";
	echo "// --></SCRIPT>n";
	}
	else if($_SESSION["rank"]=="admin"){
	echo "<SCRIPT LANGUAGE='javascript'><!--n";
	echo "KillMe2();n";
	echo "// --></SCRIPT>n";
	}

}
else{
	echo "Add EROR";
}
mysql_close($cn);



?>
</body>
</html>
