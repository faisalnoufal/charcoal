<!DOCTYPE html>

{include file="header.tpl"  name=""}
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">       
{include file="page_header.tpl"  name=""}
  <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title"> <h3>COUPEN ALLOCATION</h3></div>
                    </div><!--.panel-heading-->
                    <div class="panel-body">

                        <form name='Coupon_alloaction_form' action="" class="form-horizontal form-striped form-bordered" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="path_root" id="path_root" value="{$base_url}">  
                            <div class="form-content">
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Username</label>
                                    <div class="col-md-5">
                                        
                                            <div class="input-wrapper">                                                
                                                <select class="selecter" name="uname" id="uname">
                                            <option value=''>select</option>       
                                             {foreach from=$user_det item=v}
                                                    <option value={$v.id}>{$v.user_name}</option>
                                                {/foreach}
                                            </select>
                                        
                                            </div>
                                            {if isset($error['uname'])}
                                                <span style="color:red">{$error['uname']}</span>
                                            {/if}
                                          
                                        
                                    </div>
                                </div>
                             
                            
                               {*  <div class="form-group">
                                    <label class="control-label col-md-3">Coupon</label>
                                    <div class="col-md-5">
                                        
                                            <div class="input-wrapper">                                                
                                                <select class="selecter" name="coupon" id="coupon" onchange="showDet()">
                                            <option value=''>select</option>       
                                             {foreach from=$coupon_det item=v}
                                                    <option value={$v.coupon_id}>{$v.value}</option>
                                                {/foreach}
                                            </select>
                                        
                                            </div>
                                            <div id='details' style="color:blue"></div>
                                            {if isset($error['coupon'])}
                                                <span style="color:red">{$error['coupon']}</span>
                                            {/if}
                                          
                                       
                                    </div>
                                </div>*}
                                  <div class="form-group">
                                    <label class="control-label col-md-3">Coupon</label>
                                    <div class="col-md-5">
                                        <div class="inputer">
                                            <input type="hidden" name="hid_coupon" id="hid_coupon" class="form-control" value="{$coupon_id}">
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
                                   <div class="form-buttons">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">                                        
                                        <button type="submit" class="btn btn-blue" value="allocate_oupon" name="allocate_oupon">Allocate Coupon</button>
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
<script>
                    $(document).ready(function () {
                        Pleasure.init();
                        Layout.init();

                    });
</script>
<script src="{$js_path}/coupen_management.js"></script>
{include file="page_close.tpl"  name=""} 
