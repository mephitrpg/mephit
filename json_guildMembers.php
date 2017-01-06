<?php
require("include/config.php");
$id=(int)$_POST[id];
echo json_encode(getGuildMembers($id));
?>