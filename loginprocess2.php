<?php

session_start();
$username = $_POST["username"];
$password = $_POST["password"];
$cn = @mysql_connect("localhost:3307", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
$sql = "select * from gps.user where username='".$username. "'";
$result = mysql_query($sql, $cn);
if($row = mysql_fetch_array($result)){
    if (($username == $row["username"]) && ($password == $row["password"])) {
        $_SESSION["user"] = $username;
        $_SESSION["rank"] = $row["rank"];
        $_SESSION["company"] = $row["company_name"];
        header("Location: login_process.php");
    }else{
        header("Location: home2.php");
    }
}else{
    header("Location: home2.php");
}

?>
