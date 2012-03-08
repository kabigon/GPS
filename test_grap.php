<?php
//include 'connect.php';
//$line2 = array();
//$rs = mysql_query('select *...');
//while($r = mysql_fetch_assoc($rs)) $line2[] = array(strtotime('d/m/y',$r['column_name_datetime'],$r['column_name_int']);

//line2 = [['1/1/2008', 42], ['2/14/2008', 56], ['3/7/2008', 39], ['4/22/2008', 81]];
$line2 = array(array('1/1/2008', 41),array('2/14/2008', 56),array('3/7/2008', 39),);

echo 'line2 = '.json_encode($line2).';';
?>
