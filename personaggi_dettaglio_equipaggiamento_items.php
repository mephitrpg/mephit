<?php
/*
if(is_numeric($w)){
	if($v[family]=="Weapons"||$v[category]=="Weapon"){
		switch($TAGLIA){
			case 3:	$w/=2;	break;
			case 5:	$w*=2;	break;
		}
	}else if(
			$v[family]=="Armor and Shields"
			||$v[category]=="Armor"||$v[category]=="Shield"||$v[category]=="Armor, Shield"
			||$v[subcategory]=="Shields"
		){
		switch($TAGLIA){
			case 3:	$w/=2;	break;
			case 5:	$w*=2;	break;
		}
	}
	//These items weigh one-quarter this amount when made for Small characters.
	if($v[weightSize]||$v[referenceItem][weightSize]){
		switch($TAGLIA){
			case 3:	$w/=4;	break;
		}
	}
	//Containers for Small characters also carry one-quarter the normal amount.
	//...
}
*/
$BODY.='<h3>Oggetti disponibili</h3>
<div id="equiptabs">';

	global $tabNumber;$tabNumber=0;
	
	function tabbedContent($a){
		$m='';$c='';$t='';$j='';
		foreach($a AS $$k=>$v){
			$first=$v;
			break;
		}
		if(isset($first[id])){
			$t.='<div class="itemsContainer">';
			foreach($a AS $k=>$v){
				//xmp($v);
				if(isset($v[referenceItem])){
					$slot=$v[referenceItem][slot];
				}else if(isset($v[slot])){
					$slot=$v[slot];
				}else{
					$slot="";
				}
				
				$w=calcItemWeight($v);
				$p=calcItemPrice($v);
				
				// seleziono la il taglio di monete che mi permette
				// di indicare il prezzo con meno decimali possibile
				$price=$v[price];
				preg_match_all("/[0-9\.,]+/",$price,$out);
				if(count($out[0])>0){
					$check=str_replace(",","",$out[0][0])*1;
					if($check<1){
						$coinType=array("pp","gp","sp","cp");
						$price=$check;
						$shift=1;
						foreach($coinType as $k=>$ct){
							if(strpos($v[price],$ct)!==false){
								$shift=$k;
								break;
							}
						}
						while($price!=floor($price)){
							$price*=10;
							$shift++;
							if($shift==3)break;
						}
						$price.=" ".$coinType[$shift];
					}
				}
				
				$sup=array();
				if($v[cursed])$sup[]='&#9824;';//?
				if($v[weightSize])$sup[]='&#185;';//¹
				
				$t.='<div id="item_'.$k.'">'/*$slot.' => '.*/;
				$t.='<a href="javascript:;" onclick="bag.insert(\''.$k.'\',{';
					$t.='id:\''.$k.'\',';
					$t.='name:this.innerHTML,';
					$t.='weight:\''.$w.'\',';
					$t.='price:\''.$p.'\',';
					$t.='precious:\''.($v[precious]?1:0).'\',';
					$t.='cursed:'.($v[cursed]?1:0).',';
					$t.='isContainer:\''.$v[container].'\',';
					$t.='weightSize:\''.$v[weightSize].'\',';
					$t.='type:\''.$v[itemtype].'\'';
				$t.='});"';
				$t.=' id="add-item-'.$k.'"';
				$t.=' class="item"';
				$t.='>';
					$t.=$v["name_".$GLOBALS[_MEPHIT][lang]];
				$t.='</a>';
				$t.=count($sup)!=0?' '.implode('',$sup):'';
				$t.=' ';
				$t.=''.translatePrice($price,$GLOBALS[_MEPHIT][lang]);
				$t.='|';
				
				/*
				#### inizio calcolo peso ####
				// prendo peso da db
				if(!is_null($v[weight])){
					$w=$v[weight];
				}else{
					$w=isset($v[referenceItem])?$v[referenceItem][weight]:"-";
					// controllo che sia numerico
					preg_match_all("/[\\d\.]+/",$w,$out);
					if(count($out[0])>0){
						$w=$out[0][0];
					}
				}
				#### fine calcolo peso ####
				*/
				
				if($w!=0){				
					$t.=translateWeight($w,$GLOBALS[_MEPHIT][lang]);
				}else{
					$t.='-';
				}
				/*
				$t.='|<font color="red">F:</font>'.$v[family];
				$t.='|<font color="red">C:</font>'.$v[category];
				$t.='|<font color="red">S:</font>'.$v[subcategory];
				*/
				$t.=''.'</div>'."\n";
			}
			$t.='</div>';
			return $t;
		}else{
			$GLOBALS[tabNumber]++;
			$id1='tabMenu'.$GLOBALS[tabNumber];
			$id2='cntMenu'.$GLOBALS[tabNumber];
			$m.='<div class="tabmenu"><ul id="'.$id1.'" class="row">'."\n";
			foreach($a AS $k=>$v){
				$m.='<li class="tab"><a href="javascript:;">'.$GLOBALS[_LANG]["itemspage_".$k].'</a></li>'."\n";
			}
			$m.='</ul></div>'."\n";
			$c.='<div class="tabContents" id="'.$id2.'">'."\n";
			foreach($a AS $k=>$v){
			//xmp($v);
				$c.='<div class="cnt" style="display:none;">';
				//$c.="*".$k." \n";
				$c.=tabbedContent($v);
				$c.='</div>'."\n";
			}
			$c.='</div>'."\n";
			$j.='<script>new jTab("'.$id1.'","'.$id2.'");</script>'."\n";
			return $m.$c.$j;
		}
	}
	
	$BODY.=tabbedContent($byType);
			

	/*
	$BODY.='<div class="cnt" style="display:none;">';
	foreach($equip[armorandshields] AS $eq)$BODY.=$eq["name_".$_MEPHIT[lang]].'<br>';
	$BODY.='</div>';
	
	$BODY.='<div class="cnt" style="display:none;">';
	foreach($equip[wondrousitems] AS $eq)$BODY.=$eq["name_".$_MEPHIT[lang]].'<br>';
	$BODY.='</div>';
	
	$BODY.='<div class="cnt" style="display:none;">';
	foreach($equip[goodsandservices] AS $eq)$BODY.=$eq["name_".$_MEPHIT[lang]].'<br>';
	$BODY.='</div>';
	
	$BODY.='<div class="cnt" style="display:none;">';
	foreach($equip[tradegoods] AS $eq)$BODY.=$eq["name_".$_MEPHIT[lang]].'<br>';
	$BODY.='</div>';
	*/


$BODY.='</div>';
$BODY.='<script>$("equiptabs").observe("mouseover",itemTipOver).observe("mouseout",itemTipOut).observe("mousemove",itemTipMove);</script>';
?>