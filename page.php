<?php get_header(); ?>
<div class="pagewidth">
	<!-- A pagetype here might be a good idea but would not contain subnav, like LamBot page -->
	<div class="twocolumns">
		<div id="twocolumnbackground"></div>
		<div id="leftcol">
			<?php while ( have_posts() ) : the_post(); ?>

					<h1><a href="<?php  the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<p>Written by <?php the_author_link(); ?> on <?php the_date(); ?></p>
					<?php the_excerpt(); ?>
					<hr>
			<?php endwhile; ?>

	</div>
	<div id="rightcol">
		Right.
	</div>
	<div class="clear"></div> <!-- this part is important! :D -->
</div>
</div>
</div>
<?php get_footer(); ?>


<!-- OH MY GOODNESS I MESSED THIS UP -->