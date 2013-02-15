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
	$query = "INSERT INTO events (U_Id,Event_Name, Event_Date, Event_Time, Event_Location, Event_City, Event_State, Event_Website) VALUES('$_SESSION[userid]','$eventName','$eventDate','$eventTime','$eventLocation','$eventCity','$eventState','$eventWebsite')";
	if(!mysql_query($query,$con)){
		echo $query . "<br>";
		echo mysql_error();
	}
	else{
		$_SESSION['success']=true;
		header( 'Location: AddEvent.html' );
	}
	mysql_close($con);
?>