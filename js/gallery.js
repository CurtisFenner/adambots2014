"use strict";
(function() {
	var focus = 0;
	var activeImage = null;
	function click(slide) {
		if (activeImage) {
			activeImage.parentNode.removeChild(activeImage);
		}
		slides[focus].anchor.className = "tab";
		focus = slides.indexOf(slide);
		gallerylink.href = slide[2];
		console.log(slide[2]);
		gallerytext.innerHTML = "<h2>" + slide[0][0] + "</h2><br>" + slide.slice(3).join(" ") + " <em style=\"color:#FFD802;\">Read More</em>";
		galleryimage.appendChild(slide.image);
		activeImage = slide.image;
		console.log(activeImage);
		slide.anchor.className = "tab activetab";
	}
	function clickLeft() {
		focus--;
		focus = (focus + slides.length) % slides.length;
		click(slides[focus]);
	}
	function clickRight() {
		focus++;
		focus = (focus + slides.length) % slides.length;
		click(slides[focus]);
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

	function size(image,width,height) {
		image.onload = function() {
			var scaleW = width / image.width;
			var scaleH = height / image.height;
			if (scaleW > scaleH) {
				//Scale width to 720
				image.width = 720;
			} else {
				image.height = 432;
			}
			image.style.display = "block";
			//720x432
		}
	}

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
		slides[i].image = document.createElement("img");
		slides[i].image.style.display = "none";
		size(slides[i].image,720,432);
		slides[i].image.src = slides[i][1];
		div.appendChild(anchor);
		gallerytabs.appendChild(div);
	}

	galleryleft.onclick = clickLeft;
	galleryright.onclick = clickRight;

	click( slides[(Math.random() * slides.length) << 0] )
})();