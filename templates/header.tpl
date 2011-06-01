{config_load file="test.conf" section="header"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>{#title#}</title>
<link href="./stylesheets/common.css" rel="stylesheet" type="text/css" />
<script src="./js/jquery-1.6.1.min.js" type="text/javascript"></script>
<link href="./js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="./js/facebox/facebox.js" type="text/javascript"></script> 
</head>
<body>
<!-- Start Header -->
<div id="header">
  <div class="container">
    <h1><a href="" title="BUGBOX">BUGBOX<span></span></a></h1>
    <hr />
    {if $userDisplayName}
    <span id="navigation">Bentornato: {$userDisplayName}</span>
    {/if}
    <!-- top navigation -->
    <!--<ul id="navigation">
      <li class="active"><a href="http://www.free-css.com/" title="Home">Home</a></li>
      <li><a href="http://www.free-css.com/" title="About">About</a></li>
      <li><a href="http://www.free-css.com/" title="Services">Services</a></li>
      <li><a href="http://www.free-css.com/" title="Portofolio">Portofolio</a></li>
      <li><a href="http://www.free-css.com/" title="Contact">Contact</a></li>
    </ul>-->
    <hr />
    <!-- banner message and building background -->
    <div id="banner"> You would like professional degugging to work with you team? you have find it! this is BUGBOX </div>
    <hr />
  </div>
</div>
<!-- Start Main Content -->
<div id="main" class="container">
  <!-- left column (products and features) -->
  {include file="menu.tpl"}
  <!-- main content area -->
  <div id="center">
