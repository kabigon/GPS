<?php
   session_start();
   $con = mysql_connect("localhost:3307","root","adminadmin");
   if(!$con){
       die('Could not connect: '.mysql_error());
   }
   mysql_select_db("gps",$con);
   
   $sql = "SELECT trip_id FROM gps.trip WHERE module_id='$_GET[module_id]' DESC";
   $result = mysql_query($sql,$con);
   if(!mysql_fetch_array($result)){
       echo("not have trip_id");
   }else{
       $row = mysql_fetch_array($result);
       $tripId = $row['trip_id'];
   }
   $sql2 = "INSERT INTO gps.log VALUES (0,'$trip_id','$_GET[log_type]','$_GET[time]','$_GET[module_id]')";
   if(!mysql_query($sql2,$con)){
       die('Error: '.mysql_error());
   }
   echo "complete record";
   mysql_close($con);
?>
