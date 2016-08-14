<?php

require_once('Core_Model.php');

class Cron_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }
    function insertToTmpDetails($date_temp_arr,$i){
       $res = false;
       $this->db->set('country_name', $date_temp_arr[0]['country']);
       $this->db->set('state_name', $date_temp_arr[0]['region']); 
       $this->db->set('frst_day', $date_temp_arr[0]['date']); 
       $this->db->set('frst_day_temp', $date_temp_arr[0]['temp']);
       $this->db->set('scnd_day', $date_temp_arr[1]['date']); 
       $this->db->set('secd_day_temp', $date_temp_arr[1]['temp']); 
       $this->db->set('thrd_day', $date_temp_arr[2]['date']);
       $this->db->set('thrd_day_temp', $date_temp_arr[2]['temp']); 
       $this->db->set('frth_day', $date_temp_arr[3]['date']); 
       $this->db->set('frth_day_temp', $date_temp_arr[3]['temp']);
       $this->db->set('fifth_day', $date_temp_arr[4]['date']); 
       $this->db->set('fifth_day_temp', $date_temp_arr[4]['temp']); 
       $this->db->set('sixth_day', $date_temp_arr[5]['date']); 
       $this->db->set('sixth_day_temp', $date_temp_arr[5]['temp']);
       $this->db->where('id',1);
       $res = $this->db->update('temperature_details');
       return $res;
        
    }
    function getSheduledTrips(){
        
       $data = array();
        $date = date('Y-m-d H:i:s');
        $date2 = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $this->db->select('*');
        $this->db->where('from_date !=', '0000-00-00 00:00:00');        
        $this->db->where('from_date >', $date);
        $this->db->where('from_date <=', $date2);
        $this->db->order_by('from_date', 'desc');
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
            $data[$i]['to_date'] = $row['to_date'];
            $data[$i]['start_location'] = $row['start_location'];
            $data[$i]['end_location'] = $row['end_location'];
            $i++;
        }

        return $data;
        
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
    
    public function gcmNotificationToDriver($details) {
        
        $gcm_id = $this->getDriverGCMId($driver_id);
        $time = date("Y-m-d H:i:s");
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => array($gcm_id),
            'data' => array('msg_type' => 'trip_book_alert',
                'passenger_name' => $details['passenger_name'],
                'passenger_id' => $details['passenger_id'],
                'trip_id' => $details['trip_id'],
                'unique_id' => $details['unique_id'],
                'from_date' => $details['from_date'],
                'to_date' => $details['to_date'],
                'location' => $details['start_location'],
                'end_location' => $details['end_location']
                )
        );

        $headers = array(
            'Authorization: key= AIzaSyCiF1lcWC-9n-UZi7Yx6wywb6xuRyAjUxU',
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

    
    
}