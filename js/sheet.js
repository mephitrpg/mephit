// <select adjustment>
selectors=new Array("taglia","sex","allineamento","tipoAttacco1","tipoAttacco2","tipoAttacco3","tipoAttacco4","tipoAttacco5","tipoDifesa1","tipoDifesa2","tipoDifesa3","tipoDifesa4","fk_campagna");
// </select adjustment>
highlight=false;
colorOn="#FFFF00";
fontOn="#000000";
colorOff="#FFFFFF";
fontOff="#000000";

function array_search(q,a){
	var i,found=-1;
	for(i=0;i<a.length;i++){
		if(a[i]==q){
			found=i;
			break;
		}
	}
	return found;
}
function showEditables(){
	if(arguments.length>0)highlight=!arguments[0];
	var i,field,bg_color,font_color;
	for(i=0;i<editables.length;i++){
		field1=editables[i];
		bg_color=(!highlight)?colorOn:((array_search(field1,rnks)!=-1)?err_chk[field1]["colorOff"]:colorOff);
		font_color=(!highlight)?fontOn:((array_search(field1,rnks)!=-1)?err_chk[field1]["fontOff"]:fontOff);
//	if(!top.sheet.document.f.elements[field1])alert(field1+" = "+top.sheet.document.f.elements[field1])
//	else alert(field1+" is "+top.sheet.document.f.elements[field1])
		if( array_search(field1,selectors) != -1 ){
			field2=field1+"_print";
			top.sheet.document.f.elements[field1].style.display=(highlight)?"none":"inline";
			top.sheet.document.f.elements[field2].style.display=(highlight)?"inline":"none";
		}
		if(top.sheet.document.f.elements[field1])top.sheet.document.f.elements[field1].style.backgroundColor=bg_color;
		else top.sheet.document.images[field1].style.backgroundColor=bg_color;
		if(top.sheet.document.f.elements[field1])top.sheet.document.f.elements[field1].style.color=font_color;
	}
	document.getElementById('se').innerHTML=(highlight)?msg["show"]:msg["hide"];
	highlight=!highlight;
}
function save(){
	var desMax=top.sheet.document.f.armatura_mod_des_max.value*1;
	var desMod=top.sheet.document.f._des_mod.value*1;
	if(desMax>desMod){
		top.sheet.document.f.armatura_mod_des_max.style.backgroundColor="#FF0000";
		alert(top.menu.errorMsg_desMax);
	}else{
		showEditables(false);
		now=new Date();
		d=now.getDay();
		mm=now.getMonth();
		Y=now.getFullYear();
		H=now.getHours();
		i=now.getMinutes();
		s=now.getSeconds();
		document.getElementById('message').innerHTML="<span class=working>["+d+"/"+mm+"/"+Y+" "+H+":"+i+":"+s+"] "+msg["working"]+"</span>";
		top.sheet.document.f.submit();
	}
}
function reload(){
	top.location.reload();
}