<?php
$query="
	SELECT * 
	FROM srd35_class_lang
	WHERE fk_classe=".$_GET[id]."
";
$result=mysql_query($query);
$classLanguages=array();
while($row=mysql_fetch_assoc($result))$classLanguages[$row[fk_lang]]=$row[lang_availability];

$query="
	SELECT id,name_".$_MEPHIT[lang]." AS nome
	FROM srd35_lang
	ORDER BY nome
";
$result=mysql_query($query);

$BODY.='<style>
#theLanguages UL{
	margin:0 0 0 1em;padding:0;list-style:none;
}
#theLanguages LABEL:hover{background:#eee;}
#theLanguages h2{
	margin-left:0em;
}
</style>';

$BODY.='<script>
function classTypeClick(element){
	switch(element.id){
		case"classType_martial":
			if(!element.checked){
				element.checked=true;
			}else{
				document.getElementById("classType_arcane").checked=false;
				document.getElementById("classType_divine").checked=false;
				document.getElementById("classType_psionic").checked=false;
			}
		break;
		default:
			document.getElementById("classType_martial").checked=false;
		break;
	}
}
</script>';

$BODY.='<div id="theLanguages">';
	
	$BODY.='<br>';
	
	$BODY.='<div>';
	$BODY.='Tipi di classe: ';
	$BODY.='<label><input type="checkbox" id="classType_martial" name="classTypes[]" value="martial"'.($classe[martial]? ' checked':'').' onclick="classTypeClick(this);"> '.$_LANG[classpage_martial].'</label> ';
	$BODY.='<label><input type="checkbox" id="classType_arcane" name="classTypes[]" value="arcane"'.($classe[arcane]? ' checked':'').' onclick="classTypeClick(this);"> '.$_LANG[classpage_arcane].'</label> ';
	$BODY.='<label><input type="checkbox" id="classType_divine" name="classTypes[]" value="divine"'.($classe[divine]? ' checked':'').' onclick="classTypeClick(this);"> '.$_LANG[classpage_divine].'</label> ';
	$BODY.='<label><input type="checkbox" id="classType_psionic" name="classTypes[]" value="psionic"'.($classe[psion]? ' checked':'').' onclick="classTypeClick(this);"> '.$_LANG[classpage_psionic].'</label> ';
	$BODY.='</div>';
	
	$BODY.='<h2>'.''.$_LANG[alignments].'</h2>';
	$BODY.='<h2>'.''.$_LANG[languages].'</h2>';
	$BODY.='<div class="columns"><ul>';
	while($row=mysql_fetch_assoc($result)){
		$BODY.='<li>';
			$BODY.='<span class="table" style="width:100%;">';
				$BODY.='<span class="tr">';
					$BODY.='<span class="td" style="width:1px;">';
						$BODY.='<select name="languages['.$row[id].']">';
							$BODY.='<option></option>';
							$BODY.='<option value="A"'.($classLanguages[$row[id]]=="A"?' selected':'').'>'.'Auto'.'</option>';
							$BODY.='<option value="B"'.($classLanguages[$row[id]]=="B"?' selected':'').'>'.'Bonus'.'</option>';
						$BODY.='</select>';
						$BODY.=' ';
						$BODY.='<label>';
							$BODY.='<span>'.$row[nome].'</span>';
						$BODY.='</label>';
					$BODY.='</span>';
				$BODY.='</span>';
			$BODY.='</span>';
		$BODY.='</li>';
	}
	$BODY.='</ul></div>';
$BODY.='</div>';
?>