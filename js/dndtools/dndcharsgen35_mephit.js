function togli(q){
	with(document.f){
		if(elements["pun"+q].value*1>2){
			togliMettiElimina.disabled=true;
			togliMettiAnnulla.disabled=false;
			togliMettiTemp.value=q;
			elements["pun"+q].value=elements["pun"+q].value*1-2;
			elements["_21"+q].value=elements["_21"+q].value*1-2;
			elements["mod"+q].value=M(elements["pun"+q].value*1);
			if(elements["mod"+q].value*1>0)elements["mod"+q].value="+"+elements["mod"+q].value;
			for(t in CAR){
				elements["togli"+t].disabled=true;
				elements["metti"+t].disabled=false;
			}
			elements["metti"+q].disabled=true;
		}
	}
	calcolaTotCar(); 
/*
	//incantesimi Bonus
	incantesimi();
	//linguaggi Bonus
	linguaggi();
	combattimento();
	carico();
*/
}

function metti(q){
	with(document.f){
		togliMettiElimina.disabled=false;
		togliMettiAnnulla.disabled=true;
		elements["pun"+q].value=elements["pun"+q].value*1+1;
		elements["_21"+q].value=elements["_21"+q].value*1+1;
		elements["mod"+q].value=M(elements["pun"+q].value*1);
		if(elements["mod"+q].value*1>0)elements["mod"+q].value="+"+elements["mod"+q].value;
		i=togliMettiTot.options.length;
		togliMettiTot.options[i]=new Option;
		togliMettiTot.options[i].text=togliMettiTemp.value+">"+q;
		togliMettiTemp.value="";
		for(t in CAR){
			elements["togli"+t].disabled=false;
			elements["metti"+t].disabled=true;
		}
	}
	calcolaTotCar(); 
/*
	//incantesimi Bonus
	incantesimi();
	//linguaggi Bonus
	linguaggi();
	combattimento();
	carico();
*/
}

function togliMettiAnnulla_doIt(){
	with(document.f){
		q=togliMettiTemp.value;
		if(togliMettiTot.options.length>0)togliMettiElimina.disabled=false;
		togliMettiAnnulla.disabled=true;
		elements["pun"+q].value=elements["pun"+q].value*1+2;
		elements["_21"+q].value=elements["_21"+q].value*1+2;
		elements["mod"+q].value=M(elements["pun"+q].value*1);
		if(elements["mod"+q].value*1>0)elements["mod"+q].value="+"+elements["mod"+q].value;
		togliMettiTemp.value="";
		for(t in CAR){
			elements["togli"+t].disabled=false;
			elements["metti"+t].disabled=true;
		}
	}
	calcolaTotCar(); 
/*
	//incantesimi Bonus
	incantesimi();
	//linguaggi Bonus
	linguaggi();
	combattimento();
	carico();
*/
}

function togliMettiElimina_doIt(){
	with(document.f){
		var k=togliMettiTot.options.selectedIndex;
		if(k!=-1){
			t=togliMettiTot.options[togliMettiTot.options.selectedIndex].text;
			t=t.split(">");
			elements["pun"+t[0]].value=elements["pun"+t[0]].value*1+2;
			elements["_21"+t[0]].value=elements["_21"+t[0]].value*1+2;
			elements["pun"+t[1]].value=elements["pun"+t[1]].value*1-1;
			elements["_21"+t[1]].value=elements["_21"+t[1]].value*1-1;
			for(q in t){
				q=t[q];
				elements["mod"+q].value=M(elements["pun"+q].value*1);
				if(elements["mod"+q].value*1>0)elements["mod"+q].value="+"+elements["mod"+q].value;
			}
			togliMettiTot.options[togliMettiTot.options.selectedIndex]=null;
			if(togliMettiTot.options.length<1)togliMettiElimina.disabled=true;

			if(document.f.togliMettiTot.options[k]){
				document.f.togliMettiTot.options.selectedIndex=k;
			}else{
				if(k>0){
					if(document.f.togliMettiTot.options[k-1]){
						document.f.togliMettiTot.options.selectedIndex=k-1;
					}
				}
			}
		
		}else alert("Seleziona uno dei cambi punti fatti in precedenza");
	}
	calcolaTotCar(); 
/*
	//incantesimi Bonus
	incantesimi();
	//linguaggi Bonus
	linguaggi();
	combattimento();
	carico();
*/
}
