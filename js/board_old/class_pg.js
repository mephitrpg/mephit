/*
 *******************
 * Classe PC_class *
 *******************
 * Crea oggetti corrispondenti ai personaggi e li mette in cache nell'oggetto PC
 * Esempio:
 * new PC_Class(147,{name:'Flint',x:74,y:21,me:true});
 *
 * ---------
 * Argomenti
 * ---------
 *    ------------------------
 *    0) id (int,obbligatorio)
 *    ------------------------
 *    L'ID numerico del personaggio
 * 
 *    ----------------------------------
 *    1) o  (obj,facoltativo,default:{})
 *    ----------------------------------
 *    Oggetto che può accettare i seguenti parametri:
 *       - name(string,default:"PC "+id): il nome del personaggio
 *       - x(int,default:-1): coordinata x nella mappa
 *       - y(int,default:-1): coordinata y nella mappa
 *       - speed(float,default:9): velocità del personaggio (metri)
 *       - sight:(float,default:0): distanza di visuale al buio (metri)
 *       - me:(bool,default:false): il personaggio è mio?
 */
var PC_class = Class.create({
	initialize: function(id) {
		var p,o=arguments[1]||{};
		p={
			// arguments:
			id:id,
			name:o.name||'PC '+id,
			x:o.x||-1,
			y:o.y||-1,
			speed:o.speed||9,//m
			sight:o.sight||0,//m
			me:o.me||false,
			// :arguments
			
			percorso:0,
			percorso_diagonale:false,
			
			setParam:function(o){
				for(k in o){
					this[k]=o[k];
					if(this.me)ME[k]=o[k];
				}
			}
		};
		// metto il PC in cache
		PC.add(p);
		// ritorno il PC nel caso possa servire
		return p;
	}
});
