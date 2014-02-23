<?php
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>AdamBots FRC &amp; OCCRA Team 245</title>
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/res/img/favicon.ico">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/css2014.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/fonts.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/reset.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src='<?php bloginfo('template_directory'); ?>/js/twitter.js'></script>
</head>

<body>
    <div id="gearscontainer">
        <canvas id="gears1" width="424" height="424"></canvas>
        <canvas id="gears2" width="544" height="544"></canvas>
    </div>
	<script src='<?php bloginfo('template_directory'); ?>/js/gears.js'></script>
	<div id="head">
		<a href="<?php echo home_url(); ?>">
            <img height=120 src="<?php bloginfo('template_directory'); ?>/res/img/flat_round_atom_w_text.png" alt="AdamBots.com">
        </a>
		<div id="social">
			<a href="https://www.facebook.com/AdamBots"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/facebook.png" alt="Like us on Facebook"></a>
			<a href="http://instagram.com/adambots245"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/instagram.png" alt="Find us on Instagram"></a>
			<a href="https://twitter.com/adambots"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/twitter.png" alt="Follow us on Twitter"></a>
			<a href="http://www.youtube.com/user/Adambots"><img src="<?php bloginfo('template_directory'); ?>/res/img/social/youtube.png" alt="Subscribe to us on YouTube"></a>
		</div>
	</div>
	
	<div id="content">
<?php
include("dropdown.php");
?>