<?php

require_once('Core_Model.php');

class Trips_model extends Core_Model {

    function __construct() {
        parent::__construct();
    }

    function getActiveTripDetails($user_type = 'driver', $user) {

        $data = array();

        if ($user_type == 'passenger') {
            $this->db->where('passenger_id', $user);
        } else {
            $this->db->where('driver_id', $user);
        }
        $this->db->where('stop_time', '0000-00-00 00:00:00');
        $this->db->order_by("start_time", 'desc');
        $query = $this->db->get('trip_details');
        
        foreach ($query->result_array() as $row) {
            $driver_latlon = $this->getDiverLatLon($row['driver_id']);
            $data['id'] = $row['id'];
            $data['driver_id'] = $row['driver_id'];
            $data['driver_name'] = $this->getDriverName($row['driver_id']);
            $data['cab_type'] = $this->getCabName($row['cab_type']);
            $data['passenger_id'] = $row['passenger_id'];
            $data['passenger_name'] = $this->getPassengerName($row['passenger_id']);
            $data['start_point_latitude'] = $row['start_point_latitude'];
            $data['start_point_longitude'] = $row['start_point_longitude'];
            $data['driver_current_latitude'] = isset($driver_latlon['lat']) ? $driver_latlon['lat'] : 0;
            $data['driver_current_longitude'] = isset($driver_latlon['lon']) ? $driver_latlon['lon'] : 0;            
            $data['trip_from'] = $row['trip_from'];
            $data['start_time'] = $row['start_time'];            
            $data['trip_to'] = $row['trip_to'];            
        }
        return $data;
    }

    function getCabName($id) 
    {        
        $name = '';

        if($id) 
        {
            $this->db->select('type_name, type_short_name');
            $this->db->where('id', $id);
            $query = $this->db->get('cab_register');

            foreach ($query->result() as $row) 
            {
                $name = $row->type_short_name;
            }
        }
        return $name;
    }

    function getTripDetails($user_type = 'driver', $user) {

        $data = array();

        if ($user_type == 'passenger') {
            $this->db->where('passenger_id', $user);
        } else {
            $this->db->where('driver_id', $user);
        }
        $this->db->where('stop_time !=', '0000-00-00 00:00:00');
        $this->db->order_by("start_time", 'desc');
        $query = $this->db->get('trip_details');

        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['driver_id'] = $row['driver_id'];
            $data[$i]['driver_name'] = $this->getDriverName($row['driver_id']);
            $data[$i]['cab_type'] = $this->getCabName($row['cab_type']);
            $data[$i]['passenger_id'] = $row['passenger_id'];
            $data[$i]['passenger_name'] = $this->getPassengerName($row['passenger_id']);
            $data[$i]['start_point_latitude'] = $row['start_point_latitude'];
            $data[$i]['start_point_longitude'] = $row['start_point_longitude'];
            $data[$i]['trip_from'] = $row['trip_from'];
            $data[$i]['start_time'] = $row['start_time'];
            $data[$i]['end_point_latitude'] = $row['end_point_latitude'];
            $data[$i]['end_point_longitude'] = $row['end_point_longitude'];
            $data[$i]['trip_to'] = $row['trip_to'];
            $data[$i]['stop_time'] = $row['stop_time'];
            $data[$i]['estimated_distance'] = $row['estimated_distance'];
            $data[$i]['total_distance'] = $row['total_distance'];
            $data[$i]['total_time'] = $row['total_time'];
            $data[$i]['initial_waiting'] = $row['initial_waiting_time'];
            $data[$i]['initial_charged'] = $row['initial_charged_time'];
            $data[$i]['additional_waiting'] = $row['additional_waiting_time'];
            $data[$i]['additional_charged'] = $row['additional_charged_time'];
            $data[$i]['total_fare'] = $row['total_fare'];
            $data[$i]['unique_id'] = $row['unique_id'];
            $i++;
        }
        return $data;
    }

    function getTripList() {
        $data = array();
        
        $this->db->where('stop_time !=', '0000-00-00 00:00:00');
        $this->db->order_by("start_time", 'desc');
        $this->db->limit(100);
        $query = $this->db->get('trip_details');

        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['driver_id'] = $row['driver_id'];
            $data[$i]['driver_name'] = $this->getDriverName($row['driver_id']);
            $data[$i]['cab_type'] = $this->getCabName($row['cab_type']);
            $data[$i]['passenger_id'] = $row['passenger_id'];
            $data[$i]['passenger_name'] = $this->getPassengerName($row['passenger_id']);
            $data[$i]['start_point_latitude'] = $row['start_point_latitude'];
            $data[$i]['start_point_longitude'] = $row['start_point_longitude'];
            $data[$i]['trip_from'] = $row['trip_from'];
            $data[$i]['start_time'] = $row['start_time'];
            $data[$i]['end_point_latitude'] = $row['end_point_latitude'];
            $data[$i]['end_point_longitude'] = $row['end_point_longitude'];
            $data[$i]['trip_to'] = $row['trip_to'];
            $data[$i]['stop_time'] = $row['stop_time'];
            $data[$i]['estimated_distance'] = $row['estimated_distance'];
            $data[$i]['total_distance'] = $row['total_distance'];
            $data[$i]['total_time'] = $row['total_time'];
            $data[$i]['initial_waiting'] = $row['initial_waiting_time'];
            $data[$i]['initial_charged'] = $row['initial_charged_time'];
            $data[$i]['additional_waiting'] = $row['additional_waiting_time'];
            $data[$i]['additional_charged'] = $row['additional_charged_time'];
            $data[$i]['total_fare'] = $row['total_fare'];
            $data[$i]['unique_id'] = $row['unique_id'];
            $i++;
        }
        return $data;
    }

    function getPassengerName($user_id) {
        $name = '';

        $this->db->select('fullname');
        $this->db->where('user_id', $user_id);
        $this->db->where('verified', 1);
        $this->db->limit(1);

        $query = $this->db->get('passenger_details');

        foreach ($query->result() as $row) {
            $name = $row->fullname;
        }
        return $name;
    }

    function getDriverName($user_id) {
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

    function getDiverLatLon($driver_id) {
        $data = array();

        $this->db->select('latitude,longitude');
        $this->db->where('userid', $driver_id);
        $this->db->limit(1);
        $query = $this->db->get('driver_location');
        foreach ($query->result() as $row) {
            $data['lat'] = $row->latitude;
            $data['lon'] = $row->longitude;
        }
        return $data;
    }

    function getTripDetail($trip_id) {

        $data = array();
        $this->db->where('id', $trip_id);
        $this->db->limit(1);
        $query = $this->db->get('trip_details');
        foreach ($query->result_array() as $row) {
            $driver_latlon = $this->getDiverLatLon($row['driver_id']);
            
            $data['driver_name'] = $this->getDriverName($row['driver_id']);
            $data['passenger_name'] = $this->getPassengerName($row['passenger_id']);
            $data['cab_type'] = $this->getCabName($row['cab_type']);
            $data['start_point_latitude'] = $row['start_point_latitude'];
            $data['start_point_longitude'] = $row['start_point_longitude'];
            $data['trip_from'] = $row['trip_from'];
            $data['end_point_latitude'] = isset($driver_latlon['lat']) ? $driver_latlon['lat'] : 0;
            $data['end_point_longitude'] = isset($driver_latlon['lon']) ? $driver_latlon['lon'] : 0;
            $data['trip_to'] = $row['trip_to'];
            $data['total_distance'] = $row['total_distance'];
            $data['total_time'] = $row['total_time'];
            $data['initial_waiting'] = $row['initial_charged_time'];
            $data['additional_waiting'] = $row['additional_charged_time'];
            $data['total_fare'] = $row['total_fare'];
            $data['start_time'] = $row['start_time'];
            $data['stop_time'] = $row['stop_time'];
            $data['unique_id'] = $row['unique_id'];
        }
        return $data;
    }
    function getTripListDetail($trip_id) {

        $data = array();
        $this->db->where('id', $trip_id);
        $this->db->limit(1);
        $query = $this->db->get('trip_details');
        foreach ($query->result_array() as $row) {
            $driver_latlon = $this->getDiverLatLon($row['driver_id']);
            
            $data['driver_name'] = $this->getDriverName($row['driver_id']);
            $data['passenger_name'] = $this->getPassengerName($row['passenger_id']);
            $data['cab_type'] = $this->getCabName($row['cab_type']);
            $data['start_point_latitude'] = $row['start_point_latitude'];
            $data['start_point_longitude'] = $row['start_point_longitude'];
            $data['trip_from'] = $row['trip_from'];
            $data['end_point_latitude'] = $row['end_point_latitude'];
            $data['end_point_longitude'] = $row['end_point_longitude'];
            $data['trip_to'] = $row['trip_to'];
            $data['total_distance'] = $row['total_distance'];
            $data['start_time'] = $row['start_time'];
            $data['stop_time'] = $row['stop_time'];
            $data['total_distance'] = $row['total_distance'];
            $data['total_time'] = $row['total_time'];
            $data['total_fare'] = $row['total_fare'];
            $data['initial_waiting'] = $row['initial_waiting_time'];
            $data['additional_waiting'] = $row['additional_waiting_time'];
            $data['unique_id'] = $row['unique_id'];
        }
        return $data;
    }

    function getUserList($user_type = 'driver') {
        $data = array();

        if ($user_type == 'driver') {
            $this->db->select('user_id,first_name,last_name');
            $query = $this->db->get('driver_details');
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data[$i]['id'] = $row['user_id'];
                $data[$i]['name'] = $row['first_name'] . ' ' . $row['last_name'];
                $i++;
            }
        } else {
            $this->db->select('user_id,fullname');
            $this->db->where('verified', 1);
            $query2 = $this->db->get('passenger_details');
            $j = 0;
            foreach ($query2->result_array() as $row) {
                $data[$j]['id'] = $row['user_id'];
                $data[$j]['name'] = $row['fullname'];
                $j++;
            }
        }

        return $data;
    }

    function getUsername($user_type = 'driver', $id) {

        $username = '';

        if ($user_type == 'driver') {
            $this->db->select('first_name,last_name');
            $this->db->where('user_id', $id);
            $this->db->limit(1);
            $query = $this->db->get('driver_details');
            foreach ($query->result_array() as $row) {
                $username = $row['first_name'] . ' ' . $row['last_name'];
            }
        } else {
            $this->db->select('fullname');
            $this->db->where('user_id', $id);
            $this->db->where('verified', 1);
            $query2 = $this->db->get('passenger_details');

            $this->db->limit(1);
            foreach ($query2->result_array() as $row) {
                $username = $row['fullname'];
            }
        }

        return $username;
    }

    function getOngoingTrips() {

        $data = array();

        $this->db->where('stop_time', '0000-00-00 00:00:00');
        $this->db->order_by("start_time", 'desc');
        $query = $this->db->get('trip_details');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $driver_latlon = $this->getDiverLatLon($row['driver_id']);
            $data[$i]['id'] = $row['id'];
            $data[$i]['unique_id'] = $row['unique_id'];
            $data[$i]['driver_id'] = $row['driver_id'];
            $data[$i]['driver_name'] = $this->getDriverName($row['driver_id']);
            $data[$i]['cab_type'] = $this->getCabName($row['cab_type']);
            $data[$i]['passenger_id'] = $row['passenger_id'];
            $data[$i]['passenger_name'] = $this->getPassengerName($row['passenger_id']);
            $data[$i]['start_point_latitude'] = $row['start_point_latitude'];
            $data[$i]['start_point_longitude'] = $row['start_point_longitude'];
            $data[$i]['driver_current_latitude'] = isset($driver_latlon['lat']) ? $driver_latlon['lat'] : 0;
            $data[$i]['driver_current_longitude'] = isset($driver_latlon['lon']) ? $driver_latlon['lon'] : 0;
            $data[$i]['trip_from'] = $row['trip_from'];
            $data[$i]['trip_to'] = $row['trip_to'];
            $data[$i]['start_time'] = $row['start_time'];
            $i++;
        }
        return $data;
    }

    function getTodaysBookings() {
        $date = date('Y-m-d');
        $data = array();
        $i = 0;        

        $this->db->where('status != ', 0);
        $this->db->like('from_date', $date);
        $res2 = $this->db->get('temp_trip');

        foreach ($res2->result() as $row) {
            $data[$i]['type'] = 'Booked';
            
            if($row->driver_arrival == 1)
                $data[$i]['type'] .= ', Driver Reached Pickup Site.';

            $data[$i]['unique_id'] = $row->unique_id;
            $data[$i]['order_date'] = $row->order_date;
            $data[$i]['driver_id'] = $row->driver_id;
            $data[$i]['driver'] = $this->getDriverName($row->driver_id);
            $data[$i]['passenger_id'] = $row->passenger;
            $data[$i]['passenger'] = $this->getPassengerName($row->passenger);            
            $data[$i]['trip_from'] = $row->start_location;
            $data[$i]['start_time'] = $row->from_date;            
            $data[$i]['trip_to'] = $row->end_location;

            if($row->to_date == "0000-00-00 00:00:00")
                $data[$i]['stop_time'] = 'Not Specified';
            else
                $data[$i]['stop_time'] = $row->to_date;

            $i = $i+1;
        }

        return $data;        
    }

    function getTodaysCancelledTrips($all = 0) {    
        $date = date('Y-m-d');
        $data = array();
        $i = 0;

        if($all == 0) {
            $this->db->like('cancelled_date', $date);
        }

        $res = $this->db->get('trip_cancelled');
        
        foreach ($res->result() as $row) {
            $data[$i]['unique_id'] = $row->unique_id;
            $data[$i]['order_date'] = $row->order_date;
            $data[$i]['driver_id'] = $row->driver_id;
            $data[$i]['driver'] = $this->getDriverName($row->driver_id);
            $data[$i]['passenger_id'] = $row->passenger;
            $data[$i]['passenger'] = $this->getPassengerName($row->passenger);
            $data[$i]['trip_from'] = $row->start_location;
            $data[$i]['start_time'] = $row->from_date;
            $data[$i]['trip_to'] = $row->end_location;

            if($row->driver_cancelled == 1)
                $data[$i]['cancelled_by'] = 'Pilot';
            else if($row->driver_cancelled == 2)
                $data[$i]['cancelled_by'] = 'Admin';
            else
                $data[$i]['cancelled_by'] = 'Passenger';

            $data[$i]['reason'] = $row->reason;
            $i++;
        }        

        return $data;            
    }

    function getCallRejectSummary() {    
        $i = 0;
        $data = array();

        $this->db->select('count(cr.driver_id) AS count_driver, td.*');
        $this->db->from('trip_details AS td');
        $this->db->join('call_rejects AS cr', 'td.unique_id = cr.trip_id', 'LEFT');
        $this->db->where('cr.accept_status != ', 0);
        $this->db->group_by('td.unique_id');
        $this->db->order_by('td.unique_id', 'DESC');
        $res = $this->db->get();
        
        foreach ($res->result() as $row) {
            $data[$i]['unique_id'] = $row->unique_id;
            $data[$i]['order_date'] = $row->order_date;
            $data[$i]['driver_id'] = $row->driver_id;
            $data[$i]['driver'] = $this->getDriverName($row->driver_id);
            $data[$i]['passenger_id'] = $row->passenger_id;
            $data[$i]['passenger'] = $this->getPassengerName($row->passenger_id);
            $data[$i]['count_drivers'] = ($row->count_driver <= 0 ? 0 : $row->count_driver);
            $i++;
        }
        return $data;            
    }

    function getCallRejectReport($unique_id) {    
        $i = 0;
        $data = array();

        $this->db->select('driver_id, accept_status, dd.*');
        $this->db->from('call_rejects AS cr');
        $this->db->join('driver_details AS dd', 'dd.user_id = cr.driver_id', 'INNER');
        $this->db->where('trip_id', $unique_id);
        $this->db->where('accept_status != ', 0);
        $this->db->order_by('accept_status');
        $res = $this->db->get();
        
        foreach ($res->result() as $row) {
            $data[$i]['user_id'] = $row->driver_id;
            $data[$i]['fullname'] = $row->first_name . ' ' . $row->last_name;
            $data[$i]['accept_status'] = $row->accept_status == 1 ? 'YES' : 'NO';            
            $data[$i]['rating'] = $row->rating;
            $i++;
        }
        return $data;            
    }

}
