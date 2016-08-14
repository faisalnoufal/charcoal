<?php /* Smarty version 3.1.27, created on 2016-07-27 05:57:18
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Fare_Management.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18320302955798311e91b854_94962548%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddb137d4863087f96c585110fc1700936a00c708' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Fare_Management.tpl',
      1 => 1459785124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18320302955798311e91b854_94962548',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'base_url' => 0,
    'cabs_list' => 0,
    'v' => 0,
    'error' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5798311e99d229_18273928',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5798311e99d229_18273928')) {
function content_5798311e99d229_18273928 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/opt/lampp/htdocs/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '18320302955798311e91b854_94962548';
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
        <!-- END PLUGINS CSS -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"> <strong>Update Fare</strong></div>
                    </div> <!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">
                            <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Cab Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5"> 
                                        <div class="input-wrapper">                                       
                                            <select class="selecter" name="cab_id" id="cab_id" data-parsley-error-message="Please Select Cab type" data-width="100%" required="" class="selectpicker" data-live-search="true" >
                                                <option value=''>Select Cab Type</option>
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
                                                    <option value=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
><?php echo $_smarty_tpl->tpl_vars['v']->value['type_short_name'];?>
</option>
                                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                            </select>
                                        </div>
                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['cab_id'])) {?>
                                            <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['cab_id'];?>
</span>
                                        <?php }?>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-4">Fare Per KM <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="fare_per_km" id="fare_per_km" class="form-control" value="" placeholder = "Enter Fare Per Kilometers" data-parsley-error-message="Please Enter Fare" required="">
                                            </div> 
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['fare_per_km'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['fare_per_km'];?>
</span>
                                            <?php }?>                                           
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-4">Minimum Charge (Instant Booking)<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="minimum_charge" id="minimum_charge" class="form-control" value="" placeholder = "Enter Minimum Charge (Instant Booking)" data-parsley-error-message="Please Enter Minimum Charge (Instant Booking)" required="">
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['minimum_charge'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['minimum_charge'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-4">Minimum Charge (Future Booking)<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="minimum_later" id="minimum_later" class="form-control" value="" placeholder = "Enter Minimum Charge (Future Booking)" data-parsley-error-message="Please Enter Minimum Charge (Future Booking)" required="">
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['minimum_later'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['minimum_later'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-4">Minimum Distance <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="minimum_distance" id="minimum_distance" class="form-control" value="" placeholder = "Enter Minimum Distance" data-parsley-error-message="Please Enter Minimum Distance " required="">
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['minimum_distance'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['minimum_distance'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                 <div class="form-group">
                                    <label class="control-label col-md-4">Waiting Charge Per minutes <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="waiting_charge" id="waiting_charge" class="form-control" value="" placeholder = "Enter Waiting Charge Per minute" data-parsley-error-message="Please Enter Waiting Charge" required="" >
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['waiting_charge'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['waiting_charge'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div><!--.form-group-->                                      

                            </div><!--.form-content-->

                            <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-5">                                        
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
                        <div class="panel-title"><h4>FARE LIST</h4></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <div class="overflow-table">

                        <?php if (count($_smarty_tpl->tpl_vars['cabs_list']->value) > 0) {?>

                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th style="width:5%">Sl.No</th> 
                                    <th style="width:20%">ShortName</th> 
                                    <th style="width:20%">Fare Per KM</th>
                                    <th style="width:20%">Minimum Charge<br>(Instant Booking)</th>
                                    <th style="width:20%">Minimum Charge<br>(Future Booking)</th>
                                    <th style="width:20%">Minimum Distance</th>
                                    <th style="width:15%">Waiting Charge Per Minutes</th> 
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
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['type_short_name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['fare_per_km'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['minimum_charge'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['minimum_later'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['minimum_distance'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['waiting_charge'];?>
</td> 
                                </tr>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                            </tbody>                            
                        </table>
                        
                        <?php } else { ?>
                        <br>
                        <h4>Heads up! No Fare Settings Entered</h4>

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

        <!-- BEGIN INITIALIZATION-->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>
        
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_Cab_Management.js"><?php echo '</script'; ?>
>

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