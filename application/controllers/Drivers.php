<?php

class Drivers extends Core_Controller {

    public function Show_drivers($action='', $edit_id='') {  
        $title = 'Drivers';
        $this->set('title', $title);
        $this->set('page_heading', "Drivers");
        $this->set('page_summery', "");
        $this->set('page_name', "Drivers");
        $this->view('Show_drivers'); 
    }

    public function Change_password() 
    { 
        $title = 'Change Password';
        $this->set('title', $title);
        $this->set('page_heading', "Change Password");
        $this->set('page_summery', "");
        $this->set('page_name', "Change Password");
        
        $drivers = $this->Drivers_model->getDriverList();
        $this->set('user_array', $drivers);
        $this->set('user_type', 'Pilot');

        if ($this->input->post('submit')) 
        {
            $this->form_validation->set_rules('user_id', 'Pilot', 'required|trim|numeric');
            $this->form_validation->set_rules('new_password', 'Password', 'required|trim|min_length[6]|max_length[100]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_length[6]|max_length[100]|matches[new_password]');            

            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Drivers/Change_password", FALSE);
            } 
            else 
            {
                $user_id = $this->security->xss_clean(trim($this->input->post('user_id')));
                $new_password = $this->security->xss_clean(trim($this->input->post('new_password')));
                $confirm_password = $this->security->xss_clean(trim($this->input->post('confirm_password')));
                
                $updt = $this->Drivers_model->updatePassword($user_id, $new_password);

                if ($updt) 
                {
                    $msg = 'Password Changed Successfully.';
                    $this->redirect($msg, "Drivers/Change_password", TRUE);
                } 
                else
                {
                    $msg = 'Password Change Failed!';
                    $this->redirect($msg, "Drivers/Change_password", FALSE);  
                }
            }
        }
        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Change_password');
    }

    public function Archive_user($user_id = '', $value = '') {

        $title = 'Archive/Unarchive Pilot';
        $this->set('title', $title);
        $this->set('page_heading', "Archive/Unarchive Pilot");
        $this->set('page_summery', "");
        $this->set('page_name', "Archive/Unarchive Pilot");
        
        $customer_list = $this->Drivers_model->getDriverList();

        $this->set('user_list', $customer_list);
        $this->set('user_type', 'Pilot');
        
        if ($user_id != '') {
            
            $user_id = $this->security->xss_clean(trim($user_id));
            $value = $this->security->xss_clean(trim($value));

            $update = $this->Drivers_model->cancelDriver($user_id, ($value == 0 ? 'no' : 'yes'));
            
            if($update && $value == 0)
            {
                $msg = 'Pilot Archived';
                $this->redirect($msg, "Drivers/Archive_user", TRUE);
            }
            else if($update && $value == 1)
            {
                $msg = 'Pilot Unarchived';
                $this->redirect($msg, "Drivers/Archive_user", TRUE);
            }
            else if($value == 1)
            {
                $msg = 'Pilot Unarchive Failed';
                $this->redirect($msg, "Drivers/Archive_user", FALSE);
            }
            else
            {
                $msg = 'Pilot Archive failed!';
                $this->redirect($msg, "Drivers/Archive_user", FALSE);
            }
        }

        $this->view('Archive_user');
    }

    public function Tax_renewal($user_id = '', $value = '') {

        $title = 'Tax Renewal Report';
        $this->set('title', $title);
        $this->set('page_heading', "Tax Renewal Report");
        $this->set('page_summery', "");
        $this->set('page_name', "Tax Renewal Report");
        
       
        if ($user_id != '' && $value != ''  ) {
            
            $user_id = $this->security->xss_clean(trim($user_id));
            $value = $this->security->xss_clean(trim($value));
            $value= str_replace("-","/",$value);
            $update = $this->Drivers_model->updateTaxRenewal($user_id, $value);
            
            if($update)
            {
                $msg = 'Tax Renewal Updated';
                $this->redirect($msg, "Drivers/Tax_renewal", TRUE);
            }
           
        }
        $customer_list = $this->Drivers_model->getTaxRenewalList();

        $this->set('user_list', $customer_list);

        $this->view('Tax_renewal');
    }


    public function Online_users() {
        $title = 'Online Users';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $user_list = $this->Drivers_model->getOnlineUsers();
        
        $this->set('user_type', 'pilot');
        $this->set('user_list', $user_list);
        $this->view('Online_users');
    }

    public function My_referrals() {
        $title = 'My Referrals';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $user_list = array();
        $user_details = $this->Drivers_model->getDriverList();
        $user_id = '';

        if($this->input->post('submit')) {
            $user_id = $this->security->xss_clean(trim($this->input->post('user_name')));
            $user_list = $this->Drivers_model->getMyReferrals($user_id);
            $this->set('user_list', $user_list);
        }               
        
        $this->set('user_details', $user_details);
        $this->set('user_type', 'pilot');        
        $this->set('user_id', $user_id);        
        $this->view('My_referrals');
    }

}