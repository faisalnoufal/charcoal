<?php /* Smarty version 3.1.27, created on 2016-04-15 09:42:55
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/About_us.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9441471475710b79f88e4c6_19368154%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd256dc60f1918c1f18fa674c22d5a6a98861ab6' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/About_us.tpl',
      1 => 1454332708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9441471475710b79f88e4c6_19368154',
  'variables' => 
  array (
    'css_path' => 0,
    'plugin_path' => 0,
    'about_array' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710b79f8bce80_75695799',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710b79f8bce80_75695799')) {
function content_5710b79f8bce80_75695799 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9441471475710b79f88e4c6_19368154';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">        
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
components-summernote/dist/summernote.css">
        <!-- END PLUGINS CSS -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

       
        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"> <h3>About Us Settings</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">
                        
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab1_1" data-toggle="tab">Passenger Side Content</a></li>
                            <li><a href="#tab1_2" data-toggle="tab">Pilot Side Content</a></li>                            
                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1_1">
                                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" id="form" name="form_passenger" method="post">
                                    <div class="form-content">
                                        <div class="form-group">                                            
                                            <div class="col-md-12">
                                                <div class="inputer">
                                                    <div class="input-wrapper">
                                                    <textarea class="form-control summernote" name="passenger_content"><?php echo $_smarty_tpl->tpl_vars['about_array']->value['passenger_content'];?>
</textarea>
                                                    </div>
                                                    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['passenger_content'])) {?>
                                                        <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['passenger_content'];?>
</span>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div><!--.form-group-->
                                    </div><!--.form-content-->

                                    <div class="form-buttons">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">                                        
                                                <button type="submit" class="btn btn-blue" value="submit_passenger" name="submit_passenger">Submit</button>
                                                <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div><!--.tab-pane-->
                            <div class="tab-pane" id="tab1_2">
                                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" id="form" name="form_pilot" method="post">                                    
                                    <div class="form-content">                                        
                                        <div class="form-group">                                            
                                            <div class="col-md-12">
                                                <div class="inputer">
                                                    <div class="input-wrapper">
                                                        <textarea class="form-control summernote" name="pilot_content"><?php echo $_smarty_tpl->tpl_vars['about_array']->value['driver_content'];?>
</textarea>
                                                    </div>
                                                    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['pilot_content'])) {?>
                                                        <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['pilot_content'];?>
</span>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div><!--.form-group-->                                

                                    </div><!--.form-content-->

                                    <div class="form-buttons">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">                                        
                                                <button type="submit" class="btn btn-blue" value="submit_pilot" name="submit_pilot">Submit</button>
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
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
components-summernote/dist/summernote.min.js"><?php echo '</script'; ?>
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
                $('.summernote').summernote({
                    height: 300,            
                });
            });
        <?php echo '</script'; ?>
>
        <!-- END INITIALIZATION-->
    </body>
</html><?php }
}
?>