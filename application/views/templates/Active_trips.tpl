<!DOCTYPE html>

{include file="header.tpl"  name=""}
<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="{$plugin_path}chosen/chosen.min.css">
<link rel="stylesheet" href="{$css_path}plugins.css">
<!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}

<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3>Search Active Trips</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered" name="selectform" method="post" onsubmit="return validateFormActive()">
                  <input type="hidden" name="path_temp" id="path_temp" value="{$base_url}Trips/Active_trips/">

                    <div class="form-content">

                        <div class="form-group">
                            <label class="control-label col-md-3">User Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">                                
                                <select class="selecter" data-width="100%" name="user_type" id="user_type" class="selectpicker" data-live-search="true" >
                                    <option value='' {if $user_type == ''} selected {/if}>Select User Type</option>
                                    <option value='driver' {if $user_type == 'driver'} selected {/if}>Pilot</option>
                                    <option value='passenger' {if $user_type == 'passenger'} selected {/if}>Passenger</option>
                                </select>                                
                                <span id="error_user_type" style="color:red">{if isset($error['user_type'])}{$error['user_type']}{/if}</span>                                
                            </div>
                        </div><!--.form-group-->

                        <div class="form-group" id='user_div'>
                            <label class="control-label col-md-3" id="selected_user_name">Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">                                
                                <select data-placeholder="Choose a User" class="chosen-select" id='user' name='user'>
                                {if isset($user_list)}
                                    {foreach from=$user_list item=v}
                                          <option value={$v.id} {if $user == $v.id} selected {/if}>{$v.name}</option>
                                    {/foreach}
                                {/if}
                                </select>                                
                                <span id="error_user" style="color:red"></span>
                            </div>
                        </div><!--.form-group-->

                    </div><!--.form-content-->

                    <div class="form-buttons">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">                                
                                <button type="submit" class="btn btn-blue" value="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div><!--.panel-body-->
        </div><!--.panel-->

    </div><!--.col-md-12-->
</div><!--.row-->


{if isset($active_trip)}

    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-7">
                    <div class="panel" >
                        <div class="panel-heading">
                            <div class="panel-title"><h4>GEOLOCATION</h4></div>
                        </div><!--.panel-heading-->
                        <div class="panel-body">
                            <div id="gmaps_4" class="example-map"></div>
                        </div><!--.panel-body-->
                    </div><!--.panel-->
                </div><!--.col-md-6-->

                <div class="col-md-5">
                    <div class="panel" style="font-size: small">
                        <div class="panel-heading">
                            <div class="panel-title"><h4>TRIP DETAILS</h4></div>
                        </div><!--.panel-heading-->
                        <div class="panel-body">
                            <div class="tab-content">

                                <div class="row">
                                    <div class="col-md-4">Pilot</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7">{$active_trip['driver_name']}</div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Passenger </div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7">{$active_trip['passenger_name']}</div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Cab Type</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7">{$active_trip['cab_type']}</div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Trip From</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7">{$active_trip['trip_from']}</div><!--.col-md-9-->
                                </div><!--.row-->
                                <div class="row">
                                    <div class="col-md-4">Trip To</div><!--.col-md-3-->
                                    <div class="col-md-1">:</div><!--.col-md-3-->
                                    <div class="col-md-7"> 
                                        {if $active_trip['trip_to'] =='' }
                                        NA
                                        {else}
                                            {$active_trip['trip_to']}
                                        {/if}</div><!--.col-md-9-->
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
{elseif $flag == 'yes'}

    <div class="row">
        <div class="panel">

            <div class="panel-body">
                <div class="tab-content">
                    <div style="font-size:1.2em">Currently there is no active trip for {$username_select}</div><!--.col-md-3-->
                </div><!--.row-->
            </div><!--.row-->
        </div><!--.row-->
    </div><!--.row-->

{/if}


{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 

<!-- PLUGINS AREA -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="{$plugin_path}chosen/chosen.jquery.min.js"></script>
<script src="{$plugin_path}gmaps/gmaps.js"></script>
<!-- END PLUGINS AREA -->

<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}trip.js"></script>
<script src="{$js_path}maps.js"></script>
<script src="{$js_path}validate_search_trips.js"></script>
<!-- END PLUGINS INITIALIZATION AND SETTINGS -->

<!-- BEGIN INITIALIZATION-->
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        FormsSelect.init();
        
        {if $markers!=''}
            MapsGoogle.init({$markers});
        {/if}

    });

    var FormsSelect = {

        chosenSelect: function () {
            $('.chosen-select').chosen({
                width: '100%'
            });
        },
       
        init: function () {
            this.chosenSelect();          
        }
    }
</script>
<!-- END INITIALIZATION-->

</body>
</html>