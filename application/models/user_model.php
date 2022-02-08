<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

    function get_data() {
        $this->db->select("*")->from("user");
        $q = $this->db->get()->result_array();
        return $q;
    }

    function add($post){
        $data['username'] = $_POST['username'];
        $data['Level'] =$_POST['level'];

        $this->db->insert('user' , $data);

    }
    function edit($post){
        $data['nama_user'] = $post['nama'];
        $data['alamat'] = $post['alamat'];
        $this->db->where('id_user', $this->uri->segment(3));
        $this->db->update('user' , $data);

    }
    function delete($id) {
        $this->db->where("id_user", $id);
        $this->db->delete("user");
    }
}