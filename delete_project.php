<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
if(!$user->isLoggedIn()){
    header( "Location: ./" );
}

$db = new pgDB();
$db->connect();
$query="select * from progetto where id=".$_GET['id']." and id_proprietario=".$user->getUserId()."";
$res = $db->query($query);

if ($res->getNumRows() == 0)
    die ("<h1>Deletion forbidden</h1>");

$query2 = "delete from progetto where id=".$_GET['id']."";
$res2 = $db->query($query2);

header( "Location: ./main.php?delete=1" );

?>
