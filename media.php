<?php
/*
Template Name: Media Gallery - Image Gallery
*/
?>

<?php
get_header();
?>

<div class="pagewidth">
	<div id="pagetype" style="background-color:#E8342E;">
		<h2 style="padding:0;color:#FFF;height:40px;">
			Photo and Video
		</h2>
		<div class="background"><img style="margin:-10px;margin-right:4px;" src="<?php bloginfo("template_directory")?>/res/img/navBarAtomRed.png" alt="AdamBots Team 245" height="85"></div>
		<?php dynamic_sidebar('Media Gallery Submenu') ?>
	</div>
</div>

<?php
include "genericbottom.php";
?>