<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require_once 'Core_Api_Controller.php';

class Passenger extends Core_Api_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['login_post']['limit'] = 1; // 1 requests per hour per user/key        
    }

    private function _check_key($check_key) {
        $app_key = 'Infinite_MLM_Cab_Management_System@passenger_login';

        if ($check_key == MD5($app_key))
            return true;
        else
            return false;
    }

    public function login() {
        $username = $this->security->xss_clean(trim($this->input->post('username')));
        $password = $this->security->xss_clean(trim($this->input->post('password')));
        $acc_type = $this->security->xss_clean(trim($this->input->post('acc_type')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($username != NULL && $username != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                if (!$acc_type)
                    $acc_type = 'normal';

                $user_id = $this->Api_model->login_passenger($username, $password, $acc_type);

                if (count($user_id) > 0) {
                    if (trim($user_id['verified']) == 0) {
                        $return = array(
                            'status' => FALSE,
                            'data' => array('user_status' => 'not_verified', 'user_id' => $user_id['id']),
                            'message' => 'User account not verified yet!'
                        );
                        echo json_encode($return);
                        die();
                    } else if (trim($user_id['status']) == 'no') {
                        $support_no = $this->Api_model->get_support_nos();

                        $return = array(
                            'status' => FALSE,
                            'data' => array('user_status' => 'blocked', 'support_no' => $support_no),
                            'message' => 'User archieved by Admin!'
                        );
                        echo json_encode($return);
                        die();
                    } else {
                        $passenger_details = $this->Api_model->get_passenger_details($user_id['id']);

                        $return = array(
                            'status' => TRUE,
                            'data' => (array) $passenger_details,
                            'message' => 'Login Success!'
                        );
                        echo json_encode($return);
                        die();
                    }
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array('user_status' => 'active'),
                        'message' => 'Username or Password Incorrect!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array('user_status' => 'active'),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array('user_status' => 'active'),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function setlocation() {
        $latitude = $this->security->xss_clean(trim($this->input->post('latitude')));
        $longitude = $this->security->xss_clean(trim($this->input->post('longitude')));
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $time = $this->security->xss_clean(trim($this->input->post('time')));
        $status = $this->security->xss_clean(trim($this->input->post('status')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($latitude != NULL && $latitude != '' && $longitude != NULL && $longitude != '' && $userid != NULL && $userid != '' && $time != NULL && $time != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $user_status = $this->Api_model->is_active_passenger($userid);

                if ($user_status == 'no') {
                    $support_no = $this->Api_model->get_support_nos();
                    $this->Api_model->set_passenger_location($latitude, $longitude, $userid, $time, 1);

                    $return = array(
                        'status' => FALSE,
                        'data' => array('user_status' => 'blocked', 'support_no' => $support_no),
                        'message' => 'User archieved by Admin!'
                    );
                    echo json_encode($return);
                    die();
                }

                $update = $this->Api_model->set_passenger_location($latitude, $longitude, $userid, $time, $status);

                if ($update) {
                    $return = array(
                        'status' => TRUE,
                        'data' => array('user_status' => 'active'),
                        'message' => 'Updated'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array('user_status' => 'active'),
                        'message' => 'Update Failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array('user_status' => 'active'),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array('user_status' => 'active'),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function bookjourney() {  
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $start_latitude = $this->security->xss_clean(trim($this->input->post('from_latitude')));
        $start_longitude = $this->security->xss_clean(trim($this->input->post('from_longitude')));
        $end_latitude = $this->security->xss_clean(trim($this->input->post('to_latitude')));
        $end_longitude = $this->security->xss_clean(trim($this->input->post('to_longitude')));
        $cab_id = $this->security->xss_clean(trim($this->input->post('cabtype')));
        $coupon_id = $this->security->xss_clean(trim($this->input->post('coupon_id')));
        $pay_mode = $this->security->xss_clean(trim($this->input->post('pay_mode')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        $distance = array('distance' => 0);

        if ($user_id != NULL && $user_id != '' && $start_latitude != NULL && $start_latitude != '' && $start_longitude != NULL && $start_longitude != '' && $cab_id != NULL && $cab_id != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                if ($end_longitude && $end_latitude) 
                {
                    $distance = $this->Api_model->distance($start_latitude, $start_longitude, $end_latitude, $end_longitude);

                    if (!$distance) {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'Check your coordinates.!'
                        );
                        echo json_encode($return);
                        die();
                    }
                }

                if (!$pay_mode)
                    $pay_mode = 'by_cash';

                $fare_estimate = $this->Api_model->calculate_fare($distance['distance'], $cab_id);
                $data = array();

                if ($coupon_id) {
                    $data = $this->Api_model->get_coupon_details($coupon_id);

                    if (count($data) > 0) {
                        if ($data['type'] == 'percent') {
                            $fare_estimate['discount'] = $fare_estimate['total_charge'] * ($data['amount'] / 100);
                        } else {
                            $fare_estimate['discount'] = $data['amount'];
                        }

                        if ($fare_estimate['discount'] >= $fare_estimate['total_charge']) {
                            $fare_estimate['total_charge'] = 0;
                        } else {
                            $fare_estimate['total_charge'] = $fare_estimate['total_charge'] - $fare_estimate['discount'];
                        }
                    } else {
                        $fare_estimate['discount'] = 'Coupon Expired!';
                    }
                }

                // $this->db->trans_start();

                // $unique_id = $this->Api_model->get_next_uniqueid();

                // $unique_id = TRIP_PREFIX . $unique_id;

                // if (count($data) > 0) {
                //     $trip_id = $this->Api_model->insert_temp_trip($user_id, $start_latitude, $start_longitude, $end_latitude, $end_longitude, $cab_id, $unique_id, $coupon_id, $pay_mode);
                // } else {
                //     $trip_id = $this->Api_model->insert_temp_trip($user_id, $start_latitude, $start_longitude, $end_latitude, $end_longitude, $cab_id, $unique_id, '', $pay_mode);
                // }

                // $this->db->trans_complete();

                //new_start 
//                while(!$this->Api_model->locak_table())
  //              {   
      //              sleep(1);
    //            }    

                $this->db->trans_begin();

                $unique_id = $this->Api_model->get_next_uniqueid();

                $unique_id = TRIP_PREFIX . $unique_id;

                if (count($data) > 0) {
                    $trip_id = $this->Api_model->insert_temp_trip($user_id, $start_latitude, $start_longitude, $end_latitude, $end_longitude, $cab_id, $unique_id, $coupon_id, $pay_mode);
                } else {
                    $trip_id = $this->Api_model->insert_temp_trip($user_id, $start_latitude, $start_longitude, $end_latitude, $end_longitude, $cab_id, $unique_id, '', $pay_mode);
                }

                $this->db->trans_commit();

                $this->Api_model->un_locak_table();
                //new_end

                $trip_details = array_merge(array('trip_id' => $unique_id), (array) $fare_estimate);

                $return = array(
                    'status' => TRUE,
                    'data' => (array) $trip_details,
                    'message' => 'Trip request added.'
                );
                echo json_encode($return);
                die();
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function assignmydriver() {
        $unique_id = $this->security->xss_clean(trim($this->input->get('tripid')));

        $radius = $this->Api_model->get_call_radius();
        $check = '';

        if ($unique_id != NULL && $unique_id != '') {
            $trip_details = $this->Api_model->get_temp_trip($unique_id);

            if (count($trip_details) > 0) {
                $driver_list = $this->Api_model->get_nearest_drivers($trip_details->start_latitude, $trip_details->start_longitude, $radius, $trip_details->cab_id);
                $passenger_detail = $this->Api_model->get_passenger_details($trip_details->passenger);

                $ride_detail = array('start_latitude' => $trip_details->start_latitude,
                    'start_longitude' => $trip_details->start_longitude,
                    'start_location' => $trip_details->start_location,
                    'end_latitude' => $trip_details->end_latitude,
                    'end_longitude' => $trip_details->end_longitude,
                    'end_location' => $trip_details->end_location);

                $count = count($driver_list);

                if ($count > 0) {
                    foreach ($driver_list as $driver_detail) {
                        $res = $this->Api_model->send_driver_gcm_request($driver_detail, $passenger_detail, $ride_detail, $unique_id);

                        // $count > 6 ? sleep(10) : sleep(25);
                        // $check = $this->Api_model->is_driver_accepted($unique_id);
                        // if ($check != 'checking' && $check) {
                            // break;
                        // }
                    }
                }

                if($count > 0) {
                    sleep(60);
                    $check = $this->Api_model->is_driver_accepted($unique_id);
                }

                if ($check == 'checking' || !$check) {
                    $this->Api_model->decline_trip($unique_id);
                }
            }
        }
    }

    /*
    public function assignmydriver() {  
        $unique_id = $this->security->xss_clean(trim($this->input->get('tripid')));

        $radius = $this->Api_model->get_call_radius();
        $check = '';

        if ($unique_id != NULL && $unique_id != '') {
            $trip_details = $this->Api_model->get_temp_trip($unique_id);

            if (count($trip_details) > 0) {
               
                $passenger_detail = $this->Api_model->get_passenger_details($trip_details->passenger);

                $ride_detail = array('start_latitude' => $trip_details->start_latitude,
                    'start_longitude' => $trip_details->start_longitude,
                    'start_location' => $trip_details->start_location,
                    'end_latitude' => $trip_details->end_latitude,
                    'end_longitude' => $trip_details->end_longitude,
                    'end_location' => $trip_details->end_location);                

                    $check_status = true;
                    $count = 8;
                    $called_list = array();                    

                    while($check_status && $count){
                        
                        while(!$this->Api_model->locak_queue())
                        {   
                            sleep(1);
                        }

                        $driver_detail = $this->Api_model->get_nearest_driver_queue($trip_details->start_latitude, $trip_details->start_longitude, $radius, $trip_details->cab_id, $called_list);

                        if($driver_detail){
                             $change_status=$this->Api_model->set_engaged_status($driver_detail['driver_id']);
                        }
                        
                        $this->Api_model->un_locak_queue();

                        if($driver_detail){                            
                            $res = $this->Api_model->send_driver_gcm_request($driver_detail, $passenger_detail, $ride_detail, $unique_id);
                            sleep(5);

                            $check = $this->Api_model->is_driver_accepted($unique_id);
                            $change_status = $this->Api_model->unset_engaged_status($driver_detail['driver_id']);
                            
                                if ($check != 'checking' && $check) {                                    
                                    $check_status = false;
                                } else {
                                    $called_list[] = $driver_detail['driver_id'];
                                }
                                
                        } else {
                            sleep(10);
                        }
                        $count--; 
                    }               

                if(!$check_status && count($called_list) < 4 && count($called_list)) {
                    sleep(30);
                    $check = $this->Api_model->is_driver_accepted($unique_id);
                }

                if ($check == 'checking' || !$check) {
                    $this->Api_model->decline_trip($unique_id);
                }
            }
        }
    }
    */

    public function tripcancel() {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $reason = $this->security->xss_clean(trim($this->input->post('reason')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        $late = $this->security->xss_clean(trim($this->input->post('late')));

        if ($userid != NULL && $userid != '' && $unique_id != NULL && $unique_id != '' && $appkey != NULL && $appkey != '' && $late != NULL && $late != '') {

            if ($this->_check_key($appkey)) {
                $deduct_balance_rslt = '';
                $archive = '';
                $check = $this->Api_model->is_driver_accepted($unique_id);

                if (count($check) > 0) {
                    if ($check != 'checking' && $check != 'declined') {
                        $res = $this->Api_model->gcm_call_to_driver($check, $unique_id, $userid);
                    }
                }

                $result = $this->Api_model->set_tripcancelling_detals($unique_id, $reason, 0);

                if ($late == 'yes') {
                    $ewallet_amount = $this->Api_model->get_balance_amount($userid, "passenger");
                    $cancel_amount = $this->Api_model->get_cancel_amount();
                    $passenger_details = $this->Api_model->get_passenger_details($userid);
                    $mobile = $passenger_details['mobile'];
                    if ($ewallet_amount >= $cancel_amount) {
                        $inst_fund_det = $this->Api_model->insert_fund_details($userid, $cancel_amount, 'Trip Cancel', $unique_id);
                        $deduct_balance_rslt = $this->Api_model->deduct_balance_amount($userid, $cancel_amount);
                        $message = "Hi!, $cancel_amount is deducted from your ewallet for trip cancellation";
                        $status = $this->Api_model->send_message($mobile, $message);
                    } else {
                        $archive = $this->Api_model->cancel_passengers($userid, "no");
                        $archive_history = $this->Api_model->add_archive_history($userid, $unique_id, $reason);
                        $message = "Hi!,  You Are Archived due to trip cancellation ";
                        $status = $this->Api_model->send_message($mobile, $message);
                    }
                }

                if ($result) {
                    if ($deduct_balance_rslt) {
                        $return = array(
                            'status' => TRUE,
                            'data' => array(),
                            'message' => 'Cancel Amount Deducted.'
                        );
                    } else if ($archive) {
                        $return = array(
                            'status' => TRUE,
                            'data' => array(),
                            'message' => 'You Are Archieved'
                        );
                    } else {
                        $return = array(
                            'status' => TRUE,
                            'data' => array(),
                            'message' => 'Success.'
                        );
                    }
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Failed! '
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function checkmydriver() {
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        $distance = array('distance' => 0);
        $message = 'Preferred Cabtype available.';

        if ($unique_id != NULL && $unique_id != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $check = $this->Api_model->is_driver_accepted($unique_id);

                if (count($check) > 0) {
                    if ($check == 'checking') {
                        $return = array(
                            'status' => TRUE,
                            'data' => array(),
                            'message' => 'Requesting Driver.'
                        );
                        echo json_encode($return);
                        die();
                    } else if ($check == 'declined') {
                        $res = $this->Api_model->remove_temp_trip($unique_id);

                        $return = array(
                            'status' => FALSE,
                            'data' => array('trip_status' => FALSE),
                            'message' => 'Trip Declined!'
                        );
                        echo json_encode($return);
                        die();
                    } else {
                        $trip_details = $this->Api_model->get_temp_trip($unique_id, 1, $check);
                        $driver_cab = $this->Api_model->get_driver_cab($check);
                        $driver_details = $this->Api_model->get_driver_details($check);
                        $location = $this->Api_model->get_driver_location($check);

                        if ($trip_details->end_longitude && $trip_details->end_latitude) {
                            $distance = $this->Api_model->distance($trip_details->start_latitude, $trip_details->start_longitude, $trip_details->end_latitude, $trip_details->end_longitude);
                        }

                        $fare_estimate = $this->Api_model->calculate_fare($distance['distance'], $driver_cab);

                        $accepted_driver_details = array_merge((array) $driver_details, (array) $driver_cab, (array) $location, (array) $fare_estimate);

                        if ($trip_details->cab_id != $driver_cab) {
                            $message = 'Preferred Cabtype not available. Available Option is.';
                        }

                        $return = array(
                            'status' => TRUE,
                            'data' => (array) $accepted_driver_details,
                            'message' => $message
                        );
                        echo json_encode($return);
                        die();
                    }
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Invalid Trip Id'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function nearestdrivers() {
        $latitude = $this->security->xss_clean(trim($this->input->post('latitude')));
        $longitude = $this->security->xss_clean(trim($this->input->post('longitude')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        $radius = 1;
        $max_radius = $this->Api_model->get_call_radius();

        if ($latitude != NULL && $latitude != '' && $longitude != NULL && $longitude != '' && $radius != NULL && $radius != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $driver_list = $this->Api_model->get_nearest_drivers($latitude, $longitude, $radius);

                while (count($driver_list) == 0 && $radius < $max_radius) {
                    $driver_list = $this->Api_model->get_nearest_drivers($latitude, $longitude, ++$radius);
                }

                if (count($driver_list) > 0) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $driver_list,
                        'message' => 'Cabtypes available in your area are.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => (array) $driver_list,
                        'message' => 'No cabs available in your area now.'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function register() {
        $username = $this->security->xss_clean(trim($this->input->post('username')));
        $fullname = $this->security->xss_clean(trim($this->input->post('fullname')));
        $mobile = $this->security->xss_clean(trim($this->input->post('mobile')));
        $password = $this->security->xss_clean(trim($this->input->post('password')));
        $email = $this->security->xss_clean(trim($this->input->post('email')));
        $referral_code = $this->security->xss_clean(trim($this->input->post('referral_code')));
        $acc_type = $this->security->xss_clean(trim($this->input->post('acc_type')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($username != NULL && $username != '' && $fullname != NULL && $fullname != '' && $mobile != NULL && $mobile != '' && $email != NULL && $email != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $reg_username = $this->Api_model->check_username($username);

                if ($reg_username) {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Username Already Registered!'
                    );
                    echo json_encode($return);
                    die();
                }

                $reg_mobile = $this->Api_model->check_mobile($mobile);

                if ($reg_mobile) {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Mobile Already Registered!'
                    );
                    echo json_encode($return);
                    die();
                }

                $reg_email = $this->Api_model->check_email($email);

                if ($reg_email) {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Email Already Registered!'
                    );
                    echo json_encode($return);
                    die();
                }

                if (!$acc_type)
                    $acc_type = 'normal';

                if (!$password)
                    $password = 123456;

                $user_id = $this->Api_model->register_passenger($username, $fullname, $mobile, $password, $email, $referral_code, $acc_type);

                if ($user_id['status'] && $user_id['userid']) {
                    // $passenger_details = $this->Api_model->get_passenger_details($user_id);                       

                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $user_id,
                        'message' => 'Registered Successfully. Confirm your account by entering the verification number received.'
                    );
                    echo json_encode($return);
                    die();
                } else if (!$user_id['status'] && $user_id['userid']) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $user_id,
                        'message' => 'Registered Successfully. Message Sending Failed.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Registration Failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function resendotp() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $res = $this->Api_model->send_register_otp($user_id);

                if ($res) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $res,
                        'message' => 'Verification number Resend!'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Resend Failed, Please try again!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function sendotp() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $mobile = $this->security->xss_clean(trim($this->input->post('mobile')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '' && $mobile != NULL && $mobile != '') {
            if ($this->_check_key($appkey)) {

                $reg_mobile = $this->Api_model->check_mobile($mobile);

                if ($reg_mobile) {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Mobile Already Registered!'
                    );
                    echo json_encode($return);
                    die();
                }

                $res = $this->Api_model->send_otp_change_no($user_id, $mobile);

                if ($res) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $res,
                        'message' => 'Verification number Send!'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Send Failed, Please try again!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function verifyaccount() {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $otp = $this->security->xss_clean(trim($this->input->post('otp')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($userid != NULL && $userid != '' && $otp != NULL && $otp != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $result = $this->Api_model->verify_register_otp($userid, $otp);

                if ($result) {
                    $passenger_details = $this->Api_model->get_passenger_details($userid);

                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $passenger_details,
                        'message' => 'Account Verified Successfully.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Account Verification Failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function verifyotp() {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $otp = $this->security->xss_clean(trim($this->input->post('otp')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($userid != NULL && $userid != '' && $otp != NULL && $otp != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $result = $this->Api_model->verify_otp_change_no($userid, $otp);

                if ($result) {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'OTP Verified Successfully.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'OTP Verification Failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function updategcmid() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $gcm_id = $this->security->xss_clean(trim($this->input->post('gcm_id')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $gcm_id != '' && $appkey != NULL) {
            if ($this->_check_key($appkey)) {
                $update_gcm = $this->Api_model->update_gcm_id($user_id, $gcm_id, 'passenger');

                if ($update_gcm) {
                    $return = array(
                        'status' => TRUE,
                        'data' => $user_id,
                        'message' => 'GCM Id Updated Succesfully.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'GCM Id Updation failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function insertmessage() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $message = $this->security->xss_clean(trim($this->input->post('message')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($message != NULL && $user_id != '' && $appkey != NULL) {
            if ($this->_check_key($appkey)) {
                $insert_id = $this->Api_model->insert_passenger_message($user_id, $message);

                if ($insert_id) {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Success.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Insertion failed!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function chathistory() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != '' && $appkey != NULL) {
            if ($this->_check_key($appkey)) {
                $chat_data = $this->Api_model->get_chat_history($user_id, 'passenger');

                if ($chat_data) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $chat_data,
                        'message' => 'History Found!'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Chat List Empty!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function triphistory() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        $offset = $this->security->xss_clean(trim($this->input->post('offset')));
        $limit = $this->security->xss_clean(trim($this->input->post('limit')));
        $type = $this->security->xss_clean(trim($this->input->post('type')));

        if ($user_id != '' && $user_id != NULL && $appkey != '' && $appkey != NULL && $limit != '' && $limit != NULL && $offset != '' && $offset != NULL) {
            if ($this->_check_key($appkey)) {
                $trip_history = $this->Api_model->get_trip_history($user_id, $offset, $limit, $type);

                if ($trip_history) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $trip_history,
                        'message' => 'History Found!'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'History Empty!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function trackdriver() {
        $user = $this->security->xss_clean(trim($this->input->post('userid')));
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($unique_id != NULL && $unique_id != '' && $user != NULL && $user != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $check = $this->Api_model->is_driver_accepted($unique_id);

                if (count($check) > 0) {
                    if ($check == 'checking') {
                        $return = array(
                            'status' => TRUE,
                            'data' => array(),
                            'message' => 'Requesting Driver.'
                        );
                        echo json_encode($return);
                        die();
                    } else if ($check == 'declined') {
                        $return = array(
                            'status' => FALSE,
                            'data' => array('trip_status' => FALSE),
                            'message' => 'Trip Declined!'
                        );
                        echo json_encode($return);
                        die();
                    } else {
                        $driver_location = $this->Api_model->get_driver_location($check);
                        $driver_arrival = $this->Api_model->get_driver_arrival($unique_id, $check);
                        $trip_details = $this->Api_model->get_trip_details($unique_id);

                        if (count($driver_location) > 0) {
                            if (count($trip_details) > 0) {
                                $res = $this->Api_model->remove_temp_trip($unique_id);

                                $return = array(
                                    'status' => TRUE,
                                    'data' => array_merge((array) $driver_location, array('driver_arrival' => $driver_arrival), (array) $trip_details),
                                    'message' => 'Trip Completed'
                                );
                                echo json_encode($return);
                                die();
                            } else {
                                $return = array(
                                    'status' => TRUE,
                                    'data' => array_merge((array) $driver_location, array('driver_arrival' => $driver_arrival)),
                                    'message' => 'Driver is at.'
                                );
                                echo json_encode($return);
                                die();
                            }
                        } else {
                            $return = array(
                                'status' => FALSE,
                                'data' => array(),
                                'message' => 'Location not available.'
                            );
                            echo json_encode($return);
                            die();
                        }
                    }
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Invalid Trip Id.'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function showbalance() {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($userid != NULL && $userid != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $balance = $this->Api_model->get_balance_amount($userid);

                if ($balance >= 0) {
                    $return = array(
                        'status' => TRUE,
                        'data' => $balance,
                        'message' => 'Wallet Balance found!'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Wallet Not found!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function ratedriver() {
        $unique_id = $this->security->xss_clean(trim($this->input->post('trip_id')));
        $comment = $this->security->xss_clean(trim($this->input->post('comment')));
        $rate = $this->security->xss_clean(trim($this->input->post('rate')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($unique_id != NULL && $unique_id != '' && $rate != NULL && $rate != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $add_rate = $this->Api_model->store_driver_rate($unique_id, $rate, $comment);

                if ($add_rate) {
                    $return = array(
                        'status' => TRUE,
                        'data' => $rate,
                        'message' => 'Rated Successfully'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => "",
                        'message' => 'Problem On rating'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function getquote() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $start_latitude = $this->security->xss_clean(trim($this->input->post('from_latitude')));
        $start_longitude = $this->security->xss_clean(trim($this->input->post('from_longitude')));
        $end_latitude = $this->security->xss_clean(trim($this->input->post('to_latitude')));
        $end_longitude = $this->security->xss_clean(trim($this->input->post('to_longitude')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        $distance = array('distance' => 0);
        $radius = $this->Api_model->get_call_radius();
        $fare_array = array();

        if ($user_id != NULL && $user_id != '' && $start_latitude != NULL && $start_latitude != '' && $start_longitude != NULL && $start_longitude != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                if ($end_longitude && $end_latitude) {
                    $distance = $this->Api_model->distance($start_latitude, $start_longitude, $end_latitude, $end_longitude);

                    if (!$distance) {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'Check your coordinates.!'
                        );
                        echo json_encode($return);
                        die();
                    }
                }

                $driver_list = $this->Api_model->get_nearest_drivers($start_latitude, $start_longitude, $radius);

                foreach ($driver_list as $driver) {
                    if (count($fare_array) > 0) {
                        if (!(array_key_exists($driver['cab_id'], $fare_array))) {
                            $fare_estimate = $this->Api_model->calculate_fare($distance['distance'], $driver['cab_id']);
                            $fare_array[$driver['cab_id']] = array_merge(array('cabtype' => $driver['cab_id'], 'cab_name' => $driver['cab_name'], 'image' => $driver['cab_image']), (array) $fare_estimate);
                        }
                    } else {
                        $fare_estimate = $this->Api_model->calculate_fare($distance['distance'], $driver['cab_id']);
                        $fare_array[$driver['cab_id']] = array_merge(array('cabtype' => $driver['cab_id'], 'cab_name' => $driver['cab_name'], 'image' => $driver['cab_image']), (array) $fare_estimate);
                    }
                }

                if (count($fare_array) > 0) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) (array_values($fare_array)),
                        'message' => 'Availabe cabs and quote are.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'No cabs nearby!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function myprofile() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $profile = $this->Api_model->get_passenger_details($user_id);

                if (count($profile) > 0) {
                    // Set the response and exit
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $profile,
                        'message' => 'User details found.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    // Set the response and exit
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Invalid User Id!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function updateprofile() {
        $name = $this->security->xss_clean(trim($this->input->post('name')));
        $mobile = $this->security->xss_clean(trim($this->input->post('mobile')));
        $email = $this->security->xss_clean(trim($this->input->post('email')));
        $password = $this->security->xss_clean(trim($this->input->post('psw')));
        $old_password = $this->security->xss_clean(trim($this->input->post('oldpsw')));
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $profile_pic = $this->security->xss_clean(trim($this->input->post('profile_pic')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '' && $name != NULL && $name != '' && $mobile != NULL && $mobile != '' && $email != NULL && $email != '') {
            if ($this->_check_key($appkey)) {
                if ($old_password != '' && $password != '' && $old_password != 0 && $password != 0) {
                    $check_password = $this->Api_model->check_password($user_id, $old_password);

                    if ($check_password == 0) {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'Wrong Password Sent!'
                        );
                        echo json_encode($return);
                        die();
                    }
                }

                $reg_mobile = $this->Api_model->check_mobile($mobile, $user_id);

                if ($reg_mobile) {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Mobile Already Registered By Another User!'
                    );
                    echo json_encode($return);
                    die();
                }

                $reg_email = $this->Api_model->check_email($email, $user_id);

                if ($reg_email) {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Email Already Registered By Another User!'
                    );
                    echo json_encode($return);
                    die();
                }

                $status = $this->Api_model->update_passenger_profile($user_id, $name, $mobile, $email, $password, $profile_pic);

                if ($status) {
                    // Set the response and exit
                    $return = array(
                        'status' => TRUE,
                        'data' => $status,
                        'message' => 'Profile updated successfully.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    // Set the response and exit
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'There is no data to update!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function futurebooking() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $start_latitude = $this->security->xss_clean(trim($this->input->post('from_latitude')));
        $start_longitude = $this->security->xss_clean(trim($this->input->post('from_longitude')));
        $end_latitude = $this->security->xss_clean(trim($this->input->post('to_latitude')));
        $end_longitude = $this->security->xss_clean(trim($this->input->post('to_longitude')));
        $from_date = $this->security->xss_clean(trim($this->input->post('from_date')));
        $to_date = $this->security->xss_clean(trim($this->input->post('to_date')));
        $cab_id = $this->security->xss_clean(trim($this->input->post('cabtype')));
        $coupon_id = $this->security->xss_clean(trim($this->input->post('coupon_id')));
        $pay_mode = $this->security->xss_clean(trim($this->input->post('pay_mode')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        $distance = array('distance' => 0);

        if ($user_id != NULL && $user_id != '' && $start_latitude != NULL && $start_latitude != '' && $start_longitude != NULL && $start_longitude != '' && $appkey != NULL && $appkey != '' && $from_date != '' && $from_date != NULL) {
            if ($this->_check_key($appkey)) {

                $minimum_time = $this->Api_model->get_minimum_time();                
                $into_minutes = $this->Api_model->into_minutes($minimum_time);                
              
                $today = date("Y-m-d H:i:s", strtotime('+ '. $minimum_time . ' minutes'));die();
                

                if ($to_date) {
                    if ($today > $from_date || $today > $to_date || $from_date > $to_date) {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'Future Booking must be done before ' . $minimum_time . ' hours of the trip.'
                        );
                        echo json_encode($return);
                        die();
                    }
                } else {
                    if ($today > $from_date) {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'Future Booking must be done before ' . $minimum_time . ' hours of the trip.'
                        );
                        echo json_encode($return);
                        die();
                    }
                }

                if ($end_longitude && $end_latitude) {
                    $distance = $this->Api_model->distance($start_latitude, $start_longitude, $end_latitude, $end_longitude);

                    if (!$distance) {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'Check your coordinates.!'
                        );
                        echo json_encode($return);
                        die();
                    }
                }

                if (!$pay_mode)
                    $pay_mode = 'by_cash';

                $fare_estimate = $this->Api_model->calculate_fare($distance['distance'], $cab_id);
                $data = array();

                if ($coupon_id) {
                    $data = $this->Api_model->get_coupon_details($coupon_id);

                    if (count($data) > 0) {
                        if ($data['type'] == 'percent') {
                            $fare_estimate['discount'] = $fare_estimate['total_charge'] * ($data['amount'] / 100);
                        } else {
                            $fare_estimate['discount'] = $data['amount'];
                        }

                        if ($fare_estimate['discount'] >= $fare_estimate['total_charge']) {
                            $fare_estimate['total_charge'] = 0;
                        } else {
                            $fare_estimate['total_charge'] = $fare_estimate['total_charge'] - $fare_estimate['discount'];
                        }
                    } else {
                        $fare_estimate['discount'] = 'Coupon Expired!';
                    }
                }

                // $this->db->trans_start();

                // $unique_id = $this->Api_model->get_next_uniqueid();

                // $unique_id = TRIP_PREFIX . $unique_id;

                // if (count($data) > 0) {
                //     $trip_id = $this->Api_model->insert_temp_trip($user_id, $start_latitude, $start_longitude, $end_latitude, $end_longitude, $cab_id, $unique_id, $coupon_id, $pay_mode, $from_date, $to_date);
                // } else {
                //     $trip_id = $this->Api_model->insert_temp_trip($user_id, $start_latitude, $start_longitude, $end_latitude, $end_longitude, $cab_id, $unique_id, '', $pay_mode, $from_date, $to_date);
                // }

                // $this->db->trans_complete();

                while(!$this->Api_model->locak_table())
                {   
                    sleep(1);
                }

                $this->db->trans_begin();

                $unique_id = $this->Api_model->get_next_uniqueid();

                $unique_id = TRIP_PREFIX . $unique_id;

                if (count($data) > 0) {
                    $trip_id = $this->Api_model->insert_temp_trip($user_id, $start_latitude, $start_longitude, $end_latitude, $end_longitude, $cab_id, $unique_id, $coupon_id, $pay_mode, $from_date, $to_date);
                } else {
                    $trip_id = $this->Api_model->insert_temp_trip($user_id, $start_latitude, $start_longitude, $end_latitude, $end_longitude, $cab_id, $unique_id, '', $pay_mode, $from_date, $to_date);
                }

                $this->db->trans_commit();

                $this->Api_model->un_locak_table();
                //new_end

                $trip_details = array_merge(array('trip_id' => $unique_id), (array) $fare_estimate);

                $return = array(
                    'status' => TRUE,
                    'data' => (array) $trip_details,
                    'message' => 'Trip request added.'
                );
                echo json_encode($return);
                die();
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function readyeem() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $coupon_text = $this->security->xss_clean(trim($this->input->post('coupon_code')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $coupon_id = $this->Api_model->apply_coupon($user_id, $coupon_text);

                if ($coupon_id) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $coupon_id,
                        'message' => 'Your Coupon is Applied'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => "Invalid Coupon Code"
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function getnotification() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $notification = $this->Api_model->get_notification($user_id);

                if ($notification) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $notification,
                        'message' => 'You have a notification'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => "You don't have any notifications"
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function bookhistory() {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != '' && $user_id != NULL && $appkey != '' && $appkey != NULL) {
            if ($this->_check_key($appkey)) {
                $book_history = $this->Api_model->get_book_history($user_id);

                if ($book_history) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $book_history,
                        'message' => 'History Found!'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'History Empty!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function uploadimage() {
        $target_path = "././public_html/images/faces/passenger/";

        $imagename = $this->security->xss_clean(trim($this->input->post("imagename")));
        $image = $this->input->post("image");

        $binary = base64_decode($image);
        header('Content-Type: bitmap; charset=utf-8');

        $file = fopen($target_path . $imagename, 'wb');
        fwrite($file, $binary);
        fclose($file);

        $data["status"] = "success";
        echo json_encode($data);
    }

    public function aboutus() {
        $data = $this->Api_model->get_about_us();
        // Set the response and exit

        $return = array(
            'status' => TRUE,
            'data' => (array) $data,
            'message' => 'Content'
        );
        echo json_encode($return);
    }

    public function forgotpassword() {
        $phone = $this->security->xss_clean(trim($this->input->post('phone')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($phone != NULL && $phone != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $user_id = $this->Api_model->check_mobile($phone);

                if ($user_id) {
                    $otp = $this->Api_model->get_user_otp($user_id);
                    $message = 'Your One Time Password is ' . $otp . '.';
                    $status = $this->Api_model->send_message($phone, $message);

                    if ($status) {


                        $return = array(
                            'status' => TRUE,
                            'data' => array('status' => $status, 'user_id' => $user_id),
                            'message' => 'OTP Send!'
                        );
                        echo json_encode($return);
                        die();
                    } else {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'OTP Send Failed, Please try again!'
                        );
                        echo json_encode($return);
                        die();
                    }
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Phone not registered!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function checkusername() {
        $username = $this->security->xss_clean(trim($this->input->post('username')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($username != NULL && $username != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $user_id = $this->Api_model->check_username($username);

                if ($user_id) {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Username Already Registered!'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Username Available!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function validateotp() {
        //$mobile = $this->security->xss_clean(trim($this->input->post('mobile')));
        $otp = $this->security->xss_clean(trim($this->input->post('otp')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        //$dyn_key = $this->security->xss_clean(trim($this->input->post('dyn_key')));

        if ($otp != NULL && $otp != '' && $appkey != NULL && $appkey != '' && $user_id != NULL && $user_id != '') {
            if ($this->_check_key($appkey)) {
                $user_id = $this->Api_model->verify_otp($user_id, $otp);

                if ($user_id) {
                    // $this->Api_model->update_dyn_key($user_id, $dyn_key);

                    $return = array(
                        'status' => TRUE,
                        'data' => $user_id,
                        'message' => 'OTP Verified Successfully.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'OTP Verification Failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function resetpassword() {
        $user_id = $this->security->xss_clean(trim($this->input->post('user_id')));
        $password = $this->security->xss_clean(trim($this->input->post('password')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        // $dyn_key = $this->security->xss_clean(trim($this->input->post('dyn_key')));

        if ($user_id != NULL && $user_id != '' && $password != NULL && $password != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                // $check_dyn_key = $this->Api_model->check_dyn_key($user_id, trim($dyn_key));
                // if(!$check_dyn_key)
                // {
                //     $return = array(
                //                 'status' => FALSE,
                //                 'data' => array($check_dyn_key),
                //                 'message' => 'Reset Key Failed!'
                //             );
                //             echo json_encode($return);
                //             die();
                // }		    

                $user_id = $this->Api_model->update_password($user_id, $password);

                if ($user_id) {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Password reset Succesfull!'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Password reset Failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function termsandconditions() {
        $data = $this->Api_model->get_terms_conditions();
        // Set the response and exit        
        $return = array(
            'status' => TRUE,
            'data' => (array) $data,
            'message' => 'Content'
        );
        echo json_encode($return);
    }

    public function getwalletamounts() {
        $user_id = $this->security->xss_clean(trim($this->input->post('user_id')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $data = $this->Api_model->get_wallet_amounts();
                // Set the response and exit        
                $return = array(
                    'status' => TRUE,
                    'data' => (array) $data,
                    'message' => 'Wallet Amounts'
                );
                echo json_encode($return);
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function addtowallet() {
        $user_id = $this->security->xss_clean(trim($this->input->post('user_id')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        $paymentid = $this->security->xss_clean(trim($this->input->post('paymentid')));
        $amount = $this->security->xss_clean(trim($this->input->post('amount')));
        $paymentresult = $this->security->xss_clean(trim($this->input->post('paymentresult')));
        $paymentstatus = $this->security->xss_clean(trim($this->input->post('paymentstatus')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '' && $paymentid != NULL && $paymentid != '' && $paymentresult != NULL && $paymentresult != '' && $paymentstatus != NULL && $paymentstatus != '') {
            if ($this->_check_key($appkey)) {
                $res = $this->Api_model->insert_payment_result($paymentid, $paymentresult, $paymentstatus, $user_id);

                if ($res[1]) {
                    if ($res[0] <= 0) {
                        $this->Api_model->insert_wallet_payment($user_id, $amount, $paymentid);
                    }
                }

                $balance = $this->get_balance_amount($user_id);

                // Set the response and exit
                $return = array(
                    'status' => TRUE,
                    'data' => array('balance' => $balance),
                    'message' => 'Wallet Amount'
                );
                echo json_encode($return);
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function transactions() {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        $offset = $this->security->xss_clean(trim($this->input->post('offset')));
        $limit = $this->security->xss_clean(trim($this->input->post('limit')));
        $type = $this->security->xss_clean(trim($this->input->post('type')));
        $from_date = $this->security->xss_clean(trim($this->input->post('from_date')));
        $to_date = $this->security->xss_clean(trim($this->input->post('to_date')));

        if ($userid != NULL && $userid != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                if ($type == 'today') {
                    $from_date = date('Y-m-d 00:00:00');
                    $to_date = date('Y-m-d H:i:s');
                } else if ($type == 'this_month') {
                    $from_date = date('Y-m-01 00:00:00');
                    $to_date = date('Y-m-d H:i:s');
                }

                $data = $this->Api_model->get_transaction_details($userid, 'passenger', $limit, $offset, $from_date, $to_date);

                if ($data) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $data,
                        'message' => 'Wallet Balance found!'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Wallet Not found!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function estimation() {
        $start_latitude = $this->security->xss_clean(trim($this->input->post('from_latitude')));
        $start_longitude = $this->security->xss_clean(trim($this->input->post('from_longitude')));
        $end_latitude = $this->security->xss_clean(trim($this->input->post('to_latitude')));
        $end_longitude = $this->security->xss_clean(trim($this->input->post('to_longitude')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        $distance = array('distance' => 0);
        $fare_array = array();

        if ($start_latitude != NULL && $start_latitude != '' && $start_longitude != NULL && $start_longitude != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                if ($end_longitude && $end_latitude) {
                    $distance = $this->Api_model->distance($start_latitude, $start_longitude, $end_latitude, $end_longitude);

                    if (!$distance) {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'Check your coordinates.!'
                        );
                        echo json_encode($return);
                        die();
                    }
                }

                $this->load->model('Cabs_model');
                $cabs = $this->Cabs_model->getCabsList('', TRUE);

                foreach ($cabs as $cab) {
                    $fare_estimate = $this->Api_model->calculate_fare($distance['distance'], $cab['id']);
                    $fare_array[$cab['id']] = array_merge(array('cabtype' => $cab['id'], 'cab_name' => $cab['type_name'], 'image' => $cab['icon']), (array) $fare_estimate);
                }

                if (count($fare_array) > 0) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) (array_values($fare_array)),
                        'message' => 'Availabe cabs and quote are.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'No cabs nearby!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function nearbycabs() {
        $start_latitude = $this->security->xss_clean(trim($this->input->post('from_latitude')));
        $start_longitude = $this->security->xss_clean(trim($this->input->post('from_longitude')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));


        $radius = $this->Api_model->get_call_radius();
        $fare_array = array();

        if ($start_latitude != NULL && $start_latitude != '' && $start_longitude != NULL && $start_longitude != '' && $appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {

                $driver_list = $this->Api_model->get_nearest_drivers($start_latitude, $start_longitude, $radius);

                if (count($driver_list) > 0) {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) (array_values($driver_list)),
                        'message' => 'Availabe cabs and details are.'
                    );
                    echo json_encode($return);
                    die();
                } else {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'No cabs nearby!'
                    );
                    echo json_encode($return);
                    die();
                }
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function minimumamount() {
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $minimum_amount = $this->Api_model->get_minimum_amount();

                $return = array(
                    'status' => TRUE,
                    'data' => (array) $minimum_amount,
                    'message' => 'Minimum Amount Set.!'
                );
                echo json_encode($return);
                die();
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function rates() {
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $cabtypes = $this->Api_model->get_cab_register();

                $return = array(
                    'status' => TRUE,
                    'data' => (array) $cabtypes,
                    'message' => 'Minimum Amount Set.!'
                );
                echo json_encode($return);
                die();
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function cancelamount() {
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($appkey != NULL && $appkey != '') {
            if ($this->_check_key($appkey)) {
                $cancel_amount = $this->Api_model->get_cancel_amount();

                $return = array(
                    'status' => TRUE,
                    'data' => $cancel_amount,
                    'message' => 'Cancel Amount Set.!'
                );
                echo json_encode($return);
                die();
            } else {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } else {
            // Set the response and exit
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

}
