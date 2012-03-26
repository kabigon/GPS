<?php
session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

$cn = @mysql_connect("localhost", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--<meta http-equiv="refresh" content="2;URL=mail.php">-->
        <title>Status Create Trip</title>

        <style type = "text/css">
            body {
                background-image:url(Img / bg2.jpg);
                color:#FFFFFF}
        </style>
        <SCRIPT LANGUAGE="JAVASCRIPT" TYPE="TEXT/JAVASCRIPT">
            var StayAlive = 3; // เวลาเป็นวินาทีที่ต้อง�?ารให้ WIndows เปิดออ�? 

            function KillMe(){ 
setTimeout("self.close()",StayAlive * 1000); 
window.parent.opener.document.location.href='GPS2/index-member.php';
} 
function KillMe2(){ 
setTimeout("self.close()",StayAlive * 1000); 
window.parent.opener.document.location.href='GPS2/index2.php';
} 
        </SCRIPT> 
    </head>

    <body>

        <?php
        $trip_name = $_GET["trip_name"];
        $start_long = $_GET["start_long"];
        $start_lat = $_GET["start_lat"];
        $end_long = $_GET["end_long"];
        $end_lat = $_GET["end_lat"];
        $car_id = $_GET["car_id"];
        $user_id = $_GET["user_id"];
        $location1 = $_GET["location1"];
        $location2 = $_GET["location2"];
        $module_id = $_GET["module_id"];
        $authen = $_GET["authen_code"];
        $start_time = "22";
        $username = $_SESSION["user"];
        $email = $_GET["des_email"];


        //ดึงค่า user_id ที่�?ท้จริงจา�? database เพิื่อนำมา Add ลง Table Trip

        $sql = "SELECT * FROM gps.driver where pic ='" . $user_id . "'";
        $result = mysql_query($sql, $cn);

        while ($row = mysql_fetch_array($result)) {
            $i = 1;
            if ($i = 1) {
                $user_id = $row["user_id"];
                echo $user_id;
            }
            $i = $i + 1;
        }

        //ดึงค่า car_id ที่�?ท้จริงจา�? database เพิื่อนำมา Add ลง Table Trip


        $sql = "SELECT * FROM gps.car where pic ='" . $car_id . "'";
        $result = mysql_query($sql, $cn);

        while ($row = mysql_fetch_array($result)) {
            $i = 1;
            if ($i = 1) {
                $car_id = $row["car_id"];
                echo "car_id :" . $car_id;
            }
            $i = $i + 1;
        }


        //Add Table Trip


        /* INSERT INTO gps.trip (start_long, start_lat, end_long,end_lat,user_id,car_id,trip_name,start_time,finish_time,date) VALUES ('13.5','100.5','13.6','100.6',1,'123','sriracha',"","",""); */


        $sql = "INSERT INTO gps.trip VALUES (0,'$trip_name','$start_lat','$start_long','$end_lat','$end_long',NOW(),'0000-00-00 00:00:00','$car_id','$user_id','$location1','$location2','asdf','$username','$authen','$module_id')";
        if (!mysql_query($sql, $cn)) {
            die('Error: ' . mysql_error());
        }
        echo "1 record added";
        $strTo = "$email";
        $strSubject = "TFL AuthenCode for $trip_name";
        $strHeader = "From: jak_cholchalatan@hotmail.com";
        $strMessage = "Your Authen Code is $authen";

        $flgSend = @mail($strTo, $strSubject, $strMessage, $strHeader);  // @ = No Show Error //

        if ($flgSend) {
            echo "Email Sending.";
        } else {
            echo "Email Can Not Send.";
        }
	if ($_SESSION["rank"]=="member") {
	echo "<SCRIPT LANGUAGE='javascript'>";
	echo "KillMe();";
	echo "</SCRIPT>";
	}
	else if($_SESSION["rank"]=="admin"){
	echo "<SCRIPT LANGUAGE='javascript'>";
	echo "KillMe2();";
	echo "</SCRIPT>";
	}
        ?>

    </body>
</html>