<?php /* Smarty version 3.1.27, created on 2016-04-20 08:57:48
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Change_password.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:4079829155717448c401351_39478466%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7e5133091596d452888705183ea677f879333a3' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Change_password.tpl',
      1 => 1454329298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4079829155717448c401351_39478466',
  'variables' => 
  array (
    'css_path' => 0,
    'user_type' => 0,
    'user_array' => 0,
    'v' => 0,
    'error' => 0,
    'plugin_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5717448c435627_27444832',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5717448c435627_27444832')) {
function content_5717448c435627_27444832 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '4079829155717448c401351_39478466';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_path']->value;?>
plugins.css">        
<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>


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
                                    <option value=''>Select <?php echo $_smarty_tpl->tpl_vars['user_type']->value;?>
 Name</option>
                                        <?php
$_from = $_smarty_tpl->tpl_vars['user_array']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                            <option value=<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
><?php echo $_smarty_tpl->tpl_vars['v']->value['fullname'];?>
</option>
                                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                                    </select>
                                </div>
                                <?php if (isset($_smarty_tpl->tpl_vars['error']->value['user_id'])) {?>
                                    <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['user_id'];?>
</span>
                                <?php }?>
                            </div>
                        </div>
                                
                         <div class="form-group">
                            <label class="control-label col-md-3">New Password <span style="color: red;vertical-align:super;font-size:small"> *</span></label>
                            <div class="col-md-5">
                                <div class="inputer">
                                    <div class="input-wrapper">                                                
                                        <input type="text" name="new_password" id="new_password" class="form-control" value="" placeholder = "Enter New Password">
                                    </div>
                                    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['new_password'])) {?>
                                        <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['new_password'];?>
</span>
                                    <?php }?>
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
                                    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['confirm_password'])) {?>
                                        <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value['confirm_password'];?>
</span>
                                    <?php }?>                                           
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
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 <?php }
}
?>