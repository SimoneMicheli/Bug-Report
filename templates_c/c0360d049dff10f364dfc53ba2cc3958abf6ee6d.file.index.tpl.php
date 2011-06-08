<?php /* Smarty version Smarty-3.0.7, created on 2011-06-08 18:22:24
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9622496844defa1c0786075-79919153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1307550094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9622496844defa1c0786075-79919153',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <div class="article_wrapper">
      <?php if ($_smarty_tpl->getVariable('error')->value){?>
      <span class="error"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</span>
      <?php }?>
      <h2>Login</h2>
	    <form action="./execute_login.php" method="post">
		    <label>Mail:</label> <input type="text" class="enewsbox" name="mail"/>
		    <label>Password:</label> <input type="password" class="enewsbox" name="password"/>
		    <input class="button "type="submit" value="LOGIN"/>
		    <a class="button" href="./new_user.html" rel="facebox">JOIN NOW</a>
		</form>

    </div>

    <hr />
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
