<?php /* Template Name: HomePage */ get_header(); ?>
</div>
<h1 style="display:none;margin:none;">AdamBots Homepage <!-- accessibility purposes--></h1>


<script type="text/data" id="gallerysource">
2013 <em>OCCRA&nbsp;</em> Foundation Award Winners|<em>OCCRA&nbsp;</em>2013 Foundation Award
http://www.adambots.com/wp-content/uploads/2014/04/occrafoundationslide.png
http://www.adambots.com/occra/
<em>OCCRA&nbsp;</em> is the Oakland County Competitive Robotics Association. In the latest season, the AdamBots won the Foundation Award, which is the highest award in <em>OCCRA</em>.
It recognizes the team with the most enthusiasm for robotics and STEM and the most raise awareness of robotics and technical career options.

Thank you, Sponsors!|Our Sponsors
http://www.adambots.com/wp-content/themes/adambots2014/res/img/sponsors.jpg
http://www.adambots.com/about/sponsors/
Sponsors are the reason we can do all of the amazing stuff we do. Thank you, sponsors!

</script>
<div id="gallerybox" class="nosel pagewidth">
	<div id="gallerycontent">

	</div>
	<div id="gallerytabs">

	</div>
</div>
<script src="<?php bloginfo('template_directory'); ?>/js/gallery.js" type="text/javascript"></script>


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