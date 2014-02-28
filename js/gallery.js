"use strict";

var gx = 0;
var tgx = 0;

var gallery = [
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

gx = -gallery.length * 1000;
tgx = gx;

var pgx = -19;

function galleryupdate() {
	gx = gx * 0.7 + 0.3 * tgx;
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

setInterval(galleryupdate,1000/60);

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