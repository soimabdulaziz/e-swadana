<?php

class Neraca_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_simpok(){
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];

        $q = $this->db->query("SELECT sum(jumlah) as simpok from simpanan_pokok");
        $d = $q->result_array();
        return $d;
    }

    function get_piutang(){
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $q = $this->db->query("SELECT (select sum(jumlah) FROM `piutang` WHERE tanggal < '$tahun-$bulan-31' and status = 'Penambahan') as penambahan,
                        (select sum(jumlah) from `piutang` where tanggal < '$tahun-$bulan-31' and status = 'Pembayaran') as pembayaran");
        $d = $q->result_array();
        return $d;
    }

    function get_simpanan_wajib(){
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];

        $q = $this->db->query("SELECT (SELECT SUM(jumlah) from simpanan_wajib where status = 'Pemasukan' and tanggal < '$tahun-$bulan-31') as pemasukan, 
                    (SELECT SUM(jumlah) from simpanan_wajib where status = 'Penarikan' and tanggal < '$tahun-$bulan-31') AS penarikan");
        $d = $q->result_array();
        return $d;
    }

    function get_simpanan_sukarela() {
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $q = $this->db->query("SELECT (SELECT SUM(jumlah) from simpanan_sukarela where status = 'Pemasukan' and tanggal < '$tahun-$bulan-31') as pemasukan,
                    (SELECT SUM(jumlah) from simpanan_sukarela where status = 'Penarikan' and tanggal < '$tahun-$bulan-31') as penarikan");
        $d = $q->result_array();
        return $d;
    }

    function get_jasa(){
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $q = $this->db->query("SELECT SUM(jumlah) as jasa from jasa where tanggal < '$tahun-$bulan-31' and status = 'Pembayaran'");
        $d = $q->result_array();
        return $d;
    }

    function get_total_jasa() {
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT sum(jumlah) as jumlah from jasa where year(tanggal) = '$tahun'");
        $d = $q->result_array();
        return $d;
    }
    function get_total_jasa1() {
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT sum(jumlah) as jumlah from jasa where year(tanggal) = '$tahun'");
        $d = $q->row()->jumlah;
        return $d;
    }
    function shutakdibagi_now() {
        $tahun = $_POST['tahun'];
        $q = $this->db->query("SELECT shu_takdibagi from shu where tahun = '$tahun'");
        $d = $q->result_array();
        return $d;
    }
    function get_shu() {
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
    function save_takdibagi() {
        $total_jasa = $this->get_total_jasa1();
        $shu_takdibagi_thn_lalu = $this->get_shutakdibagi1();
        $total_pengeluaran = $this->total_pengeluaran();
        $data['total_shu'] = $total_jasa + $shu_takdibagi_thn_lalu - $total_pengeluaran;
        $data['tahun'] = $_POST['tahun'];
        $data['shu_takdibagi'] = $_POST['takdibagi'];
        $data['shu_dibagi'] = $data['total_shu'] - $_POST['takdibagi'];
        $data['cadangan'] = 10/100 * $data['shu_dibagi'];
        $data['jasa_simpanan'] = 35/100 * $data['shu_dibagi'];
        $data['jasa_anggota'] = 40/100 * $data['shu_dibagi'];
        $data['jasa_pengurus'] = 10/100 * $data['shu_dibagi'];
        $data['dana_sosial'] = 5/100 * $data['shu_dibagi'];
        $this->db->insert("shu", $data);
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
        $q = $this->db->query("SELECT DISTINCT year(tanggal) as tahun from simpanan_wajib");
        $d = $q->result_array();
        return $d;
    }
}
 

?>