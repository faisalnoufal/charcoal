<?php

require_once('Core_Model.php');

class Cleanup_model extends Core_Model {

    public function clean() {
        $tables = array(            
            'call_rejects',
            'configuration',
            'coupon',
            'coupon_send',
            'coupon_used',            
            'driver_details',
            'driver_ewallet',
            'driver_location',
            'driver_login',
            'driver_rating',
            'driver_transactions',
            'message_details',
            'notifications',
            'notification_history',
            'passenger_details',
            'passenger_ewallet',
            'passenger_location',
            'passenger_login',
            'passenger_message_details',
            'passenger_rating',
            'passenger_transactions',
            'surcharge_details',
            'surge',
            'temp_trip',
            'trip_cancelled',
            'trip_details'
        );
        $this->db->trans_begin();
        
       
        foreach ($tables as $table) {
             $this->db->truncate($table);
        }
       

        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {

            $config = array(
                'id' => 1,
                'commission_percentage' => 0,
                'initial_waiting_time' => 10,
                'additional_waiting_time' => 10,
                'passenger_support_no' => '',
                'driver_support_no' => '',
                'km_per_hour' => 80
            );

            $this->db->insert('configuration', $config);
            $this->db->trans_commit();
            return true;
        }
    }

}
