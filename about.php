<?php
/*
Template Name: About
*/
get_header();
?>

<div class="pagewidth">
	<div id="pagetype" style="background-color:#FFD802;" class="blacktext">
		<div style="font-size:1.5em;line-height:40px;">
			About the
			<div style="display:inline-block;padding:0;margin:0;height:40px;">
				<img style="margin:0" height="28" alt="AdamBots" src="<?php bloginfo("template_directory")?>/res/img/adambots_text_outlined.png"/>
			</div>
		</div>
		<div class="background">
			<img style="margin:-10px;margin-right:4px;" src="<?php bloginfo("template_directory")?>/res/img/navAtomThin.png" alt="AdamBots Team 245" height="85">
		</div>

		<?php dynamic_sidebar('About Submenu') ?>
		
	</div>
</div>

<?php
include "genericbottom.php";
?>