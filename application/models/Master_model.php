<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {
    
    function get_master(){
        $this->db->select("*")->from("maseter_data");
        $q = $this->db->get();
        return $q;
    } 
    
    function update($d) {
        $id = $this->uri->segment(3);
        $this->db->where('id_master', $id);
        $data['jumlah'] = $d;
        $this->db->update('maseter_data', $data);
    }


}