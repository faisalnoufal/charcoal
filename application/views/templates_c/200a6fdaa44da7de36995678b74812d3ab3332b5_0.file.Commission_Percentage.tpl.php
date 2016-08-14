<?php /* Smarty version 3.1.27, created on 2016-04-15 10:06:40
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Commission_Percentage.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17576044945710bd30620da3_00248724%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '200a6fdaa44da7de36995678b74812d3ab3332b5' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Commission_Percentage.tpl',
      1 => 1454330752,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17576044945710bd30620da3_00248724',
  'variables' => 
  array (
    'css_path' => 0,
    'base_url' => 0,
    'percentage' => 0,
    'error' => 0,
    'plugin_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bd306488f5_90772407',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bd306488f5_90772407')) {
function content_5710bd306488f5_90772407 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17576044945710bd30620da3_00248724';
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
                        <div class="panel-title"> <h3>Wage Percentage Settings</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">

                            <div class="form-content">
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Commission Percentage <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="percentage" id="percentage" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['percentage']->value;?>
" placeholder = "Enter Percentage" data-parsley-error-message="Please Enter Commission Percentage" required="">
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['percentage'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['percentage'];?>
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