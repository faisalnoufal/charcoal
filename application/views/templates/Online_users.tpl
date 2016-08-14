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
            <div class="panel-heading">
                <div class="panel-title"><h3>Online {ucwords($user_type)}</h3></div>
            </div><!--.panel-heading-->
            {if isset($user_list)}
                <div class="panel-body">
                    <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th width="05%">Sl.No</th>
                                    <th width="15%">Username</th>
                                    <th width="20%">Fullname</th>
                                    <th width="15%">Mobile</th>
                                    <th width="20%">Email</th>
                                    <th width="10%">Status</th>
                                    <th width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$user_list item=v}
                                    <tr>                                
                                    <td>{counter}</td>
                                    {if $user_type == 'pilot'}
                                        <td><a href="{$base_url}Profile/Profile_view/{$v.id}" target="_blank">{$v.user_name}</a></td>
                                        <td><a href="{$base_url}Profile/Profile_view/{$v.id}" target="_blank">{$v.fullname}</a></td>
                                    {else}
                                        <td><a href="{$base_url}Customer/Profile_view/{$v.id}" target="_blank">{$v.user_name}</a></td>
                                        <td><a href="{$base_url}Customer/Profile_view/{$v.id}" target="_blank">{$v.fullname}</a></td>
                                    {/if}
                                    <td>{$v.mobile}</td>
                                    <td>{$v.email}</td>
                                    <td>{$v.status}</td>
                                    {if $user_type == 'pilot'}
                                        <td><a href="{$base_url}Location/Driver_location/{$v.id}"class="btn btn-flat btn-primary btn-xs">View Location</a></td>
                                    {else}
                                        <td><a href="{$base_url}Location/passenger_location/{$v.id}"class="btn btn-flat btn-primary btn-xs">View Location</a></td>
                                    {/if}
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div><!--.overflow-table-->
                </div><!--.panel-body-->
            {else}
            <h4>Currently there is no online {$user_type} !!</h4>
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