<?php /* Smarty version 3.1.27, created on 2016-04-15 10:11:54
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Notify_driver.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9510704065710be6aa0b302_94095431%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8010ae2a215145c0df569da1c37a08020cc4389' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Notify_driver.tpl',
      1 => 1454331308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9510704065710be6aa0b302_94095431',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'error' => 0,
    'user_details' => 0,
    'v' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710be6aa44f22_08371566',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710be6aa44f22_08371566')) {
function content_5710be6aa44f22_08371566 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9510704065710be6aa0b302_94095431';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jquery-icheck/skins/all.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
chosen/chosen.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">
<!-- <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
components-summernote/dist/summernote.css"> -->
<!-- <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
selectize/dist/css/selectize.bootstrap3.css"> -->
<!-- END PLUGINS CSS -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3>Pilot Notification</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">
                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">

                    <div class="form-content">

                        <div class="form-group">
                            <label class="control-label col-md-3">Select</label>
                            <div class="col-md-5">
                                <div class="icheck icheck-minimal">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_all" value="all" >
                                            All
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_all" value="select" checked>
                                            Select From List
                                        </label>
                                    </div>                                    
                                </div><!--.icheck-->                               
                            </div>
                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['user_all'])) {?>
                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['user_all'];?>
</span>
                            <?php }?>
                        </div><!--.form-group-->
                                               
                        

                        <div class="form-group" id="user_select" style="display:'';">
                            <label class="control-label col-md-3">Select User</label>
                            <div class="col-md-5">
                                <select data-placeholder="Choose User" data-width="100%" name="user_id[]" id="user_id" class="chosen-select" multiple>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['user_details']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["v"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["v"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars["v"];
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars["v"] = $foreach_v_Sav;
}
?>                                                                               
                                </select>
                            </div><!--.col-md-5-->
                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['user_id[]'])) {?>
                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['user_id[]'];?>
</span>
                            <?php }?>
                        </div><!--.row-->                        

                        <div class="form-group">
                            <label class="control-label col-md-3">Message Expiry Date <span style="color: red;vertical-align:super;font-size:small"></span></label>
                            <div class="col-md-5">
                                <div class="input-wrapper">
                                    <input type="text" style="100%" name="message_expiry" class="form-control bootstrap-daterangepicker-basic" placeholder="Enter Message Expiry Date" data-parsley-error-message="Please Enter Message Expiry Date" />
                                </div>
                            </div>                            
                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['message_expiry'])) {?>
                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['message_expiry'];?>
</span>
                            <?php }?>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Message <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-9">
                                <div class="input-wrapper">
                                    <!-- <textarea class="form-control summernote" placeholder="" name="message" data-parsley-error-message="Please Enter Message "></textarea> -->
                                    <textarea class="form-control" rows="3" placeholder="" name="message" data-parsley-error-message="Please Enter Message "></textarea>
                                </div>
                                <?php if (isset($_smarty_tpl->tpl_vars['error']->value['message'])) {?>
                                    <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['message'];?>
</span>
                                <?php }?>
                            </div>
                        </div>
                        
                    </div><!--.form-content-->

                    <div class="form-buttons">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-blue" value="submit" name="submit">Send</button>
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
 
<!-- <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
> -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
components-summernote/dist/summernote.min.js"><?php echo '</script'; ?>
>     -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jquery-icheck/icheck.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 src="../../assets/globals/plugins/quicksearch/dist/jquery.quicksearch.min.js"><?php echo '</script'; ?>
> -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
notifications.js"><?php echo '</script'; ?>
>
<!-- BEGIN INITIALIZATION-->
<?php echo '<script'; ?>
>
    
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();        
        FormsPickers.init();
        FormsIcheck.init();
        FormsSelect.init();
        // $('.summernote').summernote({
        //     height: 200,            
        // });
    });

    var FormsSelect = {

        chosenSelect: function () {
            $('.chosen-select').chosen({
                width: '100%'
            });
        },
       
        init: function () {
            this.chosenSelect();          
        }
    }

<?php echo '</script'; ?>
>
<!-- END INITIALIZATION-->
</body>
</html><?php }
}
?>