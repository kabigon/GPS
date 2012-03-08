<?php

ob_start();
session_start();

$username = $_GET["user"];
$password = $_GET["pass"];
$email = $_GET["email"];
$rank = $_GET["role"];
$company = $_GET["company"];
$address = $_GET["add"];
$phone = $_GET["phone"];


echo $rank;
$cn = @mysql_connect("localhost:3307", "root", "adminadmin");

mysql_select_db("gps", $cn);
$sqlcheck = "SELECT * from gps.user where username= '$username'";
$result2 = mysql_query($sqlcheck, $cn);
if (!mysql_fetch_array($result2)) {
    $sql = "INSERT INTO gps.user VALUES (0,'$username' ,'$password','$email','$rank','$phone','$address','$company')";
    $result = mysql_query($sql, $cn);
    if (!$result) {
        die('Error: ' . mysql_error());
    }
    echo "Successful";
    //header("Location: mail.php");
} else {
    $_SESSION["check"] = "Username invalid";

    //header("Location: register.php");
}

mysql_close($cn);
?>



