<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
$qvrs = $wp_query -> query_vars;
$searchterms = $qvrs["search_terms"];
function lengthCompare($a,$b){
	return strlen($b)-strlen($a);
}
usort($searchterms,'lengthCompare'); // Longest first

function firstCompare($a,$b) {
	return $b[0] - $a[0]; // Most first
}

function tim() {
	return microtime(TRUE);
}

include("searchresult.php");

?>

<?php get_header(); flush() ?>

<div class="pagewidth">
	<div class="onecolumn">
		<h1>Search results for &ldquo;<?php the_search_query();?>&rdquo;</h1>
		<?php
		$results = array();
		$resultnum = 0;
		//query_posts('showposts=999');
		query_posts($query_string . '&showposts=999');
		$t_have = tim();
		$t_res = 0;
		while ( have_posts() ) {
			the_post();
			$t_res_s = tim();
			$results[$resultnum] = make_result($searchterms);
			$t_res += tim() - $t_res_s;
			$resultnum++;
		}
		$t_have = tim() - $t_have;
		echo "Showing " . min(25,$resultnum) . " of " . $resultnum . " results";
		?>
		<hr>
		<?php
		$t_sort = tim();
		usort($results,'firstCompare');
		$t_sort = tim() - $t_sort;
		$t_echo = tim();
		// From `make_result()`
		$t_init = 0;
		$t_regex = 0;
		$t_bold = 0;
		$t_dots = 0;
		$t_end = 0;
		//
		$average = 0;
		for ($i = 0; $i < $resultnum; $i++) {
			$res = $results[$i];
			$average += $res[0];
			//
			$t_init += $res[2];
			$t_regex += $res[3];
			$t_bold += $res[4];
			$t_dots += $res[5];
			$t_end += $res[6];
		}
		$average /= $resultnum;
		for ($i = 0; $i < $resultnum && $i < 25; $i++) {
			$relevance = $results[$i][0] - $average;
			$relevance = $relevance / $average;
			$relevance = tanh($relevance);
			if ($relevance <= 0) {
				$relevance = ($relevance + 1) * .25;
			} else {
				$relevance = $relevance * .75 + .25;
			}
			$relevance = floor($relevance * 100) . "%";
			$k = str_replace('<num>', '<span style=float:right;>' . ($i + 1) . '.</span>', $results[$i][1]);
			$k = str_replace('<rel>',$relevance,$k);
			echo $k;
			flush();
		}
		$t_echo = tim() - $t_echo;

		echo "<div style=display:none;>";
		echo "have_posts() Loop: $t_have seconds<br>";
		echo "(in have_posts() loop) Search result: $t_res seconds<br>";
		echo "Sort time: $t_sort seconds<br>";
		echo "Echo time: $t_echo seconds<br>";

		echo "<b>Result Time Breakdown:</b><br>";
		echo "Init time: $t_init seconds<br>";
		echo "Regex time: $t_regex seconds<br>";
		echo "Bold time: $t_bold seconds<br>";
		echo "Dots time: $t_dots seconds<br>";
		echo "End time: $t_end seconds<br>";
		echo "</div>";
		?>
	</div>
</div>
<?php get_footer(); ?>