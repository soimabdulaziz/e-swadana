<?php

class Ganti_pass_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function update() {
        $id= $this->session->userdata("id_anggota");
        $this->db->where("id_anggota", $id);
        $data['pass'] = sha1($_POST['pass']);
        $data['new'] = "N";
        $this->db->update("anggota", $data);

    }
    function delete($id) {
        $this->db->where("id_anggota", $id);;
        $this->db->delete("anggota");
    }
}
 

?>