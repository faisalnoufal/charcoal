<?php

require_once('Core_Model.php');

class Coupon_model extends Core_Model {

    function __construct() 
    {
        parent::__construct();
    }
    
    public function setCoupon($expiry_date, $amt_or_percent, $coupon_amount, $count, $coupon_text){
        $coupon_code = $this->createCouponCode();

        $this->db->set('coupon_text', $coupon_text);
        $this->db->set('coupon_code', $coupon_code);
        $this->db->set('created_time', date('Y-m-d'));
        $this->db->set('expiry_date', $expiry_date);
        $this->db->set('amount_or_percentage', $amt_or_percent);
        $this->db->set('count', $count);
        $this->db->set('amount', $coupon_amount);
        $res = $this->db->insert('coupon');
        
        return $res;
    }
    
    public function getAllActiveUsers() {
        $users=array();
        $this->db->select("user_id, fullname");
        $this->db->where('verified', 1);
        $this->db->where("status", 'yes');        
        $res = $this->db->get("passenger_details");

        foreach ($res->result_array() as $row) {
            $users[] = $row;            
        }
        return $users;
    }

    public function getAllActiveCoupon($id='') {       
        $users = array();
        $this->db->select("coupon_id, coupon_text AS value, amount_or_percentage, amount, expiry_date");
        $this->db->from("coupon");
        $this->db->where('count > used_count');
        
        if($id != '')
            $this->db->where('coupon_id', $id);

        $res = $this->db->get();
        
        foreach ($res->result_array() as $row) {
            $users[] = $row;            
        }        
        return $users;
    }

    public function sendCouponNotification($user_id, $coupon_id, $user_all, $users) {        
        $date = date('Y-m-d H:i:s');
        
        if ($user_all == 'all') {
            foreach ($users as $user) {
                $this->db->set('user_id', $user['user_id']);
                $this->db->set('coupon_id', $coupon_id);
                $this->db->set('send_date', $date);
                $query = $this->db->insert('coupon_send');
            }

        } else {
            foreach ($user_id as $user) {
                $this->db->set('user_id', $user);
                $this->db->set('coupon_id', $coupon_id);
                $this->db->set('send_date', $date);
                $query = $this->db->insert('coupon_send');
            }            
        }
        return $query;
    }

    function getCouponData($data) {
        $this->db->where('coupon_text', $data);        
        return $this->db->count_all_results('coupon');
    }

    public function getAllCoupons($status = '') {
        $users = array();
        $this->db->select("cpn.coupon_id, coupon_text, coupon_code, created_time, amount_or_percentage, amount, expiry_date, used_count, count, count(user_id) send_count");
        $this->db->from("coupon AS cpn");
        $this->db->join("coupon_send AS c_send", "cpn.coupon_id = c_send.coupon_id", 'LEFT');

        if ($status == 'active')
            $this->db->where('count > used_count');

        elseif ($status == 'inactive')
            $this->db->where('count <= used_count');
        
        $this->db->group_by('cpn.coupon_id');
        $this->db->order_by('created_time', 'DESC');
        $res = $this->db->get();
                
        foreach ($res->result_array() as $row) {
            $users[] = $row;
        }        
        return $users;
    }

    public function getUsedUserList($coupon_id) {
        $users = array();
        $this->db->select("c_used.user_id, used_date, fullname, mobile, rating, status");
        $this->db->from("coupon_used AS c_used");
        $this->db->join("passenger_details AS p_detl", "c_used.user_id = p_detl.user_id", 'INNER');        
        $this->db->where('coupon_id', $coupon_id);
        $res = $this->db->get();
                
        foreach ($res->result_array() as $row) {
            $users[] = $row;
        }        
        return $users;
    }

    private function createCouponCode() {        
        $coupon_code = '';
        $count = 1;
        
        do {
            $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz1234567890';
            $coupon_code = substr(str_shuffle($letters), 0, 5);
                
            $this->db->where('coupon_code', $coupon_code);                
            $count = $this->db->count_all_results('coupon');
        } while ($count > 0);
                
        return $coupon_code;        
    }

    public function getCoupon($coupon_id = '') {
        $coupon = array();

        $this->db->select("coupon_id, coupon_text, coupon_code, created_time, amount_or_percentage, amount, expiry_date, used_count, count");        
        
        if($coupon_id != '')
            $this->db->where('coupon_id', $coupon_id);

        $res = $this->db->get('coupon');
                
        foreach ($res->result_array() as $row) {
            $coupon[] = $row;
        }
        return $coupon;
    }

    public function updateCoupon($coupon_id, $count) {

        $this->db->set("count", $count);
        $this->db->where('coupon_id', $coupon_id);
        $this->db->update('coupon');
         
        return $this->db->affected_rows();
    }

}
