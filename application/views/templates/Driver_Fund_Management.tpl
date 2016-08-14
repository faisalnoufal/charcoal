{include file="header.tpl"  name=""}
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">        
{include file="page_header.tpl"  name=""}
 <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"> <h3>Add/Deduct Incentive</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post" enctype="multipart/form-data" >
                            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Select User <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5"> 
                                        <div class="input-wrapper">                                       
                                            <select class="selecter" name="user_name" id="user_name" data-width="100%" data-parsley-error-message="Please Select User" required="">
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
                                        
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Amount <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="amount" id="amount" class="form-control" value="" placeholder = "Enter Amount" data-parsley-error-message="Please Enter Amount" required="">
                                            </div>
                                            {if isset($error['amount'])}
                                                <span style="color:red">{$error['amount']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Transaction Note <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="transaction_note" id="transaction_note" class="form-control" value="" placeholder = "Enter Transaction Note" data-parsley-error-message="Please Enter Transaction Note" required="">
                                            </div> 
                                            {if isset($error['transaction_note'])}
                                                <span style="color:red">{$error['transaction_note']}</span>
                                            {/if}                                           
                                        </div>
                                    </div>
                                </div>
                                                                    
                            </div><!--.form-content-->

                            <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">  
                                         <button class="btn btn-blue" name="add_amount" id="add_amount"  type="submit" value="Add Amount" > Add Amount</button>
                                         <button class="btn btn-blue" name="deduct_amount" id="deduct_amount" type="submit" value="Deduct Amount" > Deduct Amount</button>

                                        <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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
<script>
                    $(document).ready(function () {
                        Pleasure.init();
                        Layout.init();
                        FormsValidationsParsley.init();

                    });
</script>
{include file="page_close.tpl"  name=""} 