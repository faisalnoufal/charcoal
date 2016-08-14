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

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3>My Referrals</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">

                    <div class="form-content">
                        <div class="form-group">
                            <label class="control-label col-md-3">Select {ucwords($user_type)}<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
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
{if isset($user_list) > 0}
<div class="row">
    <div class="col-md-12">
        <div class="panel" style="font-size: small">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3></h3></div>
            </div> --><!--.panel-heading-->
            {if count($user_list) > 0}
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
                                    <th width="10%">Rating</th>                                    
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$user_list item=v}
                                    <tr>                                
                                    <td>{counter}</td>                                    
                                    <td><a href="{$base_url}Customer/Profile_view/{$v.user_id}" target="_blank">{$v.user_name}</a></td>
                                    <td><a href="{$base_url}Customer/Profile_view/{$v.user_id}" target="_blank">{$v.fullname}</a></td>
                                    <td>{$v.mobile}</td>
                                    <td>{$v.email}</td>
                                    <td><a href="{$base_url}Customer/Rating_history/{$v.user_id}" target="_blank">{$v.rating|string_format:"%.2f"}</a></td>
                                    </tr>
                                {/foreach}
                            </tbody>

                            <tfoot>     
                                <tr style="text-align:left;font-size: 18px">
                                    <td colspan="6">
                                        <form method="post" action="{$base_url}Excel/My_referrals">
                                            <input type="hidden" name="user_type" value="{$user_type}">
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
            <br>
            <h4>Currently there is no referral!!</h4>
            {/if}
        </div><!--.panel-->
    </div><!--.col-md-12-->
</div><!--.row-->
{/if}
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