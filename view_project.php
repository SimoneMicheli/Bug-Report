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
    
$project_inf = $db->query("select * from progetto where id=".$project);
$s->assign("project",$project_inf->first());

$res = $db->query("select * from ticket where progetto=".$project);
$s->assign("tickets",$res);

$query="select to_date(data::text,'YYYY-MM-DD') as data2,id,testo from notaprogetto where id_progetto='".$project."' order by data desc";
$notes = $db->query($query);
$s->assign("notes",$notes);
$s->assign("title","Project notes");
$s->assign("link","./view_project_note.php");
$s->assign("id",$project);


//non va questa parte, non riesce a prendere la get error.
if(isset($_GET['error']))
    $s->assign("error","Error during note creation");
if(isset($_GET['notice']))
    $s->assign("notice","Note created");
	
$s->display("view_project.tpl");
$s->display("footer.tpl");
?>
