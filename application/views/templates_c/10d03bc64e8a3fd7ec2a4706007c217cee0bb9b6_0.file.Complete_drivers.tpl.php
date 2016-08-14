<?php /* Smarty version 3.1.27, created on 2016-04-20 08:55:58
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Complete_drivers.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20203835775717441e370dd6_71611875%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10d03bc64e8a3fd7ec2a4706007c217cee0bb9b6' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Complete_drivers.tpl',
      1 => 1455018066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20203835775717441e370dd6_71611875',
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
  'unifunc' => 'content_5717441e39b0b4_74559904',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5717441e39b0b4_74559904')) {
function content_5717441e39b0b4_74559904 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20203835775717441e370dd6_71611875';
?>

<!DOCTYPE html>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  

<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
     

        <div class="content">

            <!-- <div class="page-header full-content parallax" style="height: 100px; overflow: hidden">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Pilots Profile <small> </small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="ion-home"></i></a></li>
                            <li><a href="#" class="active">Pilots Profile</a></li>
                        </ol>
                    </div>
                </div>
            </div> -->

            <div style="float:right">
                <form action="" class="form-horizontal form-striped form-bordered" method="post" name="search_form">
                    <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">   
                    <div class="form-group">
                        <input type="text" id="input_search" class="form-control" placeholder="Search pilot" name="input_search" value="" onKeyUp="get_drivers_profile()" autocomplete='Off' />
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
" class="user-photo" alt="profile picture">
                                            <div class="friend-content">
                                                <p class="title"><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</p>
                                                <p><a href="#"><?php echo $_smarty_tpl->tpl_vars['v']->value['total_trip'];?>
 Trips</a></p>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"class="btn btn-flat btn-primary btn-xs">View Profile</a>
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
            </div><!--.row-->

          
            <!-- Bootstrap Image Gallery lightbox -->
            <!-- To use original bootstrap modal window erase data-use-boostrap-model attr -->

        </div><!--.content-->        

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
        UserPages.profile();

    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 <?php }
}
?>