<?php

//For any single "post" (its own page)

get_header();
?>

<?php the_post(); ?>

<div class="pagewidth">
	<div id="pagetype" style="background-color:#5A5A5A;">
		<h2 style="padding:0;color:#FFF;height:40px;">
			AdamBots Blog
		</h2>
		<span style="color:white;">News and everything AdamBots</span>
		<div class="background"><img alt="AdamBots" src="http://adambots.com/logos/png/yellowBG_small.png" height="60"></div>
	</div>
</div>
<div id="content" class="pagewidth onecolumn">
	<div id="atomrightcontainer">
		<div id="onecolumnbackground">
		</div>
	</div>
	<h1><?php the_title();?></h1>
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
<div style=clear:both;></div>
</div>

<?php get_footer(); ?>