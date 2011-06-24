<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
if(!$user->isLoggedIn()){
    header( "Location: ./" );
}
if($_POST['titolo']!="" && $_POST['descrizione']!="" && $_POST['priorita']!="" && $_POST['categoria']!=""){
    $db = new pgDB();
	$db->connect();
	if($_POST['id_assegnato']==-1) {
		$id_assegnato="null";
	}else{
		$id_assegnato="'".$_POST['id_assegnato']."'";
	}
	$titolo = htmlspecialchars($_POST['titolo'],ENT_QUOTES);
	$descrizione = htmlspecialchars($_POST['descrizione'],ENT_QUOTES);
	$query = "insert into ticket(titolo,descrizione,priorita,categoria,progetto,id_creatore,id_assegnato) 
				VALUES ('".$titolo."','".$descrizione."','".$_POST['priorita']."','".$_POST['categoria']."','".$_POST['id']."','".$user->getUserId()."',".$id_assegnato.");";
	$res = $db->query($query);
}
header( "Location: ./view_project.php?id=".$_POST['id']."" );

?>
