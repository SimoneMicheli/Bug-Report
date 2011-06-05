<?php
include_once("./libs/session.lib.php");
$user = new session();
$user->logout();
header( "Location: ./" );
?>
