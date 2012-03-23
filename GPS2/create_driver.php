<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Create Driver</title>
        <script src="Scripts/jquery.min.js"></script>
        <script src="Scripts/modernizr.foundation.js"></script>
        <script src="Scripts/foundation.js"></script>
        <script src="Scripts/app.js"></script>
        <link rel="stylesheet" href="css/foundation.css">
            <link rel="stylesheet" href="css/app.css">
                <style type = "text/css">
                    #content {background-image:url(Img/bg5.png); width:300pt ; height:500pt; margin-left: 10px}
                </style>
                </head>

                <body>
                    <div id="content">
                        <h3 style="color: #888">Create Driver</h3>
                        <form action="insert_driver.php" method="post" enctype="multipart/form-data">
                            Name-Lastname  <input type="text" name="name" class="input-text"/>
                            Sex  
                            <select name="sex" id="nicedropdown">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            Age  <input type="text" name="age" class="input-text" size="3"/>
                            Personal ID  <input type="text" name="PID" class="input-text"/>
                            <input type="hidden" name ="MAX_FILE_SIZE" value="100000"/>
                            Select Picture <input type="file" name="userfile" id="file"/>
                            <input type="submit" name="submit" value="Create Driver" class="nice radius small blue button" style="float: right;"/>
                        </form>
                    </div>
                </body>
                </html>
