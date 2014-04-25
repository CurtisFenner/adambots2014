<?php

//This is default renderer for pages (those without a tempalte set).
//For posts' rendering, see SINGLE.PHP.
//This should ideally never be visible, but we still want it to look nice.

get_header();
?>

<div class="pagewidth">
	<div id="pagetype" style="background-color:white;" class="blacktext">
		<div style="font-size:1.5em;line-height:40px;">
			Hello from the 
			<div style="display:inline-block;padding:0;margin:0;height:40px;">
				<img style="margin:0" height="28" alt="AdamBots" src="<?php bloginfo("template_directory")?>/res/img/adambots_text_outlined.png"/>
			</div>
		</div>
		<div class="background">
			<img style="margin:-10px;margin-right:4px;" src="<?php bloginfo("template_directory")?>/res/img/navAtomThin.png" alt="AdamBots Team 245" height="85">
		</div>
		This page doesn't have a template set. That doesn't seem quite right.
	</div>
</div>

<?php
$showtitle = true;
include "genericbottom.php";
?>