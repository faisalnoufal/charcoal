<?php /* Smarty version 3.1.27, created on 2016-04-19 01:20:29
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Customer_rating.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1974225198571587dd9c8283_23083487%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06abe1d4607e42e4dd9e0fbcfa4f62208af5a3c8' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Customer_rating.tpl',
      1 => 1454329866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1974225198571587dd9c8283_23083487',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'rating' => 0,
    'base_url' => 0,
    'v' => 0,
    'image_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_571587dda01198_29135446',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_571587dda01198_29135446')) {
function content_571587dda01198_29135446 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/ajoul/public_html/sites/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '1974225198571587dd9c8283_23083487';
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
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <!-- END PLUGINS CSS -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


        <div class="row">
            <div class="col-md-12">
                <div class="panel" style="font-size: small">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"><h4>Customer Ratings</h4></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">
                        <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th style="width:10%">Sl.No</th>
                                    <th style="width:30%">Name</th>
                                    <th style="width:30%">Rating</th>
                                    <th style="width:20%">Status</th>                                    
                                </tr>
                            </thead>
                            <tbody>                                
                                <?php
$_from = $_smarty_tpl->tpl_vars['rating']->value;
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
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</a></td>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Rating_history/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" target="_blank"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['v']->value['rating']);?>
</a></td>
                                    <td>
                                         <?php if ($_smarty_tpl->tpl_vars['v']->value['status'] == 'yes') {?>
                                         Active
                                         <?php } else { ?>
                                         Deactive
                                         <?php }?>
                                    </td>                                                                       
                                </tr>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                            </tbody>

                            <tfoot>     
                                <tr style="text-align:left;font-size: 18px">
                                    <td colspan="4">
                                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Excel/Customer_rating">
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
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>            
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_Cab_Management.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/js/jasny-bootstrap.min.js"><?php echo '</script'; ?>
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
/tables-datatables.js"><?php echo '</script'; ?>
>
        <!-- END PLUGINS INITIALIZATION AND SETTINGS -->
        
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
/rating.js"><?php echo '</script'; ?>
>        
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
/parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
/validate_Cab_Management.js"><?php echo '</script'; ?>
>

        <!-- BEGIN INITIALIZATION-->
        <?php echo '<script'; ?>
>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();
                TablesDataTables.init();
                FormsValidationsParsley.init();       
            });
        <?php echo '</script'; ?>
>
        <!-- END INITIALIZATION-->
    </body>
</html><?php }
}
?>