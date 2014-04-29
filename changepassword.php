<?php //changepassword.php
	
	if(isset($_POST['oPass'])){	
		session_start();
		
		//access database
		include('db.php');
		
		//Escape injection	
		$oldPass = mysql_real_escape_string($_POST['oPass']);
		$newPass = mysql_real_escape_string($_POST['nPass']);
		$confirmPass = mysql_real_escape_string($_POST['cPass']);
		$name = $_SESSION['name'];
		
		//salt and encrypt
		$salt = "0b18d6c76817f61b243f62adb68f7f85";
		$checkPass = $oldPass . $salt;
		$checkPass = hash("sha256", $checkPass);
		
		
		//check pass
		$query = "SELECT `password` FROM `users` WHERE `name` = '$name'";
		$output = mysql_query($query)or trigger_error(mysql_error());
		$row = mysql_fetch_assoc($output);
		
		
		if (($confirmPass == $newPass) && ($checkPass == $row['password'])){
			
			//salt and encrypt
			$saltPass = $newPass . $salt;
			$dataPass = hash("sha256", $saltPass);
			
			//modify database
			$query = "UPDATE `users` SET `password` = '$dataPass' WHERE `name` = '$name'";
			mysql_query($query) or trigger_error(mysql_error());
			
	
			$content = '<h1>PASSWORD CHANGE SUCCESSFUL!</h1> <meta http-equiv="refresh" content="1;url=pandorahome.php">';
			$pageTitle = 'Password Changed';
			
		}else{
			$content = '<h1>PASSWORD CHANGE FAILED!</h1> <meta http-equiv="refresh" content="1;url=password.php">';
			$pageTitle = 'Change Failed';
		}
		
		include('template.php');
		
	}else{
		header("Location: index.php");			
	}
?>