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
                <div class="panel-title"><h3>Area List</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">
                <div class="overflow-table">
                    <table class="display datatables-basic dataTable">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Area Name</th>   
                                <th>Pilot Details</th>
                                <th>Customer Details</th>
                                <th>Delete</th>   
                            </tr>
                        </thead>
                        <tbody>  
                            {if isset($area_list)}                          
                                {foreach from=$area_list item=v}

                                    <tr>
                                        <td>{counter}</td> 
                                        <td style="width: 60%">{$v.name} </td>
                                       
                                        <td>
                                            <form action="{$base_url}Surge/Surge_view" method="post">
                                                <button class="btn btn-primary btn-xs dt-edit" title="View Pilots inside {$v.name} Surge" type='submit' name='submit' value='submit'><span class="glyphicon glyphicon-fullscreen" ></span></button>
                                                <input type='hidden' name='id' value='{$v.id}'>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{$base_url}Surge/Customer_surge" method="post">
                                                <button class="btn btn-primary btn-xs dt-edit" title="View Customers inside {$v.name} Surge" type='submit' name='submit' value='submit'><span class="glyphicon glyphicon-fullscreen" ></span></button>
                                                <input type='hidden' name='id' value='{$v.id}'>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <button class="btn btn-danger btn-xs dt-delete" title="Delete {$v.name} Surge" type='submit' name='delete' value='submit'><span class="glyphicon glyphicon-trash" ></span></button>
                                                <input type='hidden' name='id' value='{$v.id}'>
                                            </form>
                                        </td>
                                    </tr>
                                {/foreach}
                            {/if}   
                        </tbody>

                    </table>
                </div><!--.overflow-table-->
            </div><!--.panel-body-->
        </div><!--.panel-->
    </div><!--.col-md-12-->
</div><!--.row-->


<div class="row">
    <div class="col-md-12">


        <div class="btn btn-default" style="float:right">
            Create New Surge <a class="btn btn-floating btn-red" href="{$base_url}Surge/Create_surge_area"><span class="ion-android-add"></span></a>
        </div><!--.row-->

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