/**
 * DIPENDE da visibUtility.js
 */

var debugMode = false;
var useExtendVisibility = false;

/**
 * generaNewAreaVisibile(float)
 * serve a calcolare quali quadretti sono interessati da un campo visivo in base
 * a una circonferenza di diametro 2*(sight/1.5) + 1
 * @param sight la visibilita espressa in metri. Ogni quadretto è 1.5 mentri.
 * @return una matrice di 0 (fuori campo visivo) e 1 (in campo visivo) normale
 */
function generaNewAreaVisibile(sight){
	if (areaVisibileCached != null) {
		return areaVisibileCached;
	}
	// calcolo raggio e diametro in quadretti
	var vision_q=Math.floor(sight/1.5);
	var vision_diametro_q=vision_q*2+1;
	// reset area visibile
	var areaVisibileTmp=[];
	var areaVisibileStr=[];
	//inizializzo area visibile a tutti 0
	for(var i=0;i<vision_diametro_q;i++){
		areaVisibileTmp[i]=[];
		areaVisibileStr[i]=[];
		for(var j=0;j<vision_diametro_q;j++){
			areaVisibileTmp[i][j]=0;
			areaVisibileStr[i][j]="0";
		}
	}
	var vision_raggio_q = vision_diametro_q/2;
	var angolo = 0;
	//il centro è visibile
	areaVisibileTmp[vision_q][vision_q]=1;
	areaVisibileStr[vision_q][vision_q]="1";
	//procediamo con un degli step in modo che si copra sempre al massimo
	//mezzo quadretto
	while (angolo < (2*Math.PI)){
		for (var s=0.5; s<=vision_q; s+=0.5){
			var x = Math.round(s*Math.cos(angolo)+vision_q);
			var y = Math.round(s*Math.sin(angolo)+vision_q);
			if (areaVisibileTmp[x][y]==0){
				areaVisibileTmp[x][y]=1;
				areaVisibileStr[x][y]="1";
			}
		}
		angolo+= (1/(2*vision_raggio_q));
	}
	areaVisibileCached = areaVisibileTmp;

//	var alertArea = "";
//	for (var i=0; i<areaVisibileStr.length; i++){
//		for(var j=0;j<vision_diametro_q;j++){
//			alertArea += areaVisibileStr[i][j];
//		}
//		alertArea += "\n";
//	}
//	alert (alertArea);
	return areaVisibileTmp;
}

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
	 * Ripristina lo stato iniziale dell'area
	 */
	function resetAreaVisibile(){
		areaVisibile = generaNewAreaVisibile(ME.sight);
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
	 * @param origine oggetto di tipo point contenente le coordinate ASSOLUTE SULLA MAPPA
	 */
	function individuaVisibilita(origine){
		resetAreaVisibile();
		//l'origine è visibile
		write_area(area_vis, 0, 0);
		marcaKnownMap(origine.x, origine.y);
		individuaPerSight(origine, ME.sight);
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
		if (read_area(xCArea,yCArea) == area_noMark || read_area(xCArea,yCArea) == area_noVis){
			if (MAP.view[xCas][yCas] == 2){
				write_area(area_noVis, xCArea, yCArea);
				MAP.known[yCas][xCas]=1
				return true;
			} else {
				write_area(area_vis, xCArea, yCArea);
				marcaKnownMap(xCas, yCas);
				return false;
			}
		} else {
			if (MAP.view[xCas][yCas] == 2){
				MAP.known[yCas][xCas]=1
				return true;				
			} else {
				return false;
			}
		}
	}

	/**
	 * Funzione per leggere nell'area di visibilitï¿½. Ritorna il contenuto dell'area
	 * alle coordinate RELATIVE all'origine
	 * @param x coordinata x RELATIVA all'origine
	 * @param y coordinata y RELATIVA all'origine
	 * @return il contenuto della cella nell'area
	 */
	function read_area(x,y){
		var halfArea = Math.floor(areaVisibile.length/2);
//		if (debugMode) {
//			alert ("read_area: X: " + x + ", y: " + y + "\nDimensione areaVisibile: " + areaVisibile.length/2);
//		}
		try {
			return areaVisibile[x+halfArea][y+halfArea];
		}
		catch (e){
			alert ("read_area: X: " + x + ", y: " + y + "\n"+
				"Mezza dimensione areaVisibile: " + halfArea);
		}
	}

	/**
	 * Funzione per scrivere nell'area di visibilitï¿½. Scrive nell'area il valore di input
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
	 * Funzione che marca tutte le caselle dell'area individuata dal perimetro passato.
	 * Partendo dall'origine prende tutti i punti del perimetro passato
	 * e considera il segmento individuato. Trova tutte le celle toccate dal segmento cosï¿½
	 * individuato e, se non giï¿½ marcate, le confronta con la matrice della mappa. Se la cella
	 * ï¿½ un muro allora la si marca come non visibile e tutte le celle successive le si marca
	 * come non visibili
	 * @param origine oggetto di tipo point contenente le coordinate ASSOLUTE SULLA MAPPA
	 * @param sight la visibilità in metri
	 * coordinate RELATIVE all'origine
	 */
	function individuaPerSight(origine, sight){

		// calcolo raggio e diametro in quadretti
		var vision_q=Math.floor(sight/1.5);
		var vision_diametro_q=vision_q*2+1;
		var angolo = 0;
		if (debugMode){
			angolo = 5;
		}
		//procediamo con un degli step in modo che si copra sempre al massimo
		//mezzo quadretto
		var maxTheta = 2*Math.PI;
		if (debugMode){
			maxTheta = 5;
		}
		while (angolo <= maxTheta){
			var muroFound = false;
			for (var s=0.5; s<=vision_q; s+=0.5){
				var xRel = Math.round(s*Math.cos(angolo));
				var yRel = Math.round(s*Math.sin(angolo));
				var xAss = xRel+origine.x;
				var yAss = yRel+origine.y;
				if (!muroFound){
					//ora che ho le coordinate della casella guardo nella matrice e la marco
					muroFound = marcaCasella(xAss, yAss, origine);
				} else {
					//ho trovato un muro al primo passaggio. Tutte le caselle saranno non visibili
					//se non sono già state marcate come visibili
					//trovo le coordinate RELATIVE della casella Cas
					write_area(area_noVis, xRel, yRel);
					//areaVisibile[xCArea][yCArea] = area_vis;
				}
			}
			var deltaAngolo = 1/vision_diametro_q;
			if (debugMode){
				deltaAngolo = 0.1;
			}
			angolo+= deltaAngolo;
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
//		if (MAP.known[yCas-1] && MAP.known[yCas-1][xCas-1]!= undefined){
//			if (MAP.known[yCas-1][xCas-1]==0 && MAP.view[xCas-1][yCas-1]==2){
//				MAP.known[yCas-1][xCas-1]=1;
//			}
//		}
//		if (MAP.known[yCas-1] && MAP.known[yCas-1][xCas]!= undefined){
//			if (MAP.known[yCas-1][xCas]==0 && MAP.view[xCas][yCas-1]==2){
//				MAP.known[yCas-1][xCas]=1;
//			}
//		}
//		if (MAP.known[yCas-1] && MAP.known[yCas-1][xCas+1]!= undefined){
//			if (MAP.known[yCas-1][xCas+1]==0 && MAP.view[xCas+1][yCas-1]==2){
//				MAP.known[yCas-1][xCas+1]=1;
//			}
//		}
//		if (MAP.known[yCas] && MAP.known[yCas][xCas-1]!= undefined){
//			if (MAP.known[yCas][xCas-1]==0 && MAP.view[xCas-1][yCas]==2){
//				MAP.known[yCas][xCas-1]=1;
//			}
//		}
//		if (MAP.known[yCas] && MAP.known[yCas][xCas+1]!= undefined){
//			if (MAP.known[yCas][xCas+1]==0 && MAP.view[xCas+1][yCas]==2){
//				MAP.known[yCas][xCas+1]=1;
//			}
//		}
//		if (MAP.known[yCas+1] && MAP.known[yCas+1][xCas-1]!= undefined){
//			if (MAP.known[yCas+1][xCas-1]==0 && MAP.view[xCas-1][yCas+1]==2){
//				MAP.known[yCas+1][xCas-1]=1;
//			}
//		}
//		if (MAP.known[yCas+1] && MAP.known[yCas+1][xCas]!= undefined){
//			if (MAP.known[yCas+1][xCas]==0 && MAP.view[xCas][yCas+1]==2){
//				MAP.known[yCas+1][xCas]=1;
//			}
//		}
//		if (MAP.known[yCas+1] && MAP.known[yCas+1][xCas+1]!= undefined){
//			if (MAP.known[yCas+1][xCas+1]==0 && MAP.view[xCas+1][yCas+1]==2){
//				MAP.known[yCas+1][xCas+1]=1;
//			}
//		}
	}
