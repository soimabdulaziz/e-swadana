<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_sukarela extends CI_Controller {
	public function index()
	{
		check_not_login();
		$this->load->model("Laporan_sukarela_model");
	   $data["data_anggota"] = $this->Laporan_sukarela_model->get_list();
	  // $data["cek01"] = $this->Laporan_sukarela_model->cek01();
	   $data["tahun"] = $this->Laporan_sukarela_model->tahun();
	 //  if($cek01->num_rows() )
        $data["bln_1"] = $this->Laporan_sukarela_model->get_jum();
		$this->template->load('template', 'Laporan_sukarela/Laporan_sukarela_v',  $data);
	}
	function export() {
		$thn = $_POST['tahun'];
		$this->load->model("Laporan_sukarela_model");
		$d = $_POST['tahun'];
		$data["excel"] = $this->Laporan_sukarela_model->cek01($d);
		$data["nama"] = $this->Laporan_sukarela_model->get_list();
		$data["saldo_s"] = $this->Laporan_sukarela_model->saldo_sebelum();
		$data["jan"] = $this->Laporan_sukarela_model->jan();
		$data["feb"] = $this->Laporan_sukarela_model->feb();
		$data["mar"] = $this->Laporan_sukarela_model->mar();
		$data["apr"] = $this->Laporan_sukarela_model->apr();
		$data["mei"] = $this->Laporan_sukarela_model->mei();
		$data["jun"] = $this->Laporan_sukarela_model->jun();
		$data["jul"] = $this->Laporan_sukarela_model->jul();
		$data["agus"] = $this->Laporan_sukarela_model->agus();
		$data["sep"] = $this->Laporan_sukarela_model->sep();
		$data["okt"] = $this->Laporan_sukarela_model->okt();
		$data["nov"] = $this->Laporan_sukarela_model->nov();
		$data["des"] = $this->Laporan_sukarela_model->des();
		$data["saldo"] = $this->Laporan_sukarela_model->saldo();












		$tahun = $_POST['tahun'] - 1;

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Koperasi E-swadana");
		$object->getProperties()->setLastModifiedBy("Koperasi E-swadana");
		$object->getProperties()->setTitle("Laporan Sukarela");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('G1', 'Laporan Simpanan Sukarela '.$thn);
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
			
			$object->getActiveSheet()->setCellValue('B'.$baris, $nama['nama']);
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			
			foreach ($data["saldo_s"] as $row) {
				if($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('C'.$baris, $row["saldo_sukarela"]);
				}
			}
			foreach ($data["jan"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('D'.$baris, $row['jum']);
			}}foreach ($data["feb"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('E'.$baris, $row['jum']);
			}}foreach ($data["mar"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('F'.$baris, $row['jum']);
			}}foreach ($data["apr"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('G'.$baris, $row['jum']);
			}} foreach ($data["mei"] as $row) {
				if ($row["id_anggota"] == $nama["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('H'.$baris, $row['jum']);
			}}foreach ($data["jun"] as $row) {
				if ($nama["id_anggota"] == $row['id_anggota']) {
				$object->getActiveSheet()->setCellValue('I'.$baris, $row['jum']);
			}} foreach ($data["jul"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('J'.$baris, $row['jum']);
			}} foreach ($data["agus"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('K'.$baris, $row['jum']);
			}} foreach ($data["sep"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('L'.$baris, $row['jum']);
			}} foreach ($data["okt"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('M'.$baris, $row['jum']);
			}}foreach ($data["nov"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('N'.$baris, $row['jum']);
			}}foreach ($data["des"] as $row) {
				 if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('O'.$baris, $row['jum']);
			}}
		/* 	foreach ($data["saldo"] as $row) {
				if ($nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('P'.$baris, $row['saldo_sukarela']);

				}
			} */
	//	}


			$baris++;

		}
		
		$filename="Laporan_simpanan_sukarela'.$thn.'".'.xlsx';

		$object->getActiveSheet()->setTitle("Laporan_simpanan_sukarela");

	    header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Laporan_simpanan_sukarela_'.$thn.'.xlsx"');
	  	header('Cache-Control: max-age=0');
		
		 $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');



	}
}
    