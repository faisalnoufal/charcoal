<?php

class Ewallet extends Core_Controller {
    
    public function Passenger_Fund_Management() 
    { 
        $title = 'Add/Deduct Fund';
        $this->set('title', $title);
        $this->set('page_heading', "Add/Deduct Fund");
        $this->set('page_summery', "");
        $this->set('page_name', "Add/Deduct Fund");

        $passengers_list = $this->Ewallet_model->getPassengersList();
        $this->set('passenger_details', $passengers_list);
        if ($this->input->post('add_amount')) {
            $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('amount', 'Amount', 'required|trim|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('transaction_note', 'Transaction Note', 'required|trim|min_length[2]|max_length[50]');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Ewallet/Passenger_Fund_Management", false);
            } else {
                $from_user = $this->session->userdata('user_id');
                $from_user = "admin";
                $to_user_id = $this->input->post('user_name');
                $amount = $this->input->post('amount');
                $tran_note = $this->input->post('transaction_note');
                if (is_numeric($amount) && $amount > 0) {
                    //                $this->Ewallet_model->begin();
                    $det = $this->Ewallet_model->insertBalAmountDetails($from_user, $to_user_id, round($amount, 2), 'admin_credit', $tran_note);
                    $update_bal = $this->Ewallet_model->addPassengerBalanceAmount($to_user_id, round($amount, 2));
                    if ($update_bal) {
                        //                    $this->Ewallet_model->commit();
                        $msg = 'Fund Credited Successfully.';
                        $this->redirect($msg, 'Ewallet/Passenger_Fund_Management', true);
                    } else {
                        //                    $this->Ewallet_model->rollBack();
                        $msg = 'Error On Crediting Fund.';
                        $this->redirect($msg, 'Ewallet/Passenger_Fund_Management', false);
                    }
                } else {
                    $msg = 'Error On Crediting Fund.Please Check The Amount';
                    $this->redirect($msg, 'Ewallet/Passenger_Fund_Management', false);
                }
            }
        }
        if ($this->input->post('deduct_amount')) {
            $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('amount', 'Amount', 'required|trim|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('transaction_note', 'Transaction Note', 'required|trim|min_length[2]|max_length[50]');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Ewallet/Passenger_Fund_Management", false);
            } else {
                $from_user = $this->session->userdata('user_id');
                $from_user = "admin";
                $to_user_id = $this->input->post('user_name');
                $amount = $this->input->post('amount');
                $tran_note = $this->input->post('transaction_note');
                $bal_amount = $this->Ewallet_model->getBalanceAmount($to_user_id,"passenger");
                if (is_numeric($amount) && $amount > 0 && $bal_amount >= $amount) {
                    //                $this->Ewallet_model->begin();
                    $det = $this->Ewallet_model->insertBalAmountDetails($from_user, $to_user_id, round($amount, 2), 'admin_debit', $tran_note);
                    $update_bal = $this->Ewallet_model->deductUserBalanceAmount($to_user_id, round($amount, 2));
                    if ($update_bal) {
                        //                    $this->Ewallet_model->commit();
                        $msg = 'Fund Debited Successfully.';
                        $this->redirect($msg, "Ewallet/Passenger_Fund_Management", TRUE);
                    } else {
                        //                    $this->Ewallet_model->rollBack();
                        $msg = 'Error On Debiting Fund.';
                        $this->redirect($msg, "Ewallet/Passenger_Fund_Management", FALSE);
                    }
                } else {
                    $msg = 'Error On Debiting Fund.Please Check The Amount';
                    $this->redirect($msg, 'Ewallet/Passenger_Fund_Management', false);
                }
            }
        }
        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Passenger_Fund_Management');
    }

    public function Passenger_Fund_Details() 
    { 
        $title = 'Passenger Ewallet History';
        $this->set('title', $title);
        $this->set('page_heading', "Passenger Ewallet History");
        $this->set('page_summery', "");
        $this->set('page_name', "Passenger Ewallet History");

        $passengers_list = $this->Ewallet_model->getPassengersList();
        $this->set('passenger_details', $passengers_list);
        
        $user_id = '';
        $flag = FALSE;

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|min_length[1]|max_length[100]');
            
            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Ewallet/Passenger_Fund_Details", false);
            
            } else {
                $user_id = $this->input->post('user_name');
                $flag = TRUE;
                $fund_details = $this->Ewallet_model->getFundDetails($user_id,"passenger"); 
                $this->set('fund_details', $fund_details);
            }
        }

        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->set('user_id', $user_id);
        $this->set('flag', $flag);
        $this->view('Passenger_Fund_Details');
    }

    public function Driver_Fund_Management() 
    { 
        $title = 'Incentive Management';
        $this->set('title', $title);
        $this->set('page_heading', "Incentive Management");
        $this->set('page_summery', "");
        $this->set('page_name', "Incentive Management");

        $drivers_list = $this->Ewallet_model->getDriversList();
        $this->set('driver_details', $drivers_list);
        
        if ($this->input->post('add_amount')) {
            $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('amount', 'Amount', 'required|trim|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('transaction_note', 'Transaction Note', 'required|trim|min_length[2]|max_length[50]');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Ewallet/Driver_Fund_Management", false);
            }
            else{
                $from_user = $this->session->userdata('user_id');
                $from_user = "admin";
                $to_user_id = $this->input->post('user_name');
                $amount = $this->input->post('amount');
                $tran_note = $this->input->post('transaction_note');
                if (is_numeric($amount) && $amount > 0) {
                    //                $this->Ewallet_model->begin();
                    $det = $this->Ewallet_model->insertDriverTrasactions($from_user, $to_user_id, round($amount, 2), 'admin_credit', $tran_note);
                    $update_bal = $this->Ewallet_model->changeDriverBalanceAmount($to_user_id, round($amount, 2),"add");
                    if ($update_bal) {
                        //                    $this->Ewallet_model->commit();
                        $msg = 'Fund Credited Successfully.';
                        $this->redirect($msg, 'Ewallet/Driver_Fund_Management', true);
                    } else {
                        //                    $this->Ewallet_model->rollBack();
                        $msg = 'Error On Crediting Fund.';
                        $this->redirect($msg, 'Ewallet/Driver_Fund_Management', false);
                    }
                } else {
                    $msg = 'Error On Crediting Fund.Please Check The Amount';
                    $this->redirect($msg, 'Ewallet/Driver_Fund_Management', false);
                } 
            }
         }
          if ($this->input->post('deduct_amount')) {
            $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('amount', 'Amount', 'required|trim|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('transaction_note', 'Transaction Note', 'required|trim|min_length[2]|max_length[50]');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Ewallet/Driver_Fund_Management", false);
            } else {
                $from_user = $this->session->userdata('user_id');
                $from_user = "admin";
                $to_user_id = $this->input->post('user_name');
                $amount = $this->input->post('amount');
                $tran_note = $this->input->post('transaction_note');
                $bal_amount = $this->Ewallet_model->getBalanceAmount($to_user_id,"driver");
                
                if (is_numeric($amount) && $amount > 0 && $bal_amount >= $amount) {
                    //                $this->Ewallet_model->begin();
                    $det = $this->Ewallet_model->insertDriverTrasactions($from_user, $to_user_id, round($amount, 2), 'admin_debit', $tran_note);
                    $update_bal = $this->Ewallet_model->changeDriverBalanceAmount($to_user_id, round($amount, 2),"deduct");
                    if ($update_bal) {
                        //                    $this->Ewallet_model->commit();
                        $msg = 'Fund Debited Successfully.';
                        $this->redirect($msg, "Ewallet/Driver_Fund_Management", TRUE);
                    } else {
                        //                    $this->Ewallet_model->rollBack();
                        $msg = 'Error On Debiting Fund.';
                        $this->redirect($msg, "Ewallet/Driver_Fund_Management", FALSE);
                    }
                } else {
                    $msg = 'Error On Debiting Fund.Please Check The Amount';
                    $this->redirect($msg, 'Ewallet/Driver_Fund_Management', false);
                }
            }
        }
        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }
        $this->view('Driver_Fund_Management');
    }
    
    public function Driver_Fund_Details() 
    { 
        $title = 'Pilot Ewallet History';
        $this->set('title', $title);
        $this->set('page_heading', "Pilot Ewallet History");
        $this->set('page_summery', "");
        $this->set('page_name', "Pilot Ewallet History");

        $drivers_list = $this->Ewallet_model->getDriversList();
        $this->set('driver_details', $drivers_list);

        $user_id = '';
        $flag = FALSE;

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|min_length[1]|max_length[100]');
            
            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Insufficient Data!', "Ewallet/Driver_Fund_Details", false);
            
            } else {
                $user_id = $this->input->post('user_name');
                $flag = TRUE;
                $fund_details = $this->Ewallet_model->getFundDetails($user_id,"driver");                 
                $this->set('fund_details', $fund_details);
            }
        }
        
        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        $this->set('user_id', $user_id);
        $this->set('flag', $flag);
        $this->view('Driver_Fund_Details');
    }
    
}