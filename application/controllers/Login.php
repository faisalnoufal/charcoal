<?php

class Login extends Core_Controller {

    public function index() {
	
        $is_logged_in = $this->checkSession();
        if ($is_logged_in) {
            $this->redirect("", 'Home', true);
        }

        $logo = $this->Login_model->getLogoFileName();
        $this->set('logo', $logo);
//            log_message('info',   '$_POST before post=');
//       
//        log_message('info', $_POST['username']);
//        
//        
//         $username = $this->input->post('username');
//          log_message('info',   '$_POST usename via post after post call=');
//          log_message('info',   $username);
//              
//   
//       
//         echo 'outside login';
//         echo "md5";
 //         $password = $this->input->post('password');
//         echo md5($password);
//         
   //      log_message('info',   '$_POST psw via post after post call=');
     //    log_message('info',   $password);
        
        if ($this->input->post('login')) {
             echo 'inside login';
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($username != "" && $password != "") {
                $user_id = $this->Login_model->login($username, $password);
    
                if ($user_id) {
                    $this->session->set_userdata('user_id', $user_id);
                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('is_logged_in', 1);
                    $this->redirect('Logged In', "Home", TRUE);
                } else {
                    $msg = 'Invalid Login Details';
                    $this->redirect($msg, "Login", FALSE);
                }
            } else {
                $msg = 'Invalid Login Details';
                $this->redirect($msg, "Login", FALSE);
            }
        }
        $this->view('Login');
    }

    public function logout() {

        $this->session->sess_destroy();
        $this->redirect("Logout", 'Login', TRUE);
        die();
    }

    public function Lock() {
        $this->session->set_userdata('is_logged_in', 0);
        $username = $this->session->userdata('username');
        
        if ($this->input->post('lock_login')) {
            $password = $this->input->post('user_password');
            
            if ($username != "" && $password != "") {
                $user_id = $this->Login_model->login($username, $password);
                
                if ($user_id) {
                    $this->session->set_userdata('user_id', $user_id);
                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('is_logged_in', 1);
                    $this->redirect('Logged In', "Home", TRUE);
                
                } else {
                    $msg = 'Invalid Login Details';
                    $this->redirect($msg, "Login", FALSE);
                }

            } else {
                $msg = 'Invalid Login Details';
                $this->redirect($msg, "Login", FALSE);
            }
        }
        
        $this->view('Lock');
    }

}
