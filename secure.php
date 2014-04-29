<?php

	//secure page checker shit that i will move to it's own php file when i'm done testing
	
	session_start();
	
	if(!isset($_SESSION['name'])){
		$pageName = 'loginfail';		
	}

?>