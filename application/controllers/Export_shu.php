<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_shu extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('Shu_model');
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
		$data["tahun"] = $this->Shu_model->getTahun();
	    //$data["total_jasa"] = $this->Shu_model->get_total_jasa();
		$this->template->load('template', 'shu_export/periode_export', $data);
    }
    
	function export() {
		$thn = $_POST['tahun'];

        $total_jasa = $this->Shu_model->get_total_jasa();
        $pengeluaran = $this->Shu_model->get_pengeluaran();
        $shutakdibagi = $this->Shu_model->get_shutakdibagi();
        $takdibagi_now = $this->Shu_model->shutakdibagi_now();
        $shu_dibagi = $this->Shu_model->shudibagi();
        $shu = $this->Shu_model->shu();
        $pengeluaran = $this->Shu_model->get_pengeluaran();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();

		$object->getProperties()->setCreator("Koperasi E-swadana");
		$object->getProperties()->setLastModifiedBy("Koperasi E-swadana");
		$object->getProperties()->setTitle("Shu");

		$object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('C1', 'Shu '.'_'.$thn);
        foreach ($total_jasa as $row_jasa) {

        }
        foreach ($shutakdibagi as $rowshutakdibagi) {

        }
        $total_pendapatan = @$row_jasa['jumlah'] + @$rowshutakdibagi['shu_takdibagi'];
        $object->getActiveSheet()->setCellValue('A2', 'Total Jasa');
        $object->getActiveSheet()->setCellValue('B2', 'Rp.'.@$row_jasa['jumlah']);
        $object->getActiveSheet()->setCellValue('A3', 'Shu Takdibagi Tahun Lalu');
        $object->getActiveSheet()->setCellValue('B3', 'Rp.'.@$rowshutakdibagi['shu_takdibagi']);
        $object->getActiveSheet()->setCellValue('B4', 'Jumlah Pendapatan');
        $object->getActiveSheet()->setCellValue('C4', 'Rp.'.@$total_pendapatan);
        $object->getActiveSheet()->setCellValue('A5', 'Beban-Beban');
        foreach ($takdibagi_now as $row_now) {

        }
        foreach ($shu_dibagi as $row_shu) {

        }
        $baris = 6;
        $no = 1;
        $total_beban = 0;
        foreach ($pengeluaran as $row_beban) {
			$object->getActiveSheet()->setCellValue('A'.$baris, @$row_beban["keterangan"]);
			$object->getActiveSheet()->setCellValue('B'.$baris, @$row_beban["jumlah"]);
            $baris++;
            $total_beban = $total_beban + $row_beban['jumlah'];
        }
       
        $total_shu = @$total_pendapatan - @$total_beban;

        $baris = $baris +1;
        $object->getActiveSheet()->setCellValue('B'.$baris, 'Jumlah Beban');
        $object->getActiveSheet()->setCellValue('C'.$baris, 'Rp.'.@$total_beban);

        $baris = $baris +1;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'SHU');
        $baris = $baris +1;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'Total Shu');
        $object->getActiveSheet()->setCellValue('C'.$baris, 'Rp.'.@$total_shu);
        $baris = $baris +1;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'Shu Tak Dibagi Tahun ini');
        $object->getActiveSheet()->setCellValue('C'.$baris, 'Rp'.@$row_now['shu_takdibagi']);
        $baris = $baris +1;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'Shu Dibagi Tahun ini');
        $object->getActiveSheet()->setCellValue('C'.$baris, 'Rp.'.@$row_shu['shu_dibagi']);
        foreach ($shu as $rowshu) {

        }
        $baris = $baris + 2;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'Pembagian SHU');
        $baris = $baris + 1;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'Dana Cadangan');
        $object->getActiveSheet()->setCellValue('B'.$baris, '10%');
        $object->getActiveSheet()->setCellValue('C'.$baris, 'Rp.'.@$rowshu['shu_dibagi']);
        $object->getActiveSheet()->setCellValue('D'.$baris, 'Rp.'.@$rowshu['cadangan']);
        $baris = $baris + 1;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'Jasa Simpanan');
        $object->getActiveSheet()->setCellValue('B'.$baris, '35%');
        $object->getActiveSheet()->setCellValue('C'.$baris, 'Rp.'.@$rowshu['shu_dibagi']);
        $object->getActiveSheet()->setCellValue('D'.$baris, 'Rp.'.@$rowshu['jasa_simpanan']);
        $baris = $baris + 1;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'Jasa Anggota');
        $object->getActiveSheet()->setCellValue('B'.$baris, '40%');
        $object->getActiveSheet()->setCellValue('C'.$baris, 'Rp.'.@$rowshu['shu_dibagi']);
        $object->getActiveSheet()->setCellValue('D'.$baris, 'Rp.'.@$rowshu['jasa_anggota']);
        $baris = $baris + 1;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'Jasa Pengurus');
        $object->getActiveSheet()->setCellValue('B'.$baris, '10%');
        $object->getActiveSheet()->setCellValue('C'.$baris, 'Rp.'.@$rowshu['shu_dibagi']);
        $object->getActiveSheet()->setCellValue('D'.$baris, 'Rp.'.@$rowshu['jasa_pengurus']);
        $baris  = $baris +1;
        $object->getActiveSheet()->setCellValue('A'.$baris, 'Dana Sosial');
        $object->getActiveSheet()->setCellValue('B'.$baris, '5%');
        $object->getActiveSheet()->setCellValue('C'.$baris, 'Rp.'.@$rowshu['shu_dibagi']);
        $object->getActiveSheet()->setCellValue('D'.$baris, 'Rp.'.@$rowshu['dana_sosial']);
        


        


        
        
        
        


        
      


		
		$filename="Neraca".'xlsx';

		$object->getActiveSheet()->setTitle("Shu");

	    header('Content-Type: application/vnd.ms-excel');
	  	header('Content-Disposition: attachment;filename="Shu'.'_'.$thn.'.xlsx"');
	  	header('Cache-Control: max-age=0');
		
		 $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');



	}
    
  
}
    