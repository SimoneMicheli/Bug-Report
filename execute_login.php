<?php
include_once("./libs/session.lib.php");
$user = new session();
if($user->login($_POST['mail'],$_POST['password']))
    header( "Location: ./main.php" );
else
    header( "Location: ./index.php?login_error=1" );
?>
