<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["register"]);

$BODY="";
$register_message="";
$showForm=true;
if($_SESSION[logged]){
	$query="SELECT active FROM mephit_giocatore WHERE id_giocatore=".$_SESSION[user_id];
	$result=mysql_query($query);
	if($result){
		if(mysql_num_rows($result)>0){
			while($row=mysql_fetch_array($result)){
				if(!$row[active])$inactiveUser=$row;
				else $register_message=$_LANG["register_already_activated"];
			}
		}else{
			$BODY.=$_LANG["user_not_found"];
		}
	}else{
		$BODY.=$_LANG["db_error"];
	}
}else{
	if( isset($_POST[request_id]) && $_POST[request_id]==session_id() ){
		$_POST[username]=trim($_POST[username]);
		$_POST[email]=trim(strtolower($_POST[email]));
		
		if($_POST[username]==""||$_POST[pass1]==""||$_POST[pass2]==""||$_POST[email]==""){
			$register_message=$_LANG["all_fields"];
		}else if($_POST[pass1]!=$_POST[pass2]){
			$register_message=$_LANG["pw1_pw2_not_match"];
		}else{
			$email_valid=preg_match($_MEPHIT["regexp"]["email"], $_POST[email]);
			
			if($email_valid){
/*
				$query_temp="SELECT * FROM mephit_giocatore WHERE email='".$_POST[email]."'";
				$result_temp=mysql_query($query_temp);
				if($result_temp){
					if(mysql_num_rows($result_temp)>0){
						$email_valid=false;
						$register_message=$_LANG["email_already_used"];
					}
				}else{
					$BODY.=$_LANG["db_error"];
				}
*/
				$user_valid=false;
				if($email_valid){
					$query_email="SELECT * FROM mephit_giocatore WHERE nick='".$_POST[username]."'";
					$result_email=mysql_query($query_email);
					if($result_email){
						if(mysql_num_rows($result_email)>0){
							while($rrow=mysql_fetch_array($result_email)){
								if(!$rrow[active])$inactiveUser=$rrow;
								else $register_message=$_LANG["register_already_activated"];
							}
						}else{
							$register_message=$_LANG["user_not_found"];
						}
					}
				}
			}else{
				$register_message=$_LANG["ins_valid_email"];
			}
		}
		$BODY.='<p>'.$register_message.'</p>';
	}
}
if(isset($inactiveUser)){
	$website_url="http://".$_SERVER[HTTP_HOST].$_MEPHIT[WWW_ROOT];
	$activation_key=sha1($inactiveUser[id_giocatore].$_POST[username].$inactiveUser[password].$_POST[email].$inactiveUser[chaos]);
	$activation_url=$website_url.str_replace("/register_retry.php","/register.php",$_SERVER[PHP_SELF])."?id=".$inactiveUser[id_giocatore]."&key=".$activation_key;
	$to=$_POST[email];
	$subject=$_LANG["email_welcome_subject"];
	$message=str_replace("::website_url::",$website_url,$_LANG["email_welcome_content"]);
	$message=str_replace("::activation_url::",$activation_url,$message);
	$message=str_replace("::username::",$_POST[username],$message);
	$message=str_replace("::password::",$_POST[pass1],$message);
	$message=str_replace("::sign::","",$message);
	$headers=$_MEPHIT["mailer_headers"];
	$mail_sent=@mail($to,$subject,$message,$headers);
	if($mail_sent){
		$showForm=false;
		$BODY.=str_replace("::email::",$_POST["email"],$_LANG["register_already_ok"]);
	}else{
		$showForm=false;
		$BODY.=$_LANG["email_error"];
	}
}else{
//	$register_message=$_LANG["register_already_activated"];
//	$BODY.='<p>'.$register_message.'</p>';
}
if($showForm){
$BODY.=$_LANG["register_retry_welcome"].'<br /><br /><form action="'.$_SERVER[PHP_SELF].'" method="post">
<input type="hidden" name="request_id" value="'.session_id().'">
<table summary="." border="0" cellpadding="6" cellspacing="0">
<tr>
<td><b>'.$_LANG["username"].':</b>&nbsp;&nbsp;</td>
<td><input name="username" maxlength="20" value="'.$_POST[username].'"></td>
</tr>
<tr>
<td><b>'.$_LANG["password"].':</b>&nbsp;&nbsp;</td>
<td><input type="password" name="pass1" maxlength="40"></td>
</tr>
<tr>
<td><b>'.$_LANG["repeat_password"].':</b>&nbsp;&nbsp;</td>
<td><input type="password" name="pass2" maxlength="40"></td>
</tr>
<tr>
<td><b>'.$_LANG["email"].':</b>&nbsp;&nbsp;</td>
<td><input name="email" maxlength="50" value="'.$_POST[email].'"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn" value="'.$_LANG["confirm"].'"></td>
</tr>
</table>
</form>';
}
require_once("include/dress_dynamic.php");
?>
