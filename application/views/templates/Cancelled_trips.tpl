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
                <div class="panel-title"><h3>Cancelled Trips</h3></div>
            </div> --><!--.panel-heading-->
            {if isset($trip_list)}
                <div class="panel-body">
                    <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th width="05%">Sl.No</th>
                                    <th width="08%">Trip Id</th>                  
                                    <th width="10%">Pilot</th>                  
                                    <th width="10%">Passenger</th>                  
                                    <th width="20%">Trip From</th>     
                                    <th width="20%">Trip To</th>
                                    <th width="10%">Cancelled by</th>
                                    {*<!-- <th width="10%">Stop Time</th> -->*}
                                    <th width="17%">Reason</th>                 
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$trip_list item=v}
                                    <tr>                                
                                    <td>{counter}</td> 
                                    <td>{$v.unique_id}</td>
                                    <td><a href="{$base_url}Profile/Profile_view/{$v.driver_id}" target="_blank">{$v.driver}</a></td>
                                    <td><a href="{$base_url}Customer/Profile_view/{$v.passenger_id}" target="_blank">{$v.passenger}</a></td>
                                    <td>{$v.trip_from}</td>                                   
                                    <td>{$v.trip_to}</td>
                                    <td>{$v.cancelled_by}</td>
                                    {*<!-- <td>{$v.stop_time}</td> -->*}
                                    <td>{$v.reason}</td>                                        
                                    </tr>
                                {/foreach}
                            </tbody>

                            <tfoot>                                       
                                <tr style="text-align:left;font-size: 18px">
                                    <td colspan="8">
                                        <form method="post" action="{$base_url}Excel/All_cancelled_trips">                                            
                                            <button>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>

                        </table>
                    </div><!--.overflow-table-->
                </div><!--.panel-body-->
            {else}
                <h4>Currently there is no cancelled trips !!</h4>
                {/if}

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