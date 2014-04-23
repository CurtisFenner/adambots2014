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
			<b><a href="<?php  the_permalink(); ?>" style="font-size:24px;text-decoration:underline;"><?php the_title(); ?></a></b><br>
			<section style="font-size:16px;">
<?php //the_content();
$str = get_the_content();
/*$copy = "";
while (strlen($str) > 1 && strlen($copy) < 300) {
	$find = strpos($str,)
}*/
$str = str_replace("\n",'',$str);
$str = preg_replace('/<\/?(p|h1|h2|h3|h4|h5|div)[^>]*>/i' ,"\n",$str);
$str = str_replace('<br />',"\n",$str);
$str = str_replace('<hr />',"\n",$str);
$str = str_replace('<hr>',"\n",$str);
$str = strip_tags($str);
$str = str_replace('[bigdivider]',"\n",$str);
$str = str_replace('[right]','',$str);
$str = str_replace('[/right]','',$str);
$str = str_replace('[left]','',$str);
$str = str_replace('[/left]','',$str);
$str = trim(preg_replace("/\n\s*/","\n",$str));
for ($i = 0; $i < count($searchterms); $i++) {
	$str = preg_replace('/' . $searchterms[$i] . '/i','<b>$0</b>',$str);
}
//$str now has bolded search terms.
//We want to cut out the space between them. We'll protect 50 characters and then delete.
$str = preg_replace('/<\/b>([^<>]{40}\S*)[\s\S]*?(\S*[^<>]{50})<b>/','</B>$1 ... $2<B>',$str,10);
$str = str_replace("\n","<br>",$str);
echo $str;
//echo substr(strip_tags($str),0,100) + "&hellip;"
?>
		</section>
		<hr>
		<?php endwhile; ?>

	</div>


</div>
</div>
<?php get_footer(); ?>