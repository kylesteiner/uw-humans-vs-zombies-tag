<?php 
	//page identifier
	$pageName = 'logout';

	//secure
	include('secure.php');
	//database
	include('db.php');
	//general content
	include('content.php');

	
	//logging out
	session_unset();
	session_destroy();
	
	//template
	include("template.php");
?>