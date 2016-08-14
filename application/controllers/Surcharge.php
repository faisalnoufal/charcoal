<?php

class Surcharge extends Core_Controller {
    public function Surcharge_Management($action='', $edit_id='') {  

    	$title = 'Surcharge Management';
        $this->set('title', $title);
        
        $this->set('page_heading', "Surcharge Management");
        $this->set('page_summery', "");
        $this->set('page_name', "Surcharge Management");
    	
    	if($this->input->post('submit'))
    	{
           $this->form_validation->set_rules('surcharge', 'Surcharge', 'required|trim|min_length[5]|max_length[100]');
           $this->form_validation->set_rules('surcharge_amount', 'Amount', 'required|trim|min_length[2]|max_length[50]');
           if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Surcharge/Surcharge_Management", false);
            } 
           else{
           $surcharge = $this->security->xss_clean(trim($this->input->post('surcharge')));
           $amount = $this->security->xss_clean(trim($this->input->post('surcharge_amount')));
             
              if($action=="edit"){
              $res1 = $this->Surcharge_model->updateSurchargeList($edit_id,$surcharge, $amount);  
              
              if($res1){
                  $msg_success = "Surcharge Edited Successfully";
                  $this->redirect($msg_success, 'Surcharge/Surcharge_Management', true);
                       }
              }
              else{
                 $res = $this->Surcharge_model->addSurchargeList($surcharge, $amount, 1); 
              }
            
        }
        }
        if($action=="edit") 
	  {
            $surcharge_list = $this->Surcharge_model->getCabSurchargeList($edit_id);
            
            $surcharge_id = $surcharge_list[0]['id'];            
            $surcharge = $surcharge_list[0]['surcharge'];
            $amount = $surcharge_list[0]['amount'];
            
            $this->set('surcharge_id', $surcharge_id);
            $this->set('surcharge', $surcharge);
            $this->set('amount', $amount);
          }
          else 
        {
            $this->set('surcharge_id', '');
            $this->set('surcharge', '');
            $this->set('amount', '');
        }
        if($action=="deactivate") {
         $deactivate = $this->Surcharge_model->changeStatus($edit_id,0); 
         
         if($deactivate){
                  $msg_success = "Surcharge Deactivated Successfully";
                  $this->redirect($msg_success, 'Surcharge/Surcharge_Management', true);
              }
        }
        if($action=="activate") {
         $deactivate = $this->Surcharge_model->changeStatus($edit_id,1);
         
         if($deactivate){
                  $msg_success = "Surcharge Activated Successfully";
                  $this->redirect($msg_success, 'Surcharge/Surcharge_Management', true);
              }
        }
         
         $surcharge_list = $this->Surcharge_model->getCabSurchargeList();
         $this->set('surcharge_list', $surcharge_list);    
         
         if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
         $this->set('edit_id', $edit_id);
         $this->view('Surcharge_Management');
    }
}