<?php
	session_start();
	$mysql_host = "mysql5.000webhost.com";
	$mysql_database = "a3940063_roundup";
	$mysql_user = "a3940063_cloudy";
	$mysql_password = "6doubles";
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database,$con);
	$query = "INSERT INTO users (User_Name,User_Password,User_Date) VALUES ('$_POST[userName]','$_POST[userPassword]',NOW())";
	if(!mysql_query($query,$con)){
		echo $query . "<br>";
		echo mysql_error();
	}
	else{
		$_SESSION['newuser']=$_POST['userName'];
		header( 'Location: signIn.php' );
	}
	mysql_close($con);
?> 