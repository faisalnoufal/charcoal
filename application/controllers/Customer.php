<?php

class Customer extends Core_Controller {

    public function Profile_view($customer_id = '') {


        $title = 'Profile View';
        $this->set('title', $title);
        $this->set('page_heading', "Profile View");
        $this->set('page_summery', "");
        $this->set('page_name', "Profile View");

        if ($customer_id) {
           
            $customer_profile = $this->Customer_model->getCustomerList($customer_id);
            $timeline = $this->Customer_model->getTimeLine($customer_id);

            $this->set('timeline', $timeline);
            
            $this->set('user_id', $customer_profile[0]['user_id']);
            $this->set('fullname', $customer_profile[0]['fullname']);
            $this->set('mobile', $customer_profile[0]['mobile']);
            $this->set('email', $customer_profile[0]['email']);
            $this->set('profile_pic', $customer_profile[0]['profile_pic']);
            $this->set('rating', $customer_profile[0]['rating']);
            $this->set('join_date', $customer_profile[0]['join_date']);
            $this->view('Customer_profile');
        } else{
            $this->redirect('', "Customer/Complete_customers", TRUE);
        }
           
    }

    public function Complete_customers() {
        $title = 'All Passengers';
        $this->set('title', $title);
        $this->set('page_heading', "All Passengers");
        $this->set('page_summery', "");
        $this->set('page_name', "All Passengers");

        $this->load->library('pagination');

        $config['base_url'] =  base_url() . 'Customer/Complete_customers';
        $config['total_rows'] = $this->Customer_model->getCustomerCount();
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

        $customer = $this->Customer_model->getCustomerList('', $page, 10);
        
        $page_links = $this->pagination->create_links();
        
        $this->set('page_links', $page_links);
        $this->set('customer', $customer);
        $this->view('Complete_customers');
    }

    public function Get_customers()
    {   
        $base_url = base_url();
        
        $input_key = $this->input->post('input_search');
        $customer = $this->Customer_model->getCustomerDetails($input_key);
        
        $list_html = '';
        foreach($customer as $details)
        {        
            $list_html .= '<div class="col-md-6">
                                <div class="card tile card-friend">
                                    <img src="' . $base_url . 'public_html/images/faces/passenger/'.$details['profile_pic'].'" class="user-photo" alt="">
                                    <div class="friend-content">
                                        <p class="title">'.$details['fullname'].'</p>
                                        <p><a href="#">Rate '.round($details['rating'],2).'</a></p>
                                        <a href="' . $base_url. 'Customer/Profile_view/'.$details['user_id'].'"class="btn btn-flat btn-primary btn-xs">View Profile</a>
                                    </div><!--.friend-content-->
                                </div><!--.card-->
                            </div><!--.col-md-6-->';
        }
        echo $list_html;        
    }
    
    public function Customer_rating() {
        $title = 'Passenger Rating';
        $this->set('title', $title);
        $this->set('page_heading', "Passenger Rating");
        $this->set('page_summery', "");
        $this->set('page_name', "Passenger Rating");        
        
        $rating = $this->Customer_model->getCustomerList();
        $this->set('rating', $rating);
        $this->view('Customer_rating');
    }

    public function Rating_history($user_id = '') {        
        $title = "Passenger Rating History";
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $rating = $this->Customer_model->getRatingHistory($user_id);
        $this->set('rating', $rating);
        $this->set('user_type', 'passenger');
        $this->view('Rating_history');
    }

    public function Archive_user($user_id = '', $value = '') {

        $title = 'Archive/Unarchive Passenger';
        $this->set('title', $title);
        $this->set('page_heading', "Archive/Unarchive Passenger");
        $this->set('page_summery', "");
        $this->set('page_name', "Archive/Unarchive Passenger");
        
        $customer_list = $this->Customer_model->getCustomerList();

        $this->set('user_list', $customer_list);
        $this->set('user_type', 'Passenger');
        
        if ($user_id != '') {
            
            $user_id = $this->security->xss_clean(trim($user_id));
            $value = $this->security->xss_clean(trim($value));

            $update = $this->Customer_model->cancelPassengers($user_id, ($value == 0 ? 'no' : 'yes'));

            if($update && $value == 0)
            {
                $msg = 'Passenger Archived';
                $this->redirect($msg, "Customer/Archive_user", TRUE);
            }
            else if($update && $value == 1)
            {
                $msg = 'Passenger Unarchived';
                $this->redirect($msg, "Customer/Archive_user", TRUE);
            }
            else if($value == 1)
            {
                $msg = 'Passenger Unarchive Failed';
                $this->redirect($msg, "Customer/Archive_user", FALSE);
            }
            else
            {
                $msg = 'Passenger Archive failed!';
                $this->redirect($msg, "Customer/Archive_user", FALSE);
            }
        }

        $this->view('Archive_user');
    }

    public function Change_password() 
    { 
        $title = 'Change Password';
        $this->set('title', $title);
        $this->set('page_heading', "Change Password");
        $this->set('page_summery', "");
        $this->set('page_name', "Change Password");
        
        $passengers = $this->Customer_model->getCustomerList();
        $this->set('user_array', $passengers);
        $this->set('user_type', 'Passenger');

        if ($this->input->post('submit')) 
        {
            $this->form_validation->set_rules('user_id', 'Passenger', 'required|trim|numeric');
            $this->form_validation->set_rules('new_password', 'Password', 'required|trim|min_length[6]|max_length[100]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_length[6]|max_length[100]|matches[new_password]');            

            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Customer/Change_password", FALSE);
            } 
            else 
            {
                $user_id = $this->security->xss_clean(trim($this->input->post('user_id')));
                $new_password = $this->security->xss_clean(trim($this->input->post('new_password')));
                $confirm_password = $this->security->xss_clean(trim($this->input->post('confirm_password')));

                $updt = $this->Customer_model->updatePassword($user_id, $new_password);

                if ($updt) 
                {
                    $msg = 'Password Changed Successfully.';
                    $this->redirect($msg, "Customer/Change_password", TRUE);
                } 
                else
                {
                    $msg = 'Password Change Failed!';
                    $this->redirect($msg, "Customer/Change_password", FALSE);  
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

    public function Online_users() {
        $title = 'Online Users';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);

        $user_list = $this->Customer_model->getOnlineUsers();
        
        $this->set('user_type', 'passengers');
        $this->set('user_list', $user_list);
        $this->view('Online_users');
    }

    public function My_referrals() {
        $title = 'My Referrals';
        $this->set('title', $title);
        $this->set('page_heading', $title);
        $this->set('page_summery', '');
        $this->set('page_name', $title);
        
        $user_id = '';
        $user_list = array();
        $user_details = $this->Customer_model->getCustomerList();

        if($this->input->post('submit')) {
            $user_id = $this->security->xss_clean(trim($this->input->post('user_name')));
            $user_list = $this->Customer_model->getMyReferrals($user_id);
            $this->set('user_list', $user_list);
        }        
        
        $this->set('user_details', $user_details);        
        $this->set('user_type', 'passenger');        
        $this->set('user_id', $user_id);        
        $this->view('My_referrals');
    }
    
}
