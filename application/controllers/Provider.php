<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Provider extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('provider_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['provider'] = $this->provider_model->get_data();
		$this->template->load('template', 'provider/provider_view', $data);
	}
    public function add() {
        
		$this->form_validation->set_rules('nama', 'Nama Provider', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Provider', 'required');
		$this->form_validation->set_message('required', '%s Harus Diisi!');

		$this->form_validation->set_error_delimiters('<span class="help-block">' , '</span>');
		$id= $this->uri->segment(3);

		if ($this->form_validation->run() == FALSE) {
			$this->db->select("*")->from("provider");
			$this->db->where("id_provider", $id);
			$q = $this->db->get();
			$d = $q->result_array();
			@$data['d'] = $d[0];
			$this->template->load('template','provider/add_provider', @$data);

		} else {
			$post = $this->input->post(null, TRUE);
			if(empty($id)){
				$this->provider_model->add($post);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect("Provider");
			} else{
				$this->provider_model->edit($post);
				$this->session->set_flashdata('success', 'Data berhasil diupdate');
				redirect("Provider");
			}
		}
    }

	function delete(){
		$id=$this->uri->segment(3);
		$this->provider_model->delete($id);
		$this->session->set_flashdata('delete', 'Data berhasil dihapus');
		redirect("Provider");
	}


}
