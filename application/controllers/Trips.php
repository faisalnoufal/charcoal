<?php

class Trips extends Core_Controller {

    public function Ongoing_trips() {

        $title = 'Active Trips';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $active_trip = $this->Trips_model->getOngoingTrips();
        $this->set('active_trip', $active_trip);
        $this->view('Ongoing_trips');
    }

    public function Trip_list() {

        $title = 'Completed Trips';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $trip_list = $this->Trips_model->getTripList();
        $this->set('trip_list', $trip_list);
        $this->view('Trip_list');
    }

    public function Active_trips($user_type = '') {

        $title = 'Search Active Trips';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $this->set('flag', 'no');
        $this->set('markers', '');

        if($user_type != '') {            
            $list = $this->Trips_model->getUserList($user_type);
            $this->set('user_list', $list);            
        }

        $user = '';
        
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('user_type', 'User Type', 'required|trim|xss_clean');
            $this->form_validation->set_rules('user', 'Username', 'required|trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', 'Trips/Active_trips', false);
            } else {
                $active_trip = array();
                $data = array();
                $user_type = $this->security->xss_clean(trim($this->input->post('user_type')));
                $user = $this->security->xss_clean(trim($this->input->post('user')));
                $active_trip = $this->Trips_model->getActiveTripDetails($user_type, $user);
                $username_select = $this->Trips_model->getUsername($user_type, $user);
                if ($active_trip) {
                    $data = array(
                        0 => array(
                            'title' => $active_trip['trip_from'],
                            'lat' => $active_trip['start_point_latitude'],
                            'lng' => $active_trip['start_point_longitude'],
                            'description' => ''
                        ),
                        1 => array(
                            'title' => 'Current Location',
                            'lat' => $active_trip['driver_current_latitude'],
                            'lng' => $active_trip['driver_current_longitude'],
                            'description' => ''
                        ),
                    );

                    $this->set('markers', json_encode($data));
                    $this->set('active_trip', $active_trip);
                }
                $this->set('flag', 'yes');
                $this->set('username_select', $username_select);
            }
        }
        
        $this->set('user_type', $user_type);
        $this->set('user', $user);

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->view('Active_trips');
    }

    public function Trip_history($user_type = '') {

        $title = 'Search Completed Trips';
        $this->set('title', $title);
        $this->set('page_heading', 'Search Completed Trips');
        $this->set('page_summery', '');
        $this->set('page_name', 'Search Completed Trips');

        if($user_type != '') {            
            $list = $this->Trips_model->getUserList($user_type);
            $this->set('user_list', $list);            
        }

        $user = '';

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('user_type', 'User Type', 'required|trim|xss_clean');
            $this->form_validation->set_rules('user', 'Username', 'required|trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', 'Trips/Trip_history', false);
            } else {
                $user_type = $this->security->xss_clean(trim($this->input->post('user_type')));
                $user = $this->security->xss_clean(trim($this->input->post('user')));

                $selected_data = array('selected_user_type' => $user_type, 'selected_user' => $user);
                $this->session->set_userdata('selected_data', $selected_data);

                $trip_history = $this->Trips_model->getTripDetails($user_type, $user);
                $username_select = $this->Trips_model->getUsername($user_type, $user);

                $this->set('trip_history', $trip_history);                
                $this->set('username', $username_select);
                $this->set('trip_status', true);
            }
        }

        $this->set('user_type', $user_type);
        $this->set('user_id', $user);

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->view('Trip_history');
    }

    // public function get_user_list() {
    //     $list_list = array();        
    //     $data = '';
    //     $user_type = trim($this->input->post('user_type'));

    //     $list_list = $this->Trips_model->getUserList($user_type);

    //     $data = '';
    //     if (count($list_list) > 0) {
    //         foreach ($list_list as $value) {
    //             $data.='<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
    //         }        
    //     }

    //     echo $data;
    //     exit();
    // }

    public function Root() {
        $title = 'Route Map';

        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        if ($this->input->post('submit')) {
            $trip_details = array();
            $trip_id = trim($this->input->post('id'));
            $trip_details = $this->Trips_model->getTripDetail($trip_id);
            $trip_from = $trip_details['trip_from'];
            $trip_to = $trip_details['trip_to'];
            $lat1 = $trip_details['start_point_latitude'];
            $lat2 = $trip_details['end_point_latitude'];
            $lon1 = $trip_details['start_point_longitude'];
            $lon2 = $trip_details['end_point_longitude'];

            if ($this->session->userdata('selected_data')) {
                $this->set('user_type', $this->session->userdata['selected_data']['selected_user_type']);
                $this->set('user', $this->session->userdata['selected_data']['selected_user']);
                $this->session->unset_userdata('selected_data');
            }
            $data = array(
                0 => array(
                    'title' => $trip_from,
                    'lat' => $lat1,
                    'lng' => $lon1,
                    'description' => ''
                ),
                1 => array(
                    'title' => $trip_to,
                    'lat' => $lat2,
                    'lng' => $lon2,
                    'description' => ''
                ),
            );
            $this->set('markers', json_encode($data));
            $this->set('driver_name', $trip_details['driver_name']);
            $this->set('passenger_name', $trip_details['passenger_name']);
            $this->set('total_distance', $trip_details['total_distance']);
            $this->set('total_time', $trip_details['total_time']);
            $this->set('initial_waiting', $trip_details['initial_waiting']);
            $this->set('additional_waiting', $trip_details['additional_waiting']);
            $this->set('total_fare', $trip_details['total_fare']);
            $this->set('start_time', $trip_details['start_time']);
            $this->set('stop_time', $trip_details['stop_time']);
            $this->set('trip_from', $trip_from);
            $this->set('trip_to', $trip_to);
        } else {
            $this->redirect('', "Trips/Trip_history");
        }

        $this->view('Root');
    }

    public function Ongoing_root($id = '') {
        $title = 'Route Map';

        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        if ($id != '') {
            $trip_details = array();
            
          
            $trip_details = $this->Trips_model->getTripDetail($id);
            $trip_from = $trip_details['trip_from'];
            $trip_to = $trip_details['trip_to'];
            $lat1 = $trip_details['start_point_latitude'];
            $lat2 = $trip_details['end_point_latitude'];
            $lon1 = $trip_details['start_point_longitude'];
            $lon2 = $trip_details['end_point_longitude'];

           
            $data = array(
                0 => array(
                    'title' => $trip_from,
                    'lat' => $lat1,
                    'lng' => $lon1,
                    'description' => ''
                ),
                1 => array(
                    'title' => $trip_to,
                    'lat' => $lat2,
                    'lng' => $lon2,
                    'description' => ''
                ),
            );
            $this->set('markers', json_encode($data));
            $this->set('trip_details', $trip_details);
            $this->set('button_hide', 'yes');
           
        } elseif ($this->input->post('submit')) {
            $trip_details = array();
            
            $trip_id = trim($this->input->post('id'));
            $trip_details = $this->Trips_model->getTripDetail($trip_id);
            $trip_from = $trip_details['trip_from'];
            $trip_to = $trip_details['trip_to'];
            $lat1 = $trip_details['start_point_latitude'];
            $lat2 = $trip_details['end_point_latitude'];
            $lon1 = $trip_details['start_point_longitude'];
            $lon2 = $trip_details['end_point_longitude'];

           
            $data = array(
                0 => array(
                    'title' => $trip_from,
                    'lat' => $lat1,
                    'lng' => $lon1,
                    'description' => ''
                ),
                1 => array(
                    'title' => $trip_to,
                    'lat' => $lat2,
                    'lng' => $lon2,
                    'description' => ''
                ),
            );
            $this->set('markers', json_encode($data));
            $this->set('trip_details', $trip_details);
           
        } else {
            $this->redirect('', "Trips/Ongoing_trips");
        }

        $this->view('Ongoing_root');
    }
    
    public function Trip_list_view($id = '') {
        $title = 'Route Map';

        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);
        
        if($id != '')
        {
            $trip_details = array();
            
            $id = trim($id);
            $trip_details = $this->Trips_model->getTripListDetail($id);
            $trip_from = $trip_details['trip_from'];
            $trip_to = $trip_details['trip_to'];
            $lat1 = $trip_details['start_point_latitude'];
            $lat2 = $trip_details['end_point_latitude'];
            $lon1 = $trip_details['start_point_longitude'];
            $lon2 = $trip_details['end_point_longitude'];

           
            $data = array(
                0 => array(
                    'title' => $trip_from,
                    'lat' => $lat1,
                    'lng' => $lon1,
                    'description' => ''
                ),
                1 => array(
                    'title' => $trip_to,
                    'lat' => $lat2,
                    'lng' => $lon2,
                    'description' => ''
                ),
            );
            $this->set('markers', json_encode($data));
            $this->set('trip_details', $trip_details);
            $this->set('button_hide', 'yes');
        }
        elseif ($this->input->post('submit')) {
            $trip_details = array();
            
            $trip_id = trim($this->input->post('id'));
            $trip_details = $this->Trips_model->getTripListDetail($trip_id);
            $trip_from = $trip_details['trip_from'];
            $trip_to = $trip_details['trip_to'];
            $lat1 = $trip_details['start_point_latitude'];
            $lat2 = $trip_details['end_point_latitude'];
            $lon1 = $trip_details['start_point_longitude'];
            $lon2 = $trip_details['end_point_longitude'];

           
            $data = array(
                0 => array(
                    'title' => $trip_from,
                    'lat' => $lat1,
                    'lng' => $lon1,
                    'description' => ''
                ),
                1 => array(
                    'title' => $trip_to,
                    'lat' => $lat2,
                    'lng' => $lon2,
                    'description' => ''
                ),
            );
            $this->set('markers', json_encode($data));
            $this->set('trip_details', $trip_details);
           
        } else {
            $this->redirect('', "Trips/Trip_list");
        }

        $this->view('Trip_list_view');
    }

    public function Todays_bookings() {
        $title = 'Todays Bookings';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $trip_list = $this->Trips_model->getTodaysBookings();
        
        $this->set('trip_list', $trip_list);
        $this->view('Todays_bookings');
    }

    public function Cancelled_trips() {
        $title = 'Cancelled Trips';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $trip_list = $this->Trips_model->getTodaysCancelledTrips();

        $this->set('trip_list', $trip_list);
        $this->view('Cancelled_trips');
    }  

    public function All_cancelled_trips() {
        $title = 'Cancelled Trips';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $trip_list = $this->Trips_model->getTodaysCancelledTrips(1);

        $this->set('trip_list', $trip_list);
        $this->view('Cancelled_trips');
    } 

    public function Call_reject_report() {
        $unique_id = $this->input->post('id');

        if(!$unique_id) {
            echo 'No Users Found!';
            die();
        }
            
        $user_list = $this->Trips_model->getCallRejectReport($unique_id);
        
        if(count($user_list) <= 0) {
            echo 'No Users Found!';
            die();
        }
        $i = 1;

        $html = '<table class="table" >
                    <thead>
                    <tr>
                        <th>
                            <b>Sl.No</b>
                        </th>
                        <th>
                            <b>User</b>
                        </th>                                              
                        <th>
                            <b>Rating</b>
                        </th>
                        <th>
                            <b>Accepted</b>
                        </th>
                        <tr>
                    </thead>
                         <tbody>';
        foreach($user_list as $user){
        
                                    $html .= '
                                         <tr>
                                            <td>
                                                ' . $i++ . '
                                            </td>
                                            <td>
                                                <a href="' . base_url() . 'Profile/Profile_view/' . $user['user_id'] . '" title="View Pilot Profile" target="_blank">' . $user['fullname'] . '</a>
                                            </td>                                            
                                            <td>
                                                ' . $user['rating'] . '
                                            </td>
                                            <td>
                                                ' . $user['accept_status'] . '
                                            </td>
                                        </tr> ';
        }
                                       $html .= ' </tbody>
                                    </table>';
        echo $html;
    }

    public function Call_reject_summary() {
        $title = 'Trip Request Rejects';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $trip_list = $this->Trips_model->getCallRejectSummary();

        $this->set('trip_list', $trip_list);
        $this->view('Call_reject_summary');
    }

}
