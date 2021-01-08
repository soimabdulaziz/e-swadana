<?php

class Simpanan_wajib_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_list() {
        $this->db->DISTINCT("id_anggota");
        $this->db->select("*")->from("anggota");
        //$this->db->where("Level", "2");
        $this->db->join("saldo_sim_w", "anggota.id_anggota = saldo_sim_w.id_anggota");
        $q = $this->db->get();
        return $q->result_array();
    }
    function get_det($id) {
        //$year = "2019";
       // $this->db->group_by('a.id_anggota');
        $this->db->select("*")->from("simpanan_wajib a");
        $this->db->join("saldo_sim_w b", "b.id_anggota = a.id_anggota" );
        $this->db->join("anggota c", "c.id_anggota =  a.id_anggota");
        $this->db->where("a.id_anggota", $id);
       // if (!empty($year)) {
        //$this->db->where("YEAR(tanggal)", $year); 
        //}
        $q = $this->db->get();
        return $q;
    }
    
    function saldo($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("saldo")->from("simpanan_wajib");
        $saldo = $this->db->get()->row()->saldo;
        return $saldo;
    }
    function get_sim_w() {
        $this->db->where("keterangan", "Simpanan Wajib");
        $this->db->select("jumlah")->from("maseter_data");
        $jumlah = $this->db->get()->row()->jumlah;
        return $jumlah;
    }
    function get_saldo($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("saldo_wajib")->from("saldo_sim_w");
        $saldo = $this->db->get()->row()->saldo_wajib;
        return $saldo;
    }

    function tambah($post){
        $id = $this->uri->segment(3);
        $jumlah = $this->get_sim_w();
        $saldo = $this->get_saldo($id);
        $data['status'] = "Pemasukan";
       // $saldo = $this->saldo($id);
        $data['tanggal'] = $post['tanggal'];
        //$data['saldo_wajib'] = "100000" + $saldo;
        $data['id_anggota'] = $id;
        $post = str_replace(".", "", $_POST['rupiah']);
        if($this->session->userdata('username') != 'admin1') {
            $data['saldo'] = $saldo + $jumlah; 
            $d_saldo['saldo_wajib'] = $saldo + $jumlah;
            $data['jumlah'] = $jumlah;
            $d_saldo['tanggal'] = $_POST['tgl'];
        } elseif($this->session->userdata('username') == 'admin1') {
            $data['saldo'] = $saldo + $post;
            $d_saldo['saldo_wajib'] = $saldo + $post;
            $data['jumlah'] = $post;
            $d_saldo['tanggal'] = $_POST['tgl'];

        }
        
        $this->db->where("id_anggota", $id);
        $this->db->insert("simpanan_wajib", $data);

        $this->db->where("id_anggota", $id);
        $this->db->update("saldo_sim_w", $d_saldo);
      
    }

    function tarik($post) {
        $id = $this->uri->segment(3);
        $saldo = $this->get_saldo($id);
        $data['status'] = "Penarikan";
        $data['tanggal'] = $post['tanggal'];
        $data['jumlah'] = $post['jumlah'];
        $data['id_anggota'] = $id;
        $data['saldo'] = $saldo - $post['jumlah'];
        $d_saldo['saldo_wajib'] = $saldo - $post['jumlah'];
        
        $this->db->where("id_anggota", $id);
        $this->db->insert("simpanan_wajib", $data);

        $this->db->where("id_anggota", $id);
        $this->db->update("saldo_sim_w", $d_saldo);

    }

    function update($data) {
    

    }
    function delete($id) {

    }
}
 

?>