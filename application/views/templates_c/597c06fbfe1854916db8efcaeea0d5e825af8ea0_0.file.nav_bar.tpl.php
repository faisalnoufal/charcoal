<?php /* Smarty version 3.1.27, created on 2016-06-26 18:25:10
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/nav_bar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:432880522577001e688ef46_48568225%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '597c06fbfe1854916db8efcaeea0d5e825af8ea0' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/nav_bar.tpl',
      1 => 1451908788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '432880522577001e688ef46_48568225',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577001e6891754_23979657',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577001e6891754_23979657')) {
function content_577001e6891754_23979657 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '432880522577001e688ef46_48568225';
?>
 <div class="nav-bar-container">

            <!-- BEGIN ICONS -->
            <div class="nav-menu">
                <div class="hamburger">
                    <span class="patty"> </span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                </div><!--.hamburger-->
            </div><!--.nav-menu-->

            <div class="nav-search">
                <span class="search"></span>
            </div><!--.nav-search-->

            
            <!-- END OF ICONS -->

            <div class="nav-bar-border"></div><!--.nav-bar-border-->

            <!-- BEGIN OVERLAY HELPERS -->
            <div class="overlay">
                <div class="starting-point">
                    <span></span>
                </div><!--.starting-point-->
                <div class="logo">AJOUL</div><!--.logo-->
            </div><!--.overlay-->

            <div class="overlay-secondary"></div><!--.overlay-secondary-->
            <!-- END OF OVERLAY HELPERS -->

        </div><!--.nav-bar-container--><?php }
}
?>