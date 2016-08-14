<?php

require_once('Core_Model.php');

class Search_model extends Core_Model {
    function __construct() 
    {
        parent::__construct();
    }
    function getDriverDetails($key_word="") {
        $array = array();

        $this->db->select('user_id, first_name, profile_pic');
        
        if($key_word!=""){
            
            $where = "first_name LIKE '$key_word%'";
            $this->db->where($where);
        }
        $query = $this->db->get('driver_details');
//        echo $this->db->last_query();die();
        foreach ($query->result_array() as $row) 
        {
            $array[] = $row;
        }

        return $array; 
    }
    function getUserDetails($key_word=""){
        $array = array();

        $this->db->select('*');
        $this->db->where('verified', 1);
        $this->db->from('passenger_details');
        $this->db->join('passenger_login', 'passenger_login.id = passenger_details.user_id');
        if($key_word!=""){
            $where = "passenger_login.user_name LIKE '$key_word%'";
            $this->db->where($where);
        }
        $query = $this->db->get();
        foreach ($query->result_array() as $row) 
        {
            $array[] = $row;
        }

        return $array;  
    }  

        }
