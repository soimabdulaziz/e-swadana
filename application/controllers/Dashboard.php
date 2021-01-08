<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$this->load->model('Dashboard_model');
		check_not_login();
		$user = $this->session->userdata('id_anggota');
		if($this->session->userdata("Level") == "2") {
			$data['saldo_w'] = $this->Dashboard_model->user_w($user);
			$data['saldo_s'] = $this->Dashboard_model->user_s($user);
			$data['saldo_p'] = $this->Dashboard_model->user_p($user);
			$data['saldo_j'] = $this->Dashboard_model->user_j($user);
			$this->template->load('template', 'dashboard', $data);
		} else if ($this->session->userdata("Level") == "1") {
			$data['saldo_w'] = $this->Dashboard_model->saldo_w();
			$data['saldo_s'] = $this->Dashboard_model->saldo_s();
			$data['saldo_p'] = $this->Dashboard_model->saldo_p();
			$data['saldo_j'] = $this->Dashboard_model->saldo_j();
			$this->template->load('template', 'dashboard', $data);
		} 
	}
}
