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

$project_id= $_GET['id'];

$s->assign("user_id",$user->getUserId());

$results = $db->query("select * from progetto where id =".$project_id);
$project = $results->first();

$s->assign("name",$project->nome);
$s->assign("description",$project->descrizione);
$s->assign("web",$project->indirizzoweb);
$s->assign("project_id",$project_id);

$results = $db->query("select * from categoria where id_progetto=".$project_id);

$s->assign("categories",$results);

$results = $db->query("select u.email as mail, u.id as id, p.tipo as tipo
    from partecipante as p join utente as u
        on p.id_utente = u.id
    and p.id_progetto=".$project_id);
    
$s->assign("users",$results);

$s->display("admin.tpl");

?>
