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
                <div class="panel-title"> <h3>Archive/Unarchive {$user_type}</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <input type="hidden" name="path_root" id="path_root" value="{$base_url}">                
                <input type="hidden" name="user_type" id="user_type" value="{$user_type}">                
                <div class="overflow-table">   

                    {if count($user_list) > 0}

                    <table style="font-size: small" class="display datatables-basic dataTable">
                        <thead>
                            <tr>
                                <th style="width:08%">Sl.No</th>
                                <th style="width:20%">{$user_type}</th>
                                <th style="width:25%">Full Name</th>
                                <th style="width:17%">Mobile</th>
                                <th style="width:15%">Email</th>
                                <th style="width:10%">Rating</th>
                                <th style="width:05%">Archive/Unarchive</th>
                            </tr>
                        </thead>                            
                        <tbody>

                            {foreach from = $user_list item = "v"}
                            <tr>
                                <td>{counter}</td>                                
                                
                                {if $user_type == 'Pilot'}
                                    <td><a href="{$base_url}Profile/Profile_view/{$v.user_id}" target="_blank">{$v.user_name}</a></td>
                                    <td><a href="{$base_url}Profile/Profile_view/{$v.user_id}" target="_blank">{$v.fullname}</a></td>
                                {else}
                                    <td><a href="{$base_url}Customer/Profile_view/{$v.user_id}" target="_blank">{$v.user_name}</a></td>
                                    <td><a href="{$base_url}Customer/Profile_view/{$v.user_id}" target="_blank">{$v.fullname}</a></td>
                                {/if}

                                <td>{$v.mobile1}</td>
                                <td>{$v.email}</td>

                                {if $user_type == 'Pilot'}
                                    <td><a href="{$base_url}Profile/Rating_history/{$v.user_id}" target="_blank">{$v.rating|string_format:"%.2f"}</a></td>
                                {else}
                                    <td><a href="{$base_url}Customer/Rating_history/{$v.user_id}" target="_blank">{$v.rating|string_format:"%.2f"}</a></td>
                                {/if}
                                

                                {if $v.status!='no'}
                                    <td align="center"><button class="btn btn-danger btn-xs dt-delete" title="Archive {$v.fullname}" onclick="javascript:archive_user({$v.user_id})"><span class="glyphicon glyphicon-ban-circle"></span></button></td>
                                {else}
                                    <td align="center"><button class="btn btn-primary btn-xs btn-ripple" title="Unarchive {$v.fullname}" onclick="javascript:unarchive_user({$v.user_id})"><span class="glyphicon glyphicon-ok-circle"></span></button></td>
                                {/if}                                           
                                
                            </tr>
                            {/foreach}
                        </tbody>                             
                    </table>

                    {else}

                    <h4>Heads up! No {$user_type} Found!</h4>

                    {/if}

                </div>                
            </div>
        </div>
    </div>
</div>

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 

<script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PLUGINS AREA -->

<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}/tables-datatables.js"></script>
<!-- END PLUGINS INITIALIZATION AND SETTINGS -->

<script src="{$js_path}/archive_user.js"></script>

<!-- BEGIN INITIALIZATION-->
<script>
    $(document).ready(function() {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();
    });
</script>
<!-- END INITIALIZATION-->
</body>
</html>