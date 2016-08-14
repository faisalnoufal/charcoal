<!DOCTYPE html>

{include file="header.tpl"  name=""}
        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
        <link rel="stylesheet" href="{$css_path}plugins.css">        
        <!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}
       
        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"> <strong>{if $edit_id != ''} Edit {else} Add New {/if}</strong></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">
                            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Surcharge <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="surcharge" class="form-control" value="{$surcharge}" placeholder = "Enter Surcharge" data-parsley-error-message="Please Enter Surcharge" required="">
                                            </div>
                                            {if isset($error['surcharge'])}
                                                <span style="color:red">{$error['surcharge']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Amount <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="surcharge_amount" class="form-control" value="{$amount}" placeholder = "Enter Amount" data-parsley-error-message="Please Enter Amount" required="">
                                            </div>
                                            {if isset($error['surcharge_amount'])}
                                                <span style="color:red">{$error['surcharge_amount']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->
                            </div><!--.form-content-->

                            <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
{*                                        <input type="hidden" name="edit_id" value="{$cab_id}">*}
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
                        <div class="panel-title"><h4>SURCHARGE LIST</h4></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <div class="overflow-table">

                        {if count($surcharge_list) > 0}

                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th style="width:10%">Sl.No</th>
                                    <th style="width:40%">Surcharge</th>
                                    <th style="width:13%">Amount</th>                  
                                    <th style="width:11%">Edit</th>
                                    <th style="width:11%">Status</th>
                                    <th style="width:15%">Deactivate/Activate</th>                 
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$surcharge_list item=v}
                                <tr>
                                    <td>{counter}</td>
                                    <td>{$v.surcharge}</td>
                                    <td>{$v.amount}</td>
                                    <td><button class="btn btn-primary btn-xs dt-edit" title="Edit {$v.surcharge}" onclick="javascript:edit_surcharge({$v.id})"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                    
                                    
                                    {if $v.status == 1}
                                        <td>Active</td>
                                        <td><button class="btn btn-danger btn-xs dt-delete" title="Deactivate {$v.surcharge}" onclick="javascript:deact_surcharge({$v.id})"><span class="glyphicon glyphicon-trash"></span></button></td>
                                    {else}
                                        <td>Inative</td>
                                        <td><button class="btn btn-danger btn-xs dt-delete" title="Activate {$v.surcharge}" onclick="javascript:act_surcharge({$v.id})"><span class="glyphicon glyphicon-trash"></span></button></td>
                                    {/if}                                
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
                        
                        {else}
                        <br>
                        <h4>No Surcharge Details Found</h4>

                        {/if}

                        </div><!--.overflow-table-->

                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-12-->
        </div><!--.row-->

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 

        <script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
        <!-- END PLUGINS AREA -->

        <!-- PLUGINS INITIALIZATION AND SETTINGS -->
        <script src="{$js_path}/tables-datatables.js"></script>
        <!-- END PLUGINS INITIALIZATION AND SETTINGS -->
        
        <script src="{$js_path}/surcharge.js"></script>
<script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
{* <script src="{$js_path}forms-validations-parsley.js"></script>*}
<script src="{$js_path}validate_Cab_Management.js"></script>
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