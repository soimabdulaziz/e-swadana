<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa_model extends CI_Model {
    
    function get_list() {
        $this->db->DISTINCT("id_anggota");
        $this->db->select("*")->from("anggota");
        $this->db->join("saldo_jasa", "anggota.id_anggota = saldo_jasa.id_anggota");
        $q = $this->db->get();
        return $q->result_array();
    }

    function jasa_bulan($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("jasa_perbulan")->from("saldo_jasa");
        $jasa_bulan = $this->db->get()->row()->jasa_perbulan;
        return $jasa_bulan;
    }
    function get_tempo($id) {
        $q = $this->db->query("SELECT tempo from saldo_jasa where id_anggota = $id");
        $d = $q->row()->tempo;
        return $d;
    }
    function get_tgl_p($id) {
        $q = $this->db->query("SELECT tanggal from saldo_jasa where id_anggota = $id");
        $d = $q->row()->tanggal;
        return $d;
    }
    function saldo($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("saldo_jasa")->from("saldo_jasa");
        $saldo = $this->db->get()->row()->saldo_jasa;
        return $saldo;
    }
    function jasa_bln($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("jasa_perbulan")->from("saldo_jasa");
        $saldo = $this->db->get()->row()->jasa_perbulan;
        return $saldo;
    }

    function Jasa_skr($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("jasa_perbulan")->from("saldo_jasa");
        $jasa_n = $this->db->get()->row()->jasa_perbulan;
        return $jasa_n;
    }

    function get_max(){

    }

    function get_det($id) {
        
        // $this->db->group_by('a.id_anggota');
         $this->db->select("*")->from("jasa a");
         $this->db->join("saldo_jasa b", "b.id_anggota = a.id_anggota" );
         $this->db->join("anggota c", "c.id_anggota =  a.id_anggota");
         $this->db->where("a.id_anggota", $id);
         $q = $this->db->get();
         return $q;
     }
    function tarik($post) {
        $id = $this->uri->segment(3);
        $jasa_bulan = $this->jasa_bulan($id);
        $hasil = $this->get_max();
        $jumlah = str_replace(",", "", $_POST['rupiah']);
        $tgl_tmpo =  date('Y-m-d', strtotime('+1 month', strtotime($post['tanggal'])));
        $bulan = strtolower(date('m',strtotime($tgl_tmpo)));
        $tahun = strtolower(date('Y',strtotime($tgl_tmpo)));
        $tempo = $tahun.'-'.$bulan.'-'.'01';
        $data['status'] = "Pembayaran";
        $data['tanggal'] = $post['tanggal'];
        $data['jumlah'] = $jumlah;
        $data['id_anggota'] = $id;
        $d_saldo['tempo'] = $tempo;
        $d_saldo['jasa_perbulan'] = $jasa_bulan - $jumlah;
        $d_saldo['sts'] = "N";
        //$data['id_piutang'] = $hasil + "1";
        
        //$this->db->where("id_anggota", $id);
        $this->db->insert("jasa", $data);

        $this->db->where("id_anggota", $id);
        $this->db->update("saldo_jasa", $d_saldo);

    }

    function get_presentase() {
        $this->db->select("jumlah")->from("maseter_data");
        $this->db->where("keterangan", "presentase");
        $presentase = $this->db->get()->row()->jumlah;
        return $presentase;

    }

    function get_s_piutang($id){
        $this->db->select("saldo_piutang")->from("saldo_piutang");
        $this->db->where("id_anggota", $id);
        $get_s_piutang = $this->db->get()->row()->saldo_piutang;
        return $get_s_piutang;
    }

    function updatests($id) {
        $this->db->where('id_anggota', $id);
        $data['sts'] = "Y";
        $this->db->update('saldo_jasa', $data);
    }
    function jasa_perbulan($id, $range) {
        $jasa_n = $this->jasa_skr($id);
        $saldo = $this->saldo($id);
        $tempo = $this->get_tempo($id);
        $this->db->where("id_anggota", $id);
        echo $range;
        $data["jasa_perbulan"] = $saldo*$range;
       // $data["tempo"] = date('Y-m-d', strtotime('+'.$range.' month', strtotime($tempo)));
        $data["sts"] = "N";
        $this->db->update("saldo_jasa", $data);

    }
    function jasa_perbulan0($id) {
        $jasa_n = $this->jasa_skr($id);
        $saldo = $this->saldo($id);
        $tempo = $this->get_tempo($id);
        $this->db->where("id_anggota", $id);
        $data["jasa_perbulan"] = $saldo;
        //$data["tempo"] = date('Y-m-d', strtotime('+1 month', strtotime($tempo)));
        $data["sts"] = "N";
        $this->db->update("saldo_jasa", $data);
    }
    function new_jasa($id) {
        $presentase = $this->get_presentase();
        $get_s_piutang = $this->get_s_piutang($id);
        $this->db->where("id_anggota", $id);
        $data['saldo_jasa'] = $presentase / "100" * $get_s_piutang;
        $this->db->update("saldo_jasa", $data);
    }

}