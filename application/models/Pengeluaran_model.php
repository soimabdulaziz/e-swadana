<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model {
    
    function get_pengeluaran(){
        $this->db->select("*")->from("pengeluaran");
        $q = $this->db->get();
        return $q->result_array();

    }
    
    function dana_cadangan() {
        $this->db->select("jumlah")->from("dana_cadangan_sosial");
        $this->db->where("ket", "dana_cadangan");
        $q = $this->db->get()->row()->jumlah;
        return $q;
    }

    function dana_sosial() {
        $this->db->select("jumlah")->from("dana_cadangan_sosial");
        $this->db->where("ket", "dana_sosial");
        $q = $this->db->get()->row()->jumlah;
        return $q; 
    }

    function insert_cadangan(){
        $jumlah = str_replace(".", "", $_POST['rupiah']);
        $saldo_cadangan = $this->dana_cadangan();
        $saldo_sosial = $this->dana_sosial(); 
        $data['jumlah'] = $jumlah;
        $data['keterangan'] = $_POST['keterangan'];
        $data['sisa_dana_cadangan'] = $saldo_cadangan - $data['jumlah'];
        $data['sisa_dana_sosial'] = $saldo_sosial;
        $data['sumber_pengeluaran'] = $_POST['sumber_dana'];
        $data['tanggal'] = $_POST['tgl'];
        $this->db->insert("pengeluaran", $data);
        $cadangan['jumlah'] = $data['sisa_dana_cadangan'];
        $this->db->where("ket", "dana_cadangan");
        $this->db->update("dana_cadangan_sosial", $cadangan);
    }

    function insert_sosial(){
        $jumlah = str_replace(".", "", $_POST['rupiah']);
        $saldo_cadangan = $this->dana_cadangan();
        $saldo_sosial = $this->dana_sosial(); 
        $data['jumlah'] = $jumlah;
        $data['keterangan'] = $_POST['keterangan'];
        $data['sisa_dana_cadangan'] = $saldo_cadangan;
        $data['sisa_dana_sosial'] = $saldo_sosial - $data['jumlah'];
        $data['sumber_pengeluaran'] = $_POST['sumber_dana'];
        $data['tanggal'] = $_POST['tgl'];
        $this->db->insert("pengeluaran", $data);
        $cadangan['jumlah'] == $data['sisa_dana_sosial'];
        $this->db->where("ket", "dana_sosial");
        $this->db->update("dana_cadangan_sosial", $cadangan);
    }

    function update($id) {
        $jumlah = str_replace(".", "", $_POST['rupiah']);
        $data['jumlah'] = $jumlah;
        $data['keterangan'] = $_POST['keterangan'];
        $data['tanggal'] = $_POST['tgl'];
        $this->db->where("id_pengeluaran", $id);
        $this->db->update("pengeluaran", $data);
    }
    function delete($id) {
        $this->db->where("id_pengeluaran", $id);
        $this->db->delete("pengeluaran");
    }
    



}