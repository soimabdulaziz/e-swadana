<?php

class Anggota_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAnggota() {
        $this->db->select("*")->from("anggota");
        $q = $this->db->get();
        return $q;
    }
    function get_max() {
        $this->db->select_max("id_anggota")->from("anggota");
        $hasil = $this->db->get()->row()->id_anggota;
        return $hasil;
    }
    function get_simpok() {
        $this->db->where("keterangan", "Simpanan Pokok");
        $this->db->select("jumlah")->from("maseter_data");
        $jumlah = $this->db->get()->row()->jumlah;
        return $jumlah;
    }
    function get_max_piutang() {
        $this->db->select_max("id_piutang")->from("piutang");
        $id_piutang = $this->db->get()->row()->id_piutang;
        return $id_piutang;
    }

    function insert($data){
        $hasil = $this->get_max();
        $id_piutang = $this->get_max_piutang();
        $jumlah = $this->get_simpok();
        $data['pass'] = sha1($data['pass']);
        $data['passconf'] = sha1($data['passconf']);
        $data['Level'] = $data['Level'];
        $data['id_anggota'] = $hasil + "1";
        $data['new'] = "Y";
        $id_s['id_anggota'] = $hasil + "1";
        $id_j['sts'] = "Y";
        $id_j['id_anggota'] = $hasil + "1";
        $id_p['id_anggota'] = $hasil + "1";
        $id_p['jumlah'] = $jumlah;
        $id_p['tanggal'] = date('Y-m-d H:i:s');
        $id['id_anggota'] = $hasil + "1";
        $id['tanggal'] = date('Y-m-d');
        $piutang['id_anggota'] = $hasil + "1";
        $piutang['tanggal'] = date('Y-m-d H:i:s');
        $piutang['id_piutang'] = $id_piutang + "1";
        $this->db->insert('anggota', $data);
        if($data['Level'] == 2) {
            $this->db->insert('simpanan_pokok', $id_p);
            $this->db->insert('piutang', $piutang);
            $this->db->insert('simpanan_sukarela', $id);
            $this->db->insert('simpanan_wajib', $id);
            $this->db->insert('jasa', $id);
            $this->db->insert('saldo_sim_w', $id_s);
            $this->db->insert('saldo_sim_suk', $id_s);
            $this->db->insert('saldo_jasa', $id_j);
            $this->db->insert('saldo_piutang', $id_s);
        }
    }

    function ins_simpok(){

        $max =   $this->db->select_max("id_anggota")->from("anggota");
        $q = $this->db->get();
        return $max;

        $data['id_anggota'] = $max + 1;
        $this->db->insert("simpanan_pekok", $data);
    }

    function update($data) {
        $id= $this->uri->segment(3);
        $this->db->where("id_anggota", $id);
        $this->db->update("anggota", $data);

    }
    function delete($id) {
        $this->db->where("id_anggota", $id);;
        $this->db->delete("anggota");
    }
}
 

?>