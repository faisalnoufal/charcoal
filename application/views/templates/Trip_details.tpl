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
                                <div class="col-md-7">{$active_trip['unique_id']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Driver</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$active_trip['driver_name']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Cab Type</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$active_trip['cab_type']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Passenger </div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$active_trip['passenger_name']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Trip From</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$active_trip['trip_from']}</div><!--.col-md-9-->
                            </div><!--.row-->
                            <div class="row">
                                <div class="col-md-4">Start Time</div><!--.col-md-3-->
                                <div class="col-md-1">:</div><!--.col-md-3-->
                                <div class="col-md-7">{$active_trip['start_time']}</div><!--.col-md-9-->
                            </div><!--.row-->

                        </div><!--.tab-content-->
                    </div>

                </div><!--.panel-->
            </div><!--.col-md-6-->
        </div><!--.row-->
    </div><!--.col-md-6-->
</div>
<div>
    <a href='{$base_url}Home'>
        <button type="button" class="btn btn-blue" >
        <span class="glyphicon glyphicon-circle-arrow-left" > Back</span></button>
    </a>
</div>

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 


<!-- END PLUGINS AREA -->



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
{*<script src="{$plugin_path}gmaps/gmaps.js"></script>*}
<!-- END PLUGINS AREA -->
<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}trip_details.js"></script>

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