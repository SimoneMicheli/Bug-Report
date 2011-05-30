<?php /* Smarty version Smarty-3.0.7, created on 2011-05-29 22:39:41
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15889141314de2af0df29aa2-81810993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1306701580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15889141314de2af0df29aa2-81810993',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

    <div class="article_wrapper">
      <h2>Login</h2>
	    <form action="" method="">
		    <label>Mail:</label> <input type="text" class="enewsbox"/>
		    <label>Password:</label> <input type="password" class="enewsbox"/>
		    <input class="button "type="submit" value="LOGIN"/>
		</form>
    </div>

    <hr />
  </div>
  <!-- product sales boxes -->
  <div id="rightcolumn">
    <div class="rightbox_wrapper">
      <div class="rightbox"> <img src="images/product.jpg" alt="Image:product" class="product_image" />
        <div class="product_wrapper">
          <h4>Registration</h4>
          <p>if you are not registered join now! <a href="http://www.free-css.com/" title="Join Now">Join Now</a></p>
        </div>
      </div>
    </div>
    <div class="rightbox_wrapper">
      <div class="rightbox"> <img src="images/product.jpg" alt="Image:product" class="product_image" />
        <div class="product_wrapper">
          <h4>Product Sales</h4>
          <p>Lorem ipsum dolor sit amet, consecing elit, sed diam nonummy nibh dunt ut laoreet dolore magna aliqupat. Ut wisi enim ad minim veniam,  exerci tation ullamcorper s... <a href="http://www.free-css.com/" title="Read More">more</a></p>
        </div>
      </div>
    </div>
    <div class="rightbox_wrapper lastbox">
      <div class="rightbox"> <img src="images/product.jpg" alt="Image:product" class="product_image" />
        <div class="product_wrapper">
          <h4>Product Sales</h4>
          <p>Lorem ipsum dolor sit amet, consecing elit, sed diam nonummy nibh dunt ut laoreet dolore magna aliqupat. Ut wisi enim ad minim veniam,  exerci tation ullamcorper s... <a href="http://www.free-css.com/" title="Read More">more</a></p>
        </div>
      </div>
    </div>
    <hr />
  </div>
</div>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
