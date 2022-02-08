<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('dashboard_model');
	}
	public function index()
	{
		$data['tower'] = $this->dashboard_model->get_data();
		$this->template->load('template', 'dashboard/dashboard', $data);
	}

	public function course() {
		$this->load->view('course');
	}

	function add(){
		$this->load->library('form_validation');

		$data['provider'] = $this->dashboard_model->prov();

		$this->form_validation->set_rules('id_tower', 'ID Tower', 'required');
		$this->form_validation->set_rules('lat', 'Latitude', 'required|numeric',
		array('numeric' => '%s Harus Berisi Angka')
		);
		$this->form_validation->set_rules('long', 'Longitude', 'required|numeric',
			array('numeric' => '%s Harus Berisi Angka')
		);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('desa', 'Desa', 'required');
		$this->form_validation->set_rules('kec', 'Kecamatan', 'required');
		$this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
		$this->form_validation->set_rules('tipe_men', 'Tipe Manara', 'required');
		$this->form_validation->set_rules('tipe_site', 'Tipe Site', 'required');
		$this->form_validation->set_rules('luas', 'Luas Tanah', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('penggunaan', 'Penggunaan', 'required');
		$this->form_validation->set_rules('provider', 'Provider', 'required');

		$this->form_validation->set_message('required', '%s Harus Diisi!');

		$this->form_validation->set_error_delimiters('<span class="help-block">' , '</span>');
		$id = $this->uri->segment(3);

		if ($this->form_validation->run() == FALSE) {
			$this->db->select("*")->from("tabel_tower");
			$this->db->where("id_tower", $id);
			$q = $this->db->get();
			$d = $q->result_array();
			@$data['d'] = $d[0];
			$this->template->load('template','dashboard/add_tower', @$data);

		} else {
			$post = $this->input->post(null, TRUE);
			if(empty($id)){
				$this->dashboard_model->add($post);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect("Dashboard");
			} else{
				$this->dashboard_model->edit($post);
				$this->session->set_flashdata('success', 'Data berhasil diupdate');
				redirect("dashboard");
			}
		}
	}
	function delete(){
		$id=$this->uri->segment(3);
		$this->dashboard_model->delete($id);
		$this->session->set_flashdata('delete', 'Data berhasil dihapus');
		redirect("dashboard");
	}

}
