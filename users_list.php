<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$db = new pgDB();
$db->connect();
$user = new session();

if(!$user->isLoggedIn()){
    header( "Location: ./" );
    return ;
}
$user_id = $user->getUserId();

if($_SERVER['HTTP_X_REQUESTED_WITH'] != "XMLHttpRequest"){
    echo "<h1>forbidden</h1>";
    return ;
}

$tag= $_GET['tag'];
$res = $db->query("select id,email from utente where email like '".$tag."%'");
$users=Array();
foreach ($res as $i => $user)
    if($user->id != $user_id)
        $users[$i]=array("key"=>$user->id,"value"=>$user->email);
echo json_encode($users);

?>
