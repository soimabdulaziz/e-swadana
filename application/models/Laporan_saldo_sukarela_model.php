<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_saldo_sukarela_model extends CI_Model {
    
    function get_list(){
        $this->db->DISTINCT("nama");
        $this->db->where("Level", "2");
        $this->db->select("nama, id_anggota")->from("anggota");
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
      $this->db->select("saldo_sukarela as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "1");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();	
    }
    public function jan1() {
      $tanggal = $_POST['tahun'] . "-" . "01" . "-" . "31";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $jan1 = $q->result_array();
     return $jan1;	
    }

    public function feb() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "2");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function feb1() {
      $tanggal = $_POST['tahun'] . "-" . "02" . "-" . "29";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $feb1 = $q->result_array();
     return $feb1;	
    }

    public function mar() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "3");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function mar1() {
      $tanggal = $_POST['tahun'] . "-" . "03" . "-" . "31";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $mar1 = $q->result_array();
     return $mar1;	
    }

    public function mar2() {
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE YEAR(tanggal) < '".$_POST['tahun']."' AND
      id_sukarela in (select id_sukarela from simpanan_sukarela GROUP BY id_anggota)");
     $mar2 = $q->result_array();
     return $mar2;	
    }

    public function apr() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "4");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function apr1() {
      $tanggal = $_POST['tahun'] . "-" . "04" . "-" . "30";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $apr1 = $q->result_array();
     return $apr1;	
    }


    public function mei() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "5");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function mei1() {
      $tanggal = $_POST['tahun'] . "-" . "05" . "-" . "31";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $mei1 = $q->result_array();
     return $mei1;	
    }
    
    public function mei2() {
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE YEAR(tanggal) < '".$_POST['tahun']."' AND
      id_sukarela in (select id_sukarela from simpanan_sukarela GROUP BY id_anggota)");
     $mei2 = $q->result_array();
     return $mei2;	
    }

    public function jun() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "6");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function jun1() {
      $tanggal = $_POST['tahun'] . "-" . "06" . "-" . "30";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $jun1 = $q->result_array();
     return $jun1;	
    }

    
    public function jul() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "7");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function jul1() {
      $tanggal = $_POST['tahun'] . "-" . "07" . "-" . "31";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $jul1 = $q->result_array();
     return $jul1;	
    }
    

    public function agus() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "8");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function agus1() {
      $tanggal = $_POST['tahun'] . "-" . "08" . "-" . "31";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $agus1 = $q->result_array();
     return $agus1;	
    }
    
    public function sep() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "9");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function sep1() {
      $tanggal = $_POST['tahun'] . "-" . "09" . "-" . "30";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $sep1 = $q->result_array();
     return $sep1;	
    }
    
    public function sep2() {
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE YEAR(tanggal) < '".$_POST['tahun']."' AND
      id_sukarela in (select id_sukarela from simpanan_sukarela GROUP BY id_anggota)");
     $sep2 = $q->result_array();
     return $sep2;	
    }

    public function okt() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "10");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function okt1() {
      $tanggal = $_POST['tahun'] . "-" . "10" . "-" . "31";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $okt1 = $q->result_array();
     return $okt1;	
    }

    public function nov() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "11");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }
    public function nov1() {
      $tanggal = $_POST['tahun'] . "-" . "11" . "-" . "30";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
     $nov1 = $q->result_array();
     return $nov1;	
    }
  
    public function des() {
      $this->db->select("SUM(jumlah) as jum, id_anggota")->from("simpanan_sukarela");
      $this->db->where("YEAR(tanggal)", $_POST['tahun']);
      $this->db->where("MONTH(tanggal)", "12");
      $this->db->group_by("id_anggota");
      $q = $this->db->get();
      return $q->result_array();
		
    }

    public function des1() {
      $tanggal = $_POST['tahun'] . "-" . "12" . "-" . "31";
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where tanggal <= '$tanggal' GROUP BY id_anggota
      )");
      $des1 = $q->result_array();
     return $des1;	
    }
    
    public function des2() {
      $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE YEAR(tanggal) < '".$_POST['tahun']."' AND
      id_sukarela in (select id_sukarela from simpanan_sukarela GROUP BY id_anggota)");
     $des2 = $q->result_array();
     return $des2;	
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