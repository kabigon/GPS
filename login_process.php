<?php
// ใว้ข้างบนสุด ครับ
ob_start();
?>
<?php session_start() ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>




</head>

<body>

<?php

	$username= $_GET["username"];
	$password = $_GET["password"];
	$cn = @mysql_connect("localhost","root","adminadmin");
		if(!$cn){
			echo "fail<br>";
			exit;
		}
		mysql_select_db("gps",$cn);

	$sql = "select * from gps.user";
	$result = mysql_query($sql,$cn);
	
	
	while($row = mysql_fetch_array($result)){
		
		if($username == $row["username"]){
			if($password ==$row["password"]){
				if($row["rank"]=="admin"){
					
					echo "<div align='left'><h2>Welcome To Admin Page!</h2></div><br>";
					echo "<table width='250' border='0'><tr><th width='125' scope='row'><div align='left'>Username</div></th>";
					echo "<td width='109'><div align='left'>".$row["username"]."</div></td></tr>";
					echo "<tr><th scope='row'><div align='left'>password</div></th>";
					echo "<td>".$row["password"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>E-Mail</div></th>";
					echo "<td>".$row["email"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>Rank</div></th>";
					echo "<td>".$row["rank"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>Phone</div></th>";
					echo "<td>".$row["phone"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>Address</div></th>";
					echo "<td>".$row["address"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>Company-name</div></th>";
					echo "<td>".$row["company_name"]."</td></tr></table>";
					echo "<a href='mail.php' class='link'><input type='submit' value='Go to Web'></a>";
					echo "<input type='submit' value='Edit!' onclick='edit(".$row["id"].")'>";
					//echo "<meta http-equiv=\"refresh\" content=\"1; URL= home2.php\">";
					
				//echo "<a class='link' >Hi : ".$username ."</a>";
				//echo "<input type='submit' value='Logout' onclick='logout()' />";	
				$_SESSION['user'] = $_GET["username"] ;
				$_SESSION['rank'] = "admin";
				$_SESSION['company']= $row["company_name"];
				}
				else if($row["rank"]=="member"){
					echo "<div align='left'><h2>Welcome To Member Page!</h2></div><br>";
					echo "<table width='250' border='0'><tr><th width='125' scope='row'><div align='left'>Username</div></th>";
					echo "<td width='109'><div align='left'>".$row["username"]."</div></td></tr>";
					echo "<tr><th scope='row'><div align='left'>password</div></th>";
					echo "<td>".$row["password"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>E-Mail</div></th>";
					echo "<td>".$row["email"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>Rank</div></th>";
					echo "<td>".$row["rank"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>Phone</div></th>";
					echo "<td>".$row["phone"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>Address</div></th>";
					echo "<td>".$row["address"]."</td></tr>";
					echo "<tr><th scope='row'><div align='left'>Company-name</div></th>";
					echo "<td>".$row["company_name"]."</td></tr></table>";
					echo "<a href='member.php' class='link'><input type='submit' value='Go to Web'></a>";
					echo "<input type='submit' value='Edit!'>";
					
					
				//echo "<a class='link' >Hi : ".$username ."</a>";
				//echo "<input type='submit' value='Logout' onclick='logout()' />";	
				$_SESSION['user'] = $_GET["username"] ;
				$_SESSION['rank'] = $row["rank"];
				$_SESSION['company']= $row["company_name"];
				
				}
				else{
				$_SESSION['user'] = $_GET["username"] ;
				$_SESSION['rank'] = "user";
				echo "Hi :".$username;
				echo "<input type='submit' value='Logout' onclick='logout()' />";
				//echo "<meta http-equiv='refresh' content='2;URL=gps/mail.php#' />";
				}
			}
			else{
				echo "Password Fail  "."<a href='#' onclick='login()'>Login</a>";
			}
		}
		
	}
	
	/*if($result){
		echo "HI : " . $username ;
	}
	else{
		echo "fail";
	}*/
?>
</body>
</html>
