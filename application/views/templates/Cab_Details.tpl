<!DOCTYPE html>

{include file="header.tpl"  name=""}
<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">     
<link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">   
<!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}

<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title"> <h3>Update Cab Details</h3></div>
            </div><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="path_root" id="path_root" value="{$base_url}">

                    <div class="form-content">
                        <div class="form-group">
                            <label class="control-label col-md-3">Cab Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5"> 
                                <div class="input-wrapper">                                       
                                    <select class="selecter" name="cab_id" id="cab_id" data-width="100%" data-parsley-error-message="Please Select Cab Type" required="">

                                        {if $cab_id!=""}
                                            <option value={$cab_id}>{$cab_type}</option>
                                            {foreach from=$cabs_list item=v}
                                                <option value={$v.id}>{$v.type_short_name}</option>
                                            {/foreach}
                                        {else}
                                            <option value=''>Select Cab Type</option>
                                            {foreach from=$cabs_list item=v}
                                                <option value={$v.id}>{$v.type_short_name}</option>
                                            {/foreach}
                                        {/if}
                                    </select>
                                </div>
                                {if isset($error['cab_id'])}
                                    <span style="color:red">{$error['cab_id']}</span>
                                {/if}
                            </div>
                        </div><!--.form-group-->

                        <div class="form-group">
                            <label class="control-label col-md-3">Cab Model Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">
                                <div class="inputer">
                                    <div class="input-wrapper">                                                
                                        <input type="text" name="cab_model_name" id="cab_model_name" class="form-control" value="{$cab_model_name}" placeholder = "Enter Cab Model Name" data-parsley-error-message="Please Enter Cab Model Name" required="">
                                    </div> 
                                    {if isset($error['cab_model_name'])}
                                        <span style="color:red">{$error['cab_model_name']}</span>
                                    {/if}                                           
                                </div>
                            </div>
                        </div><!--.form-group-->

                        <div class="form-group">
                            <label class="control-label col-md-3">Cab Registration Details <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">
                                <div class="inputer">
                                    <div class="input-wrapper">                                                
                                        <input type="text" name="cab_reg_details" id="cab_reg_details" class="form-control" value="{$cab_reg_details}" placeholder = "Enter Cab Registration Details" data-parsley-error-message="Please Enter Cab Registration Details" required="">
                                    </div>
                                    {if isset($error['cab_reg_details'])}
                                        <span style="color:red">{$error['cab_reg_details']}</span>
                                    {/if}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Seating Capacity <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">
                                <div class="inputer">
                                    <div class="input-wrapper">                                                
                                        <input type="text" name="seating_capacity" id="seating_capacity" class="form-control" value="{$seating_capacity}" placeholder = "Enter Seating Capacity" data-parsley-error-message="Please Enter Cab Seating Capacity" required="">
                                    </div> 
                                    {if isset($error['seating_capacity'])}
                                        <span style="color:red">{$error['seating_capacity']}</span>
                                    {/if}                                           
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="row">
                                <div class="control-label col-md-3">Cab Image <span style="color: red;vertical-align:super;font-size:small"> *</span></div><!--.col-md-3-->
                                <div class="col-md-6">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="userfile" id="userfile" ></span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput" data-parsley-error-message="Please Enter Cab Image" >Remove</a>
                                        </div>
                                    </div>
                                    {if isset($error['userfile'])}
                                        <span style="color:red">{$error['userfile']}</span>
                                    {/if}    
                                </div>
                            </div>
                            <div class="row">
                                <div style="font-size: small">
                                    <div class="col-md-offset-3 col-md-5">
                                        <label class="list-group-item list-group-item-warning">JPG, JPEG, PNG, ICO or GIF file of 48x48 pixels maximum</label>
                                    </div>
                                </div>
                            </div>
                        </div><!--.form-group-->

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

<div class="row">
    <div class="col-md-12">
        <div class="panel" style="font-size: small">
            <div class="panel-heading">
                <div class="panel-title"><h4>CAB LIST</h4></div>
            </div><!--.panel-heading-->
            <div class="panel-body">

                <div class="overflow-table">

                    {if count($cab_detail_list) > 0}

                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th>Sl.No</th> 
                                    <th>Cab Model Name</th> 
                                    <th>Cab Registration Details</th>
                                    <th>Seating Capacity</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Deactivate/Activate</th>  
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$cab_detail_list item=v}
                                    <tr>
                                        <td>{counter}</td>
                                        <td>{$v.cab_model_name}</td>
                                        <td>{$v.cab_registration_details}</td>
                                        <td>{$v.seating_capacity}</td>
                                        {if $v.status == 1}
                                            <td>Active</td>
                                        {else}
                                            <td>Inactive</td>
                                        {/if}  
                                        <td>       
                                            <img src="{$image_path}cabs/{$v.image_name}" style="width:90px;height:80px;">
                                        </td>
                                        <td><button class="btn btn-primary btn-xs dt-edit" title="Edit {$v.cab_model_name}" onclick="javascript:edit_cab_model({$v.id})"><span class="glyphicon glyphicon-pencil"></span></button></td>

                                        {if $v.status == 1}
                                            <td><button class="btn btn-danger btn-xs dt-delete" title="Deactivate {$v.cab_model_name}" onclick="javascript:deact_cab_model({$v.id})"><span class="glyphicon glyphicon-trash"></span></button></td>
                                                {else}
                                            <td><button class="btn btn-danger btn-xs dt-delete" title="Activate {$v.cab_model_name}" onclick="javascript:act_cab_model({$v.id})"><span class="glyphicon glyphicon-trash"></span></button></td>
                                                {/if}  
                                    </tr>
                                {/foreach}
                            </tbody>                            
                        </table>

                    {else}

                        <h4>No Cab Details Found</h4>

                    {/if}

                </div><!--.overflow-table-->

            </div><!--.panel-body-->
        </div><!--.panel-->
    </div><!--.col-md-12-->
</div><!--.row-->

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 

<script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
{* <script src="{$js_path}forms-validations-parsley.js"></script>*}
<script src="{$js_path}validate_Cab_Management.js"></script>
<script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>        
<!-- END PLUGINS AREA -->

<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}/tables-datatables.js"></script>
<!-- END PLUGINS INITIALIZATION AND SETTINGS -->

<script src="{$js_path}/cabs.js"></script>
<script src="{$js_path}/ajax.js"></script>

<!-- BEGIN INITIALIZATION-->
<script>
                                    $(document).ready(function () {
                                        Pleasure.init();
                                        Layout.init();
                                        TablesDataTables.init();
                                        FormsValidationsParsley.init();
                                    });
</script>
<!-- END INITIALIZATION-->
</body>
</html>