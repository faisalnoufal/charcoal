<?php /* Smarty version 3.1.27, created on 2016-04-15 09:42:55
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/nav_bar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12609791375710b79f8c7c45_62892516%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1c68babd227ba5d1c060bbdba1ff1facd1be125' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/nav_bar.tpl',
      1 => 1451888988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12609791375710b79f8c7c45_62892516',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710b79f8c9c00_14356128',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710b79f8c9c00_14356128')) {
function content_5710b79f8c9c00_14356128 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12609791375710b79f8c7c45_62892516';
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