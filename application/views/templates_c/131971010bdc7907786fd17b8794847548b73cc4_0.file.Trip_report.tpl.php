<?php /* Smarty version 3.1.27, created on 2016-04-15 10:04:57
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Trip_report.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11776815855710bcc9491735_49358553%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '131971010bdc7907786fd17b8794847548b73cc4' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Trip_report.tpl',
      1 => 1454331784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11776815855710bcc9491735_49358553',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'error' => 0,
    'trip_history' => 0,
    'from_to_date' => 0,
    'base_url' => 0,
    'v' => 0,
    'image_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bcc94d4443_10232452',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bcc94d4443_10232452')) {
function content_5710bcc94d4443_10232452 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/ajoul/public_html/sites/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '11776815855710bcc9491735_49358553';
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
bootstrap-daterangepicker/daterangepicker-bs3.css">

<!-- END PLUGINS CSS -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


<div class="row" >
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3>Trip Report</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">

                    <div class="form-content">

                        <div class="form-group">
                            <label class="control-label col-md-3">Select From-To Dates</label>
                            <div class="col-md-5">

                                <div class="input-wrapper">

                                    <input type="text" style="width:80%" name="reservation" id="reservationtime" class="form-control btn bootstrap-daterangepicker-dropdown" placeholder="mm/dd/yyyy - mm/dd/yyyy" data-parsley-error-message="Please Select Date" required=""/>
                                    

                                </div>
                                <?php if (isset($_smarty_tpl->tpl_vars['error']->value['reservation'])) {?>
                                    <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['reservation'];?>
</span>
                                <?php }?>

                            </div>
                        </div><!--.form-group-->

                    </div><!--.form-content-->

                    <div class="form-buttons">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-blue" value="submit" name="submit">Submit</button>        
                            </div>
                        </div>
                    </div>
                </form>

            </div><!--.panel-body-->
        </div><!--.panel-->

        <?php if (isset($_smarty_tpl->tpl_vars['trip_history']->value)) {?>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel" style="font-size: small">
                        <div class="panel-heading">
                            <div class="panel-title"><h4>Trip History Report (<?php echo $_smarty_tpl->tpl_vars['from_to_date']->value;?>
)</h4></div>
                        </div><!--.panel-heading-->
                        <div class="panel-body">
                            <div class="overflow-table">
                                <table class="display datatables-basic dataTable">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Trip ID</th>
                                            <th>Pilot</th>
                                            <th>Pasenger</th>
                                            <th>Cab Type</th>
                                            <th>Trip From</th>                  
                                            <th>Trip To</th>                  
                                            <th>Start Time</th>                  
                                            <th>End Time</th>                  
                                            <th>Distance Travelled</th>                                            
                                            <th>Travelled Time</th>
                                            <th>Initial Waiting</th>
                                            <th>On-Route Waiting</th>                                        
                                            <th>Fare</th>                 
                                        </tr>
                                    </thead>
                                    <tbody>                                
                                        <?php
$_from = $_smarty_tpl->tpl_vars['trip_history']->value;
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
                                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Trip_list_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['unique_id'];?>
</a></td> 
                                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['driver_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['driver_name'];?>
</a></td>
                                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['passenger_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['passenger_name'];?>
</a></td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cab_type'];?>
 </td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trip_from'];?>
 </td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trip_to'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['stop_time'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_distance'];?>
 KM</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_time'];?>
 min
                                                    
                                                </td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['initial_charged'];?>
 min</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['additional_charged'];?>
 min</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_fare'];?>
</td>
                                            </tr>
                                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                    </tbody>

                                    <tfoot>                                       
                                        <tr style="text-align:left;font-size: 18px">
                                            <td colspan="14">
                                                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Excel/Trip_report">                                                    
                                                    <input type="hidden" name="from_to_date" value="<?php echo $_smarty_tpl->tpl_vars['from_to_date']->value;?>
">
                                                    <button>Create Excel <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
/excel_file.gif" alt="Excel"/></button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div><!--.overflow-table-->

                        </div><!--.panel-->
                    </div><!--.col-md-12-->
                </div><!--.row-->
            </div><!--.row-->

        <?php }?>

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

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- END PLUGINS AREA -->

<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
tables-datatables.js"><?php echo '</script'; ?>
>
<!-- END PLUGINS INITIALIZATION AND SETTINGS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_Cab_Management.js"><?php echo '</script'; ?>
>
<!-- BEGIN INITIALIZATION-->
<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();
         FormsValidationsParsley.init();
        $('#reservationtime').daterangepicker({
        }, function (start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    });
<?php echo '</script'; ?>
>
<!-- END INITIALIZATION-->
</body>
</html><?php }
}
?>