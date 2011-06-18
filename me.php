<?php
include_once('./libs/Smarty.class.php');
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();

if(!$user->isLoggedIn()){
    header( "Location: ./" );
    return ;
}
$s = new Smarty();
$db = new pgDB();
$db->connect();

$s->assign("userDisplayName",$user->getDisplayName());

$query = "select ticket.id as id, titolo, status, priorita, categoria, progetto.nome as nomeprogetto
     from ticket join progetto on
     progetto.id = ticket.progetto
     where status <> 'fixed' and id_assegnato=".$user->getUserId();
$tickets = $db->query($query);

$s->assign("tickets",$tickets);

$s->display("me.tpl");

?>
