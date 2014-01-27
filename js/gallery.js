"use strict";

var gx = 0;
var tgx = 0;

var gallery = [
{url:"http://www.adambots.com/wp-content/gallery/2013-palmetto-regional/dsc05322.jpg",
title:"2013 Palmetto Regional Champions!",
text:"The AdamBots were champions at the Palmetto regional in Myrtle Beach, South Carolina with FRC team 11, MORT, and FRC team 2187, Team Volt."
},
{url:"http://www.adambots.com/wp-content/uploads/2011/01/AdamBots-Team-Picture2013v2-570x302.jpg",
title:"The 2014 AdamBots FRC Team",
text:"Our team of seventy students from Rochester Adams and Stoney Creek High Schools"
},
{url:"../res/img/team.jpg",title:"WOW",text:"SO DOGE"}
];

gx = -gallery.length * 1000;
tgx = gx;


function galleryupdate() {
	gx = gx * 0.7 + 0.3 * tgx;
	if (Math.abs(gx) < .001) {
		gx = 0.001;
	}
	if ( Math.abs(gx-tgx) < 2 / 960 ) {
		gx = tgx;
	}
	if (window.requestAnimationFrame) {
		requestAnimationFrame(galleryupdate);
	} else {
		setTimeout(galleryupdate,1000/60);
	}
	var progress = (gx % 1 + 1) % 1;
	galleryleft.style.left = ((progress * 960 - 960) << 0) + "px";
	galleryright.style.left = ((progress * 960) << 0) + "px";
	manageGalleryItem(galleryleft,gx-progress+1);
	manageGalleryItem(galleryright,gx-progress);
}

galleryupdate();

function manageGalleryItem(element,x) {
	var xmod = -x % 1;
	if (xmod < 0)
		xmod = 1 + x;

	var index = x - xmod;
	index = ( gallery.length + index % gallery.length ) % gallery.length;
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