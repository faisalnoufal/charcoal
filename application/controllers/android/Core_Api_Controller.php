<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions

class Core_Api_Controller extends CI_Controller {

    function __construct()
    {
        
        // Construct the parent class
        parent::__construct();
        $this->load->model('Api_model');

        $post_data = $this->input->post();
        $get_data = $this->input->get();
        $url = $this->uri->uri_string();

        $this->db->set('url', $url);
        $this->db->set('post', json_encode($post_data));
        $this->db->set('get', json_encode($get_data));
        $this->db->insert('api_log');
    }
}

?>