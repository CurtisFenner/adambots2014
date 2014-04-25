<?php
/*
Template Name: FIRST
*/
?>

<?php
get_header();
?>

		<div class="pagewidth">
			<div id="pagetype" style="background-color:#0065B3;">
				<div style="font-size:1.5em;line-height:40px;color:white;">
					<em>FIRST</em>
					<span style="vertical-align:baseline;font-size:50%;line-height:50%;"><em>For Inspiration and Recognition of Science and Technology</em></span>
				</div>
				<div class="background">
					<img src="<?php bloginfo('template_directory'); ?>/res/img/firstmono.png" height="60" alt="FIRST logo">
				</div>
				<?php dynamic_sidebar('FIRST Submenu') ?>
			</div>
		</div>

<?php include "genericbottom.php"; ?>