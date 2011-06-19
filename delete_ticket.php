<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
if(!$user->isLoggedIn()){
    header( "Location: ./" );
}

$db = new pgDB();
$db->connect();
$query="select partecipante.id_progetto as id from ticket join partecipante on partecipante.id_progetto=ticket.progetto where ticket.id = ".$_GET['id']." and partecipante.tipo<>'notifier' and partecipante.id_utente=".$user->getUserId()."";
$res = $db->query($query);

if ($res->getNumRows() == 0)
    die ("<h1>Deletion forbidden</h1>");

$query2 = "delete from ticket where id=".$_GET['id']."";
$res2 = $db->query($query2);

header( "Location: ./view_project.php?id=".$res->first()->id."" );

?>
