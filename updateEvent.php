<?php
	session_start();
	include 'databaseVars.php';
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database,$con);
	$eventName = trim($_POST['event']);
	$eventDate = date('Y-m-d',strtotime($_POST[date]));
	$eventDate = trim($eventDate);
	$eventTime = trim($_POST['time']);
	$eventLocation = trim($_POST['location']);
	$eventCity = trim($_POST['city']);
	$eventState = trim($_POST['state']);
	$eventWebsite = trim($_POST['website']);
	$query = "UPDATE events SET Event_Name='$eventName', Event_Date='$eventDate', Event_Time='$eventTime', Event_Location='$eventLocation', Event_City='$eventCity', Event_State='$eventState', Event_Website='$eventWebsite' WHERE U_Id='$_SESSION[userid]' AND Event_Id='$_POST[id]'";
	if(!mysql_query($query,$con)){
		echo $query . "<br>";
		echo mysql_error();
	}
	mysql_close($con);
?>