<?php

class Cabs extends Core_Controller {

    public function Cab_Management($action='', $edit_id='') {  
        
    	$title = 'Cab Type Management';
        $this->set('title', $title);
        $this->set('page_heading', "Cab Type Management");
        $this->set('page_summery', "");
        $this->set('page_name', "Cabs");
    	
    	if($this->input->post('submit'))
    	{	            
            $this->form_validation->set_rules('cab_type', 'Cab Type Name', 'required|trim|xss_clean|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('short_name', 'Cab Type Short Name', 'required|trim|xss_clean|min_length[2]|max_length[50]');

            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Cabs/Cab_Management", FALSE);
            } 
            else 
            {
        		$edit_id = $this->security->xss_clean(trim($this->input->post('edit_id')));
        		$cab_type = $this->security->xss_clean(trim($this->input->post('cab_type')));
        		$short_name = $this->security->xss_clean(trim($this->input->post('short_name')));
                $file_name = 'cab.png';

                if ($_FILES['userfile']['error'] != 4) {
                    $config['upload_path'] = './public_html/images/cab/';
                    $config['allowed_types'] = 'ico|gif|jpg|png|jpeg';
                    $config['max_size'] = '15';
                    $config['max_width']  = '100';
                    $config['max_height']  = '100';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $field_name = 'userfile';
                    if (!$this->upload->do_upload($field_name)) 
                    {
                        $error = $this->upload->display_errors();
                        $msg = is_array($error) ? implode("<br>", $error) : $error;
                        $this->redirect($msg, "Cabs/Cab_Management", FALSE);
                    } 
                    else 
                    {
                        $data = array('upload_data' => $this->upload->data());
                        $file_name = $data['upload_data']['file_name'];
                    }                    
                }                

        		$res = $is_duplicate = false;
        		$msg_success = $msg_error = '';
    		
	    		if($edit_id)
	    		{
	    			$is_duplicate = $this->Cabs_model->checkCabTypeExist($cab_type, $edit_id);
	    			if(!$is_duplicate) 
	    			{
		    			$res = $this->Cabs_model->updateCabsList($cab_type, $short_name, $file_name, $edit_id);
		    			$msg_success = 'Cab Type Updated Succesfully.';
		    			$msg_error = 'Error on Updating Cab Type.';
		    		}
		    		else
		    		{		    			
		    			$msg_error = 'Duplicate Vehicle Type.';
		    		}
	    		}
	    		else
	    		{
	    			$is_duplicate = $this->Cabs_model->checkCabTypeExist($cab_type);
	    			if(!$is_duplicate) 
	    			{
		    			$res = $this->Cabs_model->updateCabsList($cab_type, $short_name, $file_name);
		    			$msg_success = 'Cab Type Inserted Succesfully.';
		    			$msg_error = 'Error on Inserting Cab Type.';    
	    			} 
	    			else 
	    			{
	    				$msg_error = 'Duplicate Vehicle Type.';
	    			}			
	    		}	    		

	    		if($res)
	    		{
	    			$this->redirect($msg_success, 'Cabs/Cab_Management', true);
	    		}
	    		else
	    		{
	    			$this->redirect($msg_error, 'Cabs/Cab_Management', false);
	    		}
	    	}
    	}

		if ($action == "edit") 
    	{               
            $cab_detail = $this->Cabs_model->getCabsList($edit_id);
            
            $cab_id = $cab_detail[0]['id'];            
            $cab_type_name = $cab_detail[0]['type_name'];
            $cab_type_short_name = $cab_detail[0]['type_short_name'];
            
            $this->set('cab_id', $cab_id);
            $this->set('cab_type_name', $cab_type_name);
            $this->set('cab_type_short_name', $cab_type_short_name);
        } 
        else 
        {
            $this->set('cab_id', '');
            $this->set('cab_type_name', '');
            $this->set('cab_type_short_name', '');
        }

        if ($action == "deactivate") {
            
            $result = $this->Cabs_model->changeActiveState($edit_id);

            if (is_array($result)) 
            {
                $msg = 'Error on ' . ($result[0] == 0 ? 'Deactivating' : 'Activating') . ' Cab Type. ' . $result[1];
                $this->redirect($msg, "Cabs/Cab_Management", FALSE);
            } 
            else if($result) 
            {
                $msg = 'Cab Type Deactivated Succesfully.';
                $this->redirect($msg, "Cabs/Cab_Management", TRUE);            
            } 
            else 
            {
                $msg = 'Cab Type Activated Succesfully.';
                $this->redirect($msg, "Cabs/Cab_Management", TRUE);
            }
        }

        $cabs_list = $this->Cabs_model->getCabsList();

    	$this->set('cabs_list', $cabs_list);
    	$this->set('edit_id', $edit_id);

        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->view('Cab_Management');
    }

    public function Fare_Management() {

  	    $title = 'Fare Settings';
        $this->set('title', $title);
        $this->set('page_heading', "Fare Settings");
        $this->set('page_summery', "");
        $this->set('page_name', "Fare Settings");

        if($this->input->post('submit'))
    	{	
            $this->form_validation->set_rules('fare_per_km', 'Cab Fare Per KM', 'required|trim|xss_clean|numeric|greater_than[0]');
            $this->form_validation->set_rules('minimum_charge', 'Minimum Now', 'required|trim|xss_clean|numeric|greater_than[0]');
            $this->form_validation->set_rules('minimum_later', 'Minimum Later', 'required|trim|xss_clean|numeric|greater_than[0]');
            $this->form_validation->set_rules('minimum_distance', 'Minimum Distance', 'required|trim|xss_clean|numeric|greater_than[0]');
            $this->form_validation->set_rules('waiting_charge', 'Waiting Charge Per 10 minutes', 'required|trim|xss_clean|numeric|greater_than_equal_to[0]');
            $this->form_validation->set_rules('cab_id', 'Cab', 'required|trim|xss_clean|numeric');

            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);                
                $this->redirect('Insufficient Data!', 'Cabs/Fare_Management', false);
            } 
            else 
            {
        		$cab_id = $this->security->xss_clean(trim($this->input->post('cab_id')));
                $fare_per_km = $this->security->xss_clean(trim($this->input->post('fare_per_km')));
                $minimum_charge = $this->security->xss_clean(trim($this->input->post('minimum_charge')));
                $minimum_later = $this->security->xss_clean(trim($this->input->post('minimum_later')));
        		$minimum_distance = $this->security->xss_clean(trim($this->input->post('minimum_distance')));
        		$waiting_charge = $this->security->xss_clean(trim($this->input->post('waiting_charge')));

        		$res = false;
        		$msg_success = $msg_error = '';

        		if($cab_id && $cab_id != '' && $cab_id != 0) 
        		{  			
        			$res = $this->Cabs_model->updateCabsFare($fare_per_km, $minimum_charge, $minimum_later, $minimum_distance, $waiting_charge, $cab_id);
        			$msg_success = 'Cab Fare Updated Succesfully.';
        			$msg_error = 'Error on Updating Cab Fare.';
        		}
    		
        		if($res)
        		{
        			$this->redirect($msg_success, 'Cabs/Fare_Management', true);
        		}
        		else
        		{
        			$this->redirect($msg_error, 'Cabs/Fare_Management', false);
        		}
            }
    	}

        $cabs_list = $this->Cabs_model->getCabsList('', true);

    	$this->set('cabs_list', $cabs_list);

        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
    	
        $this->view('Fare_Management');
    }


    public function get_cab_details() {
    	
        $cab_id = $this->security->xss_clean(trim($this->input->post('cab_id')));    	

        $cabs_list = $this->Cabs_model->getCabsList($cab_id);
		
		if(count($cabs_list) > 0) 
		{
			echo json_encode($cabs_list[0]);
		}
		else
		{
			echo 'no';
		}
    }


    public function Cab_Details($action = '', $edit_id = '') {

        $title = 'Cab Details';
        $this->set('title', $title);
        $this->set('page_heading', "Cab Details");
        $this->set('page_summery', "");
        $this->set('page_name', "Cab Details");

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('cab_model_name', 'Cab Model Name', 'required|trim|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('cab_reg_details', 'Cab Registration Details', 'required|trim|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('cab_id', 'Cab Type', 'required|trim|min_length[1]|max_length[50]');
            $this->form_validation->set_rules('seating_capacity', 'Seating Capacity', 'required|trim|min_length[1]|max_length[50]');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Cabs/Cab_Details", false);

            } else {
                $cab_id = $this->security->xss_clean(trim($this->input->post('cab_id')));
                $cab_model_name = $this->security->xss_clean(trim($this->input->post('cab_model_name')));
                $cab_reg_details = $this->security->xss_clean(trim($this->input->post('cab_reg_details')));
                $seating_capacity = $this->security->xss_clean(trim($this->input->post('seating_capacity')));


                if ($_FILES['userfile']['error'] != 4) {

                    $config['upload_path'] = './public_html/images/cabs/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '4000000';
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = false;

                    $this->load->library('upload', $config);
                    $msg = "";

                    if (!$this->upload->do_upload()) {

                        $msg = "Image Not Selected";
                        $error = array('error' => $this->upload->display_errors());
                        $this->redirect($msg, "Cabs/Cab_Details", FALSE);
                    } else {

                        $image_arr = array('upload_data' => $this->upload->data());
                        $new_file_name = $image_arr['upload_data']['file_name'];
                        $image = $image_arr['upload_data'];

                        if ($image['file_name']) {
                            $data['photo'] = "public_html/images/profile_picture/" . $image['file_name'];
                            $data['raw'] = $image['raw_name'];
                            $data['ext'] = $image['file_ext'];
                        }


                        if ($action == "edit") {
                            $res1 = $this->Cabs_model->updateCabModelList($edit_id, $cab_id, $cab_model_name, $cab_reg_details, $image['file_name'], $seating_capacity);
                            if ($res1) {
                                $msg = "Cab Details Edited Successfully";
                                $this->redirect($msg, 'Cabs/Cab_Details', true);
                            }
                        } else {
                            $res = $this->Cabs_model->addCabsDetails($cab_id, $cab_model_name, $cab_reg_details, $image['file_name'], 1, $seating_capacity);
                            if ($res) {
                                $msg = "Cab Details Added Successfully";
                                $this->redirect($msg, 'Cabs/Cab_Details', true);
                            } else {
                                $msg = "Addition Failed";
                                $this->redirect($msg, 'Cabs/Cab_Details', true);
                            }
                        }
             
                    }
                }
            }
        }

        if ($action == "deactivate") {
            $deactivate = $this->Cabs_model->changeStatus($edit_id, 0);

            if ($deactivate) {
                $msg_success = "Cab Deactivated Successfully";
                $this->redirect($msg_success, 'Cabs/Cab_Details', true);
            }
        }

        if ($action == "activate") {
            $deactivate = $this->Cabs_model->changeStatus($edit_id, 1);

            if ($deactivate) {
                $msg_success = "Cab Activated Successfully";
                $this->redirect($msg_success, 'Cabs/Cab_Details', true);
            }
        }

        if ($action == "edit") {
            $cab_model_list = $this->Cabs_model->getCabsDetailsList($edit_id);
            $cab_model_name = $cab_model_list[0]['cab_model_name'];
            $cab_reg_details = $cab_model_list[0]['cab_registration_details'];
            $cab_id = $cab_model_list[0]['cab_id'];
            $seating_capacity = $cab_model_list[0]['seating_capacity'];
            $cab_type = $this->Cabs_model->getCabType($cab_id);
            $cab_type = $cab_type['type_short_name'];

            $this->set('cab_model_name', $cab_model_name);
            $this->set('cab_reg_details', $cab_reg_details);
            $this->set('cab_id', $cab_id);

            $this->set('cab_type', $cab_type);
            $this->set('seating_capacity', $seating_capacity);
        } else {
            $this->set('cab_model_name', '');
            $this->set('cab_reg_details', '');
            $this->set('cab_id', '');
            $this->set('cab_type', "");
            $this->set('seating_capacity', "");
        }

        $cab_detail_list = $this->Cabs_model->getCabsDetailsList();

        $this->set('cab_detail_list', $cab_detail_list);
        $cabs_list = $this->Cabs_model->getCabsList('', true);
        $this->set('cabs_list', $cabs_list);


        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Cab_Details');
    }

}
