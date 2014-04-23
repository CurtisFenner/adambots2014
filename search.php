<?php get_header(); ?>
<div class="pagewidth">
	<div class="onecolumn">

	<!-- A pagetype here might be a good idea but would not contain subnav, like LamBot page -->
			<?php while ( have_posts() ) : the_post(); ?>
					<b><a href="<?php  the_permalink(); ?>"><?php the_title(); ?></a></b><br>
<?php //the_content();
$str = get_the_content();
/*$copy = "";
while (strlen($str) > 1 && strlen($copy) < 300) {
	$find = strpos($str,)
}*/
echo substr(strip_tags($str),0,100) + "&hellip;"
?>
					<hr>
			<?php endwhile; ?>

	<div id="atomrightcontainer"><div id="onecolumnbackground"></div></div>
	</div>


</div>
</div>
<?php get_footer(); ?>