<?php /* Smarty version 3.1.27, created on 2016-08-14 08:49:59
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Driver_Fund_Details.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:139200616357b0149736b2e8_40025608%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '961f04d07deee92705417c853e52e58d1c338761' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Driver_Fund_Details.tpl',
      1 => 1455041010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139200616357b0149736b2e8_40025608',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'base_url' => 0,
    'driver_details' => 0,
    'v' => 0,
    'error' => 0,
    'flag' => 0,
    'fund_details' => 0,
    'balance' => 0,
    'amount_type' => 0,
    'user_id' => 0,
    'image_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57b0149740a654_24508256',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57b0149740a654_24508256')) {
function content_57b0149740a654_24508256 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/opt/lampp/htdocs/admin/system/libraries/Smarty/libs/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '139200616357b0149736b2e8_40025608';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">        
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"> <h3>Pilot Ewallet History</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">

                    <div class="form-content">
                        <div class="form-group">
                            <label class="control-label col-md-3">Select User <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5"> 
                                <div class="input-wrapper">                                       
                                    <select class="selecter" name="user_name" id="user_name" data-width="100%" class="selectpicker" data-live-search="true" >
                                        <option value=''>Select User Name</option>
                                        <?php
$_from = $_smarty_tpl->tpl_vars['driver_details']->value;
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
><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</option>
                                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                    </select>
                                </div>
                                <?php if (isset($_smarty_tpl->tpl_vars['error']->value['user_name'])) {?>
                                    <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['user_name'];?>
</span>
                                <?php }?>
                            </div>
                        </div>                             
                    </div><!--.form-content-->

                    <div class="form-buttons">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">  

                                <button type="submit" class="btn btn-blue" value="submit" name="submit">Submit</button>
                                <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div><!--.panel-body-->
        </div><!--.panel-->

    </div><!--.col-md-12-->
</div><!--.row-->
<?php if ($_smarty_tpl->tpl_vars['flag']->value) {?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel" style="font-size: small">
                <!-- <div class="panel-heading">
                    <div class="panel-title"><h4>EWALLET TRANSACTION DETAILS</h4></div>
                </div> --><!--.panel-heading-->
                <div class="panel-body">

                    <div class="overflow-table">

                        <?php if (count($_smarty_tpl->tpl_vars['fund_details']->value) > 0) {?>
                            <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_Variable(0, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['balance'] = new Smarty_Variable(0, null, 0);?>
                            <table class="display datatables-basic dataTable">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th> 
                                        <th>Date</th>
                                        <th>Amount Type</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                    <?php
$_from = $_smarty_tpl->tpl_vars['fund_details']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                        <?php if ($_smarty_tpl->tpl_vars['v']->value['amount_type'] == "admin_credit") {?>
                                            <?php $_smarty_tpl->tpl_vars['amount_type'] = new Smarty_Variable("Credited By Admin", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars['balance'] = new Smarty_Variable($_smarty_tpl->tpl_vars['balance']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['amount_type'] == "admin_debit") {?>
                                            <?php $_smarty_tpl->tpl_vars['amount_type'] = new Smarty_Variable("Debited By Admin", null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars['balance'] = new Smarty_Variable($_smarty_tpl->tpl_vars['balance']->value-$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['amount_type'] == "Referral Point") {?>
                                            <?php $_smarty_tpl->tpl_vars['amount_type'] = new Smarty_Variable((($_smarty_tpl->tpl_vars['v']->value['amount_type']).(' - Referred:')).($_smarty_tpl->tpl_vars['v']->value['trip_id']), null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars['balance'] = new Smarty_Variable($_smarty_tpl->tpl_vars['balance']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['amount_type'] == "Trip Commission") {?>
                                            <?php $_smarty_tpl->tpl_vars['amount_type'] = new Smarty_Variable((($_smarty_tpl->tpl_vars['v']->value['amount_type']).(' - TripID:')).($_smarty_tpl->tpl_vars['v']->value['trip_id']), null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars['balance'] = new Smarty_Variable($_smarty_tpl->tpl_vars['balance']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars['amount_type'] = new Smarty_Variable($_smarty_tpl->tpl_vars['v']->value['amount_type'], null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars['balance'] = new Smarty_Variable($_smarty_tpl->tpl_vars['balance']->value+$_smarty_tpl->tpl_vars['v']->value['amount'], null, 0);?>
                                        <?php }?>
                                        
                                        <tr>
                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['date'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['amount_type']->value;?>
</td>
                                            <td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['amount'],2);?>
</td>
                                            <td><?php echo number_format($_smarty_tpl->tpl_vars['balance']->value,2);?>
</td>
                                        </tr>
                                    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                </tbody>  
                                <tfoot>           
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Available Amount </b></td>
                                        <td><b><?php echo number_format($_smarty_tpl->tpl_vars['balance']->value,2);?>
</b></td>
                                    </tr>

                                    <tr style="text-align:left;font-size: 18px">
                                        <td colspan="5">
                                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Excel/Driver_fund_details">
                                                <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
">
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

<?php }?>

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

    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 <?php }
}
?>