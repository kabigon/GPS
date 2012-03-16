<?php session_start() ; ?>
<?php
	$_SESSION["user"]=null;
	$_SESSION["rank"]=null;
	echo header("location:home2.php");
?>