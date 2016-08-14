<?php

require_once('Core_Model.php');

class Income_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getIncomeDetails($from, $to, $driver_id, $passenger_id) {
        $data = array();
                
        $this->db->select('t_det.id, unique_id, driver_id, TRIM(CONCAT(first_name, Char(32), last_name)) AS driver, passenger_id, fullname AS passenger, 
            trip_from, trip_to, start_time, total_time, total_fare, paid_status, initial_charged_time, additional_charged_time, 
            p_trn.amount AS payment, d_trn.amount AS driver_commission , cab.type_short_name AS cabtype', FALSE);
        $this->db->where('stop_time != ', '0000-00-00 00:00:00');        
        
        if($from && $to) {
            $this->db->where('DATE(start_time) >=', $from);
            $this->db->where('DATE(start_time) <=', $to);            
        }

        if($driver_id)
            $this->db->where('driver_id', $driver_id);

        if($passenger_id)
            $this->db->where('passenger_id', $passenger_id);
        
        $this->db->from('trip_details AS t_det');
        $this->db->join('driver_details AS d_det' ,'d_det.user_id = t_det.driver_id', 'INNER');
        $this->db->join('passenger_details AS p_det', 'p_det.user_id = t_det.passenger_id', 'INNER');
        $this->db->join('driver_transactions AS d_trn', 'd_trn.to_user = t_det.driver_id AND d_trn.trip_id = t_det.unique_id', 'LEFT');
        $this->db->join('passenger_transactions AS p_trn', 'p_trn.trip_id = t_det.unique_id AND p_trn.from_user = t_det.passenger_id', 'LEFT');
        $this->db->join('cab_register AS cab', 't_det.cab_type = cab.id', 'LEFT');

        $this->db->order_by("driver_id", 'ASC');
        $this->db->order_by("start_time", 'DESC');

        $query = $this->db->get();
        
        foreach ($query->result_array() as $row) {
            $data[] = $row;            
        }
        return $data;
    }

    function getIncomeData($from, $to, $type = '') {
        $data = array();
                
        $this->db->select('driver_id, TRIM(CONCAT(first_name, Char(32), last_name)) AS driver, 
            passenger_id, fullname AS passenger, SUM(total_fare) AS total_fare, SUM(p_trn.amount) AS payment, SUM(d_trn.amount) AS driver_commission', FALSE);
        $this->db->where('stop_time != ', '0000-00-00 00:00:00');
        
        if($from && $to) {
            $this->db->where('DATE(start_time) >=', $from);
            $this->db->where('DATE(start_time) <=', $to);            
        }

        $this->db->from('trip_details AS t_det');
        $this->db->join('driver_details AS d_det' ,'d_det.user_id = t_det.driver_id', 'INNER');
        $this->db->join('passenger_details AS p_det', 'p_det.user_id = t_det.passenger_id', 'INNER');
        $this->db->join('driver_transactions AS d_trn', 'd_trn.to_user = t_det.driver_id AND d_trn.trip_id = t_det.unique_id', 'LEFT');
        $this->db->join('passenger_transactions AS p_trn', 'p_trn.trip_id = t_det.unique_id AND p_trn.from_user = t_det.passenger_id', 'LEFT');
        
        if($type == 'by_passenger') {
            $this->db->group_by('passenger_id');
            $this->db->order_by("passenger", 'ASC');
        }

        if($type == 'by_pilot') {
            $this->db->group_by('driver_id');
            $this->db->order_by("driver", 'ASC');     
        }
        
        $query = $this->db->get();
        
        foreach ($query->result_array() as $row) {
            $data[] = $row;            
        }
        return $data;
    }


    function getDriverList($id = '') {
        $this->load->model('Drivers_model');

        return $this->Drivers_model->getDriverList($id);
    }

    function getCustomerList($id = '') {
        $this->load->model('Customer_model');

        return $this->Customer_model->getCustomerList($id);
    }

   
}
