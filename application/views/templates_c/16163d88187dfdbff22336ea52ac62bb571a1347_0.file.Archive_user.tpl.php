<?php /* Smarty version 3.1.27, created on 2016-07-26 05:19:09
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Archive_user.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7623092555796d6ad2981b4_16393776%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16163d88187dfdbff22336ea52ac62bb571a1347' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Archive_user.tpl',
      1 => 1454349288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7623092555796d6ad2981b4_16393776',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'user_type' => 0,
    'base_url' => 0,
    'user_list' => 0,
    'v' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5796d6ad3158a5_92308451',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5796d6ad3158a5_92308451')) {
function content_5796d6ad3158a5_92308451 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/opt/lampp/htdocs/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '7623092555796d6ad2981b4_16393776';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
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
                <div class="panel-title"> <h3>Archive/Unarchive <?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">                
                <input type="hidden" name="user_type" id="user_type" value="<?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
">                
                <div class="overflow-table">   

                    <?php if (count($_smarty_tpl->tpl_vars['user_list']->value) > 0) {?>

                    <table style="font-size: small" class="display datatables-basic dataTable">
                        <thead>
                            <tr>
                                <th style="width:08%">Sl.No</th>
                                <th style="width:20%"><?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
</th>
                                <th style="width:25%">Full Name</th>
                                <th style="width:17%">Mobile</th>
                                <th style="width:15%">Email</th>
                                <th style="width:10%">Rating</th>
                                <th style="width:05%">Archive/Unarchive</th>
                            </tr>
                        </thead>                            
                        <tbody>

                            <?php
$_from = $_smarty_tpl->tpl_vars['user_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["v"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["v"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars["v"];
?>
                            <tr>
                                <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>                                
                                
                                <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'Pilot') {?>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</a></td>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</a></td>
                                <?php } else { ?>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</a></td>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</a></td>
                                <?php }?>

                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['mobile1'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>

                                <?php if ($_smarty_tpl->tpl_vars['user_type']->value == 'Pilot') {?>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Rating_history/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" target="_blank"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['v']->value['rating']);?>
</a></td>
                                <?php } else { ?>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Rating_history/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
" target="_blank"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['v']->value['rating']);?>
</a></td>
                                <?php }?>
                                

                                <?php if ($_smarty_tpl->tpl_vars['v']->value['status'] != 'no') {?>
                                    <td align="center"><button class="btn btn-danger btn-xs dt-delete" title="Archive <?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
" onclick="javascript:archive_user(<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
)"><span class="glyphicon glyphicon-ban-circle"></span></button></td>
                                <?php } else { ?>
                                    <td align="center"><button class="btn btn-primary btn-xs btn-ripple" title="Unarchive <?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
" onclick="javascript:unarchive_user(<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
)"><span class="glyphicon glyphicon-ok-circle"></span></button></td>
                                <?php }?>                                           
                                
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars["v"] = $foreach_v_Sav;
}
?>
                        </tbody>                             
                    </table>

                    <?php } else { ?>

                    <h4>Heads up! No <?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
 Found!</h4>

                    <?php }?>

                </div>                
            </div>
        </div>
    </div>
</div>

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
/archive_user.js"><?php echo '</script'; ?>
>

<!-- BEGIN INITIALIZATION-->
<?php echo '<script'; ?>
>
    $(document).ready(function() {
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