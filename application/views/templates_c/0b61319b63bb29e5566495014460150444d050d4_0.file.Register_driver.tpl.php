<?php /* Smarty version 3.1.27, created on 2016-04-21 17:32:09
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Register_driver.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14307189357190e99b49fb5_71786627%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b61319b63bb29e5566495014460150444d050d4' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Register_driver.tpl',
      1 => 1454483072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14307189357190e99b49fb5_71786627',
  'variables' => 
  array (
    'plugin_path' => 0,
    'base_url' => 0,
    'err_msg' => 0,
    'error' => 0,
    'cab_name' => 0,
    'v' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57190e99be7233_33037546',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57190e99be7233_33037546')) {
function content_57190e99be7233_33037546 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14307189357190e99b49fb5_71786627';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  

<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
<div class="content">

    <div class="row">
        <div class="col-md-12">
            <form action="" class="form-horizontal form-striped form-bordered" method="post" onsubmit="return validateFormRegister()" enctype="multipart/form-data" id="form_register">
                <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
                
                <?php if (isset($_smarty_tpl->tpl_vars['err_msg']->value)) {?>
                    <div class="alert alert-danger" role="alert"> <?php echo $_smarty_tpl->tpl_vars['err_msg']->value;?>
</div>
                <?php }?>

                <div class="panel">

                    <div class="panel-heading"><div class="panel-title"> <h3>Basic Information</h3></div></div>
                    <div class="panel-body">
                        <div class="form-content">

                            <div class="form-group">
                                <label class="control-label col-md-3">First Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="f_name" id="f_name" class="form-control" placeholder="Enter First Name" value="<?php echo set_value('f_name');?>
">
                                        </div>
                                        <span id='error_f_name' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['f_name'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['f_name'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Last Name<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="l_name" id="l_name" placeholder="Enter Last Name" class="form-control" value="<?php echo set_value('l_name');?>
">
                                        </div>
                                        <span id='error_l_name' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['l_name'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['l_name'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Nationality <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Nationality" value="<?php echo set_value('nationality');?>
">
                                        </div>
                                        <span id='error_nationality' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['nationality'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['nationality'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Address 1 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="address1" id="address1" class="form-control" placeholder="Enter Address" value="<?php echo set_value('address1');?>
">
                                        </div>
                                        <span id='error_address1' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['address1'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['address1'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Address 2 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="address2" id="address2" class="form-control" placeholder="Enter Address" value="<?php echo set_value('address2');?>
">
                                        </div>                                        
                                        <span id='error_address2' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['address2'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['address2'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Address 3 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="address3" id="address3" class="form-control" placeholder="Enter Address" value="<?php echo set_value('address3');?>
">
                                        </div>                                        
                                        <span id='error_address3' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['address3'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['address3'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Address Proof <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                    <div class="input-wrapper">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-flat btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="address_proof" id="address_proof" accept="application/pdf,image/*" placeholder="Select Address Proof">
                                        </span>                                        
                                        <span id='error_address_proof' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['address_proof'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['address_proof'];?>
 <?php }?></span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Email-ID <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email ID" value="<?php echo set_value('email');?>
">
                                        </div>                                        
                                        <span id='error_email' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['email'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['email'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Mobile number 1 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="mobile1" id="mobile1" class="form-control" placeholder="Enter Mobile Number" value="<?php echo set_value('mobile1');?>
">
                                        </div>                                        
                                        <span id='error_mobile1' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['mobile1'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['mobile1'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Mobile number 2 </label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="mobile2" id="mobile2" class="form-control" placeholder="Enter Mobile Number" value="<?php echo set_value('mobile2');?>
">
                                        </div>                                        
                                        <span id='error_mobile2' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['mobile2'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['mobile2'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Licence <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="licence" id="licence" class="form-control" placeholder="Enter Licence Number" value="<?php echo set_value('licence');?>
">
                                        </div>                                        
                                        <span id='error_licence' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['licence'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['licence'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Upload Licence <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                     <div class="inputer">
                                        <div class="input-wrapper">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-flat btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="licence_proof" id="licence_proof" accept="application/pdf,image/*" placeholder="Select Licence">
                                        </span>                                        
                                        <span id='error_licence_proof' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['licence_proof'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['licence_proof'];?>
 <?php }?></span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Cab Number<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="cab_num" id="cab_num" class="form-control" placeholder="Enter Cab Number" value="<?php echo set_value('cab_num');?>
">
                                        </div>                                        
                                        <span id='error_cab_num' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['cab_num'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['cab_num'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Tax Renewal Date <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ion-android-calendar"></i></span>
                                                <div class="inputer">
                                                    <div class="input-wrapper">
                                                        <input type="text" style="width: 200px" name="tax_renew_date" id="tax_renew_date" class="form-control bootstrap-daterangepicker-basic" value="<?php echo set_value('tax_renew_date');?>
"/>
                                                    </div>
                                                </div>                                                
                                                <span id='error_tax_renew_date' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['tax_renew_date'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['tax_renew_date'];?>
 <?php }?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Insurance Renewal Date <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="ion-android-calendar"></i></span>
                                                <div class="inputer">
                                                    <div class="input-wrapper">
                                                        <input type="text" style="width: 200px" name="ins_renew_date" id="ins_renew_date" class="form-control bootstrap-daterangepicker-basic" value="<?php echo set_value('ins_renew_date');?>
"/>
                                                    </div>
                                                </div>                                                
                                                <span id='error_ins_renew_date' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['ins_renew_date'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['ins_renew_date'];?>
 <?php }?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--.form-group-->
                            
                            <?php if (isset($_smarty_tpl->tpl_vars['cab_name']->value)) {?>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Cab Type<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-7">
                                        <div class="margin-bottom-10">                                            
                                            <select class="selectpicker" data-width="100%" name="cab_name" id="cab_name" class="selectpicker" data-live-search="true">
                                                <?php
$_from = $_smarty_tpl->tpl_vars['cab_name']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['type_short_name'];?>
</option>
                                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                            </select>                                            
                                            <span id='error_cab_name' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['cab_name'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['cab_name'];?>
 <?php }?></span>
                                        </div>                                       
                                    </div>
                                </div><!--.form-group-->
                            <?php }?>
                                    
                            <div class="form-group">
                                <label class="control-label col-md-3">Cab Model<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="cab_model" id="cab_model" class="form-control" placeholder="Enter Cab Model" value="<?php echo set_value('cab_model');?>
">
                                        </div>                                        
                                        <span id='error_cab_model' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['cab_model'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['cab_model'];?>
 <?php }?></span>
                                    </div>
                                </div>                                    
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Seating Capacity<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="cab_seat" id="cab_seat" class="form-control" placeholder="Enter Seating Capacity" value="<?php echo set_value('cab_seat');?>
">
                                        </div>                                        
                                        <span id='error_cab_seat' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['cab_seat'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['cab_seat'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Profile Picture<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-6">
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="profile_pic" accept="image/*">
                                                </span>                                                    
                                                <span id='error_profile_pic' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['profile_pic'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['profile_pic'];?>
 <?php }?></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div><!--.col-md-9-->
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Username<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Username" value="<?php echo set_value('user_name');?>
">
                                        </div>                                        
                                        <span id='error_user_name' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['user_name'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['user_name'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Password<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="<?php echo set_value('password');?>
">
                                        </div>                                        
                                        <span id='error_password' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['password'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['password'];?>
 <?php }?></span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                        </div>
                    </div>

                    <div class="panel-heading"><div class="panel-title"> <h3>Bank Information</h3></div></div>
                        <div class="panel-body">
                            <div class="form-content">

                                <div class="form-group">
                                    <label class="control-label col-md-3">Bank Name<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-7">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name" value="<?php echo set_value('bank_name');?>
">
                                            </div>
                                            <span id='error_bank_name' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['bank_name'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['bank_name'];?>
 <?php }?></span>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Account Number<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-7">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="acc_number" id="acc_number" class="form-control" placeholder="Enter Account Number" value="<?php echo set_value('acc_number');?>
">
                                            </div>
                                            <span id='error_acc_number' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['acc_number'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['acc_number'];?>
 <?php }?></span>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Branch Code<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-7">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="branch_code" id="branch_code" class="form-control" placeholder="Enter Branch Code" value="<?php echo set_value('branch_code');?>
">
                                            </div>
                                            <span id='error_branch_code' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['branch_code'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['branch_code'];?>
 <?php }?></span>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Swift Code<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-7">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="swift_code" id="swift_code" class="form-control" placeholder="Enter Swift Code" value="<?php echo set_value('swift_code');?>
">
                                            </div>
                                            <span id='error_swift_code' style='color:red'><?php if (isset($_smarty_tpl->tpl_vars['error']->value['swift_code'])) {?> <?php echo $_smarty_tpl->tpl_vars['error']->value['swift_code'];?>
 <?php }?></span>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-buttons">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-blue" value="submit"  name="submit">Submit</button>
                                            <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </div>

                            </div><!--.form-content-->
                        </div><!--.panel-body-->
                    </div><!--.panel-->

                </form>
            </div><!--.col-md-12-->
        </div><!--.row-->
    </div>

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
bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>

            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_register_driver.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>
                $(document).ready(function () {
                    Pleasure.init();
                    Layout.init();
                    // FormsValidationsParsley.init();
                    FormsPickers.init();
                    //ValidateUser.init();
                });

                var FormsPickers = {
                    dateRangePicker: function () {
                        $('.bootstrap-daterangepicker-basic').daterangepicker({
                            singleDatePicker: true
                        }, function (start, end, label) {
                            console.log(start.toISOString(), end.toISOString(), label);
                        }
                        );
                    },
                    init: function () {
                        this.dateRangePicker();
                    }
                }             

            <?php echo '</script'; ?>
>
            <!-- END INITIALIZATION-->

            <?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 <?php }
}
?>