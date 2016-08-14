<?php /* Smarty version 3.1.27, created on 2016-04-15 10:06:01
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/passenger_location.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9169768885710bd09f01348_74579637%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13c0812296de3b13d746e940f61d4a6a9f1f8803' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/passenger_location.tpl',
      1 => 1451303196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9169768885710bd09f01348_74579637',
  'variables' => 
  array (
    'passenger_id' => 0,
    'passenger_array' => 0,
    'base_url' => 0,
    'passenger' => 0,
    'plugin_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bd09f32a87_97713686',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bd09f32a87_97713686')) {
function content_5710bd09f32a87_97713686 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9169768885710bd09f01348_74579637';
?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


<input type='hidden' name='driver' id='driver' value='<?php echo $_smarty_tpl->tpl_vars['passenger_id']->value;?>
'>
<input type='hidden' name='driver_array' id='driver_array' value='<?php echo json_encode($_smarty_tpl->tpl_vars['passenger_array']->value);?>
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
                <div class="panel-title"><h4>PASSENGER DETAILS</h4></div>
            </div><!--.panel-heading-->
            <?php
$_from = $_smarty_tpl->tpl_vars['passenger_array']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['passenger'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['passenger']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['passenger']->value) {
$_smarty_tpl->tpl_vars['passenger']->_loop = true;
$foreach_passenger_Sav = $_smarty_tpl->tpl_vars['passenger'];
?>

            <div class="panel-body">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-md-5">Passenger</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['passenger']->value['current_loc']['fullname'];?>
</div><!--.col-md-9-->
                    </div><!--.row-->
                    <div class="row">
                        <div class="col-md-5">Status</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['passenger']->value['current_loc']['status_text'];?>
</div><!--.col-md-9-->
                    </div><!--.row-->                    
                    <div class="row">
                        <div class="col-md-5">Mobile</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['passenger']->value['current_loc']['mobile'];?>
</div><!--.col-md-9-->
                    </div><!--.row-->
                    <?php if ($_smarty_tpl->tpl_vars['passenger']->value['running'] != 0) {?>
                        <div class="row">
                            <div class="col-md-5">Trip From </div><!--.col-md-3-->
                            <div class="col-md-1">:</div><!--.col-md-3-->
                            <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['passenger']->value['running']['trip_from'];?>
</div><!--.col-md-9-->
                        </div><!--.row-->
                        <div class="row">
                            <div class="col-md-5">Trip To</div><!--.col-md-3-->
                            <div class="col-md-1">:</div><!--.col-md-3-->
                            <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['passenger']->value['running']['trip_to'];?>
</div><!--.col-md-9-->
                        </div><!--.row-->
                        <div class="row">
                            <div class="col-md-5">Driver</div><!--.col-md-3-->
                            <div class="col-md-1">:</div><!--.col-md-3-->
                            <div class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['passenger']->value['running']['fullname'];?>
</div><!--.col-md-9-->
                        </div><!--.row-->
                    <?php }?>
                </div><!--.tab-content-->
            </div>     
            <?php
$_smarty_tpl->tpl_vars['passenger'] = $foreach_passenger_Sav;
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
  
<?php if ($_smarty_tpl->tpl_vars['passenger_id']->value == '') {?>
    <?php echo '<script'; ?>
 src="http://maps.google.com/maps/api/js?sensor=true&amp;libraries=weather,traffic"><?php echo '</script'; ?>
>
<?php } else { ?>
    <?php echo '<script'; ?>
 src="http://maps.google.com/maps/api/js?sensor=false;libraries=weather,traffic"><?php echo '</script'; ?>
>
<?php }?>
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

        setInterval(reload_javascript_location_passenger, 10000);
    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 
<?php }
}
?>