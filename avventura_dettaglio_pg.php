<?php
$BODY.='<table border="0" cellpadding="0" cellspacing="0"><tr valign="top">';

$partecipanti=getAdventureMembers($avv[id_avventura]);
$personaggiPerPartecipante=array();
$query="SELECT * FROM mephit_personaggio WHERE fk_avventura=".$avv[id_avventura]." AND autore IN (".implode(",",array_keys($partecipanti)).")";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$personaggiPerPartecipante[$row[autore]]=array("id"=>$row[id_personaggio],"nome"=>$row[nome]);
}
$mypg=isset($personaggiPerPartecipante[$_SESSION[user_id]])?$personaggiPerPartecipante[$_SESSION[user_id]][id]:-1;
$mieiPersonaggi=array();
$query="SELECT id_personaggio,nome FROM mephit_personaggio WHERE (fk_avventura=".$avv[id_avventura]." OR fk_avventura IS NULL) AND autore=".$_SESSION[user_id]." ORDER BY nome";
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result)){
	$mieiPersonaggi[$row[id_personaggio]]=$row[nome];
}

if($avv[fk_master]!=$_SESSION[user_id]&&in_array($_SESSION[user_id],array_keys($partecipanti))){
	$BODY.='<td>';
		$BODY.='<h3>Il mio PG</h3>';
		if(count($mieiPersonaggi)>0){
			$BODY.='<form action="avventura_save.php" method="post">';
			$BODY.='<input type="hidden" name="id" value="'.$avv[id_avventura].'">';
			$BODY.='<input type="hidden" name="what" value="'.$_GET[what].'">';
			$BODY.='<input type="hidden" name="act" value="scegli">';
			foreach($mieiPersonaggi AS $id=>$nome){
				$BODY.='<div><input type="radio" id="choose_pg_'.$id.'" name="mypg" value="'.$id.'";';
				if($mypg==$id){
					$BODY.=' checked';
				}
				$BODY.=' /> <a href="personaggi.php?id='.$id.'">'.$nome.'</a></div>';
			}
			$BODY.='<div><input type="radio" id="choose_pg_null" name="mypg" value="NULL"'.($mypg==-1?' checked':'').' /> Nessuno</div>';
			$BODY.='<br>';
			$BODY.='<input type="submit" class="btn" value="'.$_LANG[choose].'">';
			$BODY.='</form>';
		}else{
			$BODY.='Nessun personaggio';
		}
	$BODY.='</td>';
	$BODY.='<td width="10"></td>';
}

$BODY.='<td>';
	$BODY.='<h3>Partecipanti (pg)</h3>';
	if(count($partecipanti)>0){
		if($avv[fk_master]==$_SESSION[user_id]){
			$BODY.='<form action="avventura_save.php" method="post">';
			$BODY.='<input type="hidden" name="id" value="'.$avv[id_avventura].'">';
			$BODY.='<input type="hidden" name="what" value="'.$_GET[what].'">';
			$BODY.='<input type="hidden" name="act" value="rimuovi">';
			foreach($partecipanti as $id=>$nome){
				if($id!=$_SESSION[user_id]){
					$BODY.='<div>';
					$BODY.='<input type="checkbox" name="rimuovi[]" value="'.$id.'">';
					$BODY.=' ';
					$BODY.='<a href="giocatori.php?id='.$id.'">'.$nome.'</a>';
					if(isset($personaggiPerPartecipante[$id])){
						$BODY.=' (<a href="personaggi.php?id='.$personaggiPerPartecipante[$id][id].'">'.$personaggiPerPartecipante[$id][nome].'</a>)';
					}
					$BODY.='</div>';
				}
			}
			$BODY.='<br>';
			$BODY.='<input type="submit" class="btn" value="'.$_LANG[remove].'">';
			$BODY.='</form>';
		}else{
			$BODY.='<ul>';
			foreach($partecipanti as $id=>$nome){
				if($id!=$_SESSION[user_id]){
					$BODY.='<li>';
					$BODY.='<a href="giocatori.php?id='.$id.'">'.$nome.'</a>';
					if(isset($personaggiPerPartecipante[$id])){
						$BODY.=' (<a href="personaggi.php?id='.$personaggiPerPartecipante[$id][id].'">'.$personaggiPerPartecipante[$id][nome].'</a>)';
					}
					$BODY.='</li>';
				}
			}
			$BODY.='</ul>';
		}
	}else{
		$BODY.='Nessun partecipante';
	}
$BODY.='</td>';

$BODY.='</tr></table>';
?>