<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="TH Sarabun New/fonts/thsarabunnew.css" />
<title>Show Log</title>
<!-- 

	Copyright 2009 Itamar Arjuan
	jsDatePick is distributed under the terms of the GNU General Public License.
	
	****************************************************************************************

	Copy paste these 2 lines of code to every page you want the calendar to be available at
-->
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<!-- 
	OR if you want to use the calendar in a right-to-left website
	just use the other CSS file instead and don't forget to switch g_jsDatePickDirectionality variable to "rtl"!
	
	<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.css" />
-->
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<!-- 
	After you copied those 2 lines of code , make sure you take also the files into the same folder :-)
    Next step will be to set the appropriate statement to "start-up" the calendar on the needed HTML element.
    
    The first example of Javascript snippet is for the most basic use , as a popup calendar
    for a text field input.
-->
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
	
	function test(){
	
	// ใช้ AJAX ส่ง ค่า สามอย่างไป query ออกมา
	
	var user ="<?php $_SESSION["user"]; ?>";
	
	//var eiei3 = document.getElementById("user_id").value;
	var dateja =document.getElementById("inputField").value ;
	
	
	if(document.getElementById("choose").value =="car"){
	
		var eiei2 = document.getElementById("car_id").value;
	if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}
		else
  		{// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
		xmlhttp.onreadystatechange=function()
  		{
  			if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
    			document.getElementById("long22").innerHTML=xmlhttp.responseText;
				
    }
  }
		xmlhttp.open("GET","showmail.php?choose=car&car="+eiei2+"&dateja="+dateja+"&user="+user,true);
		xmlhttp.send();
		}
		
		else if(document.getElementById("choose").value =="driver"){
	
		var eiei3 = document.getElementById("driver_id").value;
	if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}
		else
  		{// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
		xmlhttp.onreadystatechange=function()
  		{
  			if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
    			document.getElementById("long22").innerHTML=xmlhttp.responseText;
				
    }
  }
		xmlhttp.open("GET","showmail.php?choose=driver&driver="+eiei3+"&dateja="+dateja,true);
		xmlhttp.send();
		}
	
	}	
	
	
	function choose(){
	
		var choose = document.getElementById("choose").value;
		
		if(choose=="car"){
		
			document.getElementById("chooseBox").innerHTML="<p align='left'><span class='style4'>Car :</span><select name='car_id' id ='car_id' ><option value=''>&lt;-- Please Select Item --&gt;</option>"
            <?php 

$cn = @mysql_connect("localhost","root","adminadmin");
if(!$cn){
	echo "fail<br>";
	exit;
}
mysql_select_db("gps",$cn);
$sql = "SELECT * FROM gps.car";
$result = mysql_query($sql,$cn);
$i=1;
while($row = mysql_fetch_array($result)){
	?>
            +"<option value='<?php echo $row['car_id'] ?>'> <?php echo $row['car_id'] ?> </option>"
            <?php 
	
}?>
          +"</select> "
		}
		else if(choose=="driver"){
			
			document.getElementById("chooseBox").innerHTML="<p align='left'><span class='style4'>Driver :</span><select name='driver_id' id ='driver_id' ><option value=''>&lt;-- Please Select Item --&gt;</option>"
            <?php 

$cn = @mysql_connect("localhost","root","adminadmin");
if(!$cn){
	echo "fail<br>";
	exit;
}
mysql_select_db("gps",$cn);
$sql = "SELECT * FROM gps.driver";
$result = mysql_query($sql,$cn);
$i=1;
while($row = mysql_fetch_array($result)){
	?>
            +"<option value='<?php echo $row['user_id'] ?>'> <?php echo $row['name'] ?> </option>"
            <?php 
	
}?>
          +"</select> "
		}
		else if(choose=="trip"){
			document.getElementById("chooseBox").innerHTML="<p align='left'><span class='style4'>Trip :</span><select name='car_id' id ='car_id' ><option value=''>&lt;-- Please Select Item --&gt;</option>"
            <?php 

$cn = @mysql_connect("localhost","root","adminadmin");
if(!$cn){
	echo "fail<br>";
	exit;
}
mysql_select_db("gps",$cn);
$sql = "SELECT * FROM gps.trip";
$result = mysql_query($sql,$cn);
$i=1;
while($row = mysql_fetch_array($result)){
	?>
            +"<option value='<?php echo $row['trip_id'] ?>'> <?php echo $row['trip_name'] ?> </option>"
            <?php 
	
}?>
          +"</select> "
		}
		
	}
</script>
<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.style3 {font-size: 14px}
.style4 {
	color: #FF6600;
	
	font-size: 14px;
	font-family: THSarabunNew,Tahoma, sans-serif;
}
#long22{
	font-family: THSarabunNew,Tahoma, sans-serif;
}
-->
</style>
</head>
<body bgcolor="#000000">
<p><b><img src="URL_History-64.png" width="20" height="20" /> </b><span class="style4">History</span></p>
<table width="800" height="289" border="1"  bordercolor="#CCCCCC">
  <tr>
    <th width="528" height="39"  scope="row"><div align="left" class="style4">เลือกช่วงข้อมูล</div></th>
  </tr>
  <tr>
    <th scope="row"><p align="left"><span class="style4">วันที่ :</span>
      <input name="text" type="text" id="inputField" size="12" />
    </p>
	<p align="left"><span class="style4">เลือก :</span>
        <select name="choose" id ="choose" onchange="choose()" >
            <option value="">&lt;-- Please Select Item --&gt;</option>
			<option value="car">Car</option>
			<option value="driver">Driver</option>
			
		</select>
		</p>
      
		  
		

		
      <div id="chooseBox"></div>
      <div align="left">
        <input name="submit" type="submit" onclick="test()" value="แสดงข้อมูล" />
    </div></th>
  </tr>
  <tr>
    <th height="115" scope="row"><div id="long22" align="left">

      
    </div></th>
  </tr>
</table>
<p>&nbsp;</p>
<p><br />
  <br />
</p>
    


<p>&nbsp;</p>
</body>
</html>
