<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_pass extends CI_Controller {
	public function index()
	{
        check_not_login();
        $this->load->model('Ganti_pass_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $id = $this->uri->segment(3);
        
        $this->form_validation->set_rules('pass','Password','required|min_length[6]');
        $this->form_validation->set_rules('passconf','Konfirmasi Password', 'required|matches[pass] ');

        if($this->form_validation->run() != false){
        
                $this->Ganti_pass_model->update($_POST);
                $this->session->set_flashdata('success', 'Data berhasil diupdate');
                redirect('anggota');
                
            }
            else{
           
            $this->template->load('template', 'ganti_pass_v');
        }
    }
    function add(){
        $this->load->model('Ganti_pass_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$id = $this->uri->segment(3);
		

		$this->form_validation->set_rules('pass','Password','required|min_length[6]');
		$this->form_validation->set_rules('passconf','Konfirmasi Password', 'required|matches[pass] ');

		if($this->form_validation->run() != false){
			if (empty($id)) {
			
				$this->Ganti_pass_model->update($_POST);
				$this->session->set_flashdata('success', 'Password Berhasil Diganti');
				redirect('anggota');
			} else {
				$this->Ganti_pass_model->update($_POST);
				$this->session->set_flashdata('success', 'Password Berhasil Diganti');
				redirect('anggota');
				
			}
			
		}else{
            $this->template->load('template', 'ganti_pass_v');
		}
	}
   
	}

