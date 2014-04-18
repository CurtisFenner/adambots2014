<?php
?>
<!doctype html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>AdamBots FRC &amp; OCCRA Team 245</title>
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/res/img/favicon.ico">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/css2014.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/fonts.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/reset.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700%7CRoboto:400,300,700' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src='<?php bloginfo('template_directory'); ?>/js/twitter.js'></script>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-852318-3', 'adambots.com');
	ga('send', 'pageview');

</script>

<style>
/* External Link? */

a[href^="http"] {
line-height:100%;
}

/*a[href^="http"]:after {
text-decoration:underline;
content:"↗";
}*/

#social a:after {
display:none;
}

a[href*="adambots.com"] {
line-height:100%;
}

a[href*="adambots.com"]:after {
display:none;
}

</style>

</head>

<body>
	<div id="gearscontainer">
		<canvas id="gears1" width="424" height="424"></canvas>
		<canvas id="gears2" width="544" height="544"></canvas>
	</div>
	<script src='<?php bloginfo('template_directory'); ?>/js/gears.js'></script>
	<div id="head" class="pagewidth">
		<div id="adambotslogo">
			<a href="<?php echo home_url(); ?>">
				<div style="float:left;margin-right:5px;">
					<img src="<?php bloginfo('template_directory'); ?>/res/img/cleanatom.png" width="80" height="80" alt="AdamBots Logo" style="border-radius:3px;">
				</div>
				<div style="float:right;">
					<img src="<?php bloginfo('template_directory'); ?>/res/img/adambotswhite.png" width="360" alt="AdamBots Logo"><br>
					<img src="<?php bloginfo('template_directory'); ?>/res/img/adambotstag.png" width="360" alt="OCCRA and FRC Robotics Team 245">
				</div>
			</a>
		</div>
		<div id="social">
			<a href="https://www.facebook.com/AdamBots"><span data-hover="Facebook"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/facebook.png" alt="Like us on Facebook"></span></a>
			<a href="http://instagram.com/adambots245"><span data-hover="Instagram"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/instagram.png" alt="Find us on Instagram"></span></a>
			<a href="https://twitter.com/adambots"><span data-hover="Twitter"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/twitter.png" alt="Follow us on Twitter"></span></a>
			<a href="http://www.youtube.com/user/Adambots"><span data-hover="YouTube"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/youtube.png" alt="Subscribe to us on YouTube"></span></a>
			<a href="http://www.adambots.com/contact-us"><span data-hover="Contact Us"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/email.png" alt="Contact Us"></span></a>
			<br>
			<div class="button" style="background:#EFA0DF;color:#CE73BC;"><a href="/about/team-outreach/relay-for-life-2012/">Relay For Life</a></div>
			<div class="button" style="background:#5780C2;color:#244C92;"><a href="/about/team-outreach/team-lambot-3478/">FRC 3478 LamBot</a></div> <br>
			<div class="button" style="background:#FFD802;color:#D2A900;"><a href="/team-member-section/">Team Calendar</a></div>
			<div class="button" style="background:#5A6;color:#151;"><a href="/about/team-outreach/vikings-5183/">FTC 5381 Vikings</a></div>
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="content">
<?php
include("dropdown.php");
?>