"use strict";
(function() {
	function appearsUrl(s) {
		s = s.toLowerCase();
		return s.indexOf("http") >= 0 || s.index(".png") > 0|| s.indexOf(".jpg") > 0 || s.indexOf(".jpeg") > 0 || s.indexOf("www") > 0;
	}
	var gallery = document.getElementById("gallerybox");
	var data = document.getElementById("gallerysource").innerHTML.trim();
	data = data.split(/\s*\n+\s*/g);
	var pages = [];

	var slides = [];
	var slide = [];
	for (var i = 0; i < data.length-2; i++) {
		var now = data[i];
		var one = data[i+1];
		var two = data[i+2];
		if (now.indexOf("|") > 0 && appearsUrl(one) && appearsUrl(two)) {
			if (slide && slide.length > 0);
				slides.push(slide);
			slide = [now];
		} else {
			slide.push(now);
		}
	}
	for (;i < data.length; i++) {
		slide.push(data[i]);
	}
	slides.push(slide);
	console.log(slides);
})();