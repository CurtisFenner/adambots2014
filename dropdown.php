		<div id="dropdown">
			<span id="dropdownbackground"></span>
			<div class="pagewidth">


<nav style="color: rgb(238, 238, 238); text-shadow: black 1px 1px 0px; width:50px;height:50px; position:relative;padding:0px;text-align:center;">
	<a href="http://www.adambots.com/" style="left:0px;top:0px;width:50px;height:50px;display:inline-block;margin:0px;padding:0px;">
		<span><img style="position:relative;top:8px;" alt="Home" src="<?php bloginfo('template_directory'); ?>/res/img/roundhome.png" height=33><em></em></span>
	</a>
</nav><?php

	function startsWith($haystack, $needle)
	{
	    return $needle === "" || strpos($haystack, $needle) === 0;
	}

	ob_start();
	dynamic_sidebar('Dropdown Content');
	$str = ob_get_contents();
	ob_end_clean();
	echo "<!--" . $str . "-->";
	$str = str_replace('<div class="textwidget">','',$str);
	$str = str_replace('</div>','',$str);
	$lines = explode("\n",$str);
	$navopen = false;
	$ulopen = false;
	for ($i = 0; $i < count($lines); $i++) {
		$line = trim($lines[$i]);
		$use = false;
		if (startsWith($line,"Tab:")) {
			if ($ulopen) {
				echo '</ul>';
			}
			if ($navopen) {
				echo "</nav>";
			}
			echo "<nav>";
			$navopen = true;
			$ulopen = false;
			echo "<span>" . substr($line, 4) . '<em></em></span>';
			$use = true;
		}
		if (startsWith($line,"Title:")) {
			if ($ulopen) {
				echo "</ul>";
			}
			echo "<ul><li><h3>" . substr($line,6) . "</h3>";
			$use = true;
			$ulopen = true;
		}
		if (strlen($line) > 0 && !$use) {
			//An entry.
			$data = explode("|",$line);
			if (count($data) < 3) {
				$us = explode(' ',trim($data[0]));
				$us = $us[count($us)-1];
				$url = trim($us);
				if (strpos($url,":") === FALSE) {
					$url = site_url() . '/' . $url;
				}
				echo '<li><a href="' . $url . '">' . $data[0] . '</a><span>' . $data[1] . '</span>';
			} else {
				$url = trim($data[1]);
				if (strpos($url,":") === FALSE) {
					$url = site_url() . '/' . $url;
				}
				echo '<li><a href="' . $url . '">' . $data[0] . '</a><span>' . $data[2] . '</span>';
			}
		}
	}
	if ($ulopen) {
		echo '</ul>';
	}
	if ($navopen) {
		echo '</nav>';
	}
	?>

















			</div>
			<!-- <- .pagewidth -->

		</div>
		<div id="belowbox">
			<div class="pagewidth">
				<div id="below">
				</div>
			</div>
			<div id="belowpos"></div>
		</div>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/dropdown.js"></script>