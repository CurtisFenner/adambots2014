<?php
/*
Template Name: Webcast
*/

//Add stylesheets to this page
global $add_style;
$add_style = array();

//Add scripts to this page
global $add_script;
$add_script = array();

?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="page_shadowline"></div>
		<div class="pagewidth">
			<div id="pagetype" style="background-color:#E8342E;">
				<h2 style="padding:0;color:#FFF;height:40px;">
					Photo and Video
				</h2>
				<div class="background"><img src="http://adambots.com/logos/png/yellowBG_small.png" height="60"></div>
				<?php dynamic_sidebar('Media Gallery Submenu') ?>
			</div>
            
            <div style="padding:20px;background-color:#FFF;background-image:url('<?php bloginfo("template_directory"); ?>/res/img/noisy.png');margin-top:6px;">
            <?php 
                $edit_attr = array(
                    'alt' => get_the_title(),
                    'title' => '',
                    'class' => 'floatright'
                    );
                $post_image = get_the_post_thumbnail($post->ID,'pristine-custom-image-medium1', $edit_attr);					
            ?>
            <?php
                if(!empty($post_image)) {
                    echo $post_image;
                }
            ?>
<h1>
<?php the_title();?>
</h1>
            <?php the_content(); ?>
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>

<hr/>
<h1>Webcast Chat</h1>
<div id="webcastbox">
Your Name:<input id="webcastname" value="Guest1"></input>
<div id="webcastchat" style="font-size:20px;width:100%;height:450px;overflow-y:scroll;background:#EEE;margin-bottom:5px;"></div>
<input id="webcastline" style="display:inline-block;margin-top:3px;left:0px;width:700px;font-size:20px;height:25px;line-height:25px;"></input>
<button id="webcastsubmitbutton" style="position:relative;top:-3px;height:31px;line-height:25px;">Say</button>
</div>

<script>
function createRequest() {
	var request;
	try{
		request = new XMLHttpRequest();
	} catch(trymicrosoft) {
		try{
			request = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(othermicrosoft){
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch(failed) {
				request = false;
			}
		}
	}
	// Ensure Request Existence
	if(!request) {
		alert("Unfortunately, your browser cannot utilize AASK. Please enable, or switch to a browser with, XMLHttpRequests! (Chrome, Opera, Safari, IE, others)");
	}
	return request;
}

function pageAsk(url,callback) {
	var request = createRequest();
	request.open("GET",url,true);
	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			callback(request.responseText);
		}
	}
	request.send();
}
function postTo(url,key,val) {
	var request = createRequest();
var str = key + "=" + val + "&" + key;
	request.open("POST",url,true);
request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.send(str);
}

function render(x) {
var old = webcastchat.innerHTML;
webcastchat.innerHTML = x.replace(/\n/g,"<br/>").replace(/\\'/g,"'").replace(/\\&quot;/g,'"');
if (old != webcastchat.innerHTML) {
webcastchat.scrollTop = webcastchat.scrollHeight;
}
}

function check() {
pageAsk("/webcastlog.txt?rand=" + Math.floor(Math.random()*10000000),render);
}
check();
setInterval(check,1500);

webcastname.value = "Guest " + Math.floor(Math.random()*1000 + 1)
webcastsubmitbutton.onclick = function() {
var v = webcastline.value.replace(/\s+/g," ").trim().replace(/&/g,"%26");
webcastline.value = "";
if (v != "") {
var now = new Date();
var hrs = now.getHours();
var min = now.getMinutes();
 postTo("/webcastappend.php","g", "(" + hrs + ":" + min + ") " + webcastname.value + ": " + v);
check();
}
};

</script>

            </div>

		</div>
	</div>
<?php get_footer(); ?>