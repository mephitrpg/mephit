function vcontrol_add_observe(a){
	a.observe(
		"click",vcontrol_add_click
	).observe(
		"mouseenter",vcontrol_add_mouseenter
	).observe(
		"mouseleave",vcontrol_add_mouseleave
	);
}

function vcontrol_del_observe(a){
	a.observe(
		"click",vcontrol_del_click
	).observe(
		"mouseenter",vcontrol_del_mouseenter
	).observe(
		"mouseleave",vcontrol_del_mouseleave
	);
}

function vcontrol_add_mouseenter(e){
	var element=e.element();
	var index=element.previousSiblings().length/2;
	var mapblock=element.up(".mapblock");
	var arr=mapblock.select(".row"+index);
	if(arr.length==0){
		var classToAdd="addBottom";
		arr=mapblock.select(".row"+(index-1));
	}else{
		var classToAdd="addTop";
	}
	arr.each(function(img){
		img.addClassName(classToAdd);
	});
}

function vcontrol_add_mouseleave(e){
	var element=e.element();
	var mapblock=element.up(".mapblock");
	mapblock.select(".addTop").each(function(img){img.removeClassName("addTop")});
	mapblock.select(".addBottom").each(function(img){img.removeClassName("addBottom")});
}

function vcontrol_del_mouseenter(e){
	var element=e.element();
	var index=Math.floor(element.previousSiblings().length/2);
	element.up(".mapblock").select(".row"+index).each(function(img){
		img.up(".mapcell").addClassName("delCell");
	});
}

function vcontrol_del_mouseleave(e){
	var element=e.element();
	element.up(".mapblock").select(".delCell").each(function(img){img.removeClassName("delCell")});
}

function vcontrol_add_click(e){
	var element=e.element();
	var element_index=element.previousSiblings().length;
	var index=element_index/2;
	var mapblock=element.up(".mapblock");
	var mapgrid=mapblock.down(".mapgrid");
	var rows=mapgrid.select(".row");
	var l=rows[0].childElements().length;
	var row=new Element("div",{className:"row"});
	
	if(index==0){	var where=index;	var position="before";	}
	else		{	var where=index-1;	var position="after";	}
	
	for(var i=0;i<l;i++){
		row.insert(newMapCell({
			adventure_id:adventure_id,
			user_id:user_id,
			map_id:"",filename:"",
			col:i,row:index
		}));
	}
	
	var ins={};ins[position]=row;
	rows[where].insert(ins);
	
	var rows=mapgrid.select(".row");
	for(var r=where;r<rows.length;r++){
		var imgs=rows[r].select("img");
//		rows[r].setWidth(104*imgs.length);
		for(var c=0;c<imgs.length;c++){
			imgs[c].className="row"+r+" col"+c;
		}
	}
	
	var control_blocks=mapblock.select(".vcontrol");
	if(index==0){	var element_position="after";	}
	else		{	var element_position="before";	}
	for(var i=0;i<control_blocks.length;i++){
		var add=new Element("a",{className:"add",href:"javascript:;"}).update('+');
		var del=new Element("a",{className:"del",href:"javascript:;"}).update('-');
		var ins1={};ins1[element_position]=add;
		var ins2={};ins2[element_position]=del;
		control_blocks[i].select("a")[element_index].insert(ins1).insert(ins2);
		vcontrol_add_observe(add);
		vcontrol_del_observe(del);
	}
}

function vcontrol_del_click(e){
	var element=e.element();
	var element_index=element.previousSiblings().length;
	var index=Math.floor(element_index/2);
	var mapblock=element.up(".mapblock");
	var mapgrid=mapblock.down(".mapgrid");
	var rows=mapgrid.select(".row");
	var piuDiUno=rows.length>1;
	if(piuDiUno){
		rows[index].select("a").each(function(a){
			a.stopObserving("click").stopObserving("mouseenter").stopObserving("mouseleave");
		});
		rows[index].remove();
		var rows=mapgrid.select(".row");
		for(var r=index;r<rows.length;r++){
			var imgs=rows[r].select("img");
			for(var c=0;c<imgs.length;c++){
				imgs[c].className="row"+r+" col"+c;
			}
		}
		
		var control_blocks=mapblock.select(".vcontrol");
		for(var i=0;i<control_blocks.length;i++){
			var del=control_blocks[i].select("a")[element_index];
			var add=index==0?del.next():del.previous();
			del.stopObserving("click").stopObserving("mouseenter").stopObserving("mouseleave").remove();
			add.stopObserving("click").stopObserving("mouseenter").stopObserving("mouseleave").remove();
		}
		
	}
}