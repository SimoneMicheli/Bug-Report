<?php
include_once('./libs/Smarty.class.php');
include_once('./libs/database.lib.php');
include_once("./libs/user.lib.php");
$s = new Smarty();
$db = new pgDB(true);
$user = new session();
if($user->isLoggedIn())
    $s->assign("userDisplayName",$user->getDisplayName());
if(isset($_GET['login_error']))
    $s->assign("error","Invalid email or pwssword");
$s->display("index.tpl");
?>
