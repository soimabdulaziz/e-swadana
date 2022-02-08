<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login()
	{
		check_alredy_login();
		$this->load->view('login');
	}

	public function proccess()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('Login_model');
			$query = $this->Login_model->Login($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'id_user' =>  $row->id_user,
					'username' => $row->username,
					'level' => $row->Level
				);
				$this->session->set_userdata($params);
				echo "<script> 
					alert ('login berhasil');
					window.location = '".site_url('dashboard')."';
				</script>";
			} else{
				echo "<script> 
					alert ('Username / password salah');
					window.location = '".site_url('auth/login')."';
				</script>";
			}
		}

	}

	public function logout(){
		$params = array('id_user', 'username');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
	

}
