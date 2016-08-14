<?php

class Bookedtrip extends Core_Controller {

    public function Booked_Trip($action = '', $trip_id = '') {
        $title = 'Booked Trips';
        $this->set('title', $title);
        $this->set('page_heading', "Booked Trips");
        $this->set('page_summery', "");
        $this->set('page_name', "Booked Trips");
        
        $trip_details = $this->Bookedtrip_model->getTripDetails();
        $this->set('trip_details', $trip_details);
        // echo'<pre>';print_r($trip_details);die();
        if ($action == "cancel") {
            $cancel_trip = $this->Bookedtrip_model->cancelTrip($trip_id);
            // $store_details = $this->Bookedtrip_model->saveTripDetails($trip_id);            
            if ($cancel_trip) {
                $msg = 'Trip Cancelled Successfully.';
                $this->redirect($msg, "Bookedtrip/Booked_Trip", TRUE);

            } else {
                $this->redirect('Trip Cancel Failed..!', "Bookedtrip/Booked_Trip", FALSE);
            }

        } elseif ($action == "allocate") {
            $from_to_dates = $this->Bookedtrip_model->getFromToDates($trip_id);
            $driver_list = $this->Bookedtrip_model->availableDriversList($from_to_dates);
            $trip_detail = $this->Bookedtrip_model->getTripDetail($trip_id);
            // echo'<pre>';print_r($driver_list);die();
            if ($driver_list) {
                $this->set('available_drivers', $driver_list);            
                $this->set('trip_detail', $trip_detail);
                // $this->set('trip_id', $trip_id);
            } else {
                $this->redirect('Currently there is no driveres are avilable', "Bookedtrip/Booked_Trip", FALSE);
            }
        }

        if ($this->input->post('submit')) {
            $trip_id = $this->input->post('trip_id');
            $trip_details =$this->Bookedtrip_model->getTripDetail($trip_id);
            $driver_select = $this->input->post('driver_select');

            if ($this->Bookedtrip_model->updateBookedTrip($trip_id, $driver_select)) {                
                $this->Bookedtrip_model->sendMessageToDriver($driver_select,$trip_details);
                $this->redirect('', "Bookedtrip/Booked_Trip", 'true');
            }
        }


        $this->view('Booked_Trip');
    }

}
