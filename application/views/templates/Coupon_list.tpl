{include file="header.tpl"  name=""}
<link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/media/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.css">
<link rel="stylesheet" href="{$css_path}plugins.css">
<link rel="stylesheet" href="{$plugin_path}jquery-icheck/skins/all.css">
{include file="page_header.tpl"  name=""}
             
    <div class="row">
        <div class="col-md-12">
          <div class="panel" style="font-size: small">
            <!-- <div class="panel-heading">
                <div class="panel-title"><h4>COUPON LIST</h4></div>
            </div> --><!--.panel-heading-->
            <div class="panel-body">

                <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post">

                    <div class="form-content">
                        <input type="hidden" name="path_root" id="path_root" value="{$base_url}" />

                        <div class="form-group">
                            <label class="control-label col-md-3">Filter by Staus</label>
                            <div class="col-md-5">
                                <div class="icheck icheck-minimal">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="active" {if $status == 'active'}checked {/if}>
                                            Active
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="inactive" {if $status == 'inactive'} checked {/if}>
                                            InActive
                                        </label>
                                    </div>                                    
                                </div><!--.icheck-->                               
                            </div>                            
                        </div><!--.form-group-->

                    </div><!--.form-content-->

                    <div class="form-buttons">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-blue" value="submit" name="submit">Filter Now</button>
                            </div>
                        </div>
                    </div>

                </form>

              <div class="overflow-table">
                {if count(coupn)>0}
                <table class="display datatables-basic dataTable" style="font-size: small">
                  <thead>
                    <tr>                  
                      <th>Sl.No</th>
                      <th>Coupon Text</th>                    
                    {*  <th>Coupon Code</th>          *}          
                      <th>Created time</th> 
                      <th>Expiry Date</th> 
                      <th>Amount</th>
                      <th>Count</th>
                      <th>Used Count</th>
                      <th>Send User Count</th>
                      <th>Used User List</th>
                      <th>Action(s)</th>
                    </tr>
                  </thead>
                  <tbody>
                    {foreach from=$coupn item="v"}                      
                      <tr>
                        <td>{counter}</td>
                        <td>{$v.coupon_text}</td>
                       {* <td>{$v.coupon_code}</td>*}
                        <td>{$v.created_time}</td>
                        <td>{$v.expiry_date}</td>
                        {if $v.amount_or_percentage =='percent'}
                          <td>{$v.amount}%</td>
                        {else}
                          <td>{$v.amount}</td>
                        {/if}                        
                        <td><center>{$v.count}</center></td>
                        <td><center>{$v.used_count}</center></td>
                        <td><center>{$v.send_count}</center></td>                        
                        <td>
                            {if $v.used_count > 0}
                            <button class="label label-success" data-toggle="modal" onclick="javascript:view_details({$v.coupon_id})" data-target="#panel-modal4">
                            Used Users
                            </button>
                            {else}
                            No Users
                            {/if}
                        </td>
                        <td>
                        {if $v.used_count < $v.count && $v.expiry_date > date('Y-m-d')}
                            <a href="{$base_url}Coupon/Coupon_send/{$v.coupon_id}" class="label label-primary" target="_blank">Send To Users</a>
                            <a href="{$base_url}Coupon/Coupon_edit/{$v.coupon_id}" class="label label-info" target="_blank">Edit Coupon</a>
                        {else if $v.expiry_date > date('Y-m-d')}
                            <a href="{$base_url}Coupon/Coupon_edit/{$v.coupon_id}" class="label label-info" target="_blank">Edit Coupon</a>
                        {/if}
                        </td>
                      </tr>                      
                    {/foreach}
                    <div class="modal fade full-height" id="panel-modal4" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">COUPON APPLIED USER LIST</h4>
                                </div>
                                <div class="modal-body">
                                    <p><div id="content"></div></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-flat-primary" data-dismiss="modal">CLOSE</button>                                    
                                </div>
                            </div>
                        </div>
                    </div><!--.modal-->
                  </tbody> 
                  <tfoot>                                       
                      <tr style="text-align:left;font-size: 18px">
                          <td colspan="11">
                              <form method="post" action="{$base_url}Excel/Coupon_list">  
                                  <input type="hidden" name="stat" value="{$status}">                                
                                  <button>Create Excel <img src="{$image_path}/excel_file.gif" alt="Excel"/></button>
                              </form>
                          </td>
                      </tr>
                  </tfoot>
                </table>
                {/if}              
              </div><!--.form-content-->
            </div>
          </div>
        </div>
    </div>
            
    
{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}
<script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
<script src="{$plugin_path}datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{$plugin_path}datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
<script src="{$js_path}/tables-datatables.js"></script>
<script src="{$plugin_path}jquery-icheck/icheck.min.js"></script>
<script src="{$js_path}notifications.js"></script>
<script>
  $(document).ready(function () {
    Pleasure.init();
    Layout.init();
    TablesDataTables.init();
    FormsIcheck.init();                    
  });
</script>
<script src="{$js_path}/coupen_management.js"></script>
{include file="page_close.tpl"  name=""} 
