<?php session_start() ; 

ob_start();?>


<?php
session_destroy();
	echo header("location:home2.php");


?>
