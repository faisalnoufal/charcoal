<?php /* Smarty version 3.1.27, created on 2016-04-15 10:08:01
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Call_radius.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13279245565710bd814d9e63_82034264%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7921c2a5e022e127d3ef06d04a79183754927177' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Call_radius.tpl',
      1 => 1454330670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13279245565710bd814d9e63_82034264',
  'variables' => 
  array (
    'css_path' => 0,
    'call_radius' => 0,
    'error' => 0,
    'plugin_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bd81501567_38294196',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bd81501567_38294196')) {
function content_5710bd81501567_38294196 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13279245565710bd814d9e63_82034264';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">        
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

 <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"> <h3>Call Radius Setting</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post" enctype="multipart/form-data">                            
                            <div class="form-content">
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Call radius in meters <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="call_radius" id="call_radius" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['call_radius']->value;?>
" placeholder = "Enter Call Radius" data-parsley-error-message="Please Enter Call Radius" required="">
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['call_radius'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['call_radius'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>                          
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