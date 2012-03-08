<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="Scripts/jquery.min.js"></script>
        <script src="Scripts/modernizr.foundation.js"></script>
        <script src="Scripts/foundation.js"></script>
        <script src="Scripts/app.js"></script>
        <title>Register</title>
        <link rel="stylesheet" href="css/foundation.css">
            <link rel="stylesheet" href="css/app.css">
                <style type = "text/css">
                    #test {background-image:url(Img/bg5.png) ; width:305pt ; height:500pt}
                    #register {float:right}
                    #checkstatus {color:#FF0000}
                    #chkpass{color:red}
                    #chkpassok{color:green ; size:auto ;}



                </style>
                <script  language="javascript">
                   
                    function chkpass(){

                        var pass = document.register1.pass.value;
                        var Rep= document.register1.rep.value;
                        if(pass !="" || pass ==null){
                            if(pass == Rep){
                                $("#repassword").removeClass("red");
                                document.getElementById("alert").style.display="none";
                            }
                            else{
                                //   alert("kkkk");
                                $("#repassword").addClass("red");
                                document.getElementById("alert").style.display="block";
                            }
                        }else{
                            $("#")
                        }
                        //  alert("SDF");

                    }
                 
                    
                </script>

                </head>

                <body>

                    <div id="test">
                        <h3 style="color: #888">Register Form</h3>
                        <form name="register1" action="register_process.php">

                            <label for="username">Username </label>
                            <input type="text" name="user"  class="input-text" id="username"/>
                            <label for="password">Password </label> 
                            <input type="password"  name="pass" id="password" class="input-text"/>
                            <label for="repassword">Re - Password </label>  
                            <input type="password" name="rep" onblur="javascript:chkpass()" id="repassword" class="input-text"/>
                            <small class="error" style="display: none" id="alert">Wrong Password</small>
                            <label for="email">Email</label> 
                            <input type="text" name="email" class="input-text" id="email"/>
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="input-text" id="phone"/>
                            <label for="company">Company name</label>
                            <input type="text" name="company" class="medium input-text"/>
                            <label for="standardTexted">Address: </label>
                            <textarea cols="15" rows="2" id="standardTexted" name="add"></textarea>
                            <label for="standardDropdown">Role :</label>
                            <select name="role" id="standardDropdown">
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                            </select>

                            <input type="submit" value="register" class="nice radius small blue button" style="float: right"/>
                        </form>


                    </div>




                </body>
                </html>
