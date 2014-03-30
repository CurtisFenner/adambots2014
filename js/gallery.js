"use strict";

var gx = 0;
var tgx = 0;

var gallery = [];

gx = 1000;
tgx = gx;

var pgx = -19;

function galleryupdate() {
	if (document.getElementsByClassName("gallerytext").length < 1) {
		return;
	}
	gx = gx * 0.6 + 0.4 * tgx;
	if (Math.abs(gx) < .001) {
		gx = 0.001;
	}
	if ( Math.abs(gx-tgx) < 2 / 960 ) {
		gx = tgx;
	}
	if (pgx !== gx) {
		var progress = (gx % 1 + 1) % 1;
		galleryleft.style.left = ((progress * 960 - 960) << 0) + "px";
		galleryright.style.left = ((progress * 960) << 0) + "px";
		manageGalleryItem(galleryleft,gx-progress+1);
		manageGalleryItem(galleryright,gx-progress);
		pgx = gx;
	}
}

setInterval(galleryupdate,1000/30);

function manageGalleryItem(element,x) {
	var xmod = -(x % 1);
	if (xmod < 0)
		xmod = 1 + x;

	var index = x - (x % 1 + 1) % 1;
	index = ( gallery.length + index % gallery.length ) % gallery.length;

	if (!gallery[index]) {
		return;
	}
	//element.getElementsByClassName("galleryimage")[0].src = gallery[index].url;
	var style = "url('" + gallery[index].url + "')";
	element.style.backgroundImage = style;
	element.getElementsByClassName("gallerytitle")[0].innerHTML = gallery[index].title;
	element.getElementsByClassName("gallerytext")[0].innerHTML = gallery[index].text;
}

gallerybuttonleft.onclick = function() {
	tgx += 1;
}

gallerybuttonright.onclick = function() {
	tgx -= 1;
}