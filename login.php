<?php
	session_start();	
	//db connect
	include('db.php');
	
	if(!isset($_POST["user"])){
		header('Location: index.php');			
	}
	//escape user and pass
	$username = mysql_real_escape_string($_POST["user"]);
	$password = mysql_real_escape_string($_POST["pass"]);
	
	
	//username fix
	$username = strtolower($username);
	
	//salt
	$salt = "0b18d6c76817f61b243f62adb68f7f85";
	$saltPass = $password . $salt;
	
	//encrypt
	$dataPass = hash("sha256", $saltPass);
	
	//query
	$query = "SELECT * FROM users WHERE user ='{$username}' AND password='{$dataPass}'";
	$output = mysql_query($query);
	
	if ($row = mysql_fetch_assoc($output)){		
		//successful login and session shit	
		$_SESSION['rank'] = $row['rank'];
		$_SESSION['name'] = $row['name'];
		$pageName = 'loginsuccess';
	}		
	else{
		//badlogin fuck you
		$pageName = 'loginfail';
	}
	
	include('content.php');
	
	include('template.php');
	
	
?>