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
                    <div class="panel" style="font-size: small">
                        <!-- <div class="panel-heading">
                            <div class="panel-title"><h4>Pilot Report</h4></div>
                        </div> --><!--.panel-heading-->
                        <div class="panel-body">
                            <div class="overflow-table">
                                <table class="display datatables-basic dataTable">
                                    <thead>
                                        <tr>
                                            <th width="3%">Sl.No</th>
                                            <th width="9%">Pilot</th>
                                            <th width="7%">Nationality</th>
                                            <th width="9%">Email</th>  
                                            <th width="9%">Address</th>  
                                            <th width="7%">Mobile</th>  
                                            <th width="7%">Licence</th>  
                                            <th width="7%">Cab Type</th>  
                                            <th width="7%">Cab Model</th>  
                                            <th width="7%">Cab Number</th>  
                                            <th width="7%">Bank Name</th>  
                                            <th width="7%">A/c Number</th>   
                                            <th width="7%">Branch Code</th>   
                                            <th width="7%">Swift Code</th>   
                                        </tr>
                                    </thead>
                                    <tbody>                                
                                        {foreach from=$driver_details item=v}
                                            <tr>

                                                <td>{counter}</td> 
                                                <td><a href="{$base_url}Profile/Profile_view/{$v.user_id}" target="_blank">{$v.first_name} {$v.last_name}</a></td>
                                                <td>{$v.nationality}</td>
                                                <td>{$v.email}</td>
                                                <td>{$v.address1}<br/>
                                                    {$v.address2}<br/>
                                                    {$v.address3}
                                                </td>
                                                <td>{$v.mobile1}</td>
                                                <td>{$v.licence}</td>
                                                <td>{$v.cab_type}</td>
                                                <td>{$v.cab_model}</td>
                                                <td>{$v.cab_number}</td>
                                                <td>{$v.bank_name}</td>
                                                <td>{$v.acc_number}</td>
                                                <td>{$v.branch_code}</td>
                                                <td>{$v.swift_code}</td>

                                            </tr>
                                        {/foreach}
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align:left;font-size: 18px"><td colspan="14"><a href={$base_url}excel/driver_report_excel>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></a></td></tr>
                                    </tfoot>
                                </table>
                            </div><!--.overflow-table-->

                        </div><!--.panel-->
                    </div><!--.col-md-12-->
                </div><!--.row-->
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