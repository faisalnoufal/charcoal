<?php

require_once('Core_Model.php');

class Location_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getDriversCount() {
        $count = $this->db->count_all('driver_details');
        return $count;
    }

    function getDriversList($id = '', $start = 0, $limit = 10) {

        $data = array();

        $this->db->select('*, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname');

        if ($id != '') {
            $this->db->where('user_id', $id);
            $query = $this->db->get('driver_details');
        }
        else
        {            
            $this->db->order_by('user_id');
            $this->db->limit($limit, $start);
            $query = $this->db->get('driver_details');   
        }

        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }

        return $data;        
    }

    function getDriverDetails($key_word="") {
        $array = array();

        $this->db->select('user_id, total_trip, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname, profile_pic');
        
        if($key_word!=""){
            
            $where = "first_name LIKE '%$key_word%' OR last_name LIKE '%$key_word%'";
            $this->db->where($where);
        }
        $query = $this->db->get('driver_details');
        
        foreach ($query->result_array() as $row) 
        {
            $array[] = $row;
        }

        return $array; 
    }

    public function getDriverLocation($userid = '') {
        $user_array = array();

        $this->db->select('userid, dlog.user_name, dloc.status, cab_name, cab_number, mobile1, latitude, longitude, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname,
                (CASE WHEN dloc.status = 0 THEN "READY"
                    WHEN dloc.status = 1 THEN "OFFLINE"
                    WHEN dloc.status = 2 THEN "RUNNING"
                    WHEN dloc.status = 3 THEN "WAITING"
                    WHEN dloc.status = 4 THEN "BOOKED" END)AS status_text', FALSE);
        $this->db->from('driver_location as dloc');
        $this->db->join('driver_login as dlog', 'dlog.id = dloc.userid', 'inner');
        $this->db->join('driver_details as ddet', 'dlog.id = ddet.user_id', 'inner');
        if ($userid) {
            $this->db->where('dloc.userid', $userid);
            $this->db->limit(1);
        }
        $res = $this->db->get();
        $i = 0;
        foreach ($res->result_array() as $row) {
            $row['cab_model'] = $this->getCabType($row['cab_name']);
            $user_array[$i]['current_loc'] = $row;

            if ($row['status'] == 2) {
                $this->db->select('start_point_latitude, start_point_longitude, trip_from, end_point_latitude, end_point_longitude, trip_to, fullname');
                $this->db->from('trip_details as td');
                $this->db->join('passenger_details as pd', 'td.passenger_id = pd.id', 'left');
                $this->db->where('driver_id', $row['userid']);
                $this->db->where('stop_time = "0000-00-00 00:00:00"');
                $this->db->order_by('td.id', 'desc');
                $this->db->limit(1);
                $query = $this->db->get();

                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row1) {
                        $user_array[$i]['running'] = $row1;
                    }
                } else {
                    $user_array[$i]['running'] = 0;
                }
            } else {
                $user_array[$i]['running'] = 0;
            }
            ++$i;
        }
        return $user_array;
    }

    function getActiveTripDetails($trip_id) {

        $data = array();
        $this->db->where('id', $trip_id);
        $this->db->where('stop_time', '0000-00-00 00:00:00');
        $query = $this->db->get('trip_details');
        foreach ($query->result_array() as $row) {
            $driver_latlon = $this->getDiverLatLon($row['driver_id']);
            $data['id'] = $row['id'];
            $data['unique_id'] = $row['unique_id'];
            $data['driver_id'] = $row['driver_id'];
            $data['cab_type'] = $this->getCabType($row['cab_type']);
            $data['driver_name'] = $this->getDriverName($row['driver_id']);
            $data['passenger_id'] = $row['passenger_id'];
            $data['passenger_name'] = $this->getPassengerName($row['passenger_id']);
            $data['start_point_latitude'] = $row['start_point_latitude'];
            $data['start_point_longitude'] = $row['start_point_longitude'];
            $data['driver_current_latitude'] = isset($driver_latlon['lat']) ? $driver_latlon['lat'] : 0;
            $data['driver_current_longitude'] = isset($driver_latlon['lon']) ? $driver_latlon['lon'] : 0;
            $data['trip_from'] = $row['trip_from'];
            $data['start_time'] = $row['start_time'];
        }
        return $data;
    }

    function getPassengerName($user_id) {
        $name = '';

        $this->db->select('fullname');
        $this->db->where('user_id', $user_id);
        $this->db->where('verified', 1);
        $this->db->limit(1);

        $query = $this->db->get('passenger_details');

        foreach ($query->result() as $row) {
            $name = $row->fullname;
        }
        return $name;
    }

    function getDriverName($user_id) {
        $name = '';

        $this->db->select('first_name,last_name');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);

        $query = $this->db->get('driver_details');

        foreach ($query->result() as $row) {
            $name = $row->first_name . ' ' . $row->last_name;
        }
        return $name;
    }

    function getDiverLatLon($driver_id) {
        $data = array();

        $this->db->select('latitude,longitude');
        $this->db->where('userid', $driver_id);
        $this->db->limit(1);
        $query = $this->db->get('driver_location');
        foreach ($query->result() as $row) {
            $data['lat'] = $row->latitude;
            $data['lon'] = $row->longitude;
        }
        return $data;
    }

    function getCabType($cab_id){
        $type_name = "";

        $this->db->select('type_short_name');
        $this->db->where('id', $cab_id);
        $this->db->limit(1);
        $query = $this->db->get('cab_register');

        foreach ($query->result() as $row) 
        {
            $type_name = $row->type_short_name;
        }

        return $type_name;
    }

    public function getPassengerLocation($userid) {
        $user_array = array();
        
        $this->db->select('userid, plog.user_name, latitude, longitude, fullname, mobile,
                (CASE WHEN ploc.status = 0 THEN "ONLINE" END)AS status_text', FALSE);
        $this->db->from('passenger_location as ploc');
        $this->db->join('passenger_login as plog', 'plog.id = ploc.userid', 'inner');
        $this->db->join('passenger_details as pdet', 'plog.id = pdet.user_id', 'inner');        
        $this->db->where('ploc.userid', $userid);
        $this->db->limit(1);        
        $res = $this->db->get();

        foreach ($res->result_array() as $row) {
            $user_array[0]['current_loc'] = $row;

            $this->db->select('start_point_latitude, start_point_longitude, trip_from, end_point_latitude, end_point_longitude, trip_to, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname');
            $this->db->from('trip_details as td');
            $this->db->join('driver_details as dd', 'td.passenger_id = dd.user_id', 'left');
            $this->db->where('passenger_id', $row['userid']);
            $this->db->where('stop_time = "0000-00-00 00:00:00"');
            $this->db->order_by('td.id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row1) {
                    $user_array[0]['running'] = $row1;
                }
            } else {
                $user_array[0]['running'] = 0;
            }
        }
        return $user_array;
    }

}
