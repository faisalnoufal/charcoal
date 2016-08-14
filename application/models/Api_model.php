<?php

require_once('Core_Model.php');

class Api_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    public function login_passenger($username, $password, $acc_type) {
        $userid = array();

        $this->db->select('pl.id, status, pd.verified');

        if ($acc_type == 'normal')
            $this->db->where('pl.password', MD5($password));

        $this->db->where('pl.user_name', $username);
        $this->db->where('pd.acc_type', $acc_type);
        $this->db->from('passenger_login as pl');
        $this->db->join('passenger_details as pd', 'pl.id = pd.user_id', 'inner');
        $this->db->limit(1);
        $res = $this->db->get();

        foreach ($res->result_array() as $row) {
            $userid = $row;
        }
        return $userid;
    }

    public function login_driver($username, $password) {
        $userid = array();

        $this->db->select('dl.id, status');
        $this->db->where('dl.user_name', $username);
        $this->db->where('dl.password', MD5($password));
        $this->db->from('driver_login as dl');
        $this->db->join('driver_details as dd', 'dl.id = dd.user_id', 'inner');
        $this->db->limit(1);
        $res = $this->db->get();

        foreach ($res->result_array() as $row) {
            $userid = $row;
        }
        return $userid;
    }

    public function is_active_driver($driver_id) {

        $this->db->select('status');
        $this->db->where('user_id', $driver_id);
        $this->db->limit(1);
        $res = $this->db->get('driver_details');

        foreach ($res->result() as $row) {
            return $row->status;
        }
        return 'no';
    }

    public function is_active_passenger($passenger_id) {

        $this->db->select('status');
        $this->db->where('user_id', $passenger_id);
        $this->db->limit(1);
        $res = $this->db->get('passenger_details');

        foreach ($res->result() as $row) {
            return $row->status;
        }
        return 'no';
    }

    public function set_driver_location($latitude, $longitude, $userid, $time, $status) {

        $this->db->where('userid', $userid);
        $count = $this->db->count_all_results('driver_location');

        $this->db->set('latitude', $latitude);
        $this->db->set('longitude', $longitude);
        $this->db->set('time', $time);

        if ($status != NULL && $status != '')
            $this->db->set('status', $status);

        if ($count > 0) {
            $this->db->where('userid', $userid);
            $this->db->limit(1);
            $res = $this->db->update('driver_location');
        } else {
            $this->db->set('userid', $userid);
            $res = $this->db->insert('driver_location');
        }

        $this->unset_engaged_status($userid);

        return $res;
    }

    public function set_passenger_location($latitude, $longitude, $userid, $time, $status = 0) {
        $this->db->where('userid', $userid);
        $count = $this->db->count_all_results('passenger_location');

        $this->db->set('latitude', $latitude);
        $this->db->set('longitude', $longitude);
        $this->db->set('time', $time);
        $this->db->set('status', $status);

        if ($count > 0) {
            $this->db->where('userid', $userid);
            $this->db->limit(1);
            $res = $this->db->update('passenger_location');
        } else {
            $this->db->set('userid', $userid);
            $res = $this->db->insert('passenger_location');
        }

        return $res;
    }

    public function get_driver_cab($driver_id) {
        $cab = '';

        $this->db->select('cab_name');
        $this->db->where('user_id', $driver_id);
        $this->db->limit(1);
        $res = $this->db->get('driver_details');

        foreach ($res->result() as $row) {
            $cab = $row->cab_name;
        }
        return $cab;
    }

    public function set_journey_start($unique_id, $userid, $time) {
        $res = FALSE;
        $distance = array('distance' => 0);
        $trip_details = $this->get_temp_trip($unique_id, 1, $userid);

        if (count($trip_details) > 0) {

            if ($trip_details->end_latitude && $trip_details->end_latitude != 0 && $trip_details->end_longitude && $trip_details->end_longitude != 0)
                $distance = $this->distance($trip_details->start_latitude, $trip_details->start_longitude, $trip_details->end_latitude, $trip_details->end_longitude);

            $coupon_details = $this->get_coupon_details($trip_details->coupon);
            $count = count($trip_details);

            $coupon_status = $this->coupon_already_used($trip_details->passenger, $trip_details->coupon);
            $count = ($coupon_status == 0 ? $count : 0);

            // $cab_id = $trip_details->cab_id;
            // if(!$cab_id)
            $cab_id = $this->get_driver_cab($userid);

            $this->db->set('start_point_latitude', $trip_details->start_latitude);
            $this->db->set('start_point_longitude', $trip_details->start_longitude);
            $this->db->set('trip_from', $trip_details->start_location);
            $this->db->set('start_time', $time);
            $this->db->set('end_point_latitude', $trip_details->end_latitude);
            $this->db->set('end_point_longitude', $trip_details->end_longitude);
            $this->db->set('trip_to', $trip_details->end_location);
            $this->db->set('estimated_distance', $distance['distance']);
            $this->db->set('driver_id', $userid);
            $this->db->set('cab_type', $cab_id);
            $this->db->set('passenger_id', $trip_details->passenger);
            $this->db->set('unique_id', $unique_id);
            $this->db->set('coupon', ($count > 0 ? $trip_details->coupon : ''));
            $this->db->set('pay_mode', $trip_details->pay_mode);
            $res = $this->db->insert('trip_details');

            $trip_id = $this->db->insert_id();

            if ($res) {
                $res = $this->update_total_trip($userid);

                if ($count > 0)
                    $stat = $this->change_coupon_status($trip_details->coupon, $trip_details->passenger);

                $res = $this->set_driver_location($trip_details->start_latitude, $trip_details->start_longitude, $userid, $time, 2);

                if ($res) {
                    $res = $this->set_passenger_location($trip_details->start_latitude, $trip_details->start_longitude, $trip_details->passenger, $time);
                    $res = $trip_id;
                }
            }
            return $res;
        } else
            return FALSE;
    }

    public function distance($lat1, $long1, $lat2 = '', $long2 = '') {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $lat1 . "," . $long1 . "&destinations=" . $lat2 . "," . $long2 . "&mode=driving&language=en-EN&units=metric";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, TRUE);
        $dist = isset($response_a['rows'][0]['elements'][0]['distance']['text']) ? $response_a['rows'][0]['elements'][0]['distance']['text'] : '';
        $time = isset($response_a['rows'][0]['elements'][0]['duration']['text']) ? $response_a['rows'][0]['elements'][0]['duration']['text'] : '';

        if ($dist && $time)
            return array('distance' => $dist, 'time' => $time);
        else
            return FALSE;
    }

    public function calculate_fare($distance, $cab_id, $waiting = 0) {
        $this->load->model('Cabs_model');
        $cabs = $this->Cabs_model->getCabsList($cab_id);
        $cab_res = array();
        $charge = 0;

        foreach ($cabs as $cab) {//new calculation

            if ($distance > $cab['minimum_distance'])
                $charge = $cab['fare_per_km'] * $distance;

            $charge += $cab['minimum_charge'];

            $cab_res['running_charge'] = round($charge, 2);
            $cab_res['waiting_charge'] = round(($cab['waiting_charge'] * $waiting), 2);
            $cab_res['total_charge'] = $cab_res['running_charge'] + $cab_res['waiting_charge'];
        }
//        foreach ($cabs as $cab) {
//            $distance = $distance - $cab['minimum_distance'];
//
//            if ($distance > 0)
//                $charge = $cab['fare_per_km'] * $distance;
//
//            $charge += $cab['minimum_charge'];
//
//            $cab_res['running_charge'] = round($charge, 2);
//            $cab_res['waiting_charge'] = round(($cab['waiting_charge'] * $waiting), 2);
//            $cab_res['total_charge'] = $cab_res['running_charge'] + $cab_res['waiting_charge'];
//        }
        return $cab_res;
    }

    public function get_nearest_drivers($latitude, $longitude, $distance, $cab_type = 0) {
        $this->load->model('Cabs_model');
        $array = $driver = array();

        $config = $this->get_config();
        
        $sql = "SELECT dl.userid, dl.latitude, dl.longitude, dl.status, dd.first_name, dd.last_name, dd.user_name, dd.cab_name, dd.cab_seat, (1.60934 * 3956 * 2 * ASIN(SQRT( POWER(SIN((" . $latitude . " -abs(latitude)) * pi()/180 / 2), 2) +COS(" . $latitude . " * pi()/180) * COS(abs(latitude) * pi()/180) *POWER(SIN((" . $longitude . " -longitude) * pi()/180 / 2), 2) ))) as distance " .
                "FROM CB_driver_location as dl INNER JOIN CB_driver_details AS dd ON dd.user_id = dl.userid " .
                "HAVING dl.status = 0 AND distance <= " . $distance;

        if ($cab_type != 0) {
            $sql = $sql . " AND dd.cab_name = " . $cab_type;
        }

        $sql = $sql . " ORDER BY distance LIMIT 10";

        $res = $this->db->query($sql, FALSE);

        $i = 0;
        foreach ($res->result() as $row) {
            $min_fare = $this->Cabs_model->getCabsList($row->cab_name, TRUE);
            $expected = round((60 * $row->distance / $config['km_per_hour']), 0);

            if (count($min_fare) > 0) {
                $array[$i]['driver_id'] = $row->userid;
                $array[$i]['latitude'] = $row->latitude;
                $array[$i]['longitude'] = $row->longitude;
                $array[$i]['distance'] = $row->distance;
                $array[$i]['expected'] =  ($expected ? $expected.'min': '1min');
                $array[$i]['cab_id'] = $row->cab_name;
                $array[$i]['min_fare'] = $min_fare[0]['minimum_charge'];
                $array[$i]['cab_name'] = $min_fare[0]['type_short_name'];
                $array[$i]['cab_image'] = $min_fare[0]['icon'];
                $array[$i]['cab_seat'] = $row->cab_seat;
                $array[$i]['driver_name'] = $row->first_name . ' ' . $row->last_name;
                $array[$i]['user_name'] = $row->user_name;
                $i++;
            }
        }
        return $array;
    }

    public function check_password($user_id, $password) {
        $this->db->where('id', $user_id);
        $this->db->where('password', MD5($password));
        $count = $this->db->count_all_results('passenger_login');

        return $count;
    }

    public function check_mobile($mobile, $user_id = '') {

        $this->db->where('mobile', $mobile);
        $this->db->where('verified', 1);

        if ($user_id)
            $this->db->where('user_id != ', $user_id);

        $this->db->limit(1);

        $res = $this->db->get('passenger_details');

        foreach ($res->result() as $row) {
            return $row->user_id;
        }
        return FALSE;
    }

    public function check_username($username, $user_id = '') {

        $this->db->where('user_name', $username);

        if ($user_id != '')
            $this->db->where('user_id != ', $user_id);

        $this->db->limit(1);
        $res = $this->db->get('passenger_login');

        foreach ($res->result() as $row) {
            return $row->id;
        }
        return FALSE;
    }

    public function update_password($user_id, $password) {

        $this->db->set('password', md5($password));
        $this->db->set('otp', "");
        $this->db->set('dyn_key', "");
        $this->db->where('id', $user_id);
        $res = $this->db->update('passenger_login');

        if ($this->db->affected_rows() > 0) {
            return $user_id;
        }
        return FALSE;
    }

    public function update_passenger_profile($user_id, $name, $mobile, $email, $password, $profile_pic) {

        if ($password)
            $res = $this->update_password($user_id, $password);

        if ($name)
            $this->db->set('fullname', $name);

        if ($mobile)
            $this->db->set('mobile', $mobile);

        if ($email)
            $this->db->set('email', $email);

        if ($profile_pic)
            $this->db->set('profile_pic', $profile_pic);

        $this->db->where('user_id', $user_id);
        $res = $this->db->update('passenger_details');

        return $user_id;
    }

    public function check_email($email, $user_id = '') {

        $this->db->where('email', $email);

        if ($user_id)
            $this->db->where('user_id != ', $user_id);

        $this->db->limit(1);
        $res = $this->db->get('passenger_details');

        foreach ($res->result() as $row) {
            return $row->user_id;
        }
        return FALSE;
    }

    public function register_passenger($username, $fullname, $mobile, $password, $email, $referral, $acc_type) {
        $userid = '';
        $status = '';
        $referrer = '';
        $insert_id = '';
        $referral_code = $this->create_referral_code();
        $otp = $this->create_register_otp();

        $this->db->set('user_name', $username);
        $this->db->set('password', MD5($password));
        $res = $this->db->insert('passenger_login');

        if ($res) {
            $userid = $this->db->insert_id();

            $this->db->set('fullname', $fullname);
            $this->db->set('mobile', $mobile);
            $this->db->set('email', $email);
            $this->db->set('user_id', $userid);
            $this->db->set('join_date', "NOW()", FALSE);
            $this->db->set('referral_code', $referral_code);
            $this->db->set('acc_type', $acc_type);
            $this->db->set('otp', $otp);
            $res = $this->db->insert('passenger_details');

            $insert_id = $this->db->insert_id();

            if ($res) {
                $this->db->set('user_id', $userid);
                $this->db->set('balance_amount', 0);
                $res = $this->db->insert('passenger_ewallet');

                if ($referral)
                    $referrer = $this->insert_referral_amount($referral, $userid);

                if ($referrer) {
                    $this->db->set('referrer_id', $referrer['referrer_id']);
                    $this->db->set('is_passenger_referrer', $referrer['is_passenger_referrer']);
                    $this->db->where('id', $insert_id);
                    $this->db->limit(1);
                    $this->db->update('passenger_details');
                }

                $message = 'Hi! Your ajoul verification code is ' . $otp . '.';
                $status = $this->send_message($mobile, $message);
            }
        }
        return array('status' => $status, 'userid' => $userid);
    }

    private function create_register_otp() {
        $otp = '';

        do {
            $letters = '1234567890';
            $otp = substr(str_shuffle($letters), 0, 6);

            $this->db->where('otp', $otp);
            $count = $this->db->count_all_results('passenger_details');
        } while ($count > 0);

        return $otp;
    }

    public function send_register_otp($user_id) {

        $this->db->select('otp, mobile');
        $this->db->where('id', $user_id);
        $this->db->where('verified', 0);
        $query = $this->db->get('passenger_details');

        foreach ($query->result() as $row) {
            $message = 'Hi! Your ajoul verification code is ' . $row->otp . '.';
            $status = $this->send_message($row->mobile, $message);
            return $status;
        }
        return FALSE;
    }

    public function send_otp_change_no($user_id, $mobile) {
        $status = '';
        $otp = $this->create_register_otp();

        $this->db->set('otp', $otp);
        $this->db->where('user_id', $user_id);
        $res = $this->db->update('passenger_details');

        if ($this->db->affected_rows()) {
            $message = 'Hi! Your ajoul verification code is ' . $otp . '.';
            $status = $this->send_message($mobile, $message);
        }
        return $status;
    }

    public function verify_otp_change_no($user_id, $otp) {

        $this->db->set('verified', 1);
        $this->db->where('otp', $otp);
        $this->db->where('id', $user_id);
        $res = $this->db->update('passenger_details');

        return $res;
    }

    public function verify_register_otp($user_id, $otp) {

        $this->db->set('verified', 1);
        $this->db->where('otp', $otp);
        $this->db->where('id', $user_id);
        $res = $this->db->update('passenger_details');

        return $this->db->affected_rows();
    }

    public function get_driver_details($user_id) {
        $data = array();

        $this->db->select('user_id, first_name, last_name, email, mobile1, mobile2, rating, profile_pic, cab_number, referral_code');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $res = $this->db->get('driver_details');

        foreach ($res->result() as $row) {
            $data = $row;
        }
        return $data;
    }

    public function update_total_trip($userid) {

        $this->db->set('total_trip', 'total_trip +1', FALSE);
        $this->db->where('user_id', $userid);
        $this->db->limit(1);
        $res = $this->db->update('driver_details');
        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_gcm_id($user_id, $gcm_id, $type = 'driver') {
        $res = '';

        $this->db->set('gcm_id', $gcm_id);
        $this->db->where('id', $user_id);
        $this->db->limit(1);
        if ($type == 'passenger') {
            $res = $this->db->update('passenger_login');
        } else {
            $res = $this->db->update('driver_login');
        }

        if ($res) {
            return $res;
        } else {
            return $res;
        }
    }

    public function insert_driver_message($user_id, $message) {
        $time = date("Y-m-d H:i:s");
        $res = '';

        $data = array('from_id' => $user_id,
            'to_id' => 'admin',
            'message' => $message,
            'time' => $time,
        );
        $res = $this->db->insert('message_details', $data);

        if ($res) {
            return $res;
        } else {
            return $res;
        }
    }

    public function insert_passenger_message($user_id, $message) {
        $time = date("Y-m-d H:i:s");
        $res = '';

        $data = array('from_id' => $user_id,
            'to_id' => 'admin',
            'message' => $message,
            'time' => $time,
        );
        $res = $this->db->insert('passenger_message_details', $data);

        if ($res) {
            return $res;
        } else {
            return $res;
        }
    }

    private function total_trip_time($unique_id, $userid, $time) {
        $total_time = 0;

        $this->db->select('(TIMESTAMPDIFF(MINUTE, start_time, "' . $time . '")) AS total_time', FALSE);
        $this->db->where('driver_id', $userid);
        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $res = $this->db->get('trip_details');

        foreach ($res->result() as $row) {
            $total_time = $row->total_time;
        }
        return $total_time;
    }

    private function get_config() {
        $config = array();

        $this->db->select('initial_waiting_time, additional_waiting_time, km_per_hour');
        $res = $this->db->get('configuration');

        foreach ($res->result_array() as $row) {
            $config = $row;
        }
        return $config;
    }

    public function set_journey_stop($journey_id, $distance, $waiting, $end_latitude, $end_longitude, $userid, $time) {
        $res = FALSE;
        $distance = $distance * 0.001; //meters to km conversion
        $waiting = $this->get_minutes($waiting); //converting from HH:MM:SS to minutes

        $pay_mode = $this->get_pay_mode($journey_id);
        $cab = $this->get_driver_cab($userid);
        $coupon_id = $this->coupon_code_from_trip($journey_id);
        $total_time = $this->total_trip_time($journey_id, $userid, $time);
        $config = $this->get_config();
        $expected_time = round((60 * $distance / $config['km_per_hour']), 0);
        $additional_waiting_time = $total_time - $expected_time;
        $additional_waiting = $additional_waiting_time - $config['additional_waiting_time'];
        $initial_waiting = $waiting - $config['initial_waiting_time'];

        if ($initial_waiting < 0)
            $initial_waiting = 0;

        if ($additional_waiting < 0)
            $additional_waiting = 0;

        if ($additional_waiting_time < 0)
            $additional_waiting_time = 0;

        $fare_array = $this->calculate_fare($distance, $cab, ($initial_waiting + $additional_waiting));

        $fare_array['additional_waiting'] = $initial_waiting;
        $fare_array['total_waiting'] = $additional_waiting;
        $fare_array['discount_status'] = 'no';
        $fare_array['discount'] = 0;
        $total_fare = $fare_array['total_charge'];

        if ($coupon_id) {
            $data = $this->get_coupon_details($coupon_id, 1);

            if ($data['type'] == 'percent') {
                $fare_array['discount_coupon'] = $data['value'];
                $fare_array['dicount_type'] = $data['amount'] . ' %';
                $fare_array['discount_status'] = 'yes';
                $fare_array['discount'] = round(($fare_array['total_charge'] * ($data['amount'] / 100)), 2);
                if ($fare_array['discount'] >= $fare_array['total_charge']) {
                    $fare_array['total_charge'] = 0;
                } else {
                    $fare_array['total_charge'] = $fare_array['total_charge'] - $fare_array['discount'];
                }
            } else {
                $fare_array['discount_coupon'] = $data['value'];
                $fare_array['dicount_type'] = 'flat ' . $data['amount'];
                $fare_array['discount_status'] = 'yes';
                $fare_array['discount'] = $data['amount'];
                if ($fare_array['discount'] >= $fare_array['total_charge']) {
                    $fare_array['total_charge'] = 0;
                } else {
                    $fare_array['total_charge'] = $fare_array['total_charge'] - $fare_array['discount'];
                }
            }
        }

        $fare_array['balance_payment'] = $fare_array['total_charge'];
        $trip_to = $this->get_location($end_latitude, $end_longitude);

        if ($pay_mode == 'by_ewallet' && $fare_array['balance_payment'] > 0) {
            $passenger = $this->passenger_id_from_trip($journey_id);
            $balance = $this->get_balance_amount($passenger);

            if ($balance >= $fare_array['total_charge']) {
                $inst_fund_det = $this->insert_fund_details($passenger, $fare_array['total_charge'], 'Trip Payment', $journey_id);
                $updt_bal = $this->deduct_balance_amount($passenger, $fare_array['total_charge']);
                $fare_array['balance_payment'] = 0;
            } else {
                $inst_fund_det = $this->insert_fund_details($passenger, $balance, 'Trip Payment', $journey_id);
                $fare_array['balance_payment'] = $fare_array['total_charge'] - $balance;
                $updt_bal = $this->deduct_balance_amount($passenger, $balance);
            }
        }

        $this->db->set('stop_time', $time);
        $this->db->set('end_point_latitude', $end_latitude);
        $this->db->set('end_point_longitude', $end_longitude);
        $this->db->set('trip_to', $trip_to);
        $this->db->set('total_distance', $distance);
        $this->db->set('initial_waiting_time', $waiting);
        $this->db->set('initial_charged_time', $initial_waiting);
        $this->db->set('additional_waiting_time', $additional_waiting_time);
        $this->db->set('additional_charged_time', $additional_waiting);
        $this->db->set('total_time', ($total_time - $additional_waiting));
        $this->db->set('waiting_charge', $fare_array['waiting_charge']);
        $this->db->set('running_charge', $fare_array['running_charge']);
        $this->db->set('total_fare', $fare_array['total_charge']);
        $this->db->set('discount', $fare_array['discount']);
        $this->db->set('paid_status', ($fare_array['balance_payment'] == 0 ? 'yes' : 'no'));
        $this->db->set('wallet_payment', ($fare_array['total_charge'] - $fare_array['balance_payment']));
        $this->db->where('driver_id', $userid);
        $this->db->where('unique_id', $journey_id);
        $this->db->limit(1);
        $res = $this->db->update('trip_details');

        if ($res) {
            $res = $fare_array;
            $this->set_driver_location($end_latitude, $end_longitude, $userid, $time, 0);
            $commision = $this->calculate_commission($userid, $total_fare, $journey_id);

            if ($this->is_future_trip($journey_id, $userid))
                $this->Api_model->remove_temp_trip($journey_id);
        }
        return $res;
    }

    public function get_chat_history($user_id, $type = 'driver') {
        $data = array();

        $que = "from_id = $user_id AND to_id = 'admin' OR from_id = 'admin' AND to_id = $user_id";
        $this->db->select('from_id,to_id,message,time');
        $this->db->order_by('time', 'asc');
        $this->db->limit(50);
        $this->db->where($que);
        if ($type == 'passenger') {
            $query = $this->db->get('passenger_message_details');
        } else {
            $query = $this->db->get('message_details');
        }
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                array_push($data, $row);
            }
        }

        return $data;
    }

    public function get_driver_gcmid($driver_id) {
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

    public function coupon_code_from_trip($journey_id) {
        $coupon_id = '';

        $this->db->select('coupon');
        $this->db->where('unique_id', $journey_id);
        $this->db->limit(1);
        $query = $this->db->get('trip_details');

        foreach ($query->result() as $row) {
            $coupon_id = $row->coupon;
        }
        if ($coupon_id) {
            return $coupon_id;
        } else {
            return NULL;
        }
    }

    public function get_coupon_details($coupon_id, $st = 0) {
        $data = array();

        $this->db->select('coupon_text, amount, amount_or_percentage');
        $this->db->where('coupon_id', $coupon_id);

        if (!$st)
            $this->db->where('count > used_count');

        $this->db->limit(1);
        $query = $this->db->get('coupon');

        foreach ($query->result() as $row) {
            $data['amount'] = $row->amount;
            $data['type'] = $row->amount_or_percentage;
            $data['value'] = $row->coupon_text;
        }
        return $data;
    }

    public function change_coupon_status($coupon_id, $passenger) {

        $this->db->set('used_count', 'used_count + 1', FALSE);
        $this->db->where('coupon_id', $coupon_id);
        $this->db->limit(1);
        $this->db->update('coupon');

        if ($this->db->affected_rows() > 0) {
            $this->db->set('user_id', $passenger);
            $this->db->set('coupon_id', $coupon_id);
            $this->db->set('used_date', date("Y-m-d H:i:s"));
            $this->db->insert('coupon_used');
        }
    }

    public function get_passenger_details($userid) {
        $detail = array();

        $this->db->select('user_id, user_name, fullname, email, mobile, profile_pic, rating, referral_code');
        $this->db->from('passenger_login as pl');
        $this->db->join('passenger_details as pd', 'pl.id = pd.user_id', 'inner');
        $this->db->where('user_id', $userid);
        $this->db->limit(1);
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $detail = $row;
        }
        return $detail;
    }

    public function send_driver_gcm_request($driver, $passenger, $ride, $unique_id) {
        $gcm_id = $this->get_driver_gcmid($driver['driver_id']);        

        $time = date("Y-m-d H:i:s");
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => array($gcm_id),
            'data' => array('msg_type' => 'ride_request', 'passenger_id' => $passenger['user_id'],
                'passenger_name' => $passenger['user_name'],
                'fullname' => $passenger['fullname'],
                'passenger_mobile' => $passenger['mobile'],
                'passenger_rating' => $passenger['rating'],
                'passenger_profile_pic' => $passenger['profile_pic'],
                'trip_id' => $unique_id,
                'from_latitude' => $ride['start_latitude'],
                'from_longitude' => $ride['start_longitude'],
                'from_loc' => $ride['start_location'],
                'to_latitude' => $ride['end_latitude'],
                'to_longitude' => $ride['end_longitude'],
                'to_loc' => $ride['end_location'], 'time' => $time)
        );

        $headers = array(
            'Authorization: key= AIzaSyAwaiVZcgQNq2zXkXtu_Bq_GefCehIVAKc',
            'Content-Type: application/json'
        );

        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        curl_close($ch);

        $this->insert_call_reject($driver['driver_id'], $unique_id, $result);

        return($result);
    }

    public function insert_temp_trip($user_id, $start_latitude, $start_longitude, $end_latitude, $end_longitude, $cab_id = '', $unique_id, $coupon_id = '', $pay_mode = 'by_cash', $from_date = '0000-00-00 00:00:00', $to_date = '0000-00-00 00:00:00') {
        $start_location = $this->get_location($start_latitude, $start_longitude);

        if ($end_latitude == 0 || $end_latitude == '' || $end_longitude == 0 || $end_longitude == '')
            $end_location = 'Not Specified!';
        else
            $end_location = $this->get_location($end_latitude, $end_longitude);

        $this->db->set('passenger', $user_id);
        $this->db->set('start_latitude', $start_latitude);
        $this->db->set('start_longitude', $start_longitude);
        $this->db->set('start_location', $start_location);
        $this->db->set('end_latitude', $end_latitude);
        $this->db->set('end_longitude', $end_longitude);
        $this->db->set('end_location', $end_location);
        $this->db->set('cab_id', $cab_id);
        $this->db->set('status', 1);
        $this->db->set('unique_id', $unique_id);
        $this->db->set('from_date', $from_date);
        $this->db->set('to_date', $to_date);
        $this->db->set('coupon', $coupon_id);
        $this->db->set('pay_mode', $pay_mode);        
        $this->db->insert('temp_trip');
        $trip_id = $this->db->insert_id();
        return $trip_id;
    }

    public function  get_temp_trip($unique_id, $status = 1, $driver_id = 0) {
        $this->db->select('passenger, start_latitude, start_longitude, start_location, end_latitude, end_longitude, end_location, cab_id, status, unique_id, coupon, pay_mode, order_date');
        $this->db->where('status', $status);
        $this->db->where('unique_id', $unique_id);
        $this->db->where('driver_id', $driver_id);
        $this->db->limit(1);
        $query = $this->db->get('temp_trip');

        foreach ($query->result() as $row) {
            return $row;
        }
    }

    public function get_book_history($userid) {
        $data = array();

        $this->db->select('passenger, driver_id, start_latitude, start_longitude, start_location, end_latitude, end_longitude, end_location, from_date, to_date, coupon, status, unique_id');
        $this->db->where('passenger', $userid);
        $this->db->where('from_date > NOW()');
        $this->db->order_by('from_date', 'asc');
        $query = $this->db->get('temp_trip');

        $i = 0;
        foreach ($query->result_array() as $row) {

            $data[$i]['driver_name'] = $this->get_driver_name($row['driver_id']);
            $data[$i]['trip_from'] = $row['start_location'];
            $data[$i]['trip_to'] = $row['end_location'];
            $data[$i]['start_latitude'] = $row['start_latitude'];
            $data[$i]['start_longitude'] = $row['start_longitude'];
            $data[$i]['end_latitude'] = $row['end_latitude'];
            $data[$i]['end_longitude'] = $row['end_longitude'];
            $data[$i]['from_date'] = $row['from_date'];
            $data[$i]['to_date'] = $row['to_date'];
            $data[$i]['coupon'] = $row['coupon'];
            $data[$i]['status'] = $row['status'];
            $data[$i]['unique_id'] = $row['unique_id'];
            $i++;
        }
        return $data;
    }

    public function decline_trip($unique_id) {
        $this->db->set('status', 0);
        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $this->db->update('temp_trip');

        $this->update_call_reject($unique_id);
    }

    public function is_driver_accepted($unique_id) {
        $this->db->select('driver_id, status');
        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $query = $this->db->get('temp_trip');

        foreach ($query->result() as $row) {

            if ($row->status == 1 && $row->driver_id != 0)
                return $row->driver_id;

            elseif ($row->status == 1 && $row->driver_id == 0)
                return 'checking';

            else
                return 'declined';
        }
    }

    public function set_driver_arrival($unique_id, $user_id) {
        $this->db->set('driver_arrival', 1);
        $this->db->where('driver_id', $user_id);
        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $res = $this->db->update('temp_trip');

        return $this->db->affected_rows();
    }

    public function get_driver_arrival($unique_id, $user_id) {
        $this->db->select('driver_arrival');
        $this->db->where('driver_id', $user_id);
        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $query = $this->db->get('temp_trip');

        foreach ($query->result() as $row) {
            return $row->driver_arrival;
        }
    }

    public function accept_ride_request($unique_id, $user_id) {

        $this->db->set('driver_id', $user_id);
        $this->db->where('unique_id', $unique_id);
        $this->db->where('status', 1);
        $this->db->where('driver_id', 0);
        $this->db->limit(1);
        $this->db->update('temp_trip');

        if ($this->db->affected_rows()) {
            $this->db->set('accept_status', 1);
            $this->db->set('date_of_action', date('Y-m-d H:i:s'));
            $this->db->where('trip_id', $unique_id);
            $this->db->where('driver_id', $user_id);
            $this->db->limit(1);
            $this->db->update('call_rejects');
            
            $this->db->set('status', 4);
            $this->db->where('userid', $user_id);
            $this->db->limit(1);
            $this->db->update('driver_location');

            return TRUE;
        } else {
            $this->update_call_reject($unique_id, $user_id);
            return FALSE;
        }
    }

    public function check_ride_request($unique_id) {
        $this->db->where('unique_id', $unique_id);
        $this->db->where('status', 1);
        $this->db->where('driver_id', 0);
        $count = $this->db->count_all_results('temp_trip');

        return $count;
    }

    public function remove_temp_trip($unique_id) {
        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $this->db->delete('temp_trip');
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_driver_location($userid) {
        $location = array();
        $temp = array();

        $this->db->select('latitude, longitude');
        $this->db->where('userid', $userid);
        $this->db->limit(1);
        $query = $this->db->get('driver_location');

        foreach ($query->result() as $row) {
            $location = $this->snap_to_roads($row->latitude, $row->longitude);
            if (isset($location['snappedPoints'])) {
                $temp['latitude'] = $location['snappedPoints'][0]['location']['latitude'];
                $temp['longitude'] = $location['snappedPoints'][0]['location']['longitude'];
            } else {
                $temp['latitude'] = $row->latitude;
                $temp['longitude'] = $row->longitude;
            }
            $location = $temp;
        }
        return $location;
    }

    public function get_trip_history($userid, $offset = 0, $limit = 5, $status = 'all') {
        $data = array();

        $this->db->where('passenger_id', $userid);
        if ($status == 'day') {
            $this->db->like('start_time', date('Y-m-d'), 'after');
        } elseif ($status == 'month') {
            $this->db->like('start_time', date('Y-m'), 'after');
        }
        $this->db->where('stop_time !=', '0000-00-00 00:00:00');
        $this->db->order_by('start_time', 'desc');
        $query = $this->db->get('trip_details', $limit, $offset);

        $i = 0;
        foreach ($query->result_array() as $row) {

            $data[$i]['driver_name'] = $this->get_driver_name($row['driver_id']);
            $data[$i]['trip_from'] = $row['trip_from'];
            $data[$i]['trip_to'] = $row['trip_to'];
            $data[$i]['total_distance'] = $row['total_distance'];
            $data[$i]['total_time'] = $row['total_time'];
            $data[$i]['total_fare'] = $row['total_fare'];
            $data[$i]['start_time'] = $row['start_time'];
            $data[$i]['stop_time'] = $row['stop_time'];
            $data[$i]['initial_waiting_time'] = $row['initial_waiting_time'];
            $data[$i]['additional_waiting_time'] = $row['additional_waiting_time'];
            $data[$i]['waiting_charge'] = $row['waiting_charge'];
            $data[$i]['running_charge'] = $row['running_charge'];
            $data[$i]['discount'] = $row['discount'];
            $i++;
        }
        return $data;
    }

    public function get_driver_trip($userid, $offset = 0, $limit = 5, $status = 'all') {
        $data = array();

        $this->db->where('driver_id', $userid);
        if ($status == 'day') {
            $this->db->like('start_time', date('Y-m-d'), 'after');
        } elseif ($status == 'month') {
            $this->db->like('start_time', date('Y-m'), 'after');
        }
        $this->db->where('stop_time !=', '0000-00-00 00:00:00');
        $this->db->order_by('start_time', 'desc');
        $query = $this->db->get('trip_details', $limit, $offset);

        $i = 0;
        foreach ($query->result_array() as $row) {

            $data[$i]['passenger_name'] = $this->get_passenger_name($row['passenger_id']);
            $data[$i]['trip_from'] = $row['trip_from'];
            $data[$i]['trip_to'] = $row['trip_to'];
            $data[$i]['total_distance'] = $row['total_distance'];
            $data[$i]['start_time'] = $row['start_time'];
            $data[$i]['stop_time'] = $row['stop_time'];
            $data[$i]['total_time'] = $row['total_time'];
            $data[$i]['total_fare'] = $row['total_fare'];
            $i++;
        }
        return $data;
    }

    public function get_location($lat, $lon) {

        //$geocode = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='
        //       . $lat . ',' . $lon . '&sensor=false');
        $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lon . '&sensor=false');
        $output = json_decode($geocode);
        //Here "formatted_address" is used to display the address in a user friendly format.
        return $output->results[0]->formatted_address;
    }

    public function get_driver_name($user_id) {
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

    public function get_passenger_name($user_id) {
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

    public function get_balance_amount($user_id, $type = 'passenger') {
        $balance_amount = "";

        $this->db->select('balance_amount');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        if ($type == 'driver') {
            $query = $this->db->get('driver_ewallet');
        } else {
            $query = $this->db->get('passenger_ewallet');
        }

        foreach ($query->result() as $row) {
            $balance_amount = $row->balance_amount;
        }
        return $balance_amount;
    }

    public function insert_fund_details($to_user, $amount, $amount_type, $unique_id) {
        if ($amount > 0) {
            $date = date('Y-m-d H:i:s');

            $this->db->set('from_user', $to_user);
            $this->db->set('to_user', "");
            $this->db->set('amount', $amount);
            $this->db->set('date', $date);
            $this->db->set('amount_type', $amount_type);
            $this->db->set('trip_id', $unique_id);
            $res = $this->db->insert('passenger_transactions');

            return $res;
        } else {
            return FALSE;
        }
    }

    public function deduct_balance_amount($to_user, $amount) {
        $this->db->set('balance_amount', 'balance_amount - ' . $amount, FALSE);
        $this->db->where('user_id', $to_user);
        $this->db->limit(1);
        $res = $this->db->update('passenger_ewallet');

        return $res;
    }

    public function update_payment_status($user_id, $unique_id) {
        $this->db->set('paid_status', 'yes');
        $this->db->where('passenger_id', $user_id, $unique_id);
        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $res = $this->db->update('trip_details');

        return $res;
    }

    public function update_empty_balance($user_id) {
        $this->db->set('balance_amount', 0);
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $res = $this->db->update('passenger_ewallet');

        return $res;
    }

    public function calculate_commission($user_id, $total_charge, $journey_id) {
        $insrt_comm = "";

        $percentage = $this->get_commission_percentage();

        $amount = $total_charge * ($percentage / 100);

        $updt_balance = $this->update_balance($user_id, $amount);

        if ($updt_balance) {
            $insrt_comm = $this->insert_to_ewallet($user_id, $amount, $journey_id, $total_charge);
        }

        return $insrt_comm;
    }

    public function get_commission_percentage() {
        $percentage = "";

        $this->db->select('commission_percentage');        
        $query = $this->db->get('configuration');

        foreach ($query->result() as $row) {
            $percentage = $row->commission_percentage;
        }

        return $percentage;
    }

    public function insert_to_ewallet($user_id, $amount, $journey_id = '', $trip_amount = 0) {
        if ($amount > 0) {
            $amount_type = "Trip Commission";
            $date = date('Y-m-d H:i:s');

            $this->db->set('to_user', $user_id);
            $this->db->set('amount', $amount);
            $this->db->set('date', $date);
            $this->db->set('amount_type', $amount_type);
            $this->db->set('trip_id', $journey_id);
            $this->db->set('trip_amount', $trip_amount);
            $this->db->where('id', $user_id);
            $res = $this->db->insert('driver_transactions');

            return $res;
        } else {
            return FALSE;
        }
    }

    public function update_balance($user_id, $amount) {
        $this->db->set('balance_amount', 'balance_amount + ' . $amount, FALSE);
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $res = $this->db->update('driver_ewallet');

        return $res;
    }

    public function store_passenger_rate($unique_id, $rate, $comment) {

        $driver_id = $this->driver_id_from_trip($unique_id);
        $passenger_id = $this->passenger_id_from_trip($unique_id);

        $this->db->set('user_id', $passenger_id);
        $this->db->set('rate', $rate);

        if ($comment) {
            $this->db->set('comment', $comment);
        }

        $this->db->set('rated_by', $driver_id);
        $this->db->set('unique_id', $unique_id);
        $res = $this->db->insert('passenger_rating');

        $this->db->set('status', 1);
        $this->db->where('userid', $driver_id);
        $this->db->limit(1);
        $result = $this->db->update('driver_location');

        if ($res) {
            $this->db->select_avg('rate');
            $this->db->where('user_id', $passenger_id);
            $query = $this->db->get('passenger_rating');

            foreach ($query->result() as $row) {
                $this->db->set('rating', $row->rate);
                $this->db->where('user_id', $passenger_id);
                $this->db->limit(1);
                $res = $this->db->update('passenger_details');
            }
        }

        return $res;
    }

    public function store_driver_rate($unique_id, $rate, $comment) {

        $driver_id = $this->driver_id_from_trip($unique_id);
        $passenger_id = $this->passenger_id_from_trip($unique_id);

        $this->db->set('user_id', $driver_id);
        $this->db->set('rate', $rate);

        if ($comment) {
            $this->db->set('comment', $comment);
        }

        $this->db->set('rated_by', $passenger_id);
        $this->db->set('unique_id', $unique_id);
        $res = $this->db->insert('driver_rating');

        if ($res) {
            $this->db->select_avg('rate');
            $this->db->where('user_id', $driver_id);
            $query = $this->db->get('driver_rating');

            foreach ($query->result() as $row) {
                $this->db->set('rating', $row->rate);
                $this->db->where('user_id', $driver_id);
                $this->db->limit(1);
                $res = $this->db->update('driver_details');
            }
        }

        return $res;
    }

    public function set_tripcancelling_detals($unique_id, $reason, $driver = 1) {

        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $res = $this->db->get('temp_trip');

        foreach ($res->result() as $row) {
            $this->db->set('unique_id', $row->unique_id);
            $this->db->set('order_date', $row->order_date);
            $this->db->set('passenger', $row->passenger);
            $this->db->set('driver_id', $row->driver_id);
            $this->db->set('start_latitude', $row->start_latitude);
            $this->db->set('start_longitude', $row->start_longitude);
            $this->db->set('start_location', $row->start_location);
            $this->db->set('end_latitude', $row->end_latitude);
            $this->db->set('end_longitude', $row->end_longitude);
            $this->db->set('end_location', $row->end_location);
            $this->db->set('from_date', $row->from_date);
            $this->db->set('to_date', $row->to_date);
            $this->db->set('driver_cancelled', $driver);
            $this->db->set('reason', $reason);
            $this->db->insert('trip_cancelled');

            $this->db->set('status', 0);
            $this->db->where('userid', $row->driver_id);
            $this->db->limit(1);
            $this->db->update('driver_location');
        }

        $this->remove_call_reject($unique_id);

        if ($res)
            if ($this->remove_temp_trip($unique_id))
                return TRUE;

        return FALSE;
    }

    public function remove_call_reject($trip_id) {
        $this->db->where('trip_id', $trip_id);
        $res = $this->db->delete('call_rejects');
        return $res;
    }

    public function get_driver_profile($userid) {
        $data = array();

        $this->db->select('dl.user_name, dd.*, type_name AS cab_model_name, type_short_name AS cab_short_name');
        $this->db->where('dd.user_id', $userid);
        $this->db->from('driver_login as dl');
        $this->db->join('driver_details as dd', 'dl.id = dd.user_id', 'inner');
        $this->db->join('cab_register as cr', 'dd.cab_name = cr.id', 'inner');
        $this->db->limit(1);
        $res = $this->db->get();

        foreach ($res->result() as $row) {
            $data = $row;
        }
        return $data;
    }

    public function get_transaction_details($user_id, $type = 'passenger', $limit = '', $offset = '', $from_date = '', $to_date = '') {
        $data = array();
        $total = 0;
        $admin_credit = 0;

        $this->db->select('id, amount, date, amount_type, trip_id, trip_amount');
        $this->db->where('to_user', $user_id);

        if ($from_date)
            $this->db->where('date >=', $from_date);

        if ($to_date)
            $this->db->where('date <=', $to_date);

        if ($limit && $offset >= 0)
            $this->db->limit($limit, $offset);

        if ($type = 'driver') {
            $this->db->order_by('id');
            $query = $this->db->get('driver_transactions');
        } else {
            $this->db->order_by('id');
            $query = $this->db->get('passenger_transactions');
        }

        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i]['id'] = $row->id;
            $data[$i]['amount'] = $row->amount;
            $data[$i]['amount_type'] = $row->amount_type;
            $data[$i]['date'] = $row->date;
            $data[$i]['trip_id'] = $row->trip_id;
            $data[$i]['trip_amount'] = $row->trip_amount;
            $i++;
        }

        $this->db->select('amount, amount_type');
        $this->db->where('to_user', $user_id);

        if ($from_date)
            $this->db->where('date >=', $from_date);

        if ($to_date)
            $this->db->where('date <=', $to_date);

        if ($type = 'driver')
            $query = $this->db->get('driver_transactions');
        else
            $query = $this->db->get('passenger_transactions');

        foreach ($query->result() as $row) {
            if ($row->amount_type == 'admin_credit')
                $admin_credit += $row->amount;
            $total += $row->amount;
        }

        return (array('total' => $total, 'admin_credit' => $admin_credit, 'details' => $data));
    }

    public function gcm_call_to_driver($driver_id, $unique_id, $userid) {

        $gcm_id = $this->get_driver_gcmid($driver_id);

        $time = date("Y-m-d H:i:s");
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => array($gcm_id),
            'data' => array('msg_type' => 'trip_cancel', 'trip_id' => $unique_id, 'user_id' => $userid, 'message' => 'Trip Canceled', 'time' => $time)
        );

        $headers = array(
            'Authorization: key= AIzaSyAwaiVZcgQNq2zXkXtu_Bq_GefCehIVAKc',
            'Content-Type: application/json'
        );

        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        curl_close($ch);

        return($result);
    }

    public function get_next_uniqueid() {
        $unique_id = 1000;

        $this->db->select('MAX(TRIM(LEADING "'.TRIP_PREFIX.'" FROM unique_id))+1 AS UNIQUE_ID');
        $this->db->get("temp_trip");
        $query1 = $this->db->last_query();
        
        $this->db->select('MAX(TRIM(LEADING "'.TRIP_PREFIX.'" FROM unique_id))+1 AS UNIQUE_ID');
        $this->db->get("trip_details");
        $query2 = $this->db->last_query();

        $this->db->select('MAX(TRIM(LEADING "'.TRIP_PREFIX.'" FROM unique_id))+1 AS UNIQUE_ID');
        $this->db->get("trip_cancelled");
        $query3 = $this->db->last_query();

        $query = $this->db->query($query1 . " UNION ALL " . $query2 . " UNION ALL " . $query3);

        foreach ($query->result() as $row) {
            if ($unique_id < $row->UNIQUE_ID) {
                $unique_id = $row->UNIQUE_ID;
            }
        }
        return $unique_id;
    }

    public function get_trip_details($unique_id) {
        $trip_details = array();

        // $config = $this->get_config();

        $this->db->select('total_distance, initial_waiting_time, initial_charged_time, additional_waiting_time, additional_charged_time, total_time, waiting_charge, running_charge, total_fare, discount, pay_mode, wallet_payment');
        $this->db->where('unique_id', $unique_id);
        $this->db->where('total_fare !=', 0);
        $this->db->where('stop_time !=', '0000-00-00 00:00:00');
        $this->db->limit(1);
        $query = $this->db->get('trip_details');

        foreach ($query->result() as $row) {
            $trip_details['total_distance'] = $row->total_distance;
            $trip_details['running_charge'] = $row->running_charge;
            $trip_details['total_waiting_time'] = ($row->initial_waiting_time + $row->additional_waiting_time);
            $trip_details['initial_waiting_time'] = $row->initial_waiting_time;
            $trip_details['waiting_charge'] = $row->waiting_charge;
            $trip_details['initial_free_waiting'] = $trip_details['initial_waiting_time'] - $row->initial_charged_time;
            $trip_details['total_free_waiting'] = $trip_details['total_waiting_time'] - ($row->initial_charged_time + $row->additional_charged_time);
            // if($config['initial_waiting_time'] > $row->initial_waiting_time)
            //     $trip_details['initial_free_waiting'] = $row->initial_waiting_time;
            // else
            //     $trip_details['initial_free_waiting'] = $config['initial_waiting_time'];
            // if($config['additional_waiting_time'] > $row->additional_waiting_time)
            //     $trip_details['total_free_waiting'] = $row->additional_waiting_time;
            // else
            //     $trip_details['total_free_waiting'] = $config['additional_waiting_time'];

            $trip_details['discount'] = $row->discount;
            $trip_details['total_fare'] = $row->total_fare;
            $trip_details['wallet_payment'] = $row->wallet_payment;
            $trip_details['pay_mode'] = $row->pay_mode;
            $trip_details['balance'] = $row->total_fare - $row->wallet_payment;
            $trip_details['balance_pay'] = $trip_details['balance'] > 0 ? 'yes' : 'no';
        }
        return $trip_details;
    }

    public function check_duplicate($userid, $passenger_id, $start_latitude, $start_longitude, $unique_id) {
        $status = FALSE;
        $this->db->where('unique_id', $unique_id);
        $this->db->where('driver_id', $userid);
        $this->db->where('passenger_id', $passenger_id);
        $this->db->where('start_point_latitude', $start_latitude);
        $this->db->where('start_point_longitude', $start_longitude);
        $query = $this->db->get('trip_details');

        if ($query->num_rows() > 0) {
            $status = $unique_id;
        }
        return $status;
    }

    public function driver_id_from_trip($unique_id) {
        $driver_id = '';

        $this->db->select('driver_id');
        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $query = $this->db->get('trip_details');

        foreach ($query->result() as $row) {
            $driver_id = $row->driver_id;
        }

        return $driver_id;
    }

    public function passenger_id_from_trip($unique_id) {
        $passenger_id = '';

        $this->db->select('passenger_id');
        $this->db->where('unique_id', $unique_id);
        $this->db->limit(1);
        $query = $this->db->get('trip_details');

        foreach ($query->result() as $row) {
            $passenger_id = $row->passenger_id;
        }

        return $passenger_id;
    }

    public function get_coupon_code($user_id) {
        $coupon = array();
        $date = date('Y-m-d H:i:s');
        $this->db->select('value,coupon_id');
        $this->db->where('status', 'yes');
        $this->db->where('DATE(expiry_date) >= DATE(NOW())');
        $this->db->where('assigned_to', $user_id);
        $this->db->limit(1);
        $query = $this->db->get('coupon');

        foreach ($query->result() as $row) {
            $coupon['value'] = $row->value;
            $coupon['coupon_id'] = $row->coupon_id;
        }

        return $coupon;
    }

    public function apply_coupon($user_id, $coupon_text) {
        $coupon = array();

        $this->db->select('coupon_id');
        $this->db->where('count > used_count');
        $this->db->where('expiry_date > NOW()');
        $this->db->where('coupon_text', $coupon_text);
        $this->db->from('coupon');
        $this->db->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $this->db->where('coupon_id', $row->coupon_id);
            $this->db->where('user_id', $user_id);
            $send_coupon = $this->db->count_all_results('coupon_send');

            $this->db->where('coupon_id', $row->coupon_id);
            $this->db->where('user_id', $user_id);
            $used_coupon = $this->db->count_all_results('coupon_used');

            if ($used_coupon == 0 && $send_coupon >= 1) {
                $coupon['coupon_id'] = $row->coupon_id;
            }
        }
        return $coupon;
    }

    public function get_notification($user_id, $user_type = 'passenger') {
        $noti_array = $id_array = array();

        $this->db->select('noti.id, noti_id, message, date');
        $this->db->where('noti.user_id', $user_id);

        if ($user_type == 'passenger') {

            $this->db->where('to_driver', 0);
            $this->db->where('to_passenger', 1);
        } else {

            $this->db->where('to_driver', 1);
            $this->db->where('to_passenger', 0);
        }

        $this->db->where("(DATE(expr_date) >= DATE(NOW()) OR expr_date IS NULL)");
        $this->db->order_by('noti.id', 'DESC');

        $this->db->from('notifications AS noti');
        $this->db->join('notification_history AS hist', 'noti_id = hist.id', 'INNER');
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $noti_array[] = $row;
            $id_array[] = $row['id'];
        }

        if (count($id_array) > 0)
            $this->delete_notifications($id_array);

        if ($user_type == 'passenger') {
            $temp_array = $id_array = array();

            $this->db->select('id, cp.coupon_id, coupon_code, coupon_text, amount_or_percentage, amount, expiry_date, send_date');
            $this->db->from('coupon AS cp');
            $this->db->join('coupon_send AS cp_send', 'cp.coupon_id = cp_send.coupon_id', 'INNER');
            $this->db->where('cp_send.user_id', $user_id);
            $this->db->where('cp_send.read_status', 0);
            $this->db->where('DATE(expiry_date) >= DATE(NOW())');

            $query = $this->db->get();

            foreach ($query->result() as $row) {
                $temp_array['id'] = $row->id;
                $temp_array['noti_id'] = $row->coupon_id;
                $temp_array['message'] = " Coupon Available For You!!!! \n $row->coupon_text \n Coupon Code : $row->coupon_code \n " . ($row->amount_or_percentage == 'percent' ? $row->amount . ' % of Payment Value' : 'Discount Amount : ' . $row->amount) . " \n Expiry : " . $row->expiry_date;
                $temp_array['date'] = $row->send_date;
                $noti_array[] = $temp_array;
                $id_array[] = $row->id;
            }

            if (count($id_array) > 0) {
                $this->db->set('read_status', 1);
                $this->db->where_in('id', $id_array);
                $this->db->update('coupon_send');
            }
        }

        return $noti_array;
    }

    public function delete_notifications($id_array) {

        $this->db->where_in('id', $id_array);
        $this->db->delete('notifications');

        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function get_minutes($input) {
        $a = explode(':', $input);
        $n = count($a); // number of array items
        $ms = 0; // minutes result

        if ($n > 1)
            $ms = $a[$n - 2];

        if ($n > 2)
            $ms += $a[$n - 3] * 60;

        return $ms;
    }

    public function get_about_us($user_type = 'passenger') {
        $data = array();

        $this->db->select('passenger_content, driver_content');
        $this->db->limit(1);
        $query = $this->db->get('about_us');

        foreach ($query->result() as $row) {
            if ($user_type == 'passenger')
                $data['content'] = html_entity_decode(stripslashes($row->passenger_content));
            else
                $data['content'] = html_entity_decode(stripslashes($row->driver_content));
        }

        $data['contact'] = $this->get_support_nos($user_type);

        return $data;
    }

    public function get_support_nos($user_type = 'passenger') {
        $contact = '';

        $this->db->select('passenger_support_no, driver_support_no');        
        $query = $this->db->get('configuration');

        foreach ($query->result() as $row) {
            if ($user_type == 'passenger')
                $contact = $row->passenger_support_no;
            else
                $contact = $row->driver_support_no;
        }

        return $contact;
    }

    private function create_referral_code() {
        $referral_code = '';
        $count = 1;

        do {
            $letters = 'abcefghijklmnopqrstuvwxyz12345';
            $referral_code = substr(str_shuffle($letters), 0, 6);

            $this->db->where('referral_code', $referral_code);
            $count = $this->db->count_all_results('passenger_details');
        } while ($count > 0);

        return $referral_code;
    }

    private function insert_referral_amount($referral_code, $userid) {
        $referral_point = $this->get_referral_point();
        $amount_type = "Referral Point";
        $date = date('Y-m-d H:i:s');
        $result = FALSE;
        $referrer = array('referrer_id' => 0, 'is_passenger_referrer' => 1);

        $this->db->select('pd.user_id, pl.user_name');
        $this->db->where('referral_code', $referral_code);
        $this->db->limit(1);
        $this->db->from('passenger_details AS pd');
        $this->db->join('passenger_login AS pl', 'pl.id = pd.user_id', 'INNER');
        $res = $this->db->get();

        if ($res->num_rows() > 0) {

            foreach ($res->result() as $row) {
                $referrer['referrer_id'] = $row->user_id;
                $referrer['is_passenger_referrer'] = 1;

                if ($referral_point > 0) {
                    $this->db->set('to_user', $row->user_id);
                    $this->db->set('amount', $referral_point);
                    $this->db->set('date', $date);
                    $this->db->set('amount_type', $amount_type);
                    $this->db->set('trip_id', $userid);
                    $this->db->set('trip_amount', 0);
                    $result = $this->db->insert('passenger_transactions');

                    if ($result)
                        $this->update_passenger_balance($row->user_id, $referral_point);
                }
            }
        } else {
            $this->db->select('dd.user_id, dl.user_name');
            $this->db->where('referral_code', $referral_code);
            $this->db->limit(1);
            $this->db->from('driver_details AS dd');
            $this->db->join('driver_login AS dl', 'dl.id = dd.user_id', 'INNER');
            $res1 = $this->db->get();

            foreach ($res1->result() as $row) {
                $referrer['referrer_id'] = $row->user_id;
                $referrer['is_passenger_referrer'] = 0;

                if ($referral_point > 0) {
                    $this->db->set('to_user', $row->user_id);
                    $this->db->set('amount', $referral_point);
                    $this->db->set('date', $date);
                    $this->db->set('amount_type', $amount_type);
                    $this->db->set('trip_id', $userid);
                    $this->db->set('trip_amount', 0);
                    $result = $this->db->insert('driver_transactions');

                    if ($result)
                        $this->update_balance($row->user_id, $referral_point);
                }
            }
        }
        return $referrer;
    }

    private function get_referral_point() {
        $referral_point = 0;

        $this->db->select('referral_point');        
        $query = $this->db->get('configuration');

        foreach ($query->result() as $row) {
            $referral_point = $row->referral_point;
        }

        return $referral_point;
    }

    public function update_passenger_balance($user_id, $amount) {
        $this->db->set('balance_amount', 'balance_amount + ' . $amount, FALSE);
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $res=$this->db->update('passenger_ewallet');
        return $res;
    }

    public function update_driver_balance($user_id, $amount) {
        $this->db->set('balance_amount', 'balance_amount + ' . $amount, FALSE);
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $this->db->update('passenger_ewallet');
    }

    private function create_otp() {
        $otp = '';

        do {
            $letters = '1234567890';
            $otp = substr(str_shuffle($letters), 0, 4);

            $this->db->where('otp', $otp);
            $count = $this->db->count_all_results('passenger_login');
        } while ($count > 0);

        return $otp;
    }

    public function get_user_otp($user_id) {
        $otp = '';

        $this->db->select('otp');
        $this->db->where('id', $user_id);
        $query = $this->db->get('passenger_login');

        foreach ($query->result() as $row) {
            $otp = $row->otp;
        }

        if (!$otp || trim($otp) == '') {
            $otp = $this->create_otp();

            $this->db->set('otp', $otp);
            $this->db->where('id', $user_id);
            $this->db->limit(1);
            $this->db->update('passenger_login');
        }
        return $otp;
    }

    public function send_message($recipient, $message) {

        $xml = $this->build_message_xml($recipient, $message);

        $ch = curl_init(); // cURL v7.18.1+ and OpenSSL 0.9.8j+ are required
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'https://sgw01.cm.nl/gateway.ashx',
            CURLOPT_HTTPHEADER => array('Content-Type: application/xml'),
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => $xml,
            CURLOPT_RETURNTRANSFER => TRUE));

        $response = curl_exec($ch);

        curl_close($ch);

        if ($response == '') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function build_message_xml($recipient, $message) {
        $xml = new SimpleXMLElement('<MESSAGES/>');

        $authentication = $xml->addChild('AUTHENTICATION');
        $authentication->addChild('PRODUCTTOKEN', '73e9f7ed-7dbd-4f78-8465-bd99f129e0f4');
        // $authentication->addChild('PRODUCTTOKEN', 'e8dd5ec7-c733-48f2-8a4b-9b77f36a169c');

        $msg = $xml->addChild('MSG');
        $msg->addChild('FROM', 'Ajoul');
        $msg->addChild('TO', $recipient);
        $msg->addChild('BODY', $message);

        return $xml->asXML();
    }

    public function verify_otp($user_id, $otp) {
        $userid = '';

        $this->db->select('pl.id');
        $this->db->where('pl.otp', $otp);
        $this->db->where('pd.id', $user_id);
        $this->db->from('passenger_login as pl');
        $this->db->join('passenger_details as pd', 'pl.id = pd.user_id', 'inner');
        $this->db->limit(1);
        $res = $this->db->get();

        foreach ($res->result() as $row) {
            $userid = $row->id;
        }
        return $userid;
    }

    public function update_dyn_key($user_id, $dyn_key) {

        $this->db->set('dyn_key', $dyn_key);
        $this->db->where('id', $user_id);
        $this->db->limit(1);
        $this->db->update('passenger_login');

        return $this->db->affected_rows();
    }

    public function check_dyn_key($user_id, $dyn_key) {

        $this->db->where('TRIM(dyn_key)', $dyn_key);
        $this->db->where('id', $user_id);
        $count = $this->db->count_all_results('passenger_login');

        return $count;
    }

    public function gcm_pay_message_driver($driver_id, $status, $unique_id) {

        $gcm_id = $this->get_driver_gcmid($driver_id);

        $time = date("Y-m-d H:i:s");
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => array($gcm_id),
            'data' => array('msg_type' => 'paid_status', 'status' => $status, 'trip_id' => $unique_id)
        );

        $headers = array(
            'Authorization: key= AIzaSyAwaiVZcgQNq2zXkXtu_Bq_GefCehIVAKc',
            'Content-Type: application/json'
        );

        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        curl_close($ch);

        return($result);
    }

    public function get_pay_mode($journey_id) {

        $this->db->select('pay_mode');
        $this->db->where('unique_id', $journey_id);
        $query = $this->db->get('trip_details');

        foreach ($query->result() as $row) {
            return $row->pay_mode;
        }
        return FALSE;
    }

    public function coupon_already_used($user_id, $coupon_id) {

        $this->db->where('coupon_id', $coupon_id);
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('coupon_used');
    }

    public function insert_call_reject($driver_id, $trip_id, $result) {
        $this->db->where('driver_id', $driver_id);
        $this->db->where('trip_id', $trip_id);
        $count = $this->db->count_all_results('call_rejects');

        if ($count <= 0) {
            $this->db->set('driver_id', $driver_id);
            $this->db->set('trip_id', $trip_id);
            $this->db->set('result', json_encode($result));
            $this->db->set('date_of_action', date('Y-m-d H:i:s'));
            $res = $this->db->insert('call_rejects');
            return $res;
        }
        return $count;
    }

    public function update_call_reject($trip_id, $driver_id = '') {

        $this->db->set('accept_status', 2);
        $this->db->set('date_of_action', date('Y-m-d H:i:s'));

        if ($driver_id != '')
            $this->db->where('driver_id != ', $driver_id);

        $this->db->where('trip_id', $trip_id);
        $res = $this->db->update('call_rejects');

        return $res;
    }

    public function reject_ride_request($unique_id, $user_id) {

        $this->db->set('accept_status', 2);
        $this->db->set('date_of_action', date('Y-m-d H:i:s'));
        $this->db->where('trip_id', $unique_id);
        $this->db->where('driver_id', $user_id);
        $this->db->limit(1);
        $this->db->update('call_rejects');
    }

    public function get_terms_conditions($user_type = 'passenger') {
        $data = array();

        $this->db->select('passenger_content, driver_content');
        $this->db->limit(1);
        $query = $this->db->get('terms_conditions');

        foreach ($query->result() as $row) {
            if ($user_type == 'passenger')
                $data['content'] = html_entity_decode(stripslashes($row->passenger_content));
            else
                $data['content'] = html_entity_decode(stripslashes($row->driver_content));
        }
        return $data;
    }

    public function get_call_radius() {
        $call_radius = "";

        $this->db->select('call_radius');        
        $query = $this->db->get('configuration');

        foreach ($query->result() as $row) {
            $call_radius = $row->call_radius;
        }
        return ($call_radius * 0.001);
    }

    public function driver_future_trip($userid) {
        $data = array();

        $this->db->where('driver_id', $userid);
        $this->db->where('from_date > NOW()');
        $this->db->order_by('from_date');
        $query = $this->db->get('temp_trip');

        $i = 0;
        foreach ($query->result_array() as $row) {

            $data[$i]['passenger_name'] = $this->get_passenger_name($row['passenger']);
            $data[$i]['trip_from'] = $row['start_location'];
            $data[$i]['trip_to'] = $row['end_location'];
            $data[$i]['start_time'] = $row['from_date'];
            $data[$i]['coupon'] = $row['coupon'];
            $data[$i]['pay_mode'] = $row['pay_mode'];
            $data[$i]['unique_id'] = $row['unique_id'];
            $i++;
        }
        return $data;
    }

    public function get_future_trip($unique_id, $driver_id) {
        $this->db->select('passenger, start_latitude, start_longitude, start_location, end_latitude, end_longitude, end_location, cab_id, tt.status, unique_id, coupon, pay_mode, mobile');
        $this->db->from('temp_trip AS tt');
        $this->db->join('passenger_details AS pd', 'pd.user_id = tt.passenger', 'INNER');
        $this->db->where('tt.status', 1);
        $this->db->where('unique_id', $unique_id);
        $this->db->where('driver_id', $driver_id);
        $this->db->where('from_date > NOW()');
        $this->db->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row;
        }
    }

    public function is_future_trip($unique_id, $driver_id) {
        $this->db->from('temp_trip');
        $this->db->where('status', 1);
        $this->db->where('unique_id', $unique_id);
        $this->db->where('driver_id', $driver_id);
        $this->db->where('from_date !=', "0000-00-00 00:00:00");
        return $this->db->count_all_results();
    }

    public function snap_to_roads($lat, $lon) {
        $geocode = file_get_contents('https://roads.googleapis.com/v1/snapToRoads?path=' . $lat . ',' . $lon . '&interpolate=true&key=AIzaSyBYwbWqeF0gnmQ1hi4RwyWby-XrQ9lSkbA');
        return json_decode($geocode, TRUE);
    }

    public function get_wallet_amounts() {
        $data = array();

        $this->db->where('act_status', 1);
        $query = $this->db->get('wallet_amounts');

        foreach ($query->result_array() as $row) {
            $data[] = $row['amount'];
        }
        return $data;
    }

    public function insert_payment_result($paymentid, $paymentresult, $paymentstatus, $user_id) {
        $res = '';

        $this->db->where('paymentid', $paymentid);
        $this->db->where('user_id', $user_id);
        $count = $this->db->count_all_results('payment_result');

        if ($count > 0) {
            $this->db->where('paymentid', $paymentid);
            $this->db->where('user_id', $user_id);
            $this->db->set('paymentresult', json_encode($paymentresult));
            $this->db->set('paymentstatus', $paymentstatus);
            $this->db->limit(1);
            $res = $this->db->update('payment_result');
        } else {
            $this->db->set('paymentid', $paymentid);
            $this->db->set('user_id', $user_id);
            $this->db->set('paymentresult', json_encode($paymentresult));
            $this->db->set('paymentstatus', $paymentstatus);
            $res = $this->db->insert('payment_result');
        }

        return array($count, $res);
    }

    public function insert_wallet_payment($user_id, $amount, $paymentid) {
        $this->db->set('to_user', $user_id);
        $this->db->set('amount', $amount);
        $this->db->set('date', date('Y-m-d H:i:s'));
        $this->db->set('amount_type', 'Wallet Payment');
        $this->db->set('trip_id', $paymentid);
        $this->db->set('trip_amount', 0);
        $result = $this->db->insert('passenger_transactions');

        if ($result)
            $result = $this->update_passenger_balance($user_id, $amount);

        return $result;
    }

    public function get_minimum_amount() {
        $config = array();

        $this->db->select('minimum_amount');
        $res = $this->db->get('configuration');

        foreach ($res->result_array() as $row) {
            $config = $row;
        }
        return $config;
    }

    public function get_cab_register() {
        $details = array();
        $this->db->select('type_name,type_short_name,fare_per_km,waiting_charge,minimum_charge,minimum_distance,icon');
        $this->db->where('active_status',1);
        $res = $this->db->get('cab_register');
        
        $i = 0;
        foreach ($res->result_array() as $row) {
            $details[$i]['type'] = $row['type_name'];
            $details[$i]['short_name'] = $row['type_short_name'];
            $details[$i]['fare_per_km'] = $row['fare_per_km'];
            $details[$i]['waiting_charge'] = $row['waiting_charge'];
            $details[$i]['minimum_charge'] = $row['minimum_charge'];
            $details[$i]['minimum_distance'] = $row['minimum_distance'];
            $details[$i]['image'] = $row['icon'];
            $i++;
        }
        return $details;
    }

    public function accept_ride_message($unique_id, $user_id) {
        
        $trip_details = $this->get_temp_trip($unique_id, 1, $user_id);        
        $passenger_id = $trip_details->passenger;
        $passenger_details = $this->get_passenger_details($passenger_id);
        $driver_details = $this->get_driver_details($user_id);

        $driver['name'] = $driver_details->first_name.' '.$driver_details->last_name;
        $driver['mobile'] = $driver_details->mobile1;
        $driver['rating'] = $driver_details->rating;
        $driver['cab_number'] = $driver_details->cab_number;
        $driver['cab_name'] = $this->get_driver_cab($user_id);
        $driver['order_date'] = $trip_details->order_date;
                
        $passenger['fullname'] = $passenger_details['fullname'];        
        $passenger['mobile'] = $passenger_details['mobile'];       
        $passenger['rating'] = $passenger_details['rating'];
        $passenger['order_date'] = $trip_details->order_date;
        $passenger['location'] = $trip_details->start_location;

        $message ='Ajoul-Trip Confirmed'.chr(10).'Booking Time '.$driver['order_date'].chr(10).'Driver '.$driver['name'].chr(10).'Mobile '. $driver['mobile'].chr(10).'Rating '.$driver['rating'].chr(10).'Cab Name '.  $driver['cab_name'].chr(10).'Cab Number '. $driver['cab_number'];
        
        $status = $this->send_message($passenger['mobile'], $message);

        $message ='Ajoul-Trip Confirmed'.chr(10).'Customer Name '.$passenger['fullname'].chr(10).'Mobile '. $passenger['mobile'].chr(10).'Rating '.$driver['rating'].chr(10).'Pickup From '. $passenger['location'].chr(10).'Booking Time '.$driver['order_date'];
        
        $status = $this->send_message($driver['mobile'], $message);
        
        return TRUE;
    }

    public function set_arrival_message($unique_id, $user_id) {
        
        $trip_details = $this->get_temp_trip($unique_id, 1, $user_id);        
        $passenger_id = $trip_details->passenger;
        $passenger_details = $this->get_passenger_details($passenger_id);
        $passenger_mobile = $passenger_details['mobile'];                
        
        $message ='Ajoul'.chr(10).'Your Pilot has arrived and waiting for you!';
        
        $status = $this->send_message($passenger_mobile, $message);

        return TRUE;
    }

    public function trip_complete_message($charge_data, $unique_id, $user_id) {
        
        $time_total = floor(($charge_data['total_waiting'] + $charge_data['additional_waiting']) / 60) . ':' . (($charge_data['total_waiting']+$charge_data['additional_waiting']) % 60).' Hour';
        
        $passenger_id = $this->passenger_id_from_trip($unique_id);
        $passenger_details = $this->get_passenger_details($passenger_id);
        $passenger_mobile = $passenger_details['mobile'];

        $driver_details = $this->get_driver_details($user_id);
        $driver_mobile = $driver_details->mobile1;
        
        $message = 'TripNo '.$unique_id.chr(10).'Date '.date('Y-m-d H:i:s').chr(10).'Running Charge '.$charge_data['running_charge'].chr(10).'Waiting Charge '.$charge_data['waiting_charge'].chr(10).'Waited '.$time_total;

        if($charge_data['discount_status'] == 'yes') {
            $message .= chr(10).'Discount '.$charge_data['discount'];
        }

        $message .= chr(10).'Total Charge '.$charge_data['balance_payment'];

        $status1 = $this->send_message($passenger_mobile, ($message.chr(10).'Thank you for choosing Ajoul!'));
        $status2 = $this->send_message($driver_mobile, $message);

        return TRUE;
    }

    public function get_cancel_amount() {
        $cancel_amount = 0;

        $this->db->select('cancel_amount');        
        $query = $this->db->get('configuration');

        foreach ($query->result() as $row) {
            $cancel_amount = $row->cancel_amount;
        }
        return $cancel_amount;
    }

    public function cancel_passengers($passenger_id, $value) {        
        $this->db->set("status", $value);
        $this->db->where('user_id', $passenger_id);
        $res = $this->db->update('passenger_details');

        return $res;
    }

    public function add_archive_history($userid,$unique_id,$reason) {   
        $date =date("Y-m-d H:i:s");

        $this->db->set("user_id", $userid);
        $this->db->set("unique_id", $unique_id);
        $this->db->set("reason", $reason);
        $this->db->set("date", $date);
        $res = $this->db->insert('archive_history');

        return $res;
    }

    public function get_minimum_time() {
        $minimum_time = 0;

        $this->db->select('minimum_time');        
        $query = $this->db->get('configuration');

        foreach ($query->result() as $row) {
            $minimum_time = $row->minimum_time;
        }
        
        return $minimum_time;
    }

    public function into_minutes($minimum_time) {
        
        $a = explode(':', $minimum_time);
        $n = count($a); // number of array items
        $ms = 0; // minutes result
        
        if ($n > 1) {
            $ms = $a[$n - 2] * 60;            
        }

        if ($n == 2) {
            $ms += $a[$n - 1];        
        }        
        return $ms;
    }
    
    public function locak_table() {
      
        $this->db->set('semaphore',0);
        $this->db->where('semaphore',1);
        $this->db->update('configuration');
        return $this->db->affected_rows();
    }
    
    public function un_locak_table() {
      
        $this->db->set('semaphore',1);
        return $this->db->update('configuration');
    }   

    public function locak_queue() {
      
        $this->db->set('driver_queue_status',0);
        $this->db->where('driver_queue_status',1);
        $this->db->update('configuration');
        return $this->db->affected_rows();
    }

    public function un_locak_queue() {
      
        $this->db->set('driver_queue_status',1);
        return $this->db->update('configuration');
    }

    public function get_nearest_driver_queue($latitude, $longitude, $distance, $cab_type = 0, $called_list=array()) {
        $this->load->model('Cabs_model');
        $array = $driver = array();

        $config = $this->get_config();
        
        $sql = "SELECT dl.userid,dd.engage_status, dl.latitude, dl.longitude, dl.status, dd.first_name, dd.last_name, dd.user_name, dd.cab_name, dd.cab_seat, (1.60934 * 3956 * 2 * ASIN(SQRT( POWER(SIN((" . $latitude . " -abs(latitude)) * pi()/180 / 2), 2) +COS(" . $latitude . " * pi()/180) * COS(abs(latitude) * pi()/180) *POWER(SIN((" . $longitude . " -longitude) * pi()/180 / 2), 2) ))) as distance " .
                "FROM CB_driver_location as dl INNER JOIN CB_driver_details AS dd ON dd.user_id = dl.userid " .
                "HAVING dl.status = 0 AND  dd.engage_status = 0 AND distance <= " . $distance;

        if ($cab_type != 0) {
            $sql = $sql . " AND dd.cab_name = " . $cab_type;
        }
        
        if(count($called_list)){
           $sql = $sql ." AND dl.userid NOT IN ( " . implode(',',$called_list) . " )";
        }
        
        $sql = $sql . " ORDER BY distance LIMIT 1";
        echo $sql;die();
        $res = $this->db->query($sql, FALSE);
       
        foreach ($res->result() as $row) {
            $min_fare = $this->Cabs_model->getCabsList($row->cab_name, TRUE);
            $expected = round((60 * $row->distance / $config['km_per_hour']), 0);

            if (count($min_fare) > 0) {
                $array['driver_id'] = $row->userid;
                $array['latitude'] = $row->latitude;
                $array['longitude'] = $row->longitude;
                $array['distance'] = $row->distance;
                $array['expected'] =  ($expected ? $expected.'min': '1min');
                $array['cab_id'] = $row->cab_name;
                $array['min_fare'] = $min_fare[0]['minimum_charge'];
                $array['cab_name'] = $min_fare[0]['type_short_name'];
                $array['cab_image'] = $min_fare[0]['icon'];
                $array['cab_seat'] = $row->cab_seat;
                $array['driver_name'] = $row->first_name . ' ' . $row->last_name;
                $array['user_name'] = $row->user_name;        
            }
        }
        return $array;
    }

    public function set_engaged_status($diver_id) {
        
        $this->db->set('engage_status',1);
        $this->db->where('user_id',$diver_id);
        $this->db->update('driver_details');
        return $this->db->affected_rows();
    }

    public function unset_engaged_status($diver_id) {
   
        $this->db->set('engage_status',0);
        $this->db->where('user_id',$diver_id);
        return $this->db->update('driver_details');    
    }

}
