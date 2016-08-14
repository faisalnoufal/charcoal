<!DOCTYPE html>

{include file="header.tpl"  name=""}
        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
        <link rel="stylesheet" href="{$css_path}plugins.css">        
        <link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}
       
        

        <div class="row">
            <div class="col-md-12">
                <div class="panel" style="font-size: small">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"><h4>Pilot Ratings</h4></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">
                        <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Name</th>
                                    <th>Total Trips</th>
                                    <th>Rating</th>
                                    <th>Status</th>                                    
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$rating item=v}
                                <tr>
                                    <td>{counter}</td>
                                    <td><a href="{$base_url}Profile/Profile_view/{$v.user_id}" target="_blank">{$v.first_name} {$v.last_name}</a></td>
                                    <td>{$v.total_trip}</td>
                                    <td><a href="{$base_url}Profile/Rating_history/{$v.user_id}" target="_blank">{$v.rating|string_format:"%.2f"}</a></td>
                                    <td>
                                         {if $v.status == 'yes'}
                                         Active
                                         {else}
                                         Deactive
                                         {/if}                                        
                                    </td>                                                                       
                                </tr>
                                {/foreach}
                            </tbody>

                            <tfoot>     
                                <tr style="text-align:left;font-size: 18px">
                                    <td colspan="5">
                                        <form method="post" action="{$base_url}Excel/Driver_rating">
                                            <button>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>

                        </table>

                        </div><!--.overflow-table-->
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div><!--.col-md-12-->
        </div><!--.row-->

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 
        <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
            {* <script src="{$js_path}forms-validations-parsley.js"></script>*}
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