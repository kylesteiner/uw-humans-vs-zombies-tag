<?php

	//connect to sql database
	$con = mysql_connect("cvalentin.dot5hostingmysql.com","uwhvzt","phujagu#3");
	
	//check if database connected
	if (!$con){
		die('Could not connect: ' . mysql_error())or trigger_error(mysql_error());	
	}
	//select database
	mysql_select_db("uwhvztsite",$con)or trigger_error(mysql_error());
?>

