<?php
/*
Template Name: OCCRA
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
			<div id="pagetype" style="background-color:#FFA411;">
				<h2 style="padding:0;color:#FFF;height:40px;">
					<em>OCCRA</em> <span style="font-size:16px">Oakland County Competitive Robotics Association</span>
				</h2>
				<div class="background"><img src="http://adambots.com/logos/png/yellowBG_small.png" height="60"></div>
				<?php dynamic_sidebar('OCCRA Submenu') ?>
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
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>