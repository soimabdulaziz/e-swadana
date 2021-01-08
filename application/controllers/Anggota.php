<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	public function index()
	{
		check_not_login();
		$this->load->model("Anggota_model");
		$data["table_data"] = $this->Anggota_model->getAnggota();
		$this->template->load('template', 'anggota/anggota_view', $data);
	}

	function add(){
		$this->load->model('Anggota_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$id = $this->uri->segment(3);
		
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('username','Username','required|is_unique[anggota.username]');
		$this->form_validation->set_rules('pass','Password','required|min_length[6]');
		$this->form_validation->set_rules('passconf','Konfirmasi Password', 'required|matches[pass] ');
		$this->form_validation->set_rules('JK','Jenis Kelamin','required');
		$this->form_validation->set_rules('Level','Jenis Kelamin','required');
		$this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() != false){
			if (empty($id)) {
			
				$this->Anggota_model->insert($_POST);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('anggota');
			} else {
				$this->Anggota_model->update($_POST);
				$this->session->set_flashdata('success', 'Data berhasil diupdate');
				redirect('anggota');
				
			}
			
		}else{
			$this->db->select("*")->from("anggota");
			$this->db->where("id_anggota", $id);
			$q = $this->db->get();
			$d = $q->result_array();
			@$data['d'] = $d[0];
			$this->template->load('template', 'anggota/anggota_add', @$data);
		}
	}
	function delete() {
	$this->load->model('Anggota_model');
	echo "<script> 
					alert ('login berhasil');
				</script>";
		$id = $this->uri->segment(3);
		$this->Anggota_model->delete($id);
		$this->session->set_flashdata('delete', 'Data berhasil dihapus');
		redirect('anggota');
	}
}
    