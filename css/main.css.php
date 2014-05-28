<?php
/**
 * On-the-fly CSS Compression
 * Copyright (c) 2009 and onwards, Manas Tungare.
 * Creative Commons Attribution, Share-Alike.
 *
 * In order to minimize the number and size of HTTP requests for CSS content,
 * this script combines multiple CSS files into a single file and compresses
 * it on-the-fly.
 *
 * To use this in your HTML, link to it in the usual way:
 * <link rel="stylesheet" type="text/css" media="screen, print, projection" href="/css/compressed.css.php" />
 */

header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 60*60*24*14)); // Two day expiration?
header('Cache-Control: must-revalidate');

$cssFiles = array(
	"css2014.css",
	"reset.css",
	"roboto.css"
);

$ts = '';
 
/**
 * Ideally, you wouldn't need to change any code beyond this point.
 */
$buffer = "";
foreach ($cssFiles as $cssFile) {
	$buffer .= file_get_contents($cssFile);
	$ts .= filemtime($cssFile);
}

$etag = md5($ts);
header("ETag: \"{$etag}\"");
 
// Remove comments
$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
 
// Remove space after colons
$buffer = str_replace(': ', ':', $buffer);
 
// Remove whitespace
$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
 
// Enable GZip encoding.
ob_start("ob_gzhandler");

 
// Set the correct MIME type, because Apache won't set it for us
header("Content-type: text/css");
 
// Write everything out
echo($buffer);
?>