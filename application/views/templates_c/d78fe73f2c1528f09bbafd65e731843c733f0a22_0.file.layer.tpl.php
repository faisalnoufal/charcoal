<?php /* Smarty version 3.1.27, created on 2016-04-15 09:42:55
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/layer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7873197415710b79f8d9db5_12356167%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd78fe73f2c1528f09bbafd65e731843c733f0a22' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/layer.tpl',
      1 => 1451888860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7873197415710b79f8d9db5_12356167',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710b79f8dcd09_90909032',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710b79f8dcd09_90909032')) {
function content_5710b79f8dcd09_90909032 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7873197415710b79f8d9db5_12356167';
?>
 <div class="layer-container">

     <?php echo $_smarty_tpl->getSubTemplate ("menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
     <?php echo $_smarty_tpl->getSubTemplate ("search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
     
</div><!--.layer-container--><?php }
}
?>