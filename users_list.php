<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$db = new pgDB();
$db->connect();
$user = new session();

$tag= $_GET['tag'];
$res = $db->query("select id,email from utente where email like '".$tag."%'");
$users=Array();
foreach ($res as $i => $user)
    $users[$i]=array("key"=>$user->id,"value"=>$user->email);
//    echo $i." ".$user->id."<br>";
//print_r($users);
echo json_encode($users);

?>
