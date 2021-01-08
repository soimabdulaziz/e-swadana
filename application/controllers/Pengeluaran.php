<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {
    public function index()
	{
		check_not_login();
		$this->load->model("Pengeluaran_model");
	    $data["table_data"] = $this->Pengeluaran_model->get_pengeluaran();
		$this->template->load('template', 'Pengeluaran/pengeluaran_V', $data);
	}
	function add(){
		$this->load->model('Pengeluaran_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$id = $this->uri->segment(3);
		
		$this->form_validation->set_rules('rupiah','Jumlah','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');

		if($this->form_validation->run() != false){
			if (empty($id)) {
				
				$jumlah = str_replace(".", "", $_POST['rupiah']);
				$sumber_dana = $_POST['sumber_dana'];
				$saldo_sosial = $this->Pengeluaran_model->dana_sosial();
				$saldo_cadangan = $this->Pengeluaran_model->dana_cadangan();
				if ($sumber_dana == "Dana Cadangan") {
					if ($saldo_cadangan < $jumlah) {
						$this->session->set_flashdata('gagal', 'Saldo Dana Cadangan Tidak Cukup');
						redirect('Pengeluaran');
					} else if ($saldo_cadangan > $jumlah) {
						$this->Pengeluaran_model->insert_cadangan($_POST);
						$this->session->set_flashdata('success', 'Data berhasil disimpan');
						redirect('Pengeluaran');
					}
				} else if ($sumber_dana == "Dana Sosial") {
					if ($saldo_sosial < $jumlah) {
						$this->session->set_flashdata('gagal', 'Saldo Dana Sosial Tidak Cukup');
						redirect('Pengeluaran');
					} else if ($saldo_sosial > $jumlah) {
						$this->Pengeluaran_model->insert_sosial($_POST);
						$this->session->set_flashdata('success', 'Data berhasil disimpan');
						redirect('Pengeluaran');
					}
				}
			} else if(!empty($id)) {
				echo "$id";
				$this->Pengeluaran_model->update($id);
				$this->session->set_flashdata('success', 'Data berhasil diupdate');
				redirect('Pengeluaran');
				
			}
			
		}else{
			$this->db->select("*")->from("pengeluaran");
			$this->db->where("id_pengeluaran", $id);
			$q = $this->db->get();
			$d = $q->result_array();
			@$data['d'] = $d[0];
			$this->template->load('template', 'Pengeluaran/pengeluaran_add', @$data);
		}
	}

	function delete() {
		$this->load->model('Pengeluaran_model');
		
			$id = $this->uri->segment(3);
			$this->Pengeluaran_model->delete($id);
			$this->session->set_flashdata('delete', 'Data berhasil dihapus');
			redirect('Pengeluaran');
		}
}
    