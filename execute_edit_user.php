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



$query = "update partecipante set tipo='".$_POST['type']."' where id_utente='".$_POST['user']."' and id_progetto='".$_POST['id']."'";

$results = $db->query($query);
if(!$results){
    echo $db->lastError();
    return ;
}

header( "Location: ./admin.php?id=".$_POST['id']."");


?>
