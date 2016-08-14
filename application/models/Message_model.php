<?php

require_once('Core_Model.php');

class Message_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function updateMessageTable($message, $from, $to,$time) {

//        $this->load->helper('date');
//        $format = 'DATE_W3C';
//        $time = standard_date($format, time());

        $insert = array(
            'from_id' => $from,
            'to_id' => $to,
            'message' => $message,
            'time' => $time
        );
        $res = $this->db->insert('message_details', $insert);
        return $res;
    }
    function updatePassengerMessageTable($message, $from, $to,$time) {

        $insert = array(
            'from_id' => $from,
            'to_id' => $to,
            'message' => $message,
            'time' => $time
        );
        
        $res = $this->db->insert('passenger_message_details', $insert);
        return $res;
    }

    function getDriversList($id = '') {
        $data = array();
        if ($id != '') {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get('driver_details');
        foreach ($query->result_array() as $row) {
            array_push($data, $row);
        }
        return $data;
    }
    
    function getPassengerList($id = '') {
        $data = array();
        if ($id != '') {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get('passenger_details');
        foreach ($query->result_array() as $row) {
            array_push($data, $row);
        }
        return $data;
    }

    function getMessageOrder() {
        $chat_order = array();
        $this->db->select('from_id,to_id');
        $this->db->order_by('time', 'desc');
        $query = $this->db->get('message_details');
        foreach ($query->result_array() as $row) {
            if ($row['from_id'] != 'admin') {
                array_push($chat_order, $row['from_id']);
            } else {
                array_push($chat_order, $row['to_id']);
            }
        }
        return array_values(array_unique($chat_order));
    }
    
    function getPassengerMessageOrder() {
        $chat_order = array();
        $this->db->select('from_id,to_id');
        $this->db->order_by('time', 'desc');
        $query = $this->db->get('passenger_message_details');
        foreach ($query->result_array() as $row) {
            if ($row['from_id'] != 'admin') {
                array_push($chat_order, $row['from_id']);
            } else {
                array_push($chat_order, $row['to_id']);
            }
        }
        return array_values(array_unique($chat_order));
    }

    function getChatHistory($user_id) {
        $data = array();
        $query = "from_id=$user_id AND to_id='admin' OR from_id='admin' AND to_id=$user_id";
        $this->db->select('*');
        $this->db->where($query);
        $query = $this->db->get('message_details');

        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['from_id'] = $row['from_id'];
            $data[$i]['to_id'] = $row['to_id'];
            //$data[$i]['to_prof_pic'] = $this->getUserProfilePic($row['to_id']);
            $data[$i]['message'] = $row['message'];
            $data[$i]['time'] = $row['time'];
            $data[$i]['status'] = $row['status'];
            $i++;
        }
        return $data;
    }
    function getPassengerChatHistory($user_id) {
        $data = array();
        $query = "from_id=$user_id AND to_id='admin' OR from_id='admin' AND to_id=$user_id";
        $this->db->select('*');
        $this->db->where($query);
        $query = $this->db->get('passenger_message_details');

        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['from_id'] = $row['from_id'];
            $data[$i]['to_id'] = $row['to_id'];
            $data[$i]['message'] = $row['message'];
            $data[$i]['time'] = $row['time'];
            $data[$i]['status'] = $row['status'];
            $i++;
        }
        return $data;
    }

    public function getUserProfilePic($user_id) {
        $profile_pic = '';
        $this->db->select('profile_pic');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $query = $this->db->get('driver_details');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $profile_pic = $row['profile_pic'];
            $i++;
        }
        return $profile_pic;
    }
    
    public function getPassengerProfilePic($user_id) {
        $profile_pic = '';
        $this->db->select('profile_pic');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $query = $this->db->get('passenger_details');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $profile_pic = $row['profile_pic'];
            $i++;
        }
        return $profile_pic;
    }

    public function getDriverGcmId($to_user) {
        $gsm_id = '';
        $this->db->select('gcm_id');
        $this->db->where('id', $to_user);
        $this->db->limit(1);
        $query = $this->db->get('driver_login');
        foreach ($query->result_array() as $row) {
            $gsm_id = $row['gcm_id'];
        }
        return $gsm_id;
    }

}
