<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
$db = new pgDB();
$db->connect();

if(!$user->isLoggedIn()){
    header( "Location: ./" );
    return;
}

$results = $db->query("select tipo
    from partecipante
    where id_utente=".$user->getUserId()." and id_progetto=".$_POST['project_id']);

if ($results->getNumRows() == 0 || $results->first->tipo == 'notifier'){
    die ("<h1>forbidden</h1>");
}

if($_POST['status'] == "" )
    die ("<h1>Status not valid</h1>");

if($_POST['assigned_to'] == -1)
    $assigned = "null";
else
    $assigned = $_POST['assigned_to'];

if($_POST['status']=="fixed" || $_POST['status']=="invalid"){
	$date="now()";
}else{
	$date="null";
}
	
$query = "update ticket
set status='".$_POST['status']."',
id_assegnato=".$assigned.",
ultimamodifica=now(),
datachiusura=".$date."
where id=".$_POST['ticket_id'];

$results = $db->query($query);
if(!$results){
    echo $db->lastError();
    return ;
}

header( "Location: ./view_ticket.php?id=".$_POST['ticket_id'] );


?>
