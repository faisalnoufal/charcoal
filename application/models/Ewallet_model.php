<?php

require_once('Core_Model.php');

class Ewallet_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getPassengersList() {
        $array = array();

        $this->db->select('pl.id, user_name, fullname');
        $this->db->from('passenger_login AS pl');
        $this->db->join('passenger_details AS pd', 'pd.user_id = pl.id', 'inner');
        $this->db->where('pd.verified', 1);
        $query = $this->db->get();

        foreach ($query->result_array() as $row)
            $array[] = $row;

        return $array;
    }

    function insertBalAmountDetails($from_user, $to_user, $amount, $amount_type, $tran_note) {
        $res = false;
        $date = date('Y-m-d H:i:s');
        $this->db->set('from_user', $from_user);
        $this->db->set('to_user', $to_user);
        $this->db->set('amount', $amount);
        $this->db->set('date', $date);
        $this->db->set('amount_type', $amount_type);
        $this->db->set('transaction_concept', $tran_note);
        $res = $this->db->insert('passenger_transactions');
        return $res;
    }

    function addPassengerBalanceAmount($to_user, $amount) {
        $this->db->set('balance_amount', 'balance_amount + ' . $amount, FALSE);
        $this->db->where('user_id', $to_user);
        $res = $this->db->update('passenger_ewallet');
        return $res;
    }

    function getBalanceAmount($user_id, $user_type = "") {
        $balance_amount = "";
        $this->db->select('balance_amount');
        $this->db->where('user_id', $user_id);
        if ($user_type == "passenger")
            $query = $this->db->get('passenger_ewallet');
        elseif ($user_type == "driver") {
            $query = $this->db->get('driver_ewallet');
        }
        foreach ($query->result() as $row) {
            $balance_amount = $row->balance_amount;
        }
        return $balance_amount;
    }

    function deductUserBalanceAmount($to_user, $amount) {
        $this->db->set('balance_amount', 'balance_amount - ' . $amount, FALSE);
        $this->db->where('user_id', $to_user);
        $res = $this->db->update('passenger_ewallet');
        return $res;
    }

    function getFundDetails($user_id, $user_type = "") {
        $array = array();
        $this->db->select('*');
        $this->db->where('to_user', $user_id);        
        
        if ($user_type == "passenger") {
            $this->db->or_where('from_user', $user_id);
            $this->db->from('passenger_transactions');
        
        } elseif ($user_type == "driver") {
            $this->db->from('driver_transactions');
        }

        $this->db->order_by('`date`', 'DESC');
        $query = $this->db->get();
        
        $i = 0;
        foreach ($query->result_array() as $row) {
            $array[$i] = $row;
            if($row['amount_type'] == 'Referral Point')
                $array[$i]['trip_id'] = $this->getPassengerName($row['trip_id']);
        
            $i = $i+1;
        }
        
        return $array;
    }

    function getPassengerName($user_id) {
        $name = '';

        $this->db->select('fullname');
        $this->db->where('user_id', $user_id);        
        $this->db->limit(1);
        $query = $this->db->get('passenger_details');

        foreach ($query->result() as $row) {
            $name = $row->fullname;
        }
        return $name;
    }

    function getDriversList() {
        $array = array();

        $this->db->select('dl.id, dl.user_name, TRIM(CONCAT(first_name, Char(32), last_name)) AS fullname');
        $this->db->from('driver_login AS dl');
        $this->db->join('driver_details AS dd', 'dl.id = dd.user_id', 'inner');
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $array[] = $row;
        }

        return $array;
    }

    function insertDriverTrasactions($from_user, $to_user, $amount, $amount_type, $tran_note) {
        $res = false;
        $date = date('Y-m-d H:i:s');
        $this->db->set('from_user', $from_user);
        $this->db->set('to_user', $to_user);
        $this->db->set('amount', $amount);
        $this->db->set('date', $date);
        $this->db->set('amount_type', $amount_type);
        $this->db->set('transaction_concept', $tran_note);
        $res = $this->db->insert('driver_transactions');
        return $res;
    }

    function changeDriverBalanceAmount($to_user, $amount, $operation = "") {
        if ($operation == "add")
            $this->db->set('balance_amount', 'balance_amount + ' . $amount, FALSE);
        elseif ($operation == "deduct") {
            $this->db->set('balance_amount', 'balance_amount - ' . $amount, FALSE);
        }
        $this->db->where('user_id', $to_user);
        $res = $this->db->update('driver_ewallet');
        return $res;
    }

}
