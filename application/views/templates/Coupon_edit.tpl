{include file="header.tpl"  name=""}
<link rel="stylesheet" href="{$css_path}plugins.css">
{include file="page_header.tpl"  name=""}

<div class="row">
  <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title"> <h3>Coupon Edit Count</h3></div>
        </div><!--.panel-heading-->
        <div class="panel-body">

          <form action="" class="form-horizontal form-striped form-bordered parsley-validate" method="post" >

            <div class="form-content">
              
              <div class="panel" align="center">                
                <div class="panel-body">
                  <p>Coupon Text    : {$coupon[0]['coupon_text']}</p>
                  <p>Coupon Value   : {$coupon[0]['amount']}{if $coupon[0]['amount_or_percentage'] == 'percent'} % {else} Flat {/if}</p>
                  <p>Count Created  : {$coupon[0]['count']}</p>
                  <p>Used Count     : {$coupon[0]['used_count']}</p>                  
                </div><!--.panel-body-->
              </div><!--.panel-->              

              <!-- <input type="hidden" name="coupon_id" value="{$coupon[0]['coupon_id']}"> -->

              <div class="form-group">
                <label class="control-label col-md-3">Enter new count <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                <div class="col-md-5">
                  <div class="inputer">
                    <div class="input-wrapper">                                                
                      <input type="text" name="count" id="count" class="form-control" value="{$coupon[0]['count']}" placeholder = "Enter the Count" data-parsley-error-message="Please Enter Count">
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
                      <button type="submit" class="btn btn-blue" value="edt_coupon" name="edt_coupon">Update</button>
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

{include file="page_close.tpl"  name=""} 
