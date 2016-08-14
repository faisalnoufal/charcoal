<!DOCTYPE html>

{include file="header.tpl"  name=""}  

{include file="page_header.tpl"  name=""}  
<link rel="stylesheet" href="{$plugin_path}bootstrap-daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="{$plugin_path}eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
<div class="content">

    <div class="row">
        <div class="col-md-12">
            <form action="" class="form-horizontal form-striped form-bordered" method="post" onsubmit="return validateFormRegister()" enctype="multipart/form-data" id="form_register">
                <input type="hidden" name="path_root" id="path_root" value="{$base_url}">
                
                {if isset($err_msg)}
                    <div class="alert alert-danger" role="alert"> {$err_msg}</div>
                {/if}

                <div class="panel">

                    <div class="panel-heading"><div class="panel-title"> <h3>Basic Information</h3></div></div>
                    <div class="panel-body">
                        <div class="form-content">

                            <div class="form-group">
                                <label class="control-label col-md-3">First Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="f_name" id="f_name" class="form-control" placeholder="Enter First Name" value="{set_value('f_name')}">
                                        </div>
                                        <span id='error_f_name' style='color:red'>{if isset($error['f_name'])} {$error['f_name']} {/if}</span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Last Name<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="l_name" id="l_name" placeholder="Enter Last Name" class="form-control" value="{set_value('l_name')}">
                                        </div>
                                        <span id='error_l_name' style='color:red'>{if isset($error['l_name'])} {$error['l_name']} {/if}</span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Nationality <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Nationality" value="{set_value('nationality')}">
                                        </div>
                                        <span id='error_nationality' style='color:red'>{if isset($error['nationality'])} {$error['nationality']} {/if}</span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Address 1 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="address1" id="address1" class="form-control" placeholder="Enter Address" value="{set_value('address1')}">
                                        </div>
                                        <span id='error_address1' style='color:red'>{if isset($error['address1'])} {$error['address1']} {/if}</span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Address 2 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="address2" id="address2" class="form-control" placeholder="Enter Address" value="{set_value('address2')}">
                                        </div>                                        
                                        <span id='error_address2' style='color:red'>{if isset($error['address2'])} {$error['address2']} {/if}</span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Address 3 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="address3" id="address3" class="form-control" placeholder="Enter Address" value="{set_value('address3')}">
                                        </div>                                        
                                        <span id='error_address3' style='color:red'>{if isset($error['address3'])} {$error['address3']} {/if}</span>
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
                                        <span id='error_address_proof' style='color:red'>{if isset($error['address_proof'])} {$error['address_proof']} {/if}</span>
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
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email ID" value="{set_value('email')}">
                                        </div>                                        
                                        <span id='error_email' style='color:red'>{if isset($error['email'])} {$error['email']} {/if}</span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Mobile number 1 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="mobile1" id="mobile1" class="form-control" placeholder="Enter Mobile Number" value="{set_value('mobile1')}">
                                        </div>                                        
                                        <span id='error_mobile1' style='color:red'>{if isset($error['mobile1'])} {$error['mobile1']} {/if}</span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Mobile number 2 </label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="mobile2" id="mobile2" class="form-control" placeholder="Enter Mobile Number" value="{set_value('mobile2')}">
                                        </div>                                        
                                        <span id='error_mobile2' style='color:red'>{if isset($error['mobile2'])} {$error['mobile2']} {/if}</span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Licence <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="licence" id="licence" class="form-control" placeholder="Enter Licence Number" value="{set_value('licence')}">
                                        </div>                                        
                                        <span id='error_licence' style='color:red'>{if isset($error['licence'])} {$error['licence']} {/if}</span>
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
                                        <span id='error_licence_proof' style='color:red'>{if isset($error['licence_proof'])} {$error['licence_proof']} {/if}</span>
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
                                            <input type="text" name="cab_num" id="cab_num" class="form-control" placeholder="Enter Cab Number" value="{set_value('cab_num')}">
                                        </div>                                        
                                        <span id='error_cab_num' style='color:red'>{if isset($error['cab_num'])} {$error['cab_num']} {/if}</span>
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
                                                        <input type="text" style="width: 200px" name="tax_renew_date" id="tax_renew_date" class="form-control bootstrap-daterangepicker-basic" value="{set_value('tax_renew_date')}"/>
                                                    </div>
                                                </div>                                                
                                                <span id='error_tax_renew_date' style='color:red'>{if isset($error['tax_renew_date'])} {$error['tax_renew_date']} {/if}</span>
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
                                                        <input type="text" style="width: 200px" name="ins_renew_date" id="ins_renew_date" class="form-control bootstrap-daterangepicker-basic" value="{set_value('ins_renew_date')}"/>
                                                    </div>
                                                </div>                                                
                                                <span id='error_ins_renew_date' style='color:red'>{if isset($error['ins_renew_date'])} {$error['ins_renew_date']} {/if}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--.form-group-->
                            
                            {if isset($cab_name)}
                                <div class="form-group">
                                    <label class="control-label col-md-3">Cab Type<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-7">
                                        <div class="margin-bottom-10">                                            
                                            <select class="selectpicker" data-width="100%" name="cab_name" id="cab_name" class="selectpicker" data-live-search="true">
                                                {foreach from = $cab_name  item=v}
                                                    <option value="{$v.id}">{$v.type_short_name}</option>
                                                {/foreach}
                                            </select>                                            
                                            <span id='error_cab_name' style='color:red'>{if isset($error['cab_name'])} {$error['cab_name']} {/if}</span>
                                        </div>                                       
                                    </div>
                                </div><!--.form-group-->
                            {/if}
                                    
                            <div class="form-group">
                                <label class="control-label col-md-3">Cab Model<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="cab_model" id="cab_model" class="form-control" placeholder="Enter Cab Model" value="{set_value('cab_model')}">
                                        </div>                                        
                                        <span id='error_cab_model' style='color:red'>{if isset($error['cab_model'])} {$error['cab_model']} {/if}</span>
                                    </div>
                                </div>                                    
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Seating Capacity<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="text" name="cab_seat" id="cab_seat" class="form-control" placeholder="Enter Seating Capacity" value="{set_value('cab_seat')}">
                                        </div>                                        
                                        <span id='error_cab_seat' style='color:red'>{if isset($error['cab_seat'])} {$error['cab_seat']} {/if}</span>
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
                                                <span id='error_profile_pic' style='color:red'>{if isset($error['profile_pic'])} {$error['profile_pic']} {/if}</span>
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
                                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Username" value="{set_value('user_name')}">
                                        </div>                                        
                                        <span id='error_user_name' style='color:red'>{if isset($error['user_name'])} {$error['user_name']} {/if}</span>
                                    </div>
                                </div>
                            </div><!--.form-group-->

                            <div class="form-group">
                                <label class="control-label col-md-3">Password<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                <div class="col-md-7">
                                    <div class="inputer">
                                        <div class="input-wrapper">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{set_value('password')}">
                                        </div>                                        
                                        <span id='error_password' style='color:red'>{if isset($error['password'])} {$error['password']} {/if}</span>
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
                                                <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name" value="{set_value('bank_name')}">
                                            </div>
                                            <span id='error_bank_name' style='color:red'>{if isset($error['bank_name'])} {$error['bank_name']} {/if}</span>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Account Number<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-7">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="acc_number" id="acc_number" class="form-control" placeholder="Enter Account Number" value="{set_value('acc_number')}">
                                            </div>
                                            <span id='error_acc_number' style='color:red'>{if isset($error['acc_number'])} {$error['acc_number']} {/if}</span>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Branch Code<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-7">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="branch_code" id="branch_code" class="form-control" placeholder="Enter Branch Code" value="{set_value('branch_code')}">
                                            </div>
                                            <span id='error_branch_code' style='color:red'>{if isset($error['branch_code'])} {$error['branch_code']} {/if}</span>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Swift Code<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-7">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="swift_code" id="swift_code" class="form-control" placeholder="Enter Swift Code" value="{set_value('swift_code')}">
                                            </div>
                                            <span id='error_swift_code' style='color:red'>{if isset($error['swift_code'])} {$error['swift_code']} {/if}</span>
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

            {include file="page_footer.tpl"  name=""}  
            {include file="layer.tpl"  name=""}  
            {include file="footer.tpl"  name=""} 

            <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>            
            <script src="{$js_path}validate_Cab_Management.js"></script>            
            <script src="{$plugin_path}jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
            <script src="{$plugin_path}bootstrap-daterangepicker/daterangepicker.js"></script>

            <script src="{$js_path}validate_register_driver.js"></script>
            <script>
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

            </script>
            <!-- END INITIALIZATION-->

            {include file="page_close.tpl"  name=""} 