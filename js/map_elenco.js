function newMapCell(o){
	// o.adventure_id
	// o.map_id
	// o.user_id
	// o.filename
	// o.col
	// o.row
	
	if(o.filename=="")var src="images/mapcell_empty.jpg";
	else var src="include/phpThumb/phpThumb.php?src=/public/users/"+o.user_id+"/map/"+o.filename+"&amp;w=100&amp;h=100&amp;far=1&amp;bg=ffffff";
	
	var div=new Element("div",{
		className:"col mapcell"
	});
	/*
	var a=new Element("a",{
		href:"?id="+o.adventure_id+"&what=map&item="+o.map_id
	});
	*/
	var img=new Element("img",{
		id:o.map_id,
		src:src,
		className:"col"+o.col+" row"+o.row
	});
	return div.insert(/*a.insert(*/img/*)*/);
}

document.observe("dom:loaded",function(){
	$$(".hcontrol .add").each(hcontrol_add_observe);
	$$(".vcontrol .add").each(vcontrol_add_observe);
	$$(".hcontrol .del").each(hcontrol_del_observe);
	$$(".vcontrol .del").each(vcontrol_del_observe);
});

function aggiungiLuogo(){
	$("aggiungiLuogo").show();
	$("addluogo-name").focus();
}

function annullaAggiungiLuogo(){
	$("aggiungiLuogo").hide();
	$("addluogo-name").value="";
}

function salvaGruppo(id_avventura,id_gruppo,id_luogo){
	var lastId=0;
	var rows=$$("#mapgrid-"+id_gruppo+" .row");
	var FORM=new Element("form",{
		action:"avventura_save.php",
		method:"post"
	}).insert(new Element("input",{
		name:"id",
		value:id_avventura
	})).insert(new Element("input",{
		name:"what",
		value:"map"
	})).insert(new Element("input",{
		name:"act",
		value:"updategruppoluogo"
	})).insert(new Element("input",{
		name:"gruppo",
		value:id_gruppo
	})).insert(new Element("input",{
		name:"luogo",
		value:id_luogo
	}));
	
	var width=rows[0].select("img").length;
	var height=rows.length;
	
	FORM.insert(new Element("input",{
		name:"width",
		value:width
	})).insert(new Element("input",{
		name:"height",
		value:height
	}));
	
	for(var y=0;y<height;y++){
		var cols=rows[y].select("img");
		for(var x=0;x<width;x++){
			var id=cols[x].readAttribute("id");
			if(id==""){
				id=0;
				while(id<=lastId)id=new Date().getTime();
				lastId=id;
			}else{
				console.log(id)
				id=id.match(/\d+/)[0];
			}
			FORM.insert(new Element("input",{
				name:"arr["+x+"]["+y+"]",
				value:id
			}));
		}
	}
//	console.log(FORM)
	$$("BODY")[0].insert(FORM);
	FORM.submit();
}

function eliminaGruppo(id){
	if(confirm('Eiminare "'+$("group-"+id+"-title").innerHTML+'"?')){
		$("delluogo-id").value=id;
		$("delluogo-form").submit();
	}
}

function observeLuoghi(event){
	var element=event.element();
	switch(element.className){
		case"del":
			event.stop();
			var id=element.id.split("-")[2];
			if(confirm(lang_delete+" "+$("luogo-name-"+id).innerHTML+"?")){
				$("delluogo-id").value=id;
				$("delluogo-form").submit();
			}
		break;
		case"edit":
			event.stop();
			var id=element.id.split("-")[2];
			var n=prompt(lang_edit,$("luogo-name-"+id).innerHTML);
			if(typeof n==="string"&&n!==""){
				$("editluogo-id").value=id;
				$("editluogo-name").value=n;
				$("editluogo-form").submit();
			}
		break;
	}
}
document.observe("dom:loaded",function(){
	$("luoghi").observe("click",observeLuoghi);
});
