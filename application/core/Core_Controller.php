<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Core_Controller extends CI_Controller {

    protected $ARR_SCRIPT = array();
    protected $VIEW_DATA_ARR = array();

    function __construct() {

        parent::__construct();

        if ($this->router->class != 'Login') {
            $this->checkLoged();
        }

        $this->setFlashData();
        $base_url = base_url();
        $image_path = $base_url . 'public_html/images/';
        $css_path = $base_url . 'public_html/css/';
        $js_path = $base_url . 'public_html/js/';
        $plugin_path = $base_url . 'public_html/plugins/';
        $driver_search_details = array();
        $user_search_details = array();

        $this->setSearchData();
        $this->setDriverMessage();
        $this->setPassengerMessage();

        $this->load->model($this->router->class . '_model', '', TRUE);
        $this->set('base_url', $base_url);
        $this->set('image_path', $image_path);
        $this->set('css_path', $css_path);
        $this->set('js_path', $js_path);
        $this->set('plugin_path', $plugin_path);

        $this->set('page_heading', "");
        $this->set('page_summery', "");
        $this->set('page_name', "");
        $this->set('title', "");
    }

    public function set($set_key, $set_value) {
        $this->VIEW_DATA_ARR[$set_key] = $set_value;
    }

    public function view($path) {
        $this->smarty->view($path . '.tpl', $this->VIEW_DATA_ARR);
    }

    public function setScripts() {
        if (count($this->ARR_SCRIPT) > 0) {
            $this->VIEW_DATA_ARR['ARR_SCRIPT'] = $this->ARR_SCRIPT;
        }
    }

    public function redirect($msg, $page, $message_type = false) {
        $MSG_ARR["MESSAGE"]["DETAIL"] = $msg;
        $MSG_ARR["MESSAGE"]["TYPE"] = $message_type;
        $MSG_ARR["MESSAGE"]["STATUS"] = true;
        $path = base_url() . $page;
        $this->session->set_flashdata('MSG_ARR', $MSG_ARR);
        //$logged_in_arr = $this->session->userdata('logged_in');
        header("Location:$path");
        exit();
    }

    public function error($msg, $page, $message_type = false) {
        $MSG_ARR["MESSAGE"]["DETAIL"] = $msg;
        $MSG_ARR["MESSAGE"]["TYPE"] = $message_type;
        $MSG_ARR["MESSAGE"]["STATUS"] = true;
    }

    public function setFlashData() {
        $FLASH_ARR_MSG = $this->session->flashdata('MSG_ARR');
        if (isset($FLASH_ARR_MSG)) {

            $this->set("MESSAGE_DETAILS", $FLASH_ARR_MSG["MESSAGE"]["DETAIL"]);
            $this->set("MESSAGE_TYPE", $FLASH_ARR_MSG["MESSAGE"]["TYPE"]);
            $this->set("MESSAGE_STATUS", $FLASH_ARR_MSG["MESSAGE"]["STATUS"]);
        } else {
            $this->set("MESSAGE_STATUS", FALSE);
            $this->set("MESSAGE_DETAILS", FALSE);
        }
    }

    public function checkLoged() {

        if (!$this->checkSession()) {
            $this->redirect("", 'Login');
        }
        return true;
    }

    public function checkSession() {

        $flag = false;
        if ($this->session->userdata('is_logged_in')) {
            $flag = true;
        } else {
            $flag = false;
        }
        return $flag;
    }

    public function setSearchData() {
        $this->load->model('Search_model', '', TRUE);
        $driver_search_details = $this->Search_model->getDriverDetails();
        $this->set('driver_search_details', $driver_search_details);
        $user_search_details = $this->Search_model->getUserDetails();
        $this->set('user_search_details', $user_search_details);
        $this->set('common_searching', "yes");
    }

    public function setDriverMessage() {

        $msg_order = array();
        $drivers_msg_list = array();
        $msg_order_count = 0;
        $count = 0;
        $driver_new_list = array();

        $this->load->model('Message_model', '', TRUE);
        $msg_order = $this->Message_model->getMessageOrder();
        $msg_order_count = count($msg_order);
        $drivers_msg_list = $this->Message_model->getDriversList();

        $count = count($drivers_msg_list);

        for ($i = 0; $i < $count; $i++) {
            if (!in_array($drivers_msg_list[$i]['user_id'], $msg_order)) {
                $driver_new_list[$msg_order_count] = $drivers_msg_list[$i];
                $msg_order_count++;
            } else {
                $key = array_search($drivers_msg_list[$i]['user_id'], $msg_order);
                $driver_new_list[$key] = $drivers_msg_list[$i];
            }
        }
        ksort($driver_new_list);
        $this->set('drivers_msg_list', $driver_new_list);
        
        return true;
    }

    public function setPassengerMessage() {
        
        $msg_order = array();
        $passenger_msg_list = array();
        $passenger_new_list = array();
        
        $msg_order_count = 0;
        $count = 0;
        
        $this->load->model('Message_model', '', TRUE);
        
        $msg_order = $this->Message_model->getPassengerMessageOrder();
        $msg_order_count = count($msg_order);
        
        $passenger_msg_list = $this->Message_model->getPassengerList();
        $count = count($passenger_msg_list);

        for ($i = 0; $i < $count; $i++) {
            if (!in_array($passenger_msg_list[$i]['user_id'], $msg_order)) {
                $passenger_new_list[$msg_order_count] = $passenger_msg_list[$i];
                $msg_order_count++;
            } else {
                $key = array_search($passenger_msg_list[$i]['user_id'], $msg_order);
                $passenger_new_list[$key] = $passenger_msg_list[$i];
            }
        }
        ksort($passenger_new_list);
        $this->set('passenger_msg_list', $passenger_new_list);
        
        return true;
    }

}
