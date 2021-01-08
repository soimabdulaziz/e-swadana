<?php

class Piutang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_list() {
        $this->db->DISTINCT("id_anggota");
        $this->db->select("*")->from("anggota");
        $this->db->join("saldo_piutang", "anggota.id_anggota = saldo_piutang.id_anggota");
        $q = $this->db->get();
        return $q->result_array();
    }
    function get_det($id) {
        
       // $this->db->group_by('a.id_anggota');
        $this->db->select("*")->from("piutang a");
        $this->db->join("saldo_piutang b", "b.id_anggota = a.id_anggota" );
        $this->db->join("anggota c", "c.id_anggota =  a.id_anggota");
        $this->db->where("a.id_anggota", $id);
        $q = $this->db->get();
        return $q;
    }
    
    function saldo($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("saldo_piutang")->from("piutang");
        $saldo = $this->db->get()->row()->saldo_piutang;
        return $saldo;
    }
 
    function get_saldo($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("saldo_piutang")->from("saldo_piutang");
        $saldo_piutang = $this->db->get()->row()->saldo_piutang;
        return $saldo_piutang;
    }
    function get_max() {
        $this->db->select_max("id_piutang")->from("piutang");
        $hasil = $this->db->get()->row()->id_piutang;
        return $hasil;
    }
    function get_presentase() {
        $this->db->select("jumlah")->from("maseter_data");
        $this->db->where("keterangan", "presentase");
        $presentase = $this->db->get()->row()->jumlah;
        return $presentase;

    }
    function get_s_jasa($id){
        $this->db->select("saldo_jasa")->from("saldo_jasa");
        $this->db->where("id_anggota", $id);
        $get_s_jasa = $this->db->get()->row()->saldo_jasa;
        return $get_s_jasa;
    }

    function tambah($post){
        $id = $this->uri->segment(3);
        $saldo_piutang = $this->get_saldo($id);
        $hasil = $this->get_max();
        $tgl_tmpo =  date('Y-m-d', strtotime('+1 month', strtotime($post['tanggal'])));
        $bulan = strtolower(date('m',strtotime($tgl_tmpo)));
        $tahun = strtolower(date('Y',strtotime($tgl_tmpo)));
        $tempo = $tahun.'-'.$bulan.'-'.'01';
        $data['status'] = "Penambahan";
        $saldo = $this->saldo($id);
        $data['tanggal'] = $post['tanggal'];
        //$data['saldo'] = "100000" + $saldo;
        $get_s_jasa = $this->get_s_jasa($id);
        $data['jumlah'] = $post['jumlah'];
        $data['id_anggota'] = $id;
        $data['id_piutang'] = $hasil + "1";
        $data['saldo_piutang'] = $saldo_piutang + $post['jumlah'];
        $d_saldo['saldo_piutang'] = $saldo_piutang + $post['jumlah'];
        $presentase = $this->get_presentase();
        $jasa['id_anggota'] = $id;
        $jasa['jumlah'] = $presentase / "100" * $post['jumlah'];
        $jasa['tanggal'] = $post['tanggal'];
        $jasa['status'] = "Penambahan";
        $s_jasa['saldo_jasa'] = $get_s_jasa + $jasa['jumlah'];
        $s_jasa['tempo'] = $tempo;
        $s_jasa['tanggal'] = $post['tanggal'];
       // $s_jasa['tanggal'] = $post['tanggal'];
        $this->db->where("id_anggota", $id);
        $this->db->insert("piutang", $data);
        $this->db->insert("jasa", $jasa);

        $this->db->where("id_anggota", $id);
        $this->db->update("saldo_piutang", $d_saldo);

        $this->db->where("id_anggota", $id);
        $this->db->update("saldo_jasa", $s_jasa);
      
    }

    function tarik($post) {
        $id = $this->uri->segment(3);
        $saldo = $this->get_saldo($id);
        $hasil = $this->get_max();
        $data['status'] = "Pembayaran";
        $data['tanggal'] = $post['tanggal'];
        $data['jumlah'] = $post['jumlah'];
        $data['id_anggota'] = $id;
        $data['saldo_piutang'] = $saldo - $post['jumlah'];
        $d_saldo['saldo_piutang'] = $saldo - $post['jumlah'];
        $data['id_piutang'] = $hasil + "1";
        
        $this->db->where("id_anggota", $id);
        $this->db->insert("piutang", $data);

        $this->db->where("id_anggota", $id);
        $this->db->update("saldo_piutang", $d_saldo);

        if ($saldo - $post['jumlah'] == 0) {
            $data_jasa['saldo_jasa'] = '0';
            $data_jasa['tempo'] ='0';
            $this->db->where("id_anggota", $id);
            $this->db->update("saldo_jasa", $data_jasa);
        }

    }

    function update($data) {
    

    }
    function delete($id) {

    }
}
 

?>