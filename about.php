<?php
/*
Template Name: About
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
		<div class="pagewidth">
			<div id="pagetype" style="background-color:#FFD802;" class="blacktext">
				<div style="font-size:1.5em;line-height:40px;">
					About the
						<div style="display:inline-block;padding:0;margin:0;height:40px;">
							<img style="margin:0" height="28" alt="AdamBots" src="<?php bloginfo("template_directory")?>/res/img/adambots_text_outlined.png"/>
						</div>
					</div>
				<!-- #205A8C is FIRST blue -->
				<div class="background"><img style="margin:-10px;margin-right:4px;" src="<?php bloginfo("template_directory")?>/res/img/navAtomThin.png" alt="AdamBots Team 245" height="85"></div>
				<?php dynamic_sidebar('About Submenu') ?>
			</div>
			<div class="twocolumns"> <!-- This actually doesn't really belong here but apparently doesn't hurt. -->
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