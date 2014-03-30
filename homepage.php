<?php /* Template Name: HomePage */ get_header(); ?>
</div>
<div id="gallerholder" class="nosel">
    <div id="gallerybox">
        <div id="galleryleft">
            <h3 class="gallerytitle">2013 Palmetto Regional Champions!</h3>
            <div class="gallerytext"></div>
        </div>
        <div id="galleryright">
            <h3 class="gallerytitle">2013 Palmetto Regional Champions!</h3>
            <div class="gallerytext"></div>
        </div>
        <div id="gallerybuttonleft">
        </div>
        <div id="gallerybuttonright">
        </div>
    </div>
    <script src="<?php bloginfo('template_directory'); ?>/js/gallery.js" type="text/javascript"></script>
<script>
/*
/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////  GALLERY HERE  ///////////////////////////////////////
*/
gallery = [
{
url:"http://www.adambots.com/wp-content/uploads/2014/03/occrafoundation.png",
title:"",
text:"2013 <em>OCCRA</em> Foundation Award Winners, the AdamBots<br>at the 2013 <em>OCCRA</em> banquet."
},
{url:"http://www.adambots.com/wp-content/gallery/2013-palmetto-regional/dsc05249.jpg",
title:"",
text:"2013 Palmetto Regional Champions!<br>The AdamBots were champions at the Palmetto regional in Myrtle Beach, South Carolina with FRC team 11, MORT, and FRC team 2187, Team Volt."
},
{url:"https://scontent-b-iad.xx.fbcdn.net/hphotos-prn2/t31/1403082_527097967380821_1931756996_o.jpg",
title:"",
text:"The 2014 AdamBots FRC Team<br>Our team of seventy students from Rochester Adams and Stoney Creek High Schools"
},
{url:"https://scontent-a-iad.xx.fbcdn.net/hphotos-ash3/t1/941703_443991249024827_1714696335_n.jpg",title:"",text:"Meeting with Team Lambot in 2012"}
];
</script>
</div>

<div id="countdown" class="pagewidth"></div>
<script src="<?php bloginfo('template_directory'); ?>/js/countdown.js"></script>

<div id="bodycards">
    <div id="teaminfo">
        <div id="teamatom">
            <img src="<?php bloginfo('template_directory'); ?>/res/img/dark_round_atom_w_text.png" alt="The AdamBots">
        </div>
        <?php
        dynamic_sidebar("Display Infotext");
        ?>
        <!-- REMEMBER TO USE SEASON CARD INSTEAD IN WIDGET, DISPLAY INFOTEXT -->
    </div>
    <div id="twitter">
        <a class="twitter-timeline" href="https://twitter.com/AdamBots" data-theme="dark" data-link-color="#e0bb00" data-tweet-limit="20" data-chrome="nofooter noborders transparent" data-widget-id="434172184005578752"></a>
    </div>
    <div class="clear"></div>
</div>

<div class="pagewidth" id="panelcontainer" style="position:relative;height:420px;top:0;">
    <div class="panel" style="width:314px;height:325px;left:0;top:0;text-align:center;">
        <a href="http://www.usfirst.org">
            <img style="width:250px;margin:7px;" src="<?php bloginfo('template_directory'); ?>/res/img/first_logo.png" alt="FIRST Logo">
            <h3 style="border-bottom:15px solid #0066B3;padding-bottom:7px; padding-left:15px;padding-right:15px;">
                For Inspiration and Recognition of Science and Technology
            </h3>
        </a>
    </div>
    <div class="panel" style="width:314px;height:325px;left:323px;top:0;text-align:center;">
        <a href="<?php echo home_url(); ?>/first/2014-game-and-robot/">
            <img style="width:250px;margin:7px;margin-top:46px;margin-bottom:46px" src="<?php bloginfo('template_directory'); ?>/res/img/aerial_assist.png" alt="Aerial Assist Logo">
            <h3 style="border-bottom:15px solid #0066B3;padding-bottom:7px; padding-left:15px;padding-right:15px;">
                Aerial Assist:<br>The 2014 <em>FRC</em> Challenge
            </h3>
        </a>
    </div>
    <div class="panel" style="width:314px;height:325px;left:646px;top:0;text-align:center;">
        <a href="<?php echo home_url(); ?>/about/sponsors/">
            <img style="width:250px;margin:7px;margin-bottom:4px;" src="<?php bloginfo('template_directory'); ?>/res/img/sponsors.jpg" alt="Our Sponsors: General Motors, SAIC, Plex Systems, Magna, and The Chrysler Foundation">
            <h3 style="border-bottom:15px solid #0066B3;padding-bottom:7px; padding-left:15px;padding-right:15px;">
                Our Sponsors:<br>
                   Thank you so much!
            </h3>
        </a>
    </div>
</div>
<?php get_footer(); ?>