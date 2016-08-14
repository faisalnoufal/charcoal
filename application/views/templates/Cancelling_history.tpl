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
            <div class="panel-heading">
                <div class="panel-title"> <h3>Trip Cancelled History</h3></div>
            </div><!--.panel-heading-->
            <div class="panel-body">
                {if $cancelling_det}
                    <div class="overflow-table">
                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr class="th" align="center">
                                <tr class="th">
                                    <th><center>Sl.No</center></th>
                            <th><center>Passenger</center></th>
                            <th><center>Number of trip cancelled</center></th>
                            <th><center>Action</center></th>

                            </tr>

                            </thead>

                            {assign var="length" value=count($cancelling_det)}

                            {if $length>0}
                                {assign var="i" value=0}
                                <tbody>
                                    {foreach from=$cancelling_det item="v"}
                                    
                                        
                                        <tr class="" align="center" >
                                            <form name='block_form'  class="form-horizontal form-striped form-bordered" method="post"  id='block_form'>
                                        <input type="hidden" name="hid_pas_id" id="hid_id" value="{$v.id}" > 
                                            <td>{counter}</td>
                                            <td> {$v.user_name}</td>
                                            <td> {$v.count}</td>
                                            {if $v.status!='no'}
                                            <td> 
                                                <button type="submit" class="btn btn-blue" value="block" name="block" id="block">Block Passenger</button>
                                            </td>
                                             {else}
                                               <td> Blocked</td>  
                                            {/if}
                                           
                                             </form>
                                        </tr>
                                  
                                {/foreach}
                                </tbody> 
                            {/if}
                        </table>
                    </div>

                {else}  <h4> No data found </h4>  {/if}

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

<script src="{$js_path}/surcharge.js"></script>

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