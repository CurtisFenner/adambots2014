<?php

if (!is_dir("data")) {
	mkdir("data");
	file_put_contents("data/dropsource.txt","Tab:No One set up the dropdown!|/");
}

/*
Content on April 21th


Tab:The AdamBots|/about

Title:All About Us
About Us|about|A summary of who we are
Awards|The AdamBot's recognition at the competition
Team Recognition|team-recognition|The AdamBots in our Community
Team History|about/team-history|The full history of the AdamBots
Adambots Outreach|team-outreach|How we give to our community
Subteams|about/sub-teams|The structure of our team

Title:Our People
Our Sponsors|Meet the people who make everything possible
Our Students|Meet the AdamBots
Our Mentors|Meet our inspirers, teachers, mentors, and guides
Our Alumni|Meet the students touched by our <em>FRC</em> Team

Tab:<em>FIRST&nbsp;</em>|/first

Title:<em>FIRST - FRC&nbsp;</em> Team 245
About <em>FIRST&nbsp;</em>|first|All about our main competition and program
The 2014 Game and Our Robot|2014-game-and-robot|Read about how we play

Title:Archive
Past Years|first/archive|Information about prior robots and competitions

Title:Also check out...
<em>FIRST&nbsp;</em> Media|media-gallery/first-pictures|Pictures and videos from our <em>FIRST</em>&nbsp; season

Tab:<em>OCCRA&nbsp;</em>|/occra
Title:<em>Oakland County Competitive Robotics Association</em>
OCCRA|Read about our fall competition season

Title:Also check out...
<em>OCCRA</em>&nbsp; Media|media-gallery/occra-pictures/|Pictures and videos from the competition

Tab:Media|/media-gallery

Title:<em>FIRST</em>&nbsp; Photo and Video
2014: Aerial Assist|media-gallery/first-pictures/2014-first-robotics-pictures/|Pictures from the 2014 season
2013: Ultimate Ascent|media-gallery/first-pictures/2013-first-robotics-pictures/|Pictures from the 2013 season
<em>FIRST&nbsp;</em> Videos|http://www.adambots.com/media-gallery/first-videos| Videos from our <em>FIRST&nbsp;</em> seasons 
<em>FIRST</em>&nbsp; Media Archive|media-gallery/first-pictures/|Pictures and videos from past seasons

Title:Outreach Events
2013 Outreach Events|media-gallery/outreach/2013-outreach-pictures/|
2012 Outreach Events|media-gallery/outreach/2012-outreach-pictures/|
Outreach Archive|media-gallery/outreach/|View media from past years

Title:<em>OCCRA</em> Photo and Video
2013: Gridlock|media-gallery/occra-pictures/2013-occra-robotics-pictures|Pictures and videos from the 2013 season
2012: Goal Roll|media-gallery/occra-pictures/2012-occra|Pictures and videos from the 2013 season
<em>OCCRA</em>&nbsp; Media Archive|media-gallery/occra-pictures|Pictures and videos from past years
<em>OCCRA&nbsp;</em> Videos|media-gallery/occra-videos/|Videos from our <em>OCCRA&nbsp;</em> seasons

Title:Offseason Events
Our 2013 Offseason|media-gallery/off-season-events/2013-off-season-pictures|
Our 2012 Offseason|media-gallery/off-season-events/2012-off-season-events|
Off Season Archive|media-gallery/off-season-events/|

Title:Animation
Animation Page|media-gallery/animation|Resources and videos from our animation team

Tab:Team Blog|/team-blog
Title:Team Blog
AdamBots Blog|team-blog|Read news about build and competitions
Title:Social Media
Follow us on Twitter|http://twitter.com/adambots/|
Like us on Facebook|http://www.facebook.com/AdamBots|
Visit us on YouTube|http://www.youtube.com/user/Adambots/|Keep up with weekly build video updates
Check out our Instagram|http://instagram.com/adambots245|
Title:Contact Us
Contact Us|contact-us|Have a question or comment? Leave it here

Tab:Resources|/resources/resources-overview

Title:AdamBots Resources
AdamBots Award Submissions|resources/award-submissions|Our past submissions
AdamBots Business Plan|resources/business-plan|Our award-winning business plan
Safety|resources/safety-card|Read about some of our safety policies
AdamBots Logo|resources/adambots-logo|Download versions of our logo
Programming|resources/programming|Code and resources from our programming team
Scouting Programs|http://www.adambots.com/scouting/|Real-time OPR &amp; other data for <em>FRC</em>&nbsp;

Title:Helpful Things
Helpful Documents|resources/helpful-documents|Information about competing
Helpful Links|resources/helpful-links|Links to other sites with information about <em>FIRST</em>&nbsp;
Creating a <em>FIRST</em>&nbsp; Team Site|resources/creating-a-first-team-website|An overview of making a website
*/
?>

		<div id="dropdown" class="nosel">
			<span id="dropdownbackground"></span>
			<div class="pagewidth">


<div class="navtab" style="color: rgb(238, 238, 238); text-shadow: black 1px 1px 0px; width:50px;height:50px; position:relative;padding:0px;text-align:center;">
	<a href="http://www.adambots.com/" style="left:0px;top:0px;width:50px;height:50px;display:inline-block;margin:0px;padding:0px;">
		<span><img style="position:relative;top:8px;" alt="Home" src="<?php bloginfo('template_directory'); ?>/res/img/roundhome.png" height=33><em></em></span>
	</a>
</div><?php

	function startsWith($haystack, $needle)
	{
		return $needle === "" || strpos($haystack, $needle) === 0;
	}

	/*ob_start();
	dynamic_sidebar('Dropdown Content');
	$str = ob_get_contents();
	ob_end_clean();
	echo "<!--" . $str . "-->";
	$str = str_replace('<div class="textwidget">','',$str);
	$str = str_replace('</div>','',$str);*/ //Widget source.
	$str = file_get_contents("data/dropsource.txt");
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
				echo "</div>";
			}
			echo "<div class=\"navtab\">";
			$navopen = true;
			$ulopen = false;
			$place = explode("|",substr($line,4));
			echo "<span><a href='" . $place[1] . "'>" . $place[0] . '</a><em></em></span>';
			$use = true;
		}
		if (startsWith($line,"Title:")) {
			if ($ulopen) {
				echo "</ul>";
			}
			echo "<ul><li><div class=sectiontitle>" . substr($line,6) . "</div>";
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
		echo '</div>';
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
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/dropdown.js" async></script>