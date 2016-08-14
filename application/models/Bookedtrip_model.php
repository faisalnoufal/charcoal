<?php

require_once('Core_Model.php');

class Bookedtrip_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getTripDetails() {
        $data = array();
        $date = date('Y-m-d H:i:s');
        $this->db->select('*');
        $this->db->where('from_date !=', '0000-00-00 00:00:00');        
        $this->db->where('from_date >', $date);
        $this->db->order_by('from_date');
        $this->db->order_by('unique_id', 'DESC');
        $i = 0;
        $query = $this->db->get('temp_trip');
        foreach ($query->result_array() as $row) {
            $data[$i]['trip_id'] = $row['trip_id'];
            $data[$i]['unique_id'] = $row['unique_id'];
            $data[$i]['driver_id'] = $row['driver_id'];
            $data[$i]['driver_name'] = $this->getDriverName($row['driver_id']);
            $data[$i]['passenger_id'] = $row['passenger'];
            $data[$i]['passenger_name'] = $this->getPassengerName($row['passenger']);
            $data[$i]['from_date'] = $row['from_date'];
            $data[$i]['to_date'] = $row['to_date'] == '0000-00-00 00:00:00' ? 'Not Specified!' : $row['to_date'];
            $data[$i]['location'] = $row['start_location'];
            $data[$i]['end_location'] = $row['end_location'];
            $data[$i]['cab_type'] = $this->getCabName($row['cab_id']);
            $i++;
        }

        return $data;
    }

    function getTripDetail($id) {
        $data = array();
        $this->db->select('*');
        $this->db->where('trip_id', $id);
        $query = $this->db->get('temp_trip');

        foreach ($query->result_array() as $row) {
            $data['trip_id'] = $row['trip_id'];
            $data['unique_id'] = $row['unique_id'];
            $data['passenger_id'] = $row['passenger'];
            $data['passenger_name'] = $this->getPassengerName($row['passenger']);
            $data['from_date'] = $row['from_date'];
            $data['to_date'] = $row['to_date'];
            $data['location'] = $row['start_location'];
            $data['end_location'] = $row['end_location'];
        }

        return $data;
    }

    function availableDriversList($date) {

        $driver_list = $this->getDriverFullList();
        $un_available = array();
        $driver_details = array();

        // $where = "from_date !='0000-00-00 00:00:00' AND from_date <'" . $date['to'] . "' AND to_date >='" . $date['from'] . "' AND driver_id !='0'";

        $this->db->select('driver_id');
        $this->db->where('from_date != ', '0000-00-00 00:00:00');

        if($date['to'] == '0000-00-00 00:00:00')
            $this->db->where("((to_date = '0000-00-00 00:00:00' AND DATE(from_date) = DATE('" . $date['from'] . "')) OR (to_date >= '" . $date['from'] . "' AND from_date <= '" . $date['from'] . "'))");
        else
            $this->db->where("((to_date = '0000-00-00 00:00:00' AND DATE(from_date) = DATE('" . $date['from'] . "') AND from_date < '" . $date['to'] . "') OR (to_date >= '" . $date['from'] . "' AND from_date <= '" . $date['to'] . "'))");
        
        $query = $this->db->get('temp_trip');
        
        // echo $this->db->last_query();die();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result_array() as $row) {
                $un_available[$i] = $row['driver_id'];
                $i++;
            }
        }
        $result = array_values(array_diff($driver_list, $un_available));
        $result = array_values($result);
        $k = 0;
        foreach ($result as $value) {

            $driver_details[$k]['id'] = $value;
            $driver_details[$k]['name'] = $this->getDriverName($value);
            $driver_details[$k]['cab'] = $this->getDriverCab($value);
            $k++;
        }

        return $driver_details;
    }

    function getDriverFullList() {
        $data = array();

        $this->db->select('user_id');
        $this->db->from('driver_details as dd');
        $this->db->join('cab_register AS cr' ,'cab_name = cr.id', 'inner');
        $this->db->where('cr.active_status' , 1);
        $this->db->where('dd.status' , "yes");
        $this->db->order_by('cr.id');
        $query = $this->db->get();
        
        foreach ($query->result() as $row) {
            $data[] = $row->user_id;
        }
        return $data;
    }

    function getFromToDates($trip_id) {
        $date = array();

        $this->db->select('from_date,to_date');
        $this->db->where('trip_id', $trip_id);
        $this->db->limit(1);

        $query = $this->db->get('temp_trip');

        foreach ($query->result() as $row) {
            $date['from'] = $row->from_date;
            $date['to'] = $row->to_date;
        }
        return $date;
    }

    function updateBookedTrip($trip_id, $driver_id) {
        $res = '';
        $this->db->set('driver_id', $driver_id);
        $this->db->where('trip_id', $trip_id);
        $this->db->limit(1);

        $res = $this->db->update('temp_trip');

        return $res;
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
   
    function cancelTrip($trip_id) {
        $result = '';

        $this->load->model('Api_model');        
        $data = $this->getTripDetail($trip_id);

        if(count($data) > 0) {             
             $result = $this->Api_model->set_tripcancelling_detals($data['unique_id'], '', 2);
        }
        return $result;
    }
   
    public function sendMessageToDriver($driver_id,$details) {
        
        $gcm_id = $this->getDriverGCMId($driver_id);
        $time = date("Y-m-d H:i:s");
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => array($gcm_id),
            'data' => array('msg_type' => 'trip_booking',
                'passenger_name' => $details['passenger_name'],
                'passenger_id' => $details['passenger_id'],
                'trip_id' => $details['trip_id'],
                'unique_id' => $details['unique_id'],
                'from_date' => $details['from_date'],
                'to_date' => $details['to_date'],
                'location' => $details['location']
                )
        );

        $headers = array(
            'Authorization: key= AIzaSyAwaiVZcgQNq2zXkXtu_Bq_GefCehIVAKc',
            'Content-Type: application/json'
        );

        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        curl_close($ch);

        return($result);
    }

    public function getDriverGCMId($driver_id) {
        $gcm_id = '';

        $this->db->select('gcm_id');
        $this->db->where('id', $driver_id);
        $this->db->limit(1);
        $query = $this->db->get('driver_login');

        foreach ($query->result() as $row) {
            $gcm_id = $row->gcm_id;
        }
        return $gcm_id;
    }

    function getCabName($id) {
        $name = '';

        $this->db->select('type_name, type_short_name');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get('cab_register');

        foreach ($query->result() as $row) {
            $name = $row->type_short_name;
        }
        return $name;
    }

    function getDriverCab($id) {
        $name = '';

        $this->db->select('type_name, type_short_name');
        $this->db->from('driver_details as dd');
        $this->db->join('cab_register AS cr' ,'cab_name = cr.id', 'inner');
        $this->db->where('cr.active_status' , 1);
        $this->db->where('dd.status' , "yes");
        $this->db->where('dd.user_id' , $id);
        $this->db->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $name = $row->type_short_name . ' - ' . $row->type_name;
        }
        return $name;
    }

}
