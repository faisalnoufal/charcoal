<?php

require_once('Core_Model.php');

class Surcharge_model extends Core_Model {

    function __construct() 
    {
        parent::__construct();
    }
    function addSurchargeList($surcharge, $amount,$status) 
    {        
        $res = false;
        $this->db->set('surcharge', $surcharge);
        $this->db->set('amount', $amount);
        $this->db->set('status', $status);
        $res = $this->db->insert('surcharge_details'); 
        return $res;
    }
    function getCabSurchargeList($id=""){
      $array = array();
      $this->db->select('id, surcharge, amount, status');
      if($id!="")
      $this->db->where('id',$id);   
      $query = $this->db->get('surcharge_details');
      
        foreach ($query->result_array() as $row) 
        {
            $array[] = $row;
        }

        return $array;
    }
    function updateSurchargeList($edit_id,$surcharge,$amount){
        $res = false;
        $this->db->set('surcharge', $surcharge);
        $this->db->set('amount', $amount);
//        $this->db->set('status', $status);
        $this->db->where('id',$edit_id);
        $res = $this->db->update('surcharge_details'); 
        return $res; 
    }
    function changeStatus($edit_id,$status){
        $res = false;
        $this->db->set('status', $status);
        $this->db->where('id',$edit_id);
        $res = $this->db->update('surcharge_details'); 
        return $res;   
    }
}