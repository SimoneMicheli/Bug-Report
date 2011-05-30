<?php /* Smarty version Smarty-3.0.7, created on 2011-05-29 22:38:13
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3311560634de2aeb5b4b008-56713032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1306701492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3311560634de2aeb5b4b008-56713032',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
<link href="./stylesheets/common.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Start Header -->
<div id="header">
  <div class="container">
    <h1><a href="" title="BUGBOX">BUGBOX<span></span></a></h1>
    <hr />
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
  <?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  <!-- main content area -->
  <div id="center">
