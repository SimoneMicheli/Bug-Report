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
$projects = $db->query("select progetto.id as id, progetto.nome as nome, partecipante.tipo as tipo, to_date(progetto.creatoil::text,'YYYY-MM-DD') as creatoil, progetto.descrizione as descrizione, count(ticket.id) as num_ticket from 
        partecipante join progetto
        on partecipante.id_progetto = progetto.id join ticket
        on ticket.progetto = progetto.id
        where partecipante.id_utente = '".$user->getUserId()."'
        group by progetto.id, progetto.nome, partecipante.tipo, progetto.creatoil, progetto.descrizione");

$s->assign("projects",$projects);

if(isset($_get['error']))
    $s->assign("error","Invalid email or password");


$query="select to_date(data::text,'YYYY-MM-DD') as data2,id,testo from notautente where id_destinatario='".$user->getUserId()."' order by data desc limit 5 ";
$notes = $db->query($query);
$s->assign("notes",$notes);
$s->assign("title","<a href='./view_user_notes.php'>Note to you</a>");
$s->assign("link","./view_user_note.php");

$s->display("main.tpl");
$s->display("footer.tpl");
?>
