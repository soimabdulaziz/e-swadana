<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shu extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('Shu_model');
		$this->load->model('Master_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
    }
    public function index()
	{
		check_not_login();
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('username','Username','required|is_unique[anggota.username]');
		$this->form_validation->set_rules('pass','Password','required|min_length[6]');
		$this->form_validation->set_rules('passconf','Konfirmasi Password', 'required|matches[pass] ');
		$this->form_validation->set_rules('JK','Jenis Kelamin','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$data["tahun"] = $this->Shu_model->getTahun();
	    //$data["total_jasa"] = $this->Shu_model->get_total_jasa();
		$this->template->load('template', 'shu/periode', $data);
	}

	function preview(){
		
		//$total_shu = $data["total_jasa"] + $data["shutakdibagi"] - $total_pengeluaran;
		if ($this->uri->segment(3) == "shutakdibagi") {
			$data1['tahun_takdibagi'] = $this->Shu_model->tahun_takdibagi();
			$this->template->load('template', 'shu/takdibagi', $data1);
		} else if ($this->uri->segment(3) != "shutakdibagi") {
			$data["total_jasa"] = $this->Shu_model->get_total_jasa();
			$data["pengeluaran"] = $this->Shu_model->get_pengeluaran();
			$data["shutakdibagi"] = $this->Shu_model->get_shutakdibagi();
			$data["takdibagi_now"] = $this->Shu_model->shutakdibagi_now();
			$data["shu_dibagi"] = $this->Shu_model->shudibagi();
			$data["shu"] = $this->Shu_model->shu();
			$pengeluaran = $this->Shu_model->get_pengeluaran();
			$total_jasa = $this->Shu_model->get_total_jasa();
			$shu_takdibagi = $this->Shu_model->get_shutakdibagi();
			$total_pengeluaran = 0;
			foreach ($pengeluaran as $row) {
				$total_pengeluaran = $total_pengeluaran + $row['jumlah'];
			}
			//$total_shu = $total_jasa + $shu_takdibagi - $total_pengeluaran;
			//$this->Shu_model->save($total_shu);
			$this->template->load('template', 'shu/shu_view', $data);
		}
		
		
	}
	
	function tak_dibagi() {
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('username','Username','required|is_unique[anggota.username]');
		$this->form_validation->set_rules('pass','Password','required|min_length[6]');
		$this->form_validation->set_rules('passconf','Konfirmasi Password', 'required|matches[pass] ');
		$this->form_validation->set_rules('JK','Jenis Kelamin','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$data['tahun_takdibagi'] = $this->Shu_model->tahun_takdibagi();
		$this->template->load('template', 'shu/takdibagi', $data);
	}

	function save() {
		$total_jasa = $this->Shu_model->get_total_jasa1();
        $shu_takdibagi_thn_lalu = $this->Shu_model->get_shutakdibagi1();
        $total_pengeluaran = $this->Shu_model->total_pengeluaran();
		$totalshu = $total_jasa + $shu_takdibagi_thn_lalu - $total_pengeluaran;
		$this->Shu_model->save_takdibagi($totalshu);
		redirect('Shu');
	}
}
    