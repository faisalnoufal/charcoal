<?php

require_once('Core_Model.php');

class Login_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    public function login($user_name, $password) {
        $user_id = '';
        if ($this->validateLogin($user_name, $password)) {
            $user_id = $this->usernameToId($user_name);
            return $user_id;
        } else {
            return FALSE;
        }
    }

    public function validateLogin($user_name, $password) {
            
        log_message('info', 'md5');
        log_message('info', md5($password));
        $query = $this->db->get_where('login', array('user_name' => $user_name, 'password' => $password), 1);
        if ($query->num_rows() > 0) {
                   log_message('info', 'rowcount');
                  log_message('info', $query->num_rows() );
            return TRUE;
        } else {
            echo 'FALSE';
            return FALSE;
        }
    }

    public function usernameToId($user_name) {
        $this->db->select('user_id');
        $this->db->where('LOWER(user_name)', strtolower($user_name));
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get('login');
        if ($query->num_rows() > 0) {
            return $query->row('user_id');
        } else {
            return FALSE;
        }
    }

    function getLogoFileName(){
        $this->db->select('logo');
        $this->db->where('id', 1);
        $res = $this->db->get('configuration');        
        
        foreach ($res->result() as $row) {
            return $row->logo;
        }
        
        return FALSE;
    }

}
