<?php /* Smarty version Smarty-3.0.7, created on 2011-06-15 09:54:30
         compiled from "./templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9885655694df86536853255-89316663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48ad11f68be179e1830edf3ce56b82b0712baeff' => 
    array (
      0 => './templates/main.tpl',
      1 => 1308124468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9885655694df86536853255-89316663',
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
	$('#projects').dataTable({
    "bJQueryUI": true,
	"sPaginationType": "full_numbers"});
} );
</script>
<div class="article_wrapper">
      <?php if ($_smarty_tpl->getVariable('error')->value){?>
      <span class="error"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</span>
      <?php }?>
<h2>Projects</h2>
<table id="projects" class="display">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Role</th>
            <th>Ticket</th>
            <th>Created on</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars["project"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projects')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["project"]->key => $_smarty_tpl->tpl_vars["project"]->value){
?>
        <tr class="<?php echo $_smarty_tpl->getVariable('project')->value->tipo;?>
">
            <td><a href="./view_project.php?id=<?php echo $_smarty_tpl->getVariable('project')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('project')->value->id;?>
</a></td>
            <td><a href="./view_project.php?id=<?php echo $_smarty_tpl->getVariable('project')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('project')->value->nome;?>
</a></td>
            <td><a href="./view_project.php?id=<?php echo $_smarty_tpl->getVariable('project')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('project')->value->descrizione;?>
</a></td>
            <td><a href="./view_project.php?id=<?php echo $_smarty_tpl->getVariable('project')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('project')->value->tipo;?>
</a></td>
            <td><a href="./view_project.php?id=<?php echo $_smarty_tpl->getVariable('project')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('project')->value->num_ticket;?>
</a></td>
            <td><a href="./view_project.php?id=<?php echo $_smarty_tpl->getVariable('project')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('project')->value->creatoil;?>
</a></td>
        </tr>
        <?php }} ?>
    </tbody>
</table>
</div>
