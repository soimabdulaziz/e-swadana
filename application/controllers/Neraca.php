<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('Neraca_model');
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
		$data["tahun"] = $this->Neraca_model->getTahun();
	    //$data["total_jasa"] = $this->Shu_model->get_total_jasa();
		$this->template->load('template', 'neraca/periode_neraca', $data);
    }
    
    function preview() {
        $data['simpanan_pokok'] = $this->Neraca_model->get_simpok();
        $data['simpanan_wajib'] = $this->Neraca_model->get_simpanan_wajib();
		$data['simpanan_sukarela'] = $this->Neraca_model->get_simpanan_sukarela();
		$data['piutang'] = $this->Neraca_model->get_piutang();
        $data['jasa'] = $this->Neraca_model->get_jasa();
		$data['shu'] = $this->Neraca_model->get_shu();
		$data['takdibagi'] = $this->Neraca_model->get_shutakdibagi();
		$data["tahun"] = $this->Neraca_model->getTahun();

		$this->template->load('template', 'neraca/neraca_v', $data);
		
        
	}
	function export() {
		$this->load->model('Sirkulasi_model');
		$thn = $_POST['tahun'];
		$this->load->model("Laporan_piutang_model");
		$d = $_POST['tahun'];
		$data["excel"] = $this->Laporan_piutang_model->cek01($d);
		$data["nama"] = $this->Laporan_piutang_model->get_list();
		$data["saldo_s"] = $this->Laporan_piutang_model->saldo_sebelum();
		$data["jan"] = $this->Laporan_piutang_model->jan();
		$data["feb"] = $this->Laporan_piutang_model->feb();
		$data["mar"] = $this->Laporan_piutang_model->mar();
		$data["apr"] = $this->Laporan_piutang_model->apr();
		$data["mei"] = $this->Laporan_piutang_model->mei();
		$data["jun"] = $this->Laporan_piutang_model->jun();
		$data["jul"] = $this->Laporan_piutang_model->jul();
		$data["agus"] = $this->Laporan_piutang_model->agus();
		$data["sep"] = $this->Laporan_piutang_model->sep();
		$data["okt"] = $this->Laporan_piutang_model->okt();
		$data["nov"] = $this->Laporan_piutang_model->nov();
		$data["des"] = $this->Laporan_piutang_model->des();
		$data["saldo"] = $this->Laporan_piutang_model->saldo();












		$tahun = $_POST['tahun'] - 1;

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Koperasi E-swadana");
		$object->getProperties()->setLastModifiedBy("Koperasi E-swadana");
		$object->getProperties()->setTitle("Laporan Sukarela");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('G1', 'Laporan Angsuran Piutang '.$thn);
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
		
		$filename="Laporan_angsuran_piutang".'xlsx';

		$object->getActiveSheet()->setTitle("Laporan_angsuran_piutang");

	    header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Laporan_angsuran_piutang_'.$thn.'.xlsx"');
	  	header('Cache-Control: max-age=0');
		
		 $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');



	}
    
  
}
    