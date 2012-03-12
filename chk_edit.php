<?php
	
	$username =  $_GET["username"];
	$password =  $_GET["password"];
	$email =  $_GET["email"];
	$rank =  $_GET["rank"];
	$phone =  $_GET["phone"];
	$address =  $_GET["address"];
	$company =  $_GET["company"];
	
	$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);
		
	$sql = "update gps.user set username='" .$username. "',password='".$password."',email='".$email."',phone='".$phone."',address='".$address."',company_name='".$company."' where username='".$username."'";
	$result = mysql_query($sql,$cn);

	if($result){
		echo " <h1> Edit Successfull </h1>";
		echo "<a href='home2.php' class='link2'> Go To Profile</a>";
	}
	else{
		echo "fail";
	}
?>

