<?php
// Search Result
// Used by search.php
// Uses information gained from the_post()

?>
<?php
$section = '<section style="font-size:16px;"><h2><a href="';
$section .= get_permalink($post->ID) . '" style="font-size:24px;text-decoration:underline;">';
$section .= get_the_title() . "</a></h2><br>";
$str = get_the_content();

$year = the_date("Y"," ","",FALSE);
$counter = strtolower($str . str_repeat($year,3));
$titlecounter = strtolower(get_the_title() . $year);
$count = 0;


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
	$lowterm = strtolower($searchterms[$i]);
	$count += substr_count($counter,$lowterm);
	$count += substr_count($titlecounter,$lowterm) * 10;
}
//$str now has bolded search terms.


// Initial ellipses; keep 50 characters before first bold term
$begin = strpos($str,"<b");
if ($begin !== FALSE) {
	$begin = $begin-50;
	if ($begin > 0) {
		$str = "&hellip;" . substr($str,$begin);
	}
}

$strby = explode("</b>",$str,13); //Maximum of 12 bolded terms. We throw out the 13th+.
if (count($strby) == 1) {
	$str = "&hellip;";
	// No terms bolded
} else {
	$newby = array_slice($strby,0,12);
	$str = implode('</b>',$newby);
	if (count($strby) > 12) {
		$str .= '</b>';
	}
	$str .= '&hellip;';
}
$str = substr($str,0, strrpos($str,"</b>") + 60);
$str = substr($str,0,strrpos($str," ")) . '&hellip;';
$str = preg_replace('/<\/b>([^<>]{40}\S*)[\s\S]*?(\S*[^<>]{50})<b>/','</B>$1 &hellip; $2<B>',$str,10);
$str = str_replace("\n","<br>",$str);
$str = str_replace("FIRST","<em>FIRST</em>",$str);
$str = str_replace("FRC","<em>FRC</em>",$str);
$str = str_replace("OCCRA","<em>OCCRA</em>",$str);
$section = $section . $str . "<br><br><p class=dim style=font-style:italic;>Relevance: <b>$count</b></p></section><hr>";


?>