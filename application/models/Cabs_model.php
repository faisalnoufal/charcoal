<?php

require_once('Core_Model.php');

class Cabs_model extends Core_Model {

    function __construct() 
    {
        parent::__construct();
    }


    function getCabsList($id='', $active=false) 
    {        
        $array = array();

        $this->db->select('id, type_name, type_short_name, icon, active_status, fare_per_km, waiting_charge, minimum_charge, minimum_later, minimum_distance');

        if($id != '')
        {
            $this->db->where('id', $id);
        }

        if($active != false)
        {
            $this->db->where('active_status', $active);
        }

        $query = $this->db->get('cab_register');
        
        foreach ($query->result_array() as $row) 
        {
            $array[] = $row;
        }

        return $array;
    }


    function updateCabsList($type_name, $short_name, $file_name, $id='') 
    {        
        $res = false;
        
        $this->db->set('type_name', $type_name);
        $this->db->set('type_short_name', $short_name);

        if($id != '')
        {
            if($file_name != 'cab.png')
                $this->db->set('icon', $file_name);
                
            $this->db->where('id', $id);
            $res = $this->db->update('cab_register');
        }
        else
        {
            $this->db->set('icon', $file_name);
            $res = $this->db->insert('cab_register');   
        }

        return $res;
    }


    function checkCabTypeExist($type_name, $id='') 
    {                       
        $this->db->where('type_name', $type_name);

        if($id != '')
        {
            $this->db->where("id != ", $id);
        }
        
        $this->db->from('cab_register');
        return $this->db->count_all_results();
    }


    function changeActiveState($id) 
    {   
        $res = '';
        $active_status = 0;
        $count = 0;
        $msg = '';

        $this->db->select('active_status');
        $this->db->where('id', $id);
        $query = $this->db->get('cab_register');

        foreach ($query->result() as $row) 
        {
            $active_status = $row->active_status;
        }
        
        if($active_status == 0) 
        {            
            $this->db->set('active_status', 1);
            $this->db->where('id', $id);        
            $res = $this->db->update('cab_register');
        }
        else 
        {
            $this->db->where('cab_name', $id);
            $this->db->where('status', 'yes');
            $count = $this->db->count_all_results('driver_details');

            if($count) {
                $msg = 'Pilot active with Cab Type, Can not deactivate!!';
            
            } else {
                $this->db->set('active_status', 0);
                $this->db->where('id', $id);        
                $res = $this->db->update('cab_register');
            }
        }

        if($res)
            return $active_status;
        else
            return array($active_status, $msg);
    }


    function updateCabsFare($fare_per_km, $minimum_charge, $minimum_later, $minimum_distance, $waiting_charge, $cab_id) 
    {           
        $this->db->set('fare_per_km', $fare_per_km);
        $this->db->set('waiting_charge', $waiting_charge);
        $this->db->set('minimum_charge', $minimum_charge);
        $this->db->set('minimum_later', $minimum_later);
        $this->db->set('minimum_distance', $minimum_distance);
        $this->db->where('id', $cab_id);
        $res = $this->db->update('cab_register');

        return $res;
    }


    function addCabsDetails($cab_id, $cab_model_name, $cab_reg_details, $image_name, $status, $seating_capacity){
        
        $this->db->set('cab_id', $cab_id);
        $this->db->set('cab_model_name', $cab_model_name);
        $this->db->set('cab_registration_details', $cab_reg_details);
        $this->db->set('status', $status);
        $this->db->set('image_name', $image_name);
        $this->db->set('seating_capacity', $seating_capacity);
        $res = $this->db->insert('cab_details');   

        return $res; 
    }


    function getCabsDetailsList($id=""){
        $array = array();

        $this->db->select('id,cab_id, cab_model_name, cab_registration_details, status,image_name, seating_capacity');

        if($id!="")
            $this->db->where('id', $id);

        $query = $this->db->get('cab_details');
        
        foreach ($query->result_array() as $row) 
        {
            $array[] = $row;
        }

        return $array;
    }


    function changeStatus($edit_id,$status){
        
        $this->db->set('status', $status);
        $this->db->where('id',$edit_id);
        $res = $this->db->update('cab_details'); 

        return $res;   
    }


    function updateCabModelList($edit_id, $cab_id, $cab_model_name, $cab_reg_details, $image_name, $seating_capacity){    

        $this->db->set('cab_id', $cab_id);
        $this->db->set('image_name', $image_name);
        $this->db->set('cab_model_name', $cab_model_name);
        $this->db->set('cab_registration_details', $cab_reg_details);
        $this->db->set('seating_capacity', $seating_capacity);
        $this->db->where('id',$edit_id);
        $res = $this->db->update('cab_details');   

        return $res;
    }


    function getCabType($cab_id){
        $type_name = "";

        $this->db->select('type_short_name');
        $this->db->where('id', $cab_id);
        $query = $this->db->get('cab_register');

        foreach ($query->result_array() as $row) 
        {
            $type_name = $row;
        }

        return $type_name;
    }

}
