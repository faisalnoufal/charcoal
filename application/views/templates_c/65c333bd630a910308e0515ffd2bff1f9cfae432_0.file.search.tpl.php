<?php /* Smarty version 3.1.27, created on 2016-04-15 09:42:55
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/search.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19137896005710b79f8fec23_60691068%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65c333bd630a910308e0515ffd2bff1f9cfae432' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/search.tpl',
      1 => 1447497730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19137896005710b79f8fec23_60691068',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710b79f900826_45439067',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710b79f900826_45439067')) {
function content_5710b79f900826_45439067 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19137896005710b79f8fec23_60691068';
?>
<!-- BEGIN SEARCH LAYER -->
<div class="search-layer">
    <?php echo $_smarty_tpl->getSubTemplate ("Search_user_details.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
    <!-- END OF SEARCH LAYER -->
    </div><?php }
}
?>