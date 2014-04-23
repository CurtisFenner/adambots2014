function getViewport() {
	var viewPortWidth;
	var viewPortHeight;
var documentElement;
	// the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
	if (typeof window.innerWidth != 'undefined') {
	viewPortWidth = window.innerWidth,
	viewPortHeight = window.innerHeight
	}

// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)

	else if (typeof (documentElement = document.documentElement) != 'undefined'
	&& typeof documentElement.clientWidth !=
	'undefined' && documentElement.clientWidth != 0) {
	viewPortWidth = documentElement.clientWidth,
	viewPortHeight = documentElement.clientHeight
	}

	// older versions of IE
	else {
	viewPortWidth = document.getElementsByTagName('body')[0].clientWidth,
	viewPortHeight = document.getElementsByTagName('body')[0].clientHeight
	}
	return [viewPortWidth, viewPortHeight];
}


var links = document.getElementsByTagName("a");
var imgs = [];
for (var i = 0; i < links.length; i++) {
if (links[i].hasAttribute("data-image-id")) {
	imgs.push(links[i]);
	}
}

var cover = document.createElement("div");
var coverStyle = cover.style;
coverStyle.position = "fixed";
cover.hidden = true;
coverStyle.display = "none";
cover.display = "none";
coverStyle.left = "0";
coverStyle.top = "0";
coverStyle.width = "100%";
coverStyle.height = "100%";
coverStyle.zIndex = "1000";
coverStyle.background = "rgba(0,0,0,0.5)";
coverStyle.webkitTouchCallout = "none";
coverStyle.webkitUserSelect = "none";
coverStyle.khtmlUserSelect = "none";
coverStyle.mozUserSelect = "none";
coverStyle.msUserSelect = "none";
coverStyle.userSelect = "none";

var center = document.createElement("div");
var centerStyle = center.style;
centerStyle.position = "absolute";
centerStyle.left = "50%";
centerStyle.top = "50%";
cover.appendChild(center);
var centerBottom = document.createElement("div");
centerBottom.style.position = "absolute";
centerBottom.style.left = "50%";
centerBottom.style.top = "100%";
cover.appendChild(centerBottom);

var frame = document.createElement("div");
var frameStyle = frame.style;
frameStyle.position = "absolute";
frameStyle.left = "-150px";
frameStyle.top = "-1000px";
frameStyle.width = "300px";
frameStyle.height = "100px";
frameStyle.background = "#FFFFFF";
frameStyle.boxShadow = "0 0 4px 4px rgba(0,0,0,0.25)";
frameStyle.textAlign = "right";
frame.hidden = true;
frameStyle.display = "none";
var seeFull = document.createElement("a");
seeFull.innerHTML = "see full size image";
seeFull.style.display = "block";
seeFull.style.marginTop = "3px";
seeFull.style.marginRight = "5px";
seeFull.style.color = "#333";
seeFull.onmousedown = function() {};
frame.appendChild(seeFull);

var goLeft = document.createElement("div");
var goLeftStyle = goLeft.style;
goLeftStyle.position = "absolute";
goLeftStyle.width = "80px";
goLeftStyle.height = "80px";
goLeftStyle.left = "-95px";
goLeftStyle.top = "-100px";
goLeftStyle.background = "#FFF";
goLeftStyle.boxShadow = "0 0 4px 4px rgba(0,0,0,0.25)";
goLeftStyle.cursor = "pointer";
goLeftStyle.textAlign = "center";
goLeftStyle.background = "url('http://www.adambots.com/wp-content/uploads/2013/11/Arrow-Left.png'), white";
centerBottom.appendChild(goLeft);
var goRight = document.createElement("div");
var goRightStyle = goRight.style;
goRightStyle.position = "absolute";
goRightStyle.width = "80px";
goRightStyle.height = "80px";
goRightStyle.left = "15px";
goRightStyle.top = "-100px";
goRightStyle.background = "#FFF";
goRightStyle.boxShadow = "0 0 4px 4px rgba(0,0,0,0.25)";
goRightStyle.cursor = "pointer";
goRightStyle.background = "url('http://www.adambots.com/wp-content/uploads/2013/11/Arrow-Right.png'), white";
centerBottom.appendChild(goRight);

var loading = document.createElement("div");
var loadingStyle = loading.style;
loadingStyle.position = "absolute";
loadingStyle.width = "300px";
loadingStyle.height = "100px";
loadingStyle.left = "-150px";
loadingStyle.top = "-85px";
loadingStyle.background = "#FFFFFF";
loadingStyle.zIndex = "100000";
loadingStyle.boxShadow = "0 0 4px 4px rgba(0,0,0,0.25)";
loadingStyle.opacity = "0%";
loadingStyle.fontSize = "34px";
loadingStyle.lineHeight = "100px";
loadingStyle.textAlign = "center";
loadingStyle.color = "#AAAAAA";
loading.innerHTML = "Loading...";
center.appendChild(loading);

var img = document.createElement("img");
frame.appendChild(img);

document.body.appendChild(cover);




function resizeFrame(nwidth,nheight) {
	frameStyle.width = Math.floor(nwidth) + "px";
	frameStyle.height = Math.floor(nheight) + "px";
	frameStyle.left = -Math.floor(nwidth/2) + "px";
	frameStyle.top = -Math.floor(nheight/2) - 35 + "px";
}



img.onload = function() {
	loaded = true;
	loading.style.display = "none";
	loading.hidden = true;
	target_opacity = 0;
	frame.hidden = false;
	frameStyle.display = "block";
	img.removeAttribute("style");
	img.hidden = false;
	img.style.display = "block";
	img.style.position = "absolute";
	img.style.left = "20px";
	img.style.top = "20px";
	frameStyle.left = -Math.floor(img.width);
	var imgWidth = img.width;
	var imgHeight = img.height;
	var size = getViewport();
	var screen_width = size[0];
	var screen_height = size[1];
	//image must fit in view, so find which is smaller: available_height / imag_height or -width/-width
	var available_width = screen_width - 240;
	var available_height = screen_height - 120 - 70;
	var proportion = Math.min(available_width / imgWidth, available_height / imgHeight);
	porportion = Math.max(1,proportion); // do not upscale small images
	img.style.width = Math.floor(proportion * imgWidth) + "px";
	img.style.height = Math.floor(proportion * imgHeight) + "px";
	resizeFrame(40 + proportion * imgWidth, 40 + proportion * imgHeight);
}
center.appendChild(frame);

// Fixes rendering bugs in Chrome.
// See http://stackoverflow.com/questions/15152470/chrome-rendering-issue-fixed-position-anchor-with-ul-in-body/15203880#15203880
cover.style.webkitTransform = "translateZ(0)";


var focusElement = 0;
var focusShown = false;

function display() {
	loaded = false;
	loadTicks = 0;
	cover.hidden = false;
	cover.style.display = "block";
	frame.hidden = false;
	frame.style.display = "block";
	img.src = imgs[focusElement].href;
	seeFull.href = img.src;
}

function hide() {
	cover.hidden = true;
	cover.style.display = "none";
	frame.hidden = true;
	frame.style.display = "none";
}

var dontHide = false;

cover.onclick = function(e) {
	if (!dontHide) {
	hide();
	}
	dontHide = false;
}

goRight.onclick = function() {
	dontHide = true;
	focusElement++;
	if (focusElement >= imgs.length) {
	focusElement -= imgs.length;
	}
	display();
	return false;
}


goLeft.onclick = function() {
	dontHide = true;
	focusElement--;
	if (focusElement < 0) {
	focusElement += imgs.length;
	}
	display();
	return false;
}

for (var i = 0; i < imgs.length; i++) {
	(function(j){
	imgs[j].onclick = function(e) {
	focusElement = j;
	display();
	return false;
	}})(i);
}


var loaded = false;
var loadTicks = 0;

function loop() {
	if (loadTicks > 15 && !loaded) {
		loading.hidden = false;
		loading.style.display = "block";
	}
	if (!loaded) {
		loadTicks++;
	}
	if (loaded) {
		loading.hidden = true;
		loading.style.display = "none";
	}
}
setInterval(loop,10);

/*

var selected = false;
var debounce = false;

cover.onmousedown = function(e) {
	if (!debounce && (e.srcElement || e.target || {}).nodeName != "A") {
	cover.hidden = true;
	coverStyle.display = "none";
	frame.hidden = true;
	frameStyle.display = "none";
	}
	debounce = false;
}


function imgSelect(e,a) {
	selected = (a || this).getAttribute("data-imgbox");
	cover.hidden = false;
	coverStyle.display = "block";
	img.src = (a || this).getAttribute("data-href");
	seeFull.href = (a || this).getAttribute("data-href");
	target_opacity = 1;
}

goLeft.onmousedown = function() {
	if (selected > 0) {
	selected--;
	} else {
	selected = imgs.length-1;
	}
	debounce = true;
	imgSelect(false,imgs[selected]);
	return false;
}
goRight.onmousedown = function() {
	if (selected < imgs.length-1) {
	selected++;
	} else {
	selected = 0;
	}
	debounce = true;
	imgSelect(false,imgs[selected]);
	return false;
}

for (var i = 0; i < imgs.length; i++) {
	imgs[i].setAttribute("data-href",imgs[i].getAttribute("href"));
	imgs[i].removeAttribute("href");
	imgs[i].getElementsByTagName("img")[0].removeAttribute("title");
	imgs[i].style.cursor = "pointer";
	imgs[i].onmousedown = imgSelect; 
}

var target_opacity = 0;
var current_opacity = 0;


function loop() {
	loadingStyle.opacity = Math.max(0,current_opacity-0.1)/0.9;
	current_opacity = current_opacity * 0.93 + 0.07 * target_opacity;
	if (Math.abs(current_opacity - target_opacity) < 0.05) {
	current_opacity = target_opacity
	} else {
	current_opacity += Math.abs(target_opacity - current_opacity) / (target_opacity - current_opacity) * 0.05;
	}
}
setInterval(loop,20);

*/