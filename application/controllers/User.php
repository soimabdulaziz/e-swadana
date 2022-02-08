<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['user'] = $this->user_model->get_data();
		$this->template->load('template', 'user/user_view', $data);
	}
    public function add() {
        
		$id= $this->uri->segment(3);
		$post = $this->input->post(null, TRUE);
		if(empty($id)){
			$this->user_model->add($post);
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect("user");
		} else{
			$this->user_model->edit($post);
			$this->session->set_flashdata('success', 'Data berhasil diupdate');
			redirect("user");
		}
		
    }

	function add_view() {
		$this->template->load('template','user/add_user');

	}

	function delete(){
		$id=$this->uri->segment(3);
		$this->user_model->delete($id);
		$this->session->set_flashdata('delete', 'Data berhasil dihapus');
		redirect("user");
	}


}
