var map_width=0,map_height=0,canvas_width=0,canvas_height=0,PG={x:0,y:0};
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
Event.observe(window,"load",function(){
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
	PG={x:Math.floor(map_width/2),y:Math.floor(map_height/2)}
});