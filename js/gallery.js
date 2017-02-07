(function() {
	"use strict";

	var AUTO_TRANSITION_TIME = 10;
////////////////////////////////////////////////////////////////////////////////

	var slides = [];
	// Parse slide descriptions
	{
		var SECTION = "#SECTION#";
		var lines = document.getElementById("gallerysource").innerHTML.trim().split(/\s*[\n\r]+\s*/g);
		var slide = null;
		for (var i = 0; i < lines.length;) {
			var line = lines[i];
			if (line.indexOf(SECTION) == 0) {
				var titletab = lines[i].substring(SECTION.length).split(" | ");
				slide = {
					index: slides.length,
					title: titletab[0],
					url: lines[i+2],
					image: lines[i+1],
					content: ""
				};
				slides.push(slide);

				// Create tab in right hand tray
				var tab = document.createElement("div");
				tab.className = "tab";
				var tabA = document.createElement("a");
				tab.appendChild(tabA);
				tabA.innerHTML = titletab[1];
				(function(slide){
					tabA.addEventListener("click", function() {
						selectSlide(slide);
					});
				})(slide);
				document.getElementById("gallerytabs").appendChild(tab);

				slide.tab = tab;

				// Move to content of this tab
				i = i + 3;
			} else {
				slide.content += line + " ";
				i++;
			}
		}
	}

	var oldSlide = null;
	var queuedSlide = null;
	var movingSlide = null;
	function switchTo(slide) {
		if (movingSlide) {
			throw new Error("a slide is already active; cannot switchTo new slide");
		}
		movingSlide = slide;
		document.getElementById("galleryimagetop").style.backgroundImage = "url('" + slide.image + "')";
		document.getElementById("galleryimagetop").style.transition = "transform 0.4s";
		document.getElementById("galleryimagetop").style.transform = "translateX(0%)";
	}

	function settle() {
		if (!movingSlide) {
			return console.log("no moving slide. huh");
		}
		oldSlide = movingSlide;
		document.getElementById("galleryimagetop").style.transform = "translateX(-100%)";
		document.getElementById("galleryimagetop").style.transition = "";
		document.getElementById("galleryimagebottom").style.backgroundImage = "url('" + movingSlide.image + "')";
		movingSlide = null;

		if (queuedSlide) {
			// Do this in the next frame, to be sure that the animation happens
			var next = queuedSlide;
			setTimeout(function(){selectSlide(next);}, 1);
			queuedSlide = null;
		}
	}
	document.getElementById("galleryimagetop").addEventListener("transitionend", settle);

	function selectSlide(slide, auto) {
		if (!auto) {
			document.getElementById("gallerymoveprogress").style.transition = "";
			document.getElementById("gallerymoveprogress").style.transform = "";
		}

		for (var i = 0; i < slides.length; i++) {
			slides[i].tab.className = "tab";
		}
		slide.tab.className = "tab activetab";
		document.getElementById("gallerylink").href = slide.url;
		document.getElementById("gallerytext").innerHTML =
			"<h2>" + slide.title + "</h2><br>" + slide.content + " <em style=\"color:#FFD802;\">Read More</em>";

		if (auto) {
			document.getElementById("gallerymoveprogress").style.transform = "translateX(0)";
			document.getElementById("gallerymoveprogress").style.transitionProperty = "transform";
			document.getElementById("gallerymoveprogress").style.transitionDuration = AUTO_TRANSITION_TIME + "s";
			if (!oldSlide) {
				oldSlide = slide;
				switchTo(slide);
				return settle();
			}
		}

		if (movingSlide) {
			queuedSlide = slide;
		} else if (slide != oldSlide) {
			switchTo(slide);
		}
	}


	document.getElementById("gallerymoveprogress").addEventListener("transitionend", function() {
		if (!oldSlide) {
			return console.log("unexpectedly, oldSlide is null when auto transition occurred");
		}
		document.getElementById("gallerymoveprogress").style.transitionDuration = "";
		document.getElementById("gallerymoveprogress").style.transform = "translateX(-100%)";

		var next = slides[(oldSlide.index+1)%slides.length];
		setTimeout(function(){selectSlide(next, true);}, 1);
	});

	selectSlide(slides[Math.random() * slides.length << 0], true);
})();
