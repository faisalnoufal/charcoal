<?php /* Smarty version 3.1.27, created on 2016-06-26 18:25:10
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/page_header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1468807147577001e6894fc8_02043740%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '393eaedbe5b307a0645049fc591bceefd6faaaa7' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/page_header.tpl',
      1 => 1452511452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1468807147577001e6894fc8_02043740',
  'variables' => 
  array (
    'page_heading' => 0,
    'MESSAGE_DETAILS' => 0,
    'MESSAGE_STATUS' => 0,
    'MESSAGE_TYPE' => 0,
    'message_class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577001e68a67a2_69848124',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577001e68a67a2_69848124')) {
function content_577001e68a67a2_69848124 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1468807147577001e6894fc8_02043740';
?>
 
<div class="page-header full-content">
    <div class="row">
        <div class="col-sm-6">
            <h1><?php echo $_smarty_tpl->tpl_vars['page_heading']->value;?>
 </h1>
        </div><!--.col-->
        
    </div><!--.row-->
</div><!--.page-header-->

<?php if ($_smarty_tpl->tpl_vars['MESSAGE_DETAILS']->value) {?>
<?php if ($_smarty_tpl->tpl_vars['MESSAGE_STATUS']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['MESSAGE_TYPE']->value) {?>
        <?php $_smarty_tpl->tpl_vars["message_class"] = new Smarty_Variable("errorHandler alert alert-success", null, 0);?>
        
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["message_class"] = new Smarty_Variable("errorHandler alert alert-danger", null, 0);?>
        
    <?php }?>

    <div id="message_box"  class="<?php echo $_smarty_tpl->tpl_vars['message_class']->value;?>
">

        <div id="message_note"> 
            <table>
                <tr>
                    <td>                            
                        <?php echo $_smarty_tpl->tpl_vars['MESSAGE_DETAILS']->value;?>

                    </td>
                </tr>
            </table>
        </div>
        <a href="#" id= "close_link" class="panel-close pull-right" style="margin-top: -18px;"> <i class="fa fa-times"></i></a>
    </div>
<?php }?>
<?php }?>

<?php }
}
?>