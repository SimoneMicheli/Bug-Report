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
$s->assign("project_page",true);

$project = $_GET['id'];
if (!$project)
    die("<h1>invalid project id</h1>");

$res = $db->query("select tipo from partecipante where id_utente = ".$user->getUserId()." and id_progetto= ".$project);
if ($res->getNumRows() == 0)
    die ("<h1>Project forbidden</h1>");

if ($res->first()->tipo == "administrator")
    $s->assign("administrator",true);
    
$res = $db->query("select * from ticket where progetto=".$project);
$s->assign("tickets",$res);

$s->display("view_project.tpl");
?>
