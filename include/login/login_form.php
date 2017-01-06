<?php
$LOGIN='<div id="loginForm">
<div style="*margin-top:3px;">
<form name="login" action="'.$_SERVER["PHP_SELF"].'?'.$_SERVER["QUERY_STRING"].'" method="post">';

$LOGIN.='
';

$LOGIN.='
<input type="hidden" name="act_login" value="login">
'.strtoupper($_LANG["username"]).':
<input name="us" class="txtLogin">
'.strtoupper($_LANG["password"]).':
<input type="password" name="pw" class="txtLogin">
<input type="submit"  class="btnLogin" title="'.strtoupper($_LANG["login"]).'" value="&#9654;">
<input type="button"  class="btnLogin" title="'.strtoupper($_LANG["help"]).'" value="?" style="font-weight:bold;" onclick="location.href=\'forgot_password.php\';">
<input type="button"  class="btnLogin" value="'.strtoupper($_LANG["register"]).'" onclick="location.href=\'register.php\';">
';
if(isset($LOGIN_ERROR))$LOGIN.='<div style="background-color:red;margin:10px 0px 4px 0px;" align="center">'.$LOGIN_ERROR.'</div>';

$LOGIN.='</form>
</div>
</div>';

$ALERTS="&nbsp;";
?>