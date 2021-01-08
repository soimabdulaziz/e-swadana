<?php

class Dashboard_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function user_w($user) {
        $this->db->select("*")->from("saldo_sim_w");
        $this->db->where("id_anggota", $user);
        $q = $this->db->get();
        $d = $q->result_array();
        return $d;
    }
    function user_s($user) {
        $this->db->select("*")->from("saldo_sim_suk");
        $this->db->where("id_anggota", $user);
        $q = $this->db->get();
        $d = $q->result_array();
        return $d;
    }
    function user_p($user) {
        $this->db->select("*")->from("saldo_piutang");
        $this->db->where("id_anggota", $user);
        $q = $this->db->get();
        $d = $q->result_array();
        return $d;
    }
    function user_j($user) {
        $this->db->select("jasa_perbulan as jasa")->from("saldo_jasa");
        $this->db->where("id_anggota", $user);
        $q = $this->db->get();
        $d = $q->result_array();
        return $d;
    }
    function saldo_w() {
        $this->db->select("SUM(saldo_wajib) as saldo_wajib")->from("saldo_sim_w");
        $q = $this->db->get();
        $d = $q->result_array();
        return $d;
    }
    function saldo_s() {
        $this->db->select("SUM(saldo_sukarela) as saldo_sukarela")->from("saldo_sim_suk");
        $q = $this->db->get();
        $d = $q->result_array();
        return $d;
    }
    function saldo_p() {
        $this->db->select("SUM(saldo_piutang) as saldo_piutang")->from("saldo_piutang");
        $q = $this->db->get();
        $d = $q->result_array();
        return $d;
    }
    function saldo_j() {
        $this->db->select("SUM(jasa_perbulan) as jasa")->from("saldo_jasa");
        $q = $this->db->get();
        $d = $q->result_array();
        return $d;
    }
    function delete($id) {
        $this->db->where("id_anggota", $id);;
        $this->db->delete("anggota");
    }
}
 

?>