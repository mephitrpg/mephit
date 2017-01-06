<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["profile"]);

$BODY='';

$PATH='<a href="my_profile.php">'.$_LANG[profile].'</a>';
$TAB1='my';

require("include/menu_personal.php");

$BODY.='<h3>Links</h3>';

$BODY.='<a href="giocatori.php?id='.$_SESSION[user_id].'">Vai al mio profilo pubblico</a>';

$BODY.='<h3>Cambia password</h3>';

if( isset($_POST[request_id]) && $_POST[request_id]==session_id() ){
	if( $_POST[old_password]!="" && $_POST[new_password]!="" && $_POST[repeat_password]!="" ){
		$query="SELECT password FROM mephit_giocatore WHERE id_giocatore=".$_SESSION[user_id];
		$result=mysql_query($query);
		if($result){
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					if($row[password]==sha1($_POST[old_password])){
						if($_POST[new_password]==$_POST[repeat_password]){
							$datetime=date("Y-m-d H:i:s");
							$query1="UPDATE mephit_giocatore SET password='".sha1($_POST[new_password])."',data_upd='".$datetime."' WHERE id_giocatore=".$_SESSION[user_id];
							$result1=mysql_query($query1);
							if($result1){
								$msg="Password modificata correttamente";
							}else{
								$msg="ERRRORE DEL SERVER: IMPOSSIBILE LEGGERE IL DATABASE";
							}
						}else{
							$msg="ERRORE: LE PASSWORD NON COINCIDONO";
						}
					}else{
						$msg="ERRORE: PASSWORD ERRATA";
					}
				}
			}else{
				$msg="ERRORE: UTENTE NON TROVATO";
			}
		}else{
			$msg="ERRRORE DEL SERVER: IMPOSSIBILE LEGGERE IL DATABASE";
		}
	}else{
		$msg="ERRRORE: DEVI RIEMPIRE TUTTI I CAMPI";
	}
}

$BODY.='<form action="'.$_SERVER[PHP_SELF].'" method="post">
<input type="hidden" name="request_id" value="'.session_id().'">
<table summary="." border="0" cellpadding="6" cellspacing="0">
<tr>
<td><b>'.$_LANG["old_password"].':</b>&nbsp;&nbsp;</td>
<td><input type="password" name="old_password" maxlength="40"></td>
</tr>
<tr>
<td><b>'.$_LANG["new_password"].':</b>&nbsp;&nbsp;</td>
<td><input type="password" name="new_password" maxlength="40"></td>
</tr>
<tr>
<td><b>'.$_LANG["repeat_password"].':</b>&nbsp;&nbsp;</td>
<td><input type="password" name="repeat_password" maxlength="40"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn" value="'.$_LANG["confirm"].'"></td>
</tr>
</table>
</form>';

$BODY.='<br>'.$msg;

require_once("include/dress_dynamic.php");
?>