<?php /* Smarty version 3.1.27, created on 2016-04-15 10:07:33
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Passenger_Fund_Management.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7735175845710bd65a5aec6_41138323%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e156a43324a38366b18fc9b60856818cd0c8ad72' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Passenger_Fund_Management.tpl',
      1 => 1454330274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7735175845710bd65a5aec6_41138323',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'base_url' => 0,
    'passenger_details' => 0,
    'v' => 0,
    'error' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bd65a8edc3_47300139',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bd65a8edc3_47300139')) {
function content_5710bd65a8edc3_47300139 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7735175845710bd65a5aec6_41138323';
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
                        <div class="panel-title"> <h3>Add/Deduct Fund</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">
                            <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Select User <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5"> 
                                        <div class="input-wrapper">                                       
                                            <select class="selecter" name="user_name" id="user_name" data-width="100%" data-parsley-error-message="Please Select User" required="" >
                                            <option value=''>Select User Name</option>
                                                <?php
$_from = $_smarty_tpl->tpl_vars['passenger_details']->value;
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
                                        
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Amount <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="amount" id="amount" class="form-control" value="" placeholder = "Enter Amount" data-parsley-error-message="Please Enter Amount" required="">
                                            </div>
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['amount'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['amount'];?>
</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Transaction Note <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="transaction_note" id="transaction_note" class="form-control" value="" placeholder = "Enter Transaction Note" data-parsley-error-message="Please Enter Transaction Note" required="">
                                            </div> 
                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['transaction_note'])) {?>
                                                <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['transaction_note'];?>
</span>
                                            <?php }?>                                           
                                        </div>
                                    </div>
                                </div>
                                                                    
                            </div><!--.form-content-->

                            <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">  
                                         <button class="btn btn-blue" name="add_amount" id="add_amount"  type="submit" value="Add Amount" > Add Amount</button>
                                         <button class="btn btn-blue" name="deduct_amount" id="deduct_amount" type="submit" value="Deduct Amount" > Deduct Amount</button>

                                        <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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
>
                    $(document).ready(function () {
                        Pleasure.init();
                        Layout.init();
                         FormsValidationsParsley.init();

                    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 <?php }
}
?>