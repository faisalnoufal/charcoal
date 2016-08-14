<!DOCTYPE html>

{include file="header.tpl"  name=""}
<!-- BEGIN PLUGINS CSS -->

<link rel="stylesheet" href="{$css_path}plugins.css">        
<!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}

<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>GEOLOCATION</h4></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">
                        <div id="gmaps_4" class="example-map"></div>
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-6-->

            <div class="col-md-4" >
                <div class="panel" style="font-size: small">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>TRIP DETAILS</h4></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">
                        <div class="tab-content">

                            <div class="row">
                                <div class="col-md-4">Trip Id</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['unique_id']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Pilot</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['driver_name']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Passenger </div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['passenger_name']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Cab Type</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['cab_type']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Trip From</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['trip_from']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Trip To</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['trip_to']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Start Time</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['start_time']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Stop Time</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['stop_time']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Tot. Distance</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['total_distance']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Initial Wait.</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['initial_waiting']} min</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Add. Wait.</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['additional_waiting']} min</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Time Taken</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['total_time']} min
                                
                                {*if $trip_details['total_time'] != 0 }
                                    {$hr= floor($trip_details['total_time']/60)}
                                    {$hr} Hr
                                    {$min=$trip_details['total_time'] % 60}
                                    {$min} min
                                {/if*}
                                
                                </div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Total Fare</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_details['total_fare']}</div><!--.col-md-9-->
                            </div><!--.row-->

                        </div><!--.tab-content-->
                    </div>

                </div><!--.panel-->
            </div><!--.col-md-6-->
        </div><!--.row-->
    </div><!--.col-md-6-->
</div>
{if !isset($button_hide) }
<div>
    <a href='{$base_url}Trips/Trip_list'>
        <button type="button" class="btn btn-blue" >
        <span class="glyphicon glyphicon-circle-arrow-left" > Back</span></button>
    </a>
</div>
{/if}
{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 


<!-- END PLUGINS AREA -->



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
{*<script src="{$plugin_path}gmaps/gmaps.js"></script>*}
<!-- END PLUGINS AREA -->
<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}root_details.js"></script>

<!-- BEGIN INITIALIZATION-->
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        // TablesDataTables.init();
    {if $markers!=''}
        MapsGoogle.init({$markers});
    {/if}
    });
</script>
<!-- END INITIALIZATION-->
</body>
</html>