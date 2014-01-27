var links = dropdown.getElementsByTagName("nav");
var active = null;


function clearBelow() {
	below.innerHTML = "";
}

for (var i = 0; i < links.length; i++) {
	(function(el) {
		el.onclick = function() {
			if (active != el) {
				//Open tab
				below.style.display = "block";
				for (var j = 0; j < links.length; j++) {
					links[j].style.background = "";
					links[j].style.color = "rgba(238,238,238,1)";
				}
				try {
					el.style.background = "rgba(255,216,2,1)"; //Throws an error in IE8
					el.style.color = "rgba(17,17,17,1)"
				} catch (e) {}
				active = el;
				clearBelow();
				var uls = el.getElementsByTagName("ul");
				below.innerHTML = "<ul class='left'>" + uls[0].innerHTML + "</ul>";
				if (uls.length > 1)
					below.innerHTML += "<ul class='right'>" + uls[1].innerHTML + "<ul>";
				below.innerHTML += "<div style='clear:both;'></div>";
			} else {
				//Close tab
				//below.style.display = "none";
				for (var j = 0; j < links.length; j++) {
					links[j].style.background = "";
					links[j].style.color = "rgba(238,238,238,1)";
				}
				active = null;
			}
		}
	})(links[i]);
}

below.style.display = "none";

var dstart = 0;
var dend = 0;
var dtime = 0;
var droph = 0;

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
	belowbox.style.height = Math.floor(droph) + "px";

	if (window.requestAnimationFrame) {
		requestAnimationFrame(dropper);
	}
}

if (!!!window.requestAnimationFrame) {
	setInterval(dropper,1000/60);
} else {
	dropper();
}