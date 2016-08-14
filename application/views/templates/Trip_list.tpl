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
                    <div class="panel-title"><h3></h3></div>
                </div> --><!--.panel-heading-->               
                <div class="panel-body" style="font-size: small">
                        <div class="overflow-table">
                            <table class="display datatables-basic dataTable">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Trip Id</th>                  
                                        <th>Pilot</th>                  
                                        <th>Passenger</th>                  
                                        <th>Cab Type</th>                  
                                        <th>Trip From</th>   
                                        <th>Trip To</th>   
                                        <th>Start Time</th>      
                                        <th>End Time</th>      
                                        <th>Travelled Time</th>      
                                        <th>Initial Waiting</th>      
                                        <th>On-Route Waiting</th>      
                                        <th>Distance Travelled</th>      
                                        <th>Fare</th>       
                                        <th>View Route</th>                 
                                    </tr>
                                </thead>
                                <tbody>                                
                                    {foreach from=$trip_list item=v}
                                        <tr>
                                    
                                        <td>{counter}</td> 
                                        <!-- <td><a href="{$base_url}Location/Trip_details/{$v.id}">{$v.unique_id}</a></td> -->
                                        <td>
                                         <form action="{$base_url}Trips/Trip_list_view" method="post">
                                            <button type='submit' name='submit' title="View Route" value='submit' class="btn btn-flat btn-indigo btn-ripple btn-xs" style="font-size:13px">{$v.unique_id}</button>
                                        <input type='hidden' name='id' value='{$v.id}'>
                                        </form>
                                        </td>
                                        <td><a href="{$base_url}Profile/Profile_view/{$v.driver_id}" title="View Profile" target="_blank">{$v.driver_name}</a></td>
                                        <td><a href="{$base_url}Customer/Profile_view/{$v.passenger_id}" title="View Profile" target="_blank">{$v.passenger_name}</a></td>
                                        <td>{$v.cab_type}</td>
                                        <td>{$v.trip_from}</td>
                                        <td>{$v.trip_to}</td>
                                        <td>{$v.start_time}</td>
                                        <td>{$v.stop_time}</td>
                                        <td>{$v.total_time} min
                                            {*if $v.total_time != 0 }
                                            {$hr= floor($v.total_time/60)}
                                            {$hr} Hr
                                            {$min=$v.total_time % 60}
                                            {$min} min
                                            {/if*}
                                        </td>
                                        <td>{$v.initial_waiting} min</td>
                                        <td>{$v.additional_waiting} min</td>
                                        <td>{$v.total_distance} KM</td>
                                        <td>{$v.total_fare}</td>
                                        <td>
                                            <form action="{$base_url}Trips/Trip_list_view" method="post">
                                            <button class="btn btn-primary btn-xs dt-edit" title="View Route" type='submit' name='submit' value='submit'><span class="glyphicon glyphicon-fullscreen" ></span></button>
                                            <input type='hidden' name='id' value='{$v.id}'>
                                            </form>
                                        </td>
                                    </tr>
                                {/foreach}
                                </tbody>
                                <tfoot>                                       
                                    <tr style="text-align:left;font-size: 18px">
                                        <td colspan="15">
                                            <form method="post" action="{$base_url}Excel/Completed_trips"> 
                                                <button>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
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

<script src="{$js_path}/trip.js"></script>

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