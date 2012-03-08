<? session_start() ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV='Refresh' CONTENT='0.1; URL=mail.php'>
<title>Untitled Document</title>

<script language="javascript">
window.parent.opener.document.location.href='mail.php';
</script>


</head>

<body>

<?

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
				echo "<a class='link' >Hi : ".$username ."</a>";
				echo "<input type='submit' value='Logout' onclick='logout()' />";	
				$_SESSION['user'] = $_GET["username"] ;
				$_SESSION['rank'] = "admin";
				}
				else{
				$_SESSION['user'] = $_GET["username"] ;
				$_SESSION['rank'] = "user";
				echo "Hi :".$username;
				echo "<input type='submit' value='Logout' onclick='logout()' />";
				
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
