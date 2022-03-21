<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_model extends CI_Model {

    public function last_id(){
        $this->db->select_max('id_foto')->from("foto");
        $q= $this->db->get()->row()->id_foto;
        return $q;
    }
    public function add_image($post) {
        $last_id = $this->last_id();
        $data['id_foto'] = $last_id +1;
        $data['id_survei'] = $post['id_survei'];
        $data['nama_file'] = $post['image'];
        $this->db->insert("foto", $data);
    }
  /*   public function add_image2($post) {
        $data['id_survei'] = $post['id_survei'];
        $data['nama_file'] = $post['image2'];
        $this->db->insert("foto", $data);
    } */

    public function max_id_survey() {
       $q = $this->db->query("SELECT MAX(id_survei) as id_survei FROM foto");
       $d = $q->row()->id_survei;
       return $d;
    }

    public function add($post) {
        $data['id_tower'] = $this->uri->segment(3);
        $data['tanggal'] = $_POST['tgl'];
        $data['lampu_penerangan'] = $_POST['lampu_penerangan'];
        $data['gembok'] = $_POST['gembok'];
        $data['jumlah_operator'] = $_POST['jumlah_operator'];
        $data['kondisi_lingkungan'] = $_POST['kondisi_lingkungan'];
        $data['wawancara_warga'] = $_POST['wawancara_warga'];
        $data['rekomendasi_tim'] = $_POST['rekomendasi_tim'];
        $data['surveyor_1'] = $_POST['surveyor_1'];
        $data['surveyor_2'] = $_POST['surveyor_2'];
        $data['surveyor_3'] = $_POST['surveyor_3'];
        $data['image'] = $post['image'];
        $data['image2'] = $post['image2'];
        $data['id_survei'] = $post['id_survei'];
        $this->db->insert("survei", $data);
    }

    function edit($post){
        $data['tanggal'] = $_POST['tgl'];
        $data['lampu_penerangan'] = $_POST['lampu_penerangan'];
        $data['gembok'] = $_POST['gembok'];
        $data['jumlah_operator'] = $_POST['jumlah_operator'];
        $data['kondisi_lingkungan'] = $_POST['kondisi_lingkungan'];
        $data['wawancara_warga'] = $_POST['wawancara_warga'];
        $data['rekomendasi_tim'] = $_POST['rekomendasi_tim'];
        $data['surveyor_1'] = $_POST['surveyor_1'];
        $data['surveyor_2'] = $_POST['surveyor_2'];
        $data['surveyor_3'] = $_POST['surveyor_3'];
        $data['image'] = $post['image'];
        $data['image2'] = $post['image2'];
        $data['id_survei'] = $post['id_survei'];
        $this->db->where("id_survei", $this->uri->segment(3));
        $this->db->update("survei", $data);
    }

    function get_list(){
        $this->db->select("*")->from("tabel_tower");
        $q = $this->db->get()->result_array();
        return $q;
    }

    function get_data(){
       $q = $this->db->query("SELECT * FROM survei a INNER JOIN tabel_tower b ON a.id_tower = b.id_tower INNER JOIN foto c ON a.id_survei = c.id_survei ");
       $d = $q->result_array();
       return $d;

    }

    function get_username(){
        $this->db->select("*")->from('user');
        $q = $this->db->get()->result_array();
        return $q;
    }

    function delete($id){
        $this->db->where("id_survei", $id);
        $this->db->delete("survei");

        $this->db->where("id_survei", $id);
        $this->db->where("id_foto", $this->uri->segment(4));
        $this->db->delete("foto");

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