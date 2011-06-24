<?php
include_once('./libs/database.lib.php');
include_once("./libs/session.lib.php");
$user = new session();
if($_POST['email']!="" && $_POST['password1']!="" && $_POST['password2']!="" && $_POST['name']!="" && $_POST['surname']!=""){
	$db = new pgDB();
	$db->connect();
	$query = "select nextval('utente_id_seq')";
	$res = $db->query($query);
	$user_id=$res->first()->nextval;
	$nome = htmlspecialchars($_POST['name'],ENT_QUOTES);
	$cognome = htmlspecialchars($_POST['surname'],ENT_QUOTES);
	$password = htmlspecialchars($_POST['password1'],ENT_QUOTES);
	$residenza = htmlspecialchars($_POST['residenza'],ENT_QUOTES);
	$indirizzo = htmlspecialchars($_POST['indirizzo'],ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'],ENT_QUOTES);
	$query = "insert into utente(id,email,password,nome,cognome,indirizzo,residenza,telefono) VALUES (".$user_id.", '".$email."',md5('".$password."'),'".$nome."','".$cognome."','".$indirizzo."','".$residenza."','".$_POST['telefono']."');";
	$res = $db->transaction($query);
	header( "Location: ./execute_login.php?mail=".$_POST['email']."&password=".$_POST['password1']."" );
}else{
    header( "Location: ./index.php?login_error=2" );
}
?>


