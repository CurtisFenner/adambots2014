"use strict";
(function() {
	function click(slide) {
		gallerytext.innerHTML = "<a href='" + slide[2] + "'><h2>" + slide[0][0] + "</h2><br>" + slide.slice(3).join(" ") + "</a>";
		galleryimage.style.backgroundImage = "url(" + slide[1] + ")";
		for (var i = 0; i < slides.length; i++) {
			slides[i].anchor.className = "tab";
		}
		slide.anchor.className = "tab activetab";
	}
	function manage(anchor,slide) {
		anchor.onclick = function() {
			click(slide);
		}
	}
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
			if (slide && slide.length > 0) {
				slides.push(slide);
			}
			slide = [now.split("|")];
		} else {
			slide.push(now);
		}
	}
	for (;i < data.length; i++) {
		slide.push(data[i]);
	}
	slides.push(slide);

	//Slides have been prepared.
	//A slide is an array.
	//slide[0] is an array in the form [Title,  Short Title].
	//slide[1] is URL for image. slide[2] is URL for link.
	//slide[n >= 2] are text to be concatenated together.
	for (var i = 0; i < slides.length; i++) {
		var div = document.createElement("div");
		div.className = "tab";
		var anchor = document.createElement("a");
		anchor.innerHTML = slides[i][0][1];
		manage(anchor,slides[i]);
		if (i == 0) {
			anchor.className = "activetab";
		}
		slides[i].anchor = anchor;
		div.appendChild(anchor);
		gallerytabs.appendChild(div);
	}

	click( slides[(Math.random() * slides.length) << 0] )
})();