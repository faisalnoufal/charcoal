<?php /* Smarty version 3.1.27, created on 2016-04-15 10:05:03
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Cab_Management.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12543809405710bccff06564_37850238%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '491b78f95bcd1e5d4133b3c30e2efd35f4e4dd9d' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Cab_Management.tpl',
      1 => 1454583431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12543809405710bccff06564_37850238',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'edit_id' => 0,
    'base_url' => 0,
    'cab_type_name' => 0,
    'error' => 0,
    'cab_type_short_name' => 0,
    'cab_id' => 0,
    'cabs_list' => 0,
    'v' => 0,
    'image_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bcd000b813_08216384',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bcd000b813_08216384')) {
function content_5710bcd000b813_08216384 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/ajoul/public_html/sites/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '12543809405710bccff06564_37850238';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/media/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/themes/bootstrap/dataTables.bootstrap.css">
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
                    <div class="panel-heading">
                        <div class="panel-title"> <strong><?php if ($_smarty_tpl->tpl_vars['edit_id']->value != '') {?> Edit <?php } else { ?> Add New <?php }?></strong></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" enctype="multipart/form-data" id="form" name="form" method="post">
                            <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Cab Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="cab_type" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['cab_type_name']->value;?>
" placeholder = "Enter Cab Type Name" data-parsley-error-message="Please Enter Cab Type" >
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['cab_type'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['cab_type'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Cab Short Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="short_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['cab_type_short_name']->value;?>
" placeholder = "Enter Cab Type Short Name" data-parsley-error-message="Please Enter Cab Short Name" >
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['short_name'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['short_name'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="row form-group">
                                    <div class="row">
                                    <div class="control-label col-md-3">Logo<span style="color: red;vertical-align:super;font-size:small"> *</span></div><!--.col-md-3-->
                                    <div class="col-md-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="userfile" id="userfile"  data-parsley-error-message="Please Select Logo"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div style="font-size: small">
                                        <div class="col-md-offset-3 col-md-5">
                                        <label class="list-group-item list-group-item-warning">JPG, JPEG, PNG, ICO or GIF file of 100x100 pixels, 15 KB maximum</label>
                                        </div>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                            </div><!--.form-content-->

                            <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="hidden" name="edit_id" value="<?php echo $_smarty_tpl->tpl_vars['cab_id']->value;?>
">
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

        <div class="row">
            <div class="col-md-12">
                <div class="panel" style="font-size: small">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"><h4>CAB LIST</h4></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <div class="overflow-table">

                        <?php if (count($_smarty_tpl->tpl_vars['cabs_list']->value) > 0) {?>

                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th style="width:7%">Sl.No</th>
                                    <th style="width:20%">Name</th>
                                    <th style="width:20%">ShortName</th>
                                    <th style="width:20%">Logo</th>
                                    <th style="width:10%">Edit</th>
                                    <th style="width:10%">Status</th>
                                    <th style="width:13%">Deactivate/Activate</th>                 
                                </tr>
                            </thead>
                            <tbody>                                
                                <?php
$_from = $_smarty_tpl->tpl_vars['cabs_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                <tr>
                                    <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['type_name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['type_short_name'];?>
</td>
                                    <td><img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
cab/<?php echo $_smarty_tpl->tpl_vars['v']->value['icon'];?>
" style="max-height: 50px; max-width: 50px;" /></td>
                                    <td><button class="btn btn-primary btn-xs dt-edit" title="Edit <?php echo $_smarty_tpl->tpl_vars['v']->value['type_name'];?>
" onclick="javascript:edit_cabs(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
)"><span class="glyphicon glyphicon-edit"></span></button></td>
                                    <?php if ($_smarty_tpl->tpl_vars['v']->value['active_status'] == 1) {?>
                                        <td><span class="label label-success">Active</span></td>
                                        <td><button class="btn btn-danger btn-xs dt-delete" title="Deactivate <?php echo $_smarty_tpl->tpl_vars['v']->value['type_name'];?>
" onclick="javascript:deact_cabs(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
, 0)"><span class="glyphicon glyphicon-off"></span></button></td>
                                    <?php } else { ?>
                                        <td><span class="label label-danger">Inactive</span></td>
                                        <td><button class="btn btn-success btn-xs dt-delete" title="Activate <?php echo $_smarty_tpl->tpl_vars['v']->value['type_name'];?>
" onclick="javascript:deact_cabs(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
, 1)"><span class="glyphicon glyphicon-play-circle"></span></button></td>
                                    <?php }?>                                    
                                </tr>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                            </tbody>
                        </table>
                        
                        <?php } else { ?>

                        <h4>Heads up! No Vehicles Entered</h4>

                        <?php }?>

                        </div><!--.overflow-table-->

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
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_Cab_Management.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/js/jasny-bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/media/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/themes/bootstrap/dataTables.bootstrap.js"><?php echo '</script'; ?>
>
        <!-- END PLUGINS AREA -->

        <!-- PLUGINS INITIALIZATION AND SETTINGS -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
/tables-datatables.js"><?php echo '</script'; ?>
>
        <!-- END PLUGINS INITIALIZATION AND SETTINGS -->
        
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
/cabs.js"><?php echo '</script'; ?>
>        
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
/parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
/validate_Cab_Management.js"><?php echo '</script'; ?>
>

        <!-- BEGIN INITIALIZATION-->
        <?php echo '<script'; ?>
>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();
                TablesDataTables.init();
                FormsValidationsParsley.init();       
            });
        <?php echo '</script'; ?>
>
        <!-- END INITIALIZATION-->
    </body>
</html><?php }
}
?>