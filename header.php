<?php
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>AdamBots FRC &amp; OCCRA Team 245</title>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/css2014.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/fonts.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/reset.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<script src='http://code.jquery.com/jquery-1.5.1.min.js'></script>
</head>

<body>
    <div id="gearscontainer">
        <canvas id="gears" width="1200" height="600"></canvas>
        <div id="gearscover"></div>
    </div>
	<script src='<?php bloginfo('template_directory'); ?>/js/gears.js'></script>
	<div id="head">
		<img id="atom" src="<?php bloginfo('template_directory'); ?>/res/img/flat_yellow_wo_bg_Square.png" alt="AdamBots Atom">
		<a id="name">AdamBots</a>
		<div id="social">
			<a href="https://www.facebook.com/AdamBots"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/facebook.png" alt="Like us on Facebook"></a>
			<a href="#Instagram"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/instagram.png" alt="Find us on Instagram"></a>
			<a href="https://twitter.com/adambots"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/twitter.png" alt="Follow us on Twitter"></a>
			<a href="http://www.youtube.com/user/Adambots"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/youtube.png" alt="Subscribe to us on YouTube"></a>
		</div>
	</div>
	
	<div id="content">
<?php
include("dropdown.php");
?>