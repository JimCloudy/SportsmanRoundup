<?php
	session_start();
	$mysql_host = "mysql5.000webhost.com";
	$mysql_database = "a3940063_roundup";
	$mysql_user = "a3940063_cloudy";
	$mysql_password = "6doubles";
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database,$con);
	if($_SESSION['newuser'])
	{
		$query="SELECT * FROM users WHERE User_Name = '$_SESSION[newuser]'";
		unset($_SESSION['newuser']);
	}
	else{
		$query="SELECT * FROM users WHERE User_Name = '$_POST[userName]' AND User_Password = '$_POST[userPassword]'";
	}
	$result=mysql_query($query,$con);
	if(mysql_num_rows($result)==0){
		$_SESSION['error']="Invalid User Name/Password";
		header( 'Location: SignIn.html' );
	}
	else{
		$row = mysql_fetch_array($result);
		$_SESSION['username']=$row['User_Name'];
		$_SESSION['userid']=$row['User_Id'];
		$_SESSION['userorg']=$row['User_Org'];
		header( 'Location: Events.html' );
	}
	mysql_close($con);
?> 