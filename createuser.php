<?php
	//page identifier
	$pageName = 'createuser';

	//database
	include('db.php');
	//general content
	include('content.php');
	
	//escape user and pass
	$username = mysql_real_escape_string($_POST["user"]);
	$login = strtolower($username);
	$displayName = mysql_real_escape_string($_POST["name"]);
	$password = mysql_real_escape_string($_POST["pass"]);
	$userType = mysql_real_escape_string($_POST['userType']);
	
	//salt
	$salt = "0b18d6c76817f61b243f62adb68f7f85";
	$saltPass = $password . $salt;
	
	//encrypt
	$dataPass = hash("sha256", $saltPass);
	
	//add to database
	$query = "INSERT INTO users (user, name, rank, password) VALUES ('{$login}', '{$displayName}', '{$userType}', '{$dataPass}')";
	mysql_query($query) or trigger_error(mysql_error());
	
	//page load
	include('template.php');	
?>