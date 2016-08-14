<?php

require_once('Core_Model.php');

class Customer_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getCustomerCount() {
        $this->db->where('verified', 1);
        $count = $this->db->count_all_results('passenger_details');
        return $count;
    }

    function getCustomerList($id = '', $start = 0, $limit = '') {
        $data = array();

        $this->db->select('pd.*, mobile as mobile1, user_name');

        if ($id != '') {
            $this->db->where('user_id', $id);
        }
        else
        {            
            $this->db->order_by('user_id');
            if($limit)
                $this->db->limit($limit, $start);
        }

        $this->db->from('passenger_details as pd');
        $this->db->join('passenger_login as pl', 'pl.id = pd.user_id', 'inner');
        $this->db->where('pd.verified', 1);
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }

        return $data;
    }

    function getCustomerDetails($key_word="") {
        $array = array();
                
        if($key_word!=""){
            
            $where = "fullname LIKE '%$key_word%'";
            $this->db->where($where);
        }
        $query = $this->db->get('passenger_details');
        
        foreach ($query->result_array() as $row) 
        {
            $array[] = $row;
        }

        return $array; 
    }
   
    function updateDriverDetails($data) {
        $update = array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'nationality' => $data['nationality'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'address3' => $data['address3'],
            'email' => $data['email'],
            'mobile1' => $data['mobile1'],
            'mobile2' => $data['mobile2'],
            'licence' => $data['licence'],
            'cab_number' => $data['cab_num'],
            'cab_model' => $data['cab_model'],
            'cab_name' => $data['cab_name'],
            'cab_seat' => $data['cab_seat'],
            'bank_name' => $data['bank_name'],
            'acc_number' => $data['acc_number'],
            'branch_code' => $data['branch_code'],
            'swift_code' => $data['swift_code'],
            'ins_renew_date' => $data['ins_renew_date'],
            'tax_renew_date' => $data['tax_renew_date']
                
                
        );
        $this->db->where('user_id', $data['id']);
        $res = $this->db->update('driver_details', $update);

        return $res;
    }

    
    function activatCustomer($id) {
        $this->db->set('status',0);
        $this->db->where('id', $id);
        $res = $this->db->update('passenger_details');
        if ($this->db->affected_rows() > 0) {
            return $res;
        }
        
        return false;
    }
    
    function deactivatCustomer($id) {
        $this->db->set('status',1);
        $this->db->where('id', $id);
        $res = $this->db->update('passenger_details');
        
         if ($this->db->affected_rows() > 0) {
            return $res;
        }
        
        return false;
    }
   
    public function getStatus($passenger_id) {
        $status = "";
        $this->db->select("status");
        $this->db->where('verified', 1);
        $this->db->from("passenger_details");
        $this->db->where('user_id', $passenger_id);
        $this->db->limit('1');
        $res = $this->db->get();
        
        foreach ($res->result() as $row) {
            $status = $row->status;
        }        
        return $status;
    }

    public function cancelPassengers($passenger_id, $value) {        
        $this->db->set("status", $value);
        $this->db->where('user_id', $passenger_id);
        $this->db->update('passenger_details');

        return $this->db->affected_rows();
    }
    
    public function updatePassword($user_id, $new_password) {
        $this->db->set('password', md5($new_password));
        $this->db->where('id', $user_id);
        $this->db->update('passenger_login');
        
        return $this->db->affected_rows();
    }

    function getOnlineUsers() {
        $data = array();
        $i = 0;

        $this->db->select('plo.id, plo.user_name, pd.fullname, pd.mobile, pd.email, pd.profile_pic, "READY" AS status');
        $this->db->where('pl.status != ', 1);
        $this->db->from('passenger_location AS pl');
        $this->db->join('passenger_details AS pd','pl.userid = pd.user_id', 'INNER');
        $this->db->join('passenger_login AS plo','plo.id = pd.user_id', 'INNER');        
        $res1 = $this->db->get();
        
        foreach ($res1->result() as $row) {
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

    function getRatingHistory($user_id) {
        $data = array();

        $this->db->select('pr.user_id, pr.unique_id, TRIM(CONCAT(first_name, Char(32), last_name)) AS drivername, pd.rating as total_rating, fullname as passengername, pr.rate, comment, pr.date, pr.rated_by');
        $this->db->where('pr.user_id', $user_id);
        $this->db->from('passenger_rating AS pr');
        $this->db->join('driver_details AS dd', 'dd.user_id = pr.rated_by', 'inner');
        $this->db->join('passenger_details AS pd', 'pd.user_id = pr.user_id', 'inner');
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }


    function getTimeLine($user_id) {
        $data = array();

        $this->db->select('pdet.user_id, unique_id, order_date, start_time, trip_from AS start_location, trip_to AS end_location, 
                TRIM(CONCAT(first_name, Char(32), last_name)) AS drivername, CASE WHEN stop_time = "0000-00-00 00:00:00" THEN "ONGOING" ELSE "COMPLETED" END AS status', FALSE);
        $this->db->where('pdet.user_id', $user_id);
        $this->db->from('passenger_details AS pdet');        
        $this->db->join('trip_details AS tdet', 'tdet.passenger_id = pdet.user_id', 'inner');
        $this->db->join('driver_details AS ddet', 'ddet.user_id = tdet.driver_id', 'inner');       
        
        $this->db->get();

        $query1 = $this->db->last_query();

        $this->db->select('pdet.user_id, unique_id, order_date, from_date AS start_time, start_location, end_location, 
                TRIM(CONCAT(first_name, Char(32), last_name)) AS drivername, "BOOKED" AS status');
        $this->db->where('pdet.user_id', $user_id);
        $this->db->where('from_date > NOW()');
        $this->db->from('passenger_details AS pdet');
        $this->db->join('temp_trip AS tdet', 'tdet.passenger = pdet.user_id', 'inner');
        $this->db->join('driver_details AS ddet', 'ddet.user_id = tdet.driver_id', 'left');       
                
        $this->db->get();

        $query2 = $this->db->last_query();

        $this->db->select('pdet.user_id, unique_id, order_date, from_date AS start_time, start_location, end_location, 
                TRIM(CONCAT(first_name, Char(32), last_name)) AS drivername, CASE WHEN driver_cancelled = 1 THEN "CANCELLED BY DRIVER" ELSE "CANCELLED BY CUSTOMER" END AS status', FALSE);
        $this->db->where('pdet.user_id', $user_id);        
        $this->db->from('passenger_details AS pdet');
        $this->db->join('trip_cancelled AS tdet', 'tdet.passenger = pdet.user_id', 'inner');
        $this->db->join('driver_details AS ddet', 'ddet.user_id = tdet.driver_id', 'inner');       
        
        $this->db->get();

        $query3 = $this->db->last_query();

        $query = $this->db->query($query1 . " UNION ALL " . $query2 . " UNION ALL " . $query3 . ' ORDER BY order_date DESC LIMIT 30;');

        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    function getMyReferrals($user_id) {
        $data = array();        

        $this->db->select('plo.id, plo.user_name AS referral_name, pl.id AS user_id, pl.user_name, fullname, mobile, email, profile_pic, rating');
        $this->db->from('passenger_login AS plo');
        $this->db->join('passenger_details AS pd','plo.id = pd.referrer_id AND pd.is_passenger_referrer = 1', 'INNER');
        $this->db->join('passenger_login AS pl','pd.user_id = pl.id', 'INNER');
        $this->db->where('plo.id', $user_id);
        $this->db->where('verified', 1);
        $res = $this->db->get();
                
        foreach ($res->result_array() as $row) {
            $data[] = $row;            
        }
        return $data;
    }

}
