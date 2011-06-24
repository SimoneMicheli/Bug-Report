<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
if(!$user->isLoggedIn()){
    header( "Location: ./" );
}
if($_POST['name']!="" && $_POST['description']!=""){
    //check if user is selected only one time
    $tmp = array_intersect($_POST['notifier'],$_POST['developer']);
    $tmp1 = array_intersect($_POST['notifier'],$_POST['administrator']);
    $tmp2 = array_intersect($_POST['developer'],$_POST['administrator']);
    if (count($tmp)!=0 || count($tmp1)!=0 || count($tmp2)!=0){
        header( "Location: ./main.php?error=1" );
        return ;
    }
	$db = new pgDB();
	$db->connect();
	//get next project id
	$query = "select nextval('progetto_id_seq')";
	$res = $db->query($query);
	$project_id=$res->first()->nextval;
	//set project
	$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
	$description = htmlspecialchars($_POST['description'],ENT_QUOTES);
	$webaddress = htmlspecialchars($_POST['webaddress'],ENT_QUOTES);
	$query = "insert into progetto(id,nome,descrizione,indirizzoweb,id_proprietario) VALUES	(".$project_id.", '".$name."','".$description."','".$webaddress."',".$user->getUserId().");";
	//parse category
	$categories = explode(",",$_POST['category']);
	$query = $query." insert into categoria (nome,id_progetto) values ";
	foreach ($categories as $i=>$cat){
	    $cat = trim($cat);
	    $cat = htmlspecialchars($cat,ENT_QUOTES);
	    if($i==0)
	        $query=$query."('".$cat."',$project_id)";
	    else
	        $query=$query.",('".$cat."',$project_id)";
	}
	$query=$query."; insert into partecipante(id_utente,id_progetto,tipo) VALUES ";
	//set user as administrator
	$query=$query."(".$user->getUserId().",$project_id,'administrator')";
	//set notifier
	foreach ($_POST['notifier'] as $notifier)
	   $query=$query.",($notifier,$project_id,'notifier')";
	foreach ($_POST['developer'] as $developer)
    	$query=$query.",($developer,$project_id,'developer')";
	foreach ($_POST['administrator'] as $administrator)
	    $query=$query.",($administrator,$project_id,'administrator')";
	if($_POST['notes']!=null){
	    $notes = htmlspecialchars($_POST['notes'],ENT_QUOTES);
	    $query = $query."; insert into notaprogetto (testo,id_creatore,id_progetto) values ('".$notes."',".$user->getUserId().",".$project_id.");";
	}else{
	    $query =$query.";";
    }
	$res = $db->transaction($query);
	header( "Location: ./main.php" );
}else{
    header( "Location: ./main.php?error=1" );
}
?>
