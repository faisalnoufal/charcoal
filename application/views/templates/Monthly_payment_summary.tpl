<!DOCTYPE html>

{include file="header.tpl"  name=""}
<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">
<link rel="stylesheet" href="{$plugin_path}bootstrap-daterangepicker/daterangepicker-bs3.css">
<!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}

<div class="row" >
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3>Monthly Payment Summary</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">
                    <div class="form-content">
                         
                        <div class="form-group">
                            <label class="control-label col-md-3">Select From-To Dates</label>
                            <div class="col-md-5">
                                <div class="input-wrapper">
                                    <input type="text" style="width:80%" name="period" id="period" class="form-control btn bootstrap-daterangepicker-dropdown" placeholder="mm/dd/yyyy - mm/dd/yyyy" value="{$from_to_date}"/>
                                </div>                                
                            </div>
                        </div><!--.form-group  -->
                       
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

        {if isset($income_details)}

            <div class="row">
                <div class="col-md-12">
                    <div class="panel" style="font-size: small">
                        <!-- <div class="panel-heading">
                            <div class="panel-title"><h4>Income Report Summary</h4></div>
                        </div> --><!--.panel-heading-->
                        <div class="panel-body">
                            <div class="overflow-table">
                                <table class="display datatables-basic dataTable">
                                    <thead>
                                        <tr>
                                            <th width="05%">Sl.No</th>                                            
                                            <th>Pilot</th>                                            
                                            <th>Amount</th>
                                            <th width="10%">Pilot Wage</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {assign var=total_commission value=0}
                                        {assign var=total_amount value=0}                                        
                                        {foreach from=$income_details item=v}
                                            {$total_commission = $total_commission + $v.driver_commission}
                                            {$total_amount = $total_amount + $v.total_fare}
                                            <tr>
                                                <td>{counter}</td>                                                
                                                <td><a href="{$base_url}Profile/Profile_view/{$v.driver_id}" target="_blank">{$v.driver}</a></td>                    
                                                <td>{$v.total_fare}</td>
                                                <td>{$v.driver_commission}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><b>TOTAL</b></td>                                            
                                            <td></td>                                            
                                            <td><b>{$total_amount}</b></td>
                                            <td><b>{$total_commission}</b></td>
                                        </tr>

                                        <tr style="text-align:left;font-size: 18px">
                                            <td colspan="4">
                                                <form method="post" action="{$base_url}Excel/Monthly_payment_summary">                                                    
                                                    <input type="hidden" name="from_to_date" value="{$from_to_date}">
                                                    <button>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></button>
                                                </form>
                                            </td>
                                        </tr>

                                    </tfoot>
                                </table>
                            </div><!--.overflow-table-->

                        </div><!--.panel-->
                    </div><!--.col-md-12-->
                </div><!--.row-->
            </div><!--.row-->

        {/if}

    </div><!--.col-md-12-->
</div><!--.row-->

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 

<script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
<script src="{$plugin_path}bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- END PLUGINS AREA -->
<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$js_path}tables-datatables.js"></script>
<!-- END PLUGINS INITIALIZATION AND SETTINGS -->
<script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
<script src="{$js_path}validate_Cab_Management.js"></script>
<!-- BEGIN INITIALIZATION-->
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();                 
        $('#period').daterangepicker({
        }, function (start, end, label) {
            // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    });
</script>
<!-- END INITIALIZATION-->
</body>
</html>