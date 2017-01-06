function handleKeys(evt) {
	evt = (evt) ? evt : ((event) ? event : null);
	var KeyID = evt.keyCode;
	
  switch(KeyID){
		case 87: // w / n
			goTo={x:PG.x-0,y:PG.y-1};
			direction="n";
		break;
		case 68: // d / e
			goTo={x:PG.x+1,y:PG.y-0};
			direction="e";
		break;
		case 83: // s / s
			goTo={x:PG.x-0,y:PG.y+1};
			direction="s";
		break;
		case 65: // a / w
			goTo={x:PG.x-1,y:PG.y-0};
			direction="w";
		break;
		case 81: // q / nw
			goTo={x:PG.x-1,y:PG.y-1};
			direction="nw";
		break;
		case 69: // e / ne
			goTo={x:PG.x+1,y:PG.y-1};
			direction="ne";
		break;
		case 67: // c / se
			goTo={x:PG.x+1,y:PG.y+1};
			direction="se";
		break;
		case 90: // z / sw
			goTo={x:PG.x-1,y:PG.y+1};
			direction="sw";
		break;
		default:
			return false;
		break;
	}
	muovi(goTo.x,goTo.y)
}
document.onkeyup = handleKeys;