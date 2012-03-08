<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create Car</title>

<style type = "text/css">
body{background-image:url(Img/bg2.jpg);color:#FFFFFF}
</style>
</head>

<body>
<form action="insert_car.php" method="post" enctype="multipart/form-data">
<h1>CREATE CAR</h1><hr />
CAR ID :<input type="text" name="car_id" /><br />
Brand &nbsp;&nbsp;&nbsp;:<input type="text" name = "brand" /><br />
Color :<input type="text" name = "color" /> <br />
type :<input type="text" name ="type"  /><br />
<input type="hidden" name ="MAX_FILE_SIZE" value="100000">Picture :<input type="file" name="userfile" id="file"> <br>
<input type="submit" name="submit" value="Create Car">
</form>

</body>
</html>
