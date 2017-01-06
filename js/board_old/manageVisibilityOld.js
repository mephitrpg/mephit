var useExtendVisibility = false;

/**
 * Oggetto che rappresenta un punto
 * @param x coordinata x
 * @param y coordinata y
 */
function point(x, y){
	this.x = x;
	this.y = y;
}
// -----------------------------------------------------------------------
/*
 * generaAreaVisibile(float)
 * - serve a calcolare quali quadretti sono interessati da un campo visivo
 * - accetta come parametro la distanza massima della visuale (in metri)
 * - restituisce una matrice di 0 (fuori campo visivo) e 1 (in campo visivo)
 */
function generaAreaVisibile(sight){
	if (areaVisibileCached != null) {
		return areaVisibileCached;
	}
	// calcolo raggio e diametro in quadretti
	var vision_q=Math.floor(sight/1.5);
	var vision_diametro_q=vision_q*2+1;
	// reset area visibile
	areaVisibile2=[];
	for(var i=0;i<vision_diametro_q;i++){
		areaVisibile2[i]=[];
		for(var j=0;j<vision_diametro_q;j++)areaVisibile2[i][j]=0;
	}
	// Perimetro: NORD EST
	for(var i=0,xy=vision_q;i<vision_q;i++,xy-=0.5){
		var everyTwo=parseInt(xy);
		var vertical={x:vision_q+i,y:vision_q-everyTwo};
		var horizontal={x:vision_q+everyTwo,y:vision_q-i};
		areaVisibile2[vertical.x][vertical.y]=1;
		areaVisibile2[horizontal.x][horizontal.y]=1;
		if(Math.abs(horizontal.y-vertical.y)<2)break;
	}
	// Perimetro: SUD EST
	for(var i=0,xy=vision_q;i<vision_q;i++,xy-=0.5){
		var everyTwo=parseInt(xy);
		var vertical={x:vision_q+i,y:vision_q+everyTwo};
		var horizontal={x:vision_q+everyTwo,y:vision_q+i};
		areaVisibile2[vertical.x][vertical.y]=1;
		areaVisibile2[horizontal.x][horizontal.y]=1;
		if(Math.abs(horizontal.y-vertical.y)<2)break;
	}
	// Perimetro: NORD WEST
	for(var i=0,xy=vision_q;i<vision_q;i++,xy-=0.5){
		var everyTwo=parseInt(xy);
		var vertical={x:vision_q-i,y:vision_q-everyTwo};
		var horizontal={x:vision_q-everyTwo,y:vision_q-i};
		areaVisibile2[vertical.x][vertical.y]=1;
		areaVisibile2[horizontal.x][horizontal.y]=1;
		if(Math.abs(horizontal.y-vertical.y)<2)break;
	}
	// Perimetro: SUD WEST
	for(var i=0,xy=vision_q;i<vision_q;i++,xy-=0.5){
		var everyTwo=parseInt(xy);
		var vertical={x:vision_q-i,y:vision_q+everyTwo};
		var horizontal={x:vision_q-everyTwo,y:vision_q+i};
		areaVisibile2[vertical.x][vertical.y]=1;
		areaVisibile2[horizontal.x][horizontal.y]=1;
		if(Math.abs(horizontal.y-vertical.y)<2)break;
	}
	// Area: FILL
	for(var i=1;i<vision_diametro_q-1;i++){
		var foundFirst1=false,foundSecond0=false;
		for(var j=0;j<vision_diametro_q;j++){
			if( areaVisibile2[i][j]==1 ){
				if(foundFirst1==false)foundFirst1=true;
				else if(foundSecond0==true)break;
			}else{
				if(foundFirst1==true){
					foundSecond0=true;
				}
				if(foundSecond0==true)areaVisibile2[i][j]=1;
			}
		}
	}
	areaVisibileCached = areaVisibile2;
	return areaVisibile2;
}
// -----------------------------------------------------------------------
/**
 * generaNuovoPerimetroVisibile()
 * - serve a calcolare le coordinate dei quadretti toccati dal perimetro di un campo visivo
 * - accetta come parametro la distanza massima della visuale (in metri)
 * - restituisce un array di punti
 */
function generaNuovoPerimetroVisibile(){
	if (perimetroVisibileCached != null) {
		return perimetroVisibileCached;
	}
	function contiene(perTmp, p){
		for (var t=0; t<perTmp.length; t++){
			if (perTmp[t].x == p.x && perTmp[t].y == p.y){
				return true;
			}
		}
		return false;
	}
	var perimetro = [];
	var areaVisTMP = areaVisibileCached;
	var mezzArea = Math.floor(areaVisTMP.length / 2);
	for (var i=0; i<=Math.floor(areaVisTMP.length / 2); i++){
		var foundFirst = false;
		for (var j=0; j<areaVisTMP[i].length; j++){
			if (!foundFirst){
				if (areaVisTMP[i][j]!=0){
					foundFirst = true;
					perimetro.push(new point(i-mezzArea, j-mezzArea));
					if (i!=Math.floor(areaVisTMP.length / 2))
						perimetro.push(new point(mezzArea-i, j-mezzArea));
				}
			} else {
				if (areaVisTMP[i][j]!=0){
					if ((areaVisTMP[i][j+1] != undefined && areaVisTMP[i][j+1] == 0) || !contiene(perimetro, new point(i-mezzArea-1, j-mezzArea))){
						perimetro.push(new point(i-mezzArea, j-mezzArea));
						if (i!=Math.floor(areaVisTMP.length / 2))
							perimetro.push(new point(mezzArea-i, j-mezzArea));
					}
				} else {
					continue;
				}
			}
		}
	}
	perimetroVisibileCached = perimetro;
	return perimetro;
}

function generaTestPerimetroVisibile(){
	var perimetro = [];
	//perimetro.push(new point(0, 13));
	//perimetro.push(new point(1, 12));
	perimetro.push(new point(-1, 12));
	perimetro.push(new point(-2, 12));
	//perimetro.push(new point(2, 12));
	return perimetro;
}
// -----------------------------------------------------------------------

	//please un numero pari!
	var dimensioneQuadretto = MAP.zoom;

	/**
	 * valori costanti caselle nell'area:
	 * 0= area_no
	 * 1= area_noMark
	 * 2= area_vis
	 * 3= area_noVis
	 */
	var area_no = 0;
	var area_noMark = 1;
	var area_vis = 2;
	var area_noVis = 3;

	/**
	 * Area visibile:
	 * 0= Non fa parte dell'area
	 * 1= Non ancora marcato
	 * 2= Marcato visibile
	 * 3= Marcato non visibile
	 */
	var areaVisibile;

	/**
	 * Elenco dei punti corrispondenti al perimetro dell'area visibile.
	 * I valori sono espressi in point con coordinate RELATIVE all'origine
	 */
	var perimetroVisibile;

	/**
	 * Ripristina lo stato iniziale dell'area
	 */
	function resetAreaVisibile(){
		areaVisibile = generaAreaVisibile(ME.sight);
		for (var i=0; i<areaVisibile.length; i++){
			for (var j=0; j<areaVisibile[i].length; j++){
				if (areaVisibile[i][j]!=0){
					areaVisibile[i][j] = 1;
				}
			}
		}
	}
	
	/**
	 * Funzione che marca tutte le caselle dell'area di visibilità.
	 * All'inizio invoca individuaPerPerimetro(origine, perimetro) passandogli tutto
	 * il perimetro visibile. Viene poi chiamato getCaselleNotMarked per trovare eventuali
	 * punti che non sono stati marcati. Se ne trova richiama individuaPerPerimetro(origine, perimetro)
	 * passandogli come perimetro l'array di punti non marcati appena trovati.
	 * @param origine oggetto di tipo point contenente le coordinate ASSOLUTE SULLA MAPPA
	 */
	function individuaVisibilita(origine){
		resetAreaVisibile();
		perimetroVisibile = generaNuovoPerimetroVisibile() ;
		//perimetroVisibile = generaTestPerimetroVisibile() ;
		//l'origine è visibile
		write_area(area_vis, 0, 0);
		marcaKnownMap(origine.x, origine.y);
		individuaPerPerimetro(origine, perimetroVisibile);
		var newPerimetro = getCaselleNotMarked();
		if (newPerimetro.length > 0){
			individuaPerPerimetro(origine, newPerimetro);
		}
	}

	/**
	 * Funzione di marcatura della casella
	 * @param xCas coordinata x della casella da marcare in coordinate ASSOLUTE SULLA MAPPA
	 * @param yCas coordinata y della casella da marcare in coordinate ASSOLUTE SULLA MAPPA
	 * @param origine oggetto di tipo point contenente le coordinate ASSOLUTE SULLA MAPPA
	 * @return true se ha trovato un muro, false altrimenti
	 */
	function marcaCasella(xCas, yCas, origine){
		//trovo le coordinate RELATIVE della casella Cas
		var xCArea = xCas - origine.x;
		var yCArea = yCas - origine.y;
		if (read_area(xCArea,yCArea) == area_noMark){// || read_area(xCArea,yCArea) == area_noVis){
			if (MAP.view[xCas][yCas] == 2){
				write_area(area_noVis, xCArea, yCArea);
				return true;
			} else {
				write_area(area_vis, xCArea, yCArea);
				marcaKnownMap(xCas, yCas);
				return false;
			}
		} else {
			if (MAP.view[xCas][yCas] == 2){
				return true;
			} else {
				return false;
			}
		}
	}

	/**
	 * Funzione per leggere nell'area di visibilità. Ritorna il contenuto dell'area
	 * alle coordinate RELATIVE all'origine
	 * @param x coordinata x RELATIVA all'origine
	 * @param y coordinata y RELATIVA all'origine
	 * @return il contenuto della cella nell'area
	 */
	function read_area(x,y){
		var halfArea = Math.floor(areaVisibile.length/2);
		return areaVisibile[x+halfArea][y+halfArea];
	}

	/**
	 * Funzione per scrivere nell'area di visibilità. Scrive nell'area il valore di input
	 * nel punto di coordinate RELATIVE all'origine
	 * @param input il valore da inserire
	 * @param x coordinata x RELATIVA all'origine
	 * @param y coordinata y RELATIVA all'origine
	 * @return il contenuto della cella nell'area
	 */
	function write_area(input, x, y){
		var halfArea = Math.floor(areaVisibile.length/2);
		areaVisibile[x+halfArea][y+halfArea] = input;
	}

	/**
	 * Funzione che ricerca eventuali caselle non marcate nell'area di visibilità
	 * @return un array di point in coordinate RELATIVE all'origine
	 */
	function getCaselleNotMarked(){
		var caselleNotMarked = new Array();
		var halfArea = Math.floor(areaVisibile.length/2);
		for (var x=-halfArea; x<=halfArea; x++){
			for (var y=-halfArea; y<=halfArea; y++){
				if (read_area(x,y) == area_noMark){
					caselleNotMarked.push(new point(x,-y));
				}
			}
		}
		return caselleNotMarked;
	}

	/**
	 * Funzione che marca tutte le caselle dell'area individuata dal perimetro passato.
	 * Partendo dall'origine prende tutti i punti del perimetro passato
	 * e considera il segmento individuato. Trova tutte le celle toccate dal segmento così
	 * individuato e, se non già marcate, le confronta con la matrice della mappa. Se la cella
	 * è un muro allora la si marca come non visibile e tutte le celle successive le si marca
	 * come non visibili
	 * @param origine oggetto di tipo point contenente le coordinate ASSOLUTE SULLA MAPPA
	 * @param perimetro un Array di point che individuano il perimetro da visualizzare in
	 * coordinate RELATIVE all'origine
	 */
	function individuaPerPerimetro(origine, perimetro){
		
		//trovo il centro dell'origine in coordinate assolute
		var xO = origine.x*dimensioneQuadretto + (dimensioneQuadretto/2);
		var yO = origine.y*dimensioneQuadretto + (dimensioneQuadretto/2);
		for (var i=0; i<perimetro.length; i++){
			//individuo il punto della circonferenza
			var xPC = (origine.x + perimetro[i].x)*dimensioneQuadretto + (dimensioneQuadretto/2);
			var yPC = (origine.y - perimetro[i].y)*dimensioneQuadretto + (dimensioneQuadretto/2);
			//ora individuo la retta O - PC
			var rettaVerticale = false;
			if (xO == xPC){
				rettaVerticale = true;
			}
			var mR = null;
			var qR = null;
			if (!rettaVerticale){
				mR = new Number((yO - yPC)/(xO - xPC)).toFixed(6);
				qR = yO - mR*xO;
				//punto temporaneo per individuare il quadretto
				var xPT = null;
				var yPT = null;
				//marcatore che mi dice se ho individuato un muro
				var muroFound = false;
				while (xPT == null || Math.abs(xPT - xO) <= Math.abs(xPC - xO)){
					if (xPT != null){
						var xCas = Math.floor(xPT/dimensioneQuadretto);
						var yCas = Math.floor(yPT/dimensioneQuadretto);
						if (!muroFound){
							//ora che ho le coordinate della casella guardo nella matrice e la marco
							muroFound = marcaCasella(xCas, yCas, origine);
						} else {
							//ho trovato un muro al primo passaggio. Tutte le caselle saranno non visibili
							//se non sono già state marcate come visibili
							//trovo le coordinate RELATIVE della casella Cas
							var xCArea = xCas - origine.x;
							var yCArea = yCas - origine.y;
							if (read_area(xCArea,yCArea) == area_noMark){
								write_area(area_noVis, xCArea, yCArea);
							}
							//areaVisibile[xCArea][yCArea] = area_vis;
						}
					}
					//avanzo nella retta
					if (xPT == null){
						xPT = xO;
					}
					if (yPT == null){
						yPT = yO;
					}
					if (Math.abs(mR) >= 1 ){
						//se m > 1 avanzo di y
						if (yPC >= yO){
							yPT = yPT + new Number(dimensioneQuadretto/4);
						} else {
							yPT = yPT - new Number(dimensioneQuadretto/4);
						}
						xPT = new Number((yPT - qR)/mR).toFixed(6);
					} else {
						//se m < 1 avanzo di x
						if (xPC >= xO){
							xPT = xPT + (dimensioneQuadretto/4);
						} else {
							xPT = xPT - (dimensioneQuadretto/4);
						}
						yPT = mR*xPT + qR;
					}
				}
			} else {
				//punto temporaneo per individuare il quadretto
				var xPT = null;
				var yPT = null;
				//marcatore che mi dice se ho individuato un muro
				var muroFound = false;
				while (yPT == null || Math.abs(yPT - yO) <= Math.abs(yPC - yO)){
					if (yPT != null){
						var xCas = Math.floor(xPT/dimensioneQuadretto);
						var yCas = Math.floor(yPT/dimensioneQuadretto);
						if (!muroFound){
							//ora che ho le coordinate della casella guardo nella matrice e la marco
							muroFound = marcaCasella(xCas, yCas, origine);
						} else {
							//ho trovato un muro al primo passaggio. Tutte le caselle saranno non visibili
							//trovo le coordinate RELATIVE della casella Cas
							var xCArea = xCas - origine.x;
							var yCArea = yCas - origine.y;
							if (read_area(xCArea,yCArea) == area_noMark){
								write_area(area_noVis, xCArea, yCArea);
							}
							//areaVisibile[xCArea][yCArea] = area_vis;
						}
					}
					//avanzo nella retta
					if (xPT == null){
						xPT = xO;
					}
					if (yPT == null){
						yPT = yO;
					}
					if (yPC >= yO){
						yPT = yPT + (dimensioneQuadretto/4);
					} else {
						yPT = yPT - (dimensioneQuadretto/4);
					}
				}
			}
		}
	}

	/**
	 * Funzione che marca come noto un pixel della mappa generale.
	 * Esso setta come noto la posizione passata e tutte le 8 posizioni
	 * attorno (se presenti)
	 * @param xCas coordinata x della casella da marcare in coordinate ASSOLUTE SULLA MAPPA
	 * @param yCas coordinata y della casella da marcare in coordinate ASSOLUTE SULLA MAPPA
	 */
	function marcaKnownMap(xCas, yCas){
		if (MAP.known[yCas][xCas]==0){
			MAP.known[yCas][xCas] = 1;
		}
		if (MAP.known[yCas-1] && MAP.known[yCas-1][xCas-1]!= undefined){
			if (MAP.known[yCas-1][xCas-1]==0 && MAP.view[xCas-1][yCas-1]==2){
				MAP.known[yCas-1][xCas-1]=1;
			}
		}
		if (MAP.known[yCas-1] && MAP.known[yCas-1][xCas]!= undefined){
			if (MAP.known[yCas-1][xCas]==0 && MAP.view[xCas][yCas-1]==2){
				MAP.known[yCas-1][xCas]=1;
			}
		}
		if (MAP.known[yCas-1] && MAP.known[yCas-1][xCas+1]!= undefined){
			if (MAP.known[yCas-1][xCas+1]==0 && MAP.view[xCas+1][yCas-1]==2){
				MAP.known[yCas-1][xCas+1]=1;
			}
		}
		if (MAP.known[yCas] && MAP.known[yCas][xCas-1]!= undefined){
			if (MAP.known[yCas][xCas-1]==0 && MAP.view[xCas-1][yCas]==2){
				MAP.known[yCas][xCas-1]=1;
			}
		}
		if (MAP.known[yCas] && MAP.known[yCas][xCas+1]!= undefined){
			if (MAP.known[yCas][xCas+1]==0 && MAP.view[xCas+1][yCas]==2){
				MAP.known[yCas][xCas+1]=1;
			}
		}
		if (MAP.known[yCas+1] && MAP.known[yCas+1][xCas-1]!= undefined){
			if (MAP.known[yCas+1][xCas-1]==0 && MAP.view[xCas-1][yCas+1]==2){
				MAP.known[yCas+1][xCas-1]=1;
			}
		}
		if (MAP.known[yCas+1] && MAP.known[yCas+1][xCas]!= undefined){
			if (MAP.known[yCas+1][xCas]==0 && MAP.view[xCas][yCas+1]==2){
				MAP.known[yCas+1][xCas]=1;
			}
		}
		if (MAP.known[yCas+1] && MAP.known[yCas+1][xCas+1]!= undefined){
			if (MAP.known[yCas+1][xCas+1]==0 && MAP.view[xCas+1][yCas+1]==2){
				MAP.known[yCas+1][xCas+1]=1;
			}
		}
	}

	function checkSureNonVis(xCas, yCas, origine){
		if (xCas == origine.x || yCas == origine.y){
			//se rette orizzontali o verticali allora sicuramente non vedo il punto
			return true;
		}
		//Cominciamo con trovare gli angoli di ogni punto:
		var angASO = null;
		var angADO = null;
		var angBSO = null;
		var angBDO = null;
		var angASCas = null;
		var angADCas = null;
		var angBSCas = null;
		var angBDCas = null;

		var angASOx = (origine.x)*dimensioneQuadretto;
		var angASOy = (origine.y+1)*dimensioneQuadretto;
		angASO = new point(angASOx, angASOy);
		var angADOx = (origine.x+1)*dimensioneQuadretto;
		var angADOy = (origine.y+1)*dimensioneQuadretto;
		angADO = new point(angADOx, angADOy);
		var angBSOx = origine.x*dimensioneQuadretto;
		var angBSOy = origine.y*dimensioneQuadretto;
		angBSO = new point(angBSOx, angBSOy);
		var angBDOx = (origine.x+1)*dimensioneQuadretto;
		var angBDOy = origine.y*dimensioneQuadretto;
		angBDO = new point(angBDOx, angBDOy);

		var angASCasx = xCas*dimensioneQuadretto;
		var angASCasy = (yCas+1)*dimensioneQuadretto;
		angASCas = new point(angASCasx, angASCasy);
		var angADCasx = (xCas+1)*dimensioneQuadretto;
		var angADCasy = (yCas+1)*dimensioneQuadretto;
		angADCas = new point(angADCasx, angADCasy);
		var angBSCasx = xCas*dimensioneQuadretto;
		var angBSCasy = yCas*dimensioneQuadretto;
		angBSCas = new point(angBSCasx, angBSCasy);
		var angBDCasx = (xCas+1)*dimensioneQuadretto;
		var angBDCasy = yCas*dimensioneQuadretto;
		angBDCas = new point(angBDCasx, angBDCasy);


		//Ora ho i vari punti che mi interessano. Devo individuare le parallele
		//Se xCas > origine.x && yCas > origine.y -> AS-AS e BD-BD
		//Se xCas > origine.x && yCas < origine.y -> AD-AD e BS-BS
		//Se xCas < origine.x && yCas > origine.y -> AD-AD e BS-BS
		//Se xCas < origine.x && yCas < origine.y -> AS-AD e BS-BD

		var pO1 = null;
		var pO2 = null;
		var pCas1 = null;
		var pCas2 = null;
		if ((xCas > origine.x && yCas > origine.y) || (xCas < origine.x && yCas < origine.y)){
			pO1 = angASO;
			pCas1 = angASCas;
			pO2 = angBDO;
			pCas2 = angBDCas;
		} else {
			pO1 = angADO;
			pCas1 = angADCas;
			pO2 = angBSO;
			pCas2 = angBSCas;
		}

		var mDiago1 = null;
		var qDiago1 = null;
		var mDiago2 = null;
		var qDiago2 = null;

		//var mR = null;
		//var qR = null;
		mDiago1 = new Number((pO1.y - pCas1.y)/(pO1.x - pCas1.x)).toFixed(6);
		qDiago1 = pO1.y - mDiago1*pO1.x;
		mDiago2 = new Number((pO2.y - pCas2.y)/(pO2.x - pCas2.x)).toFixed(6);
		qDiago2 = pO2.y - mDiago2*pO2.x;
		var rettaInterrotta = false;

		//punto temporaneo per individuare il quadretto
		var xPT = null;
		var yPT = null;
		//marcatore che mi dice se ho individuato un muro
		while (xPT == null || Math.abs(xPT - pO1.x) <= Math.abs(pCas1.x - pO1.x)){
			if (xPT != null){
				var xCasT = Math.floor(xPT/dimensioneQuadretto);
				var yCasT = Math.floor(yPT/dimensioneQuadretto);
				if (MAP.view[xCasT][yCasT] == 2){
					//ho trovato un muro, significa retta interrotta
					rettaInterrotta = true;
					break;
				}
			}
			if (xPT == null){
				xPT = pO1.x;
			}
			if (yPT == null){
				yPT = pO1.y;
			}
			if (Math.abs(mDiago1) >= 1 ){
				//se m > 1 avanzo di y
				if (pCas1.y >= pO1.y){
					yPT = yPT + (dimensioneQuadretto/4);
				} else {
					yPT = yPT - (dimensioneQuadretto/4);
				}
				xPT = new Number((yPT - qDiago1)/mDiago1).toFixed(6);
			} else {
				//se m < 1 avanzo di x
				if (pCas1.x >= pO1.x){
					xPT = xPT + (dimensioneQuadretto/4);
				} else {
					xPT = xPT - (dimensioneQuadretto/4);
				}
				yPT = mDiago1*xPT + qDiago1;
			}
		}
		if (!rettaInterrotta){
			//Ho una retta libera, posso dire che cella è visibile
			return false;
		}
		xPT = null;
		yPT = null;
		//marcatore che mi dice se ho individuato un muro
		while (xPT == null || Math.abs(xPT - pO2.x) <= Math.abs(pCas2.x - pO2.x)){
			if (xPT != null){
				var xCasT = Math.floor(xPT/dimensioneQuadretto);
				var yCasT = Math.floor(yPT/dimensioneQuadretto);
				if (MAP.view[xCasT][yCasT] == 2){
					//ho trovato un muro, significa retta interrotta, essendo la seconda
					//retta allora sicuramente la cella non è visibile
					return true;
				}
			}
			if (xPT == null){
				xPT = pO2.x;
			}
			if (yPT == null){
				yPT = pO2.y;
			}
			if (Math.abs(mDiago2) >= 1 ){
				//se m > 1 avanzo di y
				if (pCas2.y >= pO2.y){
					yPT = yPT + (dimensioneQuadretto/4);
				} else {
					yPT = yPT - (dimensioneQuadretto/4);
				}
				xPT = new Number((yPT - qDiago2)/mDiago2).toFixed(6);
			} else {
				//se m < 1 avanzo di x
				if (pCas1.x >= pO2.x){
					xPT = xPT + (dimensioneQuadretto/4);
				} else {
					xPT = xPT - (dimensioneQuadretto/4);
				}
				yPT = mDiago2*xPT + qDiago2;
			}
		}
		//se è arrivato fin qua allora almeno la seconda retta è visibile
		return false;
	}