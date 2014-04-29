<?php
	//chosen page
	$page = $_GET["q"];
	
	include('db.php');
	
	//main page content
	$output = mysql_query("SELECT pageContent FROM sitecontent WHERE pageName ='". $page . "'")or trigger_error(mysql_error());	
	$row = mysql_fetch_assoc($output);
	echo $row['pageContent'];
	
	mysql_close($con);
	
?>