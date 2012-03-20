<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
$cn = @mysql_connect("localhost", "root", "adminadmin");
if (!$cn) {
    echo "fail<br>";
    exit;
}
mysql_select_db("gps", $cn);
$username = $_SESSION["user"];
?>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Show Log</title>

        <link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />

        <script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
        <script src="Scripts/jquery.min.js"></script>
        <script src="Scripts/modernizr.foundation.js"></script>
        <script src="Scripts/foundation.js"></script>
        <script src="Scripts/app.js"></script>
        <link rel="stylesheet" href="css/foundation.css">
            <link rel="stylesheet" href="css/app.css">
                <link rel="stylesheet" href="css/acuity.css">
                    <script type="text/javascript">
                        window.onload = function(){
                            new JsDatePick({
                                useMode:2,
                                target:"inputField",
                                dateFormat:"%Y-%m-%d"
                                /*selectedDate:{				This is an example of what the full configuration offers.
                                                    day:5,						For full documentation about these settings please see the full version of the code.
                                                    month:9,
                                                    year:2006
                                            },
                                            yearsRange:[1978,2020],
                                            limitToToday:false,
                                            cellColorScheme:"beige",
                                            dateFormat:"%m-%d-%Y",
                                            imgPath:"img/",
                                            weekStartDay:1*/
                            });
                        };
	
                        function test(){
	
                            // ใช้ AJAX ส่ง ค่า สามอย่างไป query ออกมา
                            var eiei = document.getElementById("inputField").value;
                            var eiei2 = document.getElementById("car_id").value;
                            //var eiei3 = document.getElementById("user_id").value;
	
	
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
                                    document.getElementById("long22").innerHTML=xmlhttp.responseText;
				
                                   }
                            }
                            xmlhttp.open("GET","showmail.php?dayja="+eiei+"&car="+eiei2,true);
                            xmlhttp.send();
	
                        }
                        function show(){
                            var value = document.getElementById("select_type").value;
                            if(value == "date"){
                                document.getElementById('date').style.visibility = 'visible';
                                document.getElementById('car_license').style.visibility = 'hidden';
                                document.getElementById('driver').style.visibility = 'hidden';
                            }else if(value == "car"){
                                document.getElementById('date').style.visibility = 'hidden';
                                document.getElementById('car_license').style.visibility = 'visible';
                                document.getElementById('driver').style.style.visibility = 'hidden';
                            }else if(value == "driver"){
                                document.getElementById('date').style.visibility = 'hidden';
                                document.getElementById('car_license').style.visibility = 'hidden';
                                document.getElementById('driver').style.visibility = 'visible';
                            }
                        }
	
                   
                    </script>
                    <style type="text/css">
                        <!--
                        .style1 {
                            color: #FFFFFF;
                            margin-left: 10px;
                        }
                        .style3 {font-size: 14px}
                        .style4 {

                            font-weight: bold;

                        }
                        #content {background-image:url(../Img/bg5.png); width:400pt ; height:500pt; }
                        -->
                    </style>
                    </head>
                    <body >
                        <div id="content">
                            <p><b><img src="URL_History-64.png" width="20" height="20" /> </b><span class="style4">History</span></p>
                            <table>
                                <tr>
                                    <th width="528" height="39" bgcolor="#0066FF" scope="row"><div align="left" class="style1">เลือกช่วงข้อมูล</div></th>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <p align="left" class="style3"> Search in<select name="select_type" id="select_type" style="margin-left: 5px;" onchange="show()">
                                                <option value="date">Date</option>
                                                <option value="car">Car</option>
                                                <option value="driver">Driver</option>
                                            </select>
                                        </p>
                                        <p align="left" id="date">
                                            <span class="style3">Date</span>
                                            <input name="text" type="text" id="inputField" size="12" class="input-text"/>
                                        </p>
                                        <p align="left" id="car_license" style="visibility: hidden"><span class="style3">Car license</span>
                                            <select name="car_id" id ="car_id" >
                                                <option value="">&lt;-- Please Select Item --&gt;</option>
                                                <?php
                                                $sql = "SELECT * FROM gps.car where created_by='" . $username . "'";
                                                $result = mysql_query($sql, $cn);
                                                $i = 1;
                                                while ($row = mysql_fetch_array($result)) {
                                                    if ($i == 20) {
                                                        mysql_close($cn);
                                                    } else {
                                                        ?>
                                                        <option value="<?php echo $row['car_id'] ?>"> <?php echo $row['car_id'] ?> </option>
                                                    <?php }
                                                } ?>
                                            </select>
                                            <br />
                                        </p>
                                        <p align="left" id="driver" style="visibility: hidden" class="style3">
                                            Driver
                                            <select name="driver_id" id="driver_id">
                                                <?php
                                                $sql2 = "select * from gps.driver where created_by='" . $username . "'";
                                                $result = mysql_query($sql2, $cn);
                                                while ($row2 = mysql_fetch_array($result2)) {
                                                    ?>
                                                    <option value="<?php $row2["car_id"]; ?>"><?php $row2["car_id"] ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </p>
                                        <input name="submit" type="submit" onclick="test()" value="แสดงข้อมูล" />
                                    </th>
                                </tr>
                                <tr>
                                    <th height="115" scope="row">
                                        <div id="long22" align="left">


                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <p>&nbsp;</p>


                            <p>&nbsp;</p>
                        </div>
                    </body>
                    </html>
