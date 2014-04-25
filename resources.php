<?php
/*
Template Name: Resources
*/
?>

<?php
get_header();
?>

<div class="pagewidth">
	<div id="pagetype" style="height:110px;background-color:#829F4C;">
		<h2 style="padding:0;color:#FFF;height:40px;">
			<em>Resources</em> <span style="font-size:16px">Helpful Sections for the <em>FIRST&nbsp;</em> Community</span>
		</h2>
		<?php dynamic_sidebar('Resources Submenu') ?>
	</div>
</div>


<?php include("genericbottom.php"); ?>