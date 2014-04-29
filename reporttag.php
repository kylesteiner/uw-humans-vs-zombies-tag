<?php //reporttag.php
	$pageName = 'reporttag';
	
	include('db.php');
	
	//temporary fix because fuck it
	$pageTitle = 'Tag reported';
	$content = '<h1>TAG REPORTED</h1><meta http-equiv="refresh" content="1;url=report.php">';
	

	//Escape injection
	$tFirst = mysql_real_escape_string($_POST["tfName"]);
	$tLast = mysql_real_escape_string($_POST["tlName"]);
	$tEmail = mysql_real_escape_string($_POST["tMail"]);
	$kFirst = mysql_real_escape_string($_POST["kfName"]);
	$kLast = mysql_real_escape_string($_POST["klName"]);
	$kEmail = mysql_real_escape_string($_POST["kMail"]);
	$kPhone = mysql_real_escape_string($_POST["kPhone"]);
	$kUniqueID = mysql_real_escape_string($_POST["kNum"]);
	
	//Fix case
	$tFirst = strtolower($tFirst);
	$tLast = strtolower($tLast);
	$tEmail = strtolower($tEmail);
	$kFirst = strtolower($kFirst);
	$kLast = strtolower($kLast);
	$kEmail = strtolower($kEmail);
	
	//query
	$query = "SELECT * FROM players WHERE firstName LIKE '$kFirst' AND lastName LIKE '$kLast' AND uniqueID=$kUniqueID";
	$output = mysql_query($query);
	
	if (mysql_num_rows($output)==1){	
		//set tagged flag	
		$row = mysql_fetch_assoc($output);
		if ($row['tagged'] == 1){//cheating
			$id = $row['id'];
			$cheat = $row['cheatFlag'] + 1;
			$query = "UPDATE `players` SET `cheatFlag` = $cheat WHERE `id` = $id;";
			mysql_query($query);
			
			$to = "uwhvzt@gmail.com";
 			$subject = "Cheat Notification: REPEAT KILL User:" . $tFirst . " " . $tLast;
 			$body = "'$tFirst' '$tLast' has reported an already tagged player: '$kFirst' '$kLast'. Reportee's email: 'tEmail'";		
			mail($to, $subject, $body);	
		}else{//no cheating
			$id = $row['id'];
			$query = "UPDATE `players` SET `tagged` = 1 WHERE `id` = $id;";
			mysql_query($query);
		}
		
		//update taggers tag amount
		$query = $query = "SELECT * FROM players WHERE firstName LIKE '$tFirst' AND lastName LIKE '$tLast' AND email LIKE $tLast";
		$output = mysql_query($query);		
		$row = mysql_fetch_assoc($output);
				
		$tags = $row['tags'] + 1;
		$id = $row['id'];
		$query = "UPDATE `players` SET `tags` = $tags WHERE `id` = $id;";
		mysql_query($query);
	}		
	else{
			$to = "uwhvzt@gmail.com";
 			$subject = "Conflict ID, Manual Input Needed - " . $tFirst . " " . $tLast;
 			$body = "Tagger <br/>Name: '$tFirst' '$tLast'<br/>Email: '$tEmail'<br/><br/> Taggee<br/> Name: '$kFirst' '$kLast'<br/>Phone: '$kPhone'<br/>Email: '$kEmail'<br/>Unique ID: '$kUniqueID'";	
			$headers =  "From: uwhvzt@gmail.com" . "\r\n";
                        $headers .= 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8853-1'. "\r\n";
			mail($to, $subject, $body, $headers);
	}
	
	//success page
	//include('content.php');

	include('template.php');

?>