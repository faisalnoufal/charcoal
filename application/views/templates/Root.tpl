
{include file="header.tpl"  name=""}
{include file="page_header.tpl"  name=""}

<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-7">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>GEOLOCATION</h4></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">
                        <div id="gmaps_4" class="example-map"></div>
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-6-->

            <div class="col-md-5">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"><h4>TRIP DETAILS</h4></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">
                        <div class="tab-content">

                            <div class="row">
                                <div class="col-md-4">Pilot</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$driver_name}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Passenger </div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$passenger_name}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Trip From</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_from}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Trip To</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$trip_to}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Distance</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$total_distance|string_format:"%.4f"} KM</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Start Time</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$start_time}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Stop Time</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$stop_time}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Time Taken</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$total_time} min
                                    {*if $total_time!=0}
                                        {$hr= floor($total_time/60)}
                                        {$hr} Hr
                                        {$min=$total_time % 60}
                                        {$min} min
                                    {/if*}
                                </div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Initial Wait.</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$initial_waiting} min</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Add. Wait.</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$additional_waiting} min</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Fare</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$total_fare|string_format:"%.3f"}</div><!--.col-md-9-->
                            </div><!--.row-->
                        </div><!--.tab-content-->
                    </div>

                </div><!--.panel-->
            </div><!--.col-md-6-->
        </div><!--.row-->
    </div><!--.col-md-6-->
</div>

{if isset($user_type) && isset($user)}
    <div>
        <form action='{$base_url}Trips/Trip_history' method='post'>
            <input type="hidden" value="{$user_type}" name="user_type">
            <input type="hidden" value="{$user}" name="user">
            <button type="submit" class="btn btn-blue" value="submit" name="submit"><span class="glyphicon glyphicon-circle-arrow-left" > Back</span></button>
        </form>

    </div>
{else}
    <div>
        <a href='{$base_url}Trips/Trip_history'>

            <button type="submit" class="btn btn-blue" value="submit" name="submit"><span class="glyphicon glyphicon-circle-arrow-left" > Back</span></button>
        </a>

    </div>
{/if}
{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}  
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="{$plugin_path}gmaps/gmaps.js"></script>
<!-- END PLUGINS AREA -->
<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}maps.js"></script>

<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        MapsGoogle.init({$markers});
    });
</script>
{include file="page_close.tpl"  name=""} 
