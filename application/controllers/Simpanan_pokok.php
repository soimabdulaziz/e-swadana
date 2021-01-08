<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_pokok extends CI_Controller {
	

	public function index()
	{
		check_not_login();
		$this->load->model("Simpanan_pokok_model");
		$data["table_data"] = $this->Simpanan_pokok_model->get_list();
		$this->template->load('template', 'simpanan_pokok/simpanan_pokok_v', $data);
	}

	
	}


    