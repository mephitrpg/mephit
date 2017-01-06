function translateNumber(q,lang){
	var num = new NumberFormat();
	num.setInputDecimal(".");
	num.setPlaces("2", false);
	switch(lang){
		case"it":
			num.setSeparators(true, ".", ",");
		break;
		case"en":default:
			num.setSeparators(true, ",", ".");
		break;
	}
	num.setNumber(q);
	return num.toFormatted();
}
function convertWeight(q,lang){
	switch(lang){
		case"it":			return (q*0.5).toFixed(2);	break;
		case"en":default:	return (q*1).toFixed(2);	break;
	}
}
function naturalSort(a, b){
	// setup temp-scope variables for comparison evauluation
	var re = /(^[0-9]+\.?[0-9]*[df]?e?[0-9]?$|^0x[0-9a-f]+$|[0-9]+)/gi,
		sre = /(^[ ]*|[ ]*$)/g,
		hre = /^0x[0-9a-f]+$/i,
		ore = /^0/,
		// convert all to strings and trim()
		x = a.toString().replace(sre, "") || "",
		y = b.toString().replace(sre, "") || "",
		// chunk/tokenize
		xN = x.replace(re, "\0$1\0").replace(/\0$/,"").replace(/^\0/,"").split("\0"),
		yN = y.replace(re, "\0$1\0").replace(/\0$/,"").replace(/^\0/,"").split("\0"),
		// hex or date detection
		xD = parseInt(x.match(hre)) || (new Date(x)).getTime(),
		yD = parseInt(y.match(hre)) || xD && (new Date(y)).getTime() || null;
	// natural sorting of hex or dates - prevent "1.2.3" valid date
	if ( y.indexOf(".") < 0 && yD )
		if ( xD < yD ) return -1;
		else if ( xD > yD )	return 1;
	// natural sorting through split numeric strings and default strings
	for(var cLoc=0, numS=Math.max(xN.length, yN.length); cLoc < numS; cLoc++) {
		// find floats not starting with "0", string or 0 if not defined (Clint Priest)
		oFxNcL = !(xN[cLoc] || "").match(ore) && parseFloat(xN[cLoc]) || xN[cLoc] || 0;
		oFyNcL = !(yN[cLoc] || "").match(ore) && parseFloat(yN[cLoc]) || yN[cLoc] || 0;
		// handle numeric vs string comparison - number < string - (Kyle Adams)
		if (isNaN(oFxNcL) !== isNaN(oFyNcL)) return (isNaN(oFxNcL)) ? 1 : -1; 
		// rely on string comparison if different types - i.e. "02" < 2 != "02" < "2"
		else if (typeof oFxNcL !== typeof oFyNcL) {
			oFxNcL += ""; 
			oFyNcL += ""; 
		}
		if (oFxNcL < oFyNcL) return -1;
		if (oFxNcL > oFyNcL) return 1;
	}
	return 0;
}

/* -------------------------------- */

var wM={//weight modifier
	w:{3:0.5,4:1,5:2},
	a:{3:0.5,4:1,5:2},
	s:{3:0.25,4:1,5:4}
}

var C={}
var B={}
var bag={
	selected:0,
	create:function(id,nome){
		var contenitori_nome=$("contenitori_nome");
		var contenitori_contenuto=$("contenitori_contenuto");
		
		var hiddenInputs=new Element("span").setStyle({display:"none"});
		contenitori_contenuto.insert(hiddenInputs);
		
		if(!is.Num(id)){
			var i=new Element("input",{type:"hidden"});
			hiddenInputs.insert(i);
			id=i.identify();
			i.name="c_id["+id+"]";
			i.value=id;
		}else{
			hiddenInputs.insert(new Element("input",{id:"c_id_"+id,name:"c_id["+id+"]",value:id,type:"hidden"}));
		}
		hiddenInputs.id="hiddenInputs_"+id;
		
		var opt=arguments.length>2?arguments[2]:{};
		if(typeof opt.editabile=="undefined")opt["editabile"]=false;
		if(typeof opt.aggiungiAlCarico=="undefined")opt["aggiungiAlCarico"]=true;
		if(typeof opt.capacita=="undefined")opt["capacita"]=0;
		
		hiddenInputs.insert(new Element("input",{id:"c_nome_"+id,name:"c_nome["+id+"]",value:nome,type:"hidden"}));
		hiddenInputs.insert(new Element("input",{id:"c_editabile_"+id,name:"c_editabile["+id+"]",value:(opt.editabile?1:0),type:"hidden"}));
		hiddenInputs.insert(new Element("input",{id:"c_xd_"+id,name:"c_xd["+id+"]",value:(opt.aggiungiAlCarico?0:1),type:"hidden"}));
		hiddenInputs.insert(new Element("input",{id:"c_carico_"+id,name:"c_carico["+id+"]",value:opt.capacita,type:"hidden"}));
		
		contenitori_nome.insert(
			'<tr id="posseduto_nome_'+id+'" valign="top">'
				+'<td style="padding-left:4px;">'
					+'<a href="javascript:bag.edit(\''+id+'\');" title="'+L.rename+'">&#x2336;</a>'
					+'&#160;'
					+((opt.editabile)?'<a href="javascript:bag.destroy(\''+id+'\');" title="'+L['delete']+'">&#x2715;</a>':'&nbsp;')
				+'</td>'
				+'<td>'
					+((opt.editabile)?'<input type="checkbox" id="aggiungiAlCarico_'+id+'"'+(opt.aggiungiAlCarico?' checked':'')+' onclick="updateLoadBar();">':'&nbsp;')
				+'</td>'
				+'<td><a href="javascript:;" onclick="bag.select(\''+id+'\');this.blur();" style="display:block;*width:100%;padding-right:4px;">'
					+nome
				+'</a></td>'
			+'</tr>'
		);
/*
		$("contenitori_contenuto").insert(
			'<div id="denaro_'+id+'" class="row" style="display:none;margin-bottom:6px;">'
				+'<div class="col money" style="width:19%;background:#E5E4E2;">'
					+'<div id="pp_'+id+'" class="moneyQ">'+opt.pp+'</div>'
					+'<div class="moneyT">'+L.pp+'</div>'
				+'</div>'
				+'<div class="col" style="width:1%;">'+'&nbsp;'+'</div>'
				+'<div class="col money" style="width:19%;background:#FFD700;">'
					+'<div id="gp_'+id+'" class="moneyQ">'+opt.gp+'</div>'
					+'<div class="moneyT">'+L.gp+'</div>'
				+'</div>'
				+'<div class="col" style="width:1%;">'+'&nbsp;'+'</div>'
				+'<div class="col money" style="width:19%;background:#C0C0C0;">'
					+'<div id="sp_'+id+'" class="moneyQ">'+opt.sp+'</div>'
					+'<div class="moneyT">'+L.sp+'</div>'
				+'</div>'
				+'<div class="col" style="width:1%;">'+'&nbsp;'+'</div>'
				+'<div class="col money" style="width:19%;background:#B87333;">'
					+'<div id="cp_'+id+'" class="moneyQ">'+opt.cp+'</div>'
					+'<div class="moneyT">'+L.cp+'</div>'
				+'</div>'
				+'<div class="col" style="width:1%;">'+'&nbsp;'+'</div>'
				+'<div class="col values" style="width:20%;">'
					+'<div class="valuesQ" id="values_total">0</div>'
					+'<div class="valuesT">'+L.other+' ('+L.gp+')</div>'
				+'</div>'
			+'</div>'
		);
*/
		contenitori_contenuto.insert(
			'<table border="0" cellpadding="0" cellspacing="0" id="posseduto_'+id+'" class="contenitore" style="display:none;">'
				+'<thead>'
					+'<tr>'
						+'<th>'
							+'<a href="javascript:;" onclick="bag.sort('+id+',\'typelang\');" class="orderBy">'+L.type+' <span id="triangle_typelang_'+id+'" class="triangle"></span></a>'
						+'</th>'
						+'<th>'
							+'<a href="javascript:;" onclick="bag.sort('+id+',\'name\');" class="orderBy">'+L.name+' <span id="triangle_name_'+id+'" class="triangle">&#9662;</span></a>'
						+'</th>'
						+'<th style="width:6em;">'
							+'<a href="javascript:;" onclick="bag.sort('+id+',\'printSize\');" class="orderBy">'+L.size+' <span id="triangle_printSize_'+id+'" class="triangle"></span></a>'
						+'</th>'
						+'<th>'
							+'<a href="javascript:;" onclick="bag.sort('+id+',\'note\');" class="orderBy">'+L.notes+' <span id="triangle_note_'+id+'" class="triangle"></span></a>'
						+'</th>'
						+'<th style="width:6em;">'
							+'<a href="javascript:;" onclick="bag.sort('+id+',\'price\');" class="orderBy">'+L.price+' ('+L.gp+') <span id="triangle_price_'+id+'" class="triangle"></span></a>'
						+'</th>'
						+'<th style="width:6em;">'
							+'<a href="javascript:;" onclick="bag.sort('+id+',\'weight\');" class="orderBy">'+L.weight+' ('+L.lb+') <span id="triangle_weight_'+id+'" class="triangle"></span></a>'
						+'</th>'
						+'<th style="width:2em;">'
							+'<a href="javascript:;" onclick="bag.sort('+id+',\'quantity\');" class="orderBy">'+L.Q+' <span id="triangle_quantity_'+id+'" class="triangle"></span></a>'
						+'</th>'
						+'<th style="width:2em;">'
							+'&nbsp;'
						+'</th>'
					+'</tr>'
				+'</thead>'
				
				+'<tbody id="contenuti_'+id+'" class="contenuti"></tbody>'
				
				+'<tfoot>'
					+'<tr>'
						+'<td>'
							+L.total
						+'</td>'
						+'<td>'
							+'&nbsp;'
						+'</td>'
						+'<td>'
							+'&nbsp;'
						+'</td>'
						+'<td>'
							+'&nbsp;'
						+'</td>'
						+'<td style="text-align:right;">'
							+'<div id="subtotale-'+id+'">'
								+'0,00'
							+'</div>'
						+'</td>'
						+'<td style="text-align:right;">'
							+'<div id="tara-'+id+'">'
								+'0,00'
							+'</div>'
							+(opt.capacita!=0?'<div style=";border-top:1px solid #fff;">'+translateNumber(convertWeight(opt.capacita,lang),lang)+'</div>':'')
						+'</td>'
						+'<td>'
							+'&nbsp;'
						+'</td>'
						+'<td>'
							+'&nbsp;'
						+'</td>'
					+'</tr>'
				+'</tfoot>'
			+'</table>'
		);
		$('contenuti_'+id).observe("click",watchShiftClick);
		Droppables.add('posseduto_nome_'+id,{
			accept:"possessionName",
			hoverclass:"hoverContainer",
			onDrop: function(dragged, dropped, event) {
				var possession_id=dragged.id.split("_")[2];
				var container_new=dropped.id.split("_")[2];
				var container_old=dragged.up(".contenitore").id.split("_")[1];
				
				var shiftPressed=event.shiftKey;
				if (shiftPressed) {
					/*shiftDrop function*/
					var n=prompt(C[container_old][possession_id].quantity,C[container_old][possession_id].quantity);
					if(n){if(is.Num(n)){
						var opz=Object.clone(C[container_old][possession_id]);
						if(n>opz.quantity||n<1){
							alert("ERRORE: quantita' non disponibile");
							return;
						}
						opz.quantity=n*1;
						delete opz.possession_id;
					}}
				} else {
					/* drop function*/
					var opz=Object.clone(C[container_old][possession_id]);
				}
				bag.drop(container_old,possession_id,opz.quantity);
				opz.container_id=container_new;
				bag.insert(opz.id,opz);
			}
		});
		
		C[id]=[];
		B[id]={sortBy:"name",order:1,capacity:opt.capacita};
	},
	select:function(id){
		try{
			$("posseduto_nome_"+bag.selected).removeClassName("sel");
			$("posseduto_"+bag.selected).hide();
			//$("denaro_"+bag.selected).hide();
		}catch(e){}
		$("posseduto_nome_"+id).addClassName("sel").blur();
		$("posseduto_"+id).show();
		//$("denaro_"+id).show();
		
		bag.selected=id;
	},
	insert:function(q){
		var o=arguments.length>1?arguments[1]:{};
		o["container_id"]=o.container_id||bag.selected;
		o["possession_id"]=o.possession_id||new Date().getTime();
		o["id"]=o.id||q;					o["name"]=o.name||"-";
		o["slot"]=o.slot||0;				o["quantity"]=o.quantity||1;
		o["note"]=o.note||"";				o["size"]=o.size||$$("INPUT[name=taglia]:checked")[0].value*1;
		o["weight"]=o.weight||0;			o["price"]=o.price||0;
		o["weightSize"]=o.weightSize||0;	o["isContainer"]=o.isContainer||0;
		o["type"]=o.type||"";				o["precious"]=o.precious||0;
		o["cursed"]=o.cursed||0;			
		var insOpt=arguments.length>2?arguments[2]:{};
		insOpt.sort=(typeof insOpt["sort"]!="undefined")?insOpt.sort:true;
		insOpt.zebra=(typeof insOpt["zebra"]!="undefined")?insOpt.zebra:true;
		//----------
		
		var weightSizeModifier,printSize=o.size;
		switch(o.type){
			case"weapons":
				weightSizeModifier=wM.w[o.size];
			break;
			case"armorandshields":
				weightSizeModifier=wM.a[o.size];
			break;
			default:
				if(o.weightSize!=0){
					weightSizeModifier=wM.s[o.size];
				}else{
					weightSizeModifier=1;
					printSize=4;
				}
			break;
		}
		var k=bag.indexOf(o.container_id,o.id,o.size);
		if(k==-1){
			var TR=new Element("tr",{id:"possession_id_"+o.possession_id,className:"possession"});
			
			var NAME=new Element("TD").insert(new Element("span",{id:"possession_name_"+o.possession_id,className:"possessionName"}).update(o.name));
			var SIZE=new Element("td",{className:"size"}).update('<span class="none">'+printSize+'</span>'+Sizes[printSize]);
			var CATEGORY=new Element("td",{className:"category",align:"center"}).update('<img alt="'+L["itemtype_"+o.type]+'" title="'+L["itemtype_"+o.type]+'" src="themes/'+Cookie.get("mephit_theme").replace(/\+/g," ")+'/images/item_'+o.type+'.gif">');
			
			var INPUT=new Element("input",{type:"hidden",name:"item[]",value:o.id}); 
			var INPUT_slot=new Element("input",{type:"hidden",name:"slot[]",value:o.slot});
			var INPUT_possession_id=new Element("input",{type:"hidden",name:"possession_id[]",value:o.possession_id});
			var INPUT_container=new Element("input",{type:"hidden",name:"container[]",value:o.container_id});
			var INPUT_userSize=new Element("input",{type:"hidden",name:"userSize[]",value:o.size});
			var INPUT_quantity=new Element("input",{type:"hidden",name:"quantity[]",value:o.quantity,className:"q"});
			
			var INPUT_note=new Element("input",{type:"text",name:"note[]",value:o.note,title:o.note.replace(/"/g,"''"),className:"note"});
			var NOTE=new Element("td",{style:"width:100%;white-space:normal;"}).insert(INPUT_note);
			
			var wSingle=o.weight!=0?o.weight:"-";
			var w=is.Num(wSingle)?translateNumber(convertWeight(wSingle,lang)*weightSizeModifier*o.quantity,lang):wSingle;
			var pSingle=o.price!=0?o.price:"-";
			if(is.Num(pSingle)){
				p=String(pSingle);
				switch(p.length){
					case 1:		p="0.0"+p;	break;
					case 2:		p="0."+p;	break;
					default:	p=p.substr(0,p.length-2)+"."+p.substr(p.length-2,2);	break;
				}
				p=translateNumber(p,lang);
			}else{
				p=p;
			}
			var WEIGHT=new Element("td",{style:"text-align:right;",className:"weight"}).update(w);
			var PRICE=new Element("td",{style:"text-align:right;",className:"price"}).update(p);
			var QUANTITY=new Element("td",{style:"text-align:right;",className:"quantity"}).update(o.quantity);
			
			var PULSANTI=new Element("td",{className:"pulsanti"});
			var A_add=new Element("a",{href:"javascript:;",className:"plus"}).update("+");
			var A_del=new Element("a",{href:"javascript:;",className:"minus"}).update("-");
			var PULSANTIERA=new Element("div",{className:"pulsantiera row"});
			var REL=new Element("span").update(' ');
			if(o.cursed)REL.innerHTML+='&#9824;';
			if(o.weightSize>0)REL.innerHTML+='&#185;';
			//----------
			PULSANTI.insert(PULSANTIERA.insert(A_del).insert(A_add));
			NAME.insert(INPUT).insert(INPUT_slot).insert(INPUT_possession_id).insert(INPUT_container).insert(INPUT_userSize).insert(INPUT_quantity)
			TR.insert(CATEGORY).insert(NAME.insert(REL)).insert(SIZE).insert(NOTE).insert(PRICE).insert(WEIGHT).insert(QUANTITY).insert(PULSANTI);
			var contenuti=$("contenuti_"+o.container_id);
			contenuti.insert(TR);
			var opz=Object.clone(o);opz.quantity=1;
			//----------
			C[o.container_id][o.possession_id]={
				possession_id:o.possession_id,
				container_id:o.container_id,
				id:o.id,
				name:o.name,
				weight:is.Num(wSingle)?wSingle*1:0,
				price:is.Num(pSingle)?pSingle*1:0,
				quantity:o.quantity,
				note:o.note,
				size:o.size,
				precious:o.precious,
				cursed:o.cursed,
				printSize:printSize,
				weightSize:o.weightSize,
				weightSizeModifier:weightSizeModifier,
				type:o.type,
				typelang:L["itemtype_"+o.type],
				draggable:new Draggable("possession_name_"+o.possession_id,{
					revert:true
				})
			}
			if(insOpt.sort){
				B[o.container_id].order*=-1;
				bag.sort(o.container_id);
			}else if(insOpt.zebra){
				bag.zebra(o.container_id);
			}
		}else{
			var n=C[o.container_id][k].quantity+o.quantity;
			var w=C[o.container_id][k].weight;
			C[o.container_id][k].quantity=n;
			if(is.Num(w)&&w!=0){
				w=convertWeight(w*C[o.container_id][k].weightSizeModifier,lang)*n;
				$$("#possession_id_"+k+" .weight")[0].innerHTML=translateNumber(w,lang);
			}
			$$("#possession_id_"+k+" .quantity")[0].innerHTML=n;
			$$("#possession_id_"+k+" .q")[0].value=n;
		}
		bag.updateWeightAndPrecious(o.container_id);
	},
	drop:function(q,p){
		var quantity=arguments.length>2?arguments[2]:1;
		var Q=C[q][p].quantity;
		var n=Q-quantity;
		if(n<=0){
			C[q][p].draggable.destroy();
			delete C[q][p];
			var element=$("possession_id_"+p);
			var contenuti=element.up(".contenuti");
			element.remove();
			bag.zebra(q);
		}else{
			C[q][p].quantity=n;
			var w=C[q][p].weight;
			$$("#possession_id_"+p+" .quantity")[0].innerHTML=n;
			$$("#possession_id_"+p+" .q")[0].value=n;
			if(is.Num(w)&&w!=0){
				w=convertWeight(w*C[q][p].weightSizeModifier,lang)*n;
				$$("#possession_id_"+p+" .weight")[0].innerHTML=translateNumber(w,lang);
			}
		}
		bag.updateWeightAndPrecious(q);
	},
	zebra:function(q){
		q=$("contenuti_"+q);
		var p=q.select(".possession");
		var i=p.length;
		while(i--){
			p[i].removeClassName("dispari");
			if(i%2)p[i].addClassName("dispari")
		}
	},
	sort:function(q){
		var oldBy=B[q].sortBy,newBy=arguments[1]||B[q].sortBy;
		if(newBy==oldBy){
			B[q].order*=-1;
		}else{
			B[q].order=1;
			B[q].sortBy=newBy;
		}
		switch(newBy){
			case"name":
			case"printSize":
			case"typelang":
			case"note":
			case"price":
			case"weight":
			case"quantity":
				var x=[];
				for(i in C[q])if(!isNaN(i))x[x.length]=C[q][i];
				x.sort(function(a,b){
					return naturalSort(a[newBy],b[newBy])*B[q].order;
				});
				var y=[];
				for(var i=0,l=x.length;i<l;++i){
					var obj=x[i];
					if(typeof obj.possession_id!="undefined"){
						var id="possession_id_"+obj.possession_id;
						var TR=document.getElementById(id);
						y.push('<tr id="'+id+'" class="possession">'+TR.innerHTML+'</tr>');
					}
				}
				document.getElementById("contenuti_"+q).innerHTML=y.join("");
				for(i in C[q]){if(!isNaN(i)){
					var obj=C[q][i];
					obj.draggable.destroy();
					obj.draggable=new Draggable("possession_name_"+obj.possession_id,{
						revert:true
					});
				}}
				bag.zebra(q);
			break;
		}
		if(newBy!=oldBy)$("triangle_"+oldBy+'_'+q).update("");
		$("triangle_"+newBy+"_"+q).update(B[q].order>0?"&#9662;":"&#9652;")
	},
	edit:function(q){
		var input=$("c_nome_"+q);
		var name=prompt(L.name,input.value);
		if(name!=null){
			if(!name.blank()){
				$$("#posseduto_nome_"+q+" A").last().innerHTML=name;
				input.value=name;
			}else{
				alert("Inserire un valore");
			}
		}
	},
	destroy:function(q){
		for(i in C[q]){if(!isNaN(i)){
			alert("Il contenitore dev'essere vuoto");
			return;
		}}
		$("posseduto_"+q).remove();
		$("posseduto_nome_"+q).remove();
		$("hiddenInputs_"+q).remove();
		delete C[q];
	},
	indexOf:function(q,id,size){
		for(k in C[q]){
			if(is.Num(k)){
				if(C[q][k].id==id&&C[q][k].size==size){
					return k*1;
					break;
				}
			}
		}
		return -1;
	},
	getWeight:function(q){
		
	},
	getPrice:function(q){
		
	},
	updateWeightAndPrecious:function(q){
		var w=0,m=0;
		for(p in C[q]){if(is.Num(p)){
			w+=C[q][p].weight*C[q][p].weightSizeModifier*C[q][p].quantity;
			m+=C[q][p].price*C[q][p].quantity;
		}}
		var tara=$("tara-"+q);
		var subtotale=$("subtotale-"+q);
		var m=String(m);
		switch(m.length){
			case 1:		m="0.0"+m;	break;
			case 2:		m="0."+m;	break;
			default:	m=m.substr(0,m.length-2)+"."+m.substr(m.length-2,2);	break;
		}
		tara.innerHTML=translateNumber(convertWeight(w,lang),lang);
		subtotale.innerHTML=translateNumber(m,lang);
		if(B[q].capacity!=0){
			if(w>B[q].capacity)tara.up("td").addClassName("overCapacity");
			else tara.up("td").removeClassName("overCapacity");
		}
		updateLoadBar();
		updatePreciousBar();
	}
}

/* -------------------------------- */

function itemTipOver(event){
	var el=event.element();
	if(el.hasClassName("item")){
		var id=el.id.split("-")[2];
	}else if(el.hasClassName("possessionName")){
		var possession_id=el.id.match(/\d+/)[0]*1;
		var container_id=el.up("TBODY").id.match(/\d+/)[0]*1;
		var id=C[container_id][possession_id].id;
	}else{
		var id=-1;
	}
	if(id!=-1){
		try{jTooltip.ajaxCall.abort();}catch(e){}
		jTooltip.move();
		jTooltip.show("<em>Loading...</em>");
		jTooltip.ajaxCall=new Ajax.Updater("jTooltip","ajaxItemTooltip.php",{
			parameters:{what:id},
			onComplete:jTooltip.move
		});
	}
}
function itemTipOut(event){
	var el=event.element();
	if(el.tagName.toUpperCase()=="A"){
		jTooltip.hide();
	}
}
function itemTipMove(event){
	var el=event.element();
	if(el.tagName.toUpperCase()=="A"){
		jTooltip.move();
	}
}

function updateLoadBar(){
	var w=0;
	for(q in C){if(is.Num(q)){
		var aggiungiAlCarico,checkbox=$("aggiungiAlCarico_"+q);
		
		if(q==0)aggiungiAlCarico=true;
		else if(q==1)aggiungiAlCarico=false;
		else aggiungiAlCarico=checkbox?checkbox.checked:(q);
		
		if(aggiungiAlCarico){
			for(p in C[q]){if(is.Num(p)){
				w+=convertWeight(C[q][p].weight*C[q][p].weightSizeModifier,lang)*C[q][p].quantity;
			}}
			$("c_xd_"+q).value=1;
		}else{
			$("c_xd_"+q).value=0;
		}
	}}
	
	var check=["leggero","medio","pesante","sollevare","trascinare"];
	var c="stop",cp="trascinare",cn="stop";
	for(var i=0;i<check.length;i++){
		if(w<=carico[check[i]]){
			cp=(i==0)?"zero":check[i-1];
			c=check[i];
			cn=(i+1<check.length)?check[i+1]:"stop";
			break;
		}
	}
	if(c=="leggero"){
		var perc=Math.floor(w/carico[c]*100);
	}else if(c=="stop"){
		var perc=Math.floor((w-carico[cp])/carico[cp]*100)+100;
	}else{
		var perc=Math.floor((w-carico[cp])/(carico[c]-carico[cp])*100);
	}
	
	$("load_total").innerHTML=translateNumber(w,lang);
	$("load_perc").innerHTML=perc;
	$("load_perc_less").innerHTML=perc-100;
	$("load_bar").setStyle({width:perc+"%"}).className=c;
	$("load_label").innerHTML=carico_label[c];
	$("load_next").innerHTML=carico_label[cn];
	$("load_less").innerHTML=(w-(c!="stop"?carico[c]:carico.trascinare)).toFixed(2);
}

function updatePreciousBar(){
	var total=0;
	var equip=0;
	for(q in C){if(is.Num(q)){
		for(p in C[q]){if(is.Num(p)){
			if(C[q][p].precious==1)total+=C[q][p].price*C[q][p].quantity;
			else equip+=C[q][p].price*C[q][p].quantity;
		}}
	}}
	var p="0";
	if(total<10){
		p="0.0"+total;
	}else if(total<100){
		p="0."+total;
	}else{
		p=String(total);
		p=p.substr(0,p.length-2)+"."+p.substr(p.length-2,2);
	}
	var e="0";
	if(equip<10){
		e="0.0"+equip;
	}else if(equip<100){
		e="0."+equip;
	}else{
		e=String(equip);
		e=e.substr(0,e.length-2)+"."+e.substr(e.length-2,2);
	}
	$("gp_total").innerHTML=translateNumber(p,lang);
	$("gp_total_equip").innerHTML=translateNumber(e,lang);
}

function watchShiftClick(e){
	var clicked=e.element();
	if(clicked.hasClassName("plus")){
		var shiftPressed=e.shiftKey;
		Event.stop(e);
		var container_id=this.id.split("_")[1];
		var possession_id=clicked.up("tr").id.split("_")[2];
		if (shiftPressed) {
			/*shiftClick function*/
			var n=prompt(L.quantity,1);
			if(n){if(is.Num(n)){
				var opz=Object.clone(C[container_id][possession_id]);
				opz.quantity=n*1;
				bag.insert(opz.id,opz);
			}}
		} else {
			/* click function*/
			var opz=Object.clone(C[container_id][possession_id]);
			opz.quantity=1;
			bag.insert(opz.id,opz);
		}
	}else if (clicked.hasClassName("minus")){
		var shiftPressed=e.shiftKey;
		Event.stop(e);
		var container_id=this.id.split("_")[1];
		var possession_id=clicked.up("tr").id.split("_")[2];
		if (shiftPressed) {
			/*shiftClick function*/
			var n=prompt(L.quantity,1);
			if(n){if(is.Num(n)){
				var opz=Object.clone(C[container_id][possession_id]);
				if(n>opz.quantity||n<1){
					alert("ERRORE: quantita' non disponibile");
					return;
				}
				bag.drop(container_id,possession_id,n*1);
			}}
		} else {
			/* click function*/
			bag.drop(container_id,possession_id,1);
		}
	}
	/*safari 2.0.3 Event.stop(e) workaround*/
	this.onclick = function() {return false;};
}
/* -------------------------------- */

function newBag(e){
	var KeyID = (window.event) ? event.keyCode : e.keyCode;
	if(KeyID==13)e.stop();
	var newContainerCapacity=$("newContainerCapacity");
	var newContainerName=$("newContainerName");
	if(newContainerName.value.blank()){
		alert("Inserire un valore");
		newContainerName.select();
		return false;
	}
	if(newContainerCapacity.value.blank()){
		alert("Inserire un valore");
		newContainerCapacity.select();
		return false;
	}
	var capacity=newContainerCapacity.value.replace(/,/g,".");
	if(!is.Num(capacity)){
		alert("Inserire un numero");
		newContainerCapacity.select();
		return false;
	}
	switch(lang){
		case"it":
			capacity*=2;
		break;
	}
	bag.create("",newContainerName.value,{aggiungiAlCarico:1,capacita:capacity,editabile:true})
	newBagCancel();
}
function newBagCancel(){
	$("newContainerName").value="";
	$("newContainerCapacity").value=0;
}
document.observe("dom:loaded",function(){
	$("newContainerName").observe("keypress",avoidEnter);
	$("newContainerCapacity").observe("keypress",avoidEnter);
	$("newContainerSubmit").observe("click",newBag).observe("keypress",newBag);
	$("newContainerCancel").observe("click",newBagCancel).observe("keypress",newBagCancel);
});