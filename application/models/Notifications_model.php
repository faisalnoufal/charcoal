<?php

require_once('Core_Model.php');

class Notifications_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getUserDetails() {
        $data = array();
        $this->db->where('verified', 1);
        $query = $this->db->get('passenger_details');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i]['fullname'] = $row['fullname'];
            $data[$i]['user_id'] = $row['user_id'];
            $i++;
        }
        return $data;
    }

    function insertNotification($user_id, $message, $user_list, $user_all, $message_expiry, $to_pilot = 1) {
        
        $noti_id = $this->insertNotificationHistory($user_id, $message, $user_all, $message_expiry, $to_pilot, 'notificaton');

        if ($user_all == 'all') {

            foreach ($user_list as $user) {
                $this->db->set('user_id', $user['user_id']);
                $this->db->set('noti_id', $noti_id);
                $query = $this->db->insert('notifications');
            }
        
        } else {

            foreach ($user_id as $user) {
                $this->db->set('user_id', $user);
                $this->db->set('noti_id', $noti_id);
                $query = $this->db->insert('notifications');
            }
        }
        
        return $query;
    }

    function insertNotificationHistory($user_id, $message, $user_all, $expiry_date, $to_pilot, $message_type) {
        
        if ($user_all == "all") {
            $user_id = 0;   
        } else {
            $user_id =  implode(',',$user_id);
        }
            
        $this->db->set('user_id', $user_id);        
        $this->db->set('message', $message);
        $this->db->set('message_type', $message_type);
        $this->db->set('expr_date', date('Y-m-d',strtotime(trim($expiry_date))));
        $this->db->set('to_driver', $to_pilot);
        $this->db->set('to_passenger', ($to_pilot == 0 ? 1 : 0));
        $this->db->set('date', date('Y-m-d H:i:s'));
        $this->db->insert('notification_history');
        
        $id = $this->db->insert_id();

        return $id;
    }
    
    function getDriverDetails() {
        $data = array();

        $this->db->select('user_id, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname');
        $query = $this->db->get('driver_details');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i]['fullname'] = $row['fullname'];
            $data[$i]['user_id'] = $row['user_id'];
            $i++;
        }
        return $data;
    }

}
