Array.prototype.sum = function() {
  return (! this.length) ? 0 : this.slice(1).sum() +
      ((typeof this[0] == 'number') ? this[0] : 0);
};

var $PG={
	updateTable:function(){
		var TBODY=$$("#tabella_classi TBODY")[0];
		var TRs=TBODY.select("TR");
		for(var i=0,LEP=1;i<$PG.order.length;i++,LEP++){
			var q=$PG.order[i];
			var finora=$PG.order.clone().splice(0,LEP);
			var liv=finora.length-finora.without(finora[i]).length;
			var tr=[
			'<tr onmouseover="$PG.highlightInTable(this,1);"',
			' onmouseout="$PG.highlightInTable(this,0);" align="center" class="'+(i%2?'pari':'dispari')+'"',
			'>',
				'<td class="elimina">',
				'<input type="hidden" name="pgClass[]" value="'+q+'">',
				'<a href="javascript:;" onclick="$PG.removeClass(this);" class="PGclass-'+q+'">',
				'&times;</a>',
				'</td>',
				'<td>'+$PG.calc("dv",q,liv)+'</td>',
				'<td>'+$PG.calc("bab",q,liv)+'</td>',
				'<td>'+$PG.calc("tem",q,liv)+'</td>',
				'<td>'+$PG.calc("rif",q,liv)+'</td>',
				'<td>'+$PG.calc("vol",q,liv)+'</td>',
				'<td>'+$PG.calc("pa",q,liv)+'</td>',
				'<td class="left">'+$PG.calc("special",q,liv)+'</td>',
				(function(){
					var tmp=[];
					var slots=availableClasses[q].levels[liv].slots;
					if(typeof slots=="string"){
						var frasi=slots.split("/"),j=frasi.length;
						while(j--)frasi[j]=frasi[j].trim();
						return '<td colspan="10" class="left" nowrap>'+frasi.join('<br>')+'</td>';
					}else{
						for(var s=0;s<slots.length;s++){
							tmp.push('<td>'+(slots[s]!=null?slots[s]:'&nbsp;')+'</td>');
						}
						return tmp.join('');
					}
				})(),
			'</tr>'
			].join('');
			if(typeof TRs[i]!="undefined")TRs[i].replace(tr);
			else TBODY.insert(tr,{position:"before"});
			
			var classLabel=$$("#PG_classi SPAN.PGclass-"+q)[liv-1];
			var classLabelText=classLabel.innerHTML;
			if((/\d+/).test(classLabelText)){
				classLabel.innerHTML=classLabelText.replace(/\d+/,liv);
			}else{
				classLabel.innerHTML+='&nbsp;'+liv;
			}
		}
		for(var i=TRs.length-1;i>$PG.order.length-1;i--)TRs[i].remove();
	},
	updateSortableIndexes:function(){
		SPANs=$$(".ordine");
		SPANs.each(function(SPAN,i){
			SPAN.innerHTML=i+1;
			if(i%2){
				SPAN.up("LI").removeClassName("dispari").addClassName("pari");	
			}else{
				SPAN.up("LI").removeClassName("pari").addClassName("dispari");	
			}
		});
	},
	addClass:function(q){
		var ordine=$$("#PG_classi LI").length+1;
		if(ordine<=20){
			var zebra=ordine%2?"dispari":"pari";
			$("PG_classi").insert([
				'<li class="'+zebra+' PGclass-'+q+'" onmouseover="$PG.highlightInTable(this,1);"\ onmouseout="$PG.highlightInTable(this,0);">',
					'<div class="td">',
						'<span class="ordine">',
						ordine,
						'</span>. <span class="PGclass-'+q+'">',
						availableClasses[q].name,
						'</span>',
					'</div>',
				'</li>'
			].join(''));
			Sortable.create("PG_classi",{
				onChange:function(){
					$PG.update();
				}
			});
			$PG.update();
		}
	},
	removeClass:function(q){
		q=$(q);
		var c=q.className.split("-")[1];
		var TRs=q.up("TBODY").select("TR");
		var TR=q.up("TR");
		var i=TRs.indexOf(TR);
		TR.remove();
		$$("#PG_classi LI")[i].remove();
		$PG.update();
	},
	updateClassesObject:function(){
		$PG.classes={};
		$PG.order=[];
		$$("#PG_classi LI").each(function(LI){
			var i=LI.select("span").last().className.split("-")[1]*1;
			var k="class"+i;
			if(typeof $PG.classes[k]=="undefined"){
				$PG.classes[k]={
					id:i,
					name:availableClasses[i],
					level:0,
					bab:0,
					tem:0,
					rif:0,
					vol:0,
					pa:0
				};
			}
			$PG.classes[k].level++;
			$PG.classes[k].bab=$PG.calc("bab",i,$PG.classes[k].level);
			$PG.classes[k].tem=$PG.calc("tem",i,$PG.classes[k].level);
			$PG.classes[k].rif=$PG.calc("rif",i,$PG.classes[k].level);
			$PG.classes[k].vol=$PG.calc("vol",i,$PG.classes[k].level);
			$PG.order.push(i);
		});
	},
	highlightInTable:function(q,show){
		q=$(q);
		var i=q.up().select(q.tagName).indexOf(q);
		var TBODY=$$("#tabella_classi TBODY")[0];
		var LISTA=$$("#PG_classi LI");
		if(show){
			//q.addClassName("highlight");
			TBODY.down("TR",i).addClassName("highlight");
			LISTA[i].addClassName("highlight");
		}else{
			//q.removeClassName("highlight");
			TBODY.down(".highlight").removeClassName("highlight");
			LISTA[i].removeClassName("highlight");
		}
		var LEP=i+1;
		$("bab_partial").innerHTML=$PG.partial("bab",LEP);
		$("tem_partial").innerHTML=$PG.partial("tem",LEP);
		$("rif_partial").innerHTML=$PG.partial("rif",LEP);
		$("vol_partial").innerHTML=$PG.partial("vol",LEP);
		$("pa_partial").innerHTML=$PG.partial("pa",LEP);

	},
	update:function(){
		$PG.updateSortableIndexes();
		$PG.updateClassesObject();
		$PG.updateTable();
		$PG.total();
		tableRowsHeight();
	},
	calc:function(q,class_id,livello){
		var result;
		result=availableClasses[class_id].levels[livello][q];
		return result!=null?result:'&nbsp;';
	},
	partial:function(cosa,LEP){
		var b=[],r;
		var finora=$PG.order.clone().splice(0,LEP);
		for(var i=0;i<finora.length;i++){
			var id=finora[i];
			var liv=finora.length-finora.without(finora[i]).length;
			switch(cosa){
				case"bab":
				case"tem":
				case"rif":
				case"vol":
					b[id]=$PG.calc(cosa,id,liv)*1;
				break;
				case"pa":
					b.push(availableClasses[id][cosa]*((i==0)?4:1))
				break;
			}
		};
		switch(cosa){
			case"bab":
				b=b.sum();
				r=[];
				while(b>0){r.push("+"+b);b-=5;}
				if(r.length==0)r[0]="+0";
				return r.join("/");
			break;
			case"tem":
			case"rif":
			case"vol":
				return "+"+b.sum(); 
			break;
			case"pa":
				return b.sum(); 
			break;
		}
	},
	total:function(){
		var LEPs=$$(".ordine");
		var liv=LEPs.length;
		for(var i=0;i<LEPs.length;i++){
			if(LEPs[i].checked){liv=i+1;break;}
		}
		$("bab").innerHTML=$PG.partial("bab",liv);
		$("tem").innerHTML=$PG.partial("tem",liv);
		$("rif").innerHTML=$PG.partial("rif",liv);
		$("vol").innerHTML=$PG.partial("vol",liv);
		//$("pa").innerHTML=$PG.partial("pa",liv);
	},
	classes:{},
	order:[]
}
function tableRowsHeight(q){
	// theader
	var altezza=parseInt($$(".th-height")[0].getStyle('min-height'));
	$$(".th-height").each(function(element,i){
		element.setStyle({height:''});
		altezza=Math.max(altezza,element.getHeight());
	}).each(function(element,i){
		element.setStyle({height:altezza+'px'});
	});
	// tbody
	var LIs=$$("#PG_classi LI .td");
	var TRs=$$("#tabella_classi #tibodi TR");
	LIs.each(function(LI,i){
		var TD=TRs[i].select('TD').first(),A=TD.select('A').first();
		LI.setStyle({height:''});
		A.setStyle({lineHeight:''});
		altezza=Math.max(LI.getHeight(),TD.getHeight());
		console.log(LI.getHeight(),TD.getHeight())
		LI.setStyle({height:altezza+'px'});
		A.setStyle({lineHeight:(altezza-1)+'px'});
	});
}