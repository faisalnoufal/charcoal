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
                <div class="panel-title"><h3>Income Report</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">
                    <div class="form-content">

                         <div class="form-group">
                            <label class="control-label col-md-3">Select Pilot</label>
                            <div class="col-md-5">
                                <div class="input-wrapper">
                                    <select class="selecter" data-width="100%" name="user_name" id="user_name" class="select" data-width="100%" class="selectpicker" data-live-search="true" >
                                        <option value="" >--SELECT--</option>
                                        {foreach from=$user_details item="v"}                                            
                                            <option value={$v.user_id} >{$v.fullname}</option>
                                        {/foreach}
                                    </select>
                                </div>                               
                            </div>                           
                        </div><!--.form-group-->

                         <div class="form-group">
                            <label class="control-label col-md-3">Select From-To Dates</label>
                            <div class="col-md-5">
                                <div class="input-wrapper">
                                    <input type="text" style="width:80%" name="period" id="period" class="form-control btn bootstrap-daterangepicker-dropdown" placeholder="mm/dd/yyyy - mm/dd/yyyy" />
                                </div>                                
                            </div>
                        </div><!--.form-group  -->
                       
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

        {if isset($income_details)}

            <div class="row">
                <div class="col-md-12">
                    <div class="panel" style="font-size: small">
                        <!-- <div class="panel-heading">
                            <div class="panel-title"><h4>Income Report</h4></div>
                        </div> --><!--.panel-heading-->
                        <div class="panel-body">
                            <!-- <input type="button" id="btnExport" value=" Export Table data into Excel " />
                            
                            <div id="dvData" hidden="true">
                                <table>                                    
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Pilot</th>
                                        <th>Trip ID</th>
                                        <th>Pasenger</th>                                            
                                        <th>Trip From</th>                  
                                        <th>Trip To</th>                  
                                        <th>Start Time</th>                  
                                        <th>Total Time</th>                  
                                        <th>Total Fare</th>
                                        <th>Paid Status</th>
                                        <th>Pilot Wage</th>                 
                                    </tr>
                                        {assign var=total_commission value=0}
                                        {assign var=total_fare value=0}
                                        {assign var=i value=0}
                                        {foreach from=$income_details item=v}
                                            {$total_fare = $total_fare + $v.total_fare}
                                            {$total_commission = $total_commission + $v.driver_commission}
                                            {$i = $i + 1}
                                            <tr>
                                                <td>{$i}</td> 
                                                <td>{$v.driver}</td>   
                                                <td>{$v.unique_id}</td> 
                                                <td>{$v.passenger}</td>
                                                <td>{$v.trip_from}</td>
                                                <td>{$v.trip_to}</td>
                                                <td>{$v.start_time}</td>
                                                <td>{$v.total_time}</td>
                                                <td>{$v.total_fare}</td>
                                                <td>{ucwords($v.paid_status)}</td>
                                                <td>{$v.driver_commission}</td>
                                            </tr>
                                        {/foreach}                                    
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>{$total_fare}</b></td>
                                        <td></td>
                                        <td><b>{$total_commission}</b></td>
                                    </tr>                                    
                                </table>
                            </div> -->

                            <div class="overflow-table">
                                <table class="display datatables-basic dataTable"> <!-- table2excel -->
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Pilot</th>
                                            <th>Trip ID</th>
                                            <th>Passenger</th>                                            
                                            <th>Cab Type</th>                                            
                                            <th>Trip From</th>                  
                                            <th>Trip To</th>                  
                                            <th>Start Time</th>                  
                                            <th width="5%">Total Time</th>                  
                                            <!-- <th>Initial Waiting</th> -->
                                            <!-- <th>On-Route Waiting</th> -->
                                            <th>Total Fare</th>
                                            <th>Paid Status</th>
                                            <th>Pilot Wage</th>                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {assign var=total_commission value=0}
                                        {assign var=total_fare value=0}
                                        {foreach from=$income_details item=v}
                                            {$total_fare = $total_fare + $v.total_fare}
                                            {$total_commission = $total_commission + $v.driver_commission}
                                            <tr>
                                                <td>{counter}</td> 
                                                <td><a href="{$base_url}Profile/Profile_view/{$v.driver_id}" title="View Pilot Profile" target="_blank">{$v.driver}</a></td>   
                                                <td><a href="{$base_url}Trips/Trip_list_view/{$v.id}" title="View Trip Details" target="_blank">{$v.unique_id}</a></td> 
                                                <td><a href="{$base_url}Customer/Profile_view/{$v.passenger_id}" title="View Passenger Profile" target="_blank">{$v.passenger}</a></td>
                                                <td>{$v.cabtype}</td>
                                                <td>{$v.trip_from}</td>
                                                <td>{$v.trip_to}</td>
                                                <td>{$v.start_time}</td>
                                                <td>{$v.total_time} min</td>
                                                <!-- <td>{$v.initial_charged_time}</td> -->
                                                <!-- <td>{$v.additional_charged_time}</td> -->
                                                <td>{$v.total_fare}</td>
                                                <td>{ucwords($v.paid_status)}</td>
                                                <td>{$v.driver_commission}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>{$total_fare}</b></td>
                                            <td></td>
                                            <td><b>{$total_commission}</b></td>
                                        </tr>
                                        <tr style="text-align:left;font-size: 18px">
                                            <td colspan="12">
                                                <form method="post" action="{$base_url}Excel/Income_report">
                                                    <input type="hidden" name="driver_id" value="{$driver_id}">
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
<script src="{$js_path}validate_Cab_Management.js"></script>
<script src="{$plugin_path}table2excel/src/jquery.table2excel.js"></script>
<!-- BEGIN INITIALIZATION-->
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();
        $('#period').daterangepicker({
        }, function (start, end, label) {
            // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });

        // $(".table2excel").table2excel({
        //     exclude: ".noExl",
        //     name: "Income Report",
        //     filename: "income_report",
        //     exclude_img: true,
        //     exclude_links: true,
        //     exclude_inputs: true
        // });

        // $("#btnExport").click(function (e) {
        //     window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()));
        //     e.preventDefault();
        // });        
    });
</script>
<!-- END INITIALIZATION-->
</body>
</html>