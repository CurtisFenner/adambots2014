<?php get_header(); ?>
<div class="pagewidth">

	<div class="twocolumns">
		<div id="twocolumnbackground"></div>
		<div id="leftcol">
			<?php while ( have_posts() ) : the_post(); echo "HI!"; ?>

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
			<?php 
			$edit_attr = array(
				'alt' => get_the_title(),
				'title' => '',
				'class' => 'floatright'
				);

			$post_image = get_the_post_thumbnail($post->ID,'pristine-custom-image-medium1', $edit_attr);					
			if(!empty($post_image)) {
				echo $post_image;
			}

			the_content();
			endwhile; ?>

	</div>
	<div id="rightcol">
		Right.
	</div>
	<div class="clear"></div> <!-- this part is important! :D -->
</div>
</div>
</div>
<?php get_footer(); ?>