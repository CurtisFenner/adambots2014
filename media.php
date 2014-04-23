<?php
/*
Template Name: Media Gallery - Image Gallery
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
			<div id="pagetype" style="background-color:#E8342E;">
				<h2 style="padding:0;color:#FFF;height:40px;">
					Photo and Video
				</h2>
				<div class="background"><img style="margin:-10px;margin-right:4px;" src="<?php bloginfo("template_directory")?>/res/img/navBarAtomRed.png" alt="AdamBots Team 245" height="85"></div>
				<?php dynamic_sidebar('Media Gallery Submenu') ?>
			</div>
			
			<div style="padding:20px;background-color:#FFF;background-image:url('<?php bloginfo("template_directory"); ?>/res/img/noisy.png');margin-top:6px;">
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
<h1>
<?php the_title();?>
</h1>
			<?php the_content(); ?>
			<?php endwhile; ?>
				<!-- post navigation -->
			<?php else: ?>
				<!-- no posts found -->
			<?php endif; ?>
			</div>
			<script type='text/javascript' src='http://www.adambots.com/wp-content/themes/adambots2014/js/fenlightbox.js'></script>
		</div>
	</div>
<?php get_footer(); ?>