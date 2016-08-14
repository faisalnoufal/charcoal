<?php

class Notifications extends Core_Controller {

    public function Notify_passenger() {

        $title = 'Passenger Notifications';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $user_details = $this->Notifications_model->getUserDetails();
        $this->set('user_details', $user_details);

        if ($this->input->post('submit')) {
            
            // $this->form_validation->set_rules('user_all', 'All Users', 'required|trim|xss_clean');
            
            if($this->security->xss_clean(trim($this->input->post('user_all'))) == 'select')
                $this->form_validation->set_rules('user_id[]', 'Select User', 'required|trim|xss_clean');
            
            $this->form_validation->set_rules('message', 'Message', 'required|trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {

                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', 'Notifications/Notify_passenger', false);
            } else {
                $user_id=array();

                $user_all = $this->security->xss_clean($this->input->post('user_all'));
                $message_expiry = $this->security->xss_clean($this->input->post('message_expiry'));
                $user_id = $this->security->xss_clean($this->input->post('user_id[]'));
                $message = $this->security->xss_clean(trim($this->input->post('message')));

                if($message_expiry && $message_expiry < date('m/d/Y')) {
                    $this->redirect('Expiry Date Error!', 'Notifications/Notify_passenger', FALSE);
                }
                
                $res = $this->Notifications_model->insertNotification($user_id, $message, $user_details, $user_all, $message_expiry, 0);
                
                if($res){                    
                   $this->redirect('Notification sended successfully', 'Notifications/Notify_passenger', true);
                }
                       
            }
        }

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Notify_passenger');
    }

    public function Notification_history() {

        $title = 'Notification History';
        $this->set('title', $title);
        $this->set('page_heading', 'Notification History');
        $this->set('page_summery', '');
        $this->set('page_name', 'Notification History');
        
        $notification=$this->Notifications_model->getNotificationHistory();
        $this->set('notification', $notification);
        
        $this->view('Notification_history');
    }

    public function Notify_driver() {

        $title = 'Pilot Notifications';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);


        $user_details = $this->Notifications_model->getDriverDetails();
        $this->set('user_details', $user_details);

        if ($this->input->post('submit')) {
            
            // $this->form_validation->set_rules('user_all', 'All Users', 'required|trim|xss_clean');
            
            if($this->security->xss_clean(trim($this->input->post('user_all'))) == 'select')
                $this->form_validation->set_rules('user_id[]', 'Select User', 'required|trim|xss_clean');
            
            $this->form_validation->set_rules('message', 'Message', 'required|trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {

                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', 'Notifications/Notify_driver', false);
            } else {

                $user_id=array();

                $user_all = $this->security->xss_clean($this->input->post('user_all'));
                $message_expiry = $this->security->xss_clean($this->input->post('message_expiry'));
                $user_id = $this->security->xss_clean($this->input->post('user_id[]'));
                $message = $this->security->xss_clean(trim($this->input->post('message')));

                if($message_expiry && $message_expiry < date('m/d/Y')) {
                    $this->redirect('Expiry Date Error!', 'Notifications/Notify_driver', FALSE);
                }

                $res = $this->Notifications_model->insertNotification($user_id, $message, $user_details, $user_all, $message_expiry);
                
                if($res){                    
                   $this->redirect('Notification sended successfully', 'Notifications/Notify_driver', true);
                }
            }
        }

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Notify_driver');
    }

}
