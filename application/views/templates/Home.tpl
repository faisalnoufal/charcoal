<!DOCTYPE html>

{include file="header.tpl"  name=""}  

{include file="page_header.tpl"  name=""}  

<div class="display-animation">

    <div class="row image-row">

        <div class="col-md-6">

            <div class="row image-row">
                <div class="col-sm-12">

                    <div class="card tile card-green card-weather bg-image sample-bg-image15 material-animate">
                        <div class="card-heading">
                            <div class="card-action">
                                <a href="javascript:;" data-toggle="fake-reload"></a>
                            </div><!--.card-action-->
                        </div><!--.card-heading-->
                        <div class="card-body">
                            <div class="forecast-container">
                                <span class="temparature">{$date_temp_arr['0']['frst_day_temp']} <i class="wi wi-celsius"></i></span>
                                   {* {if $date_temp_arr['0']['state_name']==""}
                                    <span class="place">{$date_temp_arr['0']['country_name']}</span>
                                {else}*}
                                    <span class="place">Riyadh,Saudi Arabia</span>
                               {* {/if}*}
                                {*<span class="forecast">Clear until tomorrow morning.</span>*}
                            </div>
                        </div><!--.card-body-->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li>{$date_temp_arr['0']['frst_day']}</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li>{number_format($date_temp_arr['0']['frst_day_temp'],2)}<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li>{$date_temp_arr['0']['scnd_day']}</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li>{number_format($date_temp_arr['0']['secd_day_temp'],2)}<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li>{$date_temp_arr['0']['thrd_day']}</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li>{number_format($date_temp_arr['0']['thrd_day_temp'],2)}<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li>{$date_temp_arr['0']['frth_day']}</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li>{number_format($date_temp_arr['0']['frth_day_temp'],2)}<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li>{$date_temp_arr['0']['fifth_day']}</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li>{number_format($date_temp_arr['0']['fifth_day_temp'],2)}<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li>{$date_temp_arr['0']['sixth_day']}</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li>{number_format($date_temp_arr['0']['sixth_day_temp'],2)}<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                            </div><!--.row-->
                        </div><!--.card-footer-->
                    </div><!--.card-->

                </div><!--.col-->
                <!--.col-->
            </div><!--.row-->
        </div><!--.col-->

        <div class="col-md-6">

            <div class="card tile card-dashboard-info card-light-blue material-animate">
                <div class="card-body">
                    <div class="card-icon"><i class="fa fa-bus"></i></div><!--.card-icon-->
                    <h4>Booked Trips</h4>
                    <p class="result" id="trip_today"><a href="{$base_url}Trips/Todays_bookings">{$trips_today} booking{if $trips_today > 1}s{/if} today</a></p>
                    <small id="trip_total"><i class="fa fa-caret-up"></i> {$trips} booking{if $trips > 1}s{/if} total</small>
                </div>
            </div><!--.card-->

            <div class="card tile card-dashboard-info card-blue-grey material-animate">
                <div class="card-body">
                    <div class="card-icon"><i class="fa fa-trash"></i></div><!--.card-icon-->
                    <h4>Cancelled Trips</h4>
                    <p class="result" id="cancelled_today"><a href="{$base_url}Trips/Cancelled_trips">{$cancelled_today} cancelled trip{if $cancelled_today > 1}s{/if} today</a></p>
                    <small id="cancelled_total"><i class="fa fa-caret-up"></i> {$cancelled} cancelled trip{if $cancelled > 1}s{/if} total</small>
                </div>
            </div><!--.card-->

            <div class="card tile card-dashboard-info card-teal material-animate">
                <div class="card-body">
                    <div class="card-icon"><i class="glyphicon glyphicon-user"></i></div><!--.card-icon-->
                    <h4>Online users</h4>
                    <p class="result" id="online_passenger_today"><a href="{$base_url}Customer/Online_users">
                    {$online['passenger']} passenger{if $online['passenger'] > 1}s{/if} online</a></p>
                    <p class="result" id="online_driver_today"><a href="{$base_url}Drivers/Online_users">
                    {$online['driver']} pilot{if $online['driver'] > 1}s{/if} online</a></p>
                    <small id="passenger_driver_total"><i class="fa fa-caret-up"></i> 
                    {$user['driver']} pilot{if $user['driver'] > 1}s{/if} and {$user['passenger']} passenger{if $user['passenger'] > 1}s{/if} total
                    </small>
                </div>
            </div><!--.card-->

        </div>

        <style type="text/css">

            #data-table {
                font-family: calibri, arial;
                width: 100%;
            }

            #data-table thead td {
                font-weight: bold;
                background-color: #337ab7;
                // background-color: #8CCCF1;
            }

            #data-table td {
                // border: 1px solid #466E85;
                width: 25%;
                padding: 10px;
            }

        </style>


        <input type="hidden" name="last_trp_id" id="last_trp_id" {if isset($rejects)} value="{$rejects['reject_id']}" {/if}>
        <!-- <div id='not_div'></div> -->

    </div><!--.col-->

</div><!--.display-animation-->
{include file="Show_drivers.tpl"  name=""} 

<div class="row">
<div class="col-md-12">
    <div class="card card-pricing card-pricing-dark active">

        <div class="card-heading">
            <h4>Rejected Trips- <small>Recently rejected trip details</small></h4>

        </div><!--.card-heading-->

        <div class="card-body col-centered">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-body">
                        <table id="data-table"></table>
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div>
        </div><!--.card-body-->
    </div><!--.card-->
</div><!--.col-md-3-->
</div>


<!--.display-animation-->
<!-- <script src="{$plugin_path}html5-desktop-notifications/desktop-notify.js"></script>

<script src="{$js_path}html5-notifications.js"></script> -->
<script src="{$js_path}arrival_notification.js"></script>
<script src="{$js_path}home.js"></script>

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}  

<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        ArrivalNotification.init();
        // Html5Notifications.init();        
        setInterval(call_init, 30000);
    });
</script>
{include file="page_close.tpl"  name=""} 
