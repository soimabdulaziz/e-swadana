<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
    public function index()
	{
		check_not_login();
		$this->load->model("Master_model");
	    $data["table_data"] = $this->Master_model->get_master();
		$this->template->load('template', 'master/master_view', $data);
	}
	
	function add(){
		$this->load->model('Master_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$id = $this->uri->segment(3);
		
		if ($id != "3") {
			$this->form_validation->set_rules('rupiah','Jumlah','required');
			//$this->form_validation->set_rules('jumlah','Presentase','required');
			if($this->form_validation->run() != false){
					$post = str_replace(".", "", $_POST['rupiah']);
					$this->Master_model->update($post);
					$this->session->set_flashdata('success', 'Data berhasil disimpan');
					redirect('master');
			}else{
				$this->db->select("*")->from("maseter_data");
				$this->db->where("id_master", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data['d'] = $d[0];
				$this->template->load('template', 'master/master_add', @$data);
			}
		} elseif ($id == "3") {
			$this->form_validation->set_rules('jumlah','Presentase','required');
			if($this->form_validation->run() != false){
				$post = $_POST['jumlah'];
				$this->Master_model->update($post);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('master');
			}else{
				$this->db->select("*")->from("maseter_data");
				$this->db->where("id_master", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data['d'] = $d[0];
				$this->template->load('template', 'master/master_add', @$data);
			}
		}
	}
}
    