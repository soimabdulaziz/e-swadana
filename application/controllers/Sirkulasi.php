<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sirkulasi extends CI_Controller {
	

	public function index()
	{
		check_not_login();
		$this->load->model("Sirkulasi_model");
		$data["table_data"] = $this->Sirkulasi_model->get_list();
		$data["tahun"] = $this->Sirkulasi_model->tahun();
		$this->template->load('template', 'sirkulasi/sirkulasi_v', $data);
	}
	function export() {
		$bulan = $_POST['bulan'];
		if ($bulan == 1) {
			$bulan = "Januari";
		} elseif($bulan == 2) {
			$bulan = "Februari";
		} elseif($bulan == 3) {
			$bulan = "Maret";
		} elseif($bulan == 4) {
			$bulan = "April";
		} elseif($bulan == 5) {
			$bulan = "Mei";
		} elseif($bulan == 6){
			$bulan = "Juni";
		} elseif($bulan == 7) {
			$bulan = "Juli";
		} elseif($bulan == 8) {
			$bulan = "Agustus";
		} elseif($bulan == 9) {
			$bulan = "September";
		} elseif($bulan == 10) {
			$bulan = "Oktober";
		} elseif($bulan == 11) {
			$bulan = "November";
		} elseif($bulan == 12) {
			$bulan = "Desember";
		}
		$tahun = $_POST['tahun'];
		$this->load->model("Sirkulasi_model");
		$data["anggota"] = $this->Sirkulasi_model->get_anggota();
		$data["wajib"] = $this->Sirkulasi_model->saldo_wajib();
		$data["sukarela"] = $this->Sirkulasi_model->saldo_sukarela();
		$data["piutang"] = $this->Sirkulasi_model->saldo_piutang();
		$data["jasa"] = $this->Sirkulasi_model->saldo_jasa();


		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Koperasi E-swadana");
		$object->getProperties()->setLastModifiedBy("Koperasi E-swadana");
		$object->getProperties()->setTitle("Sirkulasi");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('C1', 'Sirkulasi '.$bulan .$tahun);
		$object->getActiveSheet()->setCellValue('A3', 'NO');
		$object->getActiveSheet()->setCellValue('B3', 'NAMA');
		$object->getActiveSheet()->setCellValue('C3', 'SIMPANAN WAJIB');
		$object->getActiveSheet()->setCellValue('D3', 'SIMPANAN SUKARELA');
		$object->getActiveSheet()->setCellValue('E3', 'PIUTANG');
		$object->getActiveSheet()->setCellValue('F3', 'JASA');

		$baris = 4;
		$no = 1;

		foreach ($data["anggota"] as $nama) {
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $nama['nama']);
			foreach ($data['wajib'] as $row) {
				if ($nama['id_anggota'] == $row['id_anggota']) {
					$object->getActiveSheet()->setCellValue('C'.$baris, $row['saldo']);
				}
			}
			foreach ($data['sukarela'] as $row) {
				if ($nama['id_anggota'] == $row['id_anggota']) {
					$object->getActiveSheet()->setCellValue('D'.$baris, $row['saldo_sukarela']);
				}
			}
			foreach ($data['piutang'] as $row) {
				if ($nama['id_anggota'] == $row['id_anggota']) {
					$object->getActiveSheet()->setCellValue('E'.$baris, $row['saldo_piutang']);
				}
			}
			foreach ($data['jasa'] as $row) {
				if ($nama['id_anggota'] == $row['id_anggota']) {
					$object->getActiveSheet()->setCellValue('F'.$baris, $row['saldo_jasa']);
				}
			}
			$baris++;

		}
		
		$filename="'Sirkulasi'.$bulan.$tahun".'.xlsx';

		$object->getActiveSheet()->setTitle("Sirkulasi");

	    header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Sirkulasi_'.$bulan.'_'.$tahun.'.xlsx"');
	  	header('Cache-Control: max-age=0');
		
		 $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

	}


	
	}


    