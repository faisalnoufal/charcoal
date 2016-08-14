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
                    <div class="panel-heading">
                        <div class="panel-title"> <strong>Update Fare</strong></div>
                    </div> <!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">
                            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Cab Type <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5"> 
                                        <div class="input-wrapper">                                       
                                            <select class="selecter" name="cab_id" id="cab_id" data-parsley-error-message="Please Select Cab type" data-width="100%" required="" class="selectpicker" data-live-search="true" >
                                                <option value=''>Select Cab Type</option>
                                                {foreach from=$cabs_list item=v}
                                                    <option value={$v.id}>{$v.type_short_name}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                        {if isset($error['cab_id'])}
                                            <span style="color:red">{$error['cab_id']}</span>
                                        {/if}
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-4">Fare Per KM <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="fare_per_km" id="fare_per_km" class="form-control" value="" placeholder = "Enter Fare Per Kilometers" data-parsley-error-message="Please Enter Fare" required="">
                                            </div> 
                                            {if isset($error['fare_per_km'])}
                                                <span style="color:red">{$error['fare_per_km']}</span>
                                            {/if}                                           
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-4">Minimum Charge (Instant Booking)<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="minimum_charge" id="minimum_charge" class="form-control" value="" placeholder = "Enter Minimum Charge (Instant Booking)" data-parsley-error-message="Please Enter Minimum Charge (Instant Booking)" required="">
                                            </div>
                                            {if isset($error['minimum_charge'])}
                                                <span style="color:red">{$error['minimum_charge']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-4">Minimum Charge (Future Booking)<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="minimum_later" id="minimum_later" class="form-control" value="" placeholder = "Enter Minimum Charge (Future Booking)" data-parsley-error-message="Please Enter Minimum Charge (Future Booking)" required="">
                                            </div>
                                            {if isset($error['minimum_later'])}
                                                <span style="color:red">{$error['minimum_later']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-4">Minimum Distance <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="minimum_distance" id="minimum_distance" class="form-control" value="" placeholder = "Enter Minimum Distance" data-parsley-error-message="Please Enter Minimum Distance " required="">
                                            </div>
                                            {if isset($error['minimum_distance'])}
                                                <span style="color:red">{$error['minimum_distance']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                 <div class="form-group">
                                    <label class="control-label col-md-4">Waiting Charge Per minutes <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="waiting_charge" id="waiting_charge" class="form-control" value="" placeholder = "Enter Waiting Charge Per minute" data-parsley-error-message="Please Enter Waiting Charge" required="" >
                                            </div>
                                            {if isset($error['waiting_charge'])}
                                                <span style="color:red">{$error['waiting_charge']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->                                      

                            </div><!--.form-content-->

                            <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-5">                                        
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

        <div class="row">
            <div class="col-md-12">
                <div class="panel" style="font-size: small">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"><h4>FARE LIST</h4></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <div class="overflow-table">

                        {if count($cabs_list) > 0}

                        <table class="display datatables-basic dataTable">
                            <thead>
                                <tr>
                                    <th style="width:5%">Sl.No</th> 
                                    <th style="width:20%">ShortName</th> 
                                    <th style="width:20%">Fare Per KM</th>
                                    <th style="width:20%">Minimum Charge<br>(Instant Booking)</th>
                                    <th style="width:20%">Minimum Charge<br>(Future Booking)</th>
                                    <th style="width:20%">Minimum Distance</th>
                                    <th style="width:15%">Waiting Charge Per Minutes</th> 
                                </tr>
                            </thead>
                            <tbody>                                
                                {foreach from=$cabs_list item=v}
                                <tr>
                                    <td>{counter}</td>
                                    <td>{$v.type_short_name}</td>
                                    <td>{$v.fare_per_km}</td>
                                    <td>{$v.minimum_charge}</td>
                                    <td>{$v.minimum_later}</td>
                                    <td>{$v.minimum_distance}</td>
                                    <td>{$v.waiting_charge}</td> 
                                </tr>
                                {/foreach}
                            </tbody>                            
                        </table>
                        
                        {else}
                        <br>
                        <h4>Heads up! No Fare Settings Entered</h4>

                        {/if}

                        </div><!--.overflow-table-->

                    </div><!--.panel-body-->
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

        <script src="{$js_path}/cabs.js"></script>

        <!-- BEGIN INITIALIZATION-->
        <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
        {* <script src="{$js_path}forms-validations-parsley.js"></script>*}
        <script src="{$js_path}validate_Cab_Management.js"></script>

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