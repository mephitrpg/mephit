<?php
$menu_personal=array(
	array("pag"=>"my.php","description"=>$_LANG["dashboard"]),
	array("pag"=>"my_notices.php","description"=>$_LANG["notices"]),
	array("pag"=>"my_options.php","description"=>$_LANG["options"]),
	array("pag"=>"my_profile.php","description"=>$_LANG["profile"]),
	array("pag"=>"my_avatar.php","description"=>$_LANG["avatar"])
);
$q=count($menu_personal);
for($i=0;$i<$q;$i++){
	if(basename($_SERVER[PHP_SELF])==$menu_personal[$i][pag])$BODY.=' <a href="'.$menu_personal[$i][pag].'"><b>'.strtoupper($menu_personal[$i][description]).'</b></a>';
	else $BODY.='<a href="'.$menu_personal[$i][pag].'">'.$menu_personal[$i][description].'</a>';
	if($i<$q-1)$BODY.=' &nbsp;| &nbsp;';
}
$BODY.='<br /><br />';
?>