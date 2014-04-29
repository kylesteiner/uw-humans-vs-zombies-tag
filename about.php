<?php 
	//page identifier
	$pageName = 'about';

	//database
	include('db.php');
	//general content
	$content = 
	<h1>ABOUT THE GAME</h1>
<p> UW Humans versus Zombies tag is a game played once per quarter at the University of Washington, and has grown to be one of the largest games of HvZ in the nation.<br />
 <br />
 The game is played by two teams, Humans and Zombies. The Humans strive to go the duration of the game without being tagged by the Zombies, whose deadly tag would turn them into members of the Zombie Horde. At the start of each game there are a small number of &ldquo;original zombies,&rdquo; whose goal is to tag humans, grow the Zombie Horde and ultimately prevent the Humans from &ldquo;surviving&rdquo; the duration of the game.<br />
 <br />
 Humans must work together to &ldquo;survive&rdquo; the final mission at the game&rsquo;s end and escape the Zombie Horde!<br />
 <br />
The game is ever-changing to ensure that no two zombie apocalypses are the same! </p>
	
	//template
	include("template.php");
?>