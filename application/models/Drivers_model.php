<?php

require_once('Core_Model.php');

class Drivers_model extends Core_Model {
 	
 	function __construct() 
    {
        parent::__construct();
    }

    function getDriverList($id = '') {
        $data = array();

        $this->db->select('*, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname');

        if ($id != '') {
            $this->db->where('user_id', $id);
        }

        $query = $this->db->get('driver_details');

        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    function getTaxRenewalList() {
        
        $date = new DateTime('+10 day');
        $date= $date->format('Y-m-d');
        $data = array();

        $this->db->select('*, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname');

        $this->db->where("STR_TO_DATE(  `tax_renew_date` ,  '%m/%d/%Y' )  <=", $date);
        
        $query = $this->db->get('driver_details');
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }

        return $data;
    }

    public function updateTaxRenewal($user_id, $value) {
        $this->db->set('tax_renew_date', $value);        
        $this->db->where('user_id', $user_id);
        $this->db->update('driver_details');
        return $this->db->affected_rows();
    }
    public function updatePassword($user_id, $new_password) {
        $this->db->set('password', md5($new_password));        
        $this->db->where('id', $user_id);
        $this->db->update('driver_login');
        
        return $this->db->affected_rows();
    }

    public function cancelDriver($user_id, $value) {        
        $this->db->set("status", $value);
        $this->db->where('user_id', $user_id);
        $this->db->update('driver_details');
        
        return $this->db->affected_rows();
    }

    function getOnlineUsers() {
        $data = array();
        $i = 0;

        $this->db->select('dlo.id, dlo.user_name, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname, dd.mobile1 AS mobile, dd.email, dd.profile_pic, (CASE WHEN dl.status = 0 THEN "READY"
                    WHEN dl.status = 2 THEN "RUNNING"
                    WHEN dl.status = 3 THEN "WAITING"
                    WHEN dl.status = 4 THEN "BOOKED" END)AS status');
        $this->db->where('dl.status != ', 1);
        $this->db->from('driver_login AS dlo');
        $this->db->join('driver_details AS dd','dlo.id = dd.user_id', 'INNER');
        $this->db->join('driver_location AS dl','dl.userid = dd.user_id', 'INNER');        
        $res2 = $this->db->get();
        
        $i = 0;
        foreach ($res2->result() as $row) {
            $data[$i]['id'] = $row->id;
            $data[$i]['user_name'] = $row->user_name;
            $data[$i]['fullname'] = $row->fullname;
            $data[$i]['mobile'] = $row->mobile;
            $data[$i]['email'] = $row->email;            
            $data[$i]['profile_pic'] = $row->profile_pic;
            $data[$i]['status'] = $row->status;            
            $i++;
        }

        return $data;
    }

    function getMyReferrals($user_id) {
        $data = array();
        
        $this->db->select('dlo.id, dlo.user_name AS referral_name, pl.id AS user_id, pl.user_name, fullname, mobile, email, profile_pic, rating');
        $this->db->from('driver_login AS dlo');
        $this->db->join('passenger_details AS pd','dlo.id = pd.referrer_id AND pd.is_passenger_referrer = 0', 'INNER');
        $this->db->join('passenger_login AS pl','pd.user_id = pl.id', 'INNER');
        $this->db->where('dlo.id', $user_id);
        $this->db->where('verified', 1);
        $res = $this->db->get();
                
        foreach ($res->result_array() as $row) {
            $data[] = $row;            
        }
        return $data;
    }
    
}