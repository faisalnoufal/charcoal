<?php /* Smarty version 3.1.27, created on 2016-04-15 09:44:13
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8097404805710b7edf1ace7_60222491%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e775c1e1dd840288ef690b13e814c6cb9eca9741' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/login.tpl',
      1 => 1453454042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8097404805710b7edf1ace7_60222491',
  'variables' => 
  array (
    'css_path' => 0,
    'plugin_path' => 0,
    'image_path' => 0,
    'logo' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710b7edf3cea8_77567578',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710b7edf3cea8_77567578')) {
function content_5710b7edf3cea8_77567578 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8097404805710b7edf1ace7_60222491';
?>
<!DOCTYPE html>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Cab Management Admin Login</title>

        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <!-- BEGIN CORE CSS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
admin1.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
elements.css">
        <!-- END CORE CSS -->

        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-social/bootstrap-social.css">
        <!-- END PLUGINS CSS -->

        <!-- FIX PLUGINS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">
        <!-- END FIX PLUGINS -->

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
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>
    </head>
    <body class="bg-login printable">
<!-- LOGIN BOX-->
        <div class="login-screen">
            <div class="panel-login blur-content">
                <div class="panel-heading"><img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
logo/<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" height="100" alt=""></div><!--.panel-heading-->
                <form method="post" action="" class="parsley-validate">
                    <div id="pane-login" class="panel-body active">
                        <h2 style='letter-spacing: 15px;font-weight:bold;'>AJOUL</h2>
                        
                        <div class="form-group">
                            <div class="inputer">
                                <div class="input-wrapper">
                                    <input type="text" class="form-control" placeholder="Enter your User Name" id="username" name="username"  required>
                                </div>
                            </div>
                        </div><!--.form-group-->
                        <div class="form-group">
                            <div class="inputer">
                                <div class="input-wrapper">
                                    <input type="password" class="form-control" placeholder="Enter your password" id="passowrd" name="password"  required>
                                </div>
                            </div>
                        </div><!--.form-group-->
                        <div class="form-buttons clearfix" style="text-align: center">
                            
                            <button type="submit" class="btn btn-success" name="login" value="login">Login</button>
                        </div><!--.form-buttons-->



                        <ul class="extra-links">
                            <li><a href="#" class="show-pane-forgot-password">Forgot your password</a></li>

                        </ul>
                    </div><!--#login.panel-body-->
                </form>
                <div id="pane-forgot-password" class="panel-body">
                    <h2>Forgot Your Password</h2>
                    <div class="form-group">
                        <div class="inputer">
                            <div class="input-wrapper">
                                <input type="email" class="form-control" placeholder="Enter your email address"  required>
                            </div>
                        </div>
                    </div><!--.form-group-->
                    <div class="form-buttons clearfix">
                        <button type="submit" class="btn btn-white pull-left show-pane-login">Cancel</button>
                        <button type="submit" class="btn btn-success pull-right">Send</button>
                    </div><!--.form-buttons-->
                </div><!--#pane-forgot-password.panel-body-->



            </div><!--.blur-content-->
        </div><!--.login-screen-->
<!-- LOGIN BOX-->
        <div class="bg-blur dark">
            <div class="overlay"></div><!--.overlay-->
        </div><!--.bg-blur-->

        <svg version="1.1" xmlns='http://www.w3.org/2000/svg'>
    <filter id='blur'>
        <feGaussianBlur stdDeviation='7' />
    </filter>
    </svg>

    <!-- BEGIN GLOBAL AND THEME VENDORS -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
global-vendors.js"><?php echo '</script'; ?>
>
    <!-- END GLOBAL AND THEME VENDORS -->

    <!-- BEGIN PLUGINS AREA -->
    <!-- END PLUGINS AREA -->

    <!-- PLUGINS INITIALIZATION AND SETTINGS -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
user-pages.js"><?php echo '</script'; ?>
>
    <!-- END PLUGINS INITIALIZATION AND SETTINGS -->

    <!-- PLEASURE Initializer -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
pleasure.js"><?php echo '</script'; ?>
>
    <!-- ADMIN 1 Layout Functions -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
layout.js"><?php echo '</script'; ?>
>

    <!-- PLUGINS INITIALIZATION AND SETTINGS -->
	
	
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_Cab_Management.js"><?php echo '</script'; ?>
>
	<!-- END PLUGINS INITIALIZATION AND SETTINGS -->
    
    <!-- BEGIN INITIALIZATION-->
    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            Pleasure.init();
            Layout.init();
            UserPages.login();
            FormsValidationsParsley.init();
        });
    <?php echo '</script'; ?>
>
   
    <!-- END INITIALIZATION-->


</body>
</html>
<?php }
}
?>