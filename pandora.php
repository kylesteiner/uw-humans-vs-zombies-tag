<?php 
	//page identifier
	$pageName = 'pandora';
	
	//check if logged in
	session_start();
	
	if(isset($_SESSION['name'])){
		$pageName = 'loginsuccess';		
	}
	
	//database
	include('db.php');
	//general content
	include('content.php');
	
	//template
	include("template.php");
?>