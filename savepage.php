<?php

	include('db.php');
		
	//Escape injection
	$page = mysql_real_escape_string($_POST["pageChoice"]);
	$content = mysql_real_escape_string($_POST["editor"]);

	//modify database
	$query = "UPDATE `sitecontent` SET `pageContent` = '$content' WHERE `pageName` = '$page'";
	mysql_query($query) or trigger_error(mysql_error());
	
	//close connection
	mysql_close($con);
	
	echo '<meta http-equiv="refresh" content="1;url=editor.php">'

?>