<?php session_start() ; ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
<style type = "text/css">
</style>
<SCRIPT LANGUAGE="JAVASCRIPT" TYPE="TEXT/JAVASCRIPT"> 

</SCRIPT> 
</head>

<body>

<?php
// ใว้ข้างบนสุด ครับ
$cn = @mysql_connect("localhost", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="css/main_mail.css" />
        <script src="Scripts/jquery.min.js"></script>
        <script src="Scripts/modernizr.foundation.js"></script>
        <script src="Scripts/foundation.js"></script>
        <script src="Scripts/app.js"></script>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/app.css" />
        <link rel="stylesheet" href="TH Sarabun New/fonts/thsarabunnew.css" />
        <link rel="stylesheet" type="text/css" href="css/main_mail.css" />
        <link rel="stylesheet" type="text/css" href="css/table1.css" />
        

        <script type="text/javascript">
            function edit(str){
                document.getElementById("loginbox").style.display="none";
                document.getElementById("editbox").style.display="block";
            }
            
            function editja(){
                var username = document.getElementById("username2").value;
                var password= document.getElementById("password2").value;
                var email = document.getElementById("email2").value;
                var phone = document.getElementById("phone2").value;
                var address = document.getElementById("address2").value;
                var company = document.getElementById("company2").value;
                document.getElementById("loginbox").style.display="block";
                document.getElementById("editbox").style.display="none";
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("loginbox").innerHTML=xmlHttp.responseText;
                    }
                }
                xmlhttp.open("GET","chk_edit.php?username="+username+"&password="+password+"&email="+email+"&phone="+phone+"&address="+address+"&company="+company,true);
                xmlhttp.send();
            }
	
	function check(str){
            if(str=="admin"){
                
                window.document.location.href="GPS2/index2.php";
            }
            else{
                window.document.location.href="GPS2/index-member.php";
            }
            
            
        }
        </script>
        <title>Home</title>
    </head>

    <body>

        <?php
        if ($_SESSION['user'] != "") {
            $username = $_SESSION["user"];
            $sql = "select * from gps.user where username='" . $username . "'";
            $result = mysql_query($sql, $cn);
            $row = mysql_fetch_array($result);
            ?>
            <div id="center" style="margin-left: auto; margin-right: auto;" >
                <div id="header">

                </div>
                <div class="style4" id="nevigator">
                    <span class='welcome'>Hi<a href='login_process.php' class='link3' style="margin-left: 10px;margin-right: 10px;"><?php echo $username ?></a> <a href='logout.php' ><img src="logout.png" /></a></span>
                </div>
                <center>
                    <br />
                    <div id="loginbox" style="width:800px">
                        <div align='left'>
                            <h3 style= "color: #888; font-family: THSarabunNew,Tahoma,sans-serif; ">Welcome to <?php echo $row["rank"] ?> page</h3>
                            <div>
                                <p id="edituser"></p>
                            </div>
                        </div>
                        <table border='0' id="box-table-a">
                            <thead>
                                <tr>
                                    <th></th> 
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>Username</div>
                                    </td>
                                    <td>
                                        <div align='left'> <?php echo $row["username"] ?> </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>E-Mail</div>
                                    </td>
                                    <td>
                                        <?php echo $row["email"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>Rank</div>
                                    </td>
                                    <td>
                                        <?php echo $row["rank"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>Phone</div>
                                    </td>
                                    <td>
                                        <?php echo $row["phone"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>Address</div>
                                    </td>
                                    <td>
                                        <?php echo $row["address"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>Company-name</div>
                                    </td>
                                    <td>
                                        <?php echo $row["company_name"] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href='#' class='link' onclick="check('<?php echo $row["rank"]; ?>')"><input type='submit' value='Go to Web' class="medium blue nice button radius" /></a>
                        <input type='submit' value='Edit' onclick="edit(<?php echo $row["id"] ?>)" class="medium blue nice button radius" />
                    </div>
                    <div id="editbox" style="display: none;">
                        <div align='left'>
                            <h3 style= "color: #888; font-family: THSarabunNew,Tahoma,sans-serif; ">Welcome to <?php echo $row["rank"] ?> page</h3>
                        </div>
                        <table border='0' id="box-table-a">
                            <thead>
                                <tr>
                                    <th></th> 
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>Username</div>
                                    </td>
                                    <td>
                                        <div align='left'> <input type="text" name="username2" id="username2" class="input-text" value="<?php echo $row["username"] ?>" />  </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>password</div>
                                    </td>
                                    <td>
                                        <input type="password" name="password2" id="password2" class="input-text" />
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>E-Mail</div>
                                    </td>
                                    <td>
                                        <input type="text" name="email2" id="email2" class="input-text" value="<?php echo $row["email"] ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>Phone</div>
                                    </td>
                                    <td>
                                        <input type="text" name="phone2" id="phone2" class="input-text" value="<?php echo $row["phone"] ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>Address</div>
                                    </td>
                                    <td>
                                        <input type="text" name="address2" id="address2" class="input-text" value="<?php echo $row["address"] ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope='row'>
                                        <div align='left'>Company-name</div>
                                    </td>
                                    <td>
                                        <input type="text" name="company2" id="company2" class="input-text" value="<?php echo $row["company_name"] ?>"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type='submit' value='Submit' onclick="editja()" class="medium blue nice button radius" />
                    </div>
                </center>

            </div>


            <?php }
            else {
                ?>
				<div id="center" style="margin-left: auto; margin-right: auto;" >
                    <div id="header">

                    </div>
					 <div class="style4" id="nevigator">
                        <a href="#" onclick="login()" class="link"> Login</a>
                        |<a href="#" onclick="authen()" class="link" style="margin-right: 20px">  Authentication </a>

<?php
	$sql = "select * from gps.user";
	$result = mysql_query($sql,$cn);
	
	
	while($row = mysql_fetch_array($result)){
		
		if($username == $row["username"]){
			if($password ==$row["password"]){
				if($row["rank"]=="admin"){
					
					echo "<div align='left'><h2>Welcome To Admin Page!</h2></div><br>";
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
					echo "<a href='mail.php' class='link'><input type='submit' value='Go to Web'></a>";
					echo "<input type='submit' value='Edit!' onclick='edit(".$row["id"].")'>";
					//echo "<meta http-equiv=\"refresh\" content=\"1; URL= home2.php\">";
					
				//echo "<a class='link' >Hi : ".$username ."</a>";
				//echo "<input type='submit' value='Logout' onclick='logout()' />";	
				$_SESSION['user'] = $_GET["username"] ;
				$_SESSION['rank'] = "admin";
				$_SESSION['company']= $row["company_name"];
				echo "<script language=javascript>alert('Please enter a valid username.')</script>";
				
				}
				else if($row["rank"]=="member"){
					echo "<div align='left'><h2>Welcome To Member Page!</h2></div><br>";
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
					echo "<a href='member.php' class='link'><input type='submit' value='Go to Web'></a>";
					echo "<input type='submit' value='Edit!'>";
					
					
				//echo "<a class='link' >Hi : ".$username ."</a>";
				//echo "<input type='submit' value='Logout' onclick='logout()' />";	
				$_SESSION['user'] = $_GET["username"] ;
				$_SESSION['rank'] = $row["rank"];
				$_SESSION['company']= $row["company_name"];
				echo "<SCRIPT LANGUAGE='javascript'><!--n";
	echo "KillMe();n";
	echo "// --></SCRIPT>";
				
				}
				else{
				$_SESSION['user'] = $_GET["username"] ;
				$_SESSION['rank'] = "user";
				echo "Hi :".$username;
				echo "<input type='submit' value='Logout' onclick='logout()' />";
				//echo "<meta http-equiv='refresh' content='2;URL=gps/mail.php#' />";
				}
			}
			else{
				echo "Password Fail  "."<a href='#' onclick='login()'>Login</a>";
			}
		}
		
	}
	
	/*if($result){
		echo "HI : " . $username ;
	}
	else{
		echo "fail";
	}*/
?>
</body>

                    </div>
                    <center>
                        <br />
                        <div id="loginbox" style="width:800px">
                            <script>
                                window.location="home2.php";
                            </script>
                        </div>
                    </center>
                </div>
            <?php } ?>
    

</html>
