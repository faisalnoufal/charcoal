{include file="header.tpl"  name=""}
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">        
{include file="page_header.tpl"  name=""}
<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"> <h3>Pilot Ewallet History</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="path_root" id="path_root" value="{$base_url}">

                    <div class="form-content">
                        <div class="form-group">
                            <label class="control-label col-md-3">Select User <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5"> 
                                <div class="input-wrapper">                                       
                                    <select class="selecter" name="user_name" id="user_name" data-width="100%" class="selectpicker" data-live-search="true" >
                                        <option value=''>Select User Name</option>
                                        {foreach from=$driver_details item=v}
                                            <option value={$v.id}>{$v.fullname}</option>
                                        {/foreach}
                                    </select>
                                </div>
                                {if isset($error['user_name'])}
                                    <span style="color:red">{$error['user_name']}</span>
                                {/if}
                            </div>
                        </div>                             
                    </div><!--.form-content-->

                    <div class="form-buttons">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">  

                                <button type="submit" class="btn btn-blue" value="submit" name="submit">Submit</button>
                                <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div><!--.panel-body-->
        </div><!--.panel-->

    </div><!--.col-md-12-->
</div><!--.row-->
{if $flag}
    <div class="row">
        <div class="col-md-12">
            <div class="panel" style="font-size: small">
                <!-- <div class="panel-heading">
                    <div class="panel-title"><h4>EWALLET TRANSACTION DETAILS</h4></div>
                </div> --><!--.panel-heading-->
                <div class="panel-body">

                    <div class="overflow-table">

                        {if count($fund_details) > 0}
                            {$total = 0}
                            {$balance = 0}
                            <table class="display datatables-basic dataTable">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th> 
                                        <th>Date</th>
                                        <th>Amount Type</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                    {foreach from=$fund_details item=v}
                                        {if $v.amount_type=="admin_credit"}
                                            {$amount_type="Credited By Admin"}
                                            {$balance = $balance + $v.amount}
                                        {else if $v.amount_type=="admin_debit"}
                                            {$amount_type="Debited By Admin"}
                                            {$balance = $balance - $v.amount}
                                        {else if $v.amount_type=="Referral Point"}
                                            {$amount_type = $v.amount_type|cat:' - Referred:'|cat:$v.trip_id}
                                            {$balance = $balance + $v.amount}
                                        {else if $v.amount_type=="Trip Commission"}
                                            {$amount_type = $v.amount_type|cat:' - TripID:'|cat:$v.trip_id}
                                            {$balance = $balance + $v.amount}
                                        {else}
                                            {$amount_type = $v.amount_type}
                                            {$balance = $balance + $v.amount}
                                        {/if}
                                        
                                        <tr>
                                            <td>{counter}</td>
                                            <td>{$v.date}</td>
                                            <td>{$amount_type}</td>
                                            <td>{number_format($v.amount,2)}</td>
                                            <td>{number_format($balance,2)}</td>
                                        </tr>
                                    {/foreach}
                                </tbody>  
                                <tfoot>           
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Available Amount </b></td>
                                        <td><b>{number_format($balance,2)}</b></td>
                                    </tr>

                                    <tr style="text-align:left;font-size: 18px">
                                        <td colspan="5">
                                            <form method="post" action="{$base_url}Excel/Driver_fund_details">
                                                <input type="hidden" name="user_id" value="{$user_id}">
                                                <button>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></button>
                                            </form>
                                        </td>
                                    </tr>
                                
                                </tfoot>                            
                            </table>

                        {else}

                            <br>
                            <h4>No Details Found!</h4>

                        {/if}


                    </div><!--.overflow-table-->

                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div>

{/if}

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 

<script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
<script src="{$js_path}/tables-datatables.js"></script>

<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();

    });
</script>
{include file="page_close.tpl"  name=""} 