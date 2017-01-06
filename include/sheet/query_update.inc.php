<?php
# Popolo un array con tutti i campi NULL della tabella mephit_personaggio
$skills_fields=array();
$query="SHOW FIELDS FROM mephit_personaggio";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	if($row["Null"])$skills_fields[]=$row["Field"];
}

$query_fields=array();
foreach($fields as $field){
	# Sostituisco i valori vuoti con i valori NULL
	if( trim($_POST[$field])=="" && in_array($field,$skills_fields) )$query_fields[]=$field."=NULL";
	else{
		# Converto i pesi
		if( strlen($field)>6 && substr($field,0,6)=="weight" && $_POST[$field]!=0 ){
			$t=$_POST[$field]/(($_COOKIE["mephit_lang"]=="it_Italiano")?0.5:1);
			if($t==0)$query_fields[]=$field."=NULL";
			else $query_fields[]=$field."='".$t."'";
		}
		else $query_fields[]=$field."='".$_POST[$field]."'";
	}
}
$query="UPDATE mephit_personaggio SET ".implode(",",$query_fields)." WHERE id_personaggio=".$_POST[id_personaggio];
$result=mysql_query($query);
if($result){
	$message="<div class=ok>[".date("d/m/Y H:i:s")."] &nbsp;".$_LANG["msg_char_modified"]."</div>";
}else{
	$message="<div class=error align=right>[".date("d/m/Y H:i:s")."] &nbsp;".$_LANG["msg_error_char_modified"]."</div>";
}
//echo "<h1>---$message---</h1>";
?>