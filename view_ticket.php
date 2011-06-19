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

$ticket_id=$_GET['id'];
$results = $db->query("select ticket.id as id, titolo,descrizione,datacreazione,ultimamodifica as ultimamodifica,priorita,status,datachiusura,categoria,progetto,email,id_assegnato from 
    ticket join utente on
        ticket.id_creatore = utente.id
    where ticket.id=".$ticket_id);
if(!$results || $results->getNumRows() == 0)
    die ("<h1>Invalid ticket id</h1>");

$ticket = $results->first();
$results = $db->query("select tipo from partecipante where id_utente = ".$user->getUserId()." and id_progetto= ".$ticket->progetto);
if ($results->getNumRows() == 0)
    die ("<h1>Ticket forbidden</h1>");

if ($results->first()->tipo == 'administrator'){
    $s->assign("administrator",true);
    $s->assign("ticket_page",true);
    $s->assign("ticket_id",$ticket_id);
}
if ($results->first()->tipo == 'developer'){
    $s->assign("developer",true);
}



$s->assign("ticket",$ticket);

$results = $db->query(" select notaticket.testo as testo, notaticket.data as data, utente.email as mail
    from notaticket join utente on
        notaticket.id_creatore = utente.id
    where id_ticket=".$ticket->id." order by data");
$s->assign("notes",$results);

$results = $db->query("select utente.id as id, utente.email as email
    from partecipante join utente on
        partecipante.id_utente = utente.id
    where partecipante.id_progetto=".$ticket->progetto);
$s->assign("users",$results);

$s->assign("user_id",$user->getUserId());
 //print_r($ticket);
$s->display("view_ticket.tpl");

?>
