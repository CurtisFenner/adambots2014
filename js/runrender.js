function sign(x) {
	if (x == 0) {
		return 0;
	}
	if (x > 0) {
		return 1;
	}
	return -1;
}



/*var alumRequest = new XMLHttpRequest();
alumRequest.open("GET","/render/aluminumMesh.obj",false);
alumRequest.send();

var shooterRequest = new XMLHttpRequest();
shooterRequest.open("GET","/render/shooterMesh.obj",false);
shooterRequest.send();

var blackRequest = new XMLHttpRequest();
blackRequest.open("GET","/render/blackMesh.obj",false);
blackRequest.send(); */

var verts = [];
var facein = [];
var faces = [];
var norms = [];
var mats = [];
var usedBy = [];
var cornerNorm = [];
var triNorm = [];

function centerModel() {
	var mins = [verts[0][0],verts[0][1],verts[0][2]];
	var maxs = [verts[0][0],verts[0][1],verts[0][2]];
	for (var i = 0; i < verts.length; i++) {
		for (var j = 0; j < 3; j++) {
			mins[j] = Math.min(mins[j],verts[i][j]);
			maxs[j] = Math.max(maxs[j],verts[i][j]);
		}
	}
	// center it, kay
	for (var i = 0; i < verts.length; i++) {
		for (var j = 0; j < 3; j++) {
			verts[i][j] -= (mins[j] + maxs[j]) / 2;
		}
	}
}

function binaryMesh(r,m) {
	//The first 255 are redundant so we can skip them
	var s = r.responseText.substring(256);
	//The very first are the number
	//  0    -- 1100  ONE
	// -100  -- 1300  TWO
	// -400  -- 400   THREE
	var vshift = verts.length;

	var vertices = s.substring(0,2);
	vertices = convert(vertices);
	s = s.substring(2);
	for (var i = 0; i < s.length; i+=6) {
		if (i/6 < vertices) {
			var xyz = s.substr(i,6);
			var x = xyz.substr(0,2);
			var y = xyz.substr(2,2);
			var z = xyz.substr(4,2);
			x = convert(x) / 256 / 256;
			y = convert(y) / 256 / 256;
			z = convert(z) / 256 / 256;
			x = x * 1100 - 0;
			y = y * 1400 - 100;
			z = z * 800 - 400;
			verts.push([x,y,z]);
			mats.push(m);
		} else {
			var xyz = s.substr(i,6);
			var x = convert(xyz.substr(0,2));
			var y = convert(xyz.substr(2,2));
			var z = convert(xyz.substr(4,2));
			var face = [x - 1 + vshift,y - 1 + vshift,z - 1 + vshift];
			facein.push(face);
			faces.push([verts[face[0]] , verts[face[1]] , verts[face[2]] ]);
		}
	}
}

function convert(a) {
	return (a.charCodeAt(0) & 0xff) + (a.charCodeAt(1) & 0xff)*256;
}

function processMesh(request,material) {
	var vertexShift = verts.length;
	var lines = request.responseText.split("\n");
	for (var i = 0; i < lines.length; i++) {
		lines[i] = lines[i].split(" ");
	}
	for (var i = 0; i < lines.length; i++) {
		var line = lines[i];
		if (line[0] == "v") {
			verts.push([line[1],line[2],line[3]]);
			mats.push(material);
		}
		if (line[0] == "f") {
			faces.push([verts[line[1]-1+vertexShift],verts[line[2]-1+vertexShift],verts[line[3]-1+vertexShift]]);
			facein.push([line[1]-1 + vertexShift,line[2]-1 + vertexShift,line[3]-1 + vertexShift]);
		}
	}
}

var WAITING = 0;

function retrieveMesh(url,material) {
	WAITING++;
	var r = new XMLHttpRequest();
	r.open("GET",url,true);
	r.overrideMimeType('text/plain; charset=x-user-defined');
	r.onreadystatechange = function() {
		if (r.readyState == 4) {
			WAITING--;
			binaryMesh(r,material);
			if (WAITING == 0) {
				centerModel();
				generate();
			}
		}
	}
	r.send();
}


function generateNormals() {
	for (var i = 0; i < verts.length; i++) {
		usedBy[i] = [];
	}
	for (var i = 0; i < faces.length; i++) {
		usedBy[facein[i][0]].push(i);
		usedBy[facein[i][1]].push(i);
		usedBy[facein[i][2]].push(i);
		triNorm[i] = matrix.triangleNormal(faces[i][0],faces[i][1],faces[i][2]);
	}
	for (var i = 0; i < faces.length; i++) {
		cornerNorm[i] = [[0,0,0],[0,0,0],[0,0,0]];
		for (var j = 0; j < 3; j++) { // j indexes the corner
			var involved = usedBy[facein[i][j]];
			var count = 0;
			var myNorm = triNorm[i];
			var resNorm = [0,0,0];
			for (var k = 0; k < involved.length; k++) {
				var thatTriangle = involved[k];
				var thatNormal = triNorm[thatTriangle];
				var dotted = matrix.dot(thatNormal,myNorm);
				if (dotted > 0.9) {
					count++;
					resNorm[0] += thatNormal[0];
					resNorm[1] += thatNormal[1];
					resNorm[2] += thatNormal[2];
				}
				if (dotted < -0.9) {
					count++;
					resNorm[0] -= thatNormal[0];
					resNorm[1] -= thatNormal[1];
					resNorm[2] -= thatNormal[2];
				}
			}
			resNorm[0] /= count;
			resNorm[1] /= count;
			resNorm[2] /= count;
			cornerNorm[i][j] = resNorm;
		}
	}
}

var VERTICES;

function generate() {
	generateNormals();
	var r = [];
	VERTICES = r;
	for (var i = 0; i < faces.length; i++) {
		r.push(faces[i][0]);
		r.push(faces[i][1]);
		r.push(faces[i][2]);
		matFinal.push(mats[facein[i][0]]);
		matFinal.push(mats[facein[i][1]]);
		matFinal.push(mats[facein[i][2]]);
		texs.push();
		var n = matrix.triangleNormal(faces[i][0],faces[i][1],faces[i][2]);
		norms.push(cornerNorm[i][0]);
		norms.push(cornerNorm[i][1]);
		norms.push(cornerNorm[i][2]);
		//norms.push(n);
		//norms.push(n);
	}
	for (var i = 0; i < matFinal.length; i++) {
		texs[i] = valFor(matFinal[i]);
		switch (matFinal[i]) {
			case 0:
				matFinal[i] = [0,0,0];
				break;
			case 1:
				matFinal[i] = [1/3,0,0];
				break;
			case 2:
				matFinal[i] = [0,1/3,0];
				break;
			case 3:
				matFinal[i] = [1/3,1/3,0];
				break;
			case 4:
				matFinal[i] = [2/3,0,0];
				break;
		}
	}


	begin();
}


retrieveMesh("/render/aluminum.boj",0);
retrieveMesh("/render/yellow.boj",1);
retrieveMesh("/render/black.boj",2);
retrieveMesh("/render/white.boj",3);
retrieveMesh("/render/blue.boj",4);
//retrieveMesh("/render/elec.boj",1);




var texs = [];

var matFinal = [];

var metalTex = [];
var blackTex = [];
var yellowTex = [];

/*
metal
10,0.1,9.0,0.07
black
40,0.1,9,0.1
yellow
100, 0.0, 20.0, 0.0

*/

function valFor(c) {
	switch(c) {
		case 0:
		return [10,0.1,9,0.07];
		case 1:
		return [100,0,20,0]
		case 2:
		case 3:
		case 4:
		return [40,0.1,9,0.1]
	}
}



var t = 0;

var mousex = 0;
var mousey = 0;
var mousedown = false;

var dx = 85;
var dy = -35;

var vx = 0;
var vy = 0;


function move(e) {
	var nmousex = 300 - e.clientX;
	var nmousey = 300 - e.clientY;
	if (mousedown) {
		var rx = mousex - nmousex;
		var ry = mousey - nmousey;
		vx = 0.7 * vx + 0.3 * rx;
		vy = 0.7 * vy + 0.3 * ry;
		dx -= rx;
		dy -= ry;
	}
	mousex = nmousex;
	mousey = nmousey;
}
document.onmousemove = move;
document.ontouchmove = function(t) {
	if (t && t.touches && t.touches[0])
		move(t.touches[0]);
	if (mousedown)
		t.preventDefault();
}

var rotating = true;

function mouseDown() {
	mousedown = true;
	rotating = false;
}
canvas.onclick = function() {};

canvas.ontouchstart = function(e) {
	if (e && e.touches && e.touches[0]) {
		move(e.touches[0]);
	}
	mousedown = true;
	e.preventDefault()
}
canvas.ontouchcancel = canvas.ontouchend = function(e) {
	if (mousedown)
		e.preventDefault()
	mousedown = false;
}

canvas.onmousedown = mouseDown;
function mouseUp() {
	mousedown = false;
}
document.onmouseup = mouseUp;

res = null;


var zoomAmt = 0.7;

function loop() {
	var fog = 0;//Math.sin( (new Date()).getTime() / 1000.0 );
	if (!mousedown) {
		dx -= vx;
		dy -= vy;
	}
	vx *= 0.9;
	vy *= 0.9;
	dx = (dx + Math.PI * 2 * 100) % ( Math.PI * 2 * 100);
	if (rotating) {
		dx+=0.25;
	}
	dy = Math.min(50, Math.max(-160,dy));
	t += 0.01;
	var r = matrix.identity(4);
	r = matrix.mul(r, matrix.rotateY(dx / 100));
	r = matrix.mul(r, matrix.rotateX(dy / 100));
	res = r;
	gl.uniformFloat("zoom",zoomAmt);
	gl.uniformMat4("rots",r);
	gl.uniformMat4("rotsi",matrix.invert4(r));
	gl.uniformFloat("fog",fog);
	gl.triangleList("pos");
	requestAnimationFrame(loop,canvas);
}

var gtex;
var texloaded = false;
var gl;
function begin() {
	if (!texloaded) {
		setTimeout(begin,10);
		return;
	}
	gl = pleasantry(canvas);
	gl.vertexSource(vertex.innerHTML);
	gl.fragmentSource(fragment.innerHTML);
	gl.attributes(["pos","norm","matPos","textureProp"]);
	gl.staticAttribute("pos",VERTICES);
	gl.staticAttribute("norm",norms);
	gl.staticAttribute("matPos",matFinal);
	gl.staticAttribute("textureProp",texs);
	gtex = gl.createTexture(tex,0,"material");
	loop();
}
    
var retina = window.devicePixelRatio > 1;

window.mobilecheck = function() {
var check = false;
(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
return check; }
    
if (retina && !window.mobilecheck()) {
    canvas.width = "1200";
    canvas.height = "1200";
    canvas.style.width = "600px";
    canvas.style.height = "600px";
} else if (window.mobilecheck()){
    canvas.width = "300";
    canvas.height = "300";
    canvas.style.width = "600px";
    canvas.style.height = "600px";
} else {
    canvas.width = "600";
    canvas.height = "600";
    canvas.style.width = "600px";
    canvas.style.height = "600px";
}
    
var tex = new Image();
tex.src = "/render/combination.png";
//tex.src = "http://www.adambots.com/wp-content/uploads/2014/03/Swatch.png";



tex.onload = function(){texloaded = true;};