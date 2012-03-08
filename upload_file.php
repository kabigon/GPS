<?php
$dest ="C:\AppServ\www\GPS/".$_FILES['userfile']['name'];
	if(move_uploaded_file($_FILES['userfile']['tmp_name'],$dest)){
	//echo "finish move file <br>";
	define("MAX_SHOW_SIZE",100000);
	if($_FILES['userfile']['size']> MAX_SHOW_SIZE){
		echo '<a href ="/GPS/' .$_FILES['userfile']['name'].'"> click see </a>';
	}
	else{
		echo "fail<br>";
	}
	}
	else{
		echo "fail<br>";
	}

?>