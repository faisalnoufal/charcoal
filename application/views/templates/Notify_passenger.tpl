<!DOCTYPE html>

{include file="header.tpl"  name=""}
<!-- BEGIN PLUGINS CSS -->
<link rel="stylesheet" href="{$plugin_path}bootstrap-daterangepicker/daterangepicker-bs3.css">
<!-- <link rel="stylesheet" href="{$plugin_path}components-summernote/dist/summernote.css"> -->
<link rel="stylesheet" href="{$plugin_path}jquery-icheck/skins/all.css">
<link rel="stylesheet" href="{$plugin_path}chosen/chosen.min.css">
<link rel="stylesheet" href="{$css_path}plugins.css">
<!-- <link rel="stylesheet" href="{$plugin_path}selectize/dist/css/selectize.bootstrap3.css"> -->
<!-- END PLUGINS CSS -->
{include file="page_header.tpl"  name=""}

<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h3>Customer Notification</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">
                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">

                    <div class="form-content">

                        <div class="form-group">
                            <label class="control-label col-md-3">Select</label>
                            <div class="col-md-5">
                                <div class="icheck icheck-minimal">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_all" value="all" >
                                            All
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_all" value="select" checked>
                                            Select From List
                                        </label>
                                    </div>                                    
                                </div><!--.icheck-->                               
                            </div>
                            {if isset($error['user_all'])}
                                <span style="color:red">{$error['user_all']}</span>
                            {/if}
                        </div><!--.form-group-->

                        {*<!-- <div class="form-group" id="user_select" style="display:none;">
                            <label class="control-label col-md-3">Select User</label>
                            <div class="col-md-5">
                                <div class="input-wrapper">
                                    <select class="selecter" data-width="100%" name="user_id[]" id="user_id" data-parsley-error-message="Please Select User" class="selectpicker" data-live-search="true" multiple="true"> 
                                   
                                        {foreach from=$user_details item="v"}
                                            <option value={$v.user_id} >{$v.fullname}</option>
                                        {/foreach}
                                    </select>
                                </div>                               
                            </div>
                            {if isset($error['user_id'])}
                                <span style="color:red">{$error['user_id']}</span>
                            {/if}
                        </div><!--.form-group--> -->*}

                        <div class="form-group" id="user_select" style="display:'';">
                            <label class="control-label col-md-3">Select User</label>
                            <div class="col-md-5">
                                <select data-placeholder="Choose User" data-width="100%" name="user_id[]" id="user_id" class="chosen-select" multiple>
                                    {foreach from=$user_details item="v"}
                                        <option value="{$v.user_id}">{$v.fullname}</option>
                                    {/foreach}                                                                               
                                </select>
                            </div><!--.col-md-5-->
                            {if isset($error['user_id[]'])}
                                <span style="color:red">{$error['user_id[]']}</span>
                            {/if}
                        </div><!--.row-->

                        <div class="form-group">
                            <label class="control-label col-md-3">Message Expiry Date <span style="color: red;vertical-align:super;font-size:small"></span></label>
                            <div class="col-md-5">
                                <div class="input-wrapper">
                                    <input type="text" style="100%" name="message_expiry" class="form-control bootstrap-daterangepicker-basic" placeholder="Enter Message Expiry Date" data-parsley-error-message="Please Enter Message Expiry Date" />
                                </div> 
                            </div>
                            {if isset($error['message_expiry'])}
                                <span style="color:red">{$error['message_expiry']}</span>
                            {/if}
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Message <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-9">
                                <div class="input-wrapper">
                                    <!-- <textarea class="form-control summernote" placeholder="" name="message" data-parsley-error-message="Please Enter Message "></textarea> -->
                                    <textarea class="form-control" rows="3" placeholder="" name="message" data-parsley-error-message="Please Enter Message "></textarea>
                                </div>
                                {if isset($error['message'])}
                                    <span style="color:red">{$error['message']}</span>
                                {/if}
                            </div>
                        </div>
                    </div><!--.form-content-->

                    <div class="form-buttons">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">

                                <button type="submit" class="btn btn-blue" value="submit" name="submit">Send</button>

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
<!-- <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script> -->
<script src="{$plugin_path}bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- <script src="{$plugin_path}components-summernote/dist/summernote.min.js"></script>     -->
<script src="{$plugin_path}jquery-icheck/icheck.min.js"></script>
<script src="{$plugin_path}chosen/chosen.jquery.min.js"></script>
<script src="{$js_path}notifications.js"></script>
<!-- BEGIN INITIALIZATION-->
<script>

    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        FormsPickers.init();
        FormsIcheck.init();
        FormsSelect.init();
        // $('.summernote').summernote({
        //     height: 200,            
        // });
    });

     var FormsSelect = {

        chosenSelect: function () {
            $('.chosen-select').chosen({
                width: '100%'
            });
        },
       
        init: function () {
            this.chosenSelect();          
        }
    }
    
</script>
<!-- END INITIALIZATION-->
</body>
</html>