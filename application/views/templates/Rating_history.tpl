<!DOCTYPE html>

{include file="header.tpl"  name=""}
        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
        <link rel="stylesheet" href="{$css_path}plugins.css">        
        <link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}
       
        
    {if count($rating) > 0}

        <div class="row">
            <div class="col-md-12">
                <div class="panel" style="font-size: small">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"><h4>{if $user_type == 'pilot'}{strtoupper($rating[0]['drivername'])}{else}{strtoupper($rating[0]['passengername'])}{/if} Rating History</h4></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">
                        <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>                                    
                                    <th>Rated {if $user_type == 'pilot'}Passenger{else}Pilot{/if}</th>
                                    <th>Rating</th>
                                    <th>Trip ID</th>
                                    <th>Rated Date</th>
                                    <th>Comment</th>                                    
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$rating item=v}
                                <tr>
                                    <td>{counter}</td>
                                    
                                    {if $user_type == 'pilot'}
                                        <td><a href="{$base_url}Customer/Profile_view/{$v.rated_by}" target="_blank">{$v.passengername}</a></td>
                                    {else}
                                        <td><a href="{$base_url}Profile/Profile_view/{$v.rated_by}" target="_blank">{$v.drivername}</a></td>
                                    {/if}
                                    
                                    <td>{$v.rate|string_format:"%.2f"}</td>
                                    <td>{$v.unique_id}</td>
                                    <td>{$v.date}</td>
                                    <td>{$v.comment}</td>                 
                                </tr>
                                {/foreach}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th>{$rating[0]['total_rating']|string_format:"%.2f"}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                        </div><!--.overflow-table-->
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-12-->
        </div><!--.row-->

    {else}
        <h2> There is no rating history found for the user! </h2>
    {/if}

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 
        <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>            
        <script src="{$js_path}validate_Cab_Management.js"></script>
        <script src="{$plugin_path}jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
        <!-- END PLUGINS AREA -->

        <!-- PLUGINS INITIALIZATION AND SETTINGS -->
        <script src="{$js_path}/tables-datatables.js"></script>
        <!-- END PLUGINS INITIALIZATION AND SETTINGS -->
        
        <script src="{$js_path}/rating.js"></script>        
        <script src="{$plugin_path}/parsleyjs/dist/parsley.min.js"></script>
        <script src="{$js_path}/validate_Cab_Management.js"></script>

        <!-- BEGIN INITIALIZATION-->
        <script>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();
                TablesDataTables.init();
                FormsValidationsParsley.init();       
            });
        </script>
        <!-- END INITIALIZATION-->
    </body>
</html>