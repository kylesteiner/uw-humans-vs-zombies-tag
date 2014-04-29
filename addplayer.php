<?php
	$pageName = 'addplayer';
	
	if(!isset($_POST["uID"])){
		header('Location: index.php');
	}
	
	include('db.php');

	//Escape injection
	$first = mysql_real_escape_string($_POST["fName"]);
	$last = mysql_real_escape_string($_POST["lName"]);
	$email = mysql_real_escape_string($_POST["mail"]);
	$phone = mysql_real_escape_string($_POST["phone"]);
	$uniqueID = mysql_real_escape_string($_POST["uID"]);
	
	//Fix case
	$first = strtolower($first);
	$last = strtolower($last);
	$email = strtolower($email);
	
	//add to database
	$query = "INSERT INTO players (firstName, lastName, email, phone, uniqueID) VALUES ('$first', '$last', '$email', $phone, $uniqueID)";
	mysql_query($query) or trigger_error(mysql_error());
	
	//success page
	include('content.php');
	include('template.php');
?>