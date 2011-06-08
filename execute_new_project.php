<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
if(!$user->isLoggedIn()){
    header( "Location: ./" );
}
if($_POST['name']!="" && $_POST['description']!=""){
	$db = new pgDB();
	$db->connect();
	//get next project id
	$query = "select nextval('progetto_id_seq')";
	$res = $db->query($query);
	$project_id=$res->first()->nextval;
	//set project
	$res = $db->query("insert into progetto(id,nome,descrizione,indirizzoweb,id_proprietario) VALUES	($project_id , '".$_POST['name']."','".$_POST['description']."','".$_POST['webaddress']."',".$user->getUserId().")");
	//set notifier
	$query= "insert into partecipante(id_utente,id_progetto,tipo) VALUES ";
	//set user as administrator
	$query=$query."(".$user->getUserId().",$project_id,'amministratore')";
	//set notifier
	foreach ($_POST['notifier'] as $notifier){
	        $query=$query.",($notifier,$project_id,'segnalatore')";
	}
	echo $query;
	$res = $db->query($query);
}else{
echo "mi manca qualcosa";
}
?>
