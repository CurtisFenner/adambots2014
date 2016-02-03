<?php
/*
Writes the contents of "$headinclude" at the bottom of the head.
*/
?><!doctype html>
<html lang="en">
<head>
	<noscript>
		<style>
			.noscripthide {
				display:none;
			}
		</style>
	</noscript>
	<meta charset="UTF-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<!--[if IE 7]>
	<style>
	.navtab {
		display:inline !important;
		zoom:1;
	}
	#pagetype .subnav, #pagetype .subnav * {
		display:inline !important;
		zoom:1;
	}
	a * {
		cursor:pointer;
	}
	</style>
	<![endif]-->
	<script>
if(typeof String.prototype.trim !== 'function') {
	String.prototype.trim = function() {
		return this.replace(/^\s+|\s+$/g, '');
	}
}

if (!Array.prototype.indexOf) {
	Array.prototype.indexOf = function(obj, start) {
		for (var i = (start || 0), j = this.length; i < j; i++) {
			if (this[i] === obj) { return i; }
		}
		return -1;
	}
}
	</script>
	<title>AdamBots FRC &amp; OCCRA Team 245</title>
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/res/img/favicon.ico">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main21Aug14.css.php">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print2014.css" media="print">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/mobile2014.css" media="screen and (max-width: 997px)">
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-852318-3', 'adambots.com');
	ga('send', 'pageview');

</script>
<style id="mobiledynamicstyle">

</style>
<?php
if (isset($headinclude)) {
	//Requires this to be INCLUDE'd rather than get'd.
	echo $headinclude;
}
?>
</head>
<body id="bodytag" class=mobilewidth>
	<div id="ismobile"></div>
	<div class="pagewidth">
		<div id="gearscontainer">
			<canvas id="gears1" width="424" height="424"></canvas>
			<canvas id="gears2" width="544" height="544"></canvas>
		</div>
	</div>
	<script src='<?php bloginfo('template_directory'); ?>/js/gears.js' async></script>
	<div id="head" class="pagewidth">
		<div id="adambotslogo">
			<a href="<?php echo home_url(); ?>">
				<div style="float:left;margin-right:5px;">
					<img src="<?php bloginfo('template_directory');?>/res/img/cleanatom.png"
					width="94" height="94" class=logoatom alt="AdamBots Atom Logo" style="border-radius:4px;">
				</div>
				<div style="float:right;">
					<img class=logoname src="<?php bloginfo('template_directory'); ?>/res/img/adambotswhite.png" width="430" height="57" alt="AdamBots Logo Text"><br>
					<img class=logotag src="<?php bloginfo('template_directory'); ?>/res/img/adambotstag.png" width="430" height="33" alt="OCCRA and FRC Robotics Team 245">
				</div>
				<div class="clear"></div>
			</a>
		</div>
		<div id="social">
			<a href="https://www.facebook.com/AdamBots" class=slink><span class="ifacebook" title="Facebook"></span></a>
			<a href="http://instagram.com/adambots245" class=slink><span class="iinstagram" title="Instagram"></span></a>
			<a href="https://twitter.com/adambots" class=slink><span class="itwitter" title="Twitter"></span></a>
			<a href="http://www.youtube.com/user/Adambots" class=slink><span class="iyoutube" title="YouTube"></span></a>
			<a href="http://www.adambots.com/contact-us" class=slink><span class="iemail" title="Contact Us"></span></a>
			<br>
			<div class="button" style="background:#EFA0DF;color:#CE73BC;"><a href="/about/team-outreach/relay-for-life-2012/">Relay For Life</a></div>
			<div class="button" style="background:#5780C2;color:#244C92;"><a href="/about/team-outreach/">Team Outreach</a></div> <br>
			<div class="button" style="background:#FFD802;color:#D2A900;"><a href="/team-member-section/">Team Calendar</a></div>
			<div class="button" style="background:#5A6;color:#151;"><a href="http://eepurl.com/bif5KD">Newsletter Signup</a></div>
		</div>
		<div class="clear"></div>
	</div>
<?php
include("dropdown.php");
?>