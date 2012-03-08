<html>
<title></title>
<head>
<STYLE type ="text/css">
#txtHint {}
</style>
<script type="text/javascript">
function showHint(str){
	
	if (str.length==0){ 
		document.getElementById("txtHint").innerHTML="";
		return;
		}
		
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		
		if (xmlhttp.readyState==4&&xmlhttp.status==200){
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			}
		}
		
	xmlhttp.open("GET","eiei.php?q="+document.getElementById("str").value,true);
	xmlhttp.send();}
</script>
</head>
<body>

<input type ="text" id="str" onKeyUp ="showHint(str)"/> <br>
<div id ="txtHint">

</div>
</body>
</html>