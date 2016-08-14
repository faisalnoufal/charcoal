<?php /* Smarty version 3.1.27, created on 2016-04-15 10:14:49
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Todays_bookings.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9012013765710bf192b3521_28439110%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '139924e26a76b39c9ae5e1dbb667ba71b2d88f8d' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Todays_bookings.tpl',
      1 => 1450957748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9012013765710bf192b3521_28439110',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'trip_list' => 0,
    'v' => 0,
    'base_url' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bf192e5f62_33491190',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bf192e5f62_33491190')) {
function content_5710bf192e5f62_33491190 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/ajoul/public_html/sites/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '9012013765710bf192b3521_28439110';
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
            <div class="panel-heading">
                <div class="panel-title"><h3>Todays Bookings</h3></div>
            </div><!--.panel-heading-->
            <?php if (isset($_smarty_tpl->tpl_vars['trip_list']->value)) {?>
                <div class="panel-body">
                    <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th width="05%">Sl.No</th>
                                    <th width="08%">Trip Id</th>                  
                                    <th width="10%">Pilot</th>                  
                                    <th width="10%">Passenger</th>                  
                                    <th width="20%">Trip From</th>
                                    <th width="10%">Start Time</th>
                                    <th width="20%">Trip To</th>   
                                    
                                    <th width="17%">Status</th>                 
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
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['unique_id'];?>
</td>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['driver_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['driver'];?>
</a></td>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['passenger_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['passenger'];?>
</a></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trip_from'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trip_to'];?>
</td>                                        
                                    
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
</td>                                        
                                    </tr>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                            </tbody>
                        </table>
                    </div><!--.overflow-table-->
                </div><!--.panel-body-->
            <?php } else { ?>
                <h4>Currently there is no trips !!</h4>
                <?php }?>

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