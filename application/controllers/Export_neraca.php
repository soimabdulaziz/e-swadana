<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_neraca extends CI_Controller {
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
		$this->template->load('template', 'neraca_export/periode_export', $data);
    }
    
	function export() {
		$this->load->model('Sirkulasi_model');
		$thn = $_POST['tahun'];
        $bln = $_POST['bulan'];
       
		$simpanan_pokok = $this->Neraca_model->get_simpok();
        $simpanan_wajib = $this->Neraca_model->get_simpanan_wajib();
		$simpanan_sukarela = $this->Neraca_model->get_simpanan_sukarela();
		$piutang = $this->Neraca_model->get_piutang();
        $jasa = $this->Neraca_model->get_jasa();
		$shu = $this->Neraca_model->get_shu();
		$takdibagi = $this->Neraca_model->get_shutakdibagi();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Koperasi E-swadana");
		$object->getProperties()->setLastModifiedBy("Koperasi E-swadana");
		$object->getProperties()->setTitle("Neraca");

		$object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('C1', 'Neraca '.$bln.'_'.$thn);
        $object->getActiveSheet()->setCellValue('A2', 'No');
        $object->getActiveSheet()->setCellValue('B2', 'Keterangan');
        $object->getActiveSheet()->setCellValue('C2', 'Jumlah');
        $object->getActiveSheet()->setCellValue('D2', 'No');
		$object->getActiveSheet()->setCellValue('E2', 'Keterangan');
		$object->getActiveSheet()->setCellValue('F2', 'Jumlah');
        
        foreach ($piutang as $row_p) {

        }
        $piutang = $row_p['penambahan'] - $row_p['pembayaran'];
   
        foreach ($simpanan_pokok as $row_simpok) {

        }
        $simpok = $row_simpok['simpok'];
    
        foreach ($simpanan_wajib as $row_simjib) {

        }
        $simjib = $row_simjib['pemasukan'] - $row_simjib['penarikan'];
    
        foreach ($simpanan_sukarela as $row_suk) {

        }
        $sukarela = $row_suk['pemasukan'] - $row_suk['penarikan'];
    
        foreach ($jasa as $row_jasa) {

        }
        $jasa = $row_jasa['jasa'];

        foreach ($shu as $row_shu) {

        }
        foreach ($takdibagi as $row_t) {

        }
       $shutakdibagi = @$row_t['shu_takdibagi'];
       $pasiva = $shutakdibagi + $jasa + $row_shu['cadangan'] + $row_shu['dana_sosial'] + $sukarela + $simjib + $simpok;
       $kas = $pasiva - $piutang;
       $aktiva = $kas + $piutang;
        $object->getActiveSheet()->setCellValue('B5', '1.2 Piutang');
        $object->getActiveSheet()->setCellValue('B3', 'Harta');
        $object->getActiveSheet()->setCellValue('D3', '2');
        $object->getActiveSheet()->setCellValue('E3', 'Simpanan(Utang)');
        $object->getActiveSheet()->setCellValue('B4', '1.1 Kas');
        $object->getActiveSheet()->setCellValue('C4', 'Rp.'.$kas);
		$object->getActiveSheet()->setCellValue('E4', '2.1 Simpanan Pokok'); 
		$object->getActiveSheet()->setCellValue('F4', 'Rp.'.$simpok); 
        $object->getActiveSheet()->setCellValue('C5', 'Rp.'.$piutang);
		$object->getActiveSheet()->setCellValue('F5', 'Rp.'.$simjib); 
        $object->getActiveSheet()->setCellValue('E5', '2.2 Simpanan Wajib');
        $object->getActiveSheet()->setCellValue('E6', '2.3 Simpanan Sukarela');
        $object->getActiveSheet()->setCellValue('F6', 'Rp.'.$sukarela);
        $object->getActiveSheet()->setCellValue('E7', '2.4 Cadangan');
        $object->getActiveSheet()->setCellValue('F7', 'Rp.'.$row_shu['cadangan']);
        $object->getActiveSheet()->setCellValue('E8', '2.5 Sosial');
        $object->getActiveSheet()->setCellValue('F8', 'Rp.'.$row_shu['dana_sosial']);
        $object->getActiveSheet()->setCellValue('E9', '2.6 Pendapatan Jasa Sampai Bulan ini');
        $object->getActiveSheet()->setCellValue('F9', 'Rp.'.$jasa);
        $object->getActiveSheet()->setCellValue('E10', 'Shu Tak dibagi Tahun lalu');
        $object->getActiveSheet()->setCellValue('F10', 'Rp.'.$shutakdibagi);
        $object->getActiveSheet()->setCellValue('B12', 'Jumlah Harta');
        $object->getActiveSheet()->setCellValue('C12', 'Rp.'.$aktiva);
        $object->getActiveSheet()->setCellValue('E12', 'Jumlah Pasiva');
        $object->getActiveSheet()->setCellValue('F12', 'Rp.'.$pasiva);     
        
        
        


		
		$filename="Neraca".'xlsx';

		$object->getActiveSheet()->setTitle("Neraca");

	    header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Neraca_'.$bln.'_'.$thn.'.xlsx"');
	  	header('Cache-Control: max-age=0');
		
		 $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');



	}
    
  
}
    