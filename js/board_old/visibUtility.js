/**
 * Oggetto che rappresenta un punto
 * @param x coordinata x
 * @param y coordinata y
 */
function point(x, y){
	this.x = x;
	this.y = y;
}

/**
 * Oggetto che rappresenta una retta
 * @param m = coefficiente angolare
 * @param q = intercetta
 */
function retta(m, q) {
	this.m = m;
	this.q = q;
}

function isRettaVerticaleFromPoints (p1, p2) {
	if (p1.x == p2.x) {
		return true;
	} else {
		return false;
	}
}

/**
 * Ritorna una retta (coppia di valori m e q) dai punti passati. Gli oggetti
 * passati devono essere dei point!
 * @param p1 il primo punto
 * @param p2 coordinata il secondo punto
 */
function getRettaFromPoints (p1, p2) {
	if (isRettaVerticaleFromPoints (p1, p2)){
		return null;
	} else {
		var m = Number((p2.y - p1.y)/(p2.x - p1.x));
		var q = Number(p1.y - m*p1.x);
		return new retta(m,q);
	}
}

function getThetaStep(sight, dimensioneCella){
	var raggio = sight*dimensioneCella + dimensioneCella/2;
	var circonf = 2*Math.PI*raggio;
	var howMany = circonf/(dimensioneCella/3);
	return 2*Math.PI/howMany;
}

/**
 * Ritorna true se un vettore di punti contiene il punto p passato
 * @param pointArray l'array di punti
 * @param point il punto da vedere se è già contenuto o meno
 */
function containsPoint(pointArray, point){
	if (pointArray.length == 0){
		return false;
	}
	for (var i=pointArray.length-1; i>=0; i--){
		if (pointArray[i].x == point.x && pointArray[i].y == point.y){
			return true;
		}
	}
	return false;
}