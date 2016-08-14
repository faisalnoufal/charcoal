<?php

class Settings extends Core_Controller {
    
    public function Commission_Percentage() { 
        $title = 'Wage Percent';
        $this->set('title', $title);
        $this->set('page_heading', "Wage Percent");
        $this->set('page_summery', "");
        $this->set('page_name', "Wage Percent");
        $percentage = $this->Settings_model->getCommissionPercentage();
        $this->set('percentage', $percentage);
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('percentage', 'Percentage', 'required|trim|min_length[1]|max_length[100]|less_than_equal_to[100]|greater_than_equal_to[0]');
            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Commission_Percentage", false);
            } else {
                $percntge = $this->input->post('percentage');
                $updt = $this->Settings_model->updateCommissionPercentage($percntge);
                if ($updt) {
                    $msg = 'Percentage Updated Successfully.';
                    $this->redirect($msg, "Settings/Commission_Percentage", TRUE);
                }
            }
        }
         if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Commission_Percentage');
    }
   
    public function myPhoneNo($str)
    {
        if ( !preg_match('/^[0-9 -]+$/i',$str) )
        {
            $this->form_validation->set_message('myPhoneNo', 'The {field} can only allow numbers, spaces and hiphens(-).');
            return FALSE;
        }
        else
        {
            return TRUE;
        }            
    }

    public function Support() 
    { 
        $title = 'Support Contact Settings';
        $this->set('title', $title);
        $this->set('page_heading', "Support Contact Settings");
        $this->set('page_summery', "");
        $this->set('page_name', "Support Contact Settings");
        
        $nos_array = $this->Settings_model->getSupportNos();
        $this->set('nos_array', $nos_array);

        if ($this->input->post('submit')) 
        {
            $this->form_validation->set_rules('passenger_support_no', 'Passenger Support Contact', 'required|trim|min_length[6]|max_length[20]|callback_myPhoneNo');
            $this->form_validation->set_rules('driver_support_no', 'Pilot Support Contact', 'required|trim|min_length[6]|max_length[20]|callback_myPhoneNo');            

            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Support", FALSE);
            } 
            else 
            {
                $passenger_support_no = $this->security->xss_clean(trim($this->input->post('passenger_support_no')));
                $driver_support_no = $this->security->xss_clean(trim($this->input->post('driver_support_no')));

                $updt = $this->Settings_model->updateSupportNos($passenger_support_no, $driver_support_no);

                if ($updt) 
                {
                    $msg = 'Support Details Updated Successfully.';
                    $this->redirect($msg, "Settings/Support", TRUE);
                }
                else
                {
                    $msg = 'Support Details Updation Failed!';
                    $this->redirect($msg, "Settings/Support", FALSE);
                }
            }
        }
        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Support');
    }

    public function Time_management() 
    { 
        $title = 'Time Management';
        $this->set('title', $title);
        $this->set('page_heading', "Time Management");
        $this->set('page_summery', "");
        $this->set('page_name', "Time Management");
        
        $time_array = $this->Settings_model->getTimeSettings();
        $this->set('time_array', $time_array);

        if ($this->input->post('submit')) 
        {
            $this->form_validation->set_rules('km_per_hour', 'KM Per Hour', 'required|trim|numeric|max_length[5]');
            $this->form_validation->set_rules('initial_waiting_time', 'Initial Waiting Time', 'required|trim|numeric|max_length[5]');
            $this->form_validation->set_rules('additional_waiting_time', 'Additional Waiting Time', 'required|trim|numeric|max_length[5]');

            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Time_management", FALSE);
            } 
            else 
            {
                $km_per_hour = $this->security->xss_clean(trim($this->input->post('km_per_hour')));
                $initial_waiting_time = $this->security->xss_clean(trim($this->input->post('initial_waiting_time')));
                $additional_waiting_time = $this->security->xss_clean(trim($this->input->post('additional_waiting_time')));

                $updt = $this->Settings_model->updateTimeSettings($km_per_hour, $initial_waiting_time, $additional_waiting_time);

                if ($updt) 
                {
                    $msg = 'Time Settings Updated Successfully.';
                    $this->redirect($msg, "Settings/Time_management", TRUE);
                }
                else
                {
                    $msg = 'Time Settings Updation Failed!';
                    $this->redirect($msg, "Settings/Time_management", FALSE);
                }
            }
        }
        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Time_management');
    }
    
    public function About_us()
    { 
        $title = 'About Us Content';
        $this->set('title', $title);
        $this->set('page_heading', "About Us Content");
        $this->set('page_summery', "");
        $this->set('page_name', "About Us Content");
                        
        $about_array = $this->Settings_model->getAboutUs();
        $this->set('about_array', $about_array);

        if ($this->input->post('submit_pilot')) 
        {            
            $this->form_validation->set_rules('pilot_content', 'Pilot Content', 'required|trim|min_length[10]');

            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/About_us", FALSE);
            } 
            else 
            {         
                $driver_content = $this->security->xss_clean(trim($this->input->post('pilot_content')));

                $updt = $this->Settings_model->updateAboutUs('', $driver_content);

                if ($updt) 
                {
                    $msg = 'Pilot About Us Content Updated Successfully.';
                    $this->redirect($msg, "Settings/About_us", TRUE);
                }
                else
                {
                    $msg = 'Pilot About Us Content Updation Failed!';
                    $this->redirect($msg, "Settings/About_us", FALSE);
                }
            }
        }
        if ($this->input->post('submit_passenger')) 
        {
            $this->form_validation->set_rules('passenger_content', 'Passenger Content', 'required|trim|min_length[10]');
            
            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/About_us", FALSE);
            } 
            else 
            {
                $passenger_content = $this->security->xss_clean(trim($this->input->post('passenger_content')));
            
                $updt = $this->Settings_model->updateAboutUs($passenger_content);
                
                if ($updt) 
                {
                    $msg = 'Passenger About Us Content Updated Successfully.';
                    $this->redirect($msg, "Settings/About_us", TRUE);
                }
                else
                {
                    $msg = 'Passenger About Us Content Updation Failed!';
                    $this->redirect($msg, "Settings/About_us", FALSE);
                }
            }
        }
        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('About_us');
    }
    
    public function Referral_point() { 
        $title = 'Referral Point Settings';
        $this->set('title', $title);
        $this->set('page_heading', "Referral Point Settings");
        $this->set('page_summery', "");
        $this->set('page_name', "Referral Point Settings");
        
        $referral_point = $this->Settings_model->getReferralPoint();
        $this->set('referral_point', $referral_point);
        
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('referral_point', 'Referral Point', 'required|trim|min_length[1]|max_length[100]|numeric');
            
            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Referral_point", false);
            } else {
                $referral_point = $this->input->post('referral_point');
                $updt = $this->Settings_model->updateReferralPoint($referral_point);
                
                if ($updt) {
                    $msg = 'Referral Point Updated Successfully.';
                    $this->redirect($msg, "Settings/Referral_point", TRUE);
                }
            }
        }
         if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Referral_point');
    }

    public function Change_logo() {  
        
        $title = 'Change Logo';
        $this->set('title', $title);
        $this->set('page_heading', "Change Logo");
        $this->set('page_summery', "");
        $this->set('page_name', "Change Logo");
        
        if($this->input->post('submit'))
        {   
            $file_name = 'ajoul.gif';

            if ($_FILES['userfile']['error'] != 4) {
                $config['upload_path'] = './public_html/images/logo/';
                $config['allowed_types'] = 'ico|gif|jpg|png|jpeg';
                $config['max_size'] = '80';
                $config['max_width']  = '800';
                $config['max_height']  = '800';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $field_name = 'userfile';
                if (!$this->upload->do_upload($field_name)) 
                {
                    $error = $this->upload->display_errors();
                    $msg = is_array($error) ? implode("<br>", $error) : $error;
                    $this->redirect($msg, "Settings/Change_logo", FALSE);
                } 
                else 
                {
                    $data = array('upload_data' => $this->upload->data());
                    $file_name = $data['upload_data']['file_name'];
                    $res = $this->Settings_model->updateLogoFileName($file_name);
                    if($res)
                        $this->redirect('Logo Updated Successfully.', 'Settings/Change_logo', TRUE);
                    else
                        $this->redirect('No Update Performed!', 'Settings/Change_logo', FALSE);
                }
            }
            else
            {                    
                $this->redirect('File Not Selected!', "Settings/Change_logo", FALSE);
            }
        }

        $this->view('Change_logo');
    }

    public function Terms_conditions()
    { 
        $title = 'Terms & Conditions Content';
        $this->set('title', $title);
        $this->set('page_heading', "Terms & Conditions Content");
        $this->set('page_summery', "");
        $this->set('page_name', "Terms & Conditions Content");
                        
        $terms_array = $this->Settings_model->getTermsAndConditions();
        $this->set('terms_array', $terms_array);

        if ($this->input->post('submit_pilot')) 
        {            
            $this->form_validation->set_rules('pilot_content', 'Pilot Content', 'required|trim|min_length[10]');

            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Terms_conditions", FALSE);
            } 
            else 
            {         
                $driver_content = $this->security->xss_clean(trim($this->input->post('pilot_content')));

                $updt = $this->Settings_model->updateTermsAndConditions('', $driver_content);

                if ($updt) 
                {
                    $msg = 'Pilot Terms And Conditions Updated Successfully.';
                    $this->redirect($msg, "Settings/Terms_conditions", TRUE);
                }
                else
                {
                    $msg = 'Pilot Terms And Conditions Updation Failed!';
                    $this->redirect($msg, "Settings/Terms_conditions", FALSE);
                }
            }
        }
        if ($this->input->post('submit_passenger')) 
        {
            $this->form_validation->set_rules('passenger_content', 'Passenger Content', 'required|trim|min_length[10]');
            
            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Terms_conditions", FALSE);
            } 
            else 
            {
                $passenger_content = $this->security->xss_clean(trim($this->input->post('passenger_content')));
            
                $updt = $this->Settings_model->updateTermsAndConditions($passenger_content);
                
                if ($updt) 
                {
                    $msg = 'Passenger Terms And Conditions Updated Successfully.';
                    $this->redirect($msg, "Settings/Terms_conditions", TRUE);
                }
                else
                {
                    $msg = 'Passenger Terms And Conditions Updation Failed!';
                    $this->redirect($msg, "Settings/Terms_conditions", FALSE);
                }
            }
        }
        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Terms_conditions');
    }

    public function Call_radius() { 

        $title = 'Call Radius Settings';
        $this->set('title', $title);
        $this->set('page_heading', "Call Radius Settings");
        $this->set('page_summery', "");
        $this->set('page_name', "Call Radius Settings");
        
        $call_radius = $this->Settings_model->getCallRadius();
        $this->set('call_radius', $call_radius);
        
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('call_radius', 'Call Radius', 'required|trim|min_length[1]|max_length[100]|numeric');
            
            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Call_radius", false);
            } else {
                $call_radius = $this->security->xss_clean(trim($this->input->post('call_radius')));
                $updt = $this->Settings_model->updateCallRadius($call_radius);
                
                if ($updt) {
                    $msg = 'Call Radius Updated Successfully.';
                    $this->redirect($msg, "Settings/Call_radius", TRUE);
                }
            }
        }
         if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Call_radius');
    }

    public function Change_account() { 

        $title = 'Email and Password Change';
        $this->set('title', $title);
        $this->set('page_heading', "Email and Password Change");
        $this->set('page_summery', "");
        $this->set('page_name', "Email and Password Change");
        
        $user_id = $this->session->userdata('user_id');

        $email = $this->Settings_model->getCurrentEmail($user_id);
        $this->set('email', $email);
        
        if ($this->input->post('submit_email')) 
        {            
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email[1]|max_length[100]|valid_email');
            
            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Change_account", FALSE);
            } 
            else 
            {         
                $email = $this->security->xss_clean(trim($this->input->post('email')));

                $updt = $this->Settings_model->updateEmail($user_id, $email);

                if ($updt) 
                {
                    $msg = 'Email Updated Successfully.';
                    $this->redirect($msg, "Settings/Change_account", TRUE);
                }
                else
                {
                    $msg = 'Email Updation Failed!';
                    $this->redirect($msg, "Settings/Change_account", FALSE);
                }
            }
        }
        if ($this->input->post('submit_password')) 
        {
            $this->form_validation->set_rules('old_password', 'Current Password', 'required|trim|min_length[5]|max_length[100]|callback_password_check');
            $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_length[5]|max_length[100]|matches[new_password]');
            
            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Change_account", FALSE);
            } 
            else 
            {
                $new_password = $this->security->xss_clean(trim($this->input->post('new_password')));
                
                $updt = $this->Settings_model->updatePassword($user_id, $new_password);
                
                if ($updt) 
                {
                    $msg = 'Password Updated Successfully.';
                    $this->redirect($msg, "Settings/Change_account", TRUE);
                }
                else
                {
                    $msg = 'Password Updation Failed!';
                    $this->redirect($msg, "Settings/Change_account", FALSE);
                }
            }
        }

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Change_account');
    }

    public function password_check($str)
    {
        $user_id = $this->session->userdata('user_id');
        
        if ($this->Settings_model->validatePassword($user_id, $str))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('password_check', '{field} not valid!!');
            return FALSE;            
        }
    }

    public function password_check_js()
    {
        $old_password   = $this->input->post('old_password');
        $user_id        = $this->session->userdata('user_id');
        
        if ($this->Settings_model->validatePassword($user_id, $old_password))
        {            
            echo 'yes';
        }
        else
        {
            echo 'no';            
        }
    }

    public function Wallet_amount($action='', $edit_id='') {  
        
        $title = 'Wallet Amount Management';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', "");
        $this->set('page_name', $title);
        
        if($this->input->post('submit'))
        {               
            $this->form_validation->set_rules('amount', 'Wallet Amount', 'required|trim|xss_clean|greater_than[0]|numeric');
            
            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Error with submit!', "Settings/Wallet_amount", FALSE);
            } 
            else 
            {
                $edit_id = $this->security->xss_clean(trim($this->input->post('edit_id')));
                $amount = $this->security->xss_clean(trim($this->input->post('amount')));
                
                $res = $is_duplicate = false;
                $msg_success = $msg_error = '';
            
                if($edit_id)
                {
                    $is_duplicate = $this->Settings_model->checkAmountExist($amount, $edit_id);
                    if(!$is_duplicate) 
                    {
                        $res = $this->Settings_model->updateWalletAmount($amount, $edit_id);
                        $msg_success = 'Wallet Amount Updated Succesfully.';
                        $msg_error = 'Error on Updating Wallet Amount.';
                    }
                    else
                    {                       
                        $msg_error = 'Duplicate Wallet Amount.';
                    }
                }
                else
                {
                    $is_duplicate = $this->Settings_model->checkAmountExist($amount);
                    if(!$is_duplicate) 
                    {
                        $res = $this->Settings_model->updateWalletAmount($amount);
                        $msg_success = 'Wallet Amount Inserted Succesfully.';
                        $msg_error = 'Error on Inserting Wallet Amount.';    
                    } 
                    else 
                    {
                        $msg_error = 'Duplicate Wallet Amount.';
                    }           
                }               

                if($res)
                {
                    $this->redirect($msg_success, 'Settings/Wallet_amount', TRUE);
                }
                else
                {
                    $this->redirect($msg_error, 'Settings/Wallet_amount', FALSE);
                }
            }
        }

        if ($action == "edit") 
        {               
            $cab_detail = $this->Settings_model->getWalletAmount($edit_id);
            
            $amount_id = $cab_detail[0]['amount_id'];            
            $amount = $cab_detail[0]['amount'];
                        
            $this->set('amount_id', $amount_id);
            $this->set('amount', $amount);            
        } 
        else 
        {
            $this->set('amount_id', '');
            $this->set('amount', '');            
        }

        if ($action == "deactivate") {
            
            $result = $this->Settings_model->changeWalletAmountActive($edit_id);

            if (is_array($result)) 
            {
                $msg = 'Error on ' . ($result[1] == 1 ? 'Deactivating' : 'Activating') . ' Wallet Amount. ';
                $this->redirect($msg, "Settings/Wallet_amount", FALSE);
            } 
            else if($result) 
            {
                $msg = 'Wallet Amount Deactivated Succesfully.';
                $this->redirect($msg, "Settings/Wallet_amount", TRUE);            
            } 
            else 
            {
                $msg = 'Wallet Amount Activated Succesfully.';
                $this->redirect($msg, "Settings/Wallet_amount", TRUE);
            }
        }

        $amount_list = $this->Settings_model->getWalletAmount();
        
        $this->set('amount_list', $amount_list);
        $this->set('edit_id', $edit_id);

        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->view('Wallet_amount');
    }

    public function Minimum_amount() { 
        $title = 'Minimum Wallet Amount';
        $this->set('title', $title);
        $this->set('page_heading', "Minimum Wallet Amount");
        $this->set('page_summery', "");
        $this->set('page_name', "Minimum Wallet Amount");
        $amount = $this->Settings_model->getMinimumAmount();
        $this->set('amount', $amount);

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('amount', 'amount', 'required|trim|min_length[1]|max_length[100]|numeric|greater_than_equal_to[0]');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Minimum_amount", false);
            
            } else {
                $amount = $this->input->post('amount');
                $updt = $this->Settings_model->updateMinimumAmount($amount);
                if ($updt) {
                    $msg = 'Mininum Wallet Amount Updated Successfully.';
                    $this->redirect($msg, "Settings/Minimum_amount", TRUE);
                }
            }
        }
         if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Minimum_amount');
    }

    public function Cancel_amount() { 
        $title = 'Cancel Amount Settings';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', "");
        $this->set('page_name', $title);
        
        $cancel_amount = $this->Settings_model->getCancelAmount();
        $this->set('cancel_amount', $cancel_amount);
        
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('cancel_amount', 'Cancel Amount', 'required|trim|min_length[1]|max_length[100]|numeric');
            
            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Cancel_amount", false);
            } else {
                $cancel_amount = $this->input->post('cancel_amount');
                $updt = $this->Settings_model->updateCancelAmount($cancel_amount);
                
                if ($updt) {
                    $msg = 'Cancel Amount Updated Successfully.';
                    $this->redirect($msg, "Settings/Cancel_amount", TRUE);
                }
            }
        }
         if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Cancel_amount');
    }

    public function Minimum_time() 
    { 
        $title = 'Minimum Time For Future Booking';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', "");
        $this->set('page_name', $title);
        
        $minimum_time = $this->Settings_model->getMinimumTime();
        $this->set('minimum_time', $minimum_time);

        if ($this->input->post('submit')) 
        {
            $this->form_validation->set_rules('minimum_time', 'Minimum Time', 'required|trim|callback_validate_time');

            $this->form_validation->set_message('validate_time', 'Invalide {field}: Should be in HH:MM format!');
            
            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Settings/Minimum_time", FALSE);
            } 
            else 
            {
                $minimum_time = $this->security->xss_clean(trim($this->input->post('minimum_time')));
                
                $updt = $this->Settings_model->updateMinimumTime($minimum_time);

                if ($updt) 
                {
                    $msg = 'Minimum Time Settings Updated Successfully.';
                    $this->redirect($msg, "Settings/Minimum_time", TRUE);
                }
                else
                {
                    $msg = 'Minimum Time Settings Updation Failed!';
                    $this->redirect($msg, "Settings/Minimum_time", FALSE);
                }
            }
        }
        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Minimum_time');
    }

    public function validate_time($str)
    {
        return (bool) preg_match('/^([0-9]?[0-9])([.:][0-5][0-9])?$/i', $str);
    }



}