<?php
function shortcode_left($atts, $content=null){
   return '<div id="leftcol">' . do_shortcode($content) . '</div>';
}
add_shortcode('left','shortcode_left');

function shortcode_right($atts, $content=null){
   return '<div id="rightcolbg"><div id="rightcol">' . do_shortcode($content) . '</div><div id="rightcolatom"></div></div>';
}
add_shortcode('right','shortcode_right');
?>