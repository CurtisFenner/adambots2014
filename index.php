<?php

//Go to Settings --> Reading --> Static.
//This is the Post List page (Team-Blog)

//Add stylesheets to this page
global $add_style;
$add_style = array();

//Add scripts to this page
global $add_script;
$add_script = array();

?>
<?php get_header(); ?>

<div class="pagewidth">
			<div id="pagetype" style="background-color:#5A5A5A;">
				<h2 style="padding:0;color:#FFF;height:40px;">
					AdamBots Blog
				</h2>
				<div class="background"><img src="http://adambots.com/logos/png/yellowBG_small.png" height="60"></div>
			</div>


		<div class="twocolumns">
			<div id="twocolumnbackground"></div>
			<div id="leftcol">
				<?php while ( have_posts() ) : the_post(); ?>
					<h1><a href="<?php  the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<p>Written by <?php the_author_link(); ?> on <?php the_date(); ?></p>
					<?php the_excerpt(); ?>
					<hr>
				<?php endwhile; ?>
			</div>
			<div id="rightcol">
				<?php get_sidebar(); ?>
			</div>
			<div class="clear"></div>
        </div>
		</div>
	</div>
<?php get_footer(); ?>

