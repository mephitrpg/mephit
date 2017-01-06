/*
 * L'oggetto PC contiene tutti i PC
 * ------
 * Metodi
 * ------
 * PC.byId(int)
 * Ritorna il PC con id=int, false altrimenti
 */
var PC={
	list:[],
	meId:-1,
	get:function(id){return PC.list[id]||false;},
	add:function(p){
		PC.list[p.id]=p;
		if(p.me)PC.setMe(p.id);
	},
	setMe:function(id){
		PC.list.each(function(v,k){
			if(PC.list[k].id==id){
				PC.list[k].me=true;
				ME=PC.list[k];
			}else{
				PC.list[k].me=false;
			}
		});
	}
}

/*
 * L'oggetto ME è la copia dell'oggetto corrispondente al mio PC, {} altrimenti
 */
var ME={};

//Cache di perimetro visibile e area visibile:
//devono essere creati solo all'inizio, non ad ogni passo
var perimetroVisibileCached = null;
var areaVisibileCached = null;
