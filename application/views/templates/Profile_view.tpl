<!DOCTYPE html>
{include file="header.tpl"  name=""}  

{include file="page_header.tpl"  name=""}  
<link rel="stylesheet" href="{$plugin_path}bootstrap-daterangepicker/daterangepicker-bs3.css">

<div class="content">

    <div class="page-header full-content parallax" style="height: 300px; overflow: hidden">
        <div class="parallax-bg" style="background: url('{$image_path}24.jpg') 50% 50%; background-size: cover; width: 100%; height: 100%; position: absolute; left: 0; top: 0;">
        </div>

        <div class="profile-info">
            <div class="profile-photo">
                <img src="{$image_path}/faces/{$profile_pic}" alt="profile picture">
            </div><!--.profile-photo-->
            <div class="profile-text light">
                {$first_name}&nbsp;{$last_name}
                <span class="caption">Pilot</span>
            </div><!--.profile-text-->
        </div><!--.profile-info-->

        <div class="row">
            <div class="col-sm-6">
                <h1>Pilot Profile <!-- <small>{$first_name}&nbsp;{$last_name}</small> --></h1>
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
                                        <div class="col-md-9">{$first_name}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Last name</div><!--.col-md-3-->
                                        <div class="col-md-9">{$last_name}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Nationality</div><!--.col-md-3-->
                                        <div class="col-md-9">{$nationality}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Address1</div><!--.col-md-3-->
                                        <div class="col-md-9">{$address1}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Address2</div><!--.col-md-3-->
                                        <div class="col-md-9">{$address2}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Address3</div><!--.col-md-3-->
                                        <div class="col-md-9">{$address3}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Email</div><!--.col-md-3-->
                                        <div class="col-md-9">{$email}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Mobile 1</div><!--.col-md-3-->
                                        <div class="col-md-9">{$mobile1}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Mobile 2</div><!--.col-md-3-->
                                        <div class="col-md-9">
                                            
                                            {if $mobile2 == 0}NA{else}{$mobile2}{/if}
                                        
                                        </div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Licence number</div><!--.col-md-3-->
                                        <div class="col-md-9">{$licence}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Cab Type</div><!--.col-md-3-->
                                        <div class="col-md-9">{$cab_name}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Cab Model</div><!--.col-md-3-->
                                        <div class="col-md-9">{$cab_model}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Cab Seat</div><!--.col-md-3-->
                                        <div class="col-md-9">{$cab_seat}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Cab Number</div><!--.col-md-3-->
                                        <div class="col-md-9">{$cab_number}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Tax Renewal Date</div><!--.col-md-3-->
                                        <div class="col-md-9">{$tax_renew_date}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Insurance Renewal Date</div><!--.col-md-3-->
                                        <div class="col-md-9">{$ins_renew_date}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="legend">Bank Information</div>
                                    <div class="row">
                                        <div class="col-md-3">Bank Name</div><!--.col-md-3-->
                                        <div class="col-md-9">{$bank_name}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Account Number</div><!--.col-md-3-->
                                        <div class="col-md-9">{$acc_number}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Branch Code</div><!--.col-md-3-->
                                        <div class="col-md-9">{$branch_code}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Swift Code</div><!--.col-md-3-->
                                        <div class="col-md-9">{$swift_code}</div><!--.col-md-9-->
                                    </div><!--.row-->
                                </div><!--#about_overview.tab-pane-->

                                <div class="tab-pane" id="about_timeline">
                                    <div class="timeline single">
                                        {foreach from=$timeline item=v}
                                            <div class="frame">
                                                <div class="timeline-badge">
                                                    <i class="fa fa-headphones"></i>
                                                </div><!--.timeline-badge-->
                                                <span class="timeline-date">{$v.unique_id} - TRIP {$v.status}</span>
                                                <div class="timeline-content">
                                                    <p>Passenger : {$v.passengername}</p>   
                                                    <p>Order Time : {$v.order_date}</p>
                                                    <p>Start Time : {$v.start_time}</p>
                                                    <p>Start Location : {$v.start_location}</p>
                                                    <p>End Location : {$v.end_location}</p>
                                                </div><!--.timeline-content-->
                                            </div><!--.frame-->
                                        {/foreach}                                       
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
                                <form action="{$base_url}Profile/Profile_view" method="post" class="form-horizontal parsley-validate">
                                    <div class="tab-pane active" id="edit_overview">
                                        <div class="legend">Basic Information</div>

                                        <div class="form-content">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">First Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="f_name" id="f_name" class="form-control" placeholder="Enter First Name" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your First Name" required  value="{$first_name}">
                                                        </div>
                                                        {if isset($error['f_name'])}
                                                            <span style='color:red'>{$error['f_name']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Last Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="l_name" id="l_name" class="form-control" placeholder="Enter Last Name" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Last Name" value="{$last_name}" required>
                                                        </div>
                                                        {if isset($error['l_name'])}
                                                            <span style='color:red'>{$error['l_name']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Nationality <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Nationality" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Nationality" value="{$nationality}" required>
                                                        </div>
                                                        {if isset($error['nationality'])}
                                                            <span style='color:red'>{$error['nationality']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Address 1 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="address1" id="address1" class="form-control" placeholder="Enter Address" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Address" value="{$address1}" required>
                                                        </div>
                                                        {if isset($error['address1'])}
                                                            <span style='color:red'>{$error['address1']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Address 2 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="address2" id="address2" class="form-control" placeholder="Enter Address" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Address" value="{$address2}" required>
                                                        </div>
                                                        {if isset($error['address2'])}
                                                            <span style='color:red'>{$error['address2']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Address 3 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="address3" id="address3" class="form-control" placeholder="Enter Address" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Address" value="{$address3}" required>
                                                        </div>
                                                        {if isset($error['address3'])}
                                                            <span style='color:red'>{$error['address3']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Email <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Email" value="{$email}" required>
                                                        </div>
                                                        {if isset($error['email'])}
                                                            <span style='color:red'>{$error['email']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Mobile1 <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="mobile1" id="mobile1" class="form-control" placeholder="Enter Mobile Number" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Mobile Number" value="{$mobile1}" required>
                                                        </div>
                                                        {if isset($error['mobile1'])}
                                                            <span style='color:red'>{$error['mobile1']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Mobile2 </label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="mobile2" id="mobile2" class="form-control" placeholder="Enter Mobile Number" {if $mobile2 == 0} value=""{else} value="{$mobile2}"{/if}>
                                                        </div>
                                                        {if isset($error['mobile2'])}
                                                            <span style='color:red'>{$error['mobile2']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Licence number <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="licence" id="licence" class="form-control" placeholder="Enter Licence Number" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Licence Number"  value="{$licence}" required="">
                                                        </div>
                                                        {if isset($error['licence'])}
                                                            <span style='color:red'>{$error['licence']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Cab Number <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="cab_number" id="cab_number" class="form-control" placeholder="Enter Cab Number" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Cab Number"  value="{$cab_number}" required="">
                                                        </div>
                                                        {if isset($error['cab_number'])}
                                                            <span style='color:red'>{$error['cab_number']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Cab Model <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    <div class="inputer">
                                                        <div class="input-wrapper">
                                                            <input type="text" name="cab_model" id="cab_model" class="form-control" placeholder="Enter Cab Model" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Cab Model"  value="{$cab_model}" required="">
                                                        </div>
                                                        {if isset($error['cab_model'])}
                                                            <span style='color:red'>{$error['cab_model']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Cab Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                <div class="col-md-5">
                                                    {*<div class="inputer">
                                                    <div class="input-wrapper">
                                                    <input type="text" name="cab_name" id="cab_name" class="form-control" placeholder="Enter Cab Type" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Cab Type"  value="{$cab_name}" required="">
                                                    </div>
                                                    {if isset($error['cab_name'])}
                                                    <span style='color:red'>{$error['cab_name']} </span>
                                                    {/if}
                                                    </div>*}
                                                  
                                                        <div class="input-wrapper">

                                                            <select class="selectpicker" data-width="100%" name="cab_name" id="cab_name" data-parsley-error-message="Please Select Your Cab Type" class="selectpicker" data-live-search="true"  required>{foreach from = $cab_name_list  item=v}
                                                                {if $v.id == $cab_name}
                                                                    <option value="{$v.id}" selected="true">{$v.type_short_name}</option>                   {else}
                                                                   <option value="{$v.id}">{$v.type_short_name}</option> 
                                                                {/if}
                                                                
                                                                {/foreach}
                                                                </select>
                                                            </div>
                                                     
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Cab Seat <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" name="cab_seat" id="cab_seat" class="form-control" placeholder="Enter Cab Seat" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Cab Seat"  value="{$cab_seat}" required="">
                                                            </div>
                                                            {if isset($error['cab_seat'])}
                                                                <span style='color:red'>{$error['cab_seat']} </span>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tax Renewal Date <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" style="width: 200px" name="tax_renew_date" class="form-control bootstrap-daterangepicker-basic" value="{$tax_renew_date}" placeholder="Enter Tax Renewal Date" data-parsley-error-message="Please Enter Your Tax Renewal Date" required/>
                                                            </div>
                                                        </div>
                                                        {if isset($error['tax_renew_date'])}
                                                            <span style='color:red'>{$error['tax_renew_date']} </span>
                                                        {/if}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Insurance Renewal Date <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" style="width: 200px" name="ins_renew_date" class="form-control bootstrap-daterangepicker-basic" value="{$ins_renew_date}" placeholder="Enter Insurance Renewal Date" data-parsley-error-message="Please Enter Your Tax Renewal Date" required/>
                                                            </div>
                                                        </div>
                                                        {if isset($error['ins_renew_date'])}
                                                            <span style='color:red'>{$error['ins_renew_date']} </span>
                                                        {/if}


                                                    </div>
                                                </div>
                                                <div class="legend">Bank Information</div>   
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Bank Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Bank Name"  value="{$bank_name}" required="">
                                                            </div>
                                                            {if isset($error['bank_name'])}
                                                                <span style='color:red'>{$error['bank_name']} </span>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Account Number <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" name="acc_number" id="acc_number" class="form-control" placeholder="Enter Account Number" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Account Number"  value="{$acc_number}" required="">
                                                            </div>
                                                            {if isset($error['acc_number'])}
                                                                <span style='color:red'>{$error['acc_number']} </span>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Branch Code <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                        <div class="inputer">
                                                            <div class="input-wrapper">
                                                                <input type="text" name="branch_code" id="branch_code" class="form-control" placeholder="Enter Branch Code" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Branch Code"  value="{$branch_code}" required="">
                                                            </div>
                                                            {if isset($error['branch_code'])}
                                                                <span style='color:red'>{$error['branch_code']} </span>
                                                            {/if}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Swift Code <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                                    <div class="col-md-5">
                                                       
                                                            <div class="input-wrapper">
                                                                <input type="text" name="swift_code" id="swift_code" class="form-control" placeholder="Enter Swift Code" data-parsley-minlength="1" data-parsley-error-message="Please Enter Your Swift Code"  value="{$swift_code}" required="">
                                                            </div>
                                                            {if isset($error['swift_code'])}
                                                                <span style='color:red'>{$error['swift_code']} </span>
                                                            {/if}
                                                        </div>
                                                    
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-5">
                                                    <input  type="hidden" name="user_id" value="{$id}">
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

        {*<div class="footer-links margin-top-40">
        <div class="row no-gutters">
        <div class="col-xs-6 bg-blue-grey">
        <a href="#">
        <span class="state">Tables</span>
        <span>Datatable Extensions</span>
        <span class="icon"><i class="ion-android-arrow-back"></i></span>
        </a>
        </div><!--.col-->
        <div class="col-xs-6 bg-indigo">
        <a href="#" target="_blank">
        <span class="state">Pages</span>
        <span>Lock Screen</span>
        <span class="icon"><i class="ion-android-arrow-forward"></i></span>
        </a>
        </div><!--.col-->
        </div><!--.row-->
        </div><!--.footer-links-->*}

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
    {include file="page_footer.tpl"  name=""}  
    {include file="layer.tpl"  name=""}  
    {include file="footer.tpl"  name=""}  

    <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
    <script src="{$js_path}validate_Cab_Management.js"></script>
    <script src="{$plugin_path}bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
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
    </script>

    {include file="page_close.tpl"  name=""} 