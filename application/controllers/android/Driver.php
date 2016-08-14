<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require_once 'Core_Api_Controller.php';

class Driver extends Core_Api_Controller {

    function __construct() 
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['login_post']['limit'] = 1; // 1 requests per hour per user/key        
    }

    private function _check_key($check_key) 
    {
        $app_key = 'Infinite_MLM_Cab_Management_System@driver_login';
        
        if ($check_key == MD5($app_key))
            return true;
        else
            return false;
    }

    public function login() 
    {
        $username = $this->security->xss_clean(trim($this->input->post('username')));
        $password = $this->security->xss_clean(trim($this->input->post('password')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($username != NULL && $username != '' && $password != NULL && $password != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $user_id = $this->Api_model->login_driver($username, $password);
                
                if (count($user_id) > 0) 
                {
                    if (trim($user_id['status']) == 'no') 
                    {
                        $support_no = $this->Api_model->get_support_nos('driver');
			
                        $return = array(
                            'status' => FALSE,
                            'data' => array('user_status' => 'inactive', 'support_no' => $support_no),
                            'message' => 'User archieved by Admin!'
                        );
                        echo json_encode($return);
                        die();
                    }
                    else
                    {
                        $driver_details = $this->Api_model->get_driver_details($user_id['id']);

                        $return = array(
                            'status' => TRUE,
                            'data' => (array)$driver_details,
                            'message' => 'Login Success!'
                        );

                        echo json_encode($return);
                        die();
                    }
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array('user_status' => 'active'),
                        'message' => 'Username or Password Incorrect!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array('user_status' => 'active'),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function updatetriprequest() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $accepted = $this->security->xss_clean(trim($this->input->post('status')));
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $accepted != NULL && $accepted != '' && $unique_id != NULL && $unique_id != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                if ($accepted == 1) 
                {                    
                    $res = $this->Api_model->accept_ride_request($unique_id, $user_id);                    
                    if ($res) 
                    {                                                
                        $res = $this->Api_model->accept_ride_message($unique_id, $user_id);
                        
                        $return = array(
                            'status' => TRUE,
                            'data' => array(),
                            'message' => 'Ride accepted. Kindly pickup the customer.'
                        );
                        echo json_encode($return);
                        die();
                    } 
                    else 
                    {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'Action Failed!'
                        );
                        echo json_encode($return);
                        die();
                    }
                } 
                else 
                {
                    $this->Api_model->reject_ride_request($unique_id, $user_id);

                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Ride rejected.'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function setlocation() 
    {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $latitude = $this->security->xss_clean(trim($this->input->post('latitude')));
        $longitude = $this->security->xss_clean(trim($this->input->post('longitude')));
        $time = $this->security->xss_clean(trim($this->input->post('time')));
        $status = $this->security->xss_clean(trim($this->input->post('status')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($latitude != NULL && $latitude != '' && $longitude != NULL && $longitude != '' && $userid != NULL && $userid != '' && $time != NULL && $time != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $update = $this->Api_model->set_driver_location($latitude, $longitude, $userid, $time, $status);

                if ($update) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Updated'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Update Failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function starttrip() 
    {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $time = $this->security->xss_clean(trim($this->input->post('time')));
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $passenger_id = $this->security->xss_clean(trim($this->input->post('passenger_id')));
        $start_latitude = $this->security->xss_clean(trim($this->input->post('from_latitude')));
        $start_longitude = $this->security->xss_clean(trim($this->input->post('from_longitude')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($unique_id != NULL && $unique_id != '' && $userid != NULL && $userid != '' && $time != NULL && $time != '' && $appkey != NULL && $appkey != '' && $passenger_id != NULL && $passenger_id != '' && $start_latitude != NULL && $start_latitude != '' && $start_longitude != NULL && $start_longitude != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $duplicate = $this->Api_model->check_duplicate($userid, $passenger_id, $start_latitude, $start_longitude, $unique_id);

                if($duplicate) 
                {
                    $return = array(
                            'status' => TRUE,
                            'data' => $duplicate,
                            'message' => 'Trip started already.'
                        );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    // $this->db->trans_start(TRUE);
                    $update = $this->Api_model->set_journey_start($unique_id, $userid, $time);
                    // $this->db->trans_complete();
                    if ($update) 
                    {
                        $return = array(
                            'status' => TRUE,
                            'data' => $update,
                            'message' => 'Trip Started.'
                        );
                        echo json_encode($return);
                        die();
                    } 
                    else 
                    {
                        $return = array(
                            'status' => FALSE,
                            'data' => array(),
                            'message' => 'Update Failed!'
                        );
                        echo json_encode($return);
                        die();
                    }
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function updategcmid() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $gcm_id = $this->security->xss_clean(trim($this->input->post('gcm_id')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $gcm_id != NULL && $gcm_id != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $update_gcm = $this->Api_model->update_gcm_id($user_id, $gcm_id);

                if ($update_gcm) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => $user_id,
                        'user_id' => 'GCM Id Updated Succesfully.'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'GCM Id Updation failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function insertmessage() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $message = $this->security->xss_clean(trim($this->input->post('message')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($message != NULL && $message != '' && $user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $insert_id = $this->Api_model->insert_driver_message($user_id, $message);

                if ($insert_id) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Success.'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Insertion failed!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function endtrip() 
    {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $journey_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $distance = $this->security->xss_clean(trim($this->input->post('distance')));
        $waiting = $this->security->xss_clean(trim($this->input->post('waiting')));
        $time = $this->security->xss_clean(trim($this->input->post('time')));
        $end_latitude = $this->security->xss_clean(trim($this->input->post('to_latitude')));
        $end_longitude = $this->security->xss_clean(trim($this->input->post('to_longitude')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($journey_id != NULL && $journey_id != '' && $waiting != NULL && $waiting != '' && $end_latitude != NULL && $end_latitude != '' && $end_longitude != NULL && $end_longitude != '' && $distance != NULL && $distance != '' && $userid != NULL && $userid != '' && $time != NULL && $time != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {                   
                $update = $this->Api_model->set_journey_stop($journey_id, $distance, $waiting, $end_latitude, $end_longitude, $userid, $time);
             
                if ($update) 
                {                    
                    $this->Api_model->trip_complete_message($update, $journey_id, $userid);
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $update,
                        'message' => 'Trip details updated succesfully.'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Update Failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function chathistory() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != '' && $user_id != NULL && $appkey != '' && $appkey != NULL) 
        {
            if ($this->_check_key($appkey)) 
            {
                $chat_data = $this->Api_model->get_chat_history($user_id, 'driver');

                if ($chat_data) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => $chat_data,
                        'message' => 'History Found!'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Chat List Empty!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function triphistory() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        $offset = $this->security->xss_clean(trim($this->input->post('offset')));
        $limit = $this->security->xss_clean(trim($this->input->post('limit')));
        $type = $this->security->xss_clean(trim($this->input->post('type')));

        if ($user_id != '' && $user_id != NULL && $appkey != '' && $appkey != NULL && $limit != '' && $limit != NULL && $offset != '' && $offset != NULL) 
        {
            if ($this->_check_key($appkey)) 
            {
                $trip_history = $this->Api_model->get_driver_trip($user_id,$offset,$limit,$type);

                if ($trip_history) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $trip_history,
                        'message' => 'History Found!'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'History Empty!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function ratepassenger()
    {
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $comment = $this->security->xss_clean(trim($this->input->post('comment')));
        $rate = $this->security->xss_clean(trim($this->input->post('rate')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        
        if ($unique_id != NULL && $unique_id != '' && $rate != NULL && $rate != '' && $appkey != NULL && $appkey != '')
        {
            if ($this->_check_key($appkey)) 
            {
                $add_rate = $this->Api_model->store_passenger_rate($unique_id, $rate, $comment);
                
                if ($add_rate) 
                {                    
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Rated Successfully.'
                    );
                    echo json_encode($return);
                    die();
                }
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Problem On rating'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {

                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {            
            $return = array(
                'status' => FALSE,
                'data' => array(),
                'message' => 'Partial Content!'
            );
            echo json_encode($return);
            die();
        }
    }

    public function setarrival() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $unique_id != NULL && $unique_id != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {                
                $res = $this->Api_model->set_driver_arrival($unique_id, $user_id);

                if ($res) 
                {
                    $this->Api_model->set_arrival_message($unique_id, $user_id);

                    $return = array(
                        'status' => TRUE,
                        'data' => array($res),
                        'message' => 'Arrival updated.'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Action Failed!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function myprofile() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $profile = $this->Api_model->get_driver_profile($user_id);

                if (count($profile) > 0) 
                {
                    // Set the response and exit
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $profile,
                        'message' => 'User details found.'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    // Set the response and exit
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Invalid User Id!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function checktriprequest() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $unique_id != NULL && $unique_id != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $count = $this->Api_model->check_ride_request($unique_id);

                if ($count) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Ride request available.'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Ride Error!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function showbalance() 
    {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        
        if ($userid != NULL && $userid != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $balance = $this->Api_model->get_balance_amount($userid, 'driver');

                if ($balance >= 0) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => $balance,
                        'message' => 'Wallet Balance found!'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Wallet Not found!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function transactions() 
    {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        $offset = $this->security->xss_clean(trim($this->input->post('offset')));
        $limit = $this->security->xss_clean(trim($this->input->post('limit')));
        $type = $this->security->xss_clean(trim($this->input->post('type')));
        $from_date = $this->security->xss_clean(trim($this->input->post('from_date')));
        $to_date = $this->security->xss_clean(trim($this->input->post('to_date')));
        
        if ($userid != NULL && $userid != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                if($type == 'today') 
                {
                    $from_date = date('Y-m-d 00:00:00');
                    $to_date = date('Y-m-d H:i:s');
                } 
                else if($type == 'this_month')
                {
                    $from_date = date('Y-m-01 00:00:00');                    
                    $to_date = date('Y-m-d H:i:s');
                }
                                
                $data = $this->Api_model->get_transaction_details($userid, 'driver', $limit, $offset, $from_date, $to_date);
                
                if ($data) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $data,
                        'message' => 'Wallet Balance found!'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Wallet Not found!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function tripcancel() 
    {
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $reason = $this->security->xss_clean(trim($this->input->post('reason')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($userid != NULL && $userid != '' && $unique_id != NULL && $unique_id != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $check = $this->Api_model->is_driver_accepted($unique_id);
                $result = FALSE;
                
                if ($check == $userid) 
                {
                    $result = $this->Api_model->set_tripcancelling_detals($unique_id, $reason);    
                }

                if ($result) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Success.'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Failed! '
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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
    
    public function aboutus()
    {        
        $userid = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
	
    	if ($this->_check_key($appkey)) 
    	{
    	    $user_status = $this->Api_model->is_active_driver($userid);
    	    $data = $this->Api_model->get_about_us('driver');

    	    if($user_status == 'no')
    	    {
        		$return = array(
        		    'status' => TRUE,
        		    'data' => array('user_status' => 'inactive', 'data' => $data),
        		    'message' => 'User archieved by Admin!'
        		);
        		echo json_encode($return);
        		die();
    	    }
    	    else
    	    {
        		// Set the response and exit
        		$return = array(
        		    'status' => TRUE,
        		    'data' => array('user_status' => 'active', 'data' => $data),
        		    'message' => 'Content'
        		);
        		echo json_encode($return);
                die();
    	    }
    	}
    	else 
    	{
    	    // Set the response and exit
    	    $return = array(
    		'status' => FALSE,
    		'data' => array('user_status' => 'inactive', 'data' => array()),
    		'message' => 'Invalid Authentication Key!'
    	    );
    	    echo json_encode($return);
    	    die();
    	}
    }

    public function getnotification() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));

        if ($user_id != NULL && $user_id != '' && $appkey != NULL && $appkey != '') 
        {
            if ($this->_check_key($appkey)) 
            {
                $notification = $this->Api_model->get_notification($user_id, 'driver');

                if ($notification) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $notification,
                        'message' => 'You have a notification'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => "You don't have any notifications"
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function termsandconditions()
    {        
        $data = $this->Api_model->get_terms_conditions('driver');
        // Set the response and exit
        $return = array(
            'status' => TRUE,
            'data' => (array)$data,
            'message' => 'Content'
        );
        echo json_encode($return);
    }

    public function myfuturetrips() 
    {
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        
        if ($user_id != '' && $user_id != NULL && $appkey != '' && $appkey != NULL) 
        {
            if ($this->_check_key($appkey)) 
            {
                $trip_list = $this->Api_model->driver_future_trip($user_id);

                if ($trip_list) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $trip_list,
                        'message' => 'Future Trips Found!'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Future Trips Empty!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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

    public function getfuturetrip() 
    {
        $unique_id = $this->security->xss_clean(trim($this->input->post('tripid')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        $user_id = $this->security->xss_clean(trim($this->input->post('userid')));

        if ($user_id != '' && $user_id != NULL && $unique_id != '' && $unique_id != NULL && $appkey != '' && $appkey != NULL) 
        {
            if ($this->_check_key($appkey)) 
            {
                $trip_detail = $this->Api_model->get_future_trip($unique_id, $user_id);

                if ($trip_detail) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => (array) $trip_detail,
                        'message' => 'Trip Detail Found!'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => FALSE,
                        'data' => array(),
                        'message' => 'Trip Detail Not Found!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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
        public function addto_passenger_ewallet() 
    {
       // $user_id = $this->security->xss_clean(trim($this->input->post('userid')));
        $tripid = $this->security->xss_clean(trim($this->input->post('tripid')));
      //  $passenger_id = $this->security->xss_clean(trim($this->input->post('passenger')));
        $amount = $this->security->xss_clean(trim($this->input->post('amount')));
        $appkey = $this->security->xss_clean(trim($this->input->post('appkey')));
        
        if ($tripid != '' && $tripid != NULL && $appkey != '' && $appkey != NULL  && $amount != NULL && $amount !='' && $amount != '0') 
        {
            if ($this->_check_key($appkey)) 
            {                
                $passenger_id = $this->Api_model->passenger_id_from_trip($tripid);
                $wallet_update = $this->Api_model->update_passenger_balance($passenger_id,$amount);
                $inst_fund_det = $this->Api_model->insert_fund_details($passenger_id, $amount, 'Driver Added', $tripid);

                if ($wallet_update && $inst_fund_det) 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Amount Added To Passenger Ewallet'
                    );
                    echo json_encode($return);
                    die();
                } 
                else 
                {
                    $return = array(
                        'status' => TRUE,
                        'data' => array(),
                        'message' => 'Failed To Amount Add!!'
                    );
                    echo json_encode($return);
                    die();
                }
            } 
            else 
            {
                // Set the response and exit
                $return = array(
                    'status' => FALSE,
                    'data' => array(),
                    'message' => 'Invalid Authentication Key!'
                );
                echo json_encode($return);
                die();
            }
        } 
        else 
        {
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
