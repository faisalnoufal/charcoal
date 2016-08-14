<?php

require_once('Core_Model.php');

class Home_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getCountryTempDetails() {
        $array = array();
        $this->db->select('*');
        $query = $this->db->get('temperature_details');

        foreach ($query->result_array() as $row) {
            $array[] = $row;
        }
        return $array;
    }    

    function getTotalBookings() {
        $date = date('Y-m-d');
        // $this->db->from('trip_details');
        // $count1 = $this->db->count_all_results();
        $this->db->where('status != ', 0);
        $this->db->where('from_date >= ', $date);
        $this->db->from('temp_trip');
        $count2 = $this->db->count_all_results();
        // $this->db->from('trip_cancelled');
        // $count3 = $this->db->count_all_results();        
        // return ($count1 + $count2 + $count3);
        return ($count2);
    }
    
    function getTodaysBookings() {        
        $date = date('Y-m-d');
        // $this->db->like('start_time', $date);
        // $count1 = $this->db->count_all_results('trip_details');
        $this->db->where('status != ', 0);
        $this->db->like('from_date', $date);
        $count2 = $this->db->count_all_results('temp_trip');
        // return ($count1 + $count2);
        return ($count2);
    }

    function getTotalCancelledTrips() {                
        $count = $this->db->count_all('trip_cancelled');

        return $count;
    }

    function getTodaysCancelledTrips() {    
        $date = date('Y-m-d');

        $this->db->like('cancelled_date', $date);
        $count = $this->db->count_all_results('trip_cancelled');
        
        return $count;
    }

    function getOnlineUsers() {
        $this->db->where('pl.status != ', 1);
        $this->db->from('passenger_location AS pl');
        $this->db->join('passenger_details AS pd', 'pl.userid = pd.user_id');
        $count['passenger'] = $this->db->count_all_results();
        
        $this->db->where('dl.status != ', 1);
        $this->db->from('driver_location AS dl');
        $this->db->join('driver_details AS dd', 'dl.userid = dd.user_id');
        $count['driver'] = $this->db->count_all_results();

        return $count;    
    }

    function getTotalUsers() {
        $this->db->from('passenger_location AS pl');
        $this->db->join('passenger_details AS pd', 'pl.userid = pd.user_id');
        $count['passenger'] = $this->db->count_all_results();

        $this->db->from('driver_location AS dl');
        $this->db->join('driver_details AS dd', 'dl.userid = dd.user_id');
        $count['driver'] = $this->db->count_all_results();

        return $count;    
    }

    function getOngoingDriversList() {

        $array = array();
        $this->db->select('*, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname');
        $this->db->from('driver_details');
        $this->db->join('trip_details', 'trip_details.driver_id = driver_details.user_id');
        $this->db->where('trip_details.stop_time', '0000-00-00 00:00:00');
        $this->db->order_by('trip_details.start_time', 'desc');
        $this->db->limit(10);
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $array[] = $row;
        }

        return $array;
    }

    function driverArrivalData() {
        $data = array();
        
        $this->db->select('*');
        $this->db->where('driver_arrival', 1);
        $this->db->order_by('from_date', 'desc');

        $i = 0;
        $query = $this->db->get('temp_trip');
        foreach ($query->result_array() as $row) {
            $data[$i]['trip_id'] = $row['trip_id'];
            $data[$i]['unique_id'] = $row['unique_id'];
            $data[$i]['driver_id'] = $row['driver_id'];
            //$data[$i]['driver_name'] = $this->getDriverName($row['driver_id']);
            $data[$i]['passenger_id'] = $row['passenger'];
            //$data[$i]['passenger_name'] = $this->getPassengerName($row['passenger']);
            $data[$i]['from_date'] = $row['from_date'];
            $data[$i]['to_date'] = $row['to_date'];
            $data[$i]['location'] = $row['location'];

            $i++;
        }

        return $data;
    }

    // function getRejectedTrips() {
    //     $data = array();
    //     $i = 0;

    //     $this->db->select('tt.trip_id, tt.unique_id, tt.passenger, pd.fullname, tt.driver_id, TRIM(CONCAT(dd.first_name, Char(32), dd.last_name)) AS name');
    //     $this->db->from('call_rejects AS cr');
    //     $this->db->join('temp_trip AS tt' , 'tt.unique_id = cr.trip_id', 'INNER');
    //     $this->db->join('passenger_details AS pd' , 'pd.user_id = tt.passenger', 'INNER');
    //     $this->db->join('driver_details AS dd' , 'dd.user_id = tt.driver_id', 'INNER');        
    //     $this->db->where('cr.accept_status', 0);
    //     // $this->db->where('DATE(tt.order_date)', date('Y-m-d'));
    //     $this->db->order_by('cr.id', 'DESC');
    //     $this->db->limit(5);
    //     $res = $this->db->get();
        
    //     foreach ($res->result() as $row) {
    //         $data[$i]['unique_id'] = $row->unique_id;
    //         $data[$i]['passenger_id'] = $row->passenger;
    //         $data[$i]['passenger_name'] = $row->fullname;
    //         $data[$i]['driver_id'] = $row->driver_id;
    //         $data[$i]['driver_name'] = $row->name;
    //         $i++;
    //     }
    //     return $data;
    // }

    function getLastTripReject($last_trp_id = '') {
        $data = array();
        $date_of_action = '';

        if($last_trp_id != '') {
            $this->db->select('date_of_action');
            $this->db->where('id', $last_trp_id);
            $this->db->where('date_of_action != ', "0000-00-00 00:00:00");
            $res = $this->db->get('call_rejects');

            foreach ($res->result() as $row) {
                $date_of_action = $row->date_of_action;            
            }            
        }
        
        $this->db->select('cr.id AS reject_id, tt.trip_id, DATE(tt.order_date) AS order_date, tt.unique_id, tt.passenger, pd.fullname, tt.driver_id, TRIM(CONCAT(dd.first_name, Char(32), dd.last_name)) AS fullname1');
        $this->db->from('call_rejects AS cr');
        $this->db->join('temp_trip AS tt' , 'tt.unique_id = cr.trip_id', 'INNER');
        $this->db->join('passenger_details AS pd' , 'pd.user_id = tt.passenger', 'INNER');
        $this->db->join('driver_details AS dd' , 'dd.user_id = cr.driver_id', 'INNER');        
        $this->db->where('cr.accept_status', 2);
        $this->db->where('DATE(tt.order_date)', date('Y-m-d'));
        
        if($date_of_action != '') {            
            $this->db->where("(date_of_action > '" . $date_of_action . "' OR (date_of_action = '" . $date_of_action . "' AND cr.id > " . $last_trp_id . "))");
            $this->db->order_by('date_of_action', 'ASC');
            $this->db->order_by('cr.id', 'ASC');
        
        } else {
            $this->db->order_by('date_of_action', 'DESC');
            $this->db->order_by('cr.id', 'DESC');
        }
        
        $this->db->limit(1);
        $res = $this->db->get();
        
        foreach ($res->result_array() as $row) {
            $data = $row;            
        }
        return $data;
    }
     function insertToTmpDetails($date_temp_arr,$i){
       $res = false;
//       $this->db->set('country_name', $date_temp_arr[0]['country']);
//       $this->db->set('state_name', $date_temp_arr[0]['region']); 
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
    function runCurl(){
        $url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=Riyadh,SA&appid=396551d540ca1a5f5721c0e8ce5f88bd";
//$url = $temp;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        $json=$data;
        return $json;
    }

}
