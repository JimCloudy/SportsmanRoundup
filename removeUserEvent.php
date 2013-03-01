<?php
	session_start();
	include 'databaseVars.php';
	if(!$_SESSION['username']){
		header('Location: Events.html');
	}
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database,$con);
	$eventDate = date('Y-m-d',strtotime($_POST[date]));
	$query = "DELETE FROM events WHERE Event_Id = '$_POST[event]' AND U_Id = '$_SESSION[userid]'";
	if(!mysql_query($query,$con)){
		echo mysql_error();
	}
	else{
		echo "success|";
	}
	mysql_close($con);
?>