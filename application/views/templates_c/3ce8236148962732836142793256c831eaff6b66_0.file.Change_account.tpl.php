<?php /* Smarty version 3.1.27, created on 2016-04-20 17:03:08
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Change_account.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11447686145717b64c4bda71_17986144%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ce8236148962732836142793256c831eaff6b66' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Change_account.tpl',
      1 => 1454402876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11447686145717b64c4bda71_17986144',
  'variables' => 
  array (
    'css_path' => 0,
    'plugin_path' => 0,
    'email' => 0,
    'error' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5717b64c4f6ef1_63841348',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5717b64c4f6ef1_63841348')) {
function content_5717b64c4f6ef1_63841348 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11447686145717b64c4bda71_17986144';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">        
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <!-- <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
components-summernote/dist/summernote.css"> -->
        <!-- END PLUGINS CSS -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

       
        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"> <h3>Admin Account Settings</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">
                        
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab1_1" data-toggle="tab">Change Email</a></li>
                            <li><a href="#tab1_2" data-toggle="tab">Change Password</a></li>                            
                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1_1">
                                <form action="" class="form-horizontal form-striped form-bordered" id="form" name="form_email" method="post" onsubmit="return validateFormEmail()">
                                    
                                    <div class="form-content">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">My Email Address <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                            <div class="col-md-5">
                                                <div class="inputer">
                                                    <div class="input-wrapper">                                                
                                                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" placeholder = "Enter Email">
                                                    </div>
                                                    
                                                    <span id='error_email' style="color:red"><?php if (isset($_smarty_tpl->tpl_vars['error']->value['email'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['email'];?>
 <?php }?></span>
                                                </div>
                                            </div>
                                        </div>
                                                                            
                                    </div><!--.form-content-->

                                    <div class="form-buttons">

                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">  
                                                <button class="btn btn-blue" name="submit_email" id="submit_email" type="submit" value="submit_email">Update</button>
                                                <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div><!--.tab-pane-->

                            <div class="tab-pane" id="tab1_2">
                                <form action="" class="form-horizontal form-striped form-bordered" id="form" name="form_password" method="post" onsubmit="return validateFormPassword()">
                                    
                                    <div class="form-content">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Current Password <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                            <div class="col-md-5">
                                                <div class="inputer">
                                                    <div class="input-wrapper">                                                
                                                        <input type="password" name="old_password" id="old_password" class="form-control" value="" placeholder = "Enter Current Password">
                                                    </div>                                                    
                                                    <span id='error_old_password' style="color:red"><?php if (isset($_smarty_tpl->tpl_vars['error']->value['old_password'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['old_password'];?>
 <?php }?></span>
                                                </div>
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <label class="control-label col-md-3">New Password <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                            <div class="col-md-5">
                                                <div class="inputer">
                                                    <div class="input-wrapper">                                                
                                                        <input type="password" name="new_password" id="new_password" class="form-control" value="" placeholder = "Enter New Password">
                                                    </div>
                                                    <span id='error_new_password' style="color:red"><?php if (isset($_smarty_tpl->tpl_vars['error']->value['new_password'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['new_password'];?>
 <?php }?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Confirm Password <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                            <div class="col-md-5">
                                                <div class="inputer">
                                                    <div class="input-wrapper">                                                
                                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="" placeholder = "Re-Enter Password">
                                                    </div> 
                                                    <span id='error_confirm_password' style="color:red"><?php if (isset($_smarty_tpl->tpl_vars['error']->value['confirm_password'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['confirm_password'];?>
 <?php }?></span>                                                                                      
                                                </div>
                                            </div>
                                        </div>
                                                                            
                                    </div><!--.form-content-->

                                    <div class="form-buttons">

                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">  
                                                <button class="btn btn-blue" name="submit_password" id="submit" type="submit" value="submit_password">Update</button>
                                                <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div><!--.tab-pane-->                            
                    </div><!--.tab-content-->                       

                    </div><!--.panel-body-->
                </div><!--.panel-->

            </div><!--.col-md-12-->
        </div><!--.row-->        

<?php echo $_smarty_tpl->getSubTemplate ("page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("layer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/js/jasny-bootstrap.min.js"><?php echo '</script'; ?>
>        
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_admin_account.js"><?php echo '</script'; ?>
>
        <!-- <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
components-summernote/dist/summernote.min.js"><?php echo '</script'; ?>
>         -->
        <!-- END PLUGINS AREA -->        
        <!-- <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
/parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
> -->

        <!-- BEGIN INITIALIZATION-->
        <?php echo '<script'; ?>
>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();  
                // $('.summernote').summernote({
                //     height: 300,            
                // });
            });
        <?php echo '</script'; ?>
>
        <!-- END INITIALIZATION-->
    </body>
</html><?php }
}
?>