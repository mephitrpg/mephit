function get(q){
	q=document.f.elements[q].value;
	return (isNaN(q))?q:q*1;
}
function set(q,x){
	document.f.elements[q].value=x;
}
function exists(q){
	return (document.f.elements[q])?true:false;
}


CAR={"FOR":"","DES":"","COS":"","INT":"","SAG":"","CAR":""}
C=["FOR","DES","COS","INT","SAG","CAR"]

function M(q){
	q=Math.floor((q-10)/2);
	return ((q>0)?"+":"")+q;
}

function calcolaTotCar(){
	var t,x;
	for(t in CAR){
		x=get("punNobonus"+t)+get("raz"+t)+(exists("_21"+t)?get("_21"+t):0);
		set("pun"+t,x);
		set("mod"+t,M(x));
	}
//	combattimento();
//	carico();
}

function sposta(t1,t2){
	var temp=get("punNobonus"+t2);
	set("punNobonus"+t2,get("punNobonus"+t1));
	set("punNobonus"+t1,temp);
	calcolaTotCar(); //was: aggiornaForm_c(); 	calcolaModificatori();
/*
	if(document.f.classe.options.selectedIndex!=0)selezionaClasse(document.f.classe.options[document.f.classe.options.selectedIndex].text)
*/
}

function add(q,c){
	if(typeof P != "undefined"){
		// Punteggio caratteristica prima
		var C=get("punNobonus"+c);
		var Pc1=P[C];
		// Punteggio caratteristica dopo
		C=get("punNobonus"+c)+q;
		var Pc2=P[C];
		// Punti da sottrarre
		var Pc_range=Pc2-Pc1;
		// Punti totali
		var Pt=get("pun_tot")-Pc_range;
		if( C>=8 && C<=18 && Pt>=0 && Pt <= pmax ){
			set("punNobonus"+c,C);
			set("pun_tot",Pt);
			calcolaTotCar();
		}
	}else{
		var C=get("punNobonus"+c)+q;
		if( C>=3 ){
			set("punNobonus"+c,C);
			var T=C+get("raz"+c);
			set("pun"+c,T);
			set("mod"+c,M(T));
		}
	}
}

function selezionaRazza(q){
	for(t in CAR)set("raz"+t,(races[q][t]>0)?"+"+races[q][t]:races[q][t]);
	calcolaTotCar();
}
