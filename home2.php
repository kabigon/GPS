<?php
session_start();
$cn = @mysql_connect("localhost", "root", "adminadmin");
mysql_select_db("gps", $cn);
$_SESSION['user'] = "";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <script src="Scripts/jquery.min.js"></script>
        <script src="Scripts/modernizr.foundation.js"></script>
        <script src="Scripts/foundation.js"></script>
        <link href="GPS2/style2.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="TH Sarabun New/fonts/thsarabunnew.css" />

        <title>Home</title>

        <script type="text/javascript">
            function login(){
                document.getElementById("loginbox").style.display = "block";
                document.getElementById("authenbox").style.display = "none";
            }
            
	
            function authen(){
                document.getElementById("loginbox").style.display = "none";
                document.getElementById("authenbox").style.display = "block";
            }
            function authen_process(){
				
                var authen = document.getElementById("code").value;
                //alert(authen);
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
                        document.getElementById("authenbox").innerHTML=xmlhttp.responseText;
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
        <div id="page">
            <div id="header">
                <h1><a href="#"><span>Tracking</span> For Logistic</a></h1>
                <p id="subtitle">Template designed by Alpha Studio</p>
            </div>
            <div id="menu" style="margin-top:0">
                <div class="style4" id="nevigator">
                    <a href="#" onclick="login()" class="link"> Login 	</a>
                    |<a href="#" onclick="authen()" class="link" style="margin-right: 20px">  Authentication </a>

                </div>
            </div>
            <div id="main">
                <center>

                    <div id="loginbox" style="width:800px;">
                        <form action="loginprocess2.php" method="post">
                            <h2 style= "color: #888; font-family: THSarabunNew,Tahoma, sans-serif; "> Login </h2> <br/> 
                            <input type='text' id='username' name='username' class="input-text" placeholder="Username"/>
                            <input type='password' id='password' name='password' class="input-text" placeholder="Password" />
                            <input type='submit' value='Login'  onclick="login()" class="medium blue nice button radius" />
                        </form>
                    </div>
                    <div id="authenbox" style="display: none; margin-top: 20px;">
                        <!--<form action="authen_process.php" method="post">-->
                        <h2 style= "color: #888; font-family: THSarabunNew,Tahoma, sans-serif; "> Authentication </h2><br/>
                        <input type='password' id='code' class="input-text" placeholder="Enter authen code here...."/><br/>
                        <input type='submit' value='Authen' onclick="authen_process()" class="medium blue nice button radius"/>
                        <!--</form>-->
                    </div>
                </center>
            </div>
        </div>

    </body>
</html>
