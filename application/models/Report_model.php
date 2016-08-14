<?php

require_once('Core_Model.php');

class Report_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }
  

    function getActiveTripDetails() {
        $data = array();
        $this->db->where('stop_time', '0000-00-00 00:00:00');
        $this->db->order_by("start_time", 'desc');
        $query = $this->db->get('trip_details');

        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['driver_id'] = $row['driver_id'];
            $data[$i]['driver_name'] = $this->getDriverName($row['driver_id']);
            $data[$i]['passenger_id'] = $row['passenger_id'];
            $data[$i]['passenger_name'] = $this->getPassengerName($row['passenger_id']);
            $data[$i]['cab_type'] = $this->getCabType($row['cab_type']);
            $data[$i]['start_point_latitude'] = $row['start_point_latitude'];
            $data[$i]['start_point_longitude'] = $row['start_point_longitude'];
            $data[$i]['trip_from'] = $row['trip_from'];
            $data[$i]['trip_to'] = $row['trip_to'];
            $data[$i]['start_time'] = $row['start_time'];
            $data[$i]['unique_id'] = $row['unique_id'];

            $i++;
        }
        return $data;
    }

    function getTripHistory($from, $to) {

        $data = array();


        $this->db->where('stop_time !=', '0000-00-00 00:00:00');
        $this->db->where('start_time BETWEEN "' . date('Y-m-d', strtotime($from)) . '%" and "' . date('Y-m-d', strtotime($to)) . '%"');
        $this->db->order_by("start_time", 'desc');
        $query = $this->db->get('trip_details');

        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['driver_id'] = $row['driver_id'];
            $data[$i]['driver_name'] = $this->getDriverName($row['driver_id']);
            $data[$i]['passenger_id'] = $row['passenger_id'];
            $data[$i]['passenger_name'] = $this->getPassengerName($row['passenger_id']);
            $data[$i]['cab_type'] = $this->getCabType($row['cab_type']);
            $data[$i]['start_point_latitude'] = $row['start_point_latitude'];
            $data[$i]['start_point_longitude'] = $row['start_point_longitude'];
            $data[$i]['trip_from'] = $row['trip_from'];
            $data[$i]['start_time'] = $row['start_time'];
            $data[$i]['end_point_latitude'] = $row['end_point_latitude'];
            $data[$i]['end_point_longitude'] = $row['end_point_longitude'];
            $data[$i]['trip_to'] = $row['trip_to'];
            $data[$i]['stop_time'] = $row['stop_time'];
            $data[$i]['estimated_distance'] = $row['estimated_distance'];
            $data[$i]['total_distance'] = $row['total_distance'];
            $data[$i]['total_time'] = $row['total_time'];
            $data[$i]['initial_waiting'] = $row['initial_waiting_time'];
            $data[$i]['initial_charged'] = $row['initial_charged_time'];
            $data[$i]['additional_waiting'] = $row['additional_waiting_time'];
            $data[$i]['additional_charged'] = $row['additional_charged_time'];
            $data[$i]['total_fare'] = $row['total_fare'];
            $data[$i]['unique_id'] = $row['unique_id'];
            $i++;
        }
        return $data;
    }

    function getPassengerName($user_id) {
        $name = '';

        $this->db->select('fullname');
        $this->db->where('verified', 1);
        $this->db->where('user_id', $user_id);
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

    function getDriverDetails($user_id = '') {
        $data = array();

        if ($user_id != '') {
            $this->db->where('user_id', $user_id);
            $this->db->limit(1);
        }
        $query = $this->db->get('driver_details');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $row['cab_type']=$this->getCabType($row['cab_name']);
            $data[] = $row;
            $i++;
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
}
