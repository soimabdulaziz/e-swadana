<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_wajib extends CI_Controller {
	public function index()
	{
		check_not_login();
		$this->load->model("Laporan_wajib_model");
	   $data["data_anggota"] = $this->Laporan_wajib_model->get_list();
	  // $data["cek01"] = $this->Laporan_wajib_model->cek01();
	   $data["tahun"] = $this->Laporan_wajib_model->tahun();
	 //  if($cek01->num_rows() )
        $data["bln_1"] = $this->Laporan_wajib_model->get_jum();
		$this->template->load('template', 'laporan_wajib/laporan_wajib_v',  $data);
	}
	function export() {
		$thn = $_POST['tahun'];
		$this->load->model("Laporan_wajib_model");
		$d = $_POST['tahun'];
		$data["excel"] = $this->Laporan_wajib_model->cek01($d);
		$data["nama"] = $this->Laporan_wajib_model->get_list();
		$data["saldo_s"] = $this->Laporan_wajib_model->saldo_sebelum();
		$data["jan"] = $this->Laporan_wajib_model->jan();
		$tahun = $_POST['tahun'] - 1;

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Koperasi E-swadana");
		$object->getProperties()->setLastModifiedBy("Koperasi E-swadana");
		$object->getProperties()->setTitle("Sirkulasi");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('G1', 'Laporan Simpanan Wajib '.$thn);
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


		$baris = 4;
		$no = 1;

		//foreach ($data["excel"] as $row) {
			foreach ($data["nama"] as $nama) {
		
			$object->getActiveSheet()->setCellValue('B'.$baris, $nama['nama']);
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			foreach ($data["saldo_s"] as $saldo_s) {
				if($saldo_s["id_anggota"] == $nama["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('C'.$baris, $saldo_s["saldo"]);
				}
			}
			foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "1" && $nama["id_anggota"] == $row["id_anggota"]) {
					$jan = number_format($row['jumlah']);
				$object->getActiveSheet()->setCellValue('D'.$baris, $jan);
			}}foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "2" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('E'.$baris, $row['jumlah']);
			}}foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "3" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('F'.$baris, $row['jumlah']);
			}}foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "4" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('G'.$baris, $row['jumlah']);
			}} foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "5" && $row["id_anggota"] == $nama["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('H'.$baris, $row['jumlah']);
			}}foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "6" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('I'.$baris, $row['jumlah']);
			}} foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "7" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('J'.$baris, $row['jumlah']);
			}} foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "8" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('K'.$baris, $row['jumlah']);
			}} foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "9" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('L'.$baris, $row['jumlah']);
			}} foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "10" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('M'.$baris, $row['jumlah']);
			}}foreach ($data["excel"] as $row) {
				if (strtolower(date('m',strtotime($row['tanggal']))) == "11" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('N'.$baris, $row['jumlah']);
			}}foreach ($data["excel"] as $row) {
				 if (strtolower(date('m',strtotime($row['tanggal']))) == "12" && $nama["id_anggota"] == $row["id_anggota"]) {
				$object->getActiveSheet()->setCellValue('O'.$baris, $row['jumlah']);
			}}
	//	}


			$baris++;

		}
		
		$filename="Laporan_Simpanan_Wajib'.$tahun.'".'.xlsx';

		$object->getActiveSheet()->setTitle("Laporan_simpanan_wajib");

	    header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Laporan_Simpanan_wajib_'.$thn.'.xlsx"');
	  	header('Cache-Control: max-age=0');
		
		 $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');



	}
}
    