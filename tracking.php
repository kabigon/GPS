<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Strict//EN”

    “http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd”>

<html xmlns=”http://www.w3.org/1999/xhtml”>

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<title>Project 1</title>
<script src="jquery-1.6.3.min.js"></script>
<script src="jquery.easing.1.2.js"></script>
<script src="jquery.slideviewer.1.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/slideviewer.css" />
<!– Embed API Key–>
	<style type = "text/css">
	#test {background-image:url(Img/bg2.jpg);width:100%;height:100%;color:#FFFFFF}
	#mapja {margin-left:20px;}
	#map {}
	#comment{float:left;margin-left:50px}
	#nevigator{margin-left:100px;margin-right:100px}
	#end {margin-left:0px;margin-right:0px}
	#krop{margin-left:100px;background-color:#D5FFD5;margin-right:100px}
	#long{}
	.style1 {font-family: "Comic Sans MS"}
	hr {margin-top:0px;}
	.mytextbox{background:#CCFFFF}
	
	.link:link{
	color:#FFFFFF;
	text-decoration:none;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	}
	.link:visited{
	color:#FFFFFF;
	text-decoration:none;
	}
	.link:active{
	color:#FFFFFF;
	text-decoration:none;
	}
	.link:hover{
	color:#FF9900;
	text-decoration:none;
	}
	#eiei{
	background-color:#FFFF00;
	width:30px;
	}
	#eiei2{
	background-color:#990000;
	width:30px;
	}
	#eiei3{
	background-color:#0099FF;
	width:30px;
	}
	
	
</style>
<script language="javascript">
	function test(){
		
	}
</script>
<!-- AJAX -->
<script type="text/javascript">
var i =0;
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
		//setTimeout("Ajax()",1000);
	}
}
i++;
xmlHttp.open("GET","/GPS/999.php?name="+i,true);
xmlHttp.send(null);
setTimeout("Ajax()",5000);
}


</script>

<script type="text/javascript"> 
 
	$(document).ready(function(){
		$("#slide").slideView() 
	});
 
</script>

<SCRIPT language=JAVASCRIPT>
  function herher(){
	javascript:NewWindow=window.open('Login.php','newWin','width=450,height=400,left=0,top=0,toolbar=No,location=No,scrollbars=No,status=No,resizable=No,fullscreen=No');
NewWindow.focus();
void 0;}
</SCRIPT>

    <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body onLoad="load()" onUnload="GUnload()" ><span class="style1"> </span>
<div id="test">
<div id="eiei">&nbsp;&nbsp </div>
<div id="eiei2">&nbsp;&nbsp </div>
<div id="eiei3">&nbsp;&nbsp </div>
	<center><h1>&nbsp;GPS TrackinG </h1></center>
<div id="nevigator">
	
  &nbsp;&nbsp;&nbsp;&nbsp;HOME&nbsp;&nbsp;&nbsp;&nbsp;Setting&nbsp;&nbsp;&nbsp;&nbsp;People&nbsp;&nbsp;&nbsp;&nbsp;Setting&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a onClick="herher()" class="link" > Login </a></b>
  <form action="#" onsubmit="showAddress(this.address.value); return false">
<input type="text" size="80" name="address" value="ใส่จังหวัด อำเภอ ตำบล ถนน เพื่อทำการค้นหาตำแหน่ง" />
<input name="submit" type="submit" value="ทำการค้นหา" />
<form>
<hr>
<script>

/* Using multiple unit types within one animation. */

$("#eiei").mousemove(function(){
  $("#map").hide("slow");
});

$("#eiei").mouseout(function () {
      $("#map").show(2000);
    });
	
$("#eiei2").click(function () {
if ($("#map").is(":hidden")) {
$("#map").slideDown("slow");
} else {
$("#map").hide();
}
});

$("#eiei3").click(function(){
	$("#map").fadeToggle("slow","linear");
});

</script>
<br><br>
  <div id="mapja">

    <center>
    	<div id="krop">
        <br><br>
      <div id="map">
      <script language="JavaScript">
<!--
//¡ÓË¹´¤ÇÒÁ¡ÇéÒ§ÊÒÂ¾Ò¹ÅÓàÅÕÂ§
var sliderwidth=800
//¡ÓË¹´¤ÇÒÁÊÙ§ÊÒÂ¾Ò¹ 
var sliderheight=150
//¡ÓË¹´¤ÇÒÁàÃçÇÊÒÂ¾Ò¹
var slidespeed=4

//¡ÓË¹´ÃÙ»·ÕèµéÍ§¡ÒÃáÅÐ LINK
var leftrightslide=new Array()
var finalslide=''
leftrightslide[0]='<img border="0" src="bird.jpg">'
leftrightslide[1]='<a href="http://localhost/showmenu.php?name=¢éÒÇË¹éÒËÁÙà¡ÒËÅÕ"><img border="0" src="http://pegasus.it.kmitl.ac.th/GPS/bird.jpg"></a>'
leftrightslide[2]='<a href="http://www.geocities.com/namkiatv/java"><img border="0" src="bird.jpg"></a>'
leftrightslide[3]='<a href="http://www.geocities.com/namkiatv/html"><img border="0" src="tle.jpg"></a></a>'
leftrightslide[4]='<img border="0" src="5.jpg"></a>'

///////¢éÒ§ÅèÒ§¹ÍÂèÒä»ÂØè§¹Ð¤ÃÑºÕé//////////////////

var copyspeed=slidespeed
//copy contents of leftrightslide into one variable
for (i=0;i<leftrightslide.length;i++)
finalslide=finalslide+leftrightslide[i]+"&nbsp;&nbsp;"


if (document.all){
//dynamically write out the marquee tag
document.write('<marquee id="ieslider" scrollAmount=0 style="width:'+sliderwidth+'">'+finalslide+'</marquee>')
//stop marquee when mouse is over it
ieslider.onmouseover=new Function("ieslider.scrollAmount=0")
//re-enable marquee when mouse is out
ieslider.onmouseout=new Function("if (document.readyState=='complete') ieslider.scrollAmount=slidespeed")
}

function regenerate(){
window.location.reload()
}
function regenerate2(){
if (document.layers){
document.ns_slider01.visibility="show"
setTimeout("window.onresize=regenerate",450)
intializeleftrightslide()
}
if (document.all)
ieslider.scrollAmount=slidespeed
}

//NS specific function for initializing slider upon page load
function intializeleftrightslide(){
document.ns_slider01.document.ns_slider02.document.write('<nobr>'+finalslide+'</nobr>')
document. ns_slider01.document.ns_slider02.document.close()
thelength=document.ns_slider01.document.ns_slider02.document.width
scrollslide()
}

//NS specific function for sliding slideshow
function scrollslide(){
if (document.ns_slider01.document.ns_slider02.left>=thelength*(-1)){
document.ns_slider01.document.ns_slider02.left-=slidespeed
setTimeout("scrollslide()",100)
}
else{
document.ns_slider01.document.ns_slider02.left=sliderwidth
scrollslide()
}
}
window.onload=regenerate2

//-->
</script>
      </div>
      
      <br><br>
      </div>
    </center>
    <br><br>
 <div id="end">
 
<hr>
</div>  	
</div>

</body>

</html>

