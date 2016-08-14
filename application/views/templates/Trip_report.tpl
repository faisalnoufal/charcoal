<!DOCTYPE html>

{include file="header.tpl"  name=""}
<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">   

<link rel="stylesheet" href="{$plugin_path}bootstrap-daterangepicker/daterangepicker-bs3.css">

<!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}

<div class="row" >
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3>Trip Report</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">

                    <div class="form-content">

                        <div class="form-group">
                            <label class="control-label col-md-3">Select From-To Dates</label>
                            <div class="col-md-5">

                                <div class="input-wrapper">

                                    <input type="text" style="width:80%" name="reservation" id="reservationtime" class="form-control btn bootstrap-daterangepicker-dropdown" placeholder="mm/dd/yyyy - mm/dd/yyyy" data-parsley-error-message="Please Select Date" required=""/>
                                    {*<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>*}

                                </div>
                                {if isset($error['reservation'])}
                                    <span style="color:red">{$error['reservation']}</span>
                                {/if}

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

        {if isset($trip_history)}

            <div class="row">
                <div class="col-md-12">
                    <div class="panel" style="font-size: small">
                        <div class="panel-heading">
                            <div class="panel-title"><h4>Trip History Report ({$from_to_date})</h4></div>
                        </div><!--.panel-heading-->
                        <div class="panel-body">
                            <div class="overflow-table">
                                <table class="display datatables-basic dataTable">
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Trip ID</th>
                                            <th>Pilot</th>
                                            <th>Pasenger</th>
                                            <th>Cab Type</th>
                                            <th>Trip From</th>                  
                                            <th>Trip To</th>                  
                                            <th>Start Time</th>                  
                                            <th>End Time</th>                  
                                            <th>Distance Travelled</th>                                            
                                            <th>Travelled Time</th>
                                            <th>Initial Waiting</th>
                                            <th>On-Route Waiting</th>                                        
                                            <th>Fare</th>                 
                                        </tr>
                                    </thead>
                                    <tbody>                                
                                        {foreach from=$trip_history item=v}
                                            <tr>

                                                <td>{counter}</td> 
                                                <td><a href="{$base_url}Trips/Trip_list_view/{$v.id}" target="_blank">{$v.unique_id}</a></td> 
                                                <td><a href="{$base_url}Profile/Profile_view/{$v.driver_id}" target="_blank">{$v.driver_name}</a></td>
                                                <td><a href="{$base_url}Customer/Profile_view/{$v.passenger_id}" target="_blank">{$v.passenger_name}</a></td>
                                                <td>{$v.cab_type} </td>
                                                <td>{$v.trip_from} </td>
                                                <td>{$v.trip_to}</td>
                                                <td>{$v.start_time}</td>
                                                <td>{$v.stop_time}</td>
                                                <td>{$v.total_distance} KM</td>
                                                <td>{$v.total_time} min
                                                    {*if $v.total_time !=0}
                                                    {$hr= floor($v.total_time/60)}
                                                    {$hr} Hr
                                                    {$min=$v.total_time % 60}
                                                    {$min} min
                                                    {/if*}
                                                </td>
                                                <td>{$v.initial_charged} min</td>
                                                <td>{$v.additional_charged} min</td>
                                                <td>{$v.total_fare}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>

                                    <tfoot>                                       
                                        <tr style="text-align:left;font-size: 18px">
                                            <td colspan="14">
                                                <form method="post" action="{$base_url}Excel/Trip_report">                                                    
                                                    <input type="hidden" name="from_to_date" value="{$from_to_date}">
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

    </div><!--.col-md-12-->
</div><!--.row-->

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 

<script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>

<script src="{$plugin_path}bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- END PLUGINS AREA -->

<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}tables-datatables.js"></script>
<!-- END PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
{* <script src="{$js_path}forms-validations-parsley.js"></script>*}
<script src="{$js_path}validate_Cab_Management.js"></script>
<!-- BEGIN INITIALIZATION-->
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();
         FormsValidationsParsley.init();
        $('#reservationtime').daterangepicker({
        }, function (start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    });
</script>
<!-- END INITIALIZATION-->
</body>
</html>