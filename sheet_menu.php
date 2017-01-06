<?php
# Configuration (language)
require_once("include/sheet/config.php");

# Language Selection
require_once("include/languages/sheet/".$_COOKIE["mephit_lang"].".php");
?>
<html><head><title><?=$_LANG["TITLE"]?></title>
<link rel="stylesheet" href="css/sheet_menu.css">
<script>
editables=new Array("<?=implode("\",\"",$fields)?>");
msg=new Array();
msg["error_desMax"]="<?=addslashes($_LANG["errorMsg_desMax"])?>";
msg["show"]="<?=addslashes($_LANG["show_editable_fields"])?>";
msg["hide"]="<?=addslashes($_LANG["hide_editable_fields"])?>";
msg["working"]="<?=addslashes($_LANG["msg_working"])?>";
</script>
<script src="js/sheet.js"></script>
<script>
top.sheet.location.href="sheet.php?id=<?=$_GET["id"]?>";
</script>
</head><body>
<table border=0 cellpadding=0 cellspacing=0 width="100%"><tr><td>
<table border=0 cellpadding=0 cellspacing=0><tr>
<td id="l"><a href="#" title="<?=$_LANG["save"]?>" style="background-image:url(admin/i/save.gif);" onClick="this.blur();save();">&nbsp;</a><a href="#" title="<?=$_LANG["print"]?>" style="background-image:url(admin/i/print.gif);" onClick="this.blur();showEditables(false);top.sheet.print();">&nbsp;</a><a href="#" title="<?=$_LANG["reload"]?>" style="background-image:url(admin/i/reload.gif);" onClick="this.blur();reload();">&nbsp;</a></td>
<td id="m"><a href="#" onClick="this.blur();showEditables();" id="se"><?=$_LANG["show_editable_fields"]?></a></td>
</tr></table></td>
<td id="message" align="right" nowrap style="padding-right:6px;"></td>
</tr></table>
</body></html>