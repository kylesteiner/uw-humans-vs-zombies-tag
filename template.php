<?php
	//close database connection before page load
	mysql_close($con);
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UW HvZT - <?php echo $pageTitle ?></title>
<link href="main.css" rel="stylesheet" type="text/css">
<link href="/images/favicon.ico" rel="icon" type="image/x-icon" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28251749-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="mainSite">
  	<div id="header">
  	</div>
	<div id="sidebar">
    	<?php include("sidebar.php"); ?>           
	</div>
	<div id="siteContent">
    	<?php 
			echo $content;			
		?>
        <br /><br />
    </div>
    <div id="footer">
    	<img src="/images/footer.png" />
    </div>
</div>
</body>
</html>