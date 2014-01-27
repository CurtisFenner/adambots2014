var c = gears.getContext("2d");

var roundy = true;	//can be disabled. marks gears thinner, sharper

function drawGears() {
	c.save();
    c.scale(2.0,2.0);
	c.clearRect(0,0,600,300);
	c.translate(150,150);
	c.fillStyle = "#2A2A2A";			//GEAR COLOR
	gear(70,100,.2,.5);
	var dx = 2;
	var dy = -1;
	var dm = Math.sqrt(dx*dx+dy*dy);
	dx /= dm;
	dy /= dm;
	var dis = 200;
	var pad = 0;
	if (roundy) {
		pad = 20;
	}

	c.translate(dx*(dis+pad),dy*(dis+pad));
	gear(dis-70-30, dis-70,.2,-.5,  .515 );
	c.fillStyle = "#111";
	c.beginPath();
	c.arc(0,0,50,0,Math.PI*2);
	c.moveTo(-dx*dis,-dy*dis);
	c.arc(-dx*(dis+pad),-dy*(dis+pad),30,0,9);
	c.fill();
	c.restore();
	requestAnimationFrame(drawGears);
}

function gear(r1,r2,w,m,off) {
	c.beginPath();
	c.moveTo(0,0);
	var g = (new Date()).getTime() / 100.0 * (m || 1);
	g = g % (Math.PI*16*6);
	g = g +  Math.sin(g); //stops at n pi , n pi. So we need to divide by 8.
	g = g / 6; //to stop at (pi/8,pi/8)
	for (var i = 0; i <= 4 * 8; i++) {
		var r = r1;
		var t = Math.PI*2 * i / 32 + g + (off || 0);
		if (i % 4 == 1 || i % 4 == 2) {
			r = r2;
		}
		var base = i - i % 4 + 2;
		var baset = Math.PI*2 * base / 32 + g;
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

}

drawGears();
