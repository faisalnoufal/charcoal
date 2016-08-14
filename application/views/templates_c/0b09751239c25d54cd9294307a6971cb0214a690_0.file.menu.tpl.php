<?php /* Smarty version 3.1.27, created on 2016-04-15 09:42:55
         compiled from "/home/ajoul/public_html/sites/admin/application/views/templates/menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7402208665710b79f8de763_16380958%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b09751239c25d54cd9294307a6971cb0214a690' => 
    array (
      0 => '/home/ajoul/public_html/sites/admin/application/views/templates/menu.tpl',
      1 => 1459748774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7402208665710b79f8de763_16380958',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5710b79f8fbca5_43027938',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5710b79f8fbca5_43027938')) {
function content_5710b79f8fbca5_43027938 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7402208665710b79f8de763_16380958';
?>
<!-- BEGIN MENU LAYER -->
<div class="menu-layer">
    <ul>
        <li data-open-after="true">
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Home">Dashboard</a>
        </li>
        <li>
            <a href="javascript:;">Trip Details</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Active_trips">Search Active Trips</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Trip_history">Search Completed Trips</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Bookedtrip/Booked_Trip">Booked Trips</a></li>  
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Ongoing_trips">Active Trips</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Trip_list">Completed Trips</a></li>             
            </ul>
        </li> 
        <li>
            <a href="javascript:;">Pilot Management</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Register/Register_driver">Enroll New Pilot</a></li>                
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Complete_drivers">All Pilots</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Location/Full_driver_location">Pilot Location</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Profile/Driver_rating">Pilot Rating</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Drivers/My_referrals">My Referrals</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Drivers/Change_password">Change Password</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Drivers/Archive_user">Archive/Unarchive Pilot</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Drivers/Tax_renewal">Tax Renewal Report</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">Passenger Management</a>
            <ul class="child-menu">                
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Complete_customers">All Passengers</a></li>                
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Customer_rating">Passenger Rating</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/My_referrals">My Referrals</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Change_password">Change Password</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Customer/Archive_user">Archive/Unarchive Passenger</a></li>
            </ul>
        </li>       
        <li>
            <a href="javascript:;">Cab Management</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Cabs/Cab_management">Cab Type Management</a></li>               
            </ul>
        </li>
        <li>

            <a href="javascript:;">Passenger Ewallet Management</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Ewallet/Passenger_Fund_Management">Add/Deduct Fund</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Ewallet/Passenger_Fund_Details">Passenger Ewallet History</a></li>
            </ul>
        </li>
        <li>

            <a href="javascript:;">Pilot Ewallet Management</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Ewallet/Driver_Fund_Management">Incentive Management</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Ewallet/Driver_Fund_Details">Pilot Ewallet History</a></li>                
            </ul>
        </li>
        <li>
            <a href="javascript:;">Time & Distance </a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Time_management">Time Management</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Call_radius">Call Radius Settings</a></li>                
            </ul>
        </li>   
        <li>
            <a href="javascript:;">Fare Management</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Commission_Percentage">Wage Percent</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Surcharge/Surcharge_Management">Surcharge Management</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Cabs/Fare_management">Fare Settings</a></li>                
            </ul>
        </li>
        <li>
            <a href="javascript:;">Notifications</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Notifications/Notify_driver">Pilot Notifications</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Notifications/Notify_passenger">Passenger Notifications</a></li>
            </ul>
        </li> 
        <li>
            <a href="javascript:;">Coupon Management</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Coupon/Coupons">Coupon Generation</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Coupon/Coupon_list">Coupon List</a></li>
            </ul>
        </li> 
        <li>
            <a href="javascript:;">Report</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Report/Trip_report">Trip History Report</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Report/Active_trip_report">Active Trip Report</a></li>                
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Trip_list">Completed Trips</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/All_cancelled_trips">Cancelled Trips</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Trips/Call_reject_summary">Trip Request Rejects</a></li> 
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Report/Driver_report">Pilot Profile Report</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">Income Details</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Income/Income_report">Income Report</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Income/Monthly_payment_summary">Monthly Payment Summary</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Income/Monthly_payment">Monthly Payment Details</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Income/Customer_summary_report">Passenger Income Summary</a></li>                
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Income/Customer_report">Passenger Wise Income</a></li>                
            </ul>
        </li>
        <li>
            <a href="javascript:;">Ajoul Profile</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Support">Support Contact Settings</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/About_us">About Us Content</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Terms_conditions">Terms & Conditions Content</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Change_logo">Change Logo</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Change_account">Email and Password Change</a></li>
            </ul>
        </li>
         <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Surge/Surge_management">Surge Management</a>
        </li>   
        <li>
            <a href="javascript:;">Configuration Settings</a>
            <ul class="child-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Referral_point">Referral Point Settings</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Wallet_amount">Wallet Amount Management</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Minimum_amount">Minimum Wallet Amount</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Cancel_amount">Cancel Amount Settings</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Settings/Minimum_time">Minimum Time for Future Booking</a></li>
            </ul>
        </li>   
        
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
Login/logout">Logout</a>
        </li>

    </ul>
</div><!--.menu-layer-->
<!-- END OF MENU LAYER -->
<?php }
}
?>