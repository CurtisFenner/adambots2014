<?php

//For any single "post" (its own page)

//Add stylesheets to this page
global $add_style;
$add_style = array();

//Add scripts to this page
global $add_script;
$add_script = array();

?>
<?php get_header(); ?>
	<?php the_post(); ?>
		<div class="pagewidth">
			<div id="pagetype" style="background-color:#FFD802;" class="blacktext">
				<div style="font-size:1.5em;line-height:40px;">
					About the
						<div style="display:inline-block;padding:0;margin:0;height:40px;">
							<img style="margin:0" height="28" alt="AdamBots" src="<?php bloginfo("template_directory")?>/res/img/adambots_text_outlined.png"/>
						</div>
					</div>
				<!-- #205A8C is FIRST blue -->
				<div class="background"><img src="http://adambots.com/logos/png/yellowBG_small.png" alt="AdamBots Team 245" height="60"></div>
				<?php dynamic_sidebar('About Submenu') ?>
			</div> <!-- pagetype -->
			<div class="onecolumn">

		<div id="onecolumnbackground"></div>
<h1><?php the_title(); ?></h1>
<div class="dim">		
			Written by <?php the_author_link(); ?> on <?php the_date(); ?> in <?php the_category(', '); ?>	
		</div>

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
			</div>
		</div>
	</div> <!-- content! fix this! -->
<?php get_footer(); ?>