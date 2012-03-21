<?php
// ใว้ข้างบนสุด ครับ
ob_start();
session_start();
$cn = @mysql_connect("localhost:3307", "root", "adminadmin");
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
        <style type = "text/css">
            #box-table-a
            {
                font-size: 12px;
                margin: 45px;
                width: 480px;
                text-align: left;
                border-collapse: collapse;
            }
            #box-table-a th
            {
                font-size: 13px;
                font-weight: normal;
                padding: 8px;
                background: #b9c9fe;
                border-top: 4px solid #aabcfe;
                border-bottom: 1px solid #fff;
                color: #039;
            }
            #box-table-a td
            {
                padding: 8px;
                background: #e8edff; 
                border-bottom: 1px solid #fff;
                color: #669;
                border-top: 1px solid transparent;
            }
            #box-table-a tr:hover td
            {
                background: #d0dafd;
                color: #339;
            }


        </style>

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
                        <a href='mail.php' class='link'><input type='submit' value='Go to Web' class="medium blue nice button radius" /></a>
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
    </body>
</html>
