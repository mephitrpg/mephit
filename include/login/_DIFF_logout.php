<?php
session_destroy();
session_start();
$_SESSION["logged"]=false;
?>