<?php

class Register extends Core_Controller {

    public function isUniquePhone($str)
    {
        if ($this->Register_model->getPassengerData($str, 'mobile1'))
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
        if ($this->Register_model->getPassengerData($str, 'cab_number'))
        {
            $this->form_validation->set_message('isUniqueCabNumber', 'The {field} alredy registered.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }            
    }

    public function isUniqueUsername($str)
    {
        if ($this->Register_model->getPassengerData($str, 'user_name'))
        {
            $this->form_validation->set_message('isUniqueUsername', 'The {field} alredy registered.');
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

    public function Register_driver() {
        $title = 'Enroll New Pilot';
        $this->set('title', $title);
        $this->set('page_heading', "Enroll New Pilot");
        $this->set('page_summery', "");
        $this->set('page_name', "Enroll New Pilot");

        if ($this->input->post('submit')) {            
            $this->form_validation->set_rules('f_name', 'First Name', 'required|trim|xss_clean|min_length[5]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('l_name', 'Last Name', 'required|trim|xss_clean|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('nationality', 'Nationality', 'required|trim|xss_clean|min_length[4]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('address1', 'Address 1', 'required|trim|xss_clean|min_length[5]|max_length[200]|alpha_numeric_spaces');
            $this->form_validation->set_rules('address2', 'Address 2', 'required|trim|xss_clean|max_length[200]|alpha_numeric_spaces');
            $this->form_validation->set_rules('address3', 'Address 3', 'required|trim|xss_clean|max_length[200]|alpha_numeric_spaces');
            $this->form_validation->set_rules('licence', 'Licence', 'required|trim|xss_clean|min_length[5]|max_length[50]|alpha_numeric_spaces');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|min_length[6]|max_length[100]');
            $this->form_validation->set_rules('mobile1', 'Mobile Number', 'required|trim|xss_clean|callback_isValidPhoneNo|callback_isUniquePhone|min_length[10]|max_length[20]');
            
            if(trim($this->input->post('mobile2')) != '')
                $this->form_validation->set_rules('mobile2', 'Second Mobile Number', 'required|trim|xss_clean|callback_isValidPhoneNo|min_length[10]|max_length[20]');

            $this->form_validation->set_rules('cab_num', 'Cab Number', 'required|trim|xss_clean|alpha_numeric_spaces|callback_isUniqueCabNumber|min_length[5]|max_length[20]');
            $this->form_validation->set_rules('cab_model', 'Cab Model', 'required|trim|xss_clean|alpha_numeric_spaces|min_length[5]|max_length[25]');
            $this->form_validation->set_rules('cab_seat', 'Cab Seat', 'required|trim|xss_clean|numeric|greater_than[0]|less_than_equal_to[60]');
            $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|xss_clean|alpha_numeric|callback_isUniqueUsername|min_length[5]|max_length[20]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim|xss_clean|min_length[5]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('acc_number', 'Account Number', 'required|trim|xss_clean|min_length[10]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('branch_code', 'Branch Code', 'required|trim|xss_clean|min_length[5]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('swift_code', 'Swift Code', 'required|trim|xss_clean|min_length[5]|max_length[100]|alpha_numeric_spaces');
            $this->form_validation->set_rules('ins_renew_date', 'Insurance Renewal Date', 'required|trim|xss_clean|min_length[8]|max_length[10]');
            $this->form_validation->set_rules('tax_renew_date', 'Tax Renewal Date', 'required|trim|xss_clean|min_length[8]|max_length[10]');

            if ($this->form_validation->run() == FALSE) 
            {
                $error = $this->form_validation->error_array();                
                $this->set('error', $error);
                $this->set('err_msg', 'Please find the errors below and correct!');
                $this->view('Register_driver');                
            } 
            else 
            {
                if ($_FILES['address_proof']['error'] != 4) {
                    $config1['upload_path'] = './public_html/address_proof/';
                    $config1['allowed_types'] = 'pdf|gif|jpg|png|jpeg';
                    $config1['max_size'] = '20000000';
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    $field_name = 'address_proof';
                    if (!$this->upload->do_upload($field_name)) {
                        $error = array('error' => $this->upload->display_errors());
                       
                        $this->redirect('Error in file upload...', "Register/Register_driver", FALSE);
                    } else {
                        $data = array('upload_data' => $this->upload->data());

                        $file_name = $data['upload_data']['file_name'];
                    }
                    //$regr['userfile'] = FCPATH . "public_html/IDproof/$file_name";
                    //$regr['userfile'] = $file_name;
                    $address_proof_path = $file_name;
                } else {
                    $this->redirect('please select file', "Register/Register_driver", FALSE);
                }

                if ($_FILES['licence_proof']['error'] != 4) {
                    $config2['upload_path'] = './public_html/licence_proof/';
                    $config2['allowed_types'] = 'pdf|gif|jpg|png|jpeg';
                    $config2['max_size'] = '20000000';
                    $this->load->library('upload', $config2);
                    $this->upload->initialize($config2);
                    $field_name = 'licence_proof';
                    if (!$this->upload->do_upload($field_name)) {
                        $error = array('error' => $this->upload->display_errors());
                                                
                        $this->redirect('Error in file upload...', "Register/Register_driver", FALSE);
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $file_name = $data['upload_data']['file_name'];
                    }
                    //$regr['userfile'] = FCPATH . "public_html/IDproof/$file_name";
                    $licence_proof_path = $file_name;
                } else {
                    $this->redirect('please select file', "Register/Register_driver", FALSE);
                }


                if ($_FILES['profile_pic']['error'] != 4) {
                    $config3['upload_path'] = './public_html/images/faces';
                    $config3['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config3['max_size'] = '20000000';
                    $this->load->library('upload', $config3);
                    $this->upload->initialize($config3);
                    $field_name = 'profile_pic';
                    if (!$this->upload->do_upload($field_name)) {
                        $error = array('error' => $this->upload->display_errors());
                       
                        $this->redirect('Error in file upload...', "Register/Register_driver", FALSE);
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $file_name = $data['upload_data']['file_name'];
                    }

                    //$regr['userfile'] = FCPATH . "public_html/IDproof/$file_name";
                    //$regr['userfile'] = $file_name;
                    $profile_pic = $file_name;
                } else {
                    $this->redirect('please select file', "Register/Register_driver", FALSE);
                }

                $data = array();

                $data['f_name'] = $this->security->xss_clean(trim($this->input->post('f_name')));
                $data['l_name'] = $this->security->xss_clean(trim($this->input->post('l_name')));
                $data['nationality'] = $this->security->xss_clean(trim($this->input->post('nationality')));
                $data['address1'] = $this->security->xss_clean(trim($this->input->post('address1')));
                $data['address2'] = $this->security->xss_clean(trim($this->input->post('address2')));
                $data['address3'] = $this->security->xss_clean(trim($this->input->post('address3')));
                $data['address_proof'] = $address_proof_path;
                $data['email'] = $this->security->xss_clean(trim($this->input->post('email')));
                $data['mobile1'] = $this->security->xss_clean(trim($this->input->post('mobile1')));
                $data['mobile2'] = $this->security->xss_clean(trim($this->input->post('mobile2')));
                $data['licence'] = $this->security->xss_clean(trim($this->input->post('licence')));
                $data['licence_proof'] = $licence_proof_path;
                $data['cab_num'] = $this->security->xss_clean(trim($this->input->post('cab_num')));
                $data['cab_model'] = $this->security->xss_clean(trim($this->input->post('cab_model')));
                $data['cab_name'] = $this->security->xss_clean(trim($this->input->post('cab_name')));
                $data['cab_seat'] = $this->security->xss_clean(trim($this->input->post('cab_seat')));
                $data['profile_pic'] = $profile_pic;
                $data['user_name'] = $this->security->xss_clean(trim($this->input->post('user_name')));
                $data['password'] = $this->security->xss_clean(trim($this->input->post('password')));
                $data['bank_name'] = $this->security->xss_clean(trim($this->input->post('bank_name')));
                $data['acc_number'] = $this->security->xss_clean(trim($this->input->post('acc_number')));
                $data['branch_code'] = $this->security->xss_clean(trim($this->input->post('branch_code')));
                $data['swift_code'] = $this->security->xss_clean(trim($this->input->post('swift_code')));
                $data['acc_number'] = $this->security->xss_clean(trim($this->input->post('acc_number')));
                $data['ins_renew_date'] = $this->security->xss_clean(trim($this->input->post('ins_renew_date')));
                $data['tax_renew_date'] = $this->security->xss_clean(trim($this->input->post('tax_renew_date')));

                $res = $this->Register_model->insertDetails($data);
                if ($res) {
                    $this->redirect('Registration Compleated Successfully', "Register/Register_driver", TRUE);
                }
            }
        }
        
        if ($this->session->userdata('error')) 
        {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $cab_name = $this->Register_model->getCabNames();
        $this->set('cab_name', $cab_name);

        $this->view('Register_driver');
    }

}
