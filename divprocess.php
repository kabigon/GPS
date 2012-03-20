<?php
ob_start();
session_start();
$cn = @mysql_connect("localhost", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <link rel="stylesheet" type="text/css" href="css/main_mail.css" />
    <script src="Scripts/jquery.min.js"></script>
    <script src="Scripts/modernizr.foundation.js"></script>
    <script src="Scripts/foundation.js"></script>
    <script src="Scripts/app.js"></script>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="TH Sarabun New/fonts/thsarabunnew.css" />
    <link rel="stylesheet" type="text/css" href="css/main_mail.css" />
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
    </head>

    <body>

        <?php
        $username = $_GET["username"];
        $password = $_GET["password"];
        $sql = "select * from gps.user";
        $result = mysql_query($sql, $cn);
        while ($row = mysql_fetch_array($result)) {
            if ($username == $row["username"]) {
                if ($password == $row["password"]) {
                    echo "<span class='welcome'>Hi: <a href='home2.php' class='link3'>" . $_SESSION["user"] . "</a> | " . $_SESSION["rank"] . "<a href='logout.php' ><img src='logout.png'></a></span>";
                }
            } 
        }

        /* if($result){
          echo "HI : " . $username ;
          }
          else{
          echo "fail";
          } */
        ?>
    </body>
</html>