<?php

class Coupon extends Core_Controller {

    public function Coupons() {

        $title = 'Coupon Generation';
        $this->set('title', $title);
        $this->set('page_heading', "Coupon Generation");
        $this->set('page_summery', "");
        $this->set('page_name', "Coupon Generation");
        
        if ($this->input->post('gen_oupon')) {
            $this->form_validation->set_rules('coupon_text', 'Coupon Name/Text', 'required|trim|xss_clean|max_length[200]|callback_isUniqueCouponText');
            
            if ($this->security->xss_clean(trim($this->input->post('count'))) == 'percent') {
                $this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|less_than_equal_to[100]|greater_than[0]');    
            } else {
                $this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|max_length[10]|greater_than[0]');    
            }            
            
            $this->form_validation->set_rules('count', 'Count', 'required|trim|xss_clean|max_length[10]|greater_than[0]');
            $this->form_validation->set_rules('percent_or_value', 'Percentage or value', 'required|trim|xss_clean|max_length[10]');
            $this->form_validation->set_rules('expiry_date', 'Coupon Expiry Date', 'required|trim|xss_clean|max_length[10]|callback_isValidDate');
            
            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Coupon/Coupons", false);
            
            } else {
                $count = $this->security->xss_clean(trim($this->input->post('count')));
                $coupon_amount = $this->security->xss_clean(trim($this->input->post('amount')));
                $amt_or_percent = $this->security->xss_clean(trim($this->input->post('percent_or_value')));
                $coupon_text = $this->security->xss_clean(trim($this->input->post('coupon_text')));
                $expiry_date = $this->security->xss_clean(trim($this->input->post('expiry_date')));
            
                $expiry_date = date('Y-m-d',strtotime(trim($expiry_date)));                

                $insert = $this->Coupon_model->setCoupon($expiry_date, $amt_or_percent, $coupon_amount, $count, $coupon_text);
                
                if ($insert) {
                    $msg = "Coupon generated successfully";
                    $this->redirect($msg, "Coupon/Coupons", TRUE);
                } else {
                    $msg = 'error on generating coupon';
                    $this->redirect($msg, "Coupon/Coupons", FALSE);
                }
            }
        }
        
        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }        
        $this->view('Coupon');
    }

    public function isValidDate($str)
    {
        $date = date('Y-m-d',strtotime(trim($str)));

        if ($date < date('Y-m-d'))
        {
            $this->form_validation->set_message('isValidDate', 'This {field} is alredy expired.');
            return FALSE;
        }
        else
        {
            return TRUE;
        } 
    }

    public function isUniqueCouponText($str)
    {
        if ($this->Coupon_model->getCouponData($str))
        {
            $this->form_validation->set_message('isUniqueCouponText', 'This {field} alredy created.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }            
    }

    public function Coupon_send($coupn_id = '') {

        if($coupn_id == '')
            $this->redirect('Invalid Coupon', 'Coupon/Coupon_list');

        $title = 'Coupon Send';
        $this->set('title', $title);
        $this->set('page_heading', "Coupon Send");
        $this->set('page_summery', "");
        $this->set('page_name', "Coupon Send");
        
        $users = $this->Coupon_model->getAllActiveUsers();
        $this->set('users', $users);
        $coupon_array = $this->Coupon_model->getAllActiveCoupon($coupn_id);
        
        if(count($coupon_array) <= 0)
            $this->redirect('Coupon Inactive!', 'Coupon/Coupon_list');

        if($coupon_array['0']['expiry_date'] <= date('Y-m-d')) {            
            $this->redirect("Coupon expired!", "Coupon/Coupon_list");
        }

        $coupon_val = $coupon_array['0']['value'];
        $coupon_id = $coupon_array['0']['coupon_id'];        
        $val_coupon = $coupon_array['0']['amount'] . ($coupon_array['0']['amount_or_percentage'] == 'percent' ? '%' : '');
        $this->set('coupon_id', $coupon_id);
        $this->set('coupon_val', $coupon_val);
        $this->set('val_coupon', $val_coupon);

        if ($this->input->post('allocate_oupon')) {
            // echo'<pre>';print_r($this->input->post());die();
            $this->form_validation->set_rules('user_all', 'All Users', 'required|trim|xss_clean');
            
            if($this->security->xss_clean(trim($this->input->post('user_all'))) == 'select')
                $this->form_validation->set_rules('user_id[]', 'Select User', 'required|trim|xss_clean');

            $this->form_validation->set_rules('coupon', 'coupon', 'required|trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Coupon/Coupon_send/$coupon_id", false);
            
            } else {
                $user_id=array();

                $user_all = $this->security->xss_clean(trim($this->input->post('user_all')));
                $user_id = $this->security->xss_clean($this->input->post('user_id[]'));
                $coupon_id = $this->security->xss_clean(trim($this->input->post('hid_coupon')));                
                
                $res = $this->Coupon_model->sendCouponNotification($user_id, $coupon_id, $user_all, $users);

                if ($res == 1) {
                    $msg = "Coupon send successfully";
                    $this->redirect($msg, "Coupon/Coupon_send/$coupon_id", TRUE);
                } else {
                    $msg = "Coupon sending failed";
                    $this->redirect($msg, "Coupon/Coupon_send/$coupon_id", FALSE);
                }
            }
        }

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->view('Coupon_send');
    }  

    public function Coupon_list() {

        $title = 'Coupon List';
        $this->set('title', $title);
        $this->set('page_heading', "Coupon List");
        $this->set('page_summery', "");
        $this->set('page_name', "Coupon List");
               
        $cpn = $this->Coupon_model->getAllCoupons();
        $status = '';

        if ($this->input->post('submit')) {
            $status = $this->security->xss_clean($this->input->post('status'));                
            $cpn = $this->Coupon_model->getAllCoupons($status);                        
        }

        $this->set('status', $status);     
        $this->set('coupn', $cpn);     
        $this->view('Coupon_list');
    }

    public function get_used_user_list() {
        $coupon_id = $this->input->post('id');

        if(!$coupon_id) {
            echo 'No Users Found!';
            die();
        }
            
        $user_list = $this->Coupon_model->getUsedUserList($coupon_id);

        if(count($user_list) <= 0) {
            echo 'No Users Found!';
            die();
        }

        $html = '<table class="table" >
                    <thead>
                    <tr>
                        <th>
                            <b>User</b>
                        </th>
                        <th>
                            <b>Date Used</b>
                        </th>
                        <th>
                            <b>Mobile</b>
                        </th>
                        <th>
                            <b>Rating</b>
                        </th>
                        <th>
                            <b>Status</b>
                        </th>
                        <tr>
                    </thead>
                         <tbody>';
        foreach($user_list as $user){
        
                                    $html .= '
                                         <tr>
                                            <td>
                                                <a href="' . base_url() . 'Customer/Profile_view/' . $user['user_id'] . '" title="View Passenger Profile" target="_blank">' . $user['fullname'] . '</a>
                                            </td>
                                            <td>
                                                ' . $user['used_date'] . '
                                            </td>
                                            <td>
                                                ' . $user['mobile'] . '
                                            </td>
                                            <td>
                                                ' . $user['rating'] . '
                                            </td>
                                            <td>
                                                ' . $user['status'] . '
                                            </td>
                                        </tr> ';
        }
                                       $html .= ' </tbody>
                                    </table>';
        echo $html;
    }

    public function Coupon_edit($coupon_id) {

        if($coupon_id == '')
            $this->redirect('Invalid Coupon', 'Coupon/Coupon_list');

        $title = 'Coupon Edit';
        $this->set('title', $title);
        $this->set('page_heading', "Coupon Edit");
        $this->set('page_summery', "");
        $this->set('page_name', "Coupon Count Edit");
        
        $coupon = $this->Coupon_model->getCoupon($coupon_id);
        
        if(count($coupon) <= 0)
            $this->redirect('Invalid Coupon', 'Coupon/Coupon_list');

        if($coupon[0]['expiry_date'] <= date('Y-m-d')) {
            $this->redirect('Coupon expired!', "Coupon/Coupon_list");
        }

        $this->set('coupon', $coupon);

        if ($this->input->post('edt_coupon')) {
            
            $this->form_validation->set_rules('count', 'Count', 'required|trim|xss_clean|max_length[10]|greater_than[0]');
                        
            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Coupon/Coupon_edit/$coupon_id", FALSE);
            
            } else {
                $count = $this->security->xss_clean(trim($this->input->post('count')));
                                
                if($count < $coupon[0]['used_count']) {
                    $msg = 'Coupon count less than used count!';
                    $this->redirect($msg, "Coupon/Coupon_edit/$coupon_id", FALSE);
                }
                
                $update = $this->Coupon_model->updateCoupon($coupon_id, $count);
                
                if ($update) {
                    $msg = "Count updated successfully";
                    $this->redirect($msg, "Coupon/Coupon_edit/$coupon_id", TRUE);
                } else {
                    $msg = 'error on updating count';
                    $this->redirect($msg, "Coupon/Coupon_edit/$coupon_id", FALSE);
                }
            }
        }
        
        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }        
        $this->view('Coupon_edit');
    }

}
