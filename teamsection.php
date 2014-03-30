<?php
/*
Template Name: Team Member Section
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
			<div id="pagetype" style="background-color:#111;color:white;">
				<div style="font-size:1.5em;line-height:40px;color:white;">
					<span style="color:#FFE32D;">AdamBots</span> Team Member Section
				</div>
				Calendar and Other Information
			</div>
			<div class="onecolumn"> <!-- This actually doesn't really belong here but apparently doesn't hurt. -->
				<div id="onecolumnbackground"></div>
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