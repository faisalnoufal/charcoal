<?php


class Excel extends Core_Controller {

   
    function driver_report_excel() {
        $this->load->model('Excel_model');
        $arr = $this->Excel_model->getProfiles();
        $date = date("Y-m-d H:i:s");
        $this->excel_model->writeToExcel($arr, "Pilot Profile Report ($date)");
    }

    public function Income_report() {
        $this->load->model('Income_model');
        $this->load->model('Excel_model');

        $driver_id = $this->security->xss_clean(trim($this->input->post('driver_id')));
        $from_to_date = $this->security->xss_clean(trim($this->input->post('from_to_date')));
        $dates = explode("-", $from_to_date);
        $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
        $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';
        $date = date("Y-m-d H:i:s");

        $income_details = $this->Income_model->getIncomeDetails($from_date, $to_date, $driver_id, '');
     	$arr = $this->Excel_model->getIncomeData($income_details);

     	$this->Excel_model->writeToExcel($arr, "Income Report ($date)");   
    }

    public function Trip_history() {
    	$this->load->model('Trips_model');
        $this->load->model('Excel_model');
        
        $user_type = $this->security->xss_clean(trim($this->input->post('user_tp')));
        $user = $this->security->xss_clean(trim($this->input->post('user_id')));
        $date = date("Y-m-d H:i:s");

        $trip_history = $this->Trips_model->getTripDetails($user_type, $user);
        $arr = $this->Excel_model->getTripHistory($trip_history, $user_type);

     	$this->Excel_model->writeToExcel($arr, "Trip History ($date)"); 
    }

    public function Ongoing_trips() {
    	$this->load->model('Trips_model');
        $this->load->model('Excel_model');

        $date = date("Y-m-d H:i:s");

        $active_trip = $this->Trips_model->getOngoingTrips();
     	$arr = $this->Excel_model->getOngoingTrips($active_trip);

     	$this->Excel_model->writeToExcel($arr, "Ongoing Trips ($date)");    
    }

    public function Completed_trips() {
    	$this->load->model('Trips_model');
        $this->load->model('Excel_model');

        $date = date("Y-m-d H:i:s");

        $trip_list = $this->Trips_model->getTripList();
        $arr = $this->Excel_model->getCompletedTrips($trip_list);

     	$this->Excel_model->writeToExcel($arr, "Completed Trips ($date)");
    }

    public function My_referrals() {
        $this->load->model('Excel_model');

        $date = date("Y-m-d H:i:s");
        $user_type = $this->security->xss_clean(trim($this->input->post('user_type')));
        $user_id = $this->security->xss_clean(trim($this->input->post('user_id')));

        if($user_type == 'pilot') {
    		$this->load->model('Drivers_model');
    		$user_list = $this->Drivers_model->getMyReferrals($user_id);
    	
    	} else {
    		$this->load->model('Customer_model');
    		$user_list = $this->Customer_model->getMyReferrals($user_id);
		}

        $arr = $this->Excel_model->getMyReferrals($user_list);
     	$this->Excel_model->writeToExcel($arr, "My Referrals ($date)");         
    }

    public function Customer_rating() {
        $this->load->model('Excel_model');
        $this->load->model('Customer_model');
        
        $date = date("Y-m-d H:i:s");

        $rating = $this->Customer_model->getCustomerList();
        $arr = $this->Excel_model->getCustomerList($rating);

     	$this->Excel_model->writeToExcel($arr, "Customer Rating ($date)");     	
    }

    public function Driver_rating() {
        $this->load->model('Excel_model');
        $this->load->model('Profile_model');
        
        $date = date("Y-m-d H:i:s");

        $rating = $this->Profile_model->getDriversList();
        $arr = $this->Excel_model->getDriversList($rating);

     	$this->Excel_model->writeToExcel($arr, "Pilot Rating ($date)");
    }

    public function Booked_trip() {
        $this->load->model('Excel_model');
        $this->load->model('Bookedtrip_model');
        
        $date = date("Y-m-d H:i:s");

        $trip_details = $this->Bookedtrip_model->getTripDetails();
        $arr = $this->Excel_model->getBookedTrips($trip_details);

        $this->Excel_model->writeToExcel($arr, "Booked Trips ($date)");        
    }

    public function Passenger_fund_details() {
        $this->load->model('Excel_model');
        $this->load->model('Ewallet_model');

        $date = date("Y-m-d H:i:s");        
        $user_id = $this->security->xss_clean(trim($this->input->post('user_id')));        
        
        $fund_details = $this->Ewallet_model->getFundDetails($user_id,"passenger"); 
        $arr = $this->Excel_model->getFundDetails($fund_details);

        $this->Excel_model->writeToExcel($arr, "Passenger Funds ($date)");        
    }

    public function Driver_fund_details() {
        $this->load->model('Excel_model');
        $this->load->model('Ewallet_model');

        $date = date("Y-m-d H:i:s");        
        $user_id = $this->security->xss_clean(trim($this->input->post('user_id')));        
        
        $fund_details = $this->Ewallet_model->getFundDetails($user_id,"driver"); 
        $arr = $this->Excel_model->getFundDetails($fund_details);

        $this->Excel_model->writeToExcel($arr, "Driver Funds ($date)");        
    }

    public function Coupon_list() {
        $this->load->model('Excel_model');
        $this->load->model('Coupon_model');

        $date = date("Y-m-d H:i:s");
        $status = $this->security->xss_clean($this->input->post('stat'));

        if($status)
            $cpn = $this->Coupon_model->getAllCoupons($status);
        else
            $cpn = $this->Coupon_model->getAllCoupons();
        
        $arr = $this->Excel_model->getAllCoupons($cpn);

        $this->Excel_model->writeToExcel($arr, "Coupon List ($date)");
    }

    public function Trip_report() {
        $this->load->model('Excel_model');
        $this->load->model('Report_model');

        $date = date("Y-m-d H:i:s");

        $from_to_date = $this->security->xss_clean($this->input->post('from_to_date'));

        $dates = explode("-", $from_to_date);
        $from_date = trim($dates[0]);
        $to_date = trim($dates[1]);

        $trip_history = $this->Report_model->getTripHistory($from_date, $to_date);
        $arr = $this->Excel_model->getTripReport($trip_history);

        $this->Excel_model->writeToExcel($arr, "Trip History ($date)");

    }

    public function Active_Trip_report() {
        $this->load->model('Excel_model');
        $this->load->model('Report_model');

        $date = date("Y-m-d H:i:s");

        $trip_details = $this->Report_model->getActiveTripDetails();
        $arr = $this->Excel_model->getActiveTripDetails($trip_details);

        $this->Excel_model->writeToExcel($arr, "Active Trips ($date)");
    }

    public function All_cancelled_trips() {
        $this->load->model('Excel_model');
        $this->load->model('Trips_model');

        $date = date("Y-m-d H:i:s");

        $trip_list = $this->Trips_model->getTodaysCancelledTrips(1);
        $arr = $this->Excel_model->getTodaysCancelledTrips($trip_list);

        $this->Excel_model->writeToExcel($arr, "Cancelled Trips ($date)");
    } 

    public function Monthly_payment_summary() {
        $this->load->model('Excel_model');
        $this->load->model('Income_model');

        $date = date("Y-m-d H:i:s");
        $from_to_date = $this->security->xss_clean(trim($this->input->post('from_to_date')));
        $dates = explode("-", $from_to_date);
        $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
        $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';
        
        $income_details = $this->Income_model->getIncomeData($from_date, $to_date, 'by_pilot');            
        $arr = $this->Excel_model->getMonthlyPaymentSummary($income_details);

        $this->Excel_model->writeToExcel($arr, "Monthly Payment Summary ($date)");
    }

    public function Monthly_payment() {
        $this->load->model('Excel_model');
        $this->load->model('Income_model');

        $date = date("Y-m-d H:i:s");        
        $driver_id = $this->security->xss_clean(trim($this->input->post('user_id')));
        $from_to_date = $this->security->xss_clean(trim($this->input->post('from_to_date')));
        $dates = explode("-", $from_to_date);
        $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
        $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';

        if($driver_id) {
            $income_details = $this->Income_model->getIncomeDetails($from_date, $to_date, $driver_id, '');
            $arr = $this->Excel_model->getMonthlyPayment($income_details);

            $this->Excel_model->writeToExcel($arr, "Monthly Payment ($date)");
        }       
    }

    public function Customer_summary_report() {
        $this->load->model('Excel_model');
        $this->load->model('Income_model');

        $date = date("Y-m-d H:i:s");
        $from_to_date = $this->security->xss_clean(trim($this->input->post('from_to_date')));
        $dates = explode("-", $from_to_date);
        $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
        $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';

        $income_details = $this->Income_model->getIncomeData($from_date, $to_date, 'by_passenger');      
        $arr = $this->Excel_model->getCustomerSummaryReport($income_details);

        $this->Excel_model->writeToExcel($arr, "Monthly Customer Summary ($date)");
    }

    public function Customer_report() {
        $this->load->model('Excel_model');
        $this->load->model('Income_model');

        $date = date("Y-m-d H:i:s");        
        $passenger_id = $this->security->xss_clean(trim($this->input->post('user_id')));
        $from_to_date = $this->security->xss_clean(trim($this->input->post('from_to_date')));
        $dates = explode("-", $from_to_date);
        $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
        $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';

        if($passenger_id) 
        {
            $income_details = $this->Income_model->getIncomeDetails($from_date, $to_date, '', $passenger_id);
            $arr = $this->Excel_model->getCustomerIncomeReport($income_details);

            $this->Excel_model->writeToExcel($arr, "Monthly Customer Income ($date)");
        }       
    }


}

?>