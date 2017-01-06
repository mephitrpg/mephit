<?php
$BODY.='<script>
incantesimi=new Array();
incantesimi["Bardo"]=new Array(1,2,4,7,10,13,16);
incantesimi["Chierico"]=new Array(1,1,3,5,7,9,11,13,15,17);
incantesimi["Druido"]=incantesimi["Chierico"];
incantesimi["Mago"]=incantesimi["Chierico"];
incantesimi["Stregone"]=new Array(1,1,4,6,8,10,12,14,16,18);
incantesimi["Paladino"]=new Array(null,4,8,12,16);
incantesimi["Ranger"]=incantesimi["Paladino"];

function crea(){
	pergamena_pozione(document.f.oggetto.options[document.f.oggetto.options.selectedIndex].text);
}

function pergamena_pozione(oggetto){
	document.r.reset();
	livIncantatore=document.f.liv_incantatore.options[document.f.liv_incantatore.options.selectedIndex].text*1;
	livIncantesimo=document.f.liv_incantesimo.options[document.f.liv_incantesimo.options.selectedIndex].text*1;
	classe=document.f.classe.options[document.f.classe.options.selectedIndex].text;
	livIncantatoreMin=incantesimi[classe][livIncantesimo];
	livIncantesimoMax=incantesimi[classe].length-1;
	for(i=incantesimi[classe][livIncantesimoMax];i>0;i--){
		if(incantesimi[classe][i]<=livIncantatore)break;
	}
	livIncantesimoMaxLanciabile=i;
	articolo_classe=(classe=="Stregone")?"Uno ":"Un ";
	articolo_oggetto=(oggetto=="Bastone")?"un ":"una ";
	
	if(oggetto!="Pozione"||(oggetto=="Pozione"&&livIncantesimo<4)){
		if(livIncantatoreMin!==null){
			if(livIncantatoreMin!==undefined){
				if(livIncantesimo<=livIncantesimoMax){
					if(livIncantatore>=livIncantatoreMin){
						componente=document.f.componente.value*1;
						PE=document.f.PE.value*1;
						prezzoBase=livIncantatore*((livIncantesimo==0)?0.5:livIncantesimo);
						switch(oggetto){
							case"Pergamena":prezzoBase*=25;break;
							case"Pozione":prezzoBase*=50;break;
						}
						document.r.mo.value=prezzoBase/2+componente;
						t=Math.round(prezzoBase/1000);
						document.r.gg.value=(t<1||oggetto=="Pozione")?1:t;
						document.r.PE.value=Math.ceil(prezzoBase/25)+PE;
						document.r.mercato.value=prezzoBase+PE*5+componente;
					}else alert("Il livello dell\'incantatore è troppo basso.\n"+articolo_classe+classe+" dev\'essere almeno di "+livIncantatoreMin+"° livello per poter creare "+articolo_oggetto+oggetto+" di "+livIncantesimo+"° livello.\n"+articolo_classe+classe+" di "+livIncantatore+"° livello puo creare al massimo "+articolo_oggetto+oggetto+" di "+livIncantesimoMaxLanciabile+"° livello.")
				}else alert("Il livello dell\'incantesimo è troppo alto.\n"+articolo_classe+classe+" può creare al massimo "+articolo_oggetto+oggetto+" di "+livIncantesimoMax+"° livello.")
			}else alert("Il livello dell\'incantesimo è troppo alto.\n"+articolo_classe+classe+" non può creare "+articolo_oggetto+oggetto+" superiore al "+(incantesimi[classe].length-1)+"° livello.")
		}else alert("Il livello dell\'incantesimo è troppo basso.\n"+articolo_classe+classe+" non può creare "+articolo_oggetto+oggetto+" inferiore al 1° livello.")
	}else alert("Il livello dell\'incantesimo è troppo alto.\nUna pozione può essere al massimo di 3° livello.")
}

</script>
<style>
#DnDTools INPUT,#DnDTools SELECT{width:100px;}
</style>
<table border=0 cellpadding=0 cellspacing=0 id="DnDTools"><tr valign=top><td>

<table border=0 cellpadding=0 cellspacing=0>
<form name=f>
<tr valign="top">
<td><b>Oggetto da creare o incantare:</b> &nbsp;&nbsp;</td>
<td><select name=oggetto>
<option selected>Pergamena
<option>Pozione
</select></td>
</tr>
<tr valign="top">
<td><b>Classe dell\'incantatore:</b> &nbsp;&nbsp;</td>
<td><select name=classe>
<option>Bardo
<option>Chierico
<option>Druido
<option selected>Mago
<option>Paladino
<option>Ranger
<option>Stregone
</select></td>
</tr>
<tr valign="top">
<td><b>Livello incantatore:</b>&nbsp;&nbsp;</td>
<td><select name=liv_incantatore><option>1<option>2<option>3<option>4<option>5<option>6<option>7<option>8<option>9<option>10<option>11<option>12<option>13<option>14<option>15<option>16<option>17<option>18<option>19<option>20</select></td>
</tr>
<tr valign="top">
<td><b>Livello incantesimo:</b>&nbsp;&nbsp;</td>
<td><select name=liv_incantesimo><option>0<option selected>1<option>2<option>3<option>4<option>5<option>6<option>7<option>8<option>9</select></td>
</tr>
<tr valign="top">
<td><b>Componente costosa:</b> (mo)&nbsp;&nbsp;</td>
<td><input size=2 name=componente value=0 style="text-align:right;"></td>
</tr>
<tr valign="top">
<td><b>PE:</b>&nbsp;&nbsp;</td>
<td><input size=2 name=PE value=0 style="text-align:right;"></td>
</tr>
</form>
</table>

</td><td width=20 nowrap></td><td>

<table border=0 cellpadding=0 cellspacing=0>
<form name=r>
<tr valign="top">
<td><b>Costo:</b> (mo)&nbsp;&nbsp;</td>
<td><input name=mo style="text-align:right;"></td>
</tr>
<tr valign="top">
<td><b>Tempo:</b> (giorni)&nbsp;&nbsp;</td>
<td><input name=gg style="text-align:right;"></td>
</tr>
<tr valign="top">
<td><b>PE:</b>&nbsp;&nbsp;</td>
<td><input name=PE style="text-align:right;"></td>
</tr>
<tr valign="top">
<td><b>Prezzo di mercato:</b>&nbsp;&nbsp;</td>
<td><input name=mercato style="text-align:right;"></td>
</tr>
<tr>
<td></td>
<td><br><input type=button class=btn value=calcola onclick=crea()></td>
</tr>
</form>
</table>

</td></tr></table>';
?>
