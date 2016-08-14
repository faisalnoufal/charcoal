<!DOCTYPE html>

{include file="header.tpl"  name=""}
        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="{$css_path}plugins.css">        
        <link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}
       
        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"> <h3>Time Management</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" id="form" name="form" method="post">
                            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-3">KM Per Hour <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="km_per_hour" class="form-control" value="{$time_array['km_per_hour']}" placeholder = "Enter KM Per Hour" data-parsley-error-message="Please Enter KM Per Hour" >
                                            </div>
                                            {if isset($error['km_per_hour'])}
                                                <span style="color:red">{$error['km_per_hour']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Initial Waiting Time <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="initial_waiting_time" class="form-control" value="{$time_array['initial_waiting_time']}" placeholder = "Enter Initial Waiting Time" data-parsley-error-message="Please Enter Initial Waiting Time" >
                                            </div>
                                            {if isset($error['initial_waiting_time'])}
                                                <span style="color:red">{$error['initial_waiting_time']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->  

                                <div class="form-group">
                                    <label class="control-label col-md-3">Additional Waiting Time <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="additional_waiting_time" class="form-control" value="{$time_array['additional_waiting_time']}" placeholder = "Enter Additional Waiting Time" data-parsley-error-message="Please Enter Additional Waiting Time" >
                                            </div>
                                            {if isset($error['additional_waiting_time'])}
                                                <span style="color:red">{$error['additional_waiting_time']}</span>
                                            {/if}
                                        </div>
                                    </div>
                                </div><!--.form-group-->                              

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

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 
        <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
        <script src="{$plugin_path}jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>        
        <!-- END PLUGINS AREA -->        
        <script src="{$plugin_path}/parsleyjs/dist/parsley.min.js"></script>

        <!-- BEGIN INITIALIZATION-->
        <script>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();                
            });
        </script>
        <!-- END INITIALIZATION-->
    </body>
</html>