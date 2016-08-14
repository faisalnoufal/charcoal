<?php /* Smarty version 3.1.27, created on 2016-08-13 13:46:36
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Trip_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:65026772757af089cbae4b4_92328156%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab7c2814442f53e115a91de51412789b27db9895' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Trip_list.tpl',
      1 => 1454426054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65026772757af089cbae4b4_92328156',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'trip_list' => 0,
    'base_url' => 0,
    'v' => 0,
    'image_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57af089cc17a46_22191093',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57af089cc17a46_22191093')) {
function content_57af089cc17a46_22191093 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/opt/lampp/htdocs/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '65026772757af089cbae4b4_92328156';
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
            <div class="panel" style="font-size: small">
                <!-- <div class="panel-heading">
                    <div class="panel-title"><h3></h3></div>
                </div> --><!--.panel-heading-->               
                <div class="panel-body" style="font-size: small">
                        <div class="overflow-table">
                            <table class="display datatables-basic dataTable">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Trip Id</th>                  
                                        <th>Pilot</th>                  
                                        <th>Passenger</th>                  
                                        <th>Cab Type</th>                  
                                        <th>Trip From</th>   
                                        <th>Trip To</th>   
                                        <th>Start Time</th>      
                                        <th>End Time</th>      
                                        <th>Travelled Time</th>      
                                        <th>Initial Waiting</th>      
                                        <th>On-Route Waiting</th>      
                                        <th>Distance Travelled</th>      
                                        <th>Fare</th>       
                                        <th>View Route</th>                 
                                    </tr>
                                </thead>
                                <tbody>                                
                                    <?php
$_from = $_smarty_tpl->tpl_vars['trip_list']->value;
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
                                        <!-- <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Location/Trip_details/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['unique_id'];?>
</a></td> -->
                                        <td>
                                         <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Trip_list_view" method="post">
                                            <button type='submit' name='submit' title="View Route" value='submit' class="btn btn-flat btn-indigo btn-ripple btn-xs" style="font-size:13px"><?php echo $_smarty_tpl->tpl_vars['v']->value['unique_id'];?>
</button>
                                        <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'>
                                        </form>
                                        </td>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['driver_id'];?>
" title="View Profile" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['driver_name'];?>
</a></td>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['passenger_id'];?>
" title="View Profile" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['passenger_name'];?>
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
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_time'];?>
 min
                                            
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['initial_waiting'];?>
 min</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['additional_waiting'];?>
 min</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_distance'];?>
 KM</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_fare'];?>
</td>
                                        <td>
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Trip_list_view" method="post">
                                            <button class="btn btn-primary btn-xs dt-edit" title="View Route" type='submit' name='submit' value='submit'><span class="glyphicon glyphicon-fullscreen" ></span></button>
                                            <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                </tbody>
                                <tfoot>                                       
                                    <tr style="text-align:left;font-size: 18px">
                                        <td colspan="15">
                                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Excel/Completed_trips"> 
                                                <button>Create Excel <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
/excel_file.gif" alt="Excel"/></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
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
/trip.js"><?php echo '</script'; ?>
>

<!-- BEGIN INITIALIZATION-->
<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();
    });
<?php echo '</script'; ?>
>
<!-- END INITIALIZATION-->
</body>
</html><?php }
}
?>