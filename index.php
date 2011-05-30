<?php
require('./libs/Smarty.class.php');
require('./libs/database.php');
$s = new Smarty;
$db =new pgDB(true);
$s->debugging=true;
$s->assign("info","ciao");
$s->display("index.tpl");
?>
