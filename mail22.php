<?php 
		$cn = @mysql_connect("localhost","root","adminadmin");
		
		mysql_select_db("gps",$cn);
		$sql = "SELECT * FROM gps.trip order by trip_id desc";
		$result = mysql_query($sql,$cn) or die(mysql_error());
		while($row = mysql_fetch_array($result)){
		  	$carid = $row[car_id]; 
			echo $carid;
			echo "<br>";
			
			mysql_select_db("gps",$cn);
			$sql2 = "SELECT * FROM gps.car where car_id=".$carid ;
			$result2 = mysql_query($sql2) or die(mysql_error());
			while($row2 = mysql_fetch_array($result2)){
				echo $row2[pic];
				echo "<br>";
			}
			
		}
			
?>