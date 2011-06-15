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
$db = new pgDB(true);
$db->connect();

$s->assign("userDisplayName",$user->getDisplayName());
//get user project
$projects = $db->query("select progetto.id as id, progetto.nome as nome, partecipante.tipo as tipo, progetto.creatoil as creatoil, progetto.descrizione as descrizione, count(ticket.id) as num_ticket from 
        partecipante join progetto
        on partecipante.id_progetto = progetto.id join ticket
        on ticket.progetto = progetto.id
        where partecipante.id_utente = '".$user->getUserId()."'
        group by progetto.id, progetto.nome, partecipante.tipo, progetto.creatoil, progetto.descrizione");

$s->assign("projects",$projects);

if(isset($_get['error']))
    $s->assign("error","Invalid email or password");

$s->display("main.tpl");
$s->display("footer.tpl");
?>
