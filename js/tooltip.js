if(document.layers)location.href="antinetscape.html";

function getMouseXY(e){
	if(document.all){
		mouseX=event.clientX+document.body.scrollLeft;
		mouseY=event.clientY+document.body.scrollTop
	}else{
		mouseX = e.pageX
		mouseY = e.pageY
	}
	// catch possible negative values in NS4
	if (mouseX < 0){mouseX = 0}
	if (mouseY < 0){mouseY = 0}  
}

mouseSpace=10;
mouseX=0;
mouseY=0;
if(!document.all)document.captureEvents(Event.MOUSEMOVE);
document.onmousemove=getMouseXY;

function showHide(a,b){
	if(document.getElementById){
		document.getElementById(a).style.visibility=b;
	}else if(document.all){
		document.all[a].style.visibility=b;
	}else if(document.layers){
		document.layers[a].visibility=b;
	}
}

function moveTo(a,b,c){
	if(document.getElementById){
		document.getElementById(a).style.left=b;
		document.getElementById(a).style.top=c;
	}else if(document.all){
		document.all[a].style.left=b;
		document.all[a].style.top=c;
	}else if(document.layers){
		document.layers[a].left=b;
		document.layers[a].top=c;
	}
}

function tip(obj,status) {
	var x=mouseX+mouseSpace;
	var y=mouseY+mouseSpace;
	obj=obj.split("¶");obj=obj.join("'");
  	status=(status==1)?"visible":"hidden";
	showHide(obj,status);
	moveTo(obj,x,y);
}

function s(q,i){
	p=q.split("'");p=p.join("¶");
	document.write('<a href=personaggi.php?id='+i+' onmouseover=\'tip("'+p+'",1)\' onmouseout=\'tip("'+p+'",0)\'>'+q+'</a>');
}

function topmenu(id,status){
	var imgId="sess"+id;
	var layerId="layer"+id;
	if(!document.layers){
		var x = document.images[imgId].offsetLeft+199;
		var y = document.images[imgId].offsetTop+58;
  	}else{
		var x = document.images[imgId].x+199;
		var y = document.images[imgId].y+58;
	}
	status=(status==1)?"visible":"hidden";
	showHide(layerId,status);
	moveTo(layerId,x,y);
}

