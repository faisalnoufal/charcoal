<?php /* Smarty version 3.1.27, created on 2016-04-15 09:43:51
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Active_trips.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9819657435710b7d7d24531_18467122%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7de374956955876ffd29a89fdd7a2c01146024fa' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Active_trips.tpl',
      1 => 1454404030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9819657435710b7d7d24531_18467122',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'base_url' => 0,
    'user_type' => 0,
    'error' => 0,
    'user_list' => 0,
    'v' => 0,
    'user' => 0,
    'active_trip' => 0,
    'flag' => 0,
    'username_select' => 0,
    'js_path' => 0,
    'markers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710b7d7d682d5_76604362',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710b7d7d682d5_76604362')) {
function content_5710b7d7d682d5_76604362 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9819657435710b7d7d24531_18467122';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<!-- BEGIN PLUGINS CSS -->
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
                <div class="panel-title"><h3>Search Active Trips</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered" name="selectform" method="post" onsubmit="return validateFormActive()">
                  <input type="hidden" name="path_temp" id="path_temp" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Active_trips/">

                    <div class="form-content">

                        <div class="form-group">
                            <label class="control-label col-md-3">User Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">                                
                                <select class="selecter" data-width="100%" name="user_type" id="user_type" class="selectpicker" data-live-search="true" >
                                    <option value='' <?php if ($_smarty_tpl->tpl_vars['user_type']->value == '') {?> selected <?php }?>>Select User Type</option>
                                    <option value='driver' <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'driver') {?> selected <?php }?>>Pilot</option>
                                    <option value='passenger' <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'passenger') {?> selected <?php }?>>Passenger</option>
                                </select>                                
                                <span id="error_user_type" style="color:red"><?php if (isset($_smarty_tpl->tpl_vars['error']->value['user_type'])) {
echo $_smarty_tpl->tpl_vars['error']->value['user_type'];
}?></span>                                
                            </div>
                        </div><!--.form-group-->

                        <div class="form-group" id='user_div'>
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
 <?php if ($_smarty_tpl->tpl_vars['user']->value == $_smarty_tpl->tpl_vars['v']->value['id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
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


<?php if (isset($_smarty_tpl->tpl_vars['active_trip']->value)) {?>

    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-7">
                    <div class="panel" >
                        <div class="panel-heading">
                            <div class="panel-title"><h4>GEOLOCATION</h4></div>
                        </div><!--.panel-heading-->
                        <div class="panel-body">
                            <div id="gmaps_4" class="example-map"></div>
                        </div><!--.panel-body-->
                    </div><!--.panel-->
                </div><!--.col-md-6-->

                <div class="col-md-5">
                    <div class="panel" style="font-size: small">
                        <div class="panel-heading">
                            <div class="panel-title"><h4>TRIP DETAILS</h4></div>
                        </div><!--.panel-heading-->
                        <div class="panel-body">
                            <div class="tab-content">

                                <div class="row">
                                    <div class="col-md-4">Pilot</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['active_trip']->value['driver_name'];?>
</div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Passenger </div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['active_trip']->value['passenger_name'];?>
</div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Cab Type</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['active_trip']->value['cab_type'];?>
</div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Trip From</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['active_trip']->value['trip_from'];?>
</div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Trip To</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7"> 
                                        <?php if ($_smarty_tpl->tpl_vars['active_trip']->value['trip_to'] == '') {?>
                                        NA
                                        <?php } else { ?>
                                            <?php echo $_smarty_tpl->tpl_vars['active_trip']->value['trip_to'];?>

                                        <?php }?></div><!--.col-md-9-->
                                </div><!--.row-->                                
                                <div class="row">
                                    <div class="col-md-4">Start Time</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7"><?php echo $_smarty_tpl->tpl_vars['active_trip']->value['start_time'];?>
</div><!--.col-md-9-->
                                </div><!--.row-->

                            </div><!--.tab-content-->
                        </div>

                    </div><!--.panel-->
                </div><!--.col-md-6-->
            </div><!--.row-->
        </div><!--.col-md-6-->
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['flag']->value == 'yes') {?>

    <div class="row">
        <div class="panel">

            <div class="panel-body">
                <div class="tab-content">
                    <div style="font-size:1.2em">Currently there is no active trip for <?php echo $_smarty_tpl->tpl_vars['username_select']->value;?>
</div><!--.col-md-3-->
                </div><!--.row-->
            </div><!--.row-->
        </div><!--.row-->
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
 type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
gmaps/gmaps.js"><?php echo '</script'; ?>
>
<!-- END PLUGINS AREA -->

<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
trip.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
maps.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_search_trips.js"><?php echo '</script'; ?>
>
<!-- END PLUGINS INITIALIZATION AND SETTINGS -->

<!-- BEGIN INITIALIZATION-->
<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        FormsSelect.init();
        
        <?php if ($_smarty_tpl->tpl_vars['markers']->value != '') {?>
            MapsGoogle.init(<?php echo $_smarty_tpl->tpl_vars['markers']->value;?>
);
        <?php }?>

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