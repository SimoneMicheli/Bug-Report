<?php
include_once('./libs/Smarty.class.php');
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
if(!$user->isLoggedIn())
    header( "Location: ./" );
$s = new Smarty();
$db = new pgDB(true);
$db->connect();

$s->assign("userDisplayName",$user->getDisplayName());
//get user project
$projects = $db->query("select progetto.id as id, progetto.nome as nome, partecipante.tipo as tipo, progetto.creatoil as creatoil, progetto.descrizione as descrizione from 
        partecipante join progetto
        on partecipante.id_progetto = progetto.id
        where partecipante.id_utente = '".$user->getUserId()."'");
$s->assign("projects",$projects);
if(isset($_get['error']))
    $s->assign("error","Invalid email or pwssword");
$s->display("main.tpl");
?>
