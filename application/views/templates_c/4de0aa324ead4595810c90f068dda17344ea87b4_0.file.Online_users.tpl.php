<?php /* Smarty version 3.1.27, created on 2016-07-25 18:57:23
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Online_users.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1330052408579644f3c11b35_11332690%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4de0aa324ead4595810c90f068dda17344ea87b4' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Online_users.tpl',
      1 => 1450978280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1330052408579644f3c11b35_11332690',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'user_type' => 0,
    'user_list' => 0,
    'base_url' => 0,
    'v' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_579644f3c8f214_42294736',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_579644f3c8f214_42294736')) {
function content_579644f3c8f214_42294736 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/opt/lampp/htdocs/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '1330052408579644f3c11b35_11332690';
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
                <div class="panel-title"><h3>Online <?php echo ucwords($_smarty_tpl->tpl_vars['user_type']->value);?>
</h3></div>
            </div><!--.panel-heading-->
            <?php if (isset($_smarty_tpl->tpl_vars['user_list']->value)) {?>
                <div class="panel-body">
                    <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th width="05%">Sl.No</th>
                                    <th width="15%">Username</th>
                                    <th width="20%">Fullname</th>
                                    <th width="15%">Mobile</th>
                                    <th width="20%">Email</th>
                                    <th width="10%">Status</th>
                                    <th width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>                                
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
                                    <tr>                                
                                    <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                    <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'pilot') {?>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</a></td>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</a></td>
                                    <?php } else { ?>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</a></td>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</a></td>
                                    <?php }?>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['mobile'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
</td>
                                    <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'pilot') {?>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Location/Driver_location/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"class="btn btn-flat btn-primary btn-xs">View Location</a></td>
                                    <?php } else { ?>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Location/passenger_location/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"class="btn btn-flat btn-primary btn-xs">View Location</a></td>
                                    <?php }?>
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
            <h4>Currently there is no online <?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
 !!</h4>
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