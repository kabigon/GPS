<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title></title>


</head>

<body>

<script type="text/javascript">

function Ajax(){
var xmlHttp;
try{	
xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
}
catch (e){
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
}
catch (e){
try{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e){
alert("No AJAX!?");
return false;
}
}
}

xmlHttp.onreadystatechange=function(){
if(xmlHttp.readyState==4){
document.getElementById('ReloadThis').innerHTML=xmlHttp.responseText;
setTimeout('Ajax()',10000);
}
}
xmlHttp.open("GET","ab.php",true);
xmlHttp.send(null);
}

window.onload=function(){
setTimeout('Ajax()',10000);
}


</script>

<div id="ReloadThis">

<?php
$clock = date("H:i:s");

echo $clock;

?>

</div>



</body>

</html>