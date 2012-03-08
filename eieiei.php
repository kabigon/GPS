<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
	function test(){
		alert(document.getElementById("ttttt").value);
		
	}
</script>
</head>

<body>
Trip : <select name="trip" onchange="test()">
<option value=""><-- Please Select Trip --></option>
      <?php 
			$cn = @mysql_connect("localhost","root","adminadmin");
			if(!$cn){
				echo "fail<br>";
				exit;
			}
			mysql_select_db("gps",$cn);
			$sql = "SELECT * FROM gps.trip order by trip_id desc";
			$result = mysql_query($sql,$cn);
			while($row = mysql_fetch_array($result)){
			?>
				<option id='ttttt' value="<?php echo $row['trip_id'] ;?> "> <?php echo $row['trip_name'] ;?> </option>
			<?php }
			
			?>

</select><br />
</body>
</html>
