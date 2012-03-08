<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#yai{}
#bird {color:#FFFFFF;background-color:#0033CC;margin-bottom:0}
#favorites {float:left}
#long {float:left;width:30px;height:30px}

</style>
<script type="text/javascript">
function test(){
	
	document.getElementById("long").innerHTML="<img src='bird.jpg' width = '25' height='25'>";
	
}
function test2(){

	document.getElementById("long").innerHTML="";
	
}
function test3(){
	document.getElementById("pp").innerHTML="<textarea rows='5' cols='50' onclick='test4()'> คุณคิดอะไรอยู่? </textarea>"
}
function test4(){
	document.getElementById("pp").innerHTML="<textarea rows='5' cols='50' name='eiei2'> </textarea>";
	
}


</script>

</head>

<body>
<div id="yai">

<div id="bird"> <h1>Facebook</h1></div>
<div id="favorites"><b onmousemove="test()" onmouseout="test2()">ข่าวใหม่ </b>

</div>

</div>

<div id="pp">
<div id="long"></div>

<input type="text" name="eiei" onclick="test3()" />
</div>


</body>
</html>
