<?php /* Smarty version 3.1.27, created on 2016-08-13 13:45:35
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Profile_view.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:165093795057af085f479a48_38016895%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33f4d30471225002fa863eb399e6f2c81f3002ab' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Profile_view.tpl',
      1 => 1455037874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165093795057af085f479a48_38016895',
  'variables' => 
  array (
    'plugin_path' => 0,
    'image_path' => 0,
    'profile_pic' => 0,
    'first_name' => 0,
    'last_name' => 0,
    'nationality' => 0,
    'address1' => 0,
    'address2' => 0,
    'address3' => 0,
    'email' => 0,
    'mobile1' => 0,
    'mobile2' => 0,
    'licence' => 0,
    'cab_name' => 0,
    'cab_model' => 0,
    'cab_seat' => 0,
    'cab_number' => 0,
    'tax_renew_date' => 0,
    'ins_renew_date' => 0,
    'bank_name' => 0,
    'acc_number' => 0,
    'branch_code' => 0,
    'swift_code' => 0,
    'timeline' => 0,
    'v' => 0,
    'base_url' => 0,
    'error' => 0,
    'cab_name_list' => 0,
    'id' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57af085f5b59d7_16032283',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57af085f5b59d7_16032283')) {
function content_57af085f5b59d7_16032283 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '165093795057af085f479a48_38016895';
?>
<!DOCTYPE html>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  

<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-daterangepicker/daterangepicker-bs3.css">

<div class="content">

    <div class="page-header full-content parallax" style="height: 300px; overflow: hidden">
        <div class="parallax-bg" style="background: url('<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
24.jpg') 50% 50%; background-size: cover; width: 100%; height: 100%; position: absolute; left: 0; top: 0;">
        </div>

        <div class="profile-info">
            <div class="profile-photo">
                <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
/faces/<?php echo $_smarty_tpl->tpl_vars['profile_pic']->value;?>
" alt="profile picture">
            </div><!--.profile-photo-->
            <div class="profile-text light">
                <?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>

                <span class="caption">Pilot</span>
            </div><!--.profile-text-->
        </div><!--.profile-info-->

        <div class="row">
            <div class="col-sm-6">
                <h1>Pilot Profile <!-- <small><?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
</small> --></h1>
            </div><!--.col-->
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="ion-home"></i></a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#" class="active">User Profile</a></li>
                </ol>
            </div> --><!--.col-->
        </div><!--.row-->

        <div class="header-tabs scrollable-tabs sticky">
            <ul class="nav nav-tabs tabs-active-text-white tabs-active-border-yellow">
                <li class="active"><a href="#about" data-toggle="tab" class="btn-ripple">About</a></li>
                <li><a href="#edit" data-toggle="tab" class="btn-ripple">Edit</a></li>

            </ul>
        </div>

    </div><!--.page-header-->

    <div class="row user-profile">
        <div class="col-md-12">
            <div class="tab-content without-border">

                <div id="about" class="tab-pane active">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav nav-tabs borderless vertical">
                                <li class="active"><a href="#about_overview" data-toggle="tab">Overview</a></li>
                                <li><a href="#about_timeline" data-toggle="tab">Timeline</a></li>
                            </ul>
                        </div><!--.col-md-3-->
                        <div class="col-md-9">
                            <div class="tab-content">

                                <div class="tab-pane active" id="about_overview">
                                    <div class="legend">Basic Information</div>
                                    <div class="row">
                                        <div class="col-md-3">First name</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Last name</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Nationality</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['nationality']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Address1</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['address1']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Address2</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['address2']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Address3</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['address3']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Email</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Mobile 1</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['mobile1']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Mobile 2</div><!--.col-md-3-->
                                        <div class="col-md-9">
                                            
                                            <?php if ($_smarty_tpl->tpl_vars['mobile2']->value == 0) {?>NA<?php } else {
echo $_smarty_tpl->tpl_vars['mobile2']->value;
}?>
                                        
                                        </div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Licence number</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['licence']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Cab Type</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['cab_name']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Cab Model</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['cab_model']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Cab Seat</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['cab_seat']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Cab Number</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['cab_number']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Tax Renewal Date</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['tax_renew_date']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Insurance Renewal Date</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['ins_renew_date']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="legend">Bank Information</div>
                                    <div class="row">
                                        <div class="col-md-3">Bank Name</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['bank_name']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Account Number</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['acc_number']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Branch Code</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['branch_code']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Swift Code</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['swift_code']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                </div><!--#about_overview.tab-pane-->

                                <div class="tab-pane" id="about_timeline">
                                    <div class="timeline single">
                                        <?php
$_from = $_smarty_tpl->tpl_vars['timeline']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                            <div class="frame">
                                                <div class="timeline-badge">
                                                    <i class="fa fa-headphones"></i>
                                                </div><!--.timeline-badge-->
                                                <span class="timeline-date"><?php echo $_smarty_tpl->tpl_vars['v']->value['unique_id'];?>
 - TRIP <?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
</span>
                                                <div class="timeline-content">
                                                    <p>Passenger : <?php echo $_smarty_tpl->tpl_vars['v']->value['passengername'];?>
</p>   
                                                    <p>Order Time : <?php echo $_smarty_tpl->tpl_vars['v']->value['order_date'];?>
</p>
                                                    <p>Start Time : <?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
</p>
                                                    <p>Start Location : <?php echo $_smarty_tpl->tpl_vars['v']->value['start_location'];?>
</p>
                                                    <p>End Location : <?php echo $_smarty_tpl->tpl_vars['v']->value['end_location'];?>
</p>
                                                </div><!--.timeline-content-->
                                            </div><!--.frame-->
                                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>                                       
                                    </div><!--.timeline-->
                                </div><!--#about_timeline.tab-pane-->

                            </div><!--.tab-content-->

                        </div><!--.col-md-9-->
                    </div><!--.row-->
                </div><!--#about.tab-pane-->

                <div id="edit" class="tab-pane">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav nav-tabs borderless vertical">
                                <li class="active"><a href="#edit_overview" data-toggle="tab">Edit</a></li>

                            </ul>
                        </div><!--.col-md-3-->
                        <div class="col-md-9">
                            <div class="tab-content">
                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view" method="post" class="form-horizontal parsley-validate">
                                    <div class="tab-pane active" id="edit_overview">
                                        <div class="legend">Basic Information</div>

                                        <div class="form-content">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">First Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="f_name" id="f_name" class="form-control" placeholder="Enter First Name" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your First Name" required  value="<?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
">
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['f_name'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['f_name'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Last Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="l_name" id="l_name" class="form-control" placeholder="Enter Last Name" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Last Name" value="<?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
" required>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['l_name'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['l_name'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Nationality <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Nationality" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Nationality" value="<?php echo $_smarty_tpl->tpl_vars['nationality']->value;?>
" required>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['nationality'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['nationality'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Address 1 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="address1" id="address1" class="form-control" placeholder="Enter Address" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Address" value="<?php echo $_smarty_tpl->tpl_vars['address1']->value;?>
" required>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['address1'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['address1'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Address 2 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="address2" id="address2" class="form-control" placeholder="Enter Address" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Address" value="<?php echo $_smarty_tpl->tpl_vars['address2']->value;?>
" required>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['address2'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['address2'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Address 3 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="address3" id="address3" class="form-control" placeholder="Enter Address" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Address" value="<?php echo $_smarty_tpl->tpl_vars['address3']->value;?>
" required>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['address3'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['address3'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Email <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" required>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['email'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['email'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Mobile1 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="mobile1" id="mobile1" class="form-control" placeholder="Enter Mobile Number" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Mobile Number" value="<?php echo $_smarty_tpl->tpl_vars['mobile1']->value;?>
" required>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['mobile1'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['mobile1'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Mobile2 </label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="mobile2" id="mobile2" class="form-control" placeholder="Enter Mobile Number" <?php if ($_smarty_tpl->tpl_vars['mobile2']->value == 0) {?> value=""<?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['mobile2']->value;?>
"<?php }?>>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['mobile2'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['mobile2'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Licence number <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="licence" id="licence" class="form-control" placeholder="Enter Licence Number" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Licence Number"  value="<?php echo $_smarty_tpl->tpl_vars['licence']->value;?>
" required="">
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['licence'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['licence'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Cab Number <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="cab_number" id="cab_number" class="form-control" placeholder="Enter Cab Number" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Cab Number"  value="<?php echo $_smarty_tpl->tpl_vars['cab_number']->value;?>
" required="">
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['cab_number'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['cab_number'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Cab Model <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="cab_model" id="cab_model" class="form-control" placeholder="Enter Cab Model" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Cab Model"  value="<?php echo $_smarty_tpl->tpl_vars['cab_model']->value;?>
" required="">
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['cab_model'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['cab_model'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Cab Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    
                                                  
                                                        <div class="input-wrapper">

                                                            <select class="selectpicker" data-width="100%" name="cab_name" id="cab_name" data-parsley-error-message="Please Select Your Cab Type" class="selectpicker" data-live-search="true"  required><?php
$_from = $_smarty_tpl->tpl_vars['cab_name_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                                                <?php if ($_smarty_tpl->tpl_vars['v']->value['id'] == $_smarty_tpl->tpl_vars['cab_name']->value) {?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" selected="true"><?php echo $_smarty_tpl->tpl_vars['v']->value['type_short_name'];?>
</option>                   <?php } else { ?>
                                                                   <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['type_short_name'];?>
</option> 
                                                                <?php }?>
                                                                
                                                                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                                                </select>
                                                            </div>
                                                     
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Cab Seat <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" name="cab_seat" id="cab_seat" class="form-control" placeholder="Enter Cab Seat" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Cab Seat"  value="<?php echo $_smarty_tpl->tpl_vars['cab_seat']->value;?>
" required="">
                                                            </div>
                                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['cab_seat'])) {?>
                                                                <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['cab_seat'];?>
 </span>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tax Renewal Date <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" style="width: 200px" name="tax_renew_date" class="form-control bootstrap-daterangepicker-basic" value="<?php echo $_smarty_tpl->tpl_vars['tax_renew_date']->value;?>
" placeholder="Enter Tax Renewal Date" data-parsley-error-message="Please Enter Your Tax Renewal Date" required/>
                                                            </div>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['tax_renew_date'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['tax_renew_date'];?>
 </span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Insurance Renewal Date <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" style="width: 200px" name="ins_renew_date" class="form-control bootstrap-daterangepicker-basic" value="<?php echo $_smarty_tpl->tpl_vars['ins_renew_date']->value;?>
" placeholder="Enter Insurance Renewal Date" data-parsley-error-message="Please Enter Your Tax Renewal Date" required/>
                                                            </div>
                                                        </div>
                                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value['ins_renew_date'])) {?>
                                                            <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['ins_renew_date'];?>
 </span>
                                                        <?php }?>


                                                    </div>
                                                </div>
                                                <div class="legend">Bank Information</div>   
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Bank Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Bank Name"  value="<?php echo $_smarty_tpl->tpl_vars['bank_name']->value;?>
" required="">
                                                            </div>
                                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['bank_name'])) {?>
                                                                <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['bank_name'];?>
 </span>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Account Number <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" name="acc_number" id="acc_number" class="form-control" placeholder="Enter Account Number" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Account Number"  value="<?php echo $_smarty_tpl->tpl_vars['acc_number']->value;?>
" required="">
                                                            </div>
                                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['acc_number'])) {?>
                                                                <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['acc_number'];?>
 </span>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Branch Code <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" name="branch_code" id="branch_code" class="form-control" placeholder="Enter Branch Code" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Branch Code"  value="<?php echo $_smarty_tpl->tpl_vars['branch_code']->value;?>
" required="">
                                                            </div>
                                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['branch_code'])) {?>
                                                                <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['branch_code'];?>
 </span>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Swift Code <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                       
                                                            <div class="input-wrapper">
                                                                <input type="text" name="swift_code" id="swift_code" class="form-control" placeholder="Enter Swift Code" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Swift Code"  value="<?php echo $_smarty_tpl->tpl_vars['swift_code']->value;?>
" required="">
                                                            </div>
                                                            <?php if (isset($_smarty_tpl->tpl_vars['error']->value['swift_code'])) {?>
                                                                <span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error']->value['swift_code'];?>
 </span>
                                                            <?php }?>
                                                        </div>
                                                    
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-5">
                                                    <input  type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                                                    <button type="submit" class="btn btn-blue" value="submit"  name="submit">Update</button>

                                                </div>
                                            </div>


                                        </div><!--#about_overview.tab-pane-->
                                    </form>
                                </div><!--.tab-content-->

                            </div><!--.col-md-9-->
                        </div><!--.row-->
                    </div><!--#edit.tab-pane-->


                </div><!--.tab-content-->
            </div><!--.col-->
        </div><!--.row-->

        

        <!-- Bootstrap Image Gallery lightbox -->
        <!-- To use original bootstrap modal window erase data-use-boostrap-model attr -->

    </div><!--.content-->

    <div class="layer-container">

        <!-- BEGIN MENU LAYER -->
        <div class="menu-layer">
            <ul>
                <li>
                    <a href="index.html">Dashboard</a>
                </li>

            </ul>
        </div><!--.menu-layer-->
        <!-- END OF MENU LAYER -->

        <!-- BEGIN SEARCH LAYER -->
        <div class="search-layer">
            <div class="search">
                <form action="pages-search-results.html">
                    <div class="form-group">
                        <input type="text" id="input-search" class="form-control" placeholder="type something">
                        <button type="submit" class="btn btn-default disabled"><i class="ion-search"></i></button>
                    </div>
                </form>
            </div><!--.search-->

            <div class="results">
                <div class="row">
                    <div class="col-md-4">
                        <div class="result result-users">
                            <h4>USERS <small>(3)</small></h4>

                            <ul class="list-material">
                                <li class="has-action-left">
                                    <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                    <a href="#" class="visible">
                                        <div class="list-action-left">
                                            <img src="../../assets/globals/img/faces/1.jpg" class="face-radius" alt="">
                                        </div>
                                        <div class="list-content">
                                            <span class="title">Pari Subramanium</span>
                                            <span class="caption">Legacy Response Assistant</span>
                                        </div>
                                    </a>
                                </li>


                            </ul>

                        </div><!--.results-user-->
                    </div><!--.col-->



                </div><!--.row-->
            </div><!--.results-->
        </div><!--.search-layer-->
        <!-- END OF SEARCH LAYER -->

    </div><!--.layer-container-->
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
bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            Pleasure.init();
            Layout.init();
            //UserPages.profile();
            FormsValidationsParsley.init();
            FormsPickers.init();

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

    <?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 <?php }
}
?>