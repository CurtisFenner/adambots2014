<?php
/*
Template Name: About This Website
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
			<div id="pagetype" style="background-color:#5A5A5A;">
				<h2 style="padding:0;color:#FFF;height:40px;">
					ADAMBOTS.COM<br/><span style="font-size:16px;">A unique and professional <em>FRC</em> team website</span>
				</h2>
				<div class="background"><img src="http://adambots.com/logos/png/yellowBG_small.png" height="60"></div>
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
			</div>
		</div>
	</div>
<?php get_footer(); ?>