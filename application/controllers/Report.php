<?php

class Report extends Core_Controller {

    public function Trip_report() {

        $title = 'Trip History Report';
        $this->set('title', $title);
        $this->set('page_heading', 'Trip History Report');
        $this->set('page_summery', '');
        $this->set('page_name', 'Trip History Report');

        $from_to_date = '';

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('reservation', 'From and To Date', 'required|trim');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', 'Report/Trip_report', false);
            } else {
                $from_to_date = $this->security->xss_clean(trim($this->input->post('reservation')));
                $dates = explode("-", $from_to_date);
                $from_date = trim($dates[0]);
                $to_date = trim($dates[1]);

                $trip_history = $this->Report_model->getTripHistory($from_date, $to_date);

                $this->set('trip_history', $trip_history);                
            }
        }

        $this->set('from_to_date', $from_to_date);

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->view('Trip_report');
    }

    public function Active_Trip_report() {

        $title = 'Active Trip Report';
        $this->set('title', $title);
        $this->set('page_heading', 'Active Trip Report');
        $this->set('page_summery', '');
        $this->set('page_name', 'Active Trip Report');


        $trip_details = $this->Report_model->getActiveTripDetails();
        $this->set('trip_details', $trip_details);
        
        $this->view('Active_trip_report');
    }
    
    public function Driver_report() {

        $title = 'Pilot Profile Report';
        $this->set('title', $title);
        $this->set('page_heading', 'Pilot Profile Report');
        $this->set('page_summery', '');
        $this->set('page_name', 'Pilot Profile Report');


        $driver_details = $this->Report_model->getDriverDetails();
        $this->set('driver_details', $driver_details);
        
        $this->view('Driver_report');
    }

}
