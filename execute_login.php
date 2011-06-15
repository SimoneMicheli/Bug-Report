<?php
include_once("./libs/session.lib.php");
$user = new session();
if($user->login($_REQUEST['mail'],$_REQUEST['password']))
    header( "Location: ./main.php" );
else
    header( "Location: ./index.php?login_error=1" );
?>
