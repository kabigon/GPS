<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type = "text/css">
#Login {  width:300pt;height:200pt; border-right-style:groove;border-left:groove;border-bottom:groove;font-family:Broadway}
#body { background-color:#333333}
#headLogin { font-size:40px ; width:300pt ; height:50pt;border-right-style:solid;border-left-style:solid;border-top-style:solid;border-style:groove;font-family:Broadway}
#Icon {float:right}
#test {background-image:url(Img/bg5.png) ; width:305pt ; height:500pt}


}
</style>
<script type="text/javascript">
	function check(){
		window.location="chk_pass.php?username="+document.getElementById("username").value+"&password="+document.getElementById("password").value;
	}
</script>


</head>

<body>
<div id="test">

<div id="headLogin">
<center>GPS Tracking</center>
</div>
<div id="Login">
<center>
<br />
Username : <input type="text" id="username"/><br />
Password : <input type="password" id="password"/><br />
<br />
<img src="Img/LoginButton4.png" width="80" height="40" onclick="check()"/>

<a href="register.php" ><img src="Img/RegisterButton1.png" width="80" height="40" /></a><br /><br />
<!--<input type="submit" value="Register" />-->


</center>
<div id="Icon">

<img src="Img/login.png" />


</div>
</div>
</div>
</body>
</html>

