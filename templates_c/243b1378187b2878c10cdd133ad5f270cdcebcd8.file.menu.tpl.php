<?php /* Smarty version Smarty-3.0.7, created on 2011-06-15 09:29:13
         compiled from "./templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14743489854df85f49b50a10-46493231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '243b1378187b2878c10cdd133ad5f270cdcebcd8' => 
    array (
      0 => './templates/menu.tpl',
      1 => 1308090308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14743489854df85f49b50a10-46493231',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div id="leftcolumn">
    <h3 class="leftbox">Menu</h3>
    <ul class="leftbox borderedlist">
	<li><a href="./" >Home</a></li>
	<li><a href="./new_project.html" rel="facebox">New Project</a></li>
	<?php if ($_smarty_tpl->getVariable('project_page')->value){?>
		<li><a href="./new_ticket.php" >New Ticket</a></li>
		<?php if ($_smarty_tpl->getVariable('administrator')->value){?>
			<li><a href="./admin.php" >Administration</a></li>
		<?php }?>
	<?php }?>
	<li><a href="./new_user_note.php" rel="facebox">Send Note</a></li>
	<li><a href="./execute_logout.php" >Logout</a></li>
    </ul>
    <hr />
  </div>
  <div id="center">