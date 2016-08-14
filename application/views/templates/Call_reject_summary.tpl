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
                <div class="panel-title"><h3>Trip Request Rejects</h3></div>
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
                                    <th width="10%">All Calls</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$trip_list item=v}
                                    <tr>                                
                                    <td>{counter}</td> 
                                    <td>{$v.unique_id}</td>
                                    <td><a href="{$base_url}Profile/Profile_view/{$v.driver_id}" target="_blank">{$v.driver}</a></td>
                                    <td><a href="{$base_url}Customer/Profile_view/{$v.passenger_id}" target="_blank">{$v.passenger}</a></td>
                                    <td>{$v.count_drivers}</td>
                                    <td>
                                        {if $v.count_drivers > 0}
                                        <button class="label label-success" data-toggle="modal" onclick="javascript:view_users('{$v.unique_id}')" data-target="#panel-modal4">
                                        View Users
                                        </button>
                                        {else}
                                        No Users
                                        {/if}
                                    </td>
                                    </tr>
                                {/foreach}
                                <div class="modal fade full-height" id="panel-modal4" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Trip Rejected & Accepted User List</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><div id="content"></div></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-flat-primary" data-dismiss="modal">CLOSE</button>                                    
                                            </div>
                                        </div>
                                    </div>
                                </div><!--.modal-->
                            </tbody>
                        </table>
                    </div><!--.overflow-table-->
                </div><!--.panel-body-->
            {else}
                <h4>Currently there is no trip rejected calls !!</h4>
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
        <script src="{$js_path}/notifications.js"></script>

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