<?php

$M=$_GET[map]*1;
$I=$_GET[item]*1;
$luogo=$_GET[luogo]*1;

$query="SELECT * FROM mephit_map_image WHERE id=".$I;
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$item=$row;
}

$query="SELECT * FROM mephit_map_group WHERE id=".$luogo." OR parent_id=".$luogo;
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	if($row[id]==$luogo){
		$luogo_name=$row[nome];
	}else{
		$gruppo=$row[id];
		$gruppo_name=$row[nome];
	}
}

$mapUrl=$mapFolder."/".$item[filename];
$mapSize=getimagesize($_SERVER['DOCUMENT_ROOT'].$mapUrl);

$query="
	SELECT * FROM mephit_map_image WHERE
	(x=".($item[x])." AND y=".($item[y]-1).")
	OR
	(x=".($item[x])." AND y=".($item[y]+1).")
	OR
	(x=".($item[x]+1)." AND y=".($item[y]).")
	OR
	(x=".($item[x]-1)." AND y=".($item[y]).")
";
$result=mysql_query($query);
$near=array();
while($row=mysql_fetch_assoc($result)){
	$get=$_GET;
	$get[item]=$row[id];
	$url=$_SERVER[PHP_SELF]."?".http_build_query($get);
	if($row[x]==$item[x]){
		if($row[y]==$item[y]-1){
			$near["n"]=$row;
			$near["n"][url]=$url;
		}else{
			$near["s"]=$row;
			$near["s"][url]=$url;
		}
	}else{
		if($row[x]==$item[x]-1){
			$near["w"]=$row;
			$near["w"][url]=$url;
		}else{
			$near["e"]=$row;
			$near["e"][url]=$url;
		}
	}
}

$BODY.='

<!-- include framework and compatibility scripts -->
<!--[if lt IE 9]>
<script src="'.$_MEPHIT[WWW_ROOT].'/js/board/iecanvas.js"></script>
<![endif]-->

<style>
#gridControls{
	position:absolute;
}
#gridControlsBorder{
	border:1px solid #ccc;
}
#gridControlsDimensions{
	width:410px;
	background-color: #fff;
	background-color: rgba(255,255,255,0.8);
}
</style>
<!--[if IE]>
<style>
#gridControlsDimensions{
   background-color:transparent;
   -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#CCFFFFFF, endColorstr=#CCFFFFFF)";
   filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#CCFFFFFF,endColorstr=#CCFFFFFF);
   zoom: 1;
} 
</style>
<![endif]-->

<link rel="stylesheet" href="'.$_MEPHIT[WWW_ROOT].'/js/spin/style.css" />
<script src="'.$_MEPHIT[WWW_ROOT].'/js/spin/javascript.js"></script>

';

$BODY.='

<h2 style="margin-top:10px;">'.$luogo_name.' &rsaquo; '.$gruppo_name.' &rsaquo; '.$item[nome].'</h2>

';

if($M!=1){
	$BODY.='<div id="gridControls"><div id="gridControlsBorder"><div id="gridControlsDimensions"><div id="gridControlsContainer">
		
		<form action="avventura_save.php" method="post">
		<input type="hidden" name="what" value="map">
		<input type="hidden" name="id" value="'.$avv[id_avventura].'">
		<input type="hidden" name="act" value="updatemapluogo">
		<input type="hidden" name="luogo" value="'.$luogo.'">
		<input type="hidden" name="item" value="'.$I.'">
		<table border="0" cellpadding="0" cellspacing="10">
			<tr valign="top">
				<td width="190" style="line-height:18px;">
					<fieldset><legend>Immagine</legend>
						<input type="file" id="fileupload" style="display:none;" onchange="document.getElementById(\'fakeupload\').value=this.value;">
						<input type="text" id="fakeupload" style="width:100%;height:20px;" value="'.htmlspecialchars($images[$M]).'" readonly><br>
						<a href="javascript:;" onclick="document.getElementById(\'fileupload\').click();" onkeypress="this.onclick();">Sfoglia...</a>
					</fieldset>
				</td>
				<td width="190">
					<fieldset><legend>Griglia</legend>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td>Larghezza</td>
							<td id="gridControlsDimensionsWidth" align="right"></td>
						</tr>
						<tr>
							<td>Altezza</td>
							<td id="gridControlsDimensionsHeight" align="right"></td>
						</tr>
						</table>
					</fieldset>
				</td>
			</tr>
			<tr valign="top">
				<td width="190">
					<fieldset><legend>Origine</legend>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td>Left</td>
							<td id="gridControlsOriginLeft" align="right"></td>
						</tr>
						<tr>
							<td>Top</td>
							<td id="gridControlsOriginTop" align="right"></td>
						</tr>
						</table>
					</fieldset>
				</td>
				<td width="190">
					<fieldset><legend>Cella</legend>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td>Lato</td>
							<td id="gridControlsCellSide" align="right"></td>
						</tr>
						<tr>
							<td>Bordo</td>
							<td id="gridControlsCellBorder" align="right"></td>
						</tr>
						</table>
					</fieldset>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="line-height:18px;">
					<fieldset><legend>Riferimento altre mappe</legend>
						<table border="0" cellpadding="0" cellspacing="0" align="center">
						<tr align="center">
							<td colspan="3">
								<a href="'.$near["n"][url].'">N</a> <input size="2"> &nbsp;
							</td>
						</tr>
						<tr align="center">
							<td width="60">
								<a href="'.$near["w"][url].'">W</a> <input size="2"> &nbsp;
							</td>
							<td width="10"></td>
							<td width="60">
								<a href="'.$near["e"][url].'">E</a> <input size="2"> &nbsp;
							</td>
						</tr>
						<tr align="center">
							<td colspan="3">
								<a href="'.$near["s"][url].'">S</a> <input size="2"> &nbsp;
							</td>
						</tr>
						</table>
						<small style="line-height:1.2;">
							Le celle di riferimento si allineano con quelle delle altre mappe.
							Ad esempio, la cella di riferimento S (Sud) si allinea con la cella N (Nord) della mappa pi&ugrave; a Sud.
							Clicca sui punti cardinali per andare alla mappa successiva in quella direzione senza salvare.
							Consiglio: usa il click centrale per aprirla in una nuova scheda.
						</small>
					</fieldset>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="right">
					<input type="button" class="btn" value="'.$_LANG[back].'" onclick="location.href=\'avventura.php?id='.$_GET[id].'&what=map&luogo='.$luogo.'\';" onkeypress="this.onclick();">
					<input type="submit" class="btn" value="'.$_LANG[save].'">
				</td>
			</tr>
		</table>
		</form>
		
	</div></div></div></div>
	
	<script type="text/javascript">
	
	// gridControlsDimensionsWidth
	
	var gcDW = new SpinControl();
	gcDW.SetMinValue(1);
	gcDW.SetMaxValue(1000);
	gcDW.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 1000));
	gcDW.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 3500));
	document.getElementById("gridControlsDimensionsWidth").appendChild(gcDW.GetContainer());
	document.getElementById("gridControlsDimensionsWidth").getElementsByTagName("input")[0].name="width";
	gcDW.StartListening();
	
	// gridControlsDimensionsHeight
	
	var gcDH = new SpinControl();
	gcDH.SetMinValue(1);
	gcDH.SetMaxValue(1000);
	gcDH.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 1000));
	gcDH.GetAccelerationCollection().Add(new SpinControlAcceleration(5, 3500));
	document.getElementById("gridControlsDimensionsHeight").appendChild(gcDH.GetContainer());
	document.getElementById("gridControlsDimensionsHeight").getElementsByTagName("input")[0].name="height";
	gcDH.StartListening();
			
	// gridControlsOriginLeft
	
	var gcOL = new SpinControl();
	gcOL.SetMinValue(0);
	gcOL.SetMaxValue(1000);
	gcOL.SetIncrement(0.1);
	gcOL.GetAccelerationCollection().Add(new SpinControlAcceleration(0.1, 1000));
	gcOL.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 3500));
	gcOL.GetAccelerationCollection().Add(new SpinControlAcceleration(10, 7000));
	document.getElementById("gridControlsOriginLeft").appendChild(gcOL.GetContainer());
	document.getElementById("gridControlsOriginLeft").getElementsByTagName("input")[0].name="left";
	gcOL.StartListening();
	
	// gridControlsOriginTop
	
	var gcOT = new SpinControl();
	gcOT.SetMinValue(0);
	gcOT.SetMaxValue(1000);
	gcOT.SetIncrement(0.1);
	gcOT.GetAccelerationCollection().Add(new SpinControlAcceleration(0.1, 1000));
	gcOT.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 3500));
	gcOT.GetAccelerationCollection().Add(new SpinControlAcceleration(10, 7000));
	document.getElementById("gridControlsOriginTop").appendChild(gcOT.GetContainer());
	document.getElementById("gridControlsOriginTop").getElementsByTagName("input")[0].name="top";
	gcOT.StartListening();
	
	// gridControlsCellSide
	
	var gcCS = new SpinControl();
	gcCS.SetMinValue(1);
	gcCS.SetMaxValue(100);
	gcCS.SetIncrement(0.1);
	gcCS.GetAccelerationCollection().Add(new SpinControlAcceleration(0.1, 1000));
	gcCS.GetAccelerationCollection().Add(new SpinControlAcceleration(1, 3500));
	gcCS.GetAccelerationCollection().Add(new SpinControlAcceleration(10, 7000));
	document.getElementById("gridControlsCellSide").appendChild(gcCS.GetContainer());
	document.getElementById("gridControlsCellSide").getElementsByTagName("input")[0].name="side";
	gcCS.StartListening();
	
	// gridControlsCellBorder
	
	var gcCB = new SpinControl();
	gcCB.SetMinValue(1);
	gcCB.SetMaxValue(10);
	document.getElementById("gridControlsCellBorder").appendChild(gcCB.GetContainer());
	document.getElementById("gridControlsCellBorder").getElementsByTagName("input")[0].name="border";
	gcCB.StartListening();
	
	</script>
	<script>
	new Draggable("gridControls");
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
var mapImg = new Image();

function cambiaGrid(q){
	
	var w=gcDW.GetCurrentValue();
	var h=gcDH.GetCurrentValue();
	var t=gcOT.GetCurrentValue();
	var l=gcOL.GetCurrentValue();
	var s=gcCS.GetCurrentValue();
	var b=gcCB.GetCurrentValue();
	
	ctx.drawImage(mapImg,0,0,zoomSize[0],zoomSize[1]);
	ctx.strokeStyle = "rgb(200,0,0)";
	ctx.lineWidth=b;
	for(var x=0;x<=w;x++){
		ctx.beginPath();
		ctx.moveTo(l+x*s,t);
		ctx.lineTo(l+x*s,t+h*s);
		ctx.stroke();
		ctx.closePath();
	}
	for(var y=0;y<=h;y++){
		ctx.beginPath();
		ctx.moveTo(l,t+y*s);
		ctx.lineTo(l+w*s,t+y*s);
		ctx.stroke();
		ctx.closePath();
	}

}

	
	// init
	
	gcDW.SetCurrentValue('.$item[width].');
	gcDH.SetCurrentValue('.$item[height].');
	gcOL.SetCurrentValue('.($item[left]/10).');
	gcOT.SetCurrentValue('.($item[top]/10).');
	gcCS.SetCurrentValue('.($item[side]/10).');
	gcCB.SetCurrentValue('.$item[border].');
	
	gcDW.AttachValueChangedListener(cambiaGrid);
	gcDH.AttachValueChangedListener(cambiaGrid);
	gcOT.AttachValueChangedListener(cambiaGrid);
	gcOL.AttachValueChangedListener(cambiaGrid);
	gcCS.AttachValueChangedListener(cambiaGrid);
	gcCB.AttachValueChangedListener(cambiaGrid);


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

Event.observe(window,"load",function(){
	cambiaGrid();
});
</script>';
?>