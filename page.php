<?php get_header(); ?>
<div class="pagewidth">
	<!-- A pagetype here might be a good idea but would not contain subnav, like LamBot page -->
			<?php while ( have_posts() ) : the_post(); ?>
					<h1><a href="<?php  the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php the_content(); ?>
					<hr>
			<?php endwhile; ?>
	<div class="clear"></div> <!-- this part is important! :D -->
</div>
</div>
<?php get_footer(); ?>


<!-- OH MY GOODNESS I MESSED THIS UP -->