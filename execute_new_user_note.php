<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();

if($_POST['email'][0]!="" && $_POST['notes']!=""){

	$db = new pgDB();
	$db->connect();

	$destinatario=$_POST['email'][0];
	$notes = htmlspecialchars($_POST['notes'],ENT_QUOTES);
	$query = "insert into notautente(testo,id_creatore,id_destinatario) VALUES ('".$notes."','".$user->getUserId()."','".$destinatario."');";
	$res = $db->query($query);
	echo ("{status: 'ok', msg: 'Mail sendt'}");

}else{
	echo "{status: 'error', msg: 'Destination mail not valid'}";

}
?>
