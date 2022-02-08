<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {

    function add($post) {
        $data['id_tower'] = $post['id_tower'];
        $data['long'] = $post['long'];
        $data['lat'] = $post['lat'];
        $data['alamat'] = $post['alamat'];
        $data['desa'] = $post['desa'];
        $data['kecamatan'] = $post['kec'];
        $data['tinggi'] = $post['tinggi'];
        $data['tipe_menara'] = $post['tipe_men'];
        $data['tipe_site'] = $post['tipe_site'];
        $data['luas_tanah'] = $post['luas'];
        $data['lokasi'] = $post['lokasi'];
        $data['penggunaan'] = $post['penggunaan'];
        $data['provider'] = $post['provider'];
        $this->db->insert('tabel_tower', $data);
    }

    function edit($post) {
        $id= $this->uri->segment(3);
        $data['id_tower'] = $post['id_tower'];
        $data['long'] = $post['long'];
        $data['lat'] = $post['lat'];
        $data['alamat'] = $post['alamat'];
        $data['desa'] = $post['desa'];
        $data['kecamatan'] = $post['kec'];
        $data['tinggi'] = $post['tinggi'];
        $data['tipe_menara'] = $post['tipe_men'];
        $data['tipe_site'] = $post['tipe_site'];
        $data['luas_tanah'] = $post['luas'];
        $data['lokasi'] = $post['lokasi'];
        $data['penggunaan'] = $post['penggunaan'];
        $data['provider'] = $post['provider'];
        $this->db->where("id_tower", $id);
        $this->db->update('tabel_tower', $data);
    }

    function delete($id) {
        $this->db->where("id_tower", $id);
        $this->db->delete("tabel_tower");
    }

    function prov() {
        $this->db->select("*")->from("provider");
        $q = $this->db->get()->result_array();
        return $q;
    }

    function get_data() {
        $this->db->select("*")->from("tabel_tower");
        $q = $this->db->get()->result_array();
        return $q;
    }

}