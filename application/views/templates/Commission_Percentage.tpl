{include file="header.tpl"  name=""}
<link rel="stylesheet" href="{$css_path}plugins.css">        
{include file="page_header.tpl"  name=""}
 <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"> <h3>Wage Percentage Settings</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">

                            <div class="form-content">
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Commission Percentage <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">                                                
                                                <input type="text" name="percentage" id="percentage" class="form-control" value="{$percentage}" placeholder = "Enter Percentage" data-parsley-error-message="Please Enter Commission Percentage" required="">
                                            </div>
                                            {if isset($error['percentage'])}
                                                <span style="color:red">{$error['percentage']}</span>
                                            {/if}
                                        </div>
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


{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 

<script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
<script>
                    $(document).ready(function () {
                        Pleasure.init();
                        Layout.init();
                    });
</script>
{include file="page_close.tpl"  name=""} 