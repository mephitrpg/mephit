<?php
$BODY.='<form>';

if($P->row[personaggio][autore]==$_SESSION[user_id]||$_SESSION[user_type]=="admin"){
	
	if($_POST[confirm]!="DELETE"){
		$BODY.="Operazione non confermata.<br><br>";
		$BODY.='<br><input type="button" class="btn" value="'.$_LANG[back].'" onclick="location.href=\'personaggi_delete.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();">';
	}else{
		$queries=array(
			"DELETE FROM mephit_personaggio WHERE id_personaggio=".$P->row[personaggio][id_personaggio],
			"DELETE FROM mephit_personaggio_caratteristica WHERE fk_personaggio=".$P->row[personaggio][id_personaggio],
			"DELETE FROM mephit_personaggio_caratteristica_m WHERE fk_personaggio=".$P->row[personaggio][id_personaggio],
			"DELETE FROM mephit_personaggio_classe WHERE fk_personaggio=".$P->row[personaggio][id_personaggio],
			"DELETE FROM mephit_personaggio_contenitori WHERE fk_personaggio=".$P->row[personaggio][id_personaggio],
			"DELETE FROM mephit_personaggio_equip WHERE fk_personaggio=".$P->row[personaggio][id_personaggio],
			"DELETE FROM mephit_personaggiotalento WHERE fk_personaggio=".$P->row[personaggio][id_personaggio],
		);
		foreach($queries as $q)mysql_query($q);
		
		$ramo=($P->row[personaggio][autore]!=0)?$P->row[personaggio][autore].'/pg':'/png';
		if($P->row[personaggio][immagine_stampa]!=""){
			$stmp="/printable/".$P->row[personaggio][immagine_stampa];
			$img="/tooltip/".replace_extension($P->row[personaggio][immagine_stampa],"jpg");
			$img_big=$_MEPHIT[DOCUMENT_ROOT].$_MEPHIT[upload_path].'/users/'.$ramo.$stmp;
			$img_small=$_MEPHIT[DOCUMENT_ROOT].$_MEPHIT[upload_path].'/users/'.$ramo.$img;
		}
		@unlink($img_big);
		@unlink($img_small);
		
		$BODY.="Personaggio eliminato.<br><br>";
		$BODY.='<a href="creacon.php?dndtool=2">Creane un altro</a>';
		$BODY.=' &nbsp; ';
		$BODY.='<a href="my.php">Mostra i miei personaggi</a>';
	}

}else{
	
	$BODY.="Non puo eliminare questo personaggio.<br><br>";
	$BODY.='<br><input type="button" class="btn" value="'.$_LANG[back].'" onclick="location.href=\'personaggi.php?id='.$_GET[id].$pagPos_personaggio.'\';" onkeypress="this.onclick();">';
	
}

$BODY.='</form>';

?>
