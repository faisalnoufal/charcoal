<?php

require_once('Core_Model.php');

class Surge_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

//    function getGeoCords() {
//        $data = array();
//
//
//        $this->db->select('x,y');
//        $query = $this->db->get('geocords');
//        foreach ($query->result_array() as $row) {
//            array_push($data, $row);
//        }
//
//        return $data;
//    }

//    function insertSurgeDetails($pieces) {
//        //$this->db->truncate('geocords');
//        for ($i = 0; $i <= (count($pieces) / 2); $i += 2) {
//
//            $this->db->set('y', $pieces[$i]);
//            $this->db->set('x', $pieces[$i + 1]);
//            $query = $this->db->insert('geocords');
//        }
//
//        return true;
//    }

    function areaList() {
        $data = array();
        $this->db->select('name,id');
        $query = $this->db->get('surge');
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i]['id'] = $row->id;
            $data[$i]['name'] = $row->name;
            $i++;
        }
        return $data;
    }

    function getAreaDetails($id) {
        $data = array();
        $this->db->where('id', $id);
        $query = $this->db->get('surge');
        foreach ($query->result() as $row) {
            $data['id'] = $row->id;
            $data['name'] = $row->name;
            $data['latitude'] = $row->latitude;
            $data['longitude'] = $row->longitude;
            $data['radious'] = $row->radious;
        }
        return $data;
    }

    function deleteSurge($id) {
        $this->db->where('id', $id);
        $this->db->delete('surge');
        return true;
    }

    function getSurgeDetails($id = '') {
        $data = array();

        $this->db->select('id,name,latitude,longitude,radious');
        if ($id != '') {
            $this->db->where('id', $id);
        }
        $res = $this->db->get('surge');
        $i = 0;
        foreach ($res->result() as $row) {
            $data[$i]['id'] = $row->id;
            $data[$i]['name'] = $row->name;
            $data[$i]['latitude'] = $row->latitude;
            $data[$i]['longitude'] = $row->longitude;
            $data[$i]['radious'] = $row->radious;
            $i++;
        }
        return $data;
    }

    function insertSurgeDetails($surge_name, $surge_radious, $surge_lat, $surge_lng) {

        $data = array(
            'name' => $surge_name,
            'latitude' => $surge_lat,
            'longitude' => $surge_lng,
            'radious' => $surge_radious * 0.000621371
        );

        $res = $this->db->insert('surge', $data);
        return $res;
    }

//    function getDataFromFT() {
//
//        $FT_TableID = '19lLpgsKdJRHL2O4fNmJ406ri9JtpIIk8a-AchA';
//        $key = 'AIzaSyCiF1lcWC-9n-UZi7Yx6wywb6xuRyAjUxU';
//        $CountryName = "India";
//        $query = urlencode("SELECT json_4326  FROM " . $FT_TableID . " WHERE name_0 = '" . $CountryName . "' ORDER by 'name_1'");
//        $url = 'http://www.google.com/fusiontables/gvizdata?tq=' . $query . '&key=' . $key;
//
//
//
//        // Open connection
//        $ch = curl_init();
//
//        // Set the url, number of POST vars, POST data
//        curl_setopt($ch, CURLOPT_URL, $url);
//        //curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//        // Disabling SSL Certificate support temporarly
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//
//        // Execute post
//        $result = curl_exec($ch);
//        curl_close($ch);
//        print_r($result);
//        die();
//
////        if ($result === FALSE) {
////            //die('Curl failed: ' . curl_error($ch));
////        } else {
////
////            print_r($result);
////        }
//    }

    public function driversInSurge($latitude, $longitude, $radious) {
        $driver = array();

        $sql = "SELECT dl.userid, dl.latitude, dl.longitude, dd.first_name, dd.last_name,dd.mobile1, dd.email,dd.user_name,(3956 * 2 * ASIN(SQRT( POWER(SIN((" . $latitude . " -abs(latitude)) * pi()/180 / 2), 2) +COS(" . $latitude . " * pi()/180) * COS(abs(latitude) * pi()/180) *POWER(SIN((" . $longitude . " -longitude) * pi()/180 / 2), 2) ))) as distance " .
                "FROM CB_driver_location as dl INNER JOIN CB_driver_details AS dd ON dd.user_id = dl.userid " .
                "HAVING distance <= " . $radious . " ORDER BY distance";

        $res = $this->db->query($sql, FALSE);

        $i = 0;
        foreach ($res->result() as $row) {

            $driver[$i]['email'] = $row->email;
            $driver[$i]['mobile'] = $row->mobile1;
            $driver[$i]['driver_id'] = $row->userid;
            $driver[$i]['latitude'] = $row->latitude;
            $driver[$i]['longitude'] = $row->longitude;
            $driver[$i]['driver_name'] = $row->first_name . ' ' . $row->last_name;
            $driver[$i]['user_name'] = $row->user_name;
            $driver[$i]['status'] = $this->getDriverStatus($row->userid);
            $i++;

        }
        return $driver;
    }
    public function customersInSurge($latitude, $longitude, $radious) {
        $driver = array();

        $sql = "SELECT dl.userid, dl.status ,dl.latitude, dl.longitude, dd.fullname, dd.email,dd.mobile,(3956 * 2 * ASIN(SQRT( POWER(SIN((" . $latitude . " -abs(latitude)) * pi()/180 / 2), 2) +COS(" . $latitude . " * pi()/180) * COS(abs(latitude) * pi()/180) *POWER(SIN((" . $longitude . " -longitude) * pi()/180 / 2), 2) ))) as distance " .
                "FROM CB_passenger_location as dl INNER JOIN CB_passenger_details AS dd ON dd.user_id = dl.userid " .
                "HAVING distance <= " . $radious . " ORDER BY distance";

        $res = $this->db->query($sql, FALSE);

        $i = 0;
        foreach ($res->result() as $row) {
             $driver[$i]['email'] = $row->email;
            $driver[$i]['mobile'] = $row->mobile;
            $driver[$i]['driver_id'] = $row->userid;
            $driver[$i]['latitude'] = $row->latitude;
            $driver[$i]['longitude'] = $row->longitude;
            $driver[$i]['driver_name'] = $row->fullname;
            //$driver[$i]['user_name'] = $row->user_name;
            $driver[$i]['status'] = $row->status;
            $i++;

        }
        return $driver;
    }

    function getDriverStatus($id) {
        $status='';
        $this->db->select('status');
        $this->db->where('userid',$id);
        $query = $this->db->get('driver_location');
        foreach ($query->result() as $row) {
            $status= $row->status;
        }
        return $status;
    }
   
}
