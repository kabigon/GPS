<html>
<head>
<script type="text/javascript">
function timeMsg()
{
var t=setTimeout("alertMsg()",3000);
}
function alertMsg()
{
alert("Hello");
}
</script>
</head>

<body>
<form>
<input type="button" value="Display alert box in 3 seconds"
onclick="timeMsg()" />
</form>
</body>
</html>
