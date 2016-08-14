<?php /* Smarty version 3.1.27, created on 2016-04-15 09:42:55
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19178525665710b79f918a85_96299975%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fbd1e4cc3843053d3825ef69e09a15780a973fb' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/footer.tpl',
      1 => 1447497730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19178525665710b79f918a85_96299975',
  'variables' => 
  array (
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710b79f91b133_96478321',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710b79f91b133_96478321')) {
function content_5710b79f91b133_96478321 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19178525665710b79f918a85_96299975';
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