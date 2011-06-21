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

$query ="select p.id as id, p.nome as nome,par.tipo as tipo,to_date(p.creatoil::text,'YYYY-MM-DD') as creatoil,p.descrizione as descrizione, count(t.id) as num_ticket
         from progetto as p join partecipante par
             on p.id = par.id_progetto
                 left join ticket t
                     on p.id = t.progetto
         where par.id_utente=".$user->getUserId()."
         group by p.id, p.nome, par.tipo ,p.creatoil,p.descrizione ";

$projects = $db->query($query);

$s->assign("projects",$projects);

if(isset($_GET['error']))
    $s->assign("error","Invalid email or password");
if(isset($_GET['delete']))
    $s->assign("error","Project deleted");


$query="select to_date(data::text,'YYYY-MM-DD') as data2,id,testo from notautente where id_destinatario='".$user->getUserId()."' order by data desc limit 5 ";
$notes = $db->query($query);
$s->assign("notes",$notes);
$s->assign("title","<a href='./view_user_notes.php'>Note to you</a>");
$s->assign("link","./view_user_note.php");

$s->display("main.tpl");
$s->display("footer.tpl");
?>
