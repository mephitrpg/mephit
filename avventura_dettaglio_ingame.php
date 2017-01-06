<?php
$QUERY_UNLIMITED="
	SELECT *
	FROM mephit_avventura_forum AS f
	WHERE f.fk_avventura=".$avv[id_avventura]."
	AND tipo='pbf'
	ORDER BY data_ins
";
$jSQL = new jure_mysql();
$result=$jSQL->getSelectResults($QUERY_UNLIMITED);

if($result[error]){
	$BODY.='<div>';
	$BODY.=implode('<br>',$result[error_messages]);
	$BODY.='</div>';
}else{
	if($result['empty']){
		$BODY.='<div>'.'Nessun elemento'.'</div>';
	}else{
		$giocatori=array();
		$personaggi=array();
		foreach($result[rows] as $row){
			if(!is_null($row[fk_giocatore])&&!in_array($row[fk_giocatore],$giocatori))$giocatori[]=$row[fk_giocatore];
			if(!is_null($row[fk_personaggio])&&!in_array($row[fk_personaggio],$personaggi))$personaggi[]=$row[fk_personaggio];
		}
	}
}

if(count($result[rows])>0){

	$query2="SELECT * FROM mephit_personaggio WHERE id_personaggio IN (".implode(",",$personaggi).")";
	$result2=mysql_query($query2);
	$personaggi=array();
	while($row=mysql_fetch_assoc($result2))$personaggi[$row[id_personaggio]]=$row;

	$query2="SELECT * FROM mephit_giocatore WHERE id_giocatore IN (".implode(",",$giocatori).")";
	$result2=mysql_query($query2);
	$giocatori=array();
	while($row=mysql_fetch_assoc($result2))$giocatori[$row[id_giocatore]]=$row;
	
}

if($result[error]){
	$BODY.='<div>';
	$BODY.=implode('<br>',$result[error_messages]);
	$BODY.='</div>';
}else{
	if($result['empty']){
		$BODY.='<div>'.'Nessun elemento'.'</div>';
	}else{
		$BODY.='<style>';
		$BODY.='.overbox{position:absolute;background:#fff;border:1px solid #666;padding:6px;opacity:0.9;-moz-opacity:0.9;filter: alpha(opacity=90);zoom:1;}';
		$BODY.='.overbox-close{display:block;float:right;text-decoration:none;padding-left:1em;}';
		$BODY.='</style>';
		
		$BODY.=$jSQL->dressMenuWithButtons($result[menu]);
		$BODY.='<table border="0" cellpadding="6" cellspacing="0" width="100%">';
		foreach($result[rows] as $item){
			
			$pID=$item[fk_personaggio];
			$p=is_null($pID)?NULL:$personaggi[$pID];
			$gID=$item[fk_giocatore];
			$g=is_null($gID)?NULL:$giocatori[$gID];
			
			
			if(is_null($pID))$postType="gm";
			else if($p[autore]==0)$postType="png";
			else $postType="pg";
			
			$BODY.="\n".'<tr id="post-'.$item[id_post].'" valign="top">';
			$BODY.='<td width="100" nowrap class="pbf-post-'.$postType.'">';
			
			if(!is_null($p)){
				$ramo=($p[autore]!=0)?$p[autore].'/pg':'/png';
				if($p[immagine_stampa]!=""){
					$stmp="/printable/".$p[immagine_stampa];
					$img="/tooltip/".replace_extension($p[immagine_stampa],"jpg");
					$img_big=$_MEPHIT[WWW_ROOT].$_MEPHIT[upload_path].'/users/'.$ramo.$stmp;
					$img_small=$_MEPHIT[WWW_ROOT].$_MEPHIT[upload_path].'/users/'.$ramo.$img;
				}else{
					$img_big=$_MEPHIT[WWW_ROOT]."/images/pg_image.jpg";
					$img_small=$_MEPHIT[WWW_ROOT]."/images/pg_thumb.gif";
				}
				
				$BODY.='<div id="overbox-'.$item[id_post].'" class="overbox" style="display:none;">';
				$BODY.='<a href="javascript:;" onclick="$(this).up(\'.overbox\').toggle();" class="overbox-close">&times;</a>';
				if($p[autore]!=0){
					$BODY.='PG: <a href="personaggi.php?id='.$pID.'">'.$p[nome].'</a><br>';
					$BODY.='Giocatore: <a href="giocatori.php?id='.$p[autore].'">'.getNick($p[autore]).'</a><br>';
				}else{
					$BODY.='PNG: '.$item[pgName].'<br>';
				}
				$BODY.='</div>';
	//			
				$BODY.='<a href="javascript:;" onclick="$(this).previous(\'.overbox\').toggle();" title="'.htmlspecialchars($p[nome]).'"><img src="'.$img_small.'" border="0" align="left"></a>';
			}
			
			$BODY.='</td>';
			$text=nl2br(htmlspecialchars($item[text]));
			$text=str_replace("&amp;#91;","&#91;",$text);
			$text=str_replace("&amp;#93;","&#93;",$text);
			$BODY.='<td class="pbf-post-'.$postType.'">'.bbcode($text).'</td>';
			$BODY.='</tr>';
			
			
		}
		
		$BODY.="\n".'<tr valign="top">';
		$BODY.='<td width="100" nowrap></td>';
		$BODY.='<td>';
		$BODY.='<script>
		function getCaret(el) { 
		  if (el.selectionStart) { 
			return el.selectionStart; 
		  } else if (document.selection) { 
			el.focus(); 
		
			var r = document.selection.createRange(); 
			if (r == null) { 
			  return 0; 
			} 
		
			var re = el.createTextRange(), 
				rc = re.duplicate(); 
			re.moveToBookmark(r.getBookmark()); 
			rc.setEndPoint(\'EndToStart\', re); 
		
			return rc.text.length; 
		  }  
		  return 0; 
		}
		function addBB(q){
			var txt=$("txt");
			txt.value=txt.value.substring(0,getCaret(txt))+q+txt.value.substring(getCaret(txt));
		}
		
		
		
		</script>';
		$BODY.='[<a href="javascript:addBB(\'[spoiler]\');">spoiler</a>][<a href="javascript:addBB(\'[/spoiler]\');">/spoiler</a>] &nbsp; ';
		$BODY.='[<a href="javascript:addBB(\'[roll]\');">roll</a>][<a href="javascript:addBB(\'[/roll]\');">/roll</a>] &nbsp; ';
		$BODY.='[<a href="javascript:addBB(\'[b]\');">b</a>][<a href="javascript:addBB(\'[/b]\');">/b</a>] &nbsp; ';
		$BODY.='[<a href="javascript:addBB(\'[i]\');">i</a>][<a href="javascript:addBB(\'[/i]\');">/i</a>] &nbsp; ';
		$BODY.='<form action="avventura_save.php" method="post">';
			$BODY.='<input type="hidden" name="id" value="'.$avv[id_avventura].'">';
			$BODY.='<input type="hidden" name="what" value="ingame">';
			$BODY.='<input type="hidden" name="act" value="post">';
			$BODY.='<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr>';
			$BODY.='<td width="100%"><textarea id="txt" class="txt" name="post" style="width:100%;height:90px;overflow:auto;"></textarea></td>';
			$BODY.='<td><input type="submit" class="btn" value="'.$_LANG[send].'" style="width:90px;height:90px;"></td>';
			$BODY.='</tr></table>';
		$BODY.='</form></td>';
		$BODY.="\n".'</table>';
		$BODY.=$jSQL->dressMenuWithButtons($result[menu]);
	}
}
?>