<?php

require_once('Core_Model.php');

class Settings_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getCommissionPercentage() {
        $percentage = "";
        $this->db->select('commission_percentage');
        $this->db->where('id', 1);
        $query = $this->db->get('configuration');
        foreach ($query->result() as $row) {
            $percentage = $row->commission_percentage;
        }
        return $percentage;
    }

    function updateCommissionPercentage($percentage) {
        $res = "";
        $this->db->set('commission_percentage', $percentage);
        $this->db->where('id', 1);
        $res = $this->db->update('configuration');
        return $res;
    }

    function getSupportNos() {
        $nos_array = array();

        $this->db->select('passenger_support_no, driver_support_no');
        $this->db->limit(1);
        $query = $this->db->get('configuration');

        foreach ($query->result_array() as $row) {
            $nos_array = $row;
        }
        return $nos_array;
    }

    function updateSupportNos($passenger_support_no, $driver_support_no) {

        $this->db->set('passenger_support_no', $passenger_support_no);
        $this->db->set('driver_support_no', $driver_support_no);
        $this->db->limit(1);
        $this->db->update('configuration');

        return $this->db->affected_rows();
    }

    function getTimeSettings() {
        $time_array = array();

        $this->db->select('km_per_hour, initial_waiting_time, additional_waiting_time');
        $this->db->limit(1);
        $query = $this->db->get('configuration');

        foreach ($query->result_array() as $row) {
            $time_array = $row;
        }
        return $time_array;
    }

    function updateTimeSettings($km_per_hour, $initial_waiting_time, $additional_waiting_time) {

        $this->db->set('km_per_hour', $km_per_hour);
        $this->db->set('initial_waiting_time', $initial_waiting_time);
        $this->db->set('additional_waiting_time', $additional_waiting_time);
        $this->db->limit(1);
        $this->db->update('configuration');

        return $this->db->affected_rows();
    }

    function getAboutUs() {
        $data = array('passenger_content' => '', 'driver_content' => '');

        $this->db->select('passenger_content, driver_content');
        $this->db->limit(1);
        $query = $this->db->get('about_us');

        foreach ($query->result() as $row) {
            $data['passenger_content'] = html_entity_decode(stripslashes($row->passenger_content));
            $data['driver_content'] = html_entity_decode(stripslashes($row->driver_content));
        }
        return $data;
    }

    function updateAboutUs($passenger_content = '', $driver_content = '') {

        if ($passenger_content)
            $this->db->set('passenger_content', addslashes(htmlentities($passenger_content)));

        if ($driver_content)
            $this->db->set('driver_content', addslashes(htmlentities($driver_content)));

        $this->db->where('id', 1);
        $this->db->limit(1);
        $this->db->update('about_us');

        return $this->db->affected_rows();
    }

    function getReferralPoint() {
        $referral_point = "";

        $this->db->select('referral_point');
        $this->db->where('id', 1);
        $query = $this->db->get('configuration');

        foreach ($query->result() as $row) {
            $referral_point = $row->referral_point;
        }
        return $referral_point;
    }

    function updateReferralPoint($referral_point) {
        $this->db->set('referral_point', $referral_point);
        $this->db->where('id', 1);
        $this->db->update('configuration');

        return $this->db->affected_rows();
    }

    function updateLogoFileName($filename) {
        $this->db->set('logo', $filename);
        $this->db->where('id', 1);
        $this->db->update('configuration');

        return $this->db->affected_rows();
    }

    function getTermsAndConditions() {
        $data = array('passenger_content' => '', 'driver_content' => '');

        $this->db->select('passenger_content, driver_content');
        $this->db->limit(1);
        $query = $this->db->get('terms_conditions');

        foreach ($query->result() as $row) {
            $data['passenger_content'] = html_entity_decode(stripslashes($row->passenger_content));
            $data['driver_content'] = html_entity_decode(stripslashes($row->driver_content));
        }
        return $data;
    }

    function updateTermsAndConditions($passenger_content = '', $driver_content = '') {

        if ($passenger_content)
            $this->db->set('passenger_content', addslashes(htmlentities($passenger_content)));

        if ($driver_content)
            $this->db->set('driver_content', addslashes(htmlentities($driver_content)));

        $this->db->where('id', 1);
        $this->db->limit(1);
        $this->db->update('terms_conditions');

        return $this->db->affected_rows();
    }

    function getCallRadius() {
        $call_radius = "";

        $this->db->select('call_radius');
        $this->db->where('id', 1);
        $query = $this->db->get('configuration');

        foreach ($query->result() as $row) {
            $call_radius = $row->call_radius;
        }
        return $call_radius;
    }

    function updateCallRadius($call_radius) {
        $this->db->set('call_radius', $call_radius);
        $this->db->where('id', 1);
        $this->db->update('configuration');

        return $this->db->affected_rows();
    }

    function getCurrentEmail($user_id) {
        $email = '';

        $this->db->select('email');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $query = $this->db->get('login');

        foreach ($query->result() as $row) {
            $email = $row->email;
        }
        return $email;
    }

    function updateEmail($user_id, $email) {
        $this->db->set('email', $email);
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $res = $this->db->update('login');

        return $res;
    }

    function validatePassword($user_id, $password) {
        $this->db->where('user_id', $user_id);
        $this->db->where('password', md5($password));
        $count = $this->db->count_all_results('login');

        if ($count > 0)
            return TRUE;
        else
            return FALSE;
    }

    function updatePassword($user_id, $password) {
        $this->db->set('password', md5($password));
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $res = $this->db->update('login');

        return $res;
    }

    function checkAmountExist($amount, $edit_id = '') {
        $this->db->where('amount', $amount);

        if ($edit_id)
            $this->db->where('amount_id != ', $edit_id);

        return $this->db->count_all_results('wallet_amounts');
    }

    function updateWalletAmount($amount, $edit_id = '') {
        $this->db->set('amount', $amount);

        if ($edit_id) {
            $this->db->where('amount_id', $edit_id);
            $res = $this->db->update('wallet_amounts');
        } else {
            $res = $this->db->insert('wallet_amounts');
        }

        return $res;
    }

    function getWalletAmount($id = '') {
        $data = array();

        if ($id)
            $this->db->where('amount_id', $id);

        $query = $this->db->get('wallet_amounts');

        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    function changeWalletAmountActive($id) {
        $res = $act_status = 0;

        $this->db->select('act_status');
        $this->db->where('amount_id', $id);
        $query = $this->db->get('wallet_amounts');

        foreach ($query->result() as $row) {
            $act_status = $row->act_status;
        }

        if (!$act_status) {
            $this->db->set('act_status', 1);
            $this->db->where('amount_id', $id);
            $res = $this->db->update('wallet_amounts');
        } else {
            $this->db->set('act_status', 0);
            $this->db->where('amount_id', $id);
            $res = $this->db->update('wallet_amounts');
        }

        if ($res)
            return $active_status;
        else
            return array('error', $active_status);
    }

    function getMinimumAmount() {
        $amount = "";
        $this->db->select('minimum_amount');
        $this->db->where('id', 1);
        $query = $this->db->get('configuration');
        foreach ($query->result() as $row) {
            $amount = $row->minimum_amount;
        }
        return $amount;
    }

    function updateMinimumAmount($amount) {
        $res = "";
        $this->db->set('minimum_amount', $amount);
        $this->db->where('id', 1);
        $res = $this->db->update('configuration');
        return $res;
    }

    function getCancelAmount() {
        $cancel_amount = 0;

        $this->db->select('cancel_amount');
        $this->db->where('id', 1);
        $query = $this->db->get('configuration');

        foreach ($query->result() as $row) {
            $cancel_amount = $row->cancel_amount;
        }
        return $cancel_amount;
    }

    function updateCancelAmount($cancel_amount) {
        $this->db->set('cancel_amount', $cancel_amount);
        $this->db->where('id', 1);
        $this->db->update('configuration');

        return $this->db->affected_rows();
    }

    function getMinimumTime() {
        $minimum_time = 0;

        $this->db->select('minimum_time');
        $this->db->limit(1);
        $query = $this->db->get('configuration');

        foreach ($query->result_array() as $row) {
            $minimum_time = $row['minimum_time'];
        }
        return $minimum_time;
    }

    function updateMinimumTime($minimum_time) {

        $this->db->set('minimum_time', $minimum_time);        
        $this->db->limit(1);
        $this->db->update('configuration');

        return $this->db->affected_rows();
    }

}
