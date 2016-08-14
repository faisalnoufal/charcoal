<?php

class Profile extends Core_Controller {

    public function isUniquePhone($str)
    {
        $edit_user_id = $this->session->userdata('edit_user_id');

        if ($this->Profile_model->getPassengerData($str, 'mobile1', $edit_user_id))
        {            
            $this->form_validation->set_message('isUniquePhone', 'This {field} alredy registered.');
            return FALSE;
        }
        else
        {            
            return TRUE;
        }            
    }

    public function isUniqueCabNumber($str)
    {
        $edit_user_id = $this->session->userdata('edit_user_id');

        if ($this->Profile_model->getPassengerData($str, 'cab_number', $edit_user_id))
        {
            $this->form_validation->set_message('isUniqueCabNumber', 'The {field} alredy registered.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }            
    }    

    public function isValidPhoneNo($str)
    {        
        if(preg_match("/^((\\+)|(00)|(\\*)|())[0-9]{3,20}((\\#)|())$/", $str))
        {            
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('isValidPhoneNo', '{field} Not Valid!.');
            return FALSE;    
        }        
    }

    public function Profile_view($driver_id = '') {
        $title = 'Profile View';
        $this->set('title', $title);
        $this->set('page_heading', "Profile View");
        $this->set('page_summery', "");
        $this->set('page_name', "Profile View");

        if ($driver_id) {
            $cab_name_list = $this->Profile_model->getCabNames();
            $this->set('cab_name_list', $cab_name_list);
            $driver_profile = $this->Profile_model->getDriversList($driver_id);
            $cab_type = $this->Profile_model->getCabType($driver_profile[0]['cab_name']);
            $timeline = $this->Profile_model->getTimeLine($driver_id);

            $this->set('timeline', $timeline);
            
            //$this->set('cab_name', $driver_profile[0]['cab_name']);
            //$this->set('user_name', $driver_profile[0]['user_name']);
            $this->set('id', $driver_profile[0]['user_id']);
            $this->set('first_name', $driver_profile[0]['first_name']);
            $this->set('last_name', $driver_profile[0]['last_name']);
            $this->set('nationality', $driver_profile[0]['nationality']);
            $this->set('address1', $driver_profile[0]['address1']);
            $this->set('address2', $driver_profile[0]['address2']);
            $this->set('address3', $driver_profile[0]['address3']);
            $this->set('email', $driver_profile[0]['email']);
            $this->set('mobile1', $driver_profile[0]['mobile1']);
            $this->set('mobile2', $driver_profile[0]['mobile2']);
            $this->set('licence', $driver_profile[0]['licence']);
            $this->set('cab_number', $driver_profile[0]['cab_number']);
            $this->set('cab_model', $driver_profile[0]['cab_model']);
            $this->set('cab_name', $cab_type);
            $this->set('cab_seat', $driver_profile[0]['cab_seat']);
            $this->set('profile_pic', $driver_profile[0]['profile_pic']);
            $this->set('bank_name', $driver_profile[0]['bank_name']);
            $this->set('acc_number', $driver_profile[0]['acc_number']);
            $this->set('branch_code', $driver_profile[0]['branch_code']);
            $this->set('swift_code', $driver_profile[0]['swift_code']);
            $this->set('ins_renew_date', $driver_profile[0]['ins_renew_date']);
            $this->set('tax_renew_date', $driver_profile[0]['tax_renew_date']);
            if ($this->session->userdata('error')) {
                $error = $this->session->userdata('error');
                $this->set('error', $error);
                $this->session->unset_userdata('error');
            }
            $this->view('Profile_view');
        
        } else if ($this->input->post('submit')) {

            $data['id'] = $this->input->post('user_id');
            $this->session->set_userdata('edit_user_id', $data['id']);
            
            $this->form_validation->set_rules('f_name', 'First Name', 'required|trim|xss_clean|min_length[5]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('l_name', 'Last Name', 'required|trim|xss_clean|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('nationality', 'Nationality', 'required|trim|xss_clean|min_length[4]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('address1', 'Address', 'required|trim|xss_clean|min_length[5]|max_length[200]|alpha_numeric_spaces');
            $this->form_validation->set_rules('address2', 'Address', 'required|trim|xss_clean|max_length[200]|alpha_numeric_spaces');
            $this->form_validation->set_rules('address3', 'Address', 'required|trim|xss_clean|max_length[200]|alpha_numeric_spaces');
            $this->form_validation->set_rules('licence', 'Licence', 'required|trim|xss_clean|min_length[5]|max_length[50]|alpha_numeric_spaces');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|min_length[6]|max_length[100]');
            $this->form_validation->set_rules('mobile1', 'Mobile Number', 'required|trim|xss_clean|callback_isValidPhoneNo|callback_isUniquePhone|min_length[10]|max_length[20]');

            if(trim($this->input->post('mobile2')) != '')
                $this->form_validation->set_rules('mobile2', 'Second Mobile Number', 'required|trim|xss_clean|callback_isValidPhoneNo|min_length[10]|max_length[20]');

            $this->form_validation->set_rules('cab_number', 'Cab Number', 'required|trim|xss_clean|alpha_numeric_spaces|callback_isUniqueCabNumber|min_length[5]|max_length[20]');
            $this->form_validation->set_rules('cab_model', 'Cab Model', 'required|trim|xss_clean|alpha_numeric_spaces|min_length[5]|max_length[25]');
            $this->form_validation->set_rules('cab_seat', 'Cab Seat', 'required|trim|xss_clean|numeric|greater_than[0]|less_than_equal_to[60]');
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim|min_length[5]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('acc_number', 'Account Number', 'required|trim|xss_clean|min_length[10]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('branch_code', 'Branch Code', 'required|trim|xss_clean|min_length[5]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('swift_code', 'Swift Code', 'required|trim|xss_clean|min_length[5]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('ins_renew_date', 'Insurance Renew Date', 'required|trim|xss_clean|min_length[8]|max_length[10]');
            $this->form_validation->set_rules('tax_renew_date', 'Tax Renew Date', 'required|trim|xss_clean|min_length[8]|max_length[10]');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('some felds are missing', "Profile/Profile_view/" . $data['id'] . "#tab_edit", false);
                //print_r($error);die();
                //$this->set('error', $error);                
                //$this->view('Profile_view');
            } else {
                $this->session->unset_userdata('edit_user_id');
                //$data['user_name'] = $this->input->post('user_name');
                $data['id'] = $this->security->xss_clean(trim($this->input->post('user_id')));
                $data['first_name'] = $this->security->xss_clean(trim($this->input->post('f_name')));
                $data['last_name'] = $this->security->xss_clean(trim($this->input->post('l_name')));
                $data['nationality'] = $this->security->xss_clean(trim($this->input->post('nationality')));
                $data['address1'] = $this->security->xss_clean(trim($this->input->post('address1')));
                $data['address2'] = $this->security->xss_clean(trim($this->input->post('address2')));
                $data['address3'] = $this->security->xss_clean(trim($this->input->post('address3')));
                $data['email'] = $this->security->xss_clean(trim($this->input->post('email')));
                $data['mobile1'] = $this->security->xss_clean(trim($this->input->post('mobile1')));
                $data['mobile2'] = $this->security->xss_clean(trim($this->input->post('mobile2')));
                $data['licence'] = $this->security->xss_clean(trim($this->input->post('licence')));
                $data['cab_num'] = $this->security->xss_clean(trim($this->input->post('cab_number')));
                $data['cab_model'] = $this->security->xss_clean(trim($this->input->post('cab_model')));
                $data['cab_name'] = $this->security->xss_clean(trim($this->input->post('cab_name')));
                $data['cab_seat'] = $this->security->xss_clean(trim($this->input->post('cab_seat')));
                $data['bank_name'] = $this->security->xss_clean(trim($this->input->post('bank_name')));
                $data['acc_number'] = $this->security->xss_clean(trim($this->input->post('acc_number')));
                $data['branch_code'] = $this->security->xss_clean(trim($this->input->post('branch_code')));
                $data['swift_code'] = $this->security->xss_clean(trim($this->input->post('swift_code')));
                $data['ins_renew_date'] = $this->security->xss_clean(trim($this->input->post('ins_renew_date')));
                $data['tax_renew_date'] = $this->security->xss_clean(trim($this->input->post('tax_renew_date')));
                $res = $this->Profile_model->updateDriverDetails($data);
                if ($res) {
                    $this->redirect('Profile Updated Successfully', "Profile/Profile_view/" . $data['id'], TRUE);
                }
            }
        } else {

            $this->redirect('', "profile/complete_drivers", FALSE);
        //        if ($driver_id) {
        //            $driver_profile = $this->profile_model->getDriversList($driver_id);
        //            $this->set('name', $driver_profile[0]['name']);
        //            $this->set('email', $driver_profile[0]['email']);
        //            $this->set('user_name', $driver_profile[0]['user_name']);
        //            $this->set('password', $driver_profile[0]['password']);
        //            $this->set('mobile', $driver_profile[0]['mobile']);
        //            $this->set('profile_pic', $driver_profile[0]['profile_pic']);
        //           $this->view('Profile_view');
        //        }
                    //$this->view('Profile_view');
        }
        // $this->view('Profile_view');
    }

    public function Complete_drivers($offset=0) {
        $title = 'All Pilots';
        $this->set('title', $title);
        $this->set('page_heading', "All Pilots");
        $this->set('page_summery', "");
        $this->set('page_name', "All Pilots");

        $this->load->library('pagination');

        $config['base_url'] =  base_url() . 'Profile/Complete_drivers';
        $config['total_rows'] = $this->Profile_model->getDriversCount();
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

        $drivers = $this->Profile_model->getDriversList('', $page, 10);
        
        $page_links = $this->pagination->create_links();
        
        $this->set('page_links', $page_links);        
        
        $this->set('drivers', $drivers);
        $this->view('Complete_drivers');
    }

    public function Driver_rating() {
        $title = 'Pilot Rating';
        $this->set('title', $title);
        $this->set('page_heading', "Pilot Rating");
        $this->set('page_summery', "");
        $this->set('page_name', "Pilot Rating");

        $rating = $this->Profile_model->getDriversList();
        $this->set('rating', $rating);
        $this->view('Driver_rating');
    }

    public function Rating_history($user_id = '') {        
        $title = "Pilot Rating History";
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $rating = $this->Profile_model->getRatingHistory($user_id);
        $this->set('rating', $rating);
        $this->set('user_type', 'pilot');
        $this->view('Rating_history');
    }

    public function Get_drivers()
    {        
        $this->load->model('Location_model');
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
                                        <a href="' . $base_url. 'Profile/Profile_view/'.$details['user_id'].'"class="btn btn-flat btn-primary btn-xs">View Profile</a>
                                    </div><!--.friend-content-->
                                </div><!--.card-->
                            </div><!--.col-md-6-->';
        }
        echo $list_html;        
    }

}
