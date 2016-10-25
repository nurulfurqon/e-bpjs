<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->model('m_login_admin','',TRUE);
  }

	function index()
	{
		if ($this->session->userdata('ses_adm_id') == TRUE) {
			redirect('Home_admin');
		}
		else {
			$nik = $this->input->post('nik');
			$password = $this->input->post('password');
			$btn_login = $this->input->post('btn_login');
			$pesan["error"] = "";
			if ($btn_login)
			{
				$this->form_validation->set_rules('nik','Nik','required');
				$this->form_validation->set_rules('password','Password','required');
				$this->form_validation->set_message('required','%s Tidak Boleh Kosong');

				if ($this->form_validation->run() == TRUE)
				{
					$cek = $this->m_login_admin->cekLogin($nik,$password);
					//echo print_r($cek);
					//exit;
					if ($cek == TRUE)
					{
						redirect('Home_admin');
					}
					else
					{
						$pesan["error"] = "Nik / Password Yang Anda Masukan Salah";
					}
				}
			}
			$this->load->view('Login_admin/login',$pesan);
		}

	}

	function logout()
	{
		$this->session->unset_userdata('ses_adm_id',$id);
		$this->session->unset_userdata('ses_adm_nik',$nik);

		redirect('Login_admin');
	}

}
