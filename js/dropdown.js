// Make the dropdown interactive

// Uses #dropdown .navtab

(function() {
"use strict";
////////////////////////////////////////////////////////////////////////////////

var belowbox = document.getElementById("belowbox");
var belowpos = document.getElementById("belowpos");

// tabs: a list of Divs corresponding to each navigation tab
var tabs = [];
var dropdownChildren = document.getElementById("dropdownnavtabs").children;
for (var i = 0; i < dropdownChildren.length; i++) {
	if (dropdownChildren[i].className.indexOf("navtab") >= 0) {
		tabs.push( dropdownChildren[i] );
	}
}

var active = null;
var open = false;


// Visually highlight tab
function highlight(tab) {
	tab.style.backgroundColor = "#FFD802"; //Throws an error in IE8
	tab.style.backgroundImage = 'url("/wp-content/themes/adambots2014/res/img/noisy.png")';
	tab.style.color = "#111111";
	tab.style.textShadow = "none";
}

// Remove visual highlight from tab
function unhighlight(tab) {
	// Setting to empty string restores to CSS style
	tab.style.backgroundColor = "";
	tab.style.backgroundImage = "";
	tab.style.color = "";
	tab.style.textShadow = "";
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
	// Remove the link aspect of the tab
	// (this removes the "no script" fallback link)
	var anchor = tab.getElementsByTagName("a")[0];
	if (anchor.getElementsByTagName("img").length === 0) {
		// Icons remain tabs
		anchor.parentNode.removeChild(anchor);
	}
	// When this tab is clicked click...
	tab.onclick = function() {
		// Start by dimming the previously active tab:
		if (active) {
			unhighlight(active);
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
			var uls = listToArray(tab.getElementsByTagName("ul"));
			for (var i = 0; i < uls.length; i++) {
				var cname = (i % 2 == 0) ? "left" : "right";
				uls[i].className = cname;
				below.appendChild(uls[i]);
			}
		} else {
			// No. Toggle whether or not this tab is open.
			open = !open;
		}
		// Update the height of the yellow box where the dropdown
		if (open) {
			highlight(tab);
			belowbox.style.height = Math.max(0, belowpos.offsetTop) + "px";
		} else {
			belowbox.style.height = "0";
		}
	}
}

for (var i = 0; i < tabs.length; i++) {
	setupTab(tabs[i]);
}

})();