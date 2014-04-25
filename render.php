<?php
/*
Template Name: Robot Render
*/
?>

<?php get_header(); ?>

<div class="pagewidth">
	<div id="pagetype" style="background-color:#0166B3;">
		<div style="font-size:1.5em;line-height:40px;color:white;">
			<em>FIRST</em>
			<span style="vertical-align:baseline;font-size:50%;line-height:50%;"><em>For Inspiration and Recognition of Science and Technology</em></span>
		</div>
		<div class="background">
			<img src="<?php bloginfo('template_directory'); ?>/res/img/firstmono.png" height="60" alt="FIRST logo">
		</div>

		<?php dynamic_sidebar('FIRST Submenu') ?>

	</div>
</div>
<div id="content" class="pagewidth">

	<?php the_post(); the_content(); ?>
	
</div>

<script src="/render/pleasant.js"></script>
<script src="/render/matrices.js"></script>
<script type="text/shader" id="fragment">
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
	vec3 scaler = abs(noise(position / scratchScale)) * scratchStrength + vec3(1.0,1.0,1.0);
	vec3 snormal = (rots * vec4(normal,0.0)).xyz + noise(position / noiseScale *  scaler) * noiseStrength;

	if (snormal.z < 0.0) {
		discard;
	}

	float tx = snormal.x;
	float ty = snormal.y;
	float m = max(1.0, sqrt(tx*tx + ty*ty));
	tx /= m;
	ty /= m;
	tx = (tx * 0.96 + 1.0) / 2.0;
	ty = (ty * 0.96 + 1.0) / 2.0;
	vec3 col = texture2D(material,vec2(tx,ty)/3.0 + matOffset).rgb;
	gl_FragColor = vec4(col,1.0);
}

</script>
<script type="text/shader" id="vertex">
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
uniform float fog;

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
	gl_Position = vec4(tpos.x / 1000.0 * zoom, tpos.y / 1000.0 * zoom, tpos.z / 2000.0 + fog, tpos.z / 5000.0 + 0.6);
}
</script>
<script src="<?php bloginfo('template_directory'); ?>/js/runrender.js"></script>

<?php get_footer(); ?>