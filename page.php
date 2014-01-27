<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="pagetitle">
			<h1><?php the_title(); ?></h1>
			<?php
				$sub_links = get_post_meta(get_the_ID(),'sub-links',true);
				$sub_links = explode(',',$sub_links);
				
				if(!empty($sub_links)) {
					?>
					<div class="subnav">
						<ul>						
						<?php
							foreach($sub_links as $sub_link) {
								echo "<li>$sub_link</li>";
							}
						?>
						</ul>
					</div>										
					<?php
				}
			?>

		</div>
		<div id="content">
			<div class="left">
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
				<div class="spacer"></div>
				<?php comments_template(); ?>
			</div>
	<?php endwhile; ?>
		<!-- post navigation -->
	<?php else: ?>
		<!-- no posts found -->
	<?php endif; ?>
		<div class="right">
			<?php get_sidebar(); ?>
		</div>
		<div class="spacer"></div>
	</div>
<?php get_footer(); ?>