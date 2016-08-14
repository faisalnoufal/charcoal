<?php

class Location extends Core_Controller {

    public function driver_location($driver_id = '') {
        $title = 'Pilot Location';

        if ($driver_id) {
            $driver_array = $this->Location_model->getDriverLocation($driver_id);
        } else {
            $driver_array = $this->Location_model->getDriverLocation();
        }

        $this->set('title', $title);
        $this->set('driver_id', $driver_id);
        $this->set('driver_array', $driver_array);

        $this->set('page_heading', "Pilot Location");
        $this->set('page_summery', "Location Pilot");
        $this->set('page_name', "Location Page");
        $this->view('driver_location');
    }

    public function get_javascript_location() {
        $driver_id = $this->input->post('driver');

        if ($driver_id) {
            $driver_array = $this->Location_model->getDriverLocation($driver_id);
        } else {
            $driver_array = $this->Location_model->getDriverLocation();
        }
        echo (json_encode($driver_array));
    }

    public function Full_driver_location($offset=0) {

        $title = 'Pilot Location';
        $this->set('title', $title);
        $this->set('page_heading', "Pilot Location");
        $this->set('page_summery', "");
        $this->set('page_name', "Location Page");       

        $this->load->library('pagination');

        $config['base_url'] =  base_url() . 'Location/Full_driver_location';
        $config['total_rows'] = $this->Location_model->getDriversCount();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $drivers = $this->Location_model->getDriversList('', $page, 10);

        $page_links = $this->pagination->create_links();
        
        $this->set('page_links', $page_links);
        $this->set('drivers', $drivers);
        $this->view('Full_driver_location');
    }

    public function Get_drivers()
    {        
        $base_url = base_url();
        
        $input_key = $this->input->post('input_search');
        $driver_details = $this->Location_model->getDriverDetails($input_key);
        
        $list_html = '';
        foreach($driver_details as $details)
        {        
            $list_html .= '<div class="col-md-6">
                                <div class="card tile card-friend">
                                    <img src="' . $base_url . 'public_html/images/faces/'.$details['profile_pic'].'" class="user-photo" alt="">
                                    <div class="friend-content">
                                        <p class="title"><a href="' . $base_url. 'Profile/Profile_view/'.$details['user_id'].'"class="btn btn-flat btn-primary btn-xs">'.$details['fullname'].'</a></p>
                                        <p><a href="#">'.$details['total_trip'].' Trips</a></p>
                                        <a href="' . $base_url. 'Location/Driver_location/'.$details['user_id'].'"class="btn btn-flat btn-primary btn-xs">View Location</a>
                                    </div><!--.friend-content-->
                                </div><!--.card-->
                            </div><!--.col-md-6-->';
        }
        echo $list_html;        
    }

    public function test_location() {

        $title = 'Driver Location';
        $this->set('title', $title);
        $this->set('page_heading', "Driver Location");
        $this->set('page_summery', "Location Driver");
        $this->set('page_name', "Location Page");
        $this->view('test_location');
    }

    public function Trip_details($trip_id = '') {
       
        if ($trip_id == '') {
            $this->redirect('', "Home", TRUE);
        }
        $title = 'Trip Details';
        $this->set('title', $title);
        $this->set('page_heading', "Trip Details");
        $this->set('page_summery', "Trip Details");
        $this->set('page_name', "Trip Details");

        $active_trip = $this->Location_model->getActiveTripDetails($trip_id);
        if ($active_trip) {
            $data = array(
                array(
                    'title' => $active_trip['trip_from'],
                    'lat' => $active_trip['start_point_latitude'],
                    'lng' => $active_trip['start_point_longitude'],
                    'description' => ''
                ),
                array(
                    'title' => 'Current Location',
                    'lat' => $active_trip['driver_current_latitude'],
                    'lng' => $active_trip['driver_current_longitude'],
                    'description' => ''
                )
            );

            $this->set('markers', json_encode($data));
            $this->set('active_trip', $active_trip);
        } else {
            $this->redirect('', "Home", TRUE);
        }

        $this->view('Trip_details');
    }

    public function passenger_location($passenger_id = '') {
        if(!$passenger_id)
            $this->redirect('home/index');

        $title = 'Passenger Location';
        $passenger_array = $this->Location_model->getPassengerLocation($passenger_id);

        $this->set('title', $title);
        $this->set('passenger_id', $passenger_id);
        $this->set('passenger_array', $passenger_array);

        $this->set('page_heading', "Passenger Location");
        $this->set('page_summery', "Location Passenger");
        $this->set('page_name', "Location Page");
        $this->view('passenger_location');
    }

    public function get_javascript_location_passenger() {
        $passenger_id = $this->input->post('passenger');        
        $passenger_array = $this->Location_model->getPassengerLocation($passenger_id);        
        echo (json_encode($passenger_array));
    }

}
