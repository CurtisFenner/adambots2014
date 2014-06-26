<?php
$qvrs = $wp_query -> query_vars;
$searchterms = $qvrs["search_terms"];
function lengthCompare($a,$b){
	return strlen($b)-strlen($a);
}
usort($searchterms,'lengthCompare'); // Longest first

function firstCompare($a,$b) {
	return $b[0] - $a[0]; // Most first
}
?>

<?php get_header(); ?>

<div class="pagewidth">
	<div class="onecolumn">
		<h1>Search results for &ldquo;<?php the_search_query();?>&rdquo;</h1>
		<hr>
		<?php
		$results = array();
		$resultnum = 0;
		//query_posts('showposts=999');
		query_posts($query_string . '&showposts=999');
		while ( have_posts() ) {
			the_post();
			include("searchresult.php");
			$results[$resultnum] = array($count,$section);
			$resultnum++;
			//echo "\n\n\n"; echo $section; echo "\n\n\n";
		}
		usort($results,'firstCompare');
		$average = 0;
		for ($i = 0; $i < $resultnum; $i++) {
			$average += $results[$i][0];
		}
		$average /= $resultnum;

		for ($i = 0; $i < $resultnum; $i++) {
			echo $results[$i][1];
		}
		?>
	</div>
</div>
<?php get_footer(); ?>