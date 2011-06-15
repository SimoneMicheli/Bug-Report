<?php /* Smarty version Smarty-3.0.7, created on 2011-06-15 16:58:18
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12224969754df8c88aae6e13-78417784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a4f6f0d327fc7bc3ea86f63906a1bf934ca50c7' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1308149805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12224969754df8c88aae6e13-78417784',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Start Bottom Information -->
</div>
<div id="bottominfo">
  <div class="container">
    <!-- bottom left information -->
    <div class="bottomcolumn">
      <h3><?php echo $_smarty_tpl->getVariable('title')->value;?>
</h3>
        <ul class="borderedlist iconlist">
        <?php  $_smarty_tpl->tpl_vars["note"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["note"]->key => $_smarty_tpl->tpl_vars["note"]->value){
?>
            <li><a href="<?php echo $_smarty_tpl->getVariable('link')->value;?>
?id=<?php echo $_smarty_tpl->getVariable('note')->value->id;?>
"" rel="facebox" "title="<?php echo substr($_smarty_tpl->getVariable('note')->value->testo,0,150);?>
"><?php echo substr($_smarty_tpl->getVariable('note')->value->testo,0,150);?>
... (<b><?php echo $_smarty_tpl->getVariable('note')->value->data2;?>
</b>)</a></li>
        <?php }} ?>
        </ul>
    </div>
    <hr />
  </div>
</div>
<div id="footer">
  <div class="container"> <a id="designby" href="" title="BUGBOX">Copyright &copy; BUGBOX 2011 </a>
  </div>
</div>
</body>
</html>
