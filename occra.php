<?php
/*
Template Name: OCCRA
*/
?>

<?php get_header();
?>


<div class="pagewidth">
	<div id="pagetype" style="background-color:#FFA411;">
		<h2 style="padding:0;color:#FFF;height:80px;line-height:80px;font-size:50px;">
			<em>OCCRA</em> <span style="font-size:50%">Oakland County Competitive Robotics Association</span>
		</h2>
		<div class="background">
			<img src="<?php bloginfo('template_directory'); ?>/res/img/occralogo.png" alt="OCCRA Logo" style="margin:-7px;" height="80">
		</div>
		<?php dynamic_sidebar('OCCRA Submenu') ?>
	</div>
</div>


<?php
include("genericbottom.php");
?>