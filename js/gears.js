(function() {
	"use strict";
	var drawnOnce = false;

	if (!gears1.getContext) {
		return;
	}

	var gearContext1 = gears1.getContext("2d");
	var gearContext2 = gears2.getContext("2d");

	var retina = window.devicePixelRatio > 1;
	
	if (!retina) {
			gears1.width = "212";
			gears1.height = "212";
			gears2.width = "272";
			gears2.height = "272";
	}
	
	gears1.style.left = "43px";
	gears1.style.top = "43px";
	gears2.style.left = "212px";
	gears2.style.top = "-82px";
	
	var roundy = true;	//can be disabled. marks gears thinner, sharper

	/*
	Left gear:
		125+49/2 = 149
		132+35/2 = 149
		70,100
		.5

	Right gear:
		299+95/2 = 346
		34+40/2 = 54
		100,130
		-.5

		.515 offset
	*/

	function ismob() {
		if (window.getComputedStyle) {
			var el = document.getElementById("ismobile");
			var vis = window.getComputedStyle(el).visibility;
			return (vis.toLowerCase().indexOf("v") >= 0);
		}
		return true;
	}

	function drawGears() {
		if (ismob() && drawnOnce) {
			return;
		}
		drawnOnce = true;
		if (retina) {
			gearContext1.clearRect(0,0,424,424);
			gearContext2.clearRect(0,0,544,544);
		} else {
			gearContext1.clearRect(0,0,212,212);
			gearContext2.clearRect(0,0,272,272);
		}
		gearContext1.fillStyle = "#353535";
		gearContext2.fillStyle = "#353535";
		gear(100,70,0,-.5, 0.515, gearContext1 );
		gear(130,100,0,.5,0, gearContext2 );
	}

	/* wait until slidein finishes to increase smoothness */
	setTimeout( function() { setInterval(drawGears, 35) }, 1500);

	var noiseImg = new Image();
	noiseImg.onload = function() {
		noiseImg.ready = true;
	}
	noiseImg.src = "http://www.adambots.com/wp-content/themes/adambots2014/res/img/noisy.png";

	function gear(r1,r2,w,m,off , c) {
		c.beginPath();
		var g = (new Date()).getTime() / 100.0 * (m || 1);
		g = g % (Math.PI*16*6);
		g = g +  Math.sin(g); //stops at n pi , n pi. So we need to divide by 8.
		g = g / 6; //to stop at (pi/8,pi/8)
		c.save();
		if (retina) {
			c.scale(2,2);
		}
		c.translate(r1+6,r1+6);
		c.rotate(g);
		c.moveTo(0,0);
		for (var i = 0; i <= 4 * 8; i++) {
			var r = r1;
			var t = Math.PI*2 * i / 32 + (off || 0);
			if (i % 4 == 1 || i % 4 == 2) {
				r = r2;
			}
			var base = i - i % 4 + 2;
			var baset = Math.PI*2 * base / 32;
			t = t * (1-w) + w * baset;
			c.lineTo(Math.cos(t)*r,Math.sin(t)*r);
		}
		c.fill();

		if (roundy) {
			c.strokeStyle = c.fillStyle;
			c.lineWidth = 10;
			c.lineJoin = "round";
			c.stroke();
		}

		c.globalCompositeOperation = "destination-out";
		c.beginPath();
		c.moveTo(0,0);
		c.arc(0,0,0.5 * r2,0,Math.PI*2);
		c.fill();

		var op = c.globalCompositeOperation;
		c.globalCompositeOperation = "source-atop";
		if (noiseImg.ready) {
			c.drawImage(noiseImg,0,0);
			c.drawImage(noiseImg,-300,0);
			c.drawImage(noiseImg,-300,-300);
			c.drawImage(noiseImg,0,-300);
		}
		c.restore();
	}
})();