<?php

class Home extends Core_Controller {

    public function index() {        
        $next_date = array();
        $title = 'Admin Dashboard';
                        
        $this->set('title', $title);
        $this->set('page_heading', "Dashboard");
        $this->set('page_summery', "Activity Summary");
        $this->set('page_name', "HOMEPAGE");
        
        $trips = $this->Home_model->getTotalBookings();
        $trips_today = $this->Home_model->getTodaysBookings();
        $this->set('trips', $trips);
        $this->set('trips_today', $trips_today);

        $cancelled = $this->Home_model->getTotalCancelledTrips();
        $cancelled_today = $this->Home_model->getTodaysCancelledTrips();
        $this->set('cancelled', $cancelled);
        $this->set('cancelled_today', $cancelled_today);

        // $rejects = $this->Home_model->getLastTripReject();
        // $this->set('rejects', $rejects);

        $online = $this->Home_model->getOnlineUsers();
        $user = $this->Home_model->getTotalUsers();
        $this->set('online', $online);
        $this->set('user', $user); 
        
        
        $json = $this->Home_model->runCurl();
        $weather = json_decode($json, true);

        for ($i = 0; $i <= 5; $i++) {
            $date_temp_arr[$i]['date'] = strtoupper(substr(date("l", $weather['list'][$i]['dt']), 0, 3));
            $date_temp_arr[$i]['temp'] = $weather['list'][$i]['temp']['day'] - 273.15;
//            $date_temp_arr[$i]['country'] = $country_details['country'];
//            $date_temp_arr[$i]['region'] = $country_details['region'];
        }

        $add_det = $this->Home_model->insertToTmpDetails($date_temp_arr, $i);
        $current_temp = $weather['list'][0]['temp']['day'] - 273.15;
        $this->set('current_temp', $current_temp);
        
        $temp_details = $this->Home_model->getCountryTempDetails();
        $this->set('date_temp_arr', $temp_details);
        $date_temp_arr = array();
        $this->view('Home');
    }

    public function get_dynamic_data() {
        $trips = $this->Home_model->getTotalBookings();
        $trips_today = $this->Home_model->getTodaysBookings();

        $cancelled = $this->Home_model->getTotalCancelledTrips();
        $cancelled_today = $this->Home_model->getTodaysCancelledTrips();

        $online = $this->Home_model->getOnlineUsers();
        $user = $this->Home_model->getTotalUsers();

        echo json_encode(array('trips' => $trips, 'trips_today' => $trips_today, 'cancelled' => $cancelled, 'cancelled_today' => $cancelled_today, 'online' => $online, 'user' => $user));
    }

    function Active_trips() {
        $base_url = base_url();
        $image_path = $base_url . 'public_html/images/';
        $drivers = $this->Home_model->getOngoingDriversList();
        $res = '';
        foreach ($drivers as $value) {

            $res.='<div class="col-md-6">
                        <div class="card tile card-friend">
                        <img src="' . $image_path . 'faces/' . $value['profile_pic'] . '" class="user-photo" alt="profile picture" width="100" height="110" >
                        <div class="friend-content">
                            <p class="title"><a href="' . $base_url. 'Profile/Profile_view/' . $value['user_id'] . '" class="btn btn-flat btn-primary btn-xs"> ' . $value['fullname'] . ' </a></p>
                            <p><a href="#">' . $value['total_trip'] . ' Trips</a></p>
                            <a href="' . $base_url . 'Location/Trip_details/' . $value['id'] . '" class="btn btn-flat btn-primary btn-xs">View Location</a>
                        </div>
                        </div>
                    </div>';
        }

        echo $res;
        exit();
    }

    // function get_content_reject() {

    //     $rejects = $this->Home_model->getRejectedTrips();

    //     if(count($rejects) > 0) {

    //         $data = '<div class="card-body" id="content_reject"> 
    //                 <div class="card-icon"><i class="glyphicon glyphicon-road"></i></div><!--.card-icon-->
    //                 <h4>Trips Rejected Recently</h4>';

    //         foreach ($rejects as $reject) {
    //             $data .= '<p class="result"><font size="2px"> Trip - ' . $reject["unique_id"] . '  -- Passenger - ' . $reject["passenger_name"] . ' -- Pilot Rejected - ' . $reject["driver_name"] . '</font></p>';
    //         }

    //         $data .= '</div>';

    //         echo $data;
    //         die();

    //     } else {
    //         echo 'no';
    //         die();
    //     }
    // }

    function get_last_reject() {

        $last_trp_id = $this->input->post('last_trp_id');

        $rejects = $this->Home_model->getLastTripReject($last_trp_id);
        
        if(count($rejects) > 0) {            

            echo json_encode($rejects);
            die();

        } else {
            echo 'no';
            die();
        }
    }

    // function sendMessage() {
    //     $this->load->model('Api_model');

    //     $res = $this->Api_model->send_message('vdfdsfsddsf', 'Hi\nGood Afternoon.');

    //     echo $res;
    // }


}
