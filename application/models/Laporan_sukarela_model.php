<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_sukarela_model extends CI_Model {
    
    function get_list(){
        $this->db->DISTINCT("nama");
        $this->db->where('Level', "2");
        $this->db->select("nama, Level, id_anggota")->from("anggota");
        //$this->db->join("simpanan_sukarela", "anggota.id_anggota = simpanan_sukarela.id_anggota");
        $q = $this->db->get();
        return $q->result_array();
    } 
    function get_jum(){
        //$this->db->where('month(tanggal)', "04");
        //$this->db->where("tanggal", "max(tanggal)");
        $this->db->select("*")->from("simpanan_sukarela");
        $q=$this->db->get();
        return $q->result_array();
    }
    public function cek01($id = null) {
      //  $this->db->where('month(tanggal)', "05");
        //$this->db->group_by("id_anggota");
        //$this->db->where("id_sukarela", "max(id_sukarela)");
        $q = $this->db->query("select jumlah, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela where YEAR(tanggal) = '".$_POST['tahun']."' AND
		 id_sukarela in (select id_sukarela from simpanan_sukarela GROUP BY id_anggota, MONTH(tanggal))");
		$cek01 = $q->result_array();
		return $cek01;
		
    }
    public function jan() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "1");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function feb() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "2");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function mar() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "3");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function apr() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "4");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function mei() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "5");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function jun() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "6");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function jul() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "7");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function agus() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "8");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function sep() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "9");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function okt() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "10");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function nov() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "11");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function des() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "12");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    function saldo() {
      $sebelum = $_POST['tahun'];
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela where YEAR(tanggal) = '".$sebelum."' AND
       id_sukarela in (select MAX(id_sukarela) from simpanan_sukarela GROUP BY id_anggota)");
      $cek01 = $q->result_array();
      return $cek01;
      
  }
    
    function saldo_sebelum() {
      $sebelum = $_POST['tahun'] - "1";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela where YEAR(tanggal) = '".$sebelum."' AND
       id_sukarela in (select id_sukarela from simpanan_sukarela GROUP BY id_anggota)");
      $cek01 = $q->result_array();
      return $cek01;
      
  }
    
    function tahun(){
        $q = $this->db->query("select distinct year(tanggal) as tahun from simpanan_sukarela");
       $tahun = $q->result_array();
       return $tahun;
    }
	
    
    function get_total() {
        $this->db->select_max("jumlah");
        $this->db->from('simpanan_sukarela');
        $this->db->where('month(tanggal)', '04');
        $q = $this->db->get();
        return $q;
    }


}