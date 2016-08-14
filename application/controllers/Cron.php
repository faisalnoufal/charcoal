<?php

class Cron extends Core_Controller {

    function __construct() {
        parent::__construct();
    }

    public function setTemperature() {
        $ip = file_get_contents("http://ipecho.net/plain");
        $details = json_decode(file_get_contents("http://freegeoip.net/json/" . $ip));
        $country_details['country'] = $details->country_name;
        $country_details['country_code'] = $details->country_code;
        $country_details['region'] = $details->region_name;
        $country_details['region_code'] = $details->region_code;
        $country_details['city'] = $details->city;

        if ($country_details['region'] == "" && $country_details['region_code'] == "")
            $temp = "http://api.openweathermap.org/data/2.5/forecast/daily?q=$country_details[country],$country_details[country_code]&appid=44db6a862fba0b067b1930da0d769e98";
        else
            $temp = "http://api.openweathermap.org/data/2.5/forecast/daily?q=$country_details[region],$country_details[region_code]&appid=44db6a862fba0b067b1930da0d769e98";
        $json = file_get_contents($temp);
        $weather = json_decode($json, true);
        for ($i = 0; $i <= 5; $i++) {
            $date_temp_arr[$i]['date'] = strtoupper(substr(date("l", $weather['list'][$i]['dt']), 0, 3));
            $date_temp_arr[$i]['temp'] = $weather['list'][$i]['temp']['day'] - 273.15;
            $date_temp_arr[$i]['country'] = $country_details['country'];
            $date_temp_arr[$i]['region'] = $country_details['region'];
        }
        $add_det = $this->Cron_model->insertToTmpDetails($date_temp_arr, $i);
        $current_temp = $weather['list'][0]['temp']['day'] - 273.15;
        $this->set('current_temp', $current_temp);
        $this->set('date_temp_arr', $date_temp_arr);
        $this->set('country_details', $country_details);
    }

    public function tripBookedNotification() {
        $trip_list = array();
        $trip_list = $this->Cron_model->getSheduledTrips();
        if ($trip_list) {
            foreach ($trip_list as $row) {
                $this->Cron_model->gcmNotificationToDriver($row);
            }
        }
       
    }
    
    public function show_keys() {
	$app_key = 'Infinite_MLM_Cab_Management_System@passenger_login';
        
        echo 'passenger = ' . MD5($app_key) . '<br>';
            
	$app_key = 'Infinite_MLM_Cab_Management_System@driver_login';
        
        echo 'driver = ' . MD5($app_key) . '<br>';            
    }

}
