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

                        <form action="" class="form-horizontal form-striped form-bordered parsley-validate" id="form" name="form" method="post" onsubmit="return validate()">
                            <input type="hidden" name="path_root" id="path_root" value="{$base_url}">

                            <div class="form-content">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Minimum Time (HH:MM)<span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <div class="input-wrapper">
                                                <input type="text" name="minimum_time" id="minimum_time" class="form-control" value="{$minimum_time}" placeholder = "HH:MM">
                                            </div>
                                            {if isset($error['minimum_time'])}
                                                <span style="color:red">{$error['minimum_time']}</span>
                                            {/if}
                                            <span style="color:red" id="err_minimum_time"></span>
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
        <!-- BEGIN INITIALIZATION-->
        <script>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();
            });

            function validate() {
                var date = document.getElementById("minimum_time").value.toString();
                if (/^([2][0-3]|[0-1]?[0-9])([.:][0-5]?[0-9])?$/.exec(date)) {
                    document.getElementById("err_minimum_time").innerHTML = "";
                    return true;
                } else {
                    document.getElementById("err_minimum_time").innerHTML = "Invalide Time: Should be in HH:MM format!";
                    return false;
                }                
            }

            $("#minimum_time").keydown(function(event) {
                // Allow only backspace and delete,left, right,decimal(.)in number part, decimal(.) in alphabet
                if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 186) {
                    // let it happen, don't do anything
                }
                else {
                    // Ensure that it is a number and stop the keypress
                    if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                        event.preventDefault(); 
                    }   
                }
            });

        </script>
        <!-- END INITIALIZATION-->
    </body>
</html>