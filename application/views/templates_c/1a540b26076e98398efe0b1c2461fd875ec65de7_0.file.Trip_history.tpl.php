<?php /* Smarty version 3.1.27, created on 2016-08-13 13:46:45
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Trip_history.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:171578449257af08a5601c23_14420195%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a540b26076e98398efe0b1c2461fd875ec65de7' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Trip_history.tpl',
      1 => 1454424512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171578449257af08a5601c23_14420195',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'base_url' => 0,
    'user_type' => 0,
    'error' => 0,
    'user_list' => 0,
    'v' => 0,
    'user_id' => 0,
    'trip_status' => 0,
    'username' => 0,
    'trip_history' => 0,
    'image_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57af08a5692531_24699213',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57af08a5692531_24699213')) {
function content_57af08a5692531_24699213 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/opt/lampp/htdocs/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '171578449257af08a5601c23_14420195';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
chosen/chosen.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">        
<!-- END PLUGINS CSS -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3>Search Completed Trips</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered" method="post" onsubmit="return validateFormSelect()">
                    <input type="hidden" name="path_temp" id="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Trip_history/">

                    <div class="form-content">

                        <div class="form-group">
                            <label class="control-label col-md-3">User Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">                                
                                <select class="selecter" data-width="100%" name="user_type" id="user_type" class="selectpicker" data-live-search="true" >
                                    <option value='' <?php if ($_smarty_tpl->tpl_vars['user_type']->value == '') {?> selected <?php }?>>Select User Type</option>
                                    <option value='driver' <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'driver') {?> selected <?php }?>>Pilot</option>
                                    <option value='passenger' <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'passenger') {?> selected <?php }?>>Passenger</option>
                                </select>
                                <span id="error_user_type" style="color:red"><?php if (isset($_smarty_tpl->tpl_vars['error']->value['user_type'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['user_type'];?>
 <?php }?></span>
                            </div>
                        </div><!--.form-group-->

                        <div class="form-group">
                            <label class="control-label col-md-3" id="selected_user_name">Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">
                                <select data-placeholder="Choose a User" class="chosen-select" id='user' name='user'>
                                <?php if (isset($_smarty_tpl->tpl_vars['user_list']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['user_list']->value;
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
 <?php if ($_smarty_tpl->tpl_vars['user_id']->value == $_smarty_tpl->tpl_vars['v']->value['id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                <?php }?>
                                </select> 
                                <span id="error_user" style="color:red"></span>
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

    </div><!--.col-md-12-->
</div><!--.row-->

<?php if (isset($_smarty_tpl->tpl_vars['trip_status']->value)) {?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel" style="font-size: small">
                <div class="panel-heading">
                    <div class="panel-title"><h3><?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'driver') {?>Pilot :<?php } else { ?>Passenger :<?php }
echo $_smarty_tpl->tpl_vars['username']->value;?>
</h3></div>
                </div><!--.panel-heading-->
                <?php if (count($_smarty_tpl->tpl_vars['trip_history']->value) > 0) {?>
                    <div class="panel-body">
                        <div class="overflow-table">
                            <table class="display datatables-basic dataTable">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th><?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'driver') {?>Passenger<?php } else { ?>Pilot<?php }?> Name</th>
                                        <th>Trip ID</th>                  
                                        <th>Trip From</th>                  
                                        <th>Trip To</th>                  
                                        <th>Distance Travelled</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Cab Type</th>
                                        <th>Travelled Time</th>
                                        <th>Initial Waiting</th>
                                        <th>On-Route Waiting</th>
                                        <th>Fare</th>                 
                                        <th>View Route</th>                 
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
                                    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Root" method="post">
                                        <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td> 
                                        <td>
                                            <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'driver') {?>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['passenger_id'];?>
" title="View Profile" target="_blank">
                                                <?php echo $_smarty_tpl->tpl_vars['v']->value['passenger_name'];?>

                                                </a>
                                            <?php } else { ?>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['driver_id'];?>
" title="View Profile" target="_blank">
                                                <?php echo $_smarty_tpl->tpl_vars['v']->value['driver_name'];?>

                                                </a>
                                            <?php }?>
                                        </td>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Trip_list_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" title="View Route" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['unique_id'];?>
 </a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trip_from'];?>
 </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trip_to'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_distance'];?>
 KM</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['stop_time'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cab_type'];?>
</td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value['total_time'];?>
 min
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['initial_charged'];?>
 min</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['additional_charged'];?>
 min</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['total_fare'];?>
</td>
                                        <td><button class="btn btn-primary btn-xs dt-edit" title="View Route" type='submit' name='submit' value='submit'><span class="glyphicon glyphicon-fullscreen" ></span></button>
                                            <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'>
                                        </td>
                                    </form>
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
Excel/Trip_history">
                                                <input type="hidden" name="user_tp" value="<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
">
                                                <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
">
                                                <button>Create Excel <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
/excel_file.gif" alt="Excel"/></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!--.overflow-table-->
                    </div><!--.panel-body-->
                <?php } else { ?>
                    <h4>There is no trip listed for this user!!</h4>
                <?php }?>

            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->

<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("layer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 

<!-- PLUGINS AREA -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
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
tables-datatables.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
trip.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_search_trips.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
> -->
<!-- END PLUGINS INITIALIZATION AND SETTINGS -->

<!-- BEGIN INITIALIZATION-->
<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();
        FormsSelect.init();
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