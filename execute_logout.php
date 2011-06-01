<?php
include_once("./libs/user.lib.php");
$user = new session();
$user->logout();
header( "Location: ./" );
?>
