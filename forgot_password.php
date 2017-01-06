<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["forgot_password"]);

$BODY="";
$register_message="";
$showForm=true;

if( isset($_GET["key"]) && isset($_GET["id"]) ){
	$query="SELECT * FROM mephit_giocatore WHERE id_giocatore=".$_GET["id"];
	$result=mysql_query($query);
	if($result){
		if(mysql_num_rows($result)>0){
			while($row=mysql_fetch_array($result)){
				$activation_key=sha1($row[id_giocatore].$row[nick].$row[password].$row[eMail].$row[chaos]);
				$nick=$row[nick];
				if($activation_key==$_GET["key"]){
					$newPassword=substr(sha1(mt_rand(0,10000)),3,mt_rand(9,11));
					$query_temp="UPDATE mephit_giocatore SET password='".sha1($newPassword)."' WHERE id_giocatore=".$_GET["id"];
					$result_temp=mysql_query($query_temp);
					if($result_temp){
						$to=$row[eMail];
						$subject=$_LANG["email_forgot_subject2"];
						$message=str_replace("::username::",$nick,$_LANG["email_forgot_content2"]);
						$message=str_replace("::password::",$newPassword,$message);
						$message=str_replace("::sign::","",$message);
						$headers=$_MEPHIT["mailer_headers"];
						$result_mail=@mail($to,$subject,$message,$headers);
						if($result_mail){
							$BODY.=str_replace("::email::",$row[eMail],$_LANG["forgot_new_sent"]);
						}else{
							$BODY.=$_LANG["forgot_new_is"].' '.$newPassword;
						}
					}else{
						$BODY.=$_LANG["db_error"];
					}
				}else{
					$BODY.=$_LANG["forgot_not_valid"].'.<br /><br /><a href="register.php">'.$_LANG["register"].'</a><br /><a href="forgot_password.php">'.$_LANG["forgot_password"].'</a>';
				}
			}
		}else{
			$BODY.=$_LANG["forgot_not_valid"].'.<br /><br /><a href="register.php">'.$_LANG["register"].'</a><br /><a href="forgot_password.php">'.$_LANG["forgot_password"].'</a>';
		}
	}
	$showForm=false;
}else if( isset($_POST["request_id"]) && $_POST["request_id"]==session_id() ){
		$_POST[username]=trim($_POST[username]);
		$_POST[email]=trim(strtolower($_POST[email]));
		if($_POST[username]!=""&&$_POST[email]!=""){
			$email_valid=preg_match($_MEPHIT["regexp"]["email"], $_POST[email]);
			
			if($email_valid){
				$query_temp="SELECT nick FROM mephit_giocatore WHERE email='".$_POST[email]."'";
				$result_temp=mysql_query($query_temp);
				if($result_temp){
					if(mysql_num_rows($result_temp)>0){
						while($row=mysql_fetch_array($result_temp)){
							$nick=$row[nick];
						}
						$query_temp="SELECT * FROM mephit_giocatore WHERE nick='".$_POST[username]."'";
						$result_temp=mysql_query($query_temp);
						if($result_temp){
							if(mysql_num_rows($result_temp)>0){
								while($row=mysql_fetch_array($result_temp)){
									if($row[eMail]==$_POST[email] && $nick==$_POST[username]){
										$website_url="http://".$_SERVER[HTTP_HOST];
										$activation_key=sha1($row[id_giocatore].$_POST[username].$row[password].$_POST[email].$row[chaos]);
										$activation_url=$website_url.$_SERVER[PHP_SELF]."?id=".$row[id_giocatore]."&key=".$activation_key;
										$showForm=false;
										$to=$_POST[email];
										$subject=$_LANG["email_forgot_subject1"];
										$website_url="http://".$_SERVER[HTTP_HOST].$_MEPHIT[WWW_ROOT];
										$message=str_replace("::website_url::",$website_url,$_LANG["email_forgot_content1"]);
										$message=str_replace("::activation_url::",$activation_url,$message);
										$message=str_replace("::username::",$_POST[username],$message);
										$message=str_replace("::email::",$_POST[email],$message);
										$message=str_replace("::sign::","",$message);
										$headers=$_MEPHIT["mailer_headers"];
										$result_mail=@mail($to,$subject,$message,$headers);
										if($result_mail){
											str_replace("::email::",$_POST[email],$_LANG["forgot_new_requested"]);
										}else{
											$BODY.=$_LANG["email_error"];
										}
									}else{
										$register_message=$_LANG["us_em_not_match"];
									}
								}
							}else{
								$register_message=$_LANG["user_not_found"];
							}
						}else{
							$BODY.=$_LANG["db_error"];
						}
					}else{
						$register_message=$_LANG["email_not_found"];
					}
				}else{
					$BODY.=$_LANG["db_error"];
				}
			}else{
				$register_message=$_LANG["ins_valid_email"];
			}
		}else{
			$register_message=$_LANG["all_fields"];
		}
}
if($showForm){
	$BODY.=$_LANG["forgot_welcome"].'<br /><br />';
	if($register_message!="")$BODY.='<p>'.$register_message.'</p>';
	$BODY.='<form action="'.$_SERVER[PHP_SELF].'" method="post">
<input type="hidden" name="request_id" value="'.session_id().'">
<table summary="." border="0" cellpadding="6" cellspacing="0">
<tr>
<td><b>'.$_LANG["username"].':</b>&nbsp;&nbsp;</td>
<td><input name="username" maxlength="20" value="'.$_POST[username].'"></td>
</tr>
<tr>
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
