<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_wajib extends CI_Controller {
	

	public function index()
	{
		check_not_login();
		if ($this->session->userdata('Level') == "1") {
			$this->load->model("Simpanan_wajib_model");
			$data["table_data"] = $this->Simpanan_wajib_model->get_list();
			$this->template->load('template', 'simpanan_wajib/simpanan_wajib_v', $data);
		} else if($this->session->userdata('Level') != "1") {
			$this->load->model('Simpanan_wajib_model');
			$id = $this->session->userdata('id_anggota');
			$data["table_data"] = $this->Simpanan_wajib_model->get_det($id);

				$this->db->select("*")->from("saldo_sim_w");
				$this->db->where("id_anggota", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data_s['d'] = $d[0];
			$this->template->load('template', 'simpanan_wajib/simpanan_wajib_det', $data, $data_s);
			echo ("detail");
		}
	}

	function invoice(){
		$this->load->model("Simpanan_wajib_model");
		$id = $this->uri->segment(3);
		$this->db->select("*")->from("simpanan_wajib a");
		$this->db->join("saldo_sim_w b", "b.id_anggota = a.id_anggota" );
        $this->db->join("anggota c", "c.id_anggota =  a.id_anggota");
		$this->db->where("a.id_simjib", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data_s['d'] = $d[0];
		$this->load->view('simpanan_wajib/invoice', $data_s);
		//redirect('simpanan_wajib');
	}
	function laporan(){
		$this->load->model('Simpanan_wajib_model');
		$id = $this->uri->segment(3);
		$data["table_data"] = $this->Simpanan_wajib_model->get_det($id);

		$this->db->select("*")->from("saldo_sim_w");
				$this->db->where("id_anggota", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data_s['d'] = $d[0];
		$this->template->load('template', 'simpanan_wajib/laporan', $data, $data_s);
		echo ("detail");
	}
		function add(){
			$this->load->model('Simpanan_wajib_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$id = $this->uri->segment(3);
			
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('username','Username','required|is_unique[anggota.username]');
			$this->form_validation->set_rules('pass','Password','required|min_length[6]');
			$this->form_validation->set_rules('passconf','Konfirmasi Password', 'required|matches[pass] ');
			$this->form_validation->set_rules('JK','Jenis Kelamin','required');
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
				$this->db->select("*")->from("maseter_data");
				$this->db->where("keterangan", "Simpanan Wajib");
				$q = $this->db->get();
				$d = $q->result_array();
				@$data['d'] = $d[0];
				$this->template->load('template', 'simpanan_wajib/simpanan_wajib_add', @$data);
			}
		}
	function tambah(){
		$this->load->model('Simpanan_wajib_model');
		$id = $this->uri->segment(4);
		$jumlah = str_replace(".", "", $_POST['rupiah']);
		$tanggal = $_POST['tgl'];
		$post = array(
			'jumlah' => $jumlah,
			'tanggal' => $tanggal
		);
		
		//$post = $_POST['rupiah'];
		$this->Simpanan_wajib_model->tambah($post);
		$this->session->set_flashdata('success', 'Simpanan Wajib '.urldecode($id).' berhasil ditambahkan');
		redirect('simpanan_wajib');
	}
	function tarik(){
		$this->load->model('Simpanan_wajib_model');
		$id = $this->uri->segment(3);
		$nama = $this->uri->segment(4);
		$jumlah = str_replace(".", "", $_POST['rupiah']);
		$tanggal = $_POST['tgl'];
		$post = array(
			'jumlah' => $jumlah,
			'tanggal' => $tanggal
		);
		
		$saldo = $this->Simpanan_wajib_model->get_saldo($id);
	
		//echo("$saldo");
		if ($saldo < $jumlah) {
			$this->session->set_flashdata('warning', 'Saldo Tidak Cukup');
			redirect('simpanan_wajib');
		} else {
			$this->Simpanan_wajib_model->tarik($post);
			$this->session->set_flashdata('success', 'Penaraikan Simpanan Wajib '.urldecode($nama).' Berhasil.');
			redirect('simpanan_wajib');
		}
	}

	function detail(){
		$this->load->model('Simpanan_wajib_model');
		$id = $this->uri->segment(3);
		$data["table_data"] = $this->Simpanan_wajib_model->get_det($id);

		$this->db->select("*")->from("saldo_sim_w");
				$this->db->where("id_anggota", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data_s['d'] = $d[0];
		$this->template->load('template', 'simpanan_wajib/simpanan_wajib_det', $data, $data_s);
		echo ("detail");
	}

	
	}


    