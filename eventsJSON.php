<?php
session_start();
include 'databaseVars.php';
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