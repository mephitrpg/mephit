function hcontrol_add_observe(a){
	a.observe(
		"click",hcontrol_add_click
	).observe(
		"mouseenter",hcontrol_add_mouseenter
	).observe(
		"mouseleave",hcontrol_add_mouseleave
	);
}

function hcontrol_del_observe(a){
	a.observe(
		"click",hcontrol_del_click
	).observe(
		"mouseenter",hcontrol_del_mouseenter
	).observe(
		"mouseleave",hcontrol_del_mouseleave
	);
}

function hcontrol_add_mouseenter(e){
	var element=e.element();
	var index=element.previousSiblings().length/2;
	var mapblock=element.up(".mapblock");
	var arr=mapblock.select(".col"+index);
	if(arr.length==0){
		var classToAdd="addRight";
		arr=mapblock.select(".col"+(index-1));
	}else{
		var classToAdd="addLeft";
	}
	arr.each(function(img){
		img.addClassName(classToAdd);
	});
}

function hcontrol_add_mouseleave(e){
	var element=e.element();
	var mapblock=element.up(".mapblock");
	mapblock.select(".addLeft").each(function(img){img.removeClassName("addLeft")});
	mapblock.select(".addRight").each(function(img){img.removeClassName("addRight")});
}

function hcontrol_del_mouseenter(e){
	var element=e.element();
	var index=Math.floor(element.previousSiblings().length/2);
	element.up(".mapblock").select(".col"+index).each(function(img){
		img.up(".mapcell").addClassName("delCell");
	});
}

function hcontrol_del_mouseleave(e){
	var element=e.element();
	element.up(".mapblock").select(".delCell").each(function(img){img.removeClassName("delCell")});
}

function hcontrol_add_click(e){
	var element=e.element();
	var element_index=element.previousSiblings().length;
	var index=element_index/2;
	var mapblock=element.up(".mapblock");
	var mapgrid=mapblock.down(".mapgrid");
	var rows=mapgrid.select(".row");
	for(var i=0;i<rows.length;i++){
		if(index==0){	var where=index;	var position="before";	}
		else		{	var where=index-1;	var position="after";	}
		var ins={};ins[position]=newMapCell({
			adventure_id:adventure_id,
			user_id:user_id,
			map_id:"",filename:"",
			col:index,row:i
		});
		rows[i].select(".mapcell")[where].insert(ins);
	}
	for(var r=0;r<rows.length;r++){
		var imgs=rows[r].select("img");
		if(r==0)mapgrid.style.width=108*imgs.length+"px";
		for(var c=where;c<imgs.length;c++){
			imgs[c].className="row"+r+" col"+c;
		}
	}	
	var control_blocks=mapblock.select(".hcontrol");
	if(index==0){	var element_position="after";	}
	else		{	var element_position="before";	}
	for(var i=0;i<control_blocks.length;i++){
		var add=new Element("a",{className:"add",href:"javascript:;"}).update('+');
		var del=new Element("a",{className:"del",href:"javascript:;"}).update('-');
		var ins1={};ins1[element_position]=add;
		var ins2={};ins2[element_position]=del;
		control_blocks[i].select("a")[element_index].insert(ins1).insert(ins2);
		hcontrol_add_observe(add);
		hcontrol_del_observe(del);
	}
	resetMapgridsWidth(mapgrid);
}

function hcontrol_del_click(e){
	var element=e.element();
	var element_index=element.previousSiblings().length;
	var index=Math.floor(element_index/2);
	var mapblock=element.up(".mapblock");
	var mapgrid=mapblock.down(".mapgrid");
	var rows=mapgrid.select(".row");
	var piuDiUno=false;
	for(var i=0;i<rows.length;i++){
		var mapcells=rows[i].select(".mapcell");
		piuDiUno=mapcells.length>1;
		if(piuDiUno){
			var mapcell=mapcells[index];
			var a=mapcell.down("a");
			if(a)a.stopObserving("click").stopObserving("mouseenter").stopObserving("mouseleave");
			mapcell.remove();
		}else{
			break;
		}
	}
	if(piuDiUno){
		for(var r=0;r<rows.length;r++){
			var imgs=rows[r].select("img");
			if(r==0)mapgrid.style.width=108*imgs.length+"px";
			for(var c=index;c<imgs.length;c++){
				imgs[c].className="row"+r+" col"+c;
			}
		}
		var control_blocks=mapblock.select(".hcontrol");
		for(var i=0;i<control_blocks.length;i++){
			var del=control_blocks[i].select("a")[element_index];
			var add=index==0?del.next():del.previous();
			del.stopObserving("click").stopObserving("mouseenter").stopObserving("mouseleave").remove();
			add.stopObserving("click").stopObserving("mouseenter").stopObserving("mouseleave").remove();
		}
	}
	resetMapgridsWidth(mapgrid);
}

function resetMapgridsWidth(mapgrid){
	
}
