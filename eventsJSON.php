<?php
session_start();
$mysql_host = "mysql5.000webhost.com";
$mysql_database = "a3940063_roundup";
$mysql_user = "a3940063_cloudy";
$mysql_password = "6doubles";

$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database,$con);
$query = "SELECT * FROM events WHERE U_Id ='$_SESSION[userid]' ORDER BY Event_Date";
$result = mysql_query($query);
$events = array();
while($row = mysql_fetch_assoc($result))
{
	$events[] = $row;
}

header('Content-type: application/json');
echo json_encode(array('events'=>$events));
?>