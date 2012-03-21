<?php
$id = $_GET["id"];
	

		$cn = @mysql_connect("localhost:3307","root","adminadmin");
		
		mysql_select_db("gps",$cn);
		$sql = "SELECT * FROM gps.user where id =". $id;
		$result = mysql_query($sql,$cn);
		while($row = mysql_fetch_array($result)){
			if($_SESSION["rank"]=='admin'){
					echo "<div align='left'><h2>Welcome To Admin Page!</h2></div><br>";
			}
			else{
					echo "<div align='left'><h2>Welcome To Member Page!</h2></div><br>";
			}
			echo "<table width='250' border='0'><tr><th width='125' scope='row'><div align='left'>Username</div></th>";
			echo "<td width='109'><div align='left'>"."<input type='text' id='username' value='".$row["username"]."'>"."</div></td></tr>";
			echo "<tr><th scope='row'><div align='left'>password</div></th>";
			echo "<td>"."<input type='text' id='password' value='".$row["password"]."'>"."</td></tr>";
			echo "<tr><th scope='row'><div align='left'>E-Mail</div></th>";
			echo "<td>"."<input type='text' id='email' value='".$row["email"]."'>"."</td></tr>";
			echo "<tr><th scope='row'><div align='left'>Rank</div></th>";
			echo "<td>"."<input type='text' id='rank' value='".$row["rank"]."'>"."</td></tr>";
			echo "<tr><th scope='row'><div align='left'>Phone</div></th>";
			echo "<td>"."<input type='text' id='phone' value='".$row["phone"]."'>"."</td></tr>";
			echo "<tr><th scope='row'><div align='left'>Address</div></th>";
			echo "<td>"."<input type='text' id='address' value='".$row["address"]."'>"."</td></tr>";	
			echo "<tr><th scope='row'><div align='left'>Company-name</div></th>";
			echo "<td>"."<input type='text' id='company' value='".$row["company_name"]."'>"."</td></tr></table>";
			echo "<input type='submit' value='Edit!' onclick='editja()'>";
			echo "<a href='home2.php'><input type='submit' value='Cancle!'></a>";
		}