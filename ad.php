<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<script type="text/javascript">
	function test(){
		
		if(document.getElementById("tt").value == ""){
			document.getElementById("t").innerHTML="";
		}
		else{
			var ans = document.getElementById("tt").value;
			<?
			$cn = @mysql_connect("localhost","root","adminadmin");
			mysql_select_db("gps",$cn);
			$sql = "SELECT * FROM gps.loca where location like '".$eiei."%' ";
			$result = mysql_query($sql,$cn);
			
			?>
		}	
		
	}
</script>
</head>

<body>
<input type="text" onkeyup="test()" id="tt"/>
<div id="t">
</div>
</body>
</html>
