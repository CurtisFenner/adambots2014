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
var open = false;

function Update() {
	if (open) {
		belowbox.style.height = "auto";
	} else {
		belowbox.style.height = "0";
	}
	console.log(open);
}

function clearBelow() {
	below.innerHTML = "";
}

// Visually highlight tab
function highlight(tab) {
	tab.style.backgroundColor = "#FFD802"; //Throws an error in IE8
	tab.style.backgroundImage = 'url("/wp-content/themes/adambots2014/res/img/noisy.png")';
	tab.style.color = "#111111"
	tab.style.textShadow = "none";
}

// Remove visual highlight from tab
function unhighlight(tab) {
	tab.style.backgroundColor = "";
	tab.style.backgroundImage = "";
	tab.style.color = "#EEEEEE";
}

// Moves all of the children from one element to a different one
function moveChildren(oldParent, newParent) {
	while (oldParent.firstChild) {
		newParent.appendChild(oldParent.firstChild);
	}
}

// Converts a list (nodelist) to an array
function listToArray(list) {
	var r = [];
	for (var i = 0; i < list.length; i++) {
		r[i] = list[i];
	}
	return r;
}

function setupTab(tab) {
	// Remove the link aspect of the tab (this is part of the 'graceful
	// degradation' without javascript)
	var anchor = tab.getElementsByTagName("a")[0];
	if (anchor.getElementsByTagName("img").length === 0) {
		anchor.parentNode.removeChild(anchor);
	}
	tab.onclick = function() {
		// Start by dimming all the tabs:
		for (var j = 0; j < links.length; j++) {
			unhighlight(links[j]);
		}
		// Am I picking a new tab?
		if (active != tab) {
			// Yes. Close the old one:
			if (active) {
				moveChildren(below, active);
			}
			// Make me the active one:
			active = tab;
			open = true;
			below.style.display = "block";
			for (var j = 0; j < links.length; j++) {
				unhighlight(links[j]);
			}
			var uls = listToArray(tab.getElementsByTagName("ul"));
			for (var i = 0; i < uls.length; i++) {
				var cname = (i % 2 == 1) ? "right" : "left";
				uls[i].className = cname;
				below.appendChild(uls[i]);
			}
		} else {
			// No. Toggle whether or not this tab is open.
			open = !open;
		}
		if (open) {
			highlight(tab);
		}
		Update();
	}
}

for (var i = 0; i < links.length; i++) {
	setupTab(links[i]);
}

below.style.display = "none";

/*
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
*/

})();