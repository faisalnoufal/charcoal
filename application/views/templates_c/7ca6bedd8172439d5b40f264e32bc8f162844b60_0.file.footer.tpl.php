<?php /* Smarty version 3.1.27, created on 2016-06-26 18:25:10
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:463389396577001e6931ae1_12039775%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ca6bedd8172439d5b40f264e32bc8f162844b60' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/footer.tpl',
      1 => 1447517530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '463389396577001e6931ae1_12039775',
  'variables' => 
  array (
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577001e6936067_15152183',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577001e6936067_15152183')) {
function content_577001e6936067_15152183 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '463389396577001e6931ae1_12039775';
?>
<!-- BEGIN GLOBAL AND THEME VENDORS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
global-vendors.js"><?php echo '</script'; ?>
>
<!-- END GLOBAL AND THEME VENDORS -->
<!-- PLEASURE -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
pleasure.js"><?php echo '</script'; ?>
>
<!-- ADMIN 1 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
layout.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    jQuery(document).ready(function ()
    {
        jQuery("#close_link").click(function ()
        {
            jQuery("#message_box").fadeOut(10);
        }
        )
    })
<?php echo '</script'; ?>
> <?php }
}
?>