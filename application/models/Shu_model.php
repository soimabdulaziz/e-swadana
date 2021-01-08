<?php

class Shu_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_total_jasa() {
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT sum(jumlah) as jumlah from jasa where year(tanggal) = '$tahun' AND status = 'Pembayaran'");
        $d = $q->result_array();
        return $d;
    }
    function get_total_jasa1() {
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT sum(jumlah) as jumlah from jasa where year(tanggal) = '$tahun' AND status = 'Pembayaran'");
        $d = $q->row()->jumlah;
        return $d;
    }
    function shutakdibagi_now() {
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT shu_takdibagi from shu where tahun = '$tahun'");
        $d = $q->result_array();
        return $d;
    }
    function shu() {
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT * from shu where tahun = '$tahun'");
        $d = $q->result_array();
        return $d;
    }
    function shudibagi(){
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT shu_dibagi from shu where tahun = '$tahun'");
        $d = $q->result_array();
        return $d;
    }
    function get_shutakdibagi() {
        $tahun_lalu = $_POST['tahun'] - 1;
        $q = $this->db->query("SELECT shu_takdibagi from shu where tahun = '$tahun_lalu'");
        $d = $q->result_array();
        return $d;
    }
    function get_shutakdibagi1() {
        $tahun_lalu = $_POST['tahun'] - 1;
        $q = $this->db->query("SELECT shu_takdibagi from shu where tahun = '$tahun_lalu'");
        $d = $q->row()->shu_takdibagi;
        return $d;
    }
    function total_pengeluaran() {
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT sum(jumlah) as pengeluaran from pengeluaran where year(tanggal) = '$tahun'");
        $d = $q->row()->pengeluaran;
        return $d;
    }
    function get_presentase() {
        $this->db->select("jumlah")->from("maseter_data");
        $this->db->where("keterangan", "presentase");
        $presentase = $this->db->get()->row()->jumlah;
        return $presentase;

    }
    function getTotal($tahun) {
        $thn = $tahun-1;
        $q = $this->db->query("SELECT * from shu where tahun = $thn");
        $d = $q->result_array();
        return $d;
    }
    function dana_cadangan() {
        $this->db->where("ket", "dana_cadangan");
        $this->db->select("jumlah")->from("dana_cadangan_sosial");
        $dana_cadangan = $this->db->get()->row()->jumlah;
        return $dana_cadangan;
    }
    function dana_sosial(){
        $this->db->where("ket", "dana_sosial");
        $this->db->select("jumlah")->from("dana_cadangan_sosial");
        $dana_sosial = $this->db->get()->row()->jumlah;
        return $dana_sosial;
    }
    function save_takdibagi($totalshu) {
        $total = $this->getTotal($_POST['tahun']);
        //print_r($total);
        $data['total_shu'] = $totalshu;
        $data['tahun'] = $_POST['tahun'];
        $data['shu_takdibagi'] = $_POST['takdibagi'];
        $data['shu_dibagi'] = $data['total_shu'] - $_POST['takdibagi'];
        $data['cadangan'] = 10/100 * $data['shu_dibagi'];
        $data['jasa_simpanan'] = 35/100 * $data['shu_dibagi'];
        $data['jasa_anggota'] = 40/100 * $data['shu_dibagi'];
        $data['jasa_pengurus'] = 10/100 * $data['shu_dibagi'];
        $data['dana_sosial'] = 5/100 * $data['shu_dibagi'];
        $data['total_dana_cadangan'] = $total[0]['total_dana_cadangan'] + $data['cadangan'];
        $data['total_jasa_simpanan'] = $total[0]['total_jasa_simpanan'] + $data['jasa_simpanan'];
        $data['total_jasa_anggota'] = $total[0]['total_jasa_anggota'] + $data['jasa_anggota'];
        $data['total_jasa_pengurus'] = $total[0]['total_jasa_pengurus'] + $data['jasa_pengurus'];
        $data['total_dana_sosial'] = $total[0]['total_dana_sosial'] + $data['dana_sosial'];
        $this->db->insert("shu", $data);
        $dana_cadangan = $this->dana_cadangan();
        $dana_sosial = $this->dana_sosial();
        $data_cadangan["jumlah"] = $dana_cadangan + $data['cadangan'];
        $data_sosial["jumlah"] = $dana_sosial+ $data['dana_sosial'];
        $this->db->where("ket", "dana_cadangan");
        $this->db->update("dana_cadangan_sosial", $data_cadangan);
        $this->db->where("ket", "dana_sosial");
        $this->db->update("dana_cadangan_sosial", $data_sosial);

    }
    function tahun_takdibagi() {
       
        $q = $this->db->query("SELECT DISTINCT year(tanggal) as tahun from jasa where year(tanggal) not in (select tahun from shu)");
        $d = $q->result_array();
        return $d;
    }
    function get_pengeluaran() {
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT * from pengeluaran where year(tanggal) = '$tahun'");
        $d = $q->result_array();
        return $d;
    }
    function getTahun() {
        $q = $this->db->query("SELECT DISTINCT year(tanggal) as tahun from jasa");
        $d = $q->result_array();
        return $d;
    }
}
 

?>