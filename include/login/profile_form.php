<?php
$LOGIN='<form name="login" id="loginForm" action="'.$_SERVER["PHP_SELF"].'?'.$_SERVER["QUERY_STRING"].'" method="post">';

$LOGIN.='<input type="hidden" name="act_login" value="logout">
<div>
	<span class="userAction"><big><strong>'.htmlspecialchars($_SESSION[user]).'</strong></big></span>
	<a href="my.php" class="userAction" style="background-image:url(images/ico_profile.gif)"> '.$_LANG["my_mephit"].' </a>
';
/*
$LOGIN.='
	<a href="pm.php" class="userAction" style="background-image:url(images/ico_pm.gif)"> '.$_LANG["private_messages"].' </a>
	<a href="favourites.php" class="userAction" style="background-image:url(images/ico_favourites.gif)"> '.$_LANG["favourites"].' </a>
	<a href="contacts.php" class="userAction" style="background-image:url(images/ico_friends.gif)"> '.$_LANG["groups_friends"].' </a>
';
*/
$LOGIN.='
	<a href="javascript:document.login.submit()" class="userAction" style="background-image:url(images/ico_exit.gif)"> Logout</a>
</div>';

$LOGIN.='</form>';

require(dirname(__FILE__)."/../alerts.php");
?>