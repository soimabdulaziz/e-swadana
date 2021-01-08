<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_pokok_model extends CI_Model {
    
    function get_list(){
        $this->db->DISTINCT("id_anggota");
        $this->db->select("*")->from("anggota");
        $this->db->join("simpanan_pokok", "anggota.id_anggota = simpanan_pokok.id_anggota");
        $q = $this->db->get();
        return $q->result_array();
    } 



}