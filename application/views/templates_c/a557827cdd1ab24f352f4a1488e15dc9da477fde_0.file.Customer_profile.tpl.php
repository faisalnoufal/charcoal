<?php /* Smarty version 3.1.27, created on 2016-07-24 15:08:20
         compiled from "/opt/lampp/htdocs/admin/application/views/templates/Customer_profile.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18485028445794bdc4e6fee0_70383257%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a557827cdd1ab24f352f4a1488e15dc9da477fde' => 
    array (
      0 => '/opt/lampp/htdocs/admin/application/views/templates/Customer_profile.tpl',
      1 => 1454349610,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18485028445794bdc4e6fee0_70383257',
  'variables' => 
  array (
    'plugin_path' => 0,
    'image_path' => 0,
    'profile_pic' => 0,
    'fullname' => 0,
    'email' => 0,
    'mobile' => 0,
    'join_date' => 0,
    'timeline' => 0,
    'v' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5794bdc4ed1eb4_86361579',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5794bdc4ed1eb4_86361579')) {
function content_5794bdc4ed1eb4_86361579 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/opt/lampp/htdocs/admin/system/libraries/Smarty/libs/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '18485028445794bdc4e6fee0_70383257';
?>
<!DOCTYPE html>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  

<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-daterangepicker/daterangepicker-bs3.css">

<div class="content">

    <div class="page-header full-content parallax" style="height: 300px; overflow: hidden">
        <div class="parallax-bg" style="background: url('<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
24.jpg') 50% 50%; background-size: cover; width: 100%; height: 100%; position: absolute; left: 0; top: 0;">
        </div>

        <div class="profile-info">
            <div class="profile-photo">
                <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
faces/passenger/<?php echo $_smarty_tpl->tpl_vars['profile_pic']->value;?>
" alt="">
            </div><!--.profile-photo-->
            <div class="profile-text light">
                <?php echo $_smarty_tpl->tpl_vars['fullname']->value;?>

                <span class="caption">Passenger</span>
            </div><!--.profile-text-->
        </div><!--.profile-info-->

        <div class="row">
            <div class="col-sm-6">
                <h1>Passenger Profile <!-- <small><?php echo $_smarty_tpl->tpl_vars['fullname']->value;?>
</small> --></h1>
            </div><!--.col-->
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="ion-home"></i></a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#" class="active">Customer Profile</a></li>
                </ol>
            </div> --><!--.col-->
        </div><!--.row-->

        <div class="header-tabs scrollable-tabs sticky">
            <ul class="nav nav-tabs tabs-active-text-white tabs-active-border-yellow">
                <li class="active"><a href="#about" data-toggle="tab" class="btn-ripple">About</a></li>
                

            </ul>
        </div>

    </div><!--.page-header-->

    <div class="row user-profile">
        <div class="col-md-12">
            <div class="tab-content without-border">

                <div id="about" class="tab-pane active">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav nav-tabs borderless vertical">
                                <li class="active"><a href="#about_overview" data-toggle="tab">Overview</a></li>
                                <li><a href="#about_timeline" data-toggle="tab">Timeline</a></li>
                            </ul>
                        </div><!--.col-md-3-->
                        <div class="col-md-9">
                            <div class="tab-content">

                                <div class="tab-pane active" id="about_overview">
                                    <div class="legend">Basic Information</div>
                                    <div class="row">
                                        <div class="col-md-3">Name</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['fullname']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Email</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Mobile</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    <div class="row">
                                        <div class="col-md-3">Joining Date</div><!--.col-md-3-->
                                        <div class="col-md-9"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['join_date']->value);?>
</div><!--.col-md-9-->
                                    </div><!--.row-->
                                    
                                   
                                </div><!--#about_overview.tab-pane-->

                                <div class="tab-pane" id="about_timeline">
                                    <div class="timeline single">
                                        <?php
$_from = $_smarty_tpl->tpl_vars['timeline']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                            <div class="frame">
                                                <div class="timeline-badge">
                                                    <i class="fa fa-headphones"></i>
                                                </div><!--.timeline-badge-->
                                                <span class="timeline-date"><?php echo $_smarty_tpl->tpl_vars['v']->value['unique_id'];?>
 - TRIP <?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
</span>
                                                <div class="timeline-content">
                                                    <p>Driver : <?php echo $_smarty_tpl->tpl_vars['v']->value['drivername'];?>
</p>   
                                                    <p>Order Time : <?php echo $_smarty_tpl->tpl_vars['v']->value['order_date'];?>
</p>
                                                    <p>Start Time : <?php echo $_smarty_tpl->tpl_vars['v']->value['start_time'];?>
</p>
                                                    <p>Start Location : <?php echo $_smarty_tpl->tpl_vars['v']->value['start_location'];?>
</p>
                                                    <p>End Location : <?php echo $_smarty_tpl->tpl_vars['v']->value['end_location'];?>
</p>
                                                </div><!--.timeline-content-->
                                            </div><!--.frame-->
                                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>                                       
                                    </div><!--.timeline-->
                                </div><!--#about_timeline.tab-pane-->

                            </div><!--.tab-content-->

                        </div><!--.col-md-9-->
                    </div><!--.row-->
                </div><!--#about.tab-pane-->

              
            </div><!--.tab-content-->
        </div><!--.col-->
    </div><!--.row-->

    

    <!-- Bootstrap Image Gallery lightbox -->
    <!-- To use original bootstrap modal window erase data-use-boostrap-model attr -->

</div><!--.content-->

<div class="layer-container">

    <!-- BEGIN MENU LAYER -->
    <div class="menu-layer">
        <ul>
            <li>
                <a href="index.html">Dashboard</a>
            </li>

        </ul>
    </div><!--.menu-layer-->
    <!-- END OF MENU LAYER -->

    <!-- BEGIN SEARCH LAYER -->
    <div class="search-layer">
        <div class="search">
            <form action="pages-search-results.html">
                <div class="form-group">
                    <input type="text" id="input-search" class="form-control" placeholder="type something">
                    <button type="submit" class="btn btn-default disabled"><i class="ion-search"></i></button>
                </div>
            </form>
        </div><!--.search-->

        <div class="results">
            <div class="row">
                <div class="col-md-4">
                    <div class="result result-users">
                        <h4>USERS <small>(3)</small></h4>

                        <ul class="list-material">
                            <li class="has-action-left">
                                <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                <a href="#" class="visible">
                                    <div class="list-action-left">
                                        <img src="../../assets/globals/img/faces/1.jpg" class="face-radius" alt="">
                                    </div>
                                    <div class="list-content">
                                        <span class="title">Pari Subramanium</span>
                                        <span class="caption">Legacy Response Assistant</span>
                                    </div>
                                </a>
                            </li>


                        </ul>

                    </div><!--.results-user-->
                </div><!--.col-->



            </div><!--.row-->
        </div><!--.results-->
    </div><!--.search-layer-->
    <!-- END OF SEARCH LAYER -->

</div><!--.layer-container-->
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
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
validate_Cab_Management.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        //UserPages.profile();
        FormsValidationsParsley.init();
        FormsPickers.init();

    });

    var FormsPickers = {
        dateRangePicker: function () {
            $('.bootstrap-daterangepicker-basic').daterangepicker({
                singleDatePicker: true
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            }
            );
        },
        init: function () {
            this.dateRangePicker();
        }
    }
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 <?php }
}
?>