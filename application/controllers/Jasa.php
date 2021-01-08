<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa extends CI_Controller {
	

	public function index()
	{
		check_not_login();
		$this->load->model("Jasa_model");
		$tanggal = date('Y-m-d');
		$agt = $this->Jasa_model->get_list();
		foreach ($agt as $agt) {
			//echo $agt['sts'];
			$id = $agt['id_anggota'];
			$tanggal_p = $this->Jasa_model->get_tgl_p($id);
			$tempo = $this->Jasa_model->get_tempo($id);
			
			$origin = new DateTime($tempo);
			$target = new DateTime($tanggal);
			$month_now = strtolower(date('m',strtotime($tanggal_p)));
			$month_tempo = strtolower(date('m',strtotime($tempo)));

			if ($tanggal >= $tempo && $tempo != '0000-00-00') {
				$diff = date_diff($target, $origin);
				$diff_m = $diff->m;
				$diff_y = 12 * $diff->y;
				$range = $diff_m + $diff_y;
				echo $range;
				echo "y: " . $diff_y . 'm: '. $diff_m;
				if ($range == 0) {
					$this->Jasa_model->jasa_perbulan0($id);
				}
				if ($range > 0) {
					$range = $range + 1;
					$this->Jasa_model->jasa_perbulan($id, $range);
				}

			}
		/* 	if (strtolower(date('d',strtotime($tanggal))) < "20") {
				$this->Jasa_model->updatests($id);
			} */
			if (strtolower(date('m',strtotime($tanggal))) == "01" && $tanggal >= $tempo) {
				$this->Jasa_model->new_jasa($id);
			}
			/* if (strtolower(date('d',strtotime($tanggal))) >= "20" && $agt['sts'] == "Y") {
				$this->Jasa_model->jasa_perbulan($id);
			} */
		}
		if ($this->session->userdata('Level') == "1") {
			
			$data["table_data"] = $this->Jasa_model->get_list();
			$this->template->load('template', 'jasa/jasa_v', $data);
		} elseif ($this->session->userdata('Level') != "1") {
			$this->load->model('Jasa_model');
			$id = $this->session->userdata('id_anggota');
			$data["data_jasa"] = $this->Jasa_model->get_det($id);

			$this->db->select("*")->from("jasa");
					$this->db->where("id_anggota", $id);
					$q = $this->db->get();
					$d = $q->result_array();
					@$data_s['d'] = $d[0];
			$this->template->load('template', 'jasa/jasa_det', $data, $data_s);
			echo ("detail");
		}
	}

	function invoice(){
		$this->load->model("Jasa_model");
		$id = $this->uri->segment(3);
		$this->db->select("*")->from("jasa a");
		$this->db->join("saldo_jasa b", "b.id_anggota = a.id_anggota" );
        $this->db->join("anggota c", "c.id_anggota =  a.id_anggota");
		$this->db->where("a.id_jasa", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data_s['d'] = $d[0];
		$this->load->view('jasa/invoice', $data_s);
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
			$id = $this->uri->segment(3);
			$this->db->select("*")->from("saldo_jasa");
			$this->db->where("id_anggota", $id);
			$q = $this->db->get();
			$d = $q->result_array();
			@$data['d'] = $d[0];
			$this->template->load('template', 'jasa/jasa_add', @$data);
		}
	}
	function tarik(){
		$this->load->model('Jasa_model');
		$id = $this->uri->segment(3);
		$nama = $this->uri->segment(4);
		$jumlah = str_replace(",", "", $_POST['rupiah']);
		$tanggal = $_POST['tgl'];
		$post = array(
			'jumlah' => $jumlah,
			'tanggal' => $tanggal
		);
		$saldo = $this->Jasa_model->jasa_bln($id);
	
		echo("$saldo");
		if ($saldo < $post['jumlah']) {
			$this->session->set_flashdata('pembayaran', ' Pembayaran Jasa Gagal! Nominal yang anda masukkan melebihi total Jasa');
			redirect('Jasa');
		} else {
			$this->Jasa_model->tarik($post);
			$this->session->set_flashdata('success', 'Pembayaran Jasa '.urldecode($nama).' Berhasil.');
			redirect('Jasa');
		}
	}
	function detail(){
		$this->load->model('Jasa_model');
		$id = $this->uri->segment(3);
		$data["data_jasa"] = $this->Jasa_model->get_det($id);

		$this->db->select("*")->from("jasa");
				$this->db->where("id_anggota", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data_s['d'] = $d[0];
		$this->template->load('template', 'jasa/jasa_det', $data, $data_s);
		echo ("detail");
	}

	
	}


    