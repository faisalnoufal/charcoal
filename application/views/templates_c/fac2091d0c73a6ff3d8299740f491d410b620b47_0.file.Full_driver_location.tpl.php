<?php /* Smarty version 3.1.27, created on 2016-07-27 18:14:39
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Full_driver_location.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2285463745798ddefea6350_17371459%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fac2091d0c73a6ff3d8299740f491d410b620b47' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Full_driver_location.tpl',
      1 => 1454348494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2285463745798ddefea6350_17371459',
  'variables' => 
  array (
    'base_url' => 0,
    'drivers' => 0,
    'image_path' => 0,
    'v' => 0,
    'page_links' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5798ddefeef9d6_51610959',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5798ddefeef9d6_51610959')) {
function content_5798ddefeef9d6_51610959 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2285463745798ddefea6350_17371459';
?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  


<div class="content">
    <div style="float:right">
        <form action="" class="form-horizontal form-striped form-bordered" method="post" name="search_form">
            <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">   
            <div class="form-group">
                <input type="text" id="input_search" class="form-control" placeholder="Search pilot" name="input_search" value="" onKeyUp="get_drivers()" autocomplete='Off' />
            </div>
        </form>
    </div>

    <div class="row user-profile">
        <div class="col-md-12">
            <div class="tab-content without-border">
                
                <div id="trips" class="tab-pane active">
                    <div class="row" id='user_list'>
                        <?php
$_from = $_smarty_tpl->tpl_vars['drivers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                            <div class="col-md-6">
                                <div class="card tile card-friend">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
/faces/<?php echo $_smarty_tpl->tpl_vars['v']->value['profile_pic'];?>
" class="user-photo" alt="">
                                    <div class="friend-content">
                                        <p class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"class="btn btn-flat btn-primary btn-xs" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</a></p>
                                        <p><a href="#"><?php echo $_smarty_tpl->tpl_vars['v']->value['total_trip'];?>
 Trips</a></p>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Location/Driver_location/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"class="btn btn-flat btn-primary btn-xs">View Location</a>
                                    </div><!--.friend-content-->
                                </div><!--.card-->
                            </div><!--.col-md-6-->
                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                    </div><!--.row-->                            
                </div>
            </div><!--.tab-content-->
        </div><!--.col-->
        
        <div style="float:right" id='page_link'>
            <?php echo $_smarty_tpl->tpl_vars['page_links']->value;?>

        </div>

    </div>
 </div> 
<?php echo $_smarty_tpl->getSubTemplate ("page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("layer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
driver_location.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();   

    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 
<?php }
}
?>