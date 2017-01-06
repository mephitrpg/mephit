controlla=new Array(0,1);
annulla=0;
function controllaScambio(questo,value){
	altro=(questo)?0:1;
	if(value!=controlla[altro])controlla[questo]=value;
	else document.f.elements["car"+questo][controlla[questo]].checked=1;
}
function scambia(){
	var t;
	sposta(C[controlla[0]],C[controlla[1]]);
	if(annulla){
		annulla=0;
		set("btnScambia","Scambia");
/*		controlla[0]=0;
		document.f.car0[0].checked=1;
		controlla[1]=1;
		document.f.car1[1].checked=1;
*/		for(i=0;i<6;i++)document.f.car0[i].disabled=0;
		for(i=0;i<6;i++)document.f.car1[i].disabled=0;
	}else{
		annulla=1;
		set("btnScambia","Annulla scambio");
		for(i=0;i<6;i++)document.f.car0[i].disabled=1;
		for(i=0;i<6;i++)document.f.car1[i].disabled=1;
	}
	calcolaTotCar();
}