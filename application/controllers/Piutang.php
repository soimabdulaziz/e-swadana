<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutang extends CI_Controller {
	

	public function index()
	{
		check_not_login();
		if ($this->session->userdata('Level') == "1") {
			$this->load->model("Piutang_model");
			$data["table_data"] = $this->Piutang_model->get_list();
			$this->template->load('template', 'piutang/piutang_v', $data);
		} else if ($this->session->userdata('Level') != "1") {
			$this->load->model('Piutang_model');
			$id = $this->session->userdata('id_anggota');
			$data["data_piutang"] = $this->Piutang_model->get_det($id);
	
			$this->db->select("*")->from("saldo_sim_w");
					$this->db->where("id_anggota", $id);
					$q = $this->db->get();
					$d = $q->result_array();
					@$data_s['d'] = $d[0];
			$this->template->load('template', 'Piutang/Piutang_det', $data, $data_s);
			echo ("detail");
		}
	}
	function invoice(){
		$this->load->model("Piutang_model");
		$id = $this->uri->segment(3);
		$this->db->select("*")->from("Piutang a");
		$this->db->join("saldo_piutang b", "b.id_anggota = a.id_anggota" );
        $this->db->join("anggota c", "c.id_anggota =  a.id_anggota");
		$this->db->where("a.id_piutang", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data_s['d'] = $d[0];
		$this->load->view('Piutang/invoice', $data_s);
		//redirect('Piutang');
	}

		function add(){
			$this->load->model('Piutang_model');
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
				$this->db->where("keterangan", "Simpanan sukarela");
				$q = $this->db->get();
				$d = $q->result_array();
				@$data['d'] = $d[0];
				$this->template->load('template', 'Piutang/Piutang_add', @$data);
			}
		}
	function tambah(){
		$this->load->model('Piutang_model');
		$id = $this->uri->segment(4);
		$jumlah = str_replace(".", "", $_POST['rupiah']);
		$tanggal = $_POST['tgl'];
		$post = array(
			'jumlah' => $jumlah,
			'tanggal' => $tanggal
		);
		//$post = $_POST['rupiah'];
		$this->Piutang_model->tambah($post);
		$this->session->set_flashdata('success', 'Piutang '.urldecode($id).' berhasil ditambahkan');
		redirect('Piutang');
	}
	function tarik(){
		$this->load->model('Piutang_model');
		$id = $this->uri->segment(3);
		$nama = $this->uri->segment(4);
		$jumlah = str_replace(".", "", $_POST['rupiah']);
		$tanggal = $_POST['tgl'];
		$post = array(
			'jumlah' => $jumlah,
			'tanggal' => $tanggal
		);
		$saldo = $this->Piutang_model->get_saldo($id);
	
		echo("$saldo");
		if ($saldo < $post['jumlah']) {
			$this->session->set_flashdata('pembayaran', 'Pembayaran piutang Gagal!, nominal yang anda masukkan melebihi total piutang');
			
			redirect('Piutang');
		} else {
			$this->Piutang_model->tarik($post);
			$this->session->set_flashdata('success', 'Pembayaran piutang '.urldecode($nama).' Berhasil.');
			redirect('Piutang');
		}
	}

	function detail(){
		$this->load->model('Piutang_model');
		$id = $this->uri->segment(3);
		$data["data_piutang"] = $this->Piutang_model->get_det($id);

		$this->db->select("*")->from("saldo_sim_w");
				$this->db->where("id_anggota", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data_s['d'] = $d[0];
		$this->template->load('template', 'Piutang/Piutang_det', $data, $data_s);
		echo ("detail");
	}

	
	}


    