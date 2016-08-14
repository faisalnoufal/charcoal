<?php

class Income extends Core_Controller {

 	public function Income_report() {

        $title = 'Income Report';
        $this->set('title', $title);
        $this->set('page_heading', 'Income Report');
        $this->set('page_summery', '');
        $this->set('page_name', 'Income Report');
           
        $driver_id = $this->security->xss_clean(trim($this->input->post('user_name')));
        $from_to_date = $this->security->xss_clean(trim($this->input->post('period')));
        $dates = explode("-", $from_to_date);
        $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
        $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';

        $income_details = $this->Income_model->getIncomeDetails($from_date, $to_date, $driver_id, '');
        $user_details = $this->Income_model->getDriverList();

        $this->set('user_details', $user_details);
        $this->set('income_details', $income_details);
        $this->set('from_to_date', $from_to_date);
        $this->set('driver_id', $driver_id);        

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->view('Income_report');
    }

    public function Monthly_payment_summary() {

        $title = 'Monthly Payment Summary';
        $this->set('title', $title);
        $this->set('page_heading', 'Monthly Payment Summary');
        $this->set('page_summery', '');
        $this->set('page_name', 'Monthly Payment Summary');
        
        $from_to_date = ''; 
        $income_details = $this->Income_model->getIncomeData('', '', 'by_pilot');

        if($this->input->post('submit')) 
        {   
            $from_to_date = $this->security->xss_clean(trim($this->input->post('period')));
            $dates = explode("-", $from_to_date);
            $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
            $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';
            
            $income_details = $this->Income_model->getIncomeData($from_date, $to_date, 'by_pilot');            
        }		
		
        $this->set('income_details', $income_details);
        $this->set('from_to_date', $from_to_date);

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->view('Monthly_payment_summary');
    }

    public function Monthly_payment() {

        $title = 'Monthly Payment Details';
        $this->set('title', $title);
        $this->set('page_heading', 'Monthly Payment Details');
        $this->set('page_summery', '');
        $this->set('page_name', 'Monthly Payment Details');

        $from_to_date = ''; 
        $income_details = array();
        $user_details = $this->Income_model->getDriverList();
        $driver_id = '';

        if($this->input->post('submit')) 
        {          
            $driver_id = $this->security->xss_clean(trim($this->input->post('user_name')));
            $from_to_date = $this->security->xss_clean(trim($this->input->post('period')));
            $dates = explode("-", $from_to_date);
            $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
            $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';

            if($driver_id) 
            {
                $income_details = $this->Income_model->getIncomeDetails($from_date, $to_date, $driver_id, '');
                $driver_name = $this->Income_model->getDriverList($driver_id);
                $this->set('user_fullname', $driver_name[0]['fullname']);
            } 
            else
            {
                $this->redirect('Must Select a User.', 'Income/Monthly_payment', FALSE);  
            }
            $this->set('income_details', $income_details);
        }        
        
        $this->set('user_details', $user_details);        
        $this->set('from_to_date', $from_to_date);        
        $this->set('driver_id', $driver_id);        

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->view('Monthly_payment');
    }

    public function Customer_summary_report() {

        $title = 'Passenger Income Summary';
        $this->set('title', $title);
        $this->set('page_heading', 'Passenger Income Summary');
        $this->set('page_summery', '');
        $this->set('page_name', 'Passenger Income Summary');
        
        $from_to_date = ''; 
        $income_details = $this->Income_model->getIncomeData('', '', 'by_passenger');

        if($this->input->post('submit')) 
        {	        
	        $from_to_date = $this->security->xss_clean(trim($this->input->post('period')));
	        $dates = explode("-", $from_to_date);
	        $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
	        $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';	        
	     	        	
			$income_details = $this->Income_model->getIncomeData($from_date, $to_date, 'by_passenger');	     
	    }
		
        $this->set('income_details', $income_details);
        $this->set('from_to_date', $from_to_date);        
        
        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }       
        
        $this->view('Customer_summary_report');
    }

    public function Customer_report() {

        $title = 'Passenger Wise Income';
        $this->set('title', $title);
        $this->set('page_heading', 'Passenger Wise Income');
        $this->set('page_summery', '');
        $this->set('page_name', 'Passenger Wise Income');
        
        $from_to_date = ''; 
        $income_details = array();
        $user_details = $this->Income_model->getCustomerList();
        $passenger_id = '';

        if($this->input->post('submit')) 
        {
            $passenger_id = $this->security->xss_clean(trim($this->input->post('user_name')));
            $from_to_date = $this->security->xss_clean(trim($this->input->post('period')));
            $dates = explode("-", $from_to_date);
            $from_date = isset($dates[0]) ? date('Y-m-d',strtotime(trim($dates[0]))) : '';
            $to_date = isset($dates[1]) ? date('Y-m-d',strtotime(trim($dates[1]))) : '';
            
            if($passenger_id) 
            {
                $income_details = $this->Income_model->getIncomeDetails($from_date, $to_date, '', $passenger_id);
                $passenger_name = $this->Income_model->getCustomerList($passenger_id);
                $this->set('user_fullname', $passenger_name[0]['fullname']);
            }
            else
            {
                $this->redirect('Must Select a User.', 'Income/Customer_report', FALSE);  
            }
            $this->set('income_details', $income_details);
        }
        
        $this->set('user_details', $user_details);        
        $this->set('from_to_date', $from_to_date);        
        $this->set('passenger_id', $passenger_id);        
        
        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }       
        
        $this->view('Customer_report');
    }
}