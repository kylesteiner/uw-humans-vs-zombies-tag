<?php

	
	//Direct page load redirect
	if(!isset($_POST['title'])){
		header('Location: index.php');	
	}else{
		
		$pageName = 'postsuccess';

		include('db.php');
		
		//New line
		$content = nl2br($_POST["content"]);
		
		//Escape injection
		$title = mysql_real_escape_string($_POST["title"]);
		$content = mysql_real_escape_string($content);
		
		//get current date
		$time = time();
		
		//session for username
		session_start();
		$user = $_SESSION['rank'] . ' ' . $_SESSION['name'];
		
		//add to database
		$query = "INSERT INTO newscontent (title, postdate, poster, content) VALUES ('$title', $time, '$user', '$content')";
		mysql_query($query) or trigger_error(mysql_error());
		
		//success page
		include('content.php');
		include('template.php');
	}
?>