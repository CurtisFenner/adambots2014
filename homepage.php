<?php /* Template Name: HomePage */ get_header(); ?>
<h1 style="display:none;margin:0;">AdamBots Homepage <!-- accessibility purposes--></h1>


<script type="text/data" id="gallerysource">
2013 <em>OCCRA&nbsp;</em> Foundation Award Winners|<em>OCCRA&nbsp;</em>2013 Foundation Award
http://www.adambots.com/wp-content/uploads/2014/04/occrafoundationslide.jpg
http://www.adambots.com/occra/
<em>OCCRA&nbsp;</em> is the Oakland County Competitive Robotics Association. In the latest season, the AdamBots won the Foundation Award, which is the highest award in <em>OCCRA</em>.
It recognizes the team with the most enthusiasm for robotics and STEM and the most raise awareness of robotics and technical career options.

Thank you, Sponsors!|Our Sponsors
http://www.adambots.com/wp-content/uploads/2014/04/sponsorslide2.jpg
http://www.adambots.com/about/sponsors/
Sponsors are the reason we can do all of the amazing stuff we do. Thank you, sponsors!

Resources from the AdamBots | Resources from Us
http://www.adambots.com/wp-content/uploads/2014/04/resourcesslide.jpg
http://www.adambots.com/resources/resources-overview/
The AdamBots provide many resources for other <em>FIRST</em>ers!
Our scouting tool gives OPR data for individual portions of the contribution and predicts match schedules and rankings.
We also have information about safety, and our award submissions like our award winning Business Plan.

Our 2014 <em>FRC&nbsp;</em> Robot, <em>Andromeda</em>!|Our <em>FRC&nbsp;</em> Robot
http://www.adambots.com/wp-content/uploads/2014/04/andromedaslide.jpg
http://www.adambots.com/first/2014-game-and-robot/
Our robot for the 2014 <em>FRC&nbsp;</em> challenge, <em>Aerial Assist</em>!
Aerial Assist is a game requiring large excerise balls to be scored in goals. Robots work together in an alliance, assisting each other to score.
Bonus points are available for tossing the ball over a truss and for catching it.
Our robot, Andromeda, consistently scores, assists, and trusses well.

Our Mexican Sister Team, Team LamBot 3478|Team LamBot 3478
http://www.adambots.com/wp-content/uploads/2014/04/lambotslide.jpg
http://www.adambots.com/about/team-outreach/team-lambot-3478/
General Motors approached us in 2010 about mentoring new teams in Mexico. We have been mentoring the LamBots since.
Team 3478 has gone on to win <strong>Rookie All Stars</strong> their first year at the <em>FRC&nbsp;</em> World Championship, and <strong>Engineering Inspiration</strong> in 2013.

Team Blog|Team Blog
http://www.adambots.com/wp-content/uploads/2014/04/blogslide.jpg
http://www.adambots.com/team-blog/
The AdamBots publish blog posts nearly weekly updating the world on everything AdamBots.
These include competition and event summaries, interviews, and build updates.
</script>
<div id="gallerybox" class="nosel pagewidth">
	<div id="gallerycontent">
		<a id="gallerylink">
			<div id="galleryimage"></div>
			<div id="gallerytext"></div>
		</a>
		<div id="galleryright"></div>
		<div id="galleryleft"></div>
	</div>
	<div id="gallerytabs">

	</div>
</div>
<script> (function(){function h(a){g&&g.parentNode.removeChild(g);b[f].anchor.className="tab";f=b.indexOf(a);gallerylink.href=a[2];console.log(a[2]);gallerytext.innerHTML="<h2>"+a[0][0]+"</h2><br>"+a.slice(3).join(" ")+' <em style="color:#FFD802;">Read More</em>';galleryimage.appendChild(a.a);g=a.a;console.log(g);a.anchor.className="tab activetab"}function m(a,b){a.onclick=function(){h(b)}}function l(a){a=a.toLowerCase();return 0<=a.indexOf("http")||0<a.index(".png")||0<a.indexOf(".jpg")||0<a.indexOf(".jpeg")||
0<a.indexOf("www")}function n(a){a.onload=function(){720/a.width>432/a.height?a.width=720:a.height=432;a.style.display="block"}}for(var f=0,g=null,e=document.getElementById("gallerysource").innerHTML.trim(),e=e.split(/\s*\n+\s*/g),b=[],d=[],c=0;c<e.length-2;c++){var k=e[c],p=e[c+1],q=e[c+2];0<k.indexOf("|")&&l(p)&&l(q)?(d&&0<d.length&&b.push(d),d=[k.split("|")]):d.push(k)}for(;c<e.length;c++)d.push(e[c]);b.push(d);for(c=0;c<b.length;c++)e=document.createElement("div"),e.className="tab",d=document.createElement("a"),
d.innerHTML=b[c][0][1],m(d,b[c]),0==c&&(d.className="activetab"),b[c].anchor=d,b[c].a=document.createElement("img"),b[c].a.style.display="none",n(b[c].a),b[c].a.src=b[c][1],e.appendChild(d),gallerytabs.appendChild(e);galleryleft.onclick=function(){f--;f=(f+b.length)%b.length;h(b[f])};galleryright.onclick=function(){f++;f=(f+b.length)%b.length;h(b[f])};h(b[Math.random()*b.length<<0])})(); </script>


<div id="countdown" class="pagewidth"></div>
<script src="<?php bloginfo('template_directory'); ?>/js/countdown.js"></script>

<div id="bodycards">
	<div id="teaminfo">
		<div id="teamatom">
			<img width="353" height="72" src="http://www.adambots.com/wp-content/uploads/2014/05/adambotslogoright-2.png" alt="The AdamBots">
		</div>
		<?php
		dynamic_sidebar("Display Infotext");
		?>
	</div>
	<div id="twitter">
		<a style="color:white;" class="twitter-timeline" href="https://twitter.com/AdamBots" data-theme="dark" data-link-color="#e0bb00" data-tweet-limit="20" data-chrome="nofooter noborders transparent" data-widget-id="434172184005578752">
			Our Twitter feed is loading
			<!-- <script src='<?php bloginfo('template_directory'); ?>/js/twitter.js'></script> -->
			<script>
			setTimeout(function(){
			!function (d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0],
				p = /^http:/.test(d.location) ? 'http' : 'https';
				if (!d.getElementById(id)) {
					js = d.createElement(s);
					js.id = id;
					js.src = p + "://platform.twitter.com/widgets.js";
					fjs.parentNode.insertBefore(js, fjs);
				}
			}(document, "script", "twitter-wjs")},100);
			</script>
		</a>
	</div>
	<div class="clear"></div>
</div>

<div id="robotinfo" class="pagewidth" style="display:none;">
	<div id="robotimg">
		<img src="<?php bloginfo('template_directory'); ?>/res/img/robot-cropped.png" alt="Andromeda, 2014 FRC Robot">
	</div>
	<div id="robottext">some text about our wonderful robot</div>
	<div class="clear"></div>
</div>

<div class="pagewidth" id="panelcontainer" style="position:relative;height:420px;top:0;">
	<div class="panel" style="width:314px;height:325px;left:0;top:0;text-align:center;">
		<?php
		dynamic_sidebar("Homepage 1");
		?>
	</div>
	<div class="panel" style="width:314px;height:325px;left:323px;top:0;text-align:center;">
		<?php
		dynamic_sidebar("Homepage 2");
		?>
	</div>
	<div class="panel" style="width:314px;height:325px;left:646px;top:0;text-align:center;">
		<?php
		dynamic_sidebar("Homepage 3");
		?>
	</div>
</div>
<?php get_footer(); ?>