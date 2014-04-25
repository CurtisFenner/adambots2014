<?php
the_post();
$body = get_the_content();
if (strpos($body,'[left]') !== FALSE) {
?>
<div id="content" class="pagewidth">
<?php
} else {
?>
<div id="content" class="pagewidth onecolumn">
<?php
	//Only do this on a onecolumn page.
	//Two column pages do not render it correctly.
	if (isset($showtitle) && $showtitle) {
		?><h1><?php the_title(); ?></h1><?php
	}
}
the_content();
?>
</div>
<?php
get_footer();
?>