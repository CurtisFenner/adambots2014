<?php /* Template Name: HomePage */ get_header(); ?>
</div>
<h1 style="display:none;margin:none;">AdamBots Homepage <!-- accessibility purposes--></h1>


<script type="text/data" id="gallerysource">
2013 <em>OCCRA&nbsp;</em> Foundation Award Winners|<em>OCCRA&nbsp;</em>2013 Foundation Award
http://www.adambots.com/wp-content/uploads/2014/04/occrafoundationslide.jpg
http://www.adambots.com/occra/
<em>OCCRA&nbsp;</em> is the Oakland County Competitive Robotics Association. In the latest season, the AdamBots won the Foundation Award, which is the highest award in <em>OCCRA</em>.
It recognizes the team with the most enthusiasm for robotics and STEM and the most raise awareness of robotics and technical career options.

Thank you, Sponsors!|Our Sponsors
http://www.adambots.com/wp-content/uploads/2014/04/sponsorslide2.jpg
http://www.adambots.com/about/sponsors/
Sponsors are the reason we can do all of the amazing stuff we do. Thank you, sponsors!

Resources from the AdamBots | Resources from Us
http://www.adambots.com/wp-content/uploads/2014/04/resourcesslide.jpg
http://www.adambots.com/resources/resources-overview/
The AdamBots provide many resources for other <em>FIRST</em>ers!
Our scouting tool gives OPR data for individual portions of the contribution and predicts match schedules and rankings.
We also have information about safety, and our award submissions like our award winning Business Plan.

Our 2014 <em>FRC&nbsp;</em> Robot, <em>Andromeda</em>!|Our <em>FRC&nbsp;</em> Robot
http://www.adambots.com/wp-content/uploads/2014/04/andromedaslide.jpg
http://www.adambots.com/first/2014-game-and-robot/
Our robot for the 2014 <em>FRC&nbsp;</em> challenge, <em>Aerial Assist</em>!
Aerial Assist is a game requiring large excerise balls to be scored in goals. Robots work together in an alliance, assisting each other to score.
Bonus points are available for tossing the ball over a truss and for catching it.
Our robot, Andromeda, consistently scores, assists, and trusses well.

Our Mexican Sister Team, Team LamBot 3478|Team LamBot 3478
http://www.adambots.com/wp-content/uploads/2014/04/lambotslide.png
http://www.adambots.com/about/team-outreach/team-lambot-3478/
General Motors approached us in 2010 about mentoring new teams in Mexico. We have been mentoring the LamBots since.
Team 3478 has gone on to win <strong>Rookie All Stars</strong> their first year at the <em>FRC&nbsp;</em> World Championship, and <strong>Engineering Inspiration</strong> in 2013.

Team Blog|Team Blog
http://www.adambots.com/wp-content/uploads/2014/04/blogslide.jpg
http://www.adambots.com/team-blog/
The AdamBots publish blog posts nearly weekly updating the world on everything AdamBots.
These include competition and event summaries, interviews, and build updates.
</script>
<div id="gallerybox" class="nosel pagewidth">
	<div id="gallerycontent">
		<div id="galleryimage"></div>
		<div id="gallerytext"></div>
		<div id="galleryright"></div>
		<div id="galleryleft"></div>
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