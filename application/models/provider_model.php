<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provider_model extends CI_Model {

    function get_data() {
        $this->db->select("*")->from("provider");
        $q = $this->db->get()->result_array();
        return $q;
    }

    function add($post){
        $data['nama_provider'] = $post['nama'];
        $data['alamat'] = $post['alamat'];

        $this->db->insert('provider' , $data);

    }
    function edit($post){
        $data['nama_provider'] = $post['nama'];
        $data['alamat'] = $post['alamat'];
        $this->db->where('id_provider', $this->uri->segment(3));
        $this->db->update('provider' , $data);

    }
    function delete($id) {
        $this->db->where("id_provider", $id);
        $this->db->delete("provider");
    }
}