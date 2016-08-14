<?php /* Smarty version 3.1.27, created on 2016-06-26 18:25:10
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1784082793577001e6880f20_45639128%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a41b81d2889e368fb454c0d044563d2470c2c5f7' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/header.tpl',
      1 => 1447517530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1784082793577001e6880f20_45639128',
  'variables' => 
  array (
    'title' => 0,
    'css_path' => 0,
    'image_path' => 0,
    'plugin_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577001e688b919_92058903',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577001e688b919_92058903')) {
function content_577001e688b919_92058903 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1784082793577001e6880f20_45639128';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>    
    <!-- BEGIN CORE CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
admin1.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
elements.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">
    <!-- END CORE CSS -->
    <!-- BEGIN SHORTCUT AND TOUCH ICONS -->
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
icons/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
icons/apple-touch-icon.png">
    <!-- END SHORTCUT AND TOUCH ICONS -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
modernizr/modernizr.min.js"><?php echo '</script'; ?>
>
    
</head>
<body>
    <?php echo $_smarty_tpl->getSubTemplate ("nav_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

    <div class="content"> <?php }
}
?>