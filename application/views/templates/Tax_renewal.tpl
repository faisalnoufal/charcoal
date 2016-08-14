<!DOCTYPE html>

{include file="header.tpl"  name=""}
        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
        <link rel="stylesheet" href="{$css_path}plugins.css">        
        <link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="{$plugin_path}bootstrap-daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="{$plugin_path}eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}

        <div class="row">
            <div class="col-md-12">
                <div class="panel" style="font-size: small">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"><h4>Tax Renewal</h4></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">
                        <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th style="width:5%">Sl.No</th>
                                    <th style="width:12%">Pilot</th>
                                    <th style="width:11%">Email</th>
                                    <th style="width:10%">Mobile</th>
                                    <th style="width:11%">Cab Number</th>
                                    <th style="width:11%">Cab Name</th>
                                    <th style="width:11%">Cab Model</th>
                                    <th style="width:11%">Total Trip</th>
                                    <th style="width:15%">Tax Renewal Date</th>
                                    {*<th style="width:10%">Deactivate/Activate</th>*}
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$user_list item=v}
                                <tr>
                                    <td>{counter}</td>
                                    <td><a href="{$base_url}Profile/Profile_view/{$v.user_id}" target="_blank">{$v.fullname}</a></td>
                                    <td>{$v.email}</td>
                                    <td>{$v.mobile1}</td>
                                    <td>{$v.cab_number}</td>
                                    <td>{$v.cab_name}</td>
                                    <td>{$v.cab_model}</td>
                                    <td>{$v.total_trip}</td>
                                    <td>
                                        
                                   <div class="control-group">
                                        <div class="controls">
                                            <div class="input-group">
                                                
                                                <div class="inputer">
                                                    <div class="input-wrapper">
                                                        <input type="text" style="font-size: small" name="tax_renew_date"  id="tax_renew_date{$v.user_id}" class="form-control bootstrap-daterangepicker-basic" data-parsley-error-message="Please Enter Your Tax Renewal Date" value="{$v.tax_renew_date}" onchange="javascript:change_tax_renewal_date({$v.user_id});" required/>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                                    
                                                    
                                    </td>
                                   
                                    {*if $v.status == 0 }
                                      
                                        <td><button class="btn btn-danger btn-xs dt-delete" title="Deactivate {$v.fullname}" onclick="javascript:deactive_customer({$v.user_id})"><span class="glyphicon glyphicon-remove"></span></button></td>
                                    {else}
                                      
                                        <td><button class="btn btn-blue btn-xs badge-blue" title="Activate {$v.fullname}" onclick="javascript:active_customer({$v.user_id})"><span class="glyphicon glyphicon-ok"></span></button></td>
                                    {/if*}                                    
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>

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
        <script src="{$js_path}tables-datatables.js"></script>
        <!-- END PLUGINS INITIALIZATION AND SETTINGS -->
        <script src="{$plugin_path}bootstrap-daterangepicker/daterangepicker.js"></script>
        
        <script src="{$js_path}tax_renewal.js"></script>        
        <!-- BEGIN INITIALIZATION-->
        <script>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();
                FormsPickers.init();
                TablesDataTables.init();
                FormsValidationsParsley.init();       
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
    </body>
</html>