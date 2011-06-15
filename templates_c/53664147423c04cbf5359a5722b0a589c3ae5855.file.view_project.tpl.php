<?php /* Smarty version Smarty-3.0.7, created on 2011-06-15 09:37:59
         compiled from "./templates/view_project.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7295522924df86157e562b7-17468506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53664147423c04cbf5359a5722b0a589c3ae5855' => 
    array (
      0 => './templates/view_project.tpl',
      1 => 1308123474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7295522924df86157e562b7-17468506',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<link href="./stylesheets/demo_table_jui.css" type="text/css" rel="stylesheet">
<script src="./js/jquery.dataTables.js" type="text/javascript" ></script>
<link href="./stylesheets/smoothness/jquery-ui-1.8.4.custom.css" type="text/css" rel="stylesheet">
<script>
$(document).ready(function() {
	$('#tickets').dataTable({
    "bJQueryUI": true,
	"sPaginationType": "full_numbers"});
} );
</script>
<div class="article_wrapper">
      <?php if ($_smarty_tpl->getVariable('error')->value){?>
      <span class="error"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</span>
      <?php }?>
<h2>Project Ticket</h2>
<table id="tickets" class="display">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars["ticket"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tickets')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["ticket"]->key => $_smarty_tpl->tpl_vars["ticket"]->value){
?>
        <tr>
            <td><a href="./view_ticket.php?id=<?php echo $_smarty_tpl->getVariable('ticket')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('ticket')->value->id;?>
</a></td>
            <td><a href="./view_ticket.php?id=<?php echo $_smarty_tpl->getVariable('ticket')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('ticket')->value->titolo;?>
</a></td>
            <td><a href="./view_ticket.php?id=<?php echo $_smarty_tpl->getVariable('ticket')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('ticket')->value->priorita;?>
</a></td>
            <td><a href="./view_ticket.php?id=<?php echo $_smarty_tpl->getVariable('ticket')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('ticket')->value->status;?>
</a></td>
            <td><a href="./view_ticket.php?id=<?php echo $_smarty_tpl->getVariable('ticket')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('ticket')->value->categoria;?>
</a></td>
        </tr>
        <?php }} ?>
    </tbody>
</table>
<br /><br />
</div>
