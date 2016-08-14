<?php /* Smarty version 3.1.27, created on 2016-07-24 15:08:12
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Complete_customers.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18509892735794bdbc9a9198_89052278%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1d24d44cf7926228dd54e4993e069b94a461ce0' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Complete_customers.tpl',
      1 => 1454349542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18509892735794bdbc9a9198_89052278',
  'variables' => 
  array (
    'base_url' => 0,
    'customer' => 0,
    'image_path' => 0,
    'v' => 0,
    'page_links' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5794bdbc9f6d19_18129647',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5794bdbc9f6d19_18129647')) {
function content_5794bdbc9f6d19_18129647 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18509892735794bdbc9a9198_89052278';
?>

<!DOCTYPE html>
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
                <input type="text" id="input_search" class="form-control" placeholder="Search passenger" name="input_search" value="" onKeyUp="get_passenger_profile()" autocomplete='Off' />
            </div>
        </form>
    </div>

    <div class="row user-profile">
        <div class="col-md-12">
            <div class="tab-content without-border">
                <div id="trips" class="tab-pane active">

                    <div class="row" id='user_list'>
                        <?php
$_from = $_smarty_tpl->tpl_vars['customer']->value;
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
faces/passenger/<?php echo $_smarty_tpl->tpl_vars['v']->value['profile_pic'];?>
" class="user-photo" alt="">
                                    <div class="friend-content">
                                        <p class="title"><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</p>
                                        <p><a href="#">Rate <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['v']->value['rating']);?>
</a></p>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"class="btn btn-flat btn-primary btn-xs">View Profile</a>
                                    </div><!--.friend-content-->
                                </div><!--.card-->
                            </div><!--.col-md-6-->
                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>

                    </div><!--.row-->

                    <div style="float:right" id='page_link'>
                        <?php echo $_smarty_tpl->tpl_vars['page_links']->value;?>

                    </div>

                </div>


            </div><!--.tab-content-->
        </div><!--.col-->
    </div><!--.row-->


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
        // UserPages.profile();
    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 <?php }
}
?>