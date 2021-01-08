<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_saldo_sukarela extends CI_Controller {
	public function index()
	{
		check_not_login();
		$this->load->model("Laporan_saldo_sukarela_model");
	   $data["data_anggota"] = $this->Laporan_saldo_sukarela_model->get_list();
	  // $data["cek01"] = $this->Laporan_saldo_sukarela_model->cek01();
	   $data["tahun"] = $this->Laporan_saldo_sukarela_model->tahun();
	 //  if($cek01->num_rows() )
        $data["bln_1"] = $this->Laporan_saldo_sukarela_model->get_jum();
		$this->template->load('template', 'Laporan_saldo_sukarela/Laporan_saldo_sukarela_v',  $data);
	}
	function export() {
		$thn = $_POST['tahun'];
		$this->load->model("Laporan_saldo_sukarela_model");
		$d = $_POST['tahun'];
		$data["excel"] = $this->Laporan_saldo_sukarela_model->cek01($d);
		$data["nama"] = $this->Laporan_saldo_sukarela_model->get_list();
		$data["saldo_s"] = $this->Laporan_saldo_sukarela_model->saldo_sebelum();
        $data["jan"] = $this->Laporan_saldo_sukarela_model->jan();
		$data["jan1"] = $this->Laporan_saldo_sukarela_model->jan1();
		$data["feb"] = $this->Laporan_saldo_sukarela_model->feb();
        $data["feb1"] = $this->Laporan_saldo_sukarela_model->feb1();
		//$data["feb2"] = $this->Laporan_saldo_sukarela_model->feb2();
        $data["mar"] = $this->Laporan_saldo_sukarela_model->mar();
        $data["mar1"] = $this->Laporan_saldo_sukarela_model->mar1();
		//$data["mar2"] = $this->Laporan_saldo_sukarela_model->mar2();
        $data["apr"] = $this->Laporan_saldo_sukarela_model->apr();
        $data["apr1"] = $this->Laporan_saldo_sukarela_model->apr1(); 
		//$data["apr2"] = $this->Laporan_saldo_sukarela_model->apr2();
		$data["mei"] = $this->Laporan_saldo_sukarela_model->mei();
        $data["mei1"] = $this->Laporan_saldo_sukarela_model->mei1();
		//$data["mei2"] = $this->Laporan_saldo_sukarela_model->mei2();
        $data["jun"] = $this->Laporan_saldo_sukarela_model->jun();
		$data["jun1"] = $this->Laporan_saldo_sukarela_model->jun1();
		//$data["jun2"] = $this->Laporan_saldo_sukarela_model->jun2();
        $data["jul"] = $this->Laporan_saldo_sukarela_model->jul();
        $data["jul1"] = $this->Laporan_saldo_sukarela_model->jul1();
        //$data["jul2"] = $this->Laporan_saldo_sukarela_model->jul2();
        $data["agus"] = $this->Laporan_saldo_sukarela_model->agus();
		$data["agus1"] = $this->Laporan_saldo_sukarela_model->agus1();
		//$data["agus2"] = $this->Laporan_saldo_sukarela_model->agus2();
        $data["sep"] = $this->Laporan_saldo_sukarela_model->sep();
		$data["sep1"] = $this->Laporan_saldo_sukarela_model->sep1();
		//$data["sep2"] = $this->Laporan_saldo_sukarela_model->sep2();
        $data["okt"] = $this->Laporan_saldo_sukarela_model->okt();
		$data["okt1"] = $this->Laporan_saldo_sukarela_model->okt1();
		//$data["okt2"] = $this->Laporan_saldo_sukarela_model->okt2();
        $data["nov"] = $this->Laporan_saldo_sukarela_model->nov();
		$data["nov1"] = $this->Laporan_saldo_sukarela_model->nov1();
		//$data["nov2"] = $this->Laporan_saldo_sukarela_model->nov2();
        $data["des"] = $this->Laporan_saldo_sukarela_model->des();
		$data["des1"] = $this->Laporan_saldo_sukarela_model->des1();
		//$data["des2"] = $this->Laporan_saldo_sukarela_model->des2();
		$data["saldo"] = $this->Laporan_saldo_sukarela_model->saldo();



		$tahun = $_POST['tahun'] - 1;

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Koperasi E-swadana");
		$object->getProperties()->setLastModifiedBy("Koperasi E-swadana");
		$object->getProperties()->setTitle("Laporan Saldo SSR");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('G1', 'Laporan Saldo SSR '.$thn);
		$object->getActiveSheet()->setCellValue('A3', 'NO');
		$object->getActiveSheet()->setCellValue('B3', 'NAMA');
		$object->getActiveSheet()->setCellValue('C3', 'SALDO TAHUN '.$tahun.'');
		$object->getActiveSheet()->setCellValue('D3', 'JANUARI');
		$object->getActiveSheet()->setCellValue('E3', 'FEBRUARI');
		$object->getActiveSheet()->setCellValue('F3', 'MARET');
		$object->getActiveSheet()->setCellValue('G3', 'APRIL');
		$object->getActiveSheet()->setCellValue('H3', 'MEI');
		$object->getActiveSheet()->setCellValue('I3', 'JUNI');
		$object->getActiveSheet()->setCellValue('J3', 'JULI');
		$object->getActiveSheet()->setCellValue('K3', 'AGUSTUS');
		$object->getActiveSheet()->setCellValue('L3', 'SEPTEMBER');
		$object->getActiveSheet()->setCellValue('M3', 'OKTOBER');
		$object->getActiveSheet()->setCellValue('N3', 'NOVEMBER');
		$object->getActiveSheet()->setCellValue('O3', 'DESEMBER');
		//$object->getActiveSheet()->setCellValue('P3', 'JUMLAH');



		$baris = 4;
		$no = 1;

		//foreach ($data["excel"] as $row) {
			foreach ($data["nama"] as $nama) {
			if ($nama["nama"] != "admin") {
			$object->getActiveSheet()->setCellValue('B'.$baris, $nama['nama']);
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			}
			foreach ($data["saldo_s"] as $row) {
				if($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('C'.$baris, $row["saldo_sukarela"]);
				}
			}
			foreach ($data["jan1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('D'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["feb1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('E'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["mar1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('F'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["apr1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('G'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["mei1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('H'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["jun1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('I'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["jul1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('J'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["agus1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('K'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["sep1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('L'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["okt1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('M'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["nov1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('N'.$baris, $row['saldo_sukarela']);
				} 
			}
			foreach ($data["des1"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('O'.$baris, $row['saldo_sukarela']);
				} 
			}


			$baris++;

		}
		
		$filename="Laporan_Saldo_SSR'.$thn.'".'.xlsx';

		$object->getActiveSheet()->setTitle("Laporan_Saldo_SSR");

	    header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Laporan_Saldo_SSR_'.$thn.'.xlsx"');
	  	header('Cache-Control: max-age=0');
		
		 $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');



	}
}
    