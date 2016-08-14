<?php /* Smarty version 3.1.27, created on 2016-06-26 18:25:10
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Search_user_details.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1897542765577001e6908127_69593705%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be0695c504cf151b3cfb14c85e2f53b73d904bce' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Search_user_details.tpl',
      1 => 1454343234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1897542765577001e6908127_69593705',
  'variables' => 
  array (
    'common_searching' => 0,
    'base_url' => 0,
    'driver_search_details' => 0,
    'image_path' => 0,
    'v' => 0,
    'user_search_details' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577001e692bee5_05519821',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577001e692bee5_05519821')) {
function content_577001e692bee5_05519821 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1897542765577001e6908127_69593705';
?>


<div class="">
    <div class="search">
        
        <?php if ($_smarty_tpl->tpl_vars['common_searching']->value == 'yes') {?>
        <form action="" class="form-horizontal form-striped form-bordered" method="post" enctype="multipart/form-data" name="search_form">
            <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">   
            <div class="form-group">
                <input type="text" id="input_search" class="form-control" placeholder="type something" name="input_search" value="" onKeyUp="getAllDetails()" autocomplete='Off' />
                <button type="submit" class="btn btn-default" name="search_user" id="search_user" value="submit"><i class="ion-search"></i></button>
            </div>
        </form>
         <?php } else { ?>
             <input type="hidden" name="path_root" id="path_root" value="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">   
            <div class="form-group">
                <input type="text" id="input_search" class="form-control" placeholder="type something" name="input_search" value="" onKeyUp="getAllDetails()" autocomplete='Off' />
                <button type="submit" class="btn btn-default" name="search_user" id="search_user" value="submit"><i class="ion-search"></i></button>
            </div>
        <?php }?>
    </div>
    <div class="results">
        <div class="row">
            <div class="col-md-4" id="list_drivers">
                <div class="result result-users">
                    <h4>PILOTS <small>(<?php echo count($_smarty_tpl->tpl_vars['driver_search_details']->value);?>
)</small></h4>

                    <ul class="list-material" id="list_drivers1">
                        <?php
$_from = $_smarty_tpl->tpl_vars['driver_search_details']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                            <li class="has-action-left">
                                <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                <a href="#" class="visible">
                                    <div class="list-action-left">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
faces/<?php echo $_smarty_tpl->tpl_vars['v']->value['profile_pic'];?>
" class="face-radius" alt="">
                                    </div>
                                    <div class="list-content">
                                        <span class="title"><?php echo $_smarty_tpl->tpl_vars['v']->value['first_name'];?>
</span>
                                        <span class="caption"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"><div class="caption"><strong>View Profile</strong></div></a></span>                                        
                                    </div>
                                </a>
                            </li>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                    </ul>

                </div><!--.results-driver-->
            </div><!--.col-->
            <div class="col-md-4" id="list_users">
                <div class="result result-users">
                    <h4>PASSENGERS <small>(<?php echo count($_smarty_tpl->tpl_vars['user_search_details']->value);?>
)</small></h4>

                    <ul class="list-material" id="list_users1">
                        <?php
$_from = $_smarty_tpl->tpl_vars['user_search_details']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                            <li class="has-action-left">
                                <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                <a href="#" class="visible">
                                    <div class="list-action-left">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
faces/passenger/<?php echo $_smarty_tpl->tpl_vars['v']->value['profile_pic'];?>
" class="face-radius" alt="">
                                    </div>
                                    <div class="list-content">
                                        <span class="title"><?php echo $_smarty_tpl->tpl_vars['v']->value['user_name'];?>
</span>
                                        <span class="caption"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Profile_view/<?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
"><div class="caption"><strong>View Profile</strong></div></a></span>                                        
                                    </div>
                                </a>
                            </li>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>

                    </ul>

                </div><!--.results-user-->
            </div>

        </div><!--.row-->
    </div><!--.results-->
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
search.js"><?php echo '</script'; ?>
>
<?php }
}
?>