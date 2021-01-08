<?php

class Sirkulasi_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_list() {
        $this->db->select("*")->from("anggota a");
        $this->db->where("a.Level", "2");
        $this->db->join("saldo_sim_w b", "a.id_anggota = b.id_anggota");
        $this->db->join("saldo_sim_suk c", "a.id_anggota = c.id_anggota");
        $this->db->join("saldo_piutang d", "a.id_anggota = d.id_anggota");
        $this->db->join("saldo_jasa e", "a.id_anggota = e.id_anggota");
        $q = $this->db->get();
        return $q->result_array();
    }
    function tahun(){
        $q = $this->db->query("select distinct year(tanggal) as tahun from simpanan_wajib");
       $tahun = $q->result_array();
       return $tahun;
    }
    function get_anggota() {
        $this->db->select("*")->from("anggota");
        $this->db->where("Level", "2");
        $q = $this->db->get();
        $name = $q->result_array();
        return $name;
    }
    public function saldo_wajib() {
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $q = $this->db->query("select saldo, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_wajib WHERE id_simjib in (select max(id_simjib) from simpanan_wajib where YEAR(tanggal) = $tahun AND MONTH(tanggal) = $bulan GROUP BY id_anggota
        )");
       $ssw = $q->result_array();
       return $ssw;	
      }
    public function saldo_sukarela() {
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $q = $this->db->query("select saldo_sukarela, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from simpanan_sukarela WHERE id_sukarela in (select max(id_sukarela) from simpanan_sukarela where YEAR(tanggal) = $tahun AND MONTH(tanggal) = $bulan GROUP BY id_anggota
        )");
       $ssr = $q->result_array();
       return $ssr;	
    }

    public function saldo_piutang() {
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $q = $this->db->query("select saldo_piutang, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from piutang WHERE id_piutang in (select max(id_piutang) from piutang where YEAR(tanggal) = $tahun AND MONTH(tanggal) = $bulan GROUP BY id_anggota
        )");
       $piutang = $q->result_array();
       return $piutang;	
    }

    public function saldo_jasa() {
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $q = $this->db->query("select saldo_jasa, DATE_FORMAT(tanggal, '%m-%Y'), tanggal, id_anggota from jasa WHERE id_jasa in (select max(id_jasa) from jasa where YEAR(tanggal) = $tahun AND MONTH(tanggal) = $bulan GROUP BY id_anggota
        )");
       $saldo_w = $q->result_array();
       return $saldo_w;	
      }
}
 

?>