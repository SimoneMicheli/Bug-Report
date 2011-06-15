<?php
include_once('./libs/Smarty.class.php');
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$s = new Smarty();
$db = new pgDB(true);
$user = new session();
if($user->isLoggedIn()) {
	header( "Location: ./main.php" );
	return;
}
$s->assign("userDisplayName",$user->getDisplayName());
if($_GET['login_error']==1)
    $s->assign("error","Invalid email or password");
if($_GET['success']==1)
    $s->assign("notice","Registration successfull, please login");
if($_GET['login_error']==2)
    $s->assign("error","Registration unsuccessful");

$s->display("index.tpl");
	
	
?>
