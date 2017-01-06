Array.prototype.search = function (a){
	for(var i in this)if(this[i]==a)return i;
	return false;
}
function byId(q){
	if(arguments.length==1){
		if(document.getElementById)return document.getElementById(q);
		else if(document.all)return document.all[q];
	}else if(arguments.length==2){
		return eval("document."+((document.all)?"all['"+q+"']":"getElementById('"+q+"')")+"."+arguments[1]);
	}else{
		var quote=(String(arguments[2]).substring(0,8)=="function")?"":"'";
		eval("document."+((document.all)?"all['"+q+"']":"getElementById('"+q+"')")+"."+arguments[1]+"="+quote+arguments[2]+quote);
	}
}

function avoidEnter(e){
	var KeyID = (window.event) ? event.keyCode : e.keyCode;
	if(KeyID==13)e.stop();
};

var oglSource;

function navGo(a){
	var d=document;
	var q="index.php";
	var id_gruppo=d.nav.gruppo.options[d.nav.gruppo.options.selectedIndex].value;
	var qs="?gruppo="+id_gruppo;
	var	chkSez=false;
	switch(a){
		case"gruppo":
			if(d.nav.elements[a].options.selectedIndex!=0){
				if(d.nav.sez)chkSez=true;
				else q="gruppo.php"+qs;
			}
		break;
		case"sez":
			chkSez=true;
		break;
	}
	if(chkSez){
		switch(d.nav.sez.options[d.nav.sez.options.selectedIndex].value){
			case"diario": 	q="diario.php"+qs;	break;
			case"home":		q="gruppo.php"+qs;	break;
		}
	}
	location.href=q;
}

function fastRollExec(){
	var q=document.fastRoll.esp.value;
	var str=q;
	var reg=/\d+d\d+/g;
	while(str.match(reg)){
		var arr=str.match(reg)
		var matched=arr[arr.length-1];
		var index=str.lastIndexOf(matched);
		var r=0;
		var t=matched.split("d");
		for(j=0;j<t[0];j++){
			r+=Math.floor(Math.random()*t[1])+1;
		}
		str = str.substring(0,index) + r + str.substring(index+matched.length,str.length) ;
	}
	var result=eval(str)
	if(!isNaN(result)){
		if(result!=q)document.fastRoll.esp.value=result;
		if(document.fastRoll.esp.select())document.fastRoll.esp.select();
	}
}

function changeCursor(){
	document.body.cursor="hand";
}

function sensibleFieldset(q,i){
	byId(q,"onmouseover","function(){this.className='sensibleHover"+((document.all)?"IE":"")+"';}");
	byId(q,"onmouseout","function(){this.className='sensible';}");
	byId(q,"onclick","function(){byId('"+i+"','checked','1');}");
}

var jTab = Class.create({
	initialize:function(tabs_container,contents_container){
		tabs_container=$(tabs_container);
		contents_container=$(contents_container);
		this.tabs=tabs_container.childElements();
		var i=this.tabs.length;
		while(i--){
			var e=this.tabs[i];
			e.identify();
			var a=e.down("A");
			a.observe(
				"click",
				this.sel.bindAsEventListener(this)
			).observe(
				"keypress",
				this.sel.bindAsEventListener(this)
			);
		};
		this.cnts=contents_container.childElements();
		this.cnts.each(function(e){e.identify()});
		this.tab_old=this.tabs[0];
		this.cnt_old=this.cnts[0];
		this.tabs[0].addClassName("sel");
		this.cnts[0].show();
	},
	sel:function(event){
		var q=Event.element(event);
		var currentID=q.up(".tab").id;
		if(this.tab_old!=""){
			this.tab_old.removeClassName("sel");
			this.cnt_old.hide();
		}
		var i=this.tabs.length;
		while(i--){
			if(this.tabs[i].id==currentID){
				this.tabs[i].addClassName("sel");
				this.cnts[i].show();
				this.tab_old=this.tabs[i];
				this.cnt_old=this.cnts[i];
				break;
			}
		}
	}
});