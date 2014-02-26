<?php
/*
Template Name: Team Lambot 3478
*/

//Add stylesheets to this page
global $add_style;
$add_style = array();

//Add scripts to this page
global $add_script;
$add_script = array();

?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="page_shadowline"></div>
		<div class="pagewidth">

			<div class="pagetype">
				<div style="background:url('http://www.adambots.com/wp-content/themes/adambotsv6/images/pagehead_lambot.jpg');height:336px;width:960px;"></div>
			</div>

			<div class="twocolumns">
				<?php 
					$edit_attr = array(
						'alt' => get_the_title(),
						'title' => '',
						'class' => 'floatright'
						);
					$post_image = get_the_post_thumbnail($post->ID,'pristine-custom-image-medium1', $edit_attr);					
				?>
				<?php
					if(!empty($post_image)) {
				 		echo $post_image;
					}
				?>
				<?php the_content(); ?>
				<?php endwhile; ?>
					<!-- post navigation -->
				<?php else: ?>
					<!-- no posts found -->
				<?php endif; ?>
				<div class="spacer"></div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>