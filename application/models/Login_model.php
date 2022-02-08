<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function login($post) {
        $this->db->select("*")->from("user");
        $this->db->where("username", $post['username']);
        $this->db->where("password", sha1($post['password']));
        $q = $this->db->get();
        return $q;
    }
/*     public function get($id = null) {
        $this->db->select("*")->from("anggota");
        if($id != null) {
            $this->db->where("id_anggota", $id);
        }
        $q= $this->db->get();
        return $q;
    } */

}