<?php
/*
Template Name: Robot Render
*/

//Add stylesheets to this page
global $add_style;
$add_style = array();

//Add scripts to this page
global $add_script;
$add_script = array();

?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="page_shadowline"></div>
		<div class="pagewidth">
			<div id="pagetype" style="background-color:#0166B3;">

				<div style="font-size:1.5em;line-height:40px;">
					<em>FIRST</em>
				<span style="font-size:16px;"><em>For Inspiration and Recognition of Science and Technology</em></span>
				</div><!--
				<h2 style="padding:0;color:#FFF;height:40px;">
					<em>FIRST</em> <span style="font-size:16px">For Inspiration and Recognition of Science and Technology</span>
				</h2>-->
				<div class="background"><img src="http://adambots.com/logos/png/yellowBG_small.png" height="60" alt="AdamBots Team 245"></div>
				<?php dynamic_sidebar('FIRST Submenu') ?>
			</div>
			<div class="twocolumns">
				<?php 
					$edit_attr = array(
						'alt' => get_the_title(),
						'title' => '',
						'class' => 'floatright'
						);
					$post_image = get_the_post_thumbnail($post->ID,'pristine-custom-image-medium1', $edit_attr);					
				?>
				<?php
					if(!empty($post_image)) {
				 		echo $post_image;
					}
				?>
				<?php the_content(); ?>
				<?php endwhile; ?>
					<!-- post navigation -->
				<?php else: ?>
					<!-- no posts found -->
				<?php endif; ?>
			</div>
		</div>
	</div>



<script src="/render/pleasant.js"></script>
<script type="shader" id="fragment">

precision mediump float;
uniform mat4 rots;
uniform mat4 rotsi;
varying vec3 normal;
varying vec3 position;

varying vec2 matOffset;

varying float scratchScale;
varying float scratchStrength;
varying float noiseScale;
varying float noiseStrength;

uniform sampler2D material;

float randf(vec3 p) {
	return fract(abs(cos(p.x * 981.21312 + p.y * 45.4234231 + p.z * 13.1113131) * 1000.0));
}

vec3 rand3(vec3 p) {
	return vec3(randf(p),randf(p+vec3(0.5,0.0,0.0)),randf(p-vec3(0.5,0.0,0.0))) * 2.0 - 1.0;
}

vec3 noise(vec3 p) {
	vec3 c = floor(p);
	vec3 vAAA = rand3(c + vec3(0.0,0.0,0.0));
	vec3 vAAB = rand3(c + vec3(0.0,0.0,1.0));
	vec3 vABA = rand3(c + vec3(0.0,1.0,0.0));
	vec3 vABB = rand3(c + vec3(0.0,1.0,1.0));
	vec3 vBAA = rand3(c + vec3(1.0,0.0,0.0));
	vec3 vBAB = rand3(c + vec3(1.0,0.0,1.0));
	vec3 vBBA = rand3(c + vec3(1.0,1.0,0.0));
	vec3 vBBB = rand3(c + vec3(1.0,1.0,1.0));
	float qx = fract(p.x);
	float qy = fract(p.y);
	float qz = fract(p.z);
	vec3 vAA = mix(vAAA,vAAB,qz);
	vec3 vAB = mix(vABA,vABB,qz);
	vec3 vBA = mix(vBAA,vBAB,qz);
	vec3 vBB = mix(vBBA,vBBB,qz);
	vec3 vA = mix(vAA,vAB,qy);
	vec3 vB = mix(vBA,vBB,qy);
	return mix(vA,vB,qx);
}

vec3 brownian(vec3 p) {
	return (noise(p * 2.0) / 6.0 + noise(p*3.0) / 3.0 + noise(p * 2.0) / 6.0);
}

vec3 cut(vec4 p) {
	return vec3(p.x,p.y,p.z);
}


vec3 illuminationMetal(vec3 lightDir) {
	vec3 view_dir = cut(rotsi * vec4(0.0,0.0,1.0,0.0));
	vec3 r = brownian(position);
	vec3 bumpedNormal = normal + r * 0.125;
	float lambert = 0.5 * pow(max(0.0,dot(bumpedNormal + r * 0.45,lightDir)),0.8);
	vec3 reflected = reflect(lightDir, normal);
	float specular = max(0.0, -dot(reflected,view_dir) * step(0.0,dot(lightDir, bumpedNormal)) );
	float shimmer = pow(specular * noise(position * 2.0).x,3.0);
	specular = pow(specular, 10.0) / 3.0;
	return lambert * vec3(0.95,0.95,1.0) + (specular + shimmer) * vec3(1.0,1.0,1.0);
}

vec3 illuminationPlastic(vec3 lightDir) {
	vec3 view_dir = cut(rotsi * vec4(0.0,0.0,1.0,0.0));
	float lambert = 0.5 * pow(max(0.0,dot(normal,lightDir)),0.8);
	vec3 reflected = reflect(lightDir, normal);
	float specular = max(0.0, -dot(reflected,view_dir) * step(0.0,dot(lightDir, normal)) );
	specular = pow(specular, 100.0) * 3.0;
	return lambert * vec3(1.0,0.81,0.038) * 1.7 + specular * vec3(1.0,1.0,1.0);
}

vec3 illuminationRubber(vec3 lightDir) { // needs work
	vec3 view_dir = cut(rotsi * vec4(0.0,0.0,1.0,0.0));
	float lambert = pow(max(0.0,dot(normal,lightDir) - 0.3),2.0) + 0.02;
	vec3 reflected = reflect(lightDir, normal);
	float specular = max(0.0, -dot(reflected,view_dir) * step(0.0,dot(lightDir, normal)) );
	specular = pow(specular, 100.0) / 2.0;
	return lambert * vec3(0.3,0.3,0.3) + specular * vec3(1.0,1.0,1.0);
}

vec3 illuminationBands(vec3 lightDir) { // needs work
	vec3 view_dir = cut(rotsi * vec4(0.0,0.0,1.0,0.0));
	float lambert = pow(max(0.0,dot(normal,lightDir)),2.0);
	return lambert * vec3(1.5,1.0,0.5);
}

// black: 9, 13
// yellow 4, 10
/*
metal
10,0.1,9.0,0.07
black
40,0.1,9,0.1
yellow
100, 0.0, 20.0, 0.0

*/



void main(void) {
	//float scratchScale = 10.0;
	//float scratchStrength = 0.1;
	//float noiseScale = 9.0;
	//float noiseStrength = 0.07;

	vec3 scaler = abs(noise(position / scratchScale)) * scratchStrength + vec3(1.0,1.0,1.0);
	vec3 snormal = (rots * vec4(normal,0.0)).xyz + noise(position / noiseScale *  scaler) * noiseStrength;
	float tx = snormal.x;
	float ty = snormal.y;
	float m = max(1.0, sqrt(tx*tx + ty*ty));
	tx /= m;
	ty /= m;
	tx = (tx * 0.96 + 1.0) / 2.0;
	ty = (ty * 0.96 + 1.0) / 2.0;
	vec3 col = texture2D(material,vec2(tx,ty)/2.0 + matOffset).rgb;
	gl_FragColor = vec4(col,1.0);
}

</script>
<script type="shader" id="vertex">

uniform float zoom;

precision mediump float;
attribute vec3 pos;

attribute vec3 norm;

varying vec3 normal;
varying vec3 position;

varying float scratchScale;
varying float scratchStrength;
varying float noiseScale;
varying float noiseStrength;

varying vec2 matOffset;
attribute vec3 matPos;

attribute vec4 textureProp;

uniform mat4 rots;

void main(void) {
	//Somewhere add in perspective
	scratchScale = textureProp.r;
	scratchStrength = textureProp.g;
	noiseScale = textureProp.b;
	noiseStrength = textureProp.a;
	matOffset = matPos.xy;
	normal = norm;
	vec4 tpos = rots * vec4(pos,1.0);
	position = pos;

	gl_Position = vec4(tpos.x / 1000.0 * zoom, tpos.y / 1000.0 * zoom, tpos.z / 2000.0, tpos.z / 5000.0 + 0.6);
}

</script>
<script src="/render/matrices.js"></script>
<script>

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

function generate() {
	generateNormals();
	var r = [];
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
				matFinal[i] = [0.5,0,0];
				break;
			case 2:
				matFinal[i] = [0,0.5,0];
				break;
				case 3:
				matFinal[i] = [0.5,0.5,0];
				break;
		}
	}
	gl.staticAttribute("pos",r);
	gl.staticAttribute("norm",norms);
	gl.staticAttribute("matPos",matFinal);
	gl.staticAttribute("textureProp",texs);

	begin();
}

/*retrieveMesh("/render/aluminumMesh.obj",0);
retrieveMesh("/render/shooterMesh.obj",1);
retrieveMesh("/render/blackMesh.obj",2);*/
retrieveMesh("/render/aluminum.boj",0);
retrieveMesh("/render/yellow.boj",1);
retrieveMesh("/render/black.boj",2);
retrieveMesh("/render/white.boj",3);




var texs = [];


var gl = pleasantry(canvas);
gl.vertexSource(vertex.innerHTML);
gl.fragmentSource(fragment.innerHTML);
gl.attributes(["pos","norm","matPos","textureProp"]);

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

function mouseDown() {
	mousedown = true;
}
canvas.onclick = function() {};

canvas.ontouchstart = function(e) {
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
	if (!mousedown) {
		dx -= vx;
		dy -= vy;
	}
	vx *= 0.9;
	vy *= 0.9;
	dx = (dx + Math.PI * 2 * 100) % ( Math.PI * 2 * 100)
	dy = Math.min(50, Math.max(-160,dy));
	t += 0.01;
	var r = matrix.identity(4);
	r = matrix.mul(r, matrix.rotateY(dx / 100));
	r = matrix.mul(r, matrix.rotateX(dy / 100));
	res = r;
	gl.uniformFloat("zoom",zoomAmt);
	gl.uniformMat4("rots",r);
	gl.uniformMat4("rotsi",matrix.invert4(r));
	gl.triangleList("pos");
}

var gtex;
var texloaded = false;
function begin() {
	if (!texloaded) {
		setTimeout(begin,10);
		return;
	}
	gtex = gl.createTexture(tex,0,"material");
	setInterval(loop,20);
}
var tex = new Image();
tex.src = "/render/combination.png";
//tex.src = "http://www.adambots.com/wp-content/uploads/2014/03/Swatch.png";



tex.onload = function(){texloaded = true;};
</script>








<?php get_footer(); ?>
