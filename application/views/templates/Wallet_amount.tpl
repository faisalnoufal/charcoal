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

                        <form action="" class="form-horizontal form-striped form-bordered" id="form_wallet_amount" name="form_wallet_amount" method="post" onsubmit="return validateFormSelect()">
                            
                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Wallet Amount <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="amount" id="amount" class="form-control" value="{$amount}" placeholder = "Enter Wallet Amount">
                                            </div>
                                            <span id="error_amount" style="color:red">{if isset($error['amount'])} {$error['amount']} {/if}</span>
                                        </div>
                                    </div>
                                </div><!--.form-group-->                               

                            </div><!--.form-content-->

                            <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="hidden" name="edit_id" value="{$amount_id}">
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
                    <div class="panel-body">
                        <div class="overflow-table">

                        {if count($amount_list) > 0}

                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th style="width:10%">Sl.No</th>
                                    <th style="width:25%">Amount</th>
                                    <th style="width:15%">Edit</th>
                                    <th style="width:25%">Status</th>
                                    <th style="width:25%">Deactivate/Activate</th>                 
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$amount_list item=v}
                                <tr>
                                    <td>{counter}</td>
                                    <td>{$v.amount}</td>
                                    <td><button class="btn btn-primary btn-xs dt-edit" title="Edit {$v.amount}" onclick="javascript:edit_wallet_amount({$v.amount_id})"><span class="glyphicon glyphicon-edit"></span></button></td>                                    
                                    {if $v.act_status == 1}
                                        <td><span class="label label-success">Active</span></td>
                                        <td><button class="btn btn-danger btn-xs dt-delete" title="Deactivate {$v.amount}" onclick="javascript:deact_wallet_amount({$v.amount_id}, 0)"><span class="glyphicon glyphicon-off"></span></button></td>
                                    {else}
                                        <td><span class="label label-danger">Inactive</span></td>
                                        <td><button class="btn btn-success btn-xs dt-delete" title="Activate {$v.amount}" onclick="javascript:deact_wallet_amount({$v.amount_id}, 1)"><span class="glyphicon glyphicon-play-circle"></span></button></td>
                                    {/if}                                    
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
                        
                        {else}

                        <h4>Heads up! No Wallet Amounts Entered</h4>

                        {/if}

                        </div><!--.overflow-table-->

                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-12-->
        </div><!--.row-->

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}         
        <script src="{$plugin_path}jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
        <!-- END PLUGINS AREA -->

        <!-- PLUGINS INITIALIZATION AND SETTINGS -->
        <script src="{$js_path}/tables-datatables.js"></script>
        <!-- END PLUGINS INITIALIZATION AND SETTINGS -->
        
        <script src="{$js_path}/validate_wallet_amount.js"></script>
        <!-- BEGIN INITIALIZATION-->
        <script>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();
                TablesDataTables.init();                
            });
        </script>
        <!-- END INITIALIZATION-->
    </body>
</html>