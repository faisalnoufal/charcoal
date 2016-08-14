<?php /* Smarty version 3.1.27, created on 2016-04-15 10:07:56
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Time_management.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15226379045710bd7c159d66_45392868%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '816e5d3f4f3b96b7d5a013eb8d5913364c7a72d7' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Time_management.tpl',
      1 => 1454330612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15226379045710bd7c159d66_45392868',
  'variables' => 
  array (
    'css_path' => 0,
    'plugin_path' => 0,
    'base_url' => 0,
    'time_array' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bd7c18af41_36117667',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bd7c18af41_36117667')) {
function content_5710bd7c18af41_36117667 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15226379045710bd7c159d66_45392868';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">        
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <!-- END PLUGINS CSS -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

       
        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"> <h3>Time Management</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" id="form" name="form" method="post">
                            <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-3">KM Per Hour <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="km_per_hour" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['time_array']->value['km_per_hour'];?>
" placeholder = "Enter KM Per Hour" data-parsley-error-message="Please Enter KM Per Hour" >
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['km_per_hour'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['km_per_hour'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Initial Waiting Time <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="initial_waiting_time" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['time_array']->value['initial_waiting_time'];?>
" placeholder = "Enter Initial Waiting Time" data-parsley-error-message="Please Enter Initial Waiting Time" >
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['initial_waiting_time'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['initial_waiting_time'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div><!--.form-group-->  

                                <div class="form-group">
                                    <label class="control-label col-md-3">Additional Waiting Time <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="additional_waiting_time" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['time_array']->value['additional_waiting_time'];?>
" placeholder = "Enter Additional Waiting Time" data-parsley-error-message="Please Enter Additional Waiting Time" >
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['additional_waiting_time'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['additional_waiting_time'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div><!--.form-group-->                              

                            </div><!--.form-content-->

                            <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">                                        
                                        <button type="submit" class="btn btn-blue" value="submit" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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
        <!-- END PLUGINS AREA -->        
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
/parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>

        <!-- BEGIN INITIALIZATION-->
        <?php echo '<script'; ?>
>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();                
            });
        <?php echo '</script'; ?>
>
        <!-- END INITIALIZATION-->
    </body>
</html><?php }
}
?>