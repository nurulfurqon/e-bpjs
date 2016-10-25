<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pdf extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_laporan_pdf','',TRUE);

  }

  function index()
  {
    if ($this->session->userdata('ses_s_adm_id') == TRUE || $this->session->userdata('ses_adm_id') == TRUE || $this->session->userdata('ses_user_id') == TRUE)
    {
      $idnya = $this->uri->segment(3);
      $data['tampil'] = $this->m_laporan_pdf->tampil_data($idnya);
      $this->load->view('Laporan_pdf/nota',$data);
    }
    else
    {
      redirect('Login');
    }
  }
}
