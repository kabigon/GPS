<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Create Car</title>
        <script src="Scripts/jquery.min.js"></script>
        <script src="Scripts/modernizr.foundation.js"></script>
        <script src="Scripts/foundation.js"></script>
        <script src="Scripts/app.js"></script>
        <link rel="stylesheet" href="css/foundation.css">
            <link rel="stylesheet" href="css/app.css">
                <style type = "text/css">
                    #content {background-image:url(Img/bg5.png); width:300pt ; height:500pt; margin-left: 10px}
                    ol.menu {
                        list-style-type:none;
                        display:table;
                        float: left;
                        margin:0 auto;
                    }
                    .menu li {
                        display:inline;
                        white-space:nowrap;
                    }
                    .menu span {
                        float:left;
                        display:table;
                        padding:2px;
                        cursor:pointer;
                    }
                    .button { /* ปุ่มเลือกสี ปกติ */
                        margin:1px;
                    }
                    .hover { /* ปุ่มเลือกสี เมื่อเมาส์อยู่บน */
                        background:#D3E4F5;
                        border:1px solid #167FB2;
                        margin:0;
                    }
                    .current { /* ปุ่มเลือกสี เมื่อเลือก */
                        background:#D3E4F5;
                        border:1px solid #167FB2;
                        margin:0;
                    }
                </style>

                </head>

                <body>
                    <div id="content">
                        <form action="insert_car.php" method="post" enctype="multipart/form-data">
                            <h3 style="color: #888">Create car</h3>
                            Car license
                            <input type="text" name="car_id" class="input-text"/>
                            Brand
                            <input type="text" name = "brand" class="input-text"/>
                            Color<br/>
                            <ol class="menu" >
                                <?php
                                $color = array("black", "maroon", "#F60310", "#E76E14", "#E7C514", "#1DDC12", "olive", "#148CE7", "navy", "#6C1CEA", "fuchsia", "teal", "purple", "gray", "silver", "white");
                                for ($i = 0; $i < count($color); $i++) {
                                    echo "<li><span id=\"color$i\" title=\"$color[$i]\" class=\"button\"><font class=\"btncolor\" style=\"background-color:$color[$i];color:$color[$i]\" >Yy</font></span></li>";
                                }
                                ?>
                                <script type="text/javascript">
                                    for (i = 0; i < <?php echo count($color) ?>; i++) {
                                        var obj = document.getElementById("color" + i);
                                        
                                        obj.onclick = function(){selectcolor(this.id)};
                                        function selectcolor (id) {
                                            this.className = "hover"
                                            for (i = 0; i < <?php echo count($color) ?>; i++) {
                                                document.getElementById("color" + i).className = "button";
                                            };
                                            if (!document.getElementById(id)) id = "color0";
                                            document.getElementById("usercolor").innerHTML = document.getElementById(id).title;
                                            document.getElementById(id).className = "current";
                                        }
                                    }</script>
                            </ol>
                            <br/><br/><small class="error" id="usercolor" ></small>
                            <label>Type</label><select name="type" id="nicedropdown">
                                <option value=""><-- Please Select Item --></option>
                                <option value="Motocycle">Motorcycle</option>
                                <option value="Van">Van</option>
                                <option value="Pick-up Truck">Pick-up Truck</option>
                                <option value="Truck">Truck</option>
                                <option value="Other">Other</option>
                            </select><br />
                            <input type="hidden" name ="MAX_FILE_SIZE" value="100000"/>
                            Select Picture :<input type="file" name="userfile" id="file"/> 
                            <input type="submit" name="submit" value="Create Car" style="float: right" class="nice radius small blue button"/>
                        </form>
                    </div>
                </body>
                </html>
