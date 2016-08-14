<!DOCTYPE html>

{include file="header.tpl"  name=""}
        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="{$css_path}plugins.css">        
        <link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <!-- <link rel="stylesheet" href="{$plugin_path}components-summernote/dist/summernote.css"> -->
        <!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}
       
        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <!-- <div class="panel-heading">
                        <div class="panel-title"> <h3>Admin Account Settings</h3></div>
                    </div> --><!--.panel-heading-->
                    <div class="panel-body">
                        
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab1_1" data-toggle="tab">Change Email</a></li>
                            <li><a href="#tab1_2" data-toggle="tab">Change Password</a></li>                            
                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1_1">
                                <form action="" class="form-horizontal form-striped form-bordered" id="form" name="form_email" method="post" onsubmit="return validateFormEmail()">
                                    
                                    <div class="form-content">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">My Email Address <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                            <div class="col-md-5">
                                                <div class="inputer">
                                                    <div class="input-wrapper">                                                
                                                        <input type="text" name="email" id="email" class="form-control" value="{$email}" placeholder = "Enter Email">
                                                    </div>
                                                    {*<!-- <span id='msg_email' style="color:blue"></span> -->*}
                                                    <span id='error_email' style="color:red">{if isset($error['email'])} {$error['email']} {/if}</span>
                                                </div>
                                            </div>
                                        </div>
                                                                            
                                    </div><!--.form-content-->

                                    <div class="form-buttons">

                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">  
                                                <button class="btn btn-blue" name="submit_email" id="submit_email" type="submit" value="submit_email">Update</button>
                                                <button type="reset" class="btn btn-flat btn-default">Cancel</button>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div><!--.tab-pane-->

                            <div class="tab-pane" id="tab1_2">
                                <form action="" class="form-horizontal form-striped form-bordered" id="form" name="form_password" method="post" onsubmit="return validateFormPassword()">
                                    
                                    <div class="form-content">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Current Password <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                            <div class="col-md-5">
                                                <div class="inputer">
                                                    <div class="input-wrapper">                                                
                                                        <input type="password" name="old_password" id="old_password" class="form-control" value="" placeholder = "Enter Current Password">
                                                    </div>                                                    
                                                    <span id='error_old_password' style="color:red">{if isset($error['old_password'])} {$error['old_password']} {/if}</span>
                                                </div>
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <label class="control-label col-md-3">New Password <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                            <div class="col-md-5">
                                                <div class="inputer">
                                                    <div class="input-wrapper">                                                
                                                        <input type="password" name="new_password" id="new_password" class="form-control" value="" placeholder = "Enter New Password">
                                                    </div>
                                                    <span id='error_new_password' style="color:red">{if isset($error['new_password'])} {$error['new_password']} {/if}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Confirm Password <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                            <div class="col-md-5">
                                                <div class="inputer">
                                                    <div class="input-wrapper">                                                
                                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="" placeholder = "Re-Enter Password">
                                                    </div> 
                                                    <span id='error_confirm_password' style="color:red">{if isset($error['confirm_password'])} {$error['confirm_password']} {/if}</span>                                                                                      
                                                </div>
                                            </div>
                                        </div>
                                                                            
                                    </div><!--.form-content-->

                                    <div class="form-buttons">

                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">  
                                                <button class="btn btn-blue" name="submit_password" id="submit" type="submit" value="submit_password">Update</button>
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
        <script src="{$js_path}validate_admin_account.js"></script>
        <!-- <script src="{$plugin_path}components-summernote/dist/summernote.min.js"></script>         -->
        <!-- END PLUGINS AREA -->        
        <!-- <script src="{$plugin_path}/parsleyjs/dist/parsley.min.js"></script> -->

        <!-- BEGIN INITIALIZATION-->
        <script>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();  
                // $('.summernote').summernote({
                //     height: 300,            
                // });
            });
        </script>
        <!-- END INITIALIZATION-->
    </body>
</html>