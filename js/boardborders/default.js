var cside=19;//pixels
var vision=12;//squares
var rayCastingPrecision=5;//decimi di grado//lower is more precise
var screenGap=0.5;//pixels
var gridLineWidth=1;//pixels
var wallLineWidth=4;//pixels

var map_width=0,map_height=0,canvas_width=0,canvas_height=0;
var cside_half=Math.ceil(cside/2);
var origin,ending,sight,sight_cw;
var tan={};
var sin={};
var cos={};
for(var i=0;i<3600;i+=rayCastingPrecision){
	var a=i/10;
	var rad=deg2rad(a);
	tan[a]=Math.tan(rad);
	sin[a]=Math.sin(rad);
	cos[a]=Math.cos(rad);
}

var ctx,canvas,buffer,buffer_ctx;

function muovi(x,y){
	
	document.getElementById('pgposx').innerHTML=x;
	document.getElementById('pgposy').innerHTML=y;
	
	// calcolo l'origine e la fine
	
	origin={x:x-vision,y:y-vision}
	ending={x:x+vision,y:y+vision}
	
	// preparo canvas nascosto
	
	buffer=document.createElement("canvas");
	buffer.width=canvas_width;
	buffer.height=canvas_height;
	buffer_ctx=buffer.getContext("2d");
	
	// disegno il background
	
	buffer_ctx.fillStyle = "rgb(0,0,0)";
	buffer_ctx.fillRect(0,0,canvas_width,canvas_height);
	
	// sposto il PG
	
	PG.x=x;PG.y=y;
	
	// casto i raggi
	
	castRaysFrom(PG.x,PG.y);
	
	// disegno la griglia
	
	(function(){
		buffer_ctx.strokeStyle = "rgb(96,96,96)";
		buffer_ctx.beginPath();
		buffer_ctx.lineWidth=gridLineWidth;
		for(var x=0;x<canvas_width;x+=cside){
			buffer_ctx.moveTo(x+screenGap,0+screenGap);
			buffer_ctx.lineTo(x+screenGap,canvas_height+screenGap);
		}
		for(var y=0;y<canvas_height;y+=cside){
			buffer_ctx.moveTo(0+screenGap,y+screenGap);
			buffer_ctx.lineTo(canvas_width+screenGap,y+screenGap);
		}
		buffer_ctx.stroke();
	})();
	
	// disegno il pg
	
	buffer_ctx.fillStyle = "rgb(255,255,255)";
	buffer_ctx.fillRect(vision*cside+2,vision*cside+2,cside-3,cside-3) 
		
	// stampo a video
	
	ctx.drawImage(buffer,0,0);
}

function initMap(){
	canvas=document.getElementById('c');
	if(canvas.getContext){
		map_width=map.length;
		canvas_width=(vision*2+1)*cside;
		canvas.width=canvas_width;
		map_height=map[0].length;
		canvas_height=(vision*2+1)*cside;
		canvas.height=canvas_height;
		ctx = canvas.getContext('2d');
	}
	muovi(PG.x,PG.y);
}