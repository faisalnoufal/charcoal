<?php /* Smarty version 3.1.27, created on 2016-07-26 03:39:16
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/driver_location.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18533077075796bf44e6b3a3_38868812%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '192f76a68e6442e193e40dbaecaae9410b061adb' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/driver_location.tpl',
      1 => 1453974896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18533077075796bf44e6b3a3_38868812',
  'variables' => 
  array (
    'driver_id' => 0,
    'driver_array' => 0,
    'base_url' => 0,
    'driver' => 0,
    'plugin_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5796bf44ec7e45_06501730',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5796bf44ec7e45_06501730')) {
function content_5796bf44ec7e45_06501730 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18533077075796bf44e6b3a3_38868812';
?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


<input type='hidden' name='driver' id='driver' value='<?php echo $_smarty_tpl->tpl_vars['driver_id']->value;?>
'>
<input type='hidden' name='driver_array' id='driver_array' value='<?php echo json_encode($_smarty_tpl->tpl_vars['driver_array']->value);?>
'>
<input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">

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
                <div class="panel-title"><h4>PILOT DETAILS</h4></div>
            </div><!--.panel-heading-->
            <?php
$_from = $_smarty_tpl->tpl_vars['driver_array']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['driver'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['driver']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['driver']->value) {
$_smarty_tpl->tpl_vars['driver']->_loop = true;
$foreach_driver_Sav = $_smarty_tpl->tpl_vars['driver'];
?>
            
            <div class="panel-body">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-md-5">Driver</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['driver']->value['current_loc']['fullname'];?>
</div><!--.col-md-9-->
                    </div><!--.row-->
                    <div class="row">
                        <div class="col-md-5">Status</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['driver']->value['current_loc']['status_text'];?>
</div><!--.col-md-9-->
                    </div><!--.row-->
                    <div class="row">
                        <div class="col-md-5">Cab Model</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['driver']->value['current_loc']['cab_model'];?>
</div><!--.col-md-9-->
                    </div><!--.row-->
                    <div class="row">
                        <div class="col-md-5">Cab Number</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['driver']->value['current_loc']['cab_number'];?>
</div><!--.col-md-9-->
                    </div><!--.row-->
                    <div class="row">
                        <div class="col-md-5">Mobile</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['driver']->value['current_loc']['mobile1'];?>
</div><!--.col-md-9-->
                    </div><!--.row-->
                    <?php if ($_smarty_tpl->tpl_vars['driver']->value['running'] != 0) {?>
                        <div class="row">
                            <div class="col-md-5">Trip From </div><!--.col-md-3-->
                            <div class="col-md-1">:</div><!--.col-md-3-->
                            <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['driver']->value['running']['trip_from'];?>
</div><!--.col-md-9-->
                        </div><!--.row-->
                        <div class="row">
                            <div class="col-md-5">Trip To</div><!--.col-md-3-->
                            <div class="col-md-1">:</div><!--.col-md-3-->
                            <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['driver']->value['running']['trip_to'];?>
</div><!--.col-md-9-->
                        </div><!--.row-->
                        <div class="row">
                            <div class="col-md-5">Passenger</div><!--.col-md-3-->
                            <div class="col-md-1">:</div><!--.col-md-3-->
                            <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['driver']->value['running']['fullname'];?>
</div><!--.col-md-9-->
                        </div><!--.row-->
                    <?php }?>
                </div><!--.tab-content-->
            </div>
            <?php
$_smarty_tpl->tpl_vars['driver'] = $foreach_driver_Sav;
}
?>
        </div><!--.panel-->
    </div><!--.col-md-6-->
</div>
<?php echo $_smarty_tpl->getSubTemplate ("page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("layer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<!-- <?php if ($_smarty_tpl->tpl_vars['driver_id']->value == '') {?> -->
    <!-- <?php echo '<script'; ?>
 src="http://maps.google.com/maps/api/js?sensor=true&amp;libraries=weather,traffic"><?php echo '</script'; ?>
> -->
<!-- <?php } else { ?> -->
    <?php echo '<script'; ?>
 src="http://maps.google.com/maps/api/js?sensor=false;libraries=weather,traffic"><?php echo '</script'; ?>
>
<!-- <?php }?> -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
gmaps/gmaps.js"><?php echo '</script'; ?>
>
<!-- END PLUGINS AREA -->
<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
maps-google.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        MapsGoogle.init();

        setInterval(reload_javascript_location, 10000);
    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 
<?php }
}
?>