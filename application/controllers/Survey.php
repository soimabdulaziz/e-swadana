<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('Survey_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['survey'] = $this->Survey_model->get_data();
		$this->template->load('template', 'survey/survey_view', $data);
	}
	public function list_tower(){
		$data['list_tower'] = $this->Survey_model->get_list();
		$this->template->load('template', 'survey/list_twr', $data);
	}
	public function detail()
	{
		$id = $this->uri->segment(3);
		$q = $this->db->query("SELECT * FROM survei a INNER JOIN tabel_tower b ON a.id_tower = b.id_tower INNER JOIN foto c ON a.id_survei = c.id_survei  WHERE a.id_survei = $id");
		$d = $q->result_array();
		@$data['d'] = $d[0];
		$this->template->load('template', 'survey/survey_det', $data);
	}
	public function print()
	{
		$id = $this->uri->segment(3);
		$q = $this->db->query("SELECT * FROM survei a INNER JOIN tabel_tower b ON a.id_tower = b.id_tower INNER JOIN foto c ON a.id_survei = c.id_survei  WHERE a.id_survei = $id");
		$d = $q->result_array();
		@$data['d'] = $d[0];
		$this->template->load('template', 'survey/survey_print', $data);
	}
    public function add() {
        
		$this->form_validation->set_rules('lampu_penerangan', 'Lampu Penerangan', 'required');
		$this->form_validation->set_rules('gembok', 'Gembok', 'required');
		$this->form_validation->set_rules('jumlah_operator', 'Jumlah Operator', 'required');
		$this->form_validation->set_rules('kondisi_lingkungan', 'Kondisi Lingkungan', 'required');
		$this->form_validation->set_rules('wawancara_warga', 'Wawancara Warga', 'required');
		$this->form_validation->set_rules('rekomendasi_tim', 'Rekomendasi Tim', 'required');
		$this->form_validation->set_rules('surveyor_1', 'Surveyor 1', 'required');
		$this->form_validation->set_rules('surveyor_2', 'Surveyor 2', 'required');
		$this->form_validation->set_rules('surveyor_3', 'Surveyor 3', 'required');



		$this->form_validation->set_message('required', '%s Harus Diisi!');

		$this->form_validation->set_error_delimiters('<span class="help-block">' , '</span>');
		$id= $this->uri->segment(3);

		if ($this->form_validation->run() == FALSE) {
			if(!empty($this->uri->segment(4))) {
				$this->db->select("*")->from("survei");
				$this->db->where("id_survei", $id);
				$q = $this->db->get();
				$d = $q->result_array();
				@$data['d'] = $d[0];
			}
			$data['username'] = $this->Survey_model->get_username();
			$this->template->load('template','survey/add', @$data);

		} else {
           /*  $config['uoload_path'] = './uploads/';
            $config['allowed_types'] =  'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['file_name'] = 'image-'.date('Y-m-d H:i:s');
            $this->load->library('upload', $config);

            if(@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')){
                    $post['image'] = $this->upload->data('file_name');
                    $post['image'] = $this->upload->data('file_name');
                    $post = $this->input->post(null, TRUE);
				    $this->Survey_model->add($post);
				    $this->session->set_flashdata('success', 'Data berhasil disimpan');
				    redirect("Survey");
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('delete', $error);
				    redirect("Survey");
                }
            } */
		}
    }

	function edit() {
		if(@$_FILES['image']['name'] != null) {
			$this->uploadimg();
		}


        if(@$_FILES['image']['name'] && @$_FILES['image2']['name'] != null) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] =  'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['file_name'] = time() . '-' . 'img';
			$this->load->library('upload', $config);
            if ($this->upload->do_upload('image') && $this->upload->do_upload('image2')){
				$id_survei = $this->Survey_model->max_id_survey();
                $post['image'] = $this->upload->data('file_name');
                $post['image2'] = $this->upload->data('file_name');
				$post['id_survei'] = $id_survei+1;
                //$post = $this->input->post(null, TRUE);
                $this->Survey_model->edit($post);
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect("Survey");
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('delete', $error);
                redirect("Survey");
            }
        }
	}

	
	function export() {
		$data = $this->Survey_model->get_data();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("");
		$object->getProperties()->setLastModifiedBy("");
		$object->getProperties()->setTitle("Survey Tower");

		$object->setActiveSheetIndex(0);
		$object->getActiveSheet()->setCellValue('I1', 'Rekapitulasi Survey Tower');
		$object->getActiveSheet()->setCellValue('B3', 'Site ID');
		$object->getActiveSheet()->setCellValue('C3', 'Tanggal');
		$object->getActiveSheet()->setCellValue('D3', 'Alamat Site');
		$object->getActiveSheet()->setCellValue('E3', 'Longitude ');
		$object->getActiveSheet()->setCellValue('F3', 'Latitude');
		$object->getActiveSheet()->setCellValue('G3', 'Tinggi');
		$object->getActiveSheet()->setCellValue('H3', 'Jenis');
		$object->getActiveSheet()->setCellValue('I3', 'Tipe');
		$object->getActiveSheet()->setCellValue('J3', 'Pemilik Menara');
		$object->getActiveSheet()->setCellValue('K3', 'Lampu Penerangan');
		$object->getActiveSheet()->setCellValue('L3', 'Gembok');
		$object->getActiveSheet()->setCellValue('M3', 'Jumlah Operator');
		$object->getActiveSheet()->setCellValue('N3', 'Kondisi Lingkungan');
		$object->getActiveSheet()->setCellValue('O3', 'Tinggi');
		$object->getActiveSheet()->setCellValue('P3', 'Wawancara Warga');
		$object->getActiveSheet()->setCellValue('Q3', 'Rekomendasi Tim');
		$object->getActiveSheet()->setCellValue('R3', 'Surveyor 1');
		$object->getActiveSheet()->setCellValue('S3', 'Surveyor 2');
		$object->getActiveSheet()->setCellValue('T3', 'Surveyor 3');



		//$object->getActiveSheet()->setCellValue('P3', 'JUMLAH');



			$row = 4;
			foreach ($data as $list) {
				$date = date('d F Y', strtotime(''.$list['tanggal'].''));
				$object->getActiveSheet()->setCellValue('B'.$row, $list['id_tower'] );
				$object->getActiveSheet()->setCellValue('C'.$row, $date );
				$object->getActiveSheet()->setCellValue('D'.$row, $list['alamat'] );
				$object->getActiveSheet()->setCellValue('E'.$row, $list['long'] );
				$object->getActiveSheet()->setCellValue('F'.$row, $list['lat'] );
				$object->getActiveSheet()->setCellValue('G'.$row, $list['tinggi'] );
				$object->getActiveSheet()->setCellValue('H'.$row, $list['tipe_site'] );
				$object->getActiveSheet()->setCellValue('I'.$row, $list['tipe_menara'] );
				$object->getActiveSheet()->setCellValue('J'.$row, $list['provider'] );
				$object->getActiveSheet()->setCellValue('K'.$row, $list['lampu_penerangan'] );
				$object->getActiveSheet()->setCellValue('L'.$row, $list['gembok'] );
				$object->getActiveSheet()->setCellValue('M'.$row, $list['jumlah_operator'] );
				$object->getActiveSheet()->setCellValue('N'.$row, $list['kondisi_lingkungan'] );
				$object->getActiveSheet()->setCellValue('O'.$row, $list['tinggi'] );
				$object->getActiveSheet()->setCellValue('P'.$row, $list['wawancara_warga'] );
				$object->getActiveSheet()->setCellValue('Q'.$row, $list['rekomendasi_tim'] );
				$object->getActiveSheet()->setCellValue('R'.$row, $list['surveyor_1'] );
				$object->getActiveSheet()->setCellValue('S'.$row, $list['surveyor_2'] );
				$object->getActiveSheet()->setCellValue('T'.$row, $list['surveyor_3'] );

				$row++;
			}

			

		
		$filename="Hasil Survey Tower'..'".'.xlsx';

		$object->getActiveSheet()->setTitle("Hasil Survey Tower");

	    header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Hasil Survey Tower_.xlsx"');
	  	header('Cache-Control: max-age=0');
		
		 $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');



	}

	function delete(){
		$id=$this->uri->segment(3);
		$this->Survey_model->delete($id);
		$this->session->set_flashdata('delete', 'Data berhasil dihapus');
		redirect("Survey");
	}

	function uploadimg(){
		$id_survei = $this->Survey_model->max_id_survey();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] =  'gif|jpg|png|jpeg';
		$config['max_size'] = 2048;
		$config['file_name'] = time() . '-' . 'img';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')){
			if(@$_FILES['image']['name'] != null) {
				$post['image'] = $this->upload->data('file_name');
				$post['id_survei'] = $id_survei+1;
				//$post['image2'] = $this->upload->data('file_name');
				$this->Survey_model->add_image($post);
	
			}
		}
		
	}

	function uploadimg2d(){
		$id_survei = $this->Survey_model->max_id_survey();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] =  'gif|jpg|png|jpeg';
		$config['max_size'] = 2048;
		$config['file_name'] = time() . '-' . 'img2';
		$this->load->library('upload', $config);
		if(@$_FILES['image2']['name'] != null) {
			$post['image2'] = $this->upload->data('file_name');
			$post['id_survei'] = $id_survei+1;
			//$post['image2'] = $this->upload->data('file_name');
			$this->Survey_model->add_image2($post);

		}
	}


    function do_upload(){

		if(@$_FILES['image']['name'] != null) {
			$this->uploadimg();
		}


        if(@$_FILES['image']['name'] && @$_FILES['image2']['name'] != null) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] =  'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['file_name'] = time() . '-' . 'img';
			$this->load->library('upload', $config);
            if ($this->upload->do_upload('image') && $this->upload->do_upload('image2')){
				$id_survei = $this->Survey_model->max_id_survey();
                $post['image'] = $this->upload->data('file_name');
                $post['image2'] = $this->upload->data('file_name');
				$post['id_survei'] = $id_survei+1;
                //$post = $this->input->post(null, TRUE);
                $this->Survey_model->add($post);
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect("Survey");
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('delete', $error);
                redirect("Survey");
            }
        }
    }

}
