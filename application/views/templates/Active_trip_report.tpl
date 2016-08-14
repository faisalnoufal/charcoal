<!DOCTYPE html>

{include file="header.tpl"  name=""}
<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">   

<!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}



        {if isset($trip_details)}

            <div class="row">
                <div class="col-md-12">
                    <div class="panel" style="font-size: small">
                        <!-- <div class="panel-heading">
                            <div class="panel-title"><h4>Active Trip Report</h4></div>
                        </div> --><!--.panel-heading-->
                        <div class="panel-body">
                            <div class="overflow-table">
                                <table class="display datatables-basic dataTable">
                                    <thead>
                                        <tr>
                                            <th width="4%">Sl.No</th>
                                            <th width="8%">Trip ID</th>
                                            <th width="15%">Pilot</th>
                                            <th width="15%">Passenger</th>
                                            <th width="8%">Cab Type</th>
                                            <th width="20%">Trip From</th>  
                                            <th width="15%">Trip To</th>  
                                            <th width="15%">Start Time</th>   
                                        </tr>
                                    </thead>
                                    <tbody>                                
                                        {foreach from=$trip_details item=v}
                                            <tr>
                                                <td>{counter}</td> 
                                                <td><a href="{$base_url}Trips/Ongoing_root/{$v.id}" title="View Trip Details" target="_blank">{$v.unique_id}</a></td> 
                                                <td><a href="{$base_url}Profile/Profile_view/{$v.driver_id}" title="View Pilot Profile" target="_blank">{$v.driver_name}</a></td>
                                                <td><a href="{$base_url}Customer/Profile_view/{$v.passenger_id}" title="View Passenger Profile" target="_blank">{$v.passenger_name}</a></td>
                                                <td>{$v.cab_type} </td>
                                                <td>{$v.trip_from} </td>
                                                <td>{if $v.trip_to == ''}NA{else}{$v.trip_to}{/if} </td>
                                                <td>{$v.start_time}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>

                                    <tfoot>                                       
                                        <tr style="text-align:left;font-size: 18px">
                                            <td colspan="8">
                                                <form method="post" action="{$base_url}Excel/Active_Trip_report">                                              
                                                    <button>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div><!--.overflow-table-->

                        </div><!--.panel-->
                    </div><!--.col-md-12-->
                </div><!--.row-->
            </div><!--.row-->

        {/if}

   

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