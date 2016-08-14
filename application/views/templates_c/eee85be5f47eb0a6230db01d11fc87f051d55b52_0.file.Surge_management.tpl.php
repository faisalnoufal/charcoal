<?php /* Smarty version 3.1.27, created on 2016-04-15 10:08:59
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Surge_management.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16970653205710bdbb0f6761_36972810%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eee85be5f47eb0a6230db01d11fc87f051d55b52' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Surge_management.tpl',
      1 => 1454332980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16970653205710bdbb0f6761_36972810',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'area_list' => 0,
    'v' => 0,
    'base_url' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bdbb1285d2_70893841',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bdbb1285d2_70893841')) {
function content_5710bdbb1285d2_70893841 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/ajoul/public_html/sites/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '16970653205710bdbb0f6761_36972810';
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
                <div class="panel-title"><h3>Area List</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">
                <div class="overflow-table">
                    <table class="display datatables-basic dataTable">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Area Name</th>   
                                <th>Pilot Details</th>
                                <th>Customer Details</th>
                                <th>Delete</th>   
                            </tr>
                        </thead>
                        <tbody>  
                            <?php if (isset($_smarty_tpl->tpl_vars['area_list']->value)) {?>                          
                                <?php
$_from = $_smarty_tpl->tpl_vars['area_list']->value;
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
                                        <td style="width: 60%"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 </td>
                                       
                                        <td>
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Surge/Surge_view" method="post">
                                                <button class="btn btn-primary btn-xs dt-edit" title="View Pilots inside <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 Surge" type='submit' name='submit' value='submit'><span class="glyphicon glyphicon-fullscreen" ></span></button>
                                                <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Surge/Customer_surge" method="post">
                                                <button class="btn btn-primary btn-xs dt-edit" title="View Customers inside <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 Surge" type='submit' name='submit' value='submit'><span class="glyphicon glyphicon-fullscreen" ></span></button>
                                                <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <button class="btn btn-danger btn-xs dt-delete" title="Delete <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 Surge" type='submit' name='delete' value='submit'><span class="glyphicon glyphicon-trash" ></span></button>
                                                <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                            <?php }?>   
                        </tbody>

                    </table>
                </div><!--.overflow-table-->
            </div><!--.panel-body-->
        </div><!--.panel-->
    </div><!--.col-md-12-->
</div><!--.row-->


<div class="row">
    <div class="col-md-12">


        <div class="btn btn-default" style="float:right">
            Create New Surge <a class="btn btn-floating btn-red" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Surge/Create_surge_area"><span class="ion-android-add"></span></a>
        </div><!--.row-->

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