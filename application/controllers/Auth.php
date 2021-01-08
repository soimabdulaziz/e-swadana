<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login()
	{
		check_alredy_login();
		$this->load->view('login');
	}
	public function process(){

		$post = $this->input->post(null, TRUE);
		if(isset($_POST['login'])) {
			$this->load->model("Login_model");
			$q = $this->Login_model->login($post);
			if($q->num_rows() > 0){
				$row = $q->row();
				$params = array(
					'id_anggota' => $row->id_anggota,
					'Level' => $row->Level,
					'username' => $row->username,
					'name'	=> $row->nama,
					'new' => $row->new
				);
				$this->session->set_userdata($params);
				echo "<script> 
					alert ('login berhasil');
					window.location = '".site_url('dashboard')."';
				</script>";

			} else {
				echo "<script> 
				alert ('Username / password salah');
				window.location = '".site_url('auth/login')."';
			</script>";
			}

			
		}

	}

	public function logout() {
		$params = array('id_anggota', 'Level');
		$this->session->unset_userdata($params);
		redirect('auth/login');

	}
}