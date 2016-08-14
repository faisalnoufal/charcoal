<?php

require_once('Core_Model.php');

class Register_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    private function createReferralCode() {
        $referral_code = '';
        $count = 1;
        
        do {
            $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ67890';
            $referral_code = substr(str_shuffle($letters), 0, 6);
            
            $this->db->where('referral_code', $referral_code);                
            $count = $this->db->count_all_results('driver_details');
        } while ($count > 0);
                
        return $referral_code;        
    }  

    function insertDetails($data) {

        $this->db->trans_start();

        $referral_code = $this->createReferralCode();

        $this->db->set("referral_code", $referral_code);
        $this->db->set("first_name", $data['f_name']);
        $this->db->set("last_name", $data['l_name']);
        $this->db->set("nationality", $data['nationality']);
        $this->db->set("address1", $data['address1']);
        $this->db->set("address2", $data['address2']);
        $this->db->set("address3", $data['address3']);
        $this->db->set("address_proof", $data['address_proof']);
        $this->db->set("email", $data['email']);
        $this->db->set("mobile1", $data['mobile1']);
        $this->db->set("mobile2", $data['mobile2']);
        $this->db->set("licence", $data['licence']);
        $this->db->set("licence_proof", $data['licence_proof']);
        $this->db->set("cab_number", $data['cab_num']);
        $this->db->set("cab_model", $data['cab_model']);
        $this->db->set("cab_name", $data['cab_name']);
        $this->db->set("cab_seat", $data['cab_seat']);
        $this->db->set("profile_pic", $data['profile_pic']);
        $this->db->set("user_name", $data['user_name']);
        $this->db->set("bank_name", $data['bank_name']);
        $this->db->set("acc_number", $data['acc_number']);
        $this->db->set("branch_code", $data['branch_code']);
        $this->db->set("swift_code", $data['swift_code']);
        $this->db->set("ins_renew_date", $data['ins_renew_date']);
        $this->db->set("tax_renew_date", $data['tax_renew_date']);

        $this->db->insert('driver_details');
        $res = $this->db->insert_id();

        if ($res) {

            $this->db->set('user_id', $res);
            $this->db->set('balance_amount', 0);
            $this->db->insert('driver_ewallet');

            $this->db->set("id", $res);
            $this->db->set("user_name", $data['user_name']);
            $this->db->set("password", md5($data['password']));
            $res2 = $this->db->insert('driver_login');

            if ($res2) {

                $this->db->trans_complete();
                return TRUE;
            } else {

                $this->db->trans_rollback();
                return FALSE;
            }
        } else {

            $this->db->trans_rollback();
            return FALSE;
        }
    }

    function getCabNames() {
        $data = array();

        $this->db->select('id,type_short_name');
        $this->db->where('active_status', 1);
        $query = $this->db->get('cab_register');

        foreach ($query->result_array() as $row) {
            array_push($data, $row);
        }
        return $data;
    }

    function getPassengerData($data, $type) {
        $this->db->where($type, $data);
        
        if($type = 'cab_number')
            $this->db->where('status', 'yes');

        return $this->db->count_all_results('driver_details');
    }

}
