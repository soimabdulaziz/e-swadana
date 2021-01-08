<?php
class Fungsi {
    protected $ci;
    
    public function __construct() {
        $this->ci =& get_instance();
    }
    function user_login() {
        $this->ci->load->model('Login_model');
        $id_anggota = $this->ci->session->userdata('id_anggota');
        $user_data = $this->ci->Login_model->get($id_anggota)->row();
        return $user_data;
    }
}
?>