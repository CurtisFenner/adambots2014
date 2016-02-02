// Make the dropdown interactive

// Uses #dropdown .navtab

(function() {
"use strict";
////////////////////////////////////////////////////////////////////////////////

// links: a list of Divs corresponding to each navigation tab
var links = [];
var dropdown = document.getElementById("dropdownnavtabs");
var dropdownChildren = dropdown.children;
for (var i = 0; i < dropdownChildren.length; ++i) {
	if (dropdownChildren[i].className.indexOf("navtab") >= 0) {
		links.push( dropdownChildren[i] );
	}
}

var active = null;

function clearBelow() {
	below.innerHTML = "";
}

function setupTab(tab) {
	var anchor = tab.getElementsByTagName("a")[0];
	if (anchor.getElementsByTagName("img").length === 0) {
		anchor.parentNode.removeChild(anchor);
	}
	tab.onclick = function() {
		if (active != tab) {
			//Open tab
			below.style.display = "block";
			for (var j = 0; j < links.length; j++) {
				links[j].style.backgroundColor = "";
				links[j].style.backgroundImage = "";
				links[j].style.color = "rgb(238,238,238)";
			}
			try {
				tab.style.backgroundColor = "rgb(255,216,2)"; //Throws an error in IE8
				tab.style.backgroundImage = 'url("/wp-content/themes/adambots2014/res/img/noisy.png")';
				tab.style.color = "rgb(17,17,17)"
				tab.style.textShadow = "none";
			} catch (e) {}
			active = tab;
			clearBelow();
			var uls = tab.getElementsByTagName("ul");
			below.innerHTML = "";
			for (var i = 0; i < uls.length; i++) {
				var cname = (i % 2 == 1) ? "right" : "left";
				below.innerHTML += "<ul class='" + cname + "'>" + uls[i].innerHTML + "</ul>";
			}
			below.innerHTML += "<div style='clear:both;'></div>";
		} else {
			//Close tab
			for (var j = 0; j < links.length; j++) {
				links[j].style.background = "";
				links[j].style.color = "rgb(238,238,238)";
				links[j].style.textShadow = "1px 1px 0px black";
			}
			active = null;
		}
	}
}

for (var i = 0; i < links.length; i++) {
	setupTab(links[i]);
}

below.style.display = "none";

var dstart = 0;
var dend = 0;
var dtime = 0;
var droph = 0;

var pheight = -1;

function dropper() {
	var t = belowpos.offsetTop;
	if (!active) {
		t = 0;
	}
	if (t != dend) {
		dstart = droph;
		dend = t;
		dtime = (new Date()).getTime() / 1000.0;
	}
	var now = (new Date()).getTime() / 1000.0 - dtime;
	now = now / (1/60);
	droph = (dstart - dend) * Math.pow(0.8, now) + dend;
	if (Math.abs(droph - dend) < 1.5) {
			droph = dend;
	}
	var newHeight = Math.floor(droph);
	if (pheight !== newHeight) {
		belowbox.style.height = newHeight + "px";
		pheight = newHeight;
	}
}
setInterval(dropper, 1000/30);

})();