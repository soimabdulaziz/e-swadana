<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_wajib_model extends CI_Model {
    
    function get_list(){
        $this->db->DISTINCT("nama");
        $this->db->where('Level', "2");
        $this->db->select("nama, Level, id_anggota")->from("anggota");
        //$this->db->join("simpanan_wajib", "anggota.id_anggota = simpanan_wajib.id_anggota");
        $q = $this->db->get();
        return $q->result_array();
    } 
    function get_jum(){
        //$this->db->where('month(tanggal)', "04");
        //$this->db->where("tanggal", "max(tanggal)");
        $this->db->select("*")->from("simpanan_wajib");
        $q=$this->db->get();
        return $q->result_array();
    }
    public function cek01($id = null) {
      //  $this->db->where('month(tanggal)', "05");
        //$this->db->group_by("id_anggota");
        //$this->db->where("id_simjib", "max(id_simjib)");
        $q = $this->db->query("select jumlah, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_wajib where YEAR(tanggal) = '".$_POST['tahun']."' AND
		 id_simjib in (select id_simjib from simpanan_wajib GROUP BY id_anggota, MONTH(tanggal))");
		$cek01 = $q->result_array();
		return $cek01;
		
    }
    function jan(){
      //  $this->db->where("month(tanggal), 5");
        $this->db->select("max(id_simjib), jumlah, saldo")->from("simpanan_wajib");
       // $this->db->group_by("month(tanggal)");
        $q = $this->db->get();
        return $q->result_array();
    }
    public function saldo_sebelum($id = null) {
          $sebelum = $_POST['tahun'] - 1;
          $q = $this->db->query("select saldo, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_wajib where YEAR(tanggal) = '".$sebelum."' AND
           id_simjib in (select id_simjib from simpanan_wajib GROUP BY id_anggota)");
          $cek01 = $q->result_array();
          return $cek01;
          
      }
    
    function tahun(){
        $q = $this->db->query("select distinct year(tanggal) as tahun from simpanan_wajib");
       $tahun = $q->result_array();
       return $tahun;
    }
	
    
    function get_total() {
        $this->db->select_max("jumlah");
        $this->db->from('simpanan_wajib');
        $this->db->where('month(tanggal)', '04');
        $q = $this->db->get();
        return $q;
    }


}