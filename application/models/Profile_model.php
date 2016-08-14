<?php

require_once('Core_Model.php');

class Profile_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getDriversCount() {
        $count = $this->db->count_all('driver_details');
        return $count;
    }

    function getDriversList($id = '', $start = 0, $limit = '') {
        $data = array();

        $this->db->select('*, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname');

        if ($id != '') {
            $this->db->where('user_id', $id);
        }
        else
        {            
            $this->db->order_by('user_id');
            if($limit)
                $this->db->limit($limit, $start);
        }

        $query = $this->db->get('driver_details');

        foreach ($query->result_array() as $row) 
        {            
            $data[] = $row;
        }
        return $data;
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
            //'user_name' => $data['user_name'],
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

    function getRatingHistory($user_id) {
        $data = array();

        $this->db->select('dr.user_id, dr.unique_id, TRIM(CONCAT(first_name, Char(32), last_name)) AS drivername, dd.rating as total_rating, fullname as passengername, dr.rate, comment, dr.date, dr.rated_by');
        $this->db->where('dr.user_id', $user_id);
        $this->db->from('driver_rating AS dr');
        $this->db->join('driver_details AS dd', 'dd.user_id = dr.user_id', 'inner');
        $this->db->join('passenger_details AS pd', 'pd.user_id = dr.rated_by', 'inner');
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    function getCabType($cab_name) {
        $name='';
        $this->db->select('type_short_name');
        $this->db->where('id', $cab_name);
        $query = $this->db->get('cab_register');

        foreach ($query->result_array() as $row) {
            $name = $row['type_short_name'];
        }
        return $name;
    }
    
    function getCabNames() {
        $data = array();
        $this->db->select('id,type_short_name');
        $query = $this->db->get('cab_register');
        foreach ($query->result_array() as $row) {
            array_push($data, $row);
        }
        return $data;
    }
    
    function getTimeLine($user_id) {
        $data = array();

        $this->db->select('ddet.user_id, unique_id, order_date, start_time, trip_from AS start_location, trip_to AS end_location, 
                fullname AS passengername, CASE WHEN stop_time = "0000-00-00 00:00:00" THEN "ONGOING" ELSE "COMPLETED" END AS status', FALSE);
        $this->db->where('ddet.user_id', $user_id);
        $this->db->from('driver_details AS ddet');
        $this->db->join('trip_details AS tdet', 'tdet.driver_id = ddet.user_id', 'inner');
        $this->db->join('passenger_details AS pdet', 'pdet.user_id = tdet.passenger_id', 'inner');        
        
        $this->db->get();

        $query1 = $this->db->last_query();

        $this->db->select('ddet.user_id, unique_id, order_date, from_date AS start_time, start_location, end_location, 
                fullname AS passengername, "BOOKED" AS status');
        $this->db->where('ddet.user_id', $user_id);
        $this->db->where('from_date > NOW()');
        $this->db->from('driver_details AS ddet');
        $this->db->join('temp_trip AS tdet', 'tdet.driver_id = ddet.user_id', 'inner');
        $this->db->join('passenger_details AS pdet', 'pdet.user_id = tdet.passenger', 'inner');        
        
        $this->db->get();

        $query2 = $this->db->last_query();

        $this->db->select('ddet.user_id, unique_id, order_date, from_date AS start_time, start_location, end_location, 
                fullname AS passengername, CASE WHEN driver_cancelled = 1 THEN "CANCELLED BY DRIVER" ELSE "CANCELLED BY CUSTOMER" END AS status', FALSE);
        $this->db->where('ddet.user_id', $user_id);        
        $this->db->from('driver_details AS ddet');
        $this->db->join('trip_cancelled AS tdet', 'tdet.driver_id = ddet.user_id', 'inner');
        $this->db->join('passenger_details AS pdet', 'pdet.user_id = tdet.passenger', 'inner');        
        
        $this->db->get();

        $query3 = $this->db->last_query();

        $query = $this->db->query($query1 . " UNION ALL " . $query2 . " UNION ALL " . $query3 . ' ORDER BY order_date DESC LIMIT 30;');

        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    function getPassengerData($data, $type, $user_id) {
        $this->db->where($type, $data);
        $this->db->where('user_id !=', $user_id);
        
        if($type = 'cab_number')
            $this->db->where('status', 'yes');

        return $this->db->count_all_results('driver_details');
    }
    
}
