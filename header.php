<?php
/*
Writes the contents of "$headinclude" at the bottom of the head.
*/
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<!--[if IE 7]>
	<style>
	.navtab {
		display:inline !important;
		zoom:1 !important;
	}
	</style>
	<![endif]-->
	<script>
function getArrayByClassNames(classes, pa){
	if(!pa) pa= document;
	var C= [], G;
	if(pa.getElementsByClassName){
		G= pa.getElementsByClassName(classes);
		for(var i= 0, L= G.length; i<L; i++){
			C[i]= G[i];
		}
	}
	else{
		classes= classes.split(/\s+/);
		var who, cL= classes.length,
		cn, G= pa.getElementsByTagName('*'), L= G.length;
		for(var i= 0; i<cL; i++){
			classes[i]= RegExp('\\b'+classes[i]+'\\b');
		}
		classnameLoop:
		while(L){
			who= G[--L];
			cn= who.className;
			if(cn){
				for(var i= 0; i<cL; i++){
					if(classes[i].test(cn)== false) {
						continue classnameLoop;
					}
				}
				C.push(who);
			}
		}
	}
	return C;
}

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
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main.css.php">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print2014.css" media="print">
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
<body id="bodytag">
	<script>
(function(){
	var addEvent = function(elem, type, eventHandle) {
		if (elem == null || typeof(elem) == 'undefined') return;
		if ( elem.addEventListener ) {
			elem.addEventListener( type, eventHandle, false );
		} else if ( elem.attachEvent ) {
			elem.attachEvent( "on" + type, eventHandle );
		} else {
			elem["on"+type]=eventHandle;
		}
	};
	function getWidth(){
		var x = 0;
		if (self.innerHeight) {
			x = self.innerWidth;
		}
		else if (document.documentElement && document.documentElement.clientHeight) {
			x = document.documentElement.clientWidth;
		}
		else if (document.body) {
			x = document.body.clientWidth;
		}
		return x;
	}
	function styleSet(s,t) {
		try {
			s.innerHTML = t;
		} catch (e) {
			s.cssText = t;
		}
	}
	function flexible() {
		var wid = getWidth();
		var bod = document.getElementById("bodytag");
		var sty = document.getElementById("mobiledynamicstyle");
		if (wid < 970) {
			if (bod.className.indexOf("mobilewidth") < 0) {
				bod.className += " mobilewidth";
			}
			if (wid < 700) {
				styleSet(sty,".largecanvas {max-width:240px;height:auto;} img,canvas {max-width:" + Math.max(200,wid - 40) + "px;height:auto;}");
			} else {
				styleSet(sty,"img,canvas {max-width:" + Math.max(200,wid - 40) + "px;height:auto;}");
			}
		} else {
			bod.className = bod.className.replace(/\s*mobilewidth\s*/g," ").trim();
			//sty.innerHTML = "";
			styleSet(sty,"");
		}
	}
	addEvent(window,"resize",flexible);
	flexible();
})();
	</script>
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
			<div class="button" style="background:#5780C2;color:#244C92;"><a href="/about/team-outreach/team-lambot-3478/">FRC 3478 LamBot</a></div> <br>
			<div class="button" style="background:#FFD802;color:#D2A900;"><a href="/team-member-section/">Team Calendar</a></div>
			<div class="button" style="background:#5A6;color:#151;"><a href="/about/team-outreach/vikings-5183/">FTC 5381 Vikings</a></div>
		</div>
		<div class="clear"></div>
	</div>
<?php
include("dropdown.php");
?>