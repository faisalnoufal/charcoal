<?php /* Smarty version 3.1.27, created on 2016-07-26 20:03:17
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Booked_Trip.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20449436645797a5e5e6fc74_88224206%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50c5c6acaa9c5d9824943fea4cf1a933634ad371' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Booked_Trip.tpl',
      1 => 1454424934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20449436645797a5e5e6fc74_88224206',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'base_url' => 0,
    'available_drivers' => 0,
    'trip_detail' => 0,
    'opt_group' => 0,
    'v' => 0,
    'group_count' => 0,
    'trip_details' => 0,
    'image_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5797a5e5f0df55_07400760',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5797a5e5f0df55_07400760')) {
function content_5797a5e5f0df55_07400760 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/opt/lampp/htdocs/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '20449436645797a5e5e6fc74_88224206';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
chosen/chosen.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">        
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
<?php if (isset($_smarty_tpl->tpl_vars['available_drivers']->value)) {?>
    <div class="row">
        <div class="col-md-12">

            <div class="panel"  style="font-size: small">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Assign Pilot - Trip Id : <?php echo $_smarty_tpl->tpl_vars['trip_detail']->value['unique_id'];?>
</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">

                    <form action="" class="form-horizontal form-striped form-bordered" method="post">

                        <div class="form-content">
                            <div class="form-group">                                
                                <label class="control-label col-md-3" id="driver_select"> Diver Name</label>
                                <div class="col-md-5">
                                    <select data-placeholder="Select Pilot" id="driver_select" data-width="100%" name="driver_select" class="chosen-select">
                                        
                                        <?php $_smarty_tpl->tpl_vars['opt_group'] = new Smarty_Variable('', null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars['group_count'] = new Smarty_Variable(0, null, 0);?>

                                        <?php
$_from = $_smarty_tpl->tpl_vars['available_drivers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>

                                            <?php if ($_smarty_tpl->tpl_vars['opt_group']->value != $_smarty_tpl->tpl_vars['v']->value['cab']) {?>

                                                <?php if ($_smarty_tpl->tpl_vars['group_count']->value > 0) {?>
                                                    </optgroup>
                                                <?php }?>

                                                <optgroup label="<?php echo $_smarty_tpl->tpl_vars['v']->value['cab'];?>
">

                                                <?php $_smarty_tpl->tpl_vars['opt_group'] = new Smarty_Variable($_smarty_tpl->tpl_vars['v']->value['cab'], null, 0);?>
                                                <?php $_smarty_tpl->tpl_vars['group_count'] = new Smarty_Variable($_smarty_tpl->tpl_vars['group_count']->value+1, null, 0);?>

                                            <?php }?>

                                            <option value=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>

                                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>

                                        <?php if ($_smarty_tpl->tpl_vars['group_count']->value > 0) {?>
                                            </optgroup>
                                        <?php }?>

                                    </select>
                                </div><!--.col-md-9-->
                            </div><!--.row-->
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Passenger Name</label>
                                <div class="col-md-5">
                                    <div class="input-wrapper">
                                        <input type="text" name="passenegr" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['trip_detail']->value['passenger_name'];?>
" readonly="readonly" >
                                    </div>
                                </div>
                            </div><!--.form-group-->
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Location</label>
                                <div class="col-md-5">
                                    <div class="input-wrapper">
                                        <input type="text" name="from_date" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['trip_detail']->value['location'];?>
" readonly="readonly" >
                                    </div>
                                </div>
                            </div><!--.form-group-->
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">From Date</label>
                                <div class="col-md-5">
                                    <div class="input-wrapper">
                                        <input type="text" name="from_date" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['trip_detail']->value['from_date'];?>
" readonly="readonly" >
                                    </div>
                                </div>
                            </div><!--.form-group-->
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">To Date</label>
                                <div class="col-md-5">
                                    <div class="input-wrapper">
                                        <input type="text" name="to_date" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['trip_detail']->value['to_date'];?>
" readonly="readonly" >
                                    </div>
                                </div>
                            </div><!--.form-group-->

                        </div><!--.form-content-->
                        <input type="hidden" name="trip_id" value="<?php echo $_smarty_tpl->tpl_vars['trip_detail']->value['trip_id'];?>
">
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

<?php }?>

<div class="row">
    <div class="col-md-12">
        <div class="panel"  style="font-size: small">
            <!-- <div class="panel-heading" style="font-size: small">
                <div class="panel-title"><h4>Booked Trips</h4></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <div class="overflow-table">

                    <?php if (count($_smarty_tpl->tpl_vars['trip_details']->value) > 0) {?>

                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th>Sl.No</th> 
                                    <th>Trip Id</th> 
                                    <th>Passenger Name</th>
                                    <th>Place</th>
                                    <th>Trip Start Date</th>
                                    <th>Trip End Date</th>
                                    <th>Cab Preferred</th>
                                    <th>Allocated Driver</th>
                                    <th>Cancel</th>
                                    <th>Action</th>                                    
                                </tr>
                            </thead>
                            <tbody>                                
                                <?php
$_from = $_smarty_tpl->tpl_vars['trip_details']->value;
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
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['passenger_id'];?>
" title="View Profile" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['passenger_name'];?>
</a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['location'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['from_date'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['to_date'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cab_type'];?>
</td>
                                        <td>
                                            <?php if (!empty($_smarty_tpl->tpl_vars['v']->value['driver_id'])) {?>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['driver_id'];?>
" title="View Profile" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['driver_name'];?>
</a>
                                            <?php } else { ?>
                                                Unallocated
                                            <?php }?>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-xs dt-delete" title="Cancel Trip" onclick="javascript:cancel_trip(<?php echo $_smarty_tpl->tpl_vars['v']->value['trip_id'];?>
)"><span class="glyphicon glyphicon-trash"></span></button>

                                        </td>
                                        <td>
                                            <?php if (!empty($_smarty_tpl->tpl_vars['v']->value['driver_id'])) {?>
                                                <button class="btn btn-green btn-xs" title="Allocate To A New Driver" onclick="javascript:allocate_trip(<?php echo $_smarty_tpl->tpl_vars['v']->value['trip_id'];?>
)"><span class="glyphicon glyphicon-edit"></span></button>
                                            <?php } else { ?>
                                                <button class="btn btn-blue btn-xs" title="Allocate Driver" onclick="javascript:allocate_trip(<?php echo $_smarty_tpl->tpl_vars['v']->value['trip_id'];?>
)"><span class="glyphicon glyphicon-edit"></span></button>
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
                                    <td colspan="10">
                                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Excel/Booked_trip">
                                    <button>Create Excel <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
/excel_file.gif" alt="Excel"/></button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>                          
                        </table>

                    <?php } else { ?>
                        <br>
                        <h4>No Details Found!</h4>

                    <?php }?>


                </div><!--.overflow-table-->

            </div><!--.panel-body-->
        </div><!--.panel-->
    </div><!--.col-md-12-->
</div>


<?php echo $_smarty_tpl->getSubTemplate ("page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("layer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
/surcharge.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/media/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/themes/bootstrap/dataTables.bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
/tables-datatables.js"><?php echo '</script'; ?>
>
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
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 <?php }
}
?>