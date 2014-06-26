<?php
// Search Result
// Used by search.php
// Uses information gained from the_post()

?>
		<b><a href="<?php  the_permalink(); ?>" style="font-size:24px;text-decoration:underline;"><?php the_title(); ?></a></b><br>
		<section style="font-size:16px;">
<?php
$str = get_the_content();
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
echo $str;
//echo substr(strip_tags($str),0,100) + "&hellip;"
?>
</section>
<hr>