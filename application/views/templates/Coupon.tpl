{include file="header.tpl"  name=""}
<link rel="stylesheet" href="{$plugin_path}bootstrap-daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="{$css_path}plugins.css">
<!-- <link rel="stylesheet" href="{$plugin_path}jasny-bootstrap/dist/css/jasny-bootstrap.min.css"> -->
{include file="page_header.tpl"  name=""}

<div class="row">
  <div class="col-md-12">
    <div class="panel">
        <!-- <div class="panel-heading">
            <div class="panel-title"> <h3>Coupon Generation</h3></div>
        </div> --><!--.panel-heading-->
        <div class="panel-body">

          <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post" >

            <div class="form-content">

              <div class="form-group">
                  <label class="control-label col-md-3">Coupon Text <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                  <div class="col-md-9">
                      <div class="input-wrapper">                          
                          <textarea class="form-control" rows="2" placeholder="Enter coupon text" name="coupon_text" data-parsley-error-message="Please Enter Coupon Text "></textarea>
                      </div>
                      {if isset($error['coupon_text'])}
                        <span style="color:red">{$error['coupon_text']}</span>
                      {/if}
                  </div>                  
              </div>

              <div class="form-group">
                <label class="control-label col-md-3">Percentage or Value <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                <div class="col-md-5">                                
                  <div class="input-wrapper">                                                
                    <select class="selecter" name="percent_or_value" id="percent_or_value" data-width="100%" data-parsley-error-message="Please Select Coupon Type" class="selectpicker" data-live-search="true" >
                      <option value='percent'>Percent</option>
                      <option value='value'>Value</option>
                    </select>                          
                  </div>
                  {if isset($error['percent_or_value'])}
                    <span style="color:red">{$error['percent_or_value']}</span>
                  {/if}
                </div>                
              </div>
             
              <div class="form-group">
                <label class="control-label col-md-3">Enter the Amount <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                <div class="col-md-5">                           
                  <div class="input-wrapper">                                                
                      <input type="number" name="amount" id="amount" class="form-control" value="" placeholder = "Enter Amount" onblur="ismorethanHundred()" data-parsley-error-message="Please Enter Amount" >
                  </div>
                  <div id='check' style="color:red"></div>                  
                  <div class="form-group">
                    <div class="col-sm-12" id="referal_div"  height="30" class="text" style="display:none;">
                    </div>
                  </div>
                  {if isset($error['amount'])}
                      <span style="color:red">{$error['amount']}</span>
                  {/if}
                </div>                
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Enter Coupon Expiry Date <span style="color: red;vertical-align:super;font-size:small">*</span></label>
                  <div class="col-md-3">
                      <div class="input-wrapper">
                          <input type="text" style="100%" name="expiry_date" class="form-control bootstrap-daterangepicker-basic" placeholder="Coupon Expiry Date" data-parsley-error-message="Please Enter Coupon Expiry Date" />
                      </div>
                      {if isset($error['expiry_date'])}
                          <span style="color:red">{$error['expiry_date']}</span>
                      {/if}
                  </div>                  
              </div>

              <div class="form-group">
                <label class="control-label col-md-3">Enter the Count <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                <div class="col-md-5">
                  <div class="inputer">
                    <div class="input-wrapper">                                                
                      <input type="text" name="count" id="count" class="form-control" value="" placeholder = "Enter the Count" data-parsley-error-message="Please Enter Count">
                    </div>                                               
                  </div>
                  {if isset($error['count'])}
                      <span style="color:red">{$error['count']}</span>
                  {/if}
                </div>
              </div>

              <div class="form-buttons">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">

                      <button type="submit" class="btn btn-blue" value="gen_oupon" name="gen_oupon">Generate Coupon</button>

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

<script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
<script src="{$plugin_path}bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- <script src="{$plugin_path}jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script> -->
<script src="{$js_path}notifications.js"></script>

<script>  
  $(document).ready(function () {
    Pleasure.init();
    Layout.init();
    FormsPickers.init();
  });  
</script>
<script src="{$js_path}/coupen_management.js"></script>
{include file="page_close.tpl"  name=""} 
