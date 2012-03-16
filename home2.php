<?php session_start() ; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/main_mail.css" />
<title>Home</title>

 <script type="text/javascript">
 	function login(){
		document.getElementById("loginbox").innerHTML="<h1> Login </h1> <br>Username : <input type='text' id='username' name='username'><br>Password : <input type='password' id='password' name='password'><br><input type='submit' value='Login' onclick='login_process()'>";
		
	
	}
	function login_process(){
		
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
	
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
                document.getElementById("loginbox").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","login_process.php?username="+username+"&password="+password,true);
        xmlhttp.send();
    }
	
	function authen(){
		document.getElementById("loginbox").innerHTML="<h1>Authentication</h1><br> Code : <input type='password' id='code'><br><input type='submit' value='Authen' onclick='authen_process()'>"
	}
	function authen_process(){
	
		var authen = document.getElementById("code").value;
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
                document.getElementById("loginbox").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","authen_process.php?code="+authen,true);
        xmlhttp.send();
	}
	function edit(str){
	
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
                document.getElementById("loginbox").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","edit.php?id="+str,true);
        xmlhttp.send();
	}
	function editja(){
        var username = document.getElementById("username").value;
        var password= document.getElementById("password").value;
        var email = document.getElementById("email").value;
        var rank = document.getElementById("rank").value;
		var phone = document.getElementById("phone").value;
		var address = document.getElementById("address").value;
		var company = document.getElementById("company").value;
		
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
                document.getElementById("loginbox").innerHTML=xmlhttp.responseText;
               }
        }
        xmlhttp.open("GET","chk_edit.php?username="+username+"&password="+password+"&email="+email+"&rank="+rank+"&phone="+phone+"&address="+address+"&company="+company,true);
        xmlhttp.send();
    }
	
	
 </script>
</head>

<body>

<div id="center" >
                <div id="header">

                </div>
                <div class="style4" id="nevigator">
				<?php if($_SESSION["user"]==null){ ?>
				<a href="#" onclick="login()" class="link"> Login 	</a>
				<a href="#" onclick="authen()" class="link"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Authentication&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				<?php } else{
				
					echo "<span class='welcome'>Hi: <a href='home2.php' class='link3'>".$_SESSION["user"]."</a> | ".$_SESSION["rank"]."<a href='logout.php' ><img src='logout.png'></a></span>";
				}?>
				</div>
				<center>
				<br />
				<div id="loginbox" >
				<?php 
				if($_SESSION["user"]!=null){
						$cn = @mysql_connect("localhost","root","adminadmin");
						mysql_select_db("gps",$cn);
						$sql = "select * from gps.user where username='".$_SESSION["user"]."'";
						$result = mysql_query($sql,$cn);
						while($row = mysql_fetch_array($result)){
						if($_SESSION["rank"]=='admin'){
							echo "<div align='left'><h2>Welcome To Admin Page!</h2></div><br>";
						}
						else{
							echo "<div align='left'><h2>Welcome To Member Page!</h2></div><br>";
						}
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
					if($_SESSION["rank"]=="admin"){
						echo "<a href='mail.php' class='link'><input type='submit' value='Go to Web'></a>";
					}
					else{
						echo "<a href='member.php' class='link'><input type='submit' value='Go to Web'></a>";
					}
					echo "<input type='submit' value='Edit!' onclick='edit(".$row["id"].")'>";
						}
	
						}
					
				
				?>
				</div>
				</center>
				</div>
</body>
</html>
