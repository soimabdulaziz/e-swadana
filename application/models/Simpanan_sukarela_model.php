<?php

class Simpanan_sukarela_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_list() {
        $this->db->DISTINCT("id_anggota");
        $this->db->select("*")->from("anggota");
        $this->db->join("saldo_sim_suk", "anggota.id_anggota = saldo_sim_suk.id_anggota");
        $q = $this->db->get();
        return $q->result_array();
    }
    function get_det($id) {
        
       // $this->db->group_by('a.id_anggota');
        $this->db->select("*")->from("simpanan_sukarela a");
        $this->db->join("saldo_sim_suk b", "b.id_anggota = a.id_anggota" );
        $this->db->join("anggota c", "c.id_anggota =  a.id_anggota");
        $this->db->where("a.id_anggota", $id);
        $q = $this->db->get();
        return $q;
    }
    
    function saldo($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("saldo")->from("simpanan_sukarela");
        $saldo = $this->db->get()->row()->saldo;
        return $saldo;
    }
 
    function get_saldo($id) {
        $this->db->where("id_anggota", $id);
        $this->db->select("saldo_sukarela")->from("saldo_sim_suk");
        $saldo = $this->db->get()->row()->saldo_sukarela;
        return $saldo;
    }

    function tambah($post, $jumlah){
        $id = $this->uri->segment(3);
        $saldo = $this->get_saldo($id);
        $data['status'] = "Pemasukan";
       // $saldo = $this->saldo($id);
        $data['tanggal'] = $post['tanggal'];
        //$data['saldo'] = "100000" + $saldo;
        $data['jumlah'] = $post['jumlah'];
        $data['id_anggota'] = $id;
        $data['saldo_sukarela'] = $saldo + $post['jumlah'];
        $d_saldo['saldo_sukarela'] = $saldo + $post['jumlah'];
        $this->db->where("id_anggota", $id);
        $this->db->insert("simpanan_sukarela", $data);

        $this->db->where("id_anggota", $id);
        $this->db->update("saldo_sim_suk", $d_saldo);
      
    }

    function tarik($post) {
        $id = $this->uri->segment(3);
        $saldo = $this->get_saldo($id);
        $data['status'] = "Penarikan";
        $data['tanggal'] = $post['tanggal'];
        $data['jumlah'] = $post['jumlah'];
        $data['id_anggota'] = $id;
        $data['saldo_sukarela'] = $saldo - $post['jumlah'];
        $d_saldo['saldo_sukarela'] = $saldo - $post['jumlah'];
        
        $this->db->where("id_anggota", $id);
        $this->db->insert("simpanan_sukarela", $data);

        $this->db->where("id_anggota", $id);
        $this->db->update("saldo_sim_suk", $d_saldo);

    }

    function update($data) {
    

    }
    function delete($id) {

    }
}
 

?>