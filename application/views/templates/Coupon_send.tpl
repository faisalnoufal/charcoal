<!DOCTYPE html>

{include file="header.tpl" name=""}
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">
<link rel="stylesheet" href="{$plugin_path}jquery-icheck/skins/all.css">
<link rel="stylesheet" href="{$plugin_path}selectize/dist/css/selectize.bootstrap3.css"> 

{include file="page_header.tpl" name=""}
  <div class="row">
    <div class="col-md-12">
        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"> <h3>COUPEN SEND TO USER</h3></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form name='send_form' action="" onsubmit="return validateForm()" class="form-horizontal form-striped form-bordered" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="path_root" id="path_root" value="{$base_url}">  
                    
                    <div class="form-content">

                        <div class="form-group">
                            <label class="control-label col-md-3">Select</label>
                            <div class="col-md-5">
                                <div class="icheck icheck-minimal">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_all" value="all" checked>
                                            All
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_all" value="select">
                                            Select From List
                                        </label>
                                    </div>                                    
                                </div><!--.icheck-->                               
                            </div>
                            {if isset($error['user_all'])}
                                <span style="color:red">{$error['user_all']}</span>
                            {/if}
                        </div><!--.form-group-->

                        <div class="form-group" id="user_select" style="display:none;">
                            <label class="control-label col-md-3">Select User</label>
                            <div class="col-md-8">
                                <div class="input-wrapper">
                                    {*<!-- <select class="selecter" data-width="100%" name="user_id[]" id="user_id" data-parsley-error-message="Please Select User" multiple="true" class="selectpicker" data-live-search="true" >
                                        {foreach from=$users item="v"}
                                            <option value={$v.user_id} >{$v.fullname}</option>
                                        {/foreach}
                                    </select> -->*}
                                    <table>
                                    {assign "i" 0}
                                    {foreach from=$users item="v"}
                                        {$i = $i+1}
                                        {if $i%3 == 1}
                                            <tr>
                                            <td>
                                        {else}
                                            <td>
                                        {/if}
                                        <div class="checkbox">
                                            <label class="icheck-flat">
                                                <div class="icheckbox_flat" style="position: relative;"><input type="checkbox" name="user_id[]" value="{$v.user_id}" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                                {$v.fullname}
                                            </label>
                                        </div>
                                        {if $i%3 == 0}
                                            </td>
                                            </tr>
                                        {else}
                                            </td>
                                        {/if}
                                    {/foreach}
                                    {if $i%3 != 0}
                                        </tr>
                                    {/if}
                                    </table><!--.icheck-->                                    
                                </div>                               
                            </div>
                            {if isset($error['user_id'])}
                                <span style="color:red">{$error['user_id']}</span>
                            {/if}
                        </div><!--.form-group-->

                        <input type="hidden" name="hid_coupon" id="hid_coupon" class="form-control" value="{$coupon_id}">
                        <div class="form-group">
                            <label class="control-label col-md-3">Coupon</label>
                            <div class="col-md-5">
                                <div class="inputer">                                    
                                    <div class="input-wrapper">
                                        <input type="text" name="coupon" id="coupon" class="form-control" value="{$coupon_val}"  readonly="true" >
                                    </div>
                                    {if isset($error['coupon'])}
                                        <span style="color:red">{$error['coupon']}</span>
                                    {/if}
                                    <div id='details' style="color:blue"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Coupon Value</label>
                            <div class="col-md-5">
                                <div class="inputer">                                    
                                    <div class="input-wrapper">
                                        <input type="text" name="val_coupon" id="val_coupon" class="form-control" value="{$val_coupon}"  readonly="true" >
                                    </div>
                                    {if isset($error['val_coupon'])}
                                        <span style="color:red">{$error['val_coupon']}</span>
                                    {/if}
                                    <div id='details' style="color:blue"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-buttons">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">                                        
                                    <button type="submit" class="btn btn-blue" value="allocate_oupon" name="allocate_oupon">Send Coupon</button>
                                </div>
                            </div>
                        </div>                                                                    
                    </div><!--.form-content-->

                </form>
            </div>
        </div>
    </div>
  </div>
  
{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}
<script src="{$plugin_path}jquery-icheck/icheck.min.js"></script>
<script src="{$js_path}/coupen_management.js"></script>
<script src="{$js_path}notifications.js"></script>
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        FormsIcheck.init();
    });  

</script>
{include file="page_close.tpl"  name=""} 
