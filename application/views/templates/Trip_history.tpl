<!DOCTYPE html>

{include file="header.tpl"  name=""}
<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$plugin_path}chosen/chosen.min.css">
<link rel="stylesheet" href="{$css_path}plugins.css">        
<!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}

<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3>Search Completed Trips</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered" method="post" onsubmit="return validateFormSelect()">
                    <input type="hidden" name="path_temp" id="path_temp" value="{$base_url}Trips/Trip_history/">

                    <div class="form-content">

                        <div class="form-group">
                            <label class="control-label col-md-3">User Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">                                
                                <select class="selecter" data-width="100%" name="user_type" id="user_type" class="selectpicker" data-live-search="true" >
                                    <option value='' {if $user_type == ''} selected {/if}>Select User Type</option>
                                    <option value='driver' {if $user_type == 'driver'} selected {/if}>Pilot</option>
                                    <option value='passenger' {if $user_type == 'passenger'} selected {/if}>Passenger</option>
                                </select>
                                <span id="error_user_type" style="color:red">{if isset($error['user_type'])} {$error['user_type']} {/if}</span>
                            </div>
                        </div><!--.form-group-->

                        <div class="form-group">
                            <label class="control-label col-md-3" id="selected_user_name">Name <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">
                                <select data-placeholder="Choose a User" class="chosen-select" id='user' name='user'>
                                {if isset($user_list)}
                                    {foreach from=$user_list item=v}
                                          <option value={$v.id} {if $user_id == $v.id} selected {/if}>{$v.name}</option>
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

{if isset($trip_status)}

    <div class="row">
        <div class="col-md-12">
            <div class="panel" style="font-size: small">
                <div class="panel-heading">
                    <div class="panel-title"><h3>{if $user_type=='driver'}Pilot :{else}Passenger :{/if}{$username}</h3></div>
                </div><!--.panel-heading-->
                {if count($trip_history) > 0}
                    <div class="panel-body">
                        <div class="overflow-table">
                            <table class="display datatables-basic dataTable">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>{if $user_type=='driver'}Passenger{else}Pilot{/if} Name</th>
                                        <th>Trip ID</th>                  
                                        <th>Trip From</th>                  
                                        <th>Trip To</th>                  
                                        <th>Distance Travelled</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Cab Type</th>
                                        <th>Travelled Time</th>
                                        <th>Initial Waiting</th>
                                        <th>On-Route Waiting</th>
                                        <th>Fare</th>                 
                                        <th>View Route</th>                 
                                    </tr>
                                </thead>
                                <tbody>                                
                                    {foreach from=$trip_history item=v}
                                        <tr>
                                    <form action="{$base_url}Trips/Root" method="post">
                                        <td>{counter}</td> 
                                        <td>
                                            {if $user_type=='driver'}
                                                <a href="{$base_url}Customer/Profile_view/{$v.passenger_id}" title="View Profile" target="_blank">
                                                {$v.passenger_name}
                                                </a>
                                            {else}
                                                <a href="{$base_url}Profile/Profile_view/{$v.driver_id}" title="View Profile" target="_blank">
                                                {$v.driver_name}
                                                </a>
                                            {/if}
                                        </td>
                                        <td><a href="{$base_url}Trips/Trip_list_view/{$v.id}" title="View Route" target="_blank">{$v.unique_id} </a></td>
                                        <td>{$v.trip_from} </td>
                                        <td>{$v.trip_to}</td>
                                        <td>{$v.total_distance} KM</td>
                                        <td>{$v.start_time}</td>
                                        <td>{$v.stop_time}</td>
                                        <td>{$v.cab_type}</td>
                                        <td>{*if $v.total_time!=0}
                                            {$hr= floor($v.total_time/60)}
                                            {$hr} Hr
                                            {$min=$v.total_time % 60}
                                            {$min} min
                                            {/if*}
                                            {$v.total_time} min
                                        </td>
                                        <td>{$v.initial_charged} min</td>
                                        <td>{$v.additional_charged} min</td>
                                        <td>{$v.total_fare}</td>
                                        <td><button class="btn btn-primary btn-xs dt-edit" title="View Route" type='submit' name='submit' value='submit'><span class="glyphicon glyphicon-fullscreen" ></span></button>
                                            <input type='hidden' name='id' value='{$v.id}'>
                                        </td>
                                    </form>
                                    </tr>
                                {/foreach}
                                </tbody>
                                <tfoot>                                       
                                    <tr style="text-align:left;font-size: 18px">
                                        <td colspan="14">
                                            <form method="post" action="{$base_url}Excel/Trip_history">
                                                <input type="hidden" name="user_tp" value="{$user_type}">
                                                <input type="hidden" name="user_id" value="{$user_id}">
                                                <button>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!--.overflow-table-->
                    </div><!--.panel-body-->
                {else}
                    <h4>There is no trip listed for this user!!</h4>
                {/if}

            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->

{/if}

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 

<!-- PLUGINS AREA -->
<script src="{$plugin_path}chosen/chosen.jquery.min.js"></script>
<script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PLUGINS AREA -->

<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}tables-datatables.js"></script>
<script src="{$js_path}trip.js"></script>
<script src="{$js_path}validate_search_trips.js"></script>
<!-- <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script> -->
<!-- END PLUGINS INITIALIZATION AND SETTINGS -->

<!-- BEGIN INITIALIZATION-->
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();
        FormsSelect.init();
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