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
                        <div class="panel-title"> <strong>{if $edit_id != ''} Edit {else} Add New {/if}</strong></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" enctype="multipart/form-data" id="form" name="form" method="post">
                            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Cab Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="cab_type" class="form-control" value="{$cab_type_name}" placeholder = "Enter Cab Type Name" data-parsley-error-message="Please Enter Cab Type" >
                                            </div>
                                            {if isset($error['cab_type'])}
                                                <span style="color:red">{$error['cab_type']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Cab Short Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="short_name" class="form-control" value="{$cab_type_short_name}" placeholder = "Enter Cab Type Short Name" data-parsley-error-message="Please Enter Cab Short Name" >
                                            </div>
                                            {if isset($error['short_name'])}
                                                <span style="color:red">{$error['short_name']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="row form-group">
                                    <div class="row">
                                    <div class="control-label col-md-3">Logo<span style="color: red;vertical-align:super;font-size:small"> *</span></div><!--.col-md-3-->
                                    <div class="col-md-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="userfile" id="userfile"  data-parsley-error-message="Please Select Logo"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div style="font-size: small">
                                        <div class="col-md-offset-3 col-md-5">
                                        <label class="list-group-item list-group-item-warning">JPG, JPEG, PNG, ICO or GIF file of 100x100 pixels, 15 KB maximum</label>
                                        </div>
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                            </div><!--.form-content-->

                            <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="hidden" name="edit_id" value="{$cab_id}">
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
                    <!-- <div class="panel-heading">
                        <div class="panel-title"><h4>CAB LIST</h4></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <div class="overflow-table">

                        {if count($cabs_list) > 0}

                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th style="width:7%">Sl.No</th>
                                    <th style="width:20%">Name</th>
                                    <th style="width:20%">ShortName</th>
                                    <th style="width:20%">Logo</th>
                                    <th style="width:10%">Edit</th>
                                    <th style="width:10%">Status</th>
                                    <th style="width:13%">Deactivate/Activate</th>                 
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$cabs_list item=v}
                                <tr>
                                    <td>{counter}</td>
                                    <td>{$v.type_name}</td>
                                    <td>{$v.type_short_name}</td>
                                    <td><img src="{$image_path}cab/{$v.icon}" style="max-height: 50px; max-width: 50px;" /></td>
                                    <td><button class="btn btn-primary btn-xs dt-edit" title="Edit {$v.type_name}" onclick="javascript:edit_cabs({$v.id})"><span class="glyphicon glyphicon-edit"></span></button></td>
                                    {if $v.active_status == 1}
                                        <td><span class="label label-success">Active</span></td>
                                        <td><button class="btn btn-danger btn-xs dt-delete" title="Deactivate {$v.type_name}" onclick="javascript:deact_cabs({$v.id}, 0)"><span class="glyphicon glyphicon-off"></span></button></td>
                                    {else}
                                        <td><span class="label label-danger">Inactive</span></td>
                                        <td><button class="btn btn-success btn-xs dt-delete" title="Activate {$v.type_name}" onclick="javascript:deact_cabs({$v.id}, 1)"><span class="glyphicon glyphicon-play-circle"></span></button></td>
                                    {/if}                                    
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
                        
                        {else}

                        <h4>Heads up! No Vehicles Entered</h4>

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
        <script src="{$js_path}validate_Cab_Management.js"></script>
        <script src="{$plugin_path}jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
        <!-- END PLUGINS AREA -->

        <!-- PLUGINS INITIALIZATION AND SETTINGS -->
        <script src="{$js_path}/tables-datatables.js"></script>
        <!-- END PLUGINS INITIALIZATION AND SETTINGS -->
        
        <script src="{$js_path}/cabs.js"></script>        
        <script src="{$plugin_path}/parsleyjs/dist/parsley.min.js"></script>
        <script src="{$js_path}/validate_Cab_Management.js"></script>

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