<?php
include("./app/common.php");
@header('Content-Type: text/html; charset=UTF-8');
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'index';

include Template::loading($conf['template'], $mod);

?>
