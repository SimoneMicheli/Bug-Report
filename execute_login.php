<?php
include_once("./libs/user.lib.php");
$user = new session();
if($user->login($_POST['mail'],$_POST['password']))
    header( "Location: ./" );
else
    header( "Location: ./index.php?login_error=1" );
?>
