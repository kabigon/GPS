<?php
session_start();
$username = $_SESSION["user"];
$start_lat = $_GET["start_lat"];
$end_lng = $_GET["end_lng"];
$cn = mysql_connect("localhost","root","adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
$sql1 = "select * from trip order by trip_id DESC"; // trip_id
$result1 = mysql_query($sql1, $cn);
$row1 = mysql_fetch_array($result1);
$idtrip = $row1["trip_id"];
$idtrip += 1;
$mdd5 = md5($idtrip+$start_lat+$end_lng);
$authen = substr($mdd5,0,strlen($mdd5)/4);

    

echo($authen);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
