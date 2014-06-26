<?php
$qvrs = $wp_query -> query_vars;
$searchterms = $qvrs["search_terms"];
function lengthCompare($a,$b){
	return strlen($b)-strlen($a);
}
usort($searchterms,'lengthCompare');
?>

<?php get_header(); ?>

<div class="pagewidth">
	<div class="onecolumn">
		<h1>Search results for &ldquo;<?php the_search_query();?>&rdquo;</h1>
		<hr>
		<!-- A pagetype here might be a good idea but would not contain subnav, like LamBot page -->
		<?php while ( have_posts() ) : the_post(); ?>
			<?php include("searchresult.php"); ?>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>