<?php /* Template Name: HomePage */ get_header(); ?>
<h1 style="display:none;margin:0;">AdamBots Homepage <!-- accessibility purposes--></h1>


<script type="text/data" id="gallerysource"><?php
if (!is_dir("data")) {
	mkdir("data");
	file_put_contents("data/carouseldata.txt","");
}
echo @file_get_contents("data/carouseldata.txt");
?></script>
<div id="gallerybox" class="nosel pagewidth">
	<div id="gallerycontent">
		<a id="gallerylink">
			<div id="galleryimage"></div>
			<div id="gallerytext"></div>
		</a>
		<div id="galleryright"></div>
		<div id="galleryleft"></div>
	</div>
	<div id="gallerytabs">

	</div>
	<div id="gallerystatic" class="mobileonly">
	</div>
</div>

<script src="<?php bloginfo('template_directory');?>/js/gallery.js" async="async"></script>

<div id="countdown" class="pagewidth"></div>
<?php countdown_setup("countdown_data","countdown"); /* countdown_data is a unique name for script used to transfer data */ ?>


<div id="bodycards">
	<div id="teaminfo">
		<div id="teamatom">
			<img width="353" height="72" src="http://www.adambots.com/wp-content/uploads/2014/05/adambotslogoright-2.png" alt="The AdamBots">
		</div>
		<?php
		dynamic_sidebar("Display Infotext");
		?>
	</div>
	<div id="twitter">
		<a style="color:white;" class="twitter-timeline" href="https://twitter.com/AdamBots" data-theme="dark" data-link-color="#e0bb00" data-tweet-limit="20" data-chrome="nofooter noborders transparent" data-widget-id="434172184005578752">
			Our Twitter feed is loading
			<!-- <script src='<?php bloginfo('template_directory'); ?>/js/twitter.js'></script> -->
			<script>
			setTimeout(function(){
			!function (d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0],
				p = 'https';
				if (!d.getElementById(id)) {
					js = d.createElement(s);
					js.id = id;
					js.async = 1;
					js.src = p + "://platform.twitter.com/widgets.js";
					fjs.parentNode.insertBefore(js, fjs);
				}
			}(document, "script", "twitter-wjs")},100);
			</script>
		</a>
	</div>
	<div class="clear"></div>
</div>

<div id="robotinfo" class="pagewidth" style="display:none;">
	<div id="robotimg">
		<!-- <img src="<?php bloginfo('template_directory'); ?>/res/img/robot-cropped.png" alt="Andromeda, 2014 FRC Robot"> -->
	</div>
	<div id="robottext">some text about our wonderful robot</div>
	<div class="clear"></div>
</div>

<div class="pagewidth" id="panelcontainer">
	<div class="panel" style="left:0;">
		<?php
		dynamic_sidebar("Homepage 1");
		?>
	</div>
	<div class="panel" style="left:323px;">
		<?php
		dynamic_sidebar("Homepage 2");
		?>
	</div>
	<div class="panel" style="left:646px;">
		<?php
		dynamic_sidebar("Homepage 3");
		?>
	</div>
</div>
<?php get_footer(); ?>