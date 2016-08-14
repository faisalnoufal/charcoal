<?php /* Smarty version 3.1.27, created on 2016-04-15 10:04:16
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/Home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1091048585710bca0991626_07298152%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b3e660e683f5345899b99faaf9f6965f59a18ec' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/Home.tpl',
      1 => 1458551445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1091048585710bca0991626_07298152',
  'variables' => 
  array (
    'date_temp_arr' => 0,
    'base_url' => 0,
    'trips_today' => 0,
    'trips' => 0,
    'cancelled_today' => 0,
    'cancelled' => 0,
    'online' => 0,
    'user' => 0,
    'rejects' => 0,
    'plugin_path' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710bca09e40c5_75656289',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710bca09e40c5_75656289')) {
function content_5710bca09e40c5_75656289 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1091048585710bca0991626_07298152';
?>
<!DOCTYPE html>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  

<?php echo $_smarty_tpl->getSubTemplate ("page_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  

<div class="display-animation">

    <div class="row image-row">

        <div class="col-md-6">

            <div class="row image-row">
                <div class="col-sm-12">

                    <div class="card tile card-green card-weather bg-image sample-bg-image15 material-animate">
                        <div class="card-heading">
                            <div class="card-action">
                                <a href="javascript:;" data-toggle="fake-reload"></a>
                            </div><!--.card-action-->
                        </div><!--.card-heading-->
                        <div class="card-body">
                            <div class="forecast-container">
                                <span class="temparature"><?php echo $_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['frst_day_temp'];?>
 <i class="wi wi-celsius"></i></span>
                                   
                                    <span class="place">Riyadh,Saudi Arabia</span>
                               
                                
                            </div>
                        </div><!--.card-body-->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li><?php echo $_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['frst_day'];?>
</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li><?php echo number_format($_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['frst_day_temp'],2);?>
<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li><?php echo $_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['scnd_day'];?>
</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li><?php echo number_format($_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['secd_day_temp'],2);?>
<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li><?php echo $_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['thrd_day'];?>
</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li><?php echo number_format($_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['thrd_day_temp'],2);?>
<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li><?php echo $_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['frth_day'];?>
</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li><?php echo number_format($_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['frth_day_temp'],2);?>
<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li><?php echo $_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['fifth_day'];?>
</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li><?php echo number_format($_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['fifth_day_temp'],2);?>
<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                                <div class="col-xs-3 col-sm-2 animate-item">
                                    <ul>
                                        <li><?php echo $_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['sixth_day'];?>
</li>
                                        <li><i class="wi wi-day-sunny-overcast"></i></li>
                                        <li><?php echo number_format($_smarty_tpl->tpl_vars['date_temp_arr']->value['0']['sixth_day_temp'],2);?>
<i class="wi wi-celsius"></i></li>
                                    </ul>
                                </div><!--.col-->
                            </div><!--.row-->
                        </div><!--.card-footer-->
                    </div><!--.card-->

                </div><!--.col-->
                <!--.col-->
            </div><!--.row-->
        </div><!--.col-->

        <div class="col-md-6">

            <div class="card tile card-dashboard-info card-light-blue material-animate">
                <div class="card-body">
                    <div class="card-icon"><i class="fa fa-bus"></i></div><!--.card-icon-->
                    <h4>Booked Trips</h4>
                    <p class="result" id="trip_today"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Todays_bookings"><?php echo $_smarty_tpl->tpl_vars['trips_today']->value;?>
 booking<?php if ($_smarty_tpl->tpl_vars['trips_today']->value > 1) {?>s<?php }?> today</a></p>
                    <small id="trip_total"><i class="fa fa-caret-up"></i> <?php echo $_smarty_tpl->tpl_vars['trips']->value;?>
 booking<?php if ($_smarty_tpl->tpl_vars['trips']->value > 1) {?>s<?php }?> total</small>
                </div>
            </div><!--.card-->

            <div class="card tile card-dashboard-info card-blue-grey material-animate">
                <div class="card-body">
                    <div class="card-icon"><i class="fa fa-trash"></i></div><!--.card-icon-->
                    <h4>Cancelled Trips</h4>
                    <p class="result" id="cancelled_today"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Cancelled_trips"><?php echo $_smarty_tpl->tpl_vars['cancelled_today']->value;?>
 cancelled trip<?php if ($_smarty_tpl->tpl_vars['cancelled_today']->value > 1) {?>s<?php }?> today</a></p>
                    <small id="cancelled_total"><i class="fa fa-caret-up"></i> <?php echo $_smarty_tpl->tpl_vars['cancelled']->value;?>
 cancelled trip<?php if ($_smarty_tpl->tpl_vars['cancelled']->value > 1) {?>s<?php }?> total</small>
                </div>
            </div><!--.card-->

            <div class="card tile card-dashboard-info card-teal material-animate">
                <div class="card-body">
                    <div class="card-icon"><i class="glyphicon glyphicon-user"></i></div><!--.card-icon-->
                    <h4>Online users</h4>
                    <p class="result" id="online_passenger_today"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Online_users">
                    <?php echo $_smarty_tpl->tpl_vars['online']->value['passenger'];?>
 passenger<?php if ($_smarty_tpl->tpl_vars['online']->value['passenger'] > 1) {?>s<?php }?> online</a></p>
                    <p class="result" id="online_driver_today"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Drivers/Online_users">
                    <?php echo $_smarty_tpl->tpl_vars['online']->value['driver'];?>
 pilot<?php if ($_smarty_tpl->tpl_vars['online']->value['driver'] > 1) {?>s<?php }?> online</a></p>
                    <small id="passenger_driver_total"><i class="fa fa-caret-up"></i> 
                    <?php echo $_smarty_tpl->tpl_vars['user']->value['driver'];?>
 pilot<?php if ($_smarty_tpl->tpl_vars['user']->value['driver'] > 1) {?>s<?php }?> and <?php echo $_smarty_tpl->tpl_vars['user']->value['passenger'];?>
 passenger<?php if ($_smarty_tpl->tpl_vars['user']->value['passenger'] > 1) {?>s<?php }?> total
                    </small>
                </div>
            </div><!--.card-->

        </div>

        <style type="text/css">

            #data-table {
                font-family: calibri, arial;
                width: 100%;
            }

            #data-table thead td {
                font-weight: bold;
                background-color: #337ab7;
                // background-color: #8CCCF1;
            }

            #data-table td {
                // border: 1px solid #466E85;
                width: 25%;
                padding: 10px;
            }

        </style>


        <input type="hidden" name="last_trp_id" id="last_trp_id" <?php if (isset($_smarty_tpl->tpl_vars['rejects']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['rejects']->value['reject_id'];?>
" <?php }?>>
        <!-- <div id='not_div'></div> -->

    </div><!--.col-->

</div><!--.display-animation-->
<?php echo $_smarty_tpl->getSubTemplate ("Show_drivers.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 

<div class="row">
<div class="col-md-12">
    <div class="card card-pricing card-pricing-dark active">

        <div class="card-heading">
            <h4>Rejected Trips- <small>Recently rejected trip details</small></h4>

        </div><!--.card-heading-->

        <div class="card-body col-centered">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-body">
                        <table id="data-table"></table>
                    </div><!--.panel-body-->
                </div><!--.panel-->
            </div>
        </div><!--.card-body-->
    </div><!--.card-->
</div><!--.col-md-3-->
</div>


<!--.display-animation-->
<!-- <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plugin_path']->value;?>
html5-desktop-notifications/desktop-notify.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
html5-notifications.js"><?php echo '</script'; ?>
> -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
arrival_notification.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_path']->value;?>
home.js"><?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("layer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
  

<?php echo '<script'; ?>
>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        ArrivalNotification.init();
        // Html5Notifications.init();        
        setInterval(call_init, 30000);
    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("page_close.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('name'=>''), 0);
?>
 
<?php }
}
?>