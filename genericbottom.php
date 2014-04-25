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
}
the_content();
?>
</div>
<?php
get_footer();
?>