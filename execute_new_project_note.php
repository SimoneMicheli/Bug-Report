<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
if($_POST['notes']!=""){

	$db = new pgDB();
	$db->connect();
	$query = "insert into notaprogetto(testo,id_creatore,id_progetto) VALUES ('".$_POST['notes']."','".$user->getUserId()."','".$_POST['id']."');";
	$res = $db->query($query);
	header( "Location: ./view_project.php?id=".$_POST['id']."&notice" );
}else{
	header( "Location: ./view_project.php?id=".$_POST['id']."&error" );
}
?>
