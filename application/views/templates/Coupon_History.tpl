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
                        <div class="panel-title"> <h3>Coupon History</h3></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">
                       {if $user_detail}
                           <div class="overflow-table">
                            <table class="display datatables-basic dataTable">
                            <thead>
                                <tr class="th" align="center">
                                <tr class="th">
                                    <th><center>Sl.No</center></th>
                                    <th><center>Coupon</center></th>
                                    <th><center>Allocated to</center></th>
                                    <th><center>Created time</center></th> 
                                    <th><center>Amount</center></th>

                                </tr>

                            </thead>
                   
                            {assign var="length" value=count($user_detail)}

                            {if $length>0}
                                {assign var="i" value=0}
                                <tbody>
                                    {foreach from=$user_detail item="v"}
                                        {if $i%2==0}
                                            {$class='tr1'}
                                        {else}
                                            {$class='tr2'}
                                        {/if}
                                        <tr class="{$class}" align="center" >
                                            <td>{counter}</td>
                                            <td> {$v.value}</td>
                                            {if $v.assigned_to == ''} 
                                               <td> NA </td>
                                            {else}
                                            <td>{$v.assigned_to}</td>
                                            {/if}
                                             <td>{$v.created_time}</td>
                                             {if $v.amount_or_percentage =='percent'}
                                                <td>{$v.Amount}%</td>
                                             {else}
                                                 <td>{$v.Amount}</td>
                                            {/if}
                                            
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
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();
                TablesDataTables.init();                
            });
        </script>
        <!-- END INITIALIZATION-->
    </body>
</html>