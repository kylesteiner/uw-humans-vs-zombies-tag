<?php
	//query to db
	$output = mysql_query("SELECT * FROM sitecontent WHERE pageName ='". $pageName. "'")or trigger_error(mysql_error());	
	$row = mysql_fetch_assoc($output);
	$content = $row['pageContent'];
	$pageTitle = $row['formattedName'];
	
?>