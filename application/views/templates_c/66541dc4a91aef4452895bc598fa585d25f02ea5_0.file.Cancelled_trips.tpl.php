<?php /* Smarty version 3.1.27, created on 2016-08-14 08:48:24
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Cancelled_trips.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:89765971357b014389ab289_58996411%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66541dc4a91aef4452895bc598fa585d25f02ea5' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Cancelled_trips.tpl',
      1 => 1454351712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89765971357b014389ab289_58996411',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'trip_list' => 0,
    'v' => 0,
    'base_url' => 0,
    'image_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57b01438a09b22_11986955',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57b01438a09b22_11986955')) {
function content_57b01438a09b22_11986955 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/opt/lampp/htdocs/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '89765971357b014389ab289_58996411';
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
                <div class="panel-title"><h3>Cancelled Trips</h3></div>
            </div> --><!--.panel-heading-->
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
                                    <th width="20%">Trip To</th>
                                    <th width="10%">Cancelled by</th>
                                    
                                    <th width="17%">Reason</th>                 
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
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['trip_to'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cancelled_by'];?>
</td>
                                    
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['reason'];?>
</td>                                        
                                    </tr>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                            </tbody>

                            <tfoot>                                       
                                <tr style="text-align:left;font-size: 18px">
                                    <td colspan="8">
                                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Excel/All_cancelled_trips">                                            
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
                <h4>Currently there is no cancelled trips !!</h4>
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