<?php
	session_start();
	$mysql_host = "mysql5.000webhost.com";
	$mysql_database = "a3940063_roundup";
	$mysql_user = "a3940063_cloudy";
	$mysql_password = "6doubles";
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database,$con);
	$query = "INSERT INTO events (Event_Name, Event_Date, Event_Time, Event_Location, Event_City, Event_State, Event_Website) VALUES('$_POST[event]','$_POST[date]','$_POST[time]','$_POST[location]','$_POST[city]','$_POST[state]','$_POST[website]')";
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