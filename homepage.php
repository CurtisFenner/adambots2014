<?php /* Template Name: HomePage */ get_header(); ?>
</div>
<h1 style="display:none;">AdamBots Homepage <!-- accessibility purposes--></h1>
<div id="gallerholder" class="nosel">
	<div id="gallerybox">
		<div id="galleryleft">
			<div class="gallerytitle">2013 Palmetto Regional Champions!</div>
			<div class="gallerytext"></div>
		</div>
		<div id="galleryright">
			<div class="gallerytitle">2013 Palmetto Regional Champions!</div>
			<div class="gallerytext"></div>
		</div>
		<div id="gallerybuttonleft">
		</div>
		<div id="gallerybuttonright">
		</div>
	</div>
	<script src="<?php bloginfo('template_directory'); ?>/js/gallery.js" type="text/javascript"></script>
<script>
/*
/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////  GALLERY HERE  ///////////////////////////////////////
*/
gallery = [
{
url:"http://www.adambots.com/wp-content/uploads/2014/03/occrafoundation.png",
title:"",
text:"2013 <em>OCCRA</em> Foundation Award Winners, the AdamBots<br>at the 2013 <em>OCCRA</em> banquet."
},
{url:"http://www.adambots.com/wp-content/gallery/2013-palmetto-regional/dsc05249.jpg",
title:"",
text:"2013 Palmetto Regional Champions!<br>The AdamBots were champions at the Palmetto regional in Myrtle Beach, South Carolina with FRC team 11, MORT, and FRC team 2187, Team Volt."
},
{url:"https://scontent-b-iad.xx.fbcdn.net/hphotos-prn2/t31/1403082_527097967380821_1931756996_o.jpg",
title:"",
text:"The 2014 AdamBots FRC Team<br>Our team of seventy students from Rochester Adams and Stoney Creek High Schools"
},
{url:"https://scontent-a-iad.xx.fbcdn.net/hphotos-ash3/t1/941703_443991249024827_1714696335_n.jpg",title:"",text:"Meeting with Team Lambot in 2012"}
];
</script>
</div>

<div id="countdown" class="pagewidth"></div>
<script src="<?php bloginfo('template_directory'); ?>/js/countdown.js"></script>

<div id="bodycards">
	<div id="teaminfo">
		<div id="teamatom">
			<img src="<?php bloginfo('template_directory'); ?>/res/img/dark_round_atom_w_text.png" alt="The AdamBots">
		</div>
		<?php
		dynamic_sidebar("Display Infotext");
		?>
		<!-- REMEMBER TO USE SEASON CARD INSTEAD IN WIDGET, DISPLAY INFOTEXT -->
	</div>
	<div id="twitter">
		<a class="twitter-timeline" href="https://twitter.com/AdamBots" data-theme="dark" data-link-color="#e0bb00" data-tweet-limit="20" data-chrome="nofooter noborders transparent" data-widget-id="434172184005578752">Our Twitter feed is loading</a>
	</div>
	<div class="clear"></div>
</div>

<div id="robotinfo" class="pagewidth" style="display:none;">
	<div id="robotimg">
		<img src="<?php bloginfo('template_directory'); ?>/res/img/robot-cropped.png" alt="Andromeda, 2014 FRC Robot">
	</div>
	<div id="robottext">some text about our wonderful robot</div>
	<div class="clear"></div>
</div>

<div class="pagewidth" id="panelcontainer" style="position:relative;height:420px;top:0;">
	<div class="panel" style="width:314px;height:325px;left:0;top:0;text-align:center;">
		<?php
			dynamic_sidebar("Homepage 1");
		?>
	</div>
	<div class="panel" style="width:314px;height:325px;left:323px;top:0;text-align:center;">
		<?php
			dynamic_sidebar("Homepage 2");
		?>
	</div>
	<div class="panel" style="width:314px;height:325px;left:646px;top:0;text-align:center;">
		<?php
			dynamic_sidebar("Homepage 3");
		?>
	</div>
</div>
<?php get_footer(); ?>