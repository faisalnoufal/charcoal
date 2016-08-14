<?php /* Smarty version 3.1.27, created on 2016-06-26 18:25:10
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/layer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:776236131577001e68bb5c7_33440693%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f36d367b2a4acc41832d557061d5d375c2f2cd7' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/layer.tpl',
      1 => 1451908660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '776236131577001e68bb5c7_33440693',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577001e68c1066_96439491',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577001e68c1066_96439491')) {
function content_577001e68c1066_96439491 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '776236131577001e68bb5c7_33440693';
?>
 <div class="layer-container">

     <?php echo $_smarty_tpl->getSubTemplate ("menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
     <?php echo $_smarty_tpl->getSubTemplate ("search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
     
</div><!--.layer-container--><?php }
}
?>