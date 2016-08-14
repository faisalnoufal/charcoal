<?php /* Smarty version 3.1.27, created on 2016-06-26 18:25:10
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/search.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1969933557577001e6900a88_48233038%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e66a6bdbf3ea42fe9b95c61b0b62c2dfec3ddf17' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/search.tpl',
      1 => 1447517530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1969933557577001e6900a88_48233038',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577001e69047e3_92779504',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577001e69047e3_92779504')) {
function content_577001e69047e3_92779504 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1969933557577001e6900a88_48233038';
?>
<!-- BEGIN SEARCH LAYER -->
<div class="search-layer">
    <?php echo $_smarty_tpl->getSubTemplate ("Search_user_details.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
    <!-- END OF SEARCH LAYER -->
    </div><?php }
}
?>