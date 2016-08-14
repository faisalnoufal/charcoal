<!DOCTYPE html>

{include file="header.tpl"  name=""}
        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="{$css_path}plugins.css">        
        <link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="{$plugin_path}components-summernote/dist/summernote.css">
        <!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}
       
        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"> <h3>Terms And Conditions Settings</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">
                        
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab1_1" data-toggle="tab">Passenger Side Content</a></li>
                            <li><a href="#tab1_2" data-toggle="tab">Pilot Side Content</a></li>                            
                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1_1">
                                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" id="form" name="form_passenger" method="post">
                                    <div class="form-content">
                                        <div class="form-group">                                            
                                            <div class="col-md-12">
                                                <div class="inputer">
                                                    <div class="input-wrapper">
                                                    <textarea class="form-control summernote" name="passenger_content">{$terms_array['passenger_content']}</textarea>
                                                    </div>
                                                    {if isset($error['passenger_content'])}
                                                        <span style="color:red">{$error['passenger_content']}</span>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div><!--.form-group-->
                                    </div><!--.form-content-->

                                    <div class="form-buttons">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">                                        
                                                <button type="submit" class="btn btn-blue" value="submit_passenger" name="submit_passenger">Submit</button>
                                                <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div><!--.tab-pane-->
                            <div class="tab-pane" id="tab1_2">
                                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" id="form" name="form_pilot" method="post">                                    
                                    <div class="form-content">                                        
                                        <div class="form-group">                                            
                                            <div class="col-md-12">
                                                <div class="inputer">
                                                    <div class="input-wrapper">
                                                        <textarea class="form-control summernote" name="pilot_content">{$terms_array['driver_content']}</textarea>
                                                    </div>
                                                    {if isset($error['pilot_content'])}
                                                        <span style="color:red">{$error['pilot_content']}</span>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div><!--.form-group-->                                

                                    </div><!--.form-content-->

                                    <div class="form-buttons">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">                                        
                                                <button type="submit" class="btn btn-blue" value="submit_pilot" name="submit_pilot">Submit</button>
                                                <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div><!--.tab-pane-->                            
                    </div><!--.tab-content-->                       

                    </div><!--.panel-body-->
                </div><!--.panel-->

            </div><!--.col-md-12-->
        </div><!--.row-->        

{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""} 
        <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
        <script src="{$plugin_path}jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>        
        <script src="{$plugin_path}components-summernote/dist/summernote.min.js"></script>        
        <!-- END PLUGINS AREA -->        
        <script src="{$plugin_path}/parsleyjs/dist/parsley.min.js"></script>

        <!-- BEGIN INITIALIZATION-->
        <script>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();  
                $('.summernote').summernote({
                    height: 300,            
                });
            });
        </script>
        <!-- END INITIALIZATION-->
    </body>
</html>