var MAP_class = Class.create({
	initialize: function(template){
		var m,o=arguments[1]||{}
		template=template||'dungeon';
		this.width=o.width||0;
		this.height=o.height||0;
		
		// rovescio la mappa in modo che sia leggibile come matrix[x][y] (anzichè matrix[y][x])
		try{
			this.matrix=[];
			for(var yy=0;yy<o.matrix.length;yy++){
				for(var xx=0;xx<o.matrix[yy].length;xx++){
					if(yy==0)this.matrix[xx]=[];
					this.matrix[xx][yy]=o.matrix[yy][xx];
				}
			}
			this.width=this.matrix.length;
			this.height=this.matrix[0].length;
		}catch(e){
			this.matrix=[];
			this.width=0;
			this.height=0;
		}
		
		// inizializzo la mappa vista
		this.viewReset();
		
		// inizializzo la mappa conosciuta
		this.known=[];
		for (var x=0;x<this.width;x++){
			this.known[x]=[];
			for (var y=0;y<this.height;y++){
				this.known[x][y]=0;
			}
		}
		this.known_width=this.known.length;
		this.known_height=this.known[0].length;
		
		// determino le tiles usate dal template
		this.tiles=[];
		for(i in TILES.templates[template]){
			var t=TILES.templates[template][i];
			t.key=i;
			t.id=TILES.list[i].id;
			t.name=TILES.list[i].name;
			this.tiles[t.id]=t;
		}
		
		// determino la dimensione del quadretto
		//this.zoom=8
		this.zoom=Zlidez.s;
		
	},
	viewReset:function(){
		this.view=[];
		for (var x=0;x<this.width;x++){
			this.view[x]=[];
			for (var y=0;y<this.height;y++){
				this.view[x][y]=0;
			}
		}
	},
	viewUpdate:function(x,y){
		var tile=(arguments.length>2)?arguments[2]:this.tiles[this.matrix[x][y]].id;
		var tileExists = (typeof this.tiles[tile]!="undefined") ;
		if(tileExists)this.view[x][y]=this.matrix[x][y];
	}
});
/*
 * L'oggetto TILES definisce i tipi di casella e i template della mappa
 */
var TILES={
	list:{
		dark:{id:0,name:"Buio"},
		floor:{id:1,name:"Pavimento"},
		wall:{id:2,name:"Muro"},
		pit:{id:3,name:"Precipizio"},
		monster:{id:4,name:"Mostro"}
	},
	templates:{
		dungeon:{
			dark:{bgcolor:"000000",knownbgcolor:"000000"},
			floor:{bgcolor:"666666",knownbgcolor:"333333"},
			wall:{bgcolor:"CD6A05",knownbgcolor:"8F4900"},
			pit:{bgcolor:"ffffff",knownbgcolor:"888888"},
			monster:{bgcolor:"ff0000",knownbgcolor:"880000"}
		},
		openair:{
			dark:{bgcolor:"000000",knownbgcolor:"000000"},
			floor:{bgcolor:"008800",knownbgcolor:"004400"},
			wall:{bgcolor:"CD6A05",knownbgcolor:"8F4900"},
			pit:{bgcolor:"ffffff",knownbgcolor:"888888"},
			monster:{bgcolor:"ff0000",knownbgcolor:"880000"}
		}
	}
}
