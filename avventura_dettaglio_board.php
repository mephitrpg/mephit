<?php

$M=isset($_GET[map])?(int)$_GET[map]:0;
$mapUrl=$mapFolder."/".$images[$M];
$mapSize=getimagesize($_SERVER['DOCUMENT_ROOT'].$mapUrl);

$PGs=getAdventurePGs($avv[id_adventure]);

$BODY.='
<style>
#personaggiNellaMappa A{color:#fff;text-decoration:none;}
#personaggiNellaMappa .sel{background:#fff;}
#personaggiNellaMappa .sel A{color:#c00000;text-decoration:none;}
</style>

<table border="0" cellpadding="0" cellspacing="0"><tr valign="top"><td width="100%" bgcolor="#C00000" style="padding:10px;">
<div style="color:#fff;">Iniziativa off</div>
<br>

<script>
charactersTokenCache={}
</script>
<div id="personaggiNellaMappa">';

$pgs=array(
	13=>array("name"=>"Agata","img_small"=>$_MEPHIT[WWW_ROOT]."/public/users/7/pg/tooltip/Mithra_Bard_by_Laifierr.jpg"),
	11=>array("name"=>"Asfidanken","img_small"=>$_MEPHIT[WWW_ROOT]."/public/users/10/pg/tooltip/hass.jpg"),
	12=>array("name"=>"Antisismico","img_small"=>$_MEPHIT[WWW_ROOT]."/public/users/5/pg/tooltip/regirock.jpg"),
);
foreach($pgs AS $id=>$pg){
	$BODY.='<script>
	charactersTokenCache['.$id.']=(function(){var x=new Image();x.src="'.$pg[img_small].'";return x;})();
	</script>';
	if($id==13)$BODY.='<div class="sel">';
	$BODY.='<a href="personaggi.php?id='.$id.'"><img src="'.$pg[img_small].'" border="0"></a><br>';
	$BODY.='<a href="personaggi.php?id='.$id.'">'.$pg[name].'</a><br>';
	if($id==13){
		$BODY.='
		<style>
		#board{background:#000;}
		#boardContainer{}
		.barraFatto{height:15px;background:#999999;width:0;}
		.barraRestante{height:15px;background:#008800;}
		.barraLabel{position:absolute;text-align:center;width:100px;}
		</style>
		<div style="font-size:8pt;color:#fff;">
			<div class="barraLabel">AZ. MOVIMENTO</div><div id="movimento_restante" class="barraRestante"><div id="movimento_fatto" class="barraFatto"></div></div>
			<div class="barraLabel">AZ. STANDARD</div><div id="standard_restante" class="barraRestante"><div id="standard_fatto" class="barraFatto"></div></div>
			<div class="barraLabel">AZ. VELOCE</div><div id="veloce_restante" class="barraRestante"><div id="veloce_fatto" class="barraFatto"></div></div>
			<div class="barraLabel">AZ. IMMEDIATA</div><div id="immediata_restante" class="barraRestante"><div id="immediata_fatto" class="barraFatto"></div></div>
		</div>
		';
		$BODY.='</div><br>';
	}
	$BODY.='<br>';
}

$BODY.='
</div>
</td><td width="100%"><div style="padding:10px;">

<h2 style="margin-top:0">'.$names[$M].'</h2>
<h3>'.$subNames[$M].'</h3>

<!-- include framework and compatibility scripts -->
<script src="js/board/iecanvas.js"></script>

<!-- include map -->
<script>
	var Zlidez={
		t:14,
		l:31,
		s:33.9,
		z:0
	};
</script>
<script src="js/board/class_map.js"></script>
<script src="js/board/map_4.js"></script>

<!-- include rest -->
<script src="js/board/cache.js"></script>
<script src="js/board/class_pg.js"></script>
<script src="js/board/controls.js"></script>
<script src="js/board/visibUtility.js"></script>
<script src="js/board/manageVisibility.js"></script>

<style type="text/css">
  div.slider { width:1000px; margin:10px 0; background-color:#ccc; height:10px; position: relative; }
  div.slider div.handle { width:5px; height:15px; background-color:#f00; cursor:move; position: absolute; }
  div#s_slider{width:1000px;}
  
  div#zoom_element { width:50px; height:50px; background:#2d86bd; position:relative; }
  #gridOptions TD{text-align:right;}
</style>
';

if($M!=1){
	$BODY.='<div>
	<a href="javascript:;" onclick="$(\'gridOptions\').toggle();">Opzioni griglia</a>
	</div>
	<div id="gridOptions">
	<table border="0" cellpadding="0" cellspacing="10">
	<tr>
		<td>Left:</td>
		<td width="40"><span id="l_value"></span></td>
		<td><div id="l_slider" class="slider"><div class="handle"></div></div></td>
	</tr>
	<tr>
		<td>Top:</td>
		<td width="40"><span id="t_value"></span></td>
		<td><div id="t_slider" class="slider"><div class="handle"></div></div></td>
	</tr>
	<tr>
		<td>Size:</td>
		<td width="40"><span id="s_value"></span></td>
		<td><div id="s_slider" class="slider"><div class="handle"></div></div></td>
	</tr>
	<tr>
		<td>Zoom:</td>
		<td width="40"><span id="z_value"></span></td>
		<td><div id="z_slider" class="slider"><div class="handle"></div></div></td>
	</tr>
	</table>
	</div>
	
	<script type="text/javascript">
	function almostOneDecimal(q){
		return q+(q==parseInt(q)?".0":"");
	}
	function perDieci(q){
		q=q+"";
		if(q.indexOf(".")!=-1)return q.replace(".","");
		return q+"0";
	}
	function divisoDieci(q){
		q=q+"";
		if(q.length==1)return "0."+q;
		return q.substr(0,q.length-1)+"."+q.substr(q.length-1,1);
	}
	
    var z_slider = $("z_slider"), z_value = $("z_value"),
        t_slider = $("t_slider"), t_value = $("t_value"),
        l_slider = $("l_slider"), l_value = $("l_value"),
        s_slider = $("s_slider"), s_value = $("s_value");

    new Control.Slider(t_slider.down(".handle"), t_slider, {
      range: $R(0, 1000),
	  values:(function(){var x=[];for(var i=0;i<=1000;i++)x[i]=i;return x;})(),
      sliderValue: perDieci(Zlidez.t),
      onSlide: function(value) {
       Zlidez.t=divisoDieci(value)*1;
	   t_value.innerHTML=divisoDieci(value);
	   cambiaGrid("t");
      },
      onChange: function(value) { 
       Zlidez.t=divisoDieci(value)*1;
	   t_value.innerHTML=divisoDieci(value);
	   cambiaGrid("t");
      }
    });
	t_value.innerHTML=Zlidez.t;
	
	new Control.Slider(l_slider.down(".handle"), l_slider, {
      range: $R(0, 1000),
	  values:(function(){var x=[];for(var i=0;i<=1000;i++)x[i]=i;return x;})(),
      sliderValue: perDieci(Zlidez.l),
      onSlide: function(value) {
       Zlidez.l=divisoDieci(value)*1;
	   l_value.innerHTML=divisoDieci(value);
	   cambiaGrid("l");
      },
      onChange: function(value) { 
       Zlidez.l=divisoDieci(value)*1;
	   l_value.innerHTML=divisoDieci(value);
	   cambiaGrid("l");
      }
    });
	l_value.innerHTML=Zlidez.l;

	new Control.Slider(s_slider.down(".handle"), s_slider, {
      range: $R(0, 1000),
//	  increment:0.1,
	  values:(function(){var x=[];for(var i=50;i<=1000;i++)x[i]=i;return x;})(),
      sliderValue: perDieci(Zlidez.s),
      onSlide: function(value) {
       Zlidez.s=divisoDieci(value)*1;
	   s_value.innerHTML=divisoDieci(value);
	   cambiaGrid("s");
      },
      onChange: function(value) { 
       Zlidez.s=divisoDieci(value)*1;
	   s_value.innerHTML=divisoDieci(value);
	   cambiaGrid("s");
      }
    });
	s_value.innerHTML=Zlidez.s;

	new Control.Slider(z_slider.down(".handle"), z_slider, {
      range: $R(-5, 5),
	  values:[-5,-4,-3,-2,-1,0,1,2,3,4,5],
      sliderValue: String(Zlidez.z),
      onSlide: function(value) {
       Zlidez.z=value;
	   z_value.innerHTML=almostOneDecimal(value);
	   cambiaGrid("z");
      },
      onChange: function(value) { 
       Zlidez.z=value;
	   z_value.innerHTML=almostOneDecimal(value);
	   cambiaGrid("z");
	   
      }
    });
	z_value.innerHTML=almostOneDecimal(Zlidez.z);
    
	</script>
	';
}

$BODY.='<div id="loadingMap"><em>Loading map...</em></div>';
$BODY.='<div id="boardContainer"><canvas id="board" width="'.$mapSize[0].'" height="'.$mapSize[1].'"></canvas></div>';

$BODY.='<script>
var canvas = document.getElementById("board");
var mapSize=['.$mapSize[0].','.$mapSize[1].'];
var zoomSize=mapSize;
var ctx;
var mapUrl="'.$mapUrl.'";
var thumbUrl="include/phpThumb/phpThumb.php?src="+mapUrl+"&w='.$mapSize[0].'&h='.$mapSize[1].'";
var mapImg = new Image();

function cambiaGrid(q){
	switch(q){
		case"z":
			
		break;
		case"t":
		case"l":
		case"s":
		default:
			ctx.drawImage(mapImg,0,0,zoomSize[0],zoomSize[1]);
			ctx.strokeStyle = "rgb(200,0,0)";
			for(var x=Zlidez.l;x<=zoomSize[0];x+=Zlidez.s){
				ctx.beginPath();
				ctx.moveTo(x,0);
				ctx.lineTo(x,mapSize[1]);
				ctx.stroke();
				ctx.closePath();
			}
			for(var y=Zlidez.t;y<=zoomSize[1];y+=Zlidez.s){
				ctx.beginPath();
				ctx.moveTo(0,y);
				ctx.lineTo(mapSize[0],y);
				ctx.stroke();
				ctx.closePath();
			}
		break;
	}
}

if (canvas.getContext){  
	mapImg.onload = function(){  
		ctx = canvas.getContext("2d");  
		if('.$M.'!=0)cambiaGrid();
		$("loadingMap").hide();
	}  
	mapImg.src = mapUrl;
} else {
  wr(\'Il tuo browser non supporta l\\\'elemento &lt;canvas&gt;. Ti consigliamo di passare a <a href="http://www.google.com/chrome?hl=it" target="_blank">Google Chrome</a>\');
}
</script>';
?>

<?php
$BODY.='
<!-- start! -->
<script>
new PC_class(0,{
	name:\'Seu\',
	x:19,
	y:30,
	speed:9,
	sight:18,
	me:true
});

Event.observe(window,\'load\',function(){
	ieCanvasInit();
	if("'.$M.'"==0)setTimeout(\'draw(50,50)\',200);
});
</script>

<script>

var CELL={
	fill:function(x,y){
		if(arguments.length>2){
			CELL.fill_color(x,y,arguments[2]);
			MAP.viewUpdate(x,y,arguments[2]);
		}else{
			MAP.viewUpdate(x,y);
		}
	},
	fill_color:function(x,y){
		var tile=(arguments.length>2)?arguments[2]:MAP.tiles[MAP.matrix[x][y]].id;
		var tileExists = (typeof MAP.tiles[tile]!="undefined") ;
		var hex=(tileExists)?MAP.tiles[tile].bgcolor:tile;
		var rgba = "rgb("
		+ parseInt(hex.substring(0,2),16)
		+ ","
		+ parseInt(hex.substring(2,4),16)
		+ ","
		+ parseInt(hex.substring(4,6),16)
		+ ")";
		MAP.ctx.fillStyle=rgba;
		MAP.ctx.fillRect(Zlidez.l+x*MAP.zoom,Zlidez.t+y*MAP.zoom,MAP.zoom,MAP.zoom);
	},
	fill_color_knownMap:function(x,y){
		var tile=(arguments.length>2)?arguments[2]:MAP.tiles[MAP.matrix[x][y]].id;
		var tileExists = (typeof MAP.tiles[tile]!="undefined") ;
		var hex=(tileExists)?MAP.tiles[tile].knownbgcolor:tile;
		var rgba = "rgb("
		+ parseInt(hex.substring(0,2),16)
		+ ","
		+ parseInt(hex.substring(2,4),16)
		+ ","
		+ parseInt(hex.substring(4,6),16)
		+ ")";
		MAP.ctx.fillStyle=rgba;
		MAP.ctx.fillRect(x*MAP.zoom,y*MAP.zoom,MAP.zoom,MAP.zoom);
	},
	secchiello:function(x,y){
		var X,Y,xy=[
			{x:x-0,y:y-1},	//n
			{x:x+1,y:y-0},	//e
			{x:x-0,y:y+1},	//s
			{x:x-1,y:y-0},	//w
			{x:x-0,y:y-0}	//c
		];
		for(var i=0;i<xy.length;i++){
			X=xy[i].x;Y=xy[i].y;
			try{
				if(MAP.view[X][Y]==0){
					CELL.fill(X,Y);
					CELL.secchiello(X,Y);
				}
			}catch(e){}
		}
	},
	fill_image:function(x,y){
		var ox=Zlidez.l+x*Zlidez.s;
		var oy=Zlidez.t+y*Zlidez.s;
		MAP.ctx.drawImage(
			mapImg,		//image
			ox,			//sx
			oy,			//sy
			Zlidez.s,	//sWidth
			Zlidez.s,	//sHeight
			ox,			//dx
			oy,			//dy
			Zlidez.s,	//dWidth
			Zlidez.s	//dHeight
		);
		MAP.viewUpdate(x,y);
	},
	fill_image_knownMap:function(x,y){
		var ox=Zlidez.l+x*Zlidez.s;
		var oy=Zlidez.t+y*Zlidez.s;
		MAP.ctx.drawImage(
			mapImg,		//image
			ox,			//sx
			oy,			//sy
			Zlidez.s,	//sWidth
			Zlidez.s,	//sHeight
			ox,			//dx
			oy,			//dy
			Zlidez.s,	//dWidth
			Zlidez.s	//dHeight
		);
		MAP.ctx.fillStyle = "rgba(0,0,0,0.5)";
  		MAP.ctx.fillRect(ox,oy,Zlidez.s,Zlidez.s);
		MAP.viewUpdate(x,y);
	},
	fill_resizedImage:function(x,y,src){
		var ox=Zlidez.l+x*Zlidez.s;
		var oy=Zlidez.t+y*Zlidez.s;
		var img=new Image();
		img.onload=function(){
			MAP.ctx.drawImage(
				this,			//image
				0,				//sx
				0,				//sy
				this.width,		//sWidth
				this.height,	//sHeight
				ox,				//dx
				oy,				//dy
				Zlidez.s,		//dWidth
				Zlidez.s		//dHeight
			);
		}
		img.src=src;
	},
	fill_characterToken:function(x,y,id){
		var ox=Zlidez.l+x*Zlidez.s;
		var oy=Zlidez.t+y*Zlidez.s;
		var img=charactersTokenCache[id];
		MAP.ctx.drawImage(
			img,			//image
			0,				//sx
			0,				//sy
			img.width,		//sWidth
			img.height,		//sHeight
			ox,				//dx
			oy,				//dy
			Zlidez.s,		//dWidth
			Zlidez.s		//dHeight
		);
	}
}

function xy_exists(x,y){
	return(x<MAP.width&&y<MAP.height&&x>=0&&y>=0);
}

function draw(){
	
	var side=MAP.zoom; //px
	MAP.canvas = document.getElementById(\'board\');
	$(MAP.canvas).setStyle({
		width:side*MAP.width+\'px\',
		height:side*MAP.height+\'px\'
	});
	MAP.canvas.width=side*MAP.width;
	MAP.canvas.height=side*MAP.height;
	MAP.ctx = MAP.canvas.getContext("2d");
	
	// calcolo la circonferenza del campo visivo e la scrivo in MAP.view
	
	MAP.viewReset();
	
	var vision_q=Math.floor(ME.sight/1.5);
	// NORD EST
	for(var i=0,xy=vision_q;i<vision_q;i++,xy-=0.5){
		var everyTwo=parseInt(xy);
		var vertical={x:ME.x+i,y:ME.y-everyTwo};
		var horizontal={x:ME.x+everyTwo,y:ME.y-i};
		if(xy_exists(vertical.x,vertical.y))CELL.fill(vertical.x,vertical.y/* ,"floor" */);
		if(xy_exists(horizontal.x,horizontal.y))CELL.fill(horizontal.x,horizontal.y/* ,"floor" */);
		if(Math.abs(horizontal.y-vertical.y)<2)break;
	}
	// SUD EST
	for(var i=0,xy=vision_q;i<vision_q;i++,xy-=0.5){
		var everyTwo=parseInt(xy);
		var vertical={x:ME.x+i,y:ME.y+everyTwo};
		var horizontal={x:ME.x+everyTwo,y:ME.y+i};
		if(xy_exists(vertical.x,vertical.y))CELL.fill(vertical.x,vertical.y/* ,"floor" */);
		if(xy_exists(horizontal.x,horizontal.y))CELL.fill(horizontal.x,horizontal.y/* ,"floor" */);
		if(Math.abs(horizontal.y-vertical.y)<2)break;
	}
	// NORD WEST
	for(var i=0,xy=vision_q;i<vision_q;i++,xy-=0.5){
		var everyTwo=parseInt(xy);
		var vertical={x:ME.x-i,y:ME.y-everyTwo};
		var horizontal={x:ME.x-everyTwo,y:ME.y-i};
		if(xy_exists(vertical.x,vertical.y))CELL.fill(vertical.x,vertical.y/* ,"floor" */);
		if(xy_exists(horizontal.x,horizontal.y))CELL.fill(horizontal.x,horizontal.y/* ,"floor" */);
		if(Math.abs(horizontal.y-vertical.y)<2)break;
	}
	// SUD WEST
	for(var i=0,xy=vision_q;i<vision_q;i++,xy-=0.5){
		var everyTwo=parseInt(xy);
		var vertical={x:ME.x-i,y:ME.y+everyTwo};
		var horizontal={x:ME.x-everyTwo,y:ME.y+i};
		if(xy_exists(vertical.x,vertical.y))CELL.fill(vertical.x,vertical.y/* ,"floor" */);
		if(xy_exists(horizontal.x,horizontal.y))CELL.fill(horizontal.x,horizontal.y/* ,"floor" */);
		if(Math.abs(horizontal.y-vertical.y)<2)break;
	}
	
	// riempio l\'area del campo visivo
	
	CELL.secchiello(ME.x,ME.y);
	
/**/
	individuaVisibilita({x:ME.x,y:ME.y});
	
//	for(i in MAP.view)if(!isNaN(i))console.log(MAP.view[i])
//	for(i in MAP.known)if(!isNaN(i))console.log(MAP.known[i])
	
	// Disegna l\'area conosciuta ma non visibile
	for(var yy=0;yy<MAP.known.length;yy++){
		for(var xx=0;xx<MAP.known[yy].length;xx++){
			if(MAP.known[yy][xx]!=0){
				if(xy_exists(xx,yy))CELL.fill_image_knownMap(xx,yy);
			}
		}
	}
	// Disegna l\'area visibile
	for(var xx=0;xx<areaVisibile.length;xx++){
		for(var yy=0;yy<areaVisibile[xx].length;yy++){
			if(areaVisibile[xx][yy]==2){
				var X = ME.x - (areaVisibile.length-1)/2 + xx ;
				var Y = ME.y - (areaVisibile[xx].length-1)/2 + yy ;
				if(xy_exists(X,Y))CELL.fill_image(X,Y);
			}
		}
	}
	// Disegna ME
	CELL.fill_characterToken(ME.x,ME.y,13);
/**/
/*
	for(var xx=0;xx<MAP.matrix.length;xx++){
		for(var yy=0;yy<MAP.matrix[xx].length;yy++){
			if(MAP.matrix[xx][yy]==2){
				var X = xx ;
				var Y = yy ;
				try{
					CELL.fill_color(X,Y,"FFFFFF");
				}catch(e){}
			}
		}
	}
*/	
	//console.log(MAP.view);
}
</script>

</div>

</td></tr></table>';
?>