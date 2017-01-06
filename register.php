<?php
require_once("include/config.php");
require_once("include/dress.php");

$smarty->assign('title',$_LANG["register"]);

$BODY="";

$register_message="";
$showForm=true;

if($_SESSION[logged]){
	$BODY.=str_replace("::username::","<b>".$_SESSION[user]."</b>",$_LANG["register_need_logout"]);
	$BODY.='<br /><br /><a href="javascript:document.login.submit();">Logout</a>';
}else{
	if( isset($_GET["id"]) && isset($_GET["key"]) ){
		// attiva utente
		$showForm=false;
		$query="SELECT * FROM mephit_giocatore WHERE id_giocatore=".$_GET["id"];
		$result=mysql_query($query);
		if($result){
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					$activation_key=sha1($row[id_giocatore].$row[nick].$row[password].$row[eMail].$row[chaos]);
					if($activation_key==$_GET["key"]){
						$datetime=date("Y-m-d H:i:s");
						$query_temp="UPDATE mephit_giocatore SET active=1,data_upd='".$datetime."' WHERE id_giocatore=".$_GET["id"];
						$result_temp=mysql_query($query_temp);
						if($result_temp){
							$userDir=$_SERVER[DOCUMENT_ROOT].$_MEPHIT[upload_path]."/users/".$_GET["id"];
							mkdir($userDir);
							chmod($userDir,0777);
							foreach($_MEPHIT["user"]["folders"] as $f){
								mkdir($userDir.$f);
								chmod($userDir.$f,0777);
							}
							$BODY.=$_LANG["register_activated"];
						}else{
							$BODY.=$_LANG["db_error"];
						}
					}else{
						$BODY.=$_LANG["register_invalid_activation"].'<br /><br /><a href="register.php">'.$_LANG["register"].'</a><br /><a href="forgot_password.php">'.$_LANG["forgot_password"].'</a>';
					}
				}
			}else{
				$BODY.=$_LANG["register_invalid_activation"].'<br /><br /><a href="register.php">'.$_LANG["register"].'</a><br /><a href="forgot_password.php">'.$_LANG["forgot_password"].'</a>';
			}
		}else{
			$BODY.=$_LANG["db_error"];
		}
	}else if( isset($_POST[act]) && $_POST[act]=="register" ){
		// registra
		
		$_POST[username]=trim($_POST[username]);
		$_POST[email]=trim(strtolower($_POST[email]));
		
		if($_POST[username]==""||$_POST[pass1]==""||$_POST[pass2]==""||$_POST[email]==""){
			$register_message=$_LANG["all_fields"];
		}else if($_POST[pass1]!=$_POST[pass2]){
			$register_message=$_LANG["pw1_pw2_not_match"];
		}else{
			$email_valid=preg_match($_MEPHIT["regexp"]["email"], $_POST[email]);
			if($email_valid){
				
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
				
				$user_valid=false;
				if($email_valid){
					$query_temp="SELECT * FROM mephit_giocatore WHERE nick='".$_POST[username]."'";
					$result_temp=mysql_query($query_temp);
					if($result_temp){
						if(mysql_num_rows($result_temp)>0){
							$register_message=$_LANG["username_already_used"];
						}else{
							$user_valid=true;
						}
					}
				}
				
				if($user_valid){
					
					$r=mt_rand(-128,127); //campo tinyint
					$sha=sha1($_POST[pass1]);
					$datetime=date("Y-m-d H:i:s");
					$query_temp="INSERT INTO mephit_giocatore (nome,cognome,nick,password,eMail,chaos,data_ins,data_upd) VALUES ('','','".$_POST[username]."','".$sha."','".$_POST[email]."',".$r.",'".$datetime."','".$datetime."')";
					$result_temp=mysql_query($query_temp);
					if($result_temp){
						$lastId=mysql_insert_id();
						$website_url="http://".$_SERVER[HTTP_HOST].$_MEPHIT[WWW_ROOT];
						$activation_key=sha1($lastId.$_POST[username].$sha.$_POST[email].$r);
						$activation_url=$website_url.$_SERVER[PHP_SELF]."?id=".$lastId."&key=".$activation_key;
						$to=$_POST[email];
						$subject=$_LANG["email_welcome_subject"];
						$message=str_replace("::website_url::",$website_url,$_LANG["email_welcome_content"]);
						$message=str_replace("::activation_url::",$activation_url,$message);
						$message=str_replace("::username::",$_POST[username],$message);
						$message=str_replace("::password::",$_POST[pass1],$message);
						$message=str_replace("::sign::","",$message);
						$headers=$_MEPHIT["mailer_headers"];
//						echo $to." -- ".$subject." -- "." -- ".$message." -- ".$headers." -- ";

// http://shopno-dinga.com/myblog/?p=220
require_once("include/phpmailer/class.phpmailer.php");
$mail=new PHPMailer();
//$mail->IsSMTP();  // telling the class to use SMTP
//$mail->Host="mediacomservice.com"; // SMTP server
$mail->From=$_MEPHIT[mailer_address];
$mail->FromName=$_MEPHIT[mailer_name];
$mail->AddReplyTo($_MEPHIT[mailer_address],$_MEPHIT[mailer_name]);
$mail->AddAddress($to);
$mail->Subject=$subject;
$mail->Body=$message;

$mail_sent=$mail->Send();

//						$mail_sent=@mail($to,$subject,$message,$headers);
						if($mail_sent){
							$showForm=false;
							$t=str_replace("::click_here::","<a href=\"register_retry.php\">".$_LANG["click_here"]."</a>",$_LANG["register_ok"]);
							$t=str_replace("::email::",$_POST["email"],$t);
							$BODY.=$t;
						}else{
							$showForm=false;
							$query_temp="DELETE FROM mephit_giocatore WHERE id_giocatore=".$lastId;
							$result_temp=mysql_query($query_temp);
							$BODY.=$_LANG["email_error"];
						}
					}else{
						$BODY.=$_LANG["db_error"];
					}
				}
				
			}else{
				$register_message=$_LANG["ins_valid_email"];
			}
		}
		$BODY.='<p>'.$register_message.'</p>';
		
	}
	if($showForm){
		$BODY.=str_replace("::click_here::","<a href=\"register_retry.php\">".$_LANG["click_here"]."</a>",$_LANG["register_welcome"]);
		$BODY.='<br /><br />
		<form action="'.$_SERVER[PHP_SELF].'" method="post">
		<input type="hidden" name="act" value="register">
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
}
require_once("include/dress_dynamic.php");
?>
