<?php

$url = 'http://ajoul.com/sites/admin/cron/setTemperature';


get_data($url);

function get_data($url) {

    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);

   //print_r($data);
   //die();
    curl_close($ch);
    return $data;
}

?>