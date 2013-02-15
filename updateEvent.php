<?php
	session_start();
	$mysql_host = "mysql5.000webhost.com";
	$mysql_database = "a3940063_roundup";
	$mysql_user = "a3940063_cloudy";
	$mysql_password = "6doubles";
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database,$con);
	$eventName = trim(mysql_real_escape_string($_POST['event']));
	$eventDate = date('Y-m-d',strtotime($_POST[date]));
	$eventDate = trim(mysql_real_escape_string($eventDate));
	$eventTime = trim(mysql_real_escape_string($_POST['time']));
	$eventLocation = trim(mysql_real_escape_string($_POST['location']));
	$eventCity = trim(mysql_real_escape_string($_POST['city']));
	$eventState = trim(mysql_real_escape_string($_POST['state']));
	$eventWebsite = trim(mysql_real_escape_string($_POST['website']));
	$query = "UPDATE events SET Event_Name='$eventName', Event_Date='$eventDate', Event_Time='$eventTime', Event_Location='$eventLocation', Event_City='$eventCity', Event_State='$eventState', Event_Website='$eventWebsite' WHERE U_Id='$_SESSION[userid]' AND Event_Id='$_POST[id]'";
	if(!mysql_query($query,$con)){
		echo $query . "<br>";
		echo mysql_error();
	}
	mysql_close($con);
?>