<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create Driver</title>

<style type = "text/css">
body{background-image:url(Img/bg2.jpg);color:#FFFFFF}
</style>
</head>

<body>
<h1>CREATE DRIVER</h1><hr />
<form action="insert_driver.php" method="post" enctype="multipart/form-data">
Name-Lastname : <input type="text" name="name" /><br />
Sex : <select name="sex">
<option value=""><-- Please Select Item --></option>
<option value="male">Male</option>
<option value="female">Female</option>
</select><br />
Age : <input type="text" name="age" /><br />
Personal ID : <input type="text" name="PID" /><br />
<input type="hidden" name ="MAX_FILE_SIZE" value="100000">Picture :<input type="file" name="userfile" id="file"> <br>
<input type="submit" name="submit" value="Create Driver">
</form>
</body>
</html>
