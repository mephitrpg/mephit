/*
 ****************************
 * Gestione eventi tastiera *
 ****************************
 */
 
Event.observe(document, 'keyup', function(e){
	var goTo,direction="",canImove=true,percorso=ME.percorso,percorso_diagonale=ME.percorso_diagonale;
	// Ricevo keystroke
	var KeyID = (window.event) ? event.keyCode : e.keyCode;
	// Controllo la direzione
	switch(KeyID){
		case 87: // w / n
			goTo={x:ME.x-0,y:ME.y-1};
			direction="n";
		break;
		case 68: // d / e
			goTo={x:ME.x+1,y:ME.y-0};
			direction="e";
		break;
		case 83: // s / s
			goTo={x:ME.x-0,y:ME.y+1};
			direction="s";
		break;
		case 65: // a / w
			goTo={x:ME.x-1,y:ME.y-0};
			direction="w";
		break;
		case 81: // q / nw
			goTo={x:ME.x-1,y:ME.y-1};
			direction="nw";
		break;
		case 69: // e / ne
			goTo={x:ME.x+1,y:ME.y-1};
			direction="ne";
		break;
		case 67: // c / se
			goTo={x:ME.x+1,y:ME.y+1};
			direction="se";
		break;
		case 90: // z / sw
			goTo={x:ME.x-1,y:ME.y+1};
			direction="sw";
		break;
		default:
			return false;
		break;
	}
	// Se la destinazione è un ostacolo non posso muovermi
	if(MAP.tiles[MAP.matrix[goTo.x][goTo.y]].key=='wall'){
		// TO DO: implementare tipi di ostacoli
		return false;
	}
	// Se mi muovo in diagonale ma a N S E oppure W c'è un muro non posso muovermi
	switch(direction){
		case"ne":
			if(MAP.tiles[MAP.matrix[ME.x][ME.y-1]].key=='wall')return false;
			if(MAP.tiles[MAP.matrix[ME.x+1][ME.y]].key=='wall')return false;
		break;
		case"nw":
			if(MAP.tiles[MAP.matrix[ME.x][ME.y-1]].key=='wall')return false;
			if(MAP.tiles[MAP.matrix[ME.x-1][ME.y]].key=='wall')return false;
		break;
		case"se":
			if(MAP.tiles[MAP.matrix[ME.x][ME.y+1]].key=='wall')return false;
			if(MAP.tiles[MAP.matrix[ME.x+1][ME.y]].key=='wall')return false;
		break;
		case"sw":
			if(MAP.tiles[MAP.matrix[ME.x][ME.y+1]].key=='wall')return false;
			if(MAP.tiles[MAP.matrix[ME.x-1][ME.y]].key=='wall')return false;
		break;
	}
	
	switch(direction){
		case"n": // w / n
			percorso+=1.5;
		break;
		case"e": // d / e
			percorso+=1.5;
		break;
		case"s": // s / s
			percorso+=1.5;
		break;
		case"w": // a / w
			percorso+=1.5;
		break;
		case"nw": // q / nw
			percorso+=(percorso_diagonale)?3:1.5;
			percorso_diagonale=!percorso_diagonale;
		break;
		case"ne": // e / ne
			percorso+=(percorso_diagonale)?3:1.5;
			percorso_diagonale=!percorso_diagonale;
		break;
		case"se": // c / se
			percorso+=(percorso_diagonale)?3:1.5;
			percorso_diagonale=!percorso_diagonale;
		break;
		case"sw": // z / sw
			percorso+=(percorso_diagonale)?3:1.5;
			percorso_diagonale=!percorso_diagonale;
		break;
	}
	var singleBarLength=100;
	if(percorso<ME.speed){
		// azione di movimento
		var perc=percorso/ME.speed;
		var f=Math.floor(perc*singleBarLength);
		var r=singleBarLength-f;
		$('movimento_fatto').setStyle({width:f+'px'});
//		$('movimento_restante').setStyle({width:r+'px'});
	}else if(percorso==ME.speed){
		// azione di movimento
		$('movimento_fatto').setStyle({width:singleBarLength+'px'});
//		$('movimento_restante').setStyle({width:0+'px'});
	}else if(percorso<ME.speed*2){
		// azione standard
		$('movimento_fatto').setStyle({width:singleBarLength+'px'});
//		$('movimento_restante').setStyle({width:0+'px'});
		var perc=(percorso-ME.speed)/ME.speed;
		var f=Math.floor(perc*singleBarLength);
		var r=singleBarLength-f;
		$('standard_fatto').setStyle({width:f+'px'});
//		$('standard_restante').setStyle({width:r+'px'});
	}else if(percorso==ME.speed*2){
		// azione standard
		$('movimento_fatto').setStyle({width:singleBarLength+'px'});
//		$('movimento_restante').setStyle({width:0+'px'});
		$('standard_fatto').setStyle({width:singleBarLength+'px'});
//		$('standard_restante').setStyle({width:0+'px'});
	}else{
		canImove=false;
	}
	
	if(!canImove){
		// return false;
		/**/
		// debug:
		ME.setParam({x:goTo.x});
		ME.setParam({y:goTo.y});
		ME.setParam({percorso:0});
		ME.setParam({percorso_diagonale:false});
		$('movimento_fatto').setStyle({width:0+'px'});
//		$('movimento_restante').setStyle({width:singleBarLength+'px'});
		$('standard_fatto').setStyle({width:0+'px'});
//		$('standard_restante').setStyle({width:singleBarLength+'px'});
		draw(goTo.x,goTo.y);
		// :debug
		/**/
	}else{
		ME.setParam({x:goTo.x});
		ME.setParam({y:goTo.y});
		ME.setParam({percorso:percorso});
		ME.setParam({percorso_diagonale:percorso_diagonale});
		draw(goTo.x,goTo.y);
	}
//	console.log(KeyID);
},false);
