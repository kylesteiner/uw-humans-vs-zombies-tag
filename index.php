<?php 
	//page identifier
	$pageName = 'home';

	//database
	include('db.php');
	//general content
	$content = 
	<h1>WELCOME</h1>
	<p>The undead have risen again!</p><p>Welcome to the official University of Washington Humans vs. Zombies Tag website. Here you can find infomation, news, statistics, and resources about HvZ played at the University of Washington. Take a look around, and we hope you have fun playing UW HvZT!</p>
	<h1>VIDEO</h1>
	<iframe src="http://player.vimeo.com/video/34930694?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><p><a href="http://vimeo.com/34930694">Humans vs Zombies University of Washington</a> from <a href="http://vimeo.com/user8334123">Katherine Turner</a> on <a href="http://vimeo.com">Vimeo</a>.</p>


	//news content
	$content .= "<h1>NEWS & UPDATES</h1>";
	$output = mysql_query("SELECT * FROM newscontent ORDER BY postdate DESC LIMIT 0,5")or trigger_error(mysql_error());
	while($row = mysql_fetch_array($output)){
		$content = $content . "<h2>" . $row['title'] . "</h2>". "<p>" . date("F d, Y", $row['postdate']) . "</p>";
		$content = $content . "<p>" . $row['content'] . "</p><p>Posted by: " . $row['poster'] . "</p> <br />";
	}
	
	include("template.php");
?>