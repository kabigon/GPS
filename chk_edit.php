<?php

session_start();
$origi_user = $_SESSION["user"];
$username = $_GET["username"];
$password = $_GET["password"];
$email = $_GET["email"];
$rank = $_GET["rank"];
$phone = $_GET["phone"];
$address = $_GET["address"];
$company = $_GET["company"];

$cn = @mysql_connect("localhost:3307", "root", "adminadmin");
mysql_select_db("gps", $cn);

$sql = "update gps.user set username='" . $username . "',password='" . $password . "',email='" . $email . "',phone='" . $phone . "',address='" . $address . "',company_name='" . $company . "' where username='" . $origi_user . "'";

if (!mysql_query($sql, $cn)) {
    
    echo "Error: " . mysql_error();
}
echo " successful";

$_SESSION["user"] = $username;
$_SESSION["company"] = $company;
?>

