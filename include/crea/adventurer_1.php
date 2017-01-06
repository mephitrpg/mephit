<?php
$user_max_adv=$_MEPHIT[user][permission][$_SESSION[user_type]][max_adv];

if($user_max_adv<0){
	$continue=true;
}else{
	$query="SELECT * FROM mephit_avventura WHERE fk_master=".$_SESSION[user_id];
	$result=mysql_query($query);
	$continue=mysql_num_rows($result)<$user_max_adv;
}

if(!$continue){
	$BODY.=$_LANG[too_many_adv];
}else{
		
	$BODY.='<script>
	function verifica(){
		if($F("name").blank()){
			alert("Inserisci il nome");
			$("name").focus();
			return false;
		}
		return true;
	}
	function fillMasterCombo(q){
		$("loading").show();
		new Ajax.Request("json_guildMembers.php",{
			parameters:{id:q.value},
			onSuccess:function(transport){
				var o=transport.responseText.evalJSON();
				var m=$("master");
				for(var i=m.options.length-1;i>0;i--)m.options[i]=null;	//lascio sempre la prima option (utente corrente)
				for(t in o){
					if(!isNaN(t)&&t!='.$_SESSION[user_id].'){
						var p=new Option();
						p.value=t;
						p.text=o[t];
						m.options[m.options.length]=p;
					}
				}
			},
			onComplete:function(){
				$("loading").hide();
			}
		})
	}
	</script>';
	$BODY.='<div id="DnDTools">';
	$BODY.='<form id="form-dndtool" name="f" action="avventura_save.php" method="post" onsubmit="return verifica();">';
	$BODY.='<input type="hidden" name="what" value="crea">';
	
	$BODY.='<table summary="." border="0" cellpadding="0" cellspacing="0">';
	
	$BODY.='
	<tr valign="top">
	<td><strong>Nome</strong></td>
	<td width="20">&nbsp;</td>
	<td><input class="tst" id="name" name="name" value=""></td>
	</tr>
	';
	
	$guildsAsAdmin=getGuildsAsAdmin();
	if(count($guildsAsAdmin)>0){
		$BODY.='
		<tr><td colspan="3" height="20">&nbsp;</td></tr>
		<tr valign="top">
		<td><strong>Gilda</strong></td>
		<td width="20">&nbsp;</td>
		<td><select name="gilda" onchange="fillMasterCombo(this);"><option value="" style="font-style:italic;">Nessuna</option>';
		$i=0;
		foreach($guildsAsAdmin as $id=>$g){
			$BODY.='<option value="'.$id.'">'.htmlspecialchars($g).'</option>';
			$i++;
		}
		$BODY.='</select></td>
		</tr>
		';
		$BODY.='
		<tr><td colspan="3" height="20">&nbsp;</td></tr>
		<tr valign="top">
		<td><strong>Master</strong></td>
		<td width="20">&nbsp;</td>
		<td><select name="master" id="master"><option value="'.$_SESSION[user_id].'">'.$_SESSION[user].'</option>';
		$BODY.='</select><span id="loading" style="display:none;"><img src="'.$_MEPHIT[WWW_ROOT].'/themes/'.$_COOKIE["mephit_theme"].'/images/loading.gif"></span></td>
		</tr>
		';
	}
	
	$BODY.='
	<tr><td colspan="3" height="20">&nbsp;</td></tr>
	<tr><td colspan="3">
	<div align="right">
	<input type="submit" value="Avanti" class="btn">
	</div>
	</td></tr>
	';
	
	$BODY.='</table>';
	
}
?>