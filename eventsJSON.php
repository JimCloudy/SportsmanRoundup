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
while($row = mysql_fetch_array($result))
{
	$event = array();
	$event = array(
		'event_id' => $row['Event_Id'],
		'u_id' => $row['U_Id'],
		'event_name' => $row['Event_Name'],
		'event_date' => $row['Event_Date'],
		'event_time' => $row['Event_Time'],
		'event_location' => $row['Event_Location'],
		'event_city' => $row['Event_City'],
		'event_state' => $row['Event_State'],
		'event_website' => $row['Event_Website']
		);
	$events[] = array('event' => $event);
}

echo $_GET['callback'] . json_encode($events);
?>