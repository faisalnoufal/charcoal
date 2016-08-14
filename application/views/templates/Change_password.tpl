{include file="header.tpl"  name=""}
<link rel="stylesheet" href="{$css_path}plugins.css">        
{include file="page_header.tpl"  name=""}

<div class="row">
    <div class="col-md-12">
        
        <div class="panel">
            <!-- <div class="panel-heading">
                <div class="panel-title"> <h3> Change Password </h3></div>
            </div> --><!--.panel-heading-->

            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">
                    
                    <div class="form-content">
                        <div class="form-group">
                            <label class="control-label col-md-3">Select User <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5"> 
                                <div class="input-wrapper">                                       
                                    <select class="selecter" name="user_id" id="user_id" data-width="100%" class="selectpicker" data-live-search="true" >
                                    <option value=''>Select {$user_type} Name</option>
                                        {foreach from=$user_array item=v}
                                            <option value={$v.user_id}>{$v.fullname}</option>
                                        {/foreach}
                                    </select>
                                </div>
                                {if isset($error['user_id'])}
                                    <span style="color:red">{$error['user_id']}</span>
                                {/if}
                            </div>
                        </div>
                                
                         <div class="form-group">
                            <label class="control-label col-md-3">New Password <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">
                                <div class="inputer">
                                    <div class="input-wrapper">                                                
                                        <input type="text" name="new_password" id="new_password" class="form-control" value="" placeholder = "Enter New Password">
                                    </div>
                                    {if isset($error['new_password'])}
                                        <span style="color:red">{$error['new_password']}</span>
                                    {/if}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Confirm Password <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">
                                <div class="inputer">
                                    <div class="input-wrapper">                                                
                                        <input type="text" name="confirm_password" id="confirm_password" class="form-control" value="" placeholder = "Re-Enter Password">
                                    </div> 
                                    {if isset($error['confirm_password'])}
                                        <span style="color:red">{$error['confirm_password']}</span>
                                    {/if}                                           
                                </div>
                            </div>
                        </div>
                                                            
                    </div><!--.form-content-->

                    <div class="form-buttons">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">  
                                <button class="btn btn-blue" name="submit" id="submit"  type="submit" value="submit">Update</button>                                 
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