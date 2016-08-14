<?php /* Smarty version 3.1.27, created on 2016-04-15 10:12:51
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Trip_list_view.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:4517761925710bea31114c4_03557914%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f2aaa16247c6295437e04074852135bbdcd1875' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Trip_list_view.tpl',
      1 => 1452934254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4517761925710bea31114c4_03557914',
  'variables' => 
  array (
    'css_path' => 0,
    'trip_details' => 0,
    'button_hide' => 0,
    'base_url' => 0,
    'js_path' => 0,
    'markers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bea3146b42_70232512',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bea3146b42_70232512')) {
function content_5710bea3146b42_70232512 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '4517761925710bea31114c4_03557914';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<!-- BEGIN PLUGINS CSS -->

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">        
<!-- END PLUGINS CSS -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>GEOLOCATION</h4></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">
                        <div id="gmaps_4" class="example-map"></div>
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-6-->

            <div class="col-md-4" >
                <div class="panel" style="font-size: small">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>TRIP DETAILS</h4></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">
                        <div class="tab-content">

                            <div class="row">
                                <div class="col-md-4">Trip Id</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['unique_id'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Pilot</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['driver_name'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Passenger </div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['passenger_name'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Cab Type</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['cab_type'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Trip From</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['trip_from'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Trip To</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['trip_to'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Start Time</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['start_time'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Stop Time</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['stop_time'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Tot. Distance</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['total_distance'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Initial Wait.</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['initial_waiting'];?>
 min</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Add. Wait.</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['additional_waiting'];?>
 min</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Time Taken</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['total_time'];?>
 min
                                
                                
                                
                                </div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Total Fare</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['trip_details']->value['total_fare'];?>
</div><!--.col-md-9-->
                            </div><!--.row-->

                        </div><!--.tab-content-->
                    </div>

                </div><!--.panel-->
            </div><!--.col-md-6-->
        </div><!--.row-->
    </div><!--.col-md-6-->
</div>
<?php if (!isset($_smarty_tpl->tpl_vars['button_hide']->value)) {?>
<div>
    <a href='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Trip_list'>
        <button type="button" class="btn btn-blue" >
        <span class="glyphicon glyphicon-circle-arrow-left" > Back</span></button>
    </a>
</div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("layer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 


<!-- END PLUGINS AREA -->



<?php echo '<script'; ?>
 type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"><?php echo '</script'; ?>
>

<!-- END PLUGINS AREA -->
<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
root_details.js"><?php echo '</script'; ?>
>

<!-- BEGIN INITIALIZATION-->
<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        // TablesDataTables.init();
    <?php if ($_smarty_tpl->tpl_vars['markers']->value != '') {?>
        MapsGoogle.init(<?php echo $_smarty_tpl->tpl_vars['markers']->value;?>
);
    <?php }?>
    });
<?php echo '</script'; ?>
>
<!-- END INITIALIZATION-->
</body>
</html><?php }
}
?>