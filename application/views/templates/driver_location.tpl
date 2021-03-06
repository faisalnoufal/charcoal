
{include file="header.tpl"  name=""}
{include file="page_header.tpl"  name=""}

<input type='hidden' name='driver' id='driver' value='{$driver_id}'>
<input type='hidden' name='driver_array' id='driver_array' value='{json_encode($driver_array)}'>
<input type="hidden" name="path_root" id="path_root" value="{$base_url}">

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
                <div class="panel-title"><h4>PILOT DETAILS</h4></div>
            </div><!--.panel-heading-->
            {foreach from=$driver_array item=driver}
            
            <div class="panel-body">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-md-5">Driver</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6">{$driver['current_loc']['fullname']}</div><!--.col-md-9-->
                    </div><!--.row-->
                    <div class="row">
                        <div class="col-md-5">Status</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6">{$driver['current_loc']['status_text']}</div><!--.col-md-9-->
                    </div><!--.row-->
                    <div class="row">
                        <div class="col-md-5">Cab Model</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6">{$driver['current_loc']['cab_model']}</div><!--.col-md-9-->
                    </div><!--.row-->
                    <div class="row">
                        <div class="col-md-5">Cab Number</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6">{$driver['current_loc']['cab_number']}</div><!--.col-md-9-->
                    </div><!--.row-->
                    <div class="row">
                        <div class="col-md-5">Mobile</div><!--.col-md-3-->
                        <div class="col-md-1">:</div><!--.col-md-3-->
                        <div class="col-md-6">{$driver['current_loc']['mobile1']}</div><!--.col-md-9-->
                    </div><!--.row-->
                    {if $driver['running'] != 0}
                        <div class="row">
                            <div class="col-md-5">Trip From </div><!--.col-md-3-->
                            <div class="col-md-1">:</div><!--.col-md-3-->
                            <div class="col-md-6">{$driver['running']['trip_from']}</div><!--.col-md-9-->
                        </div><!--.row-->
                        <div class="row">
                            <div class="col-md-5">Trip To</div><!--.col-md-3-->
                            <div class="col-md-1">:</div><!--.col-md-3-->
                            <div class="col-md-6">{$driver['running']['trip_to']}</div><!--.col-md-9-->
                        </div><!--.row-->
                        <div class="row">
                            <div class="col-md-5">Passenger</div><!--.col-md-3-->
                            <div class="col-md-1">:</div><!--.col-md-3-->
                            <div class="col-md-6">{$driver['running']['fullname']}</div><!--.col-md-9-->
                        </div><!--.row-->
                    {/if}
                </div><!--.tab-content-->
            </div>
            {/foreach}
        </div><!--.panel-->
    </div><!--.col-md-6-->
</div>
{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}  
<!-- {if $driver_id == ''} -->
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=true&amp;libraries=weather,traffic"></script> -->
<!-- {else} -->
    <script src="http://maps.google.com/maps/api/js?sensor=false;libraries=weather,traffic"></script>
<!-- {/if} -->
<script src="{$plugin_path}gmaps/gmaps.js"></script>
<!-- END PLUGINS AREA -->
<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}maps-google.js"></script>


<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        MapsGoogle.init();

        setInterval(reload_javascript_location, 10000);
    });
</script>
{include file="page_close.tpl"  name=""} 
