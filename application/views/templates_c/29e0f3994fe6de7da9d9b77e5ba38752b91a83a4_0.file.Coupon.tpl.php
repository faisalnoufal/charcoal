<?php /* Smarty version 3.1.27, created on 2016-07-27 05:44:32
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Coupon.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:113121046257982e20e70fd9_04571510%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29e0f3994fe6de7da9d9b77e5ba38752b91a83a4' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Coupon.tpl',
      1 => 1454351252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113121046257982e20e70fd9_04571510',
  'variables' => 
  array (
    'plugin_path' => 0,
    'css_path' => 0,
    'error' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57982e20ecf883_72449626',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57982e20ecf883_72449626')) {
function content_57982e20ecf883_72449626 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '113121046257982e20e70fd9_04571510';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">
<!-- <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/css/jasny-bootstrap.min.css"> -->
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


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
                      <?php if (isset($_smarty_tpl->tpl_vars['error']->value['coupon_text'])) {?>
                        <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['coupon_text'];?>
</span>
                      <?php }?>
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
                  <?php if (isset($_smarty_tpl->tpl_vars['error']->value['percent_or_value'])) {?>
                    <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['percent_or_value'];?>
</span>
                  <?php }?>
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
                  <?php if (isset($_smarty_tpl->tpl_vars['error']->value['amount'])) {?>
                      <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['amount'];?>
</span>
                  <?php }?>
                </div>                
              </div>

              <div class="form-group">
                  <label class="control-label col-md-3">Enter Coupon Expiry Date <span style="color: red;vertical-align:super;font-size:small">*</span></label>
                  <div class="col-md-3">
                      <div class="input-wrapper">
                          <input type="text" style="100%" name="expiry_date" class="form-control bootstrap-daterangepicker-basic" placeholder="Coupon Expiry Date" data-parsley-error-message="Please Enter Coupon Expiry Date" />
                      </div>
                      <?php if (isset($_smarty_tpl->tpl_vars['error']->value['expiry_date'])) {?>
                          <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['expiry_date'];?>
</span>
                      <?php }?>
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
                  <?php if (isset($_smarty_tpl->tpl_vars['error']->value['count'])) {?>
                      <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['count'];?>
</span>
                  <?php }?>
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
    
<?php echo $_smarty_tpl->getSubTemplate ("page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("layer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
parsleyjs/dist/parsley.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
jasny-bootstrap/dist/js/jasny-bootstrap.min.js"><?php echo '</script'; ?>
> -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
notifications.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>  
  $(document).ready(function () {
    Pleasure.init();
    Layout.init();
    FormsPickers.init();
  });  
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
/coupen_management.js"><?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 
<?php }
}
?>