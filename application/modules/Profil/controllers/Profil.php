<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Profil extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_profil','',TRUE);
  }

  function index()
  {
    if ($this->session->userdata('ses_user_id') == TRUE)
    {
      $nik = $this->session->userdata('ses_user_nik');
      $data['tampil_data'] = $this->m_profil->tampil_data($nik);
      $this->load->view('Profil/vw_profil',$data);
    }
    else
    {
      redirect('Login');
    }
  }

  function detail()
  {
    if ($this->session->userdata('ses_user_id') == TRUE)
    {
      $idnya = $this->uri->segment(3);
      $data['detail'] = $this->m_profil->detail_data($idnya);

      $password = $this->input->post('password');
      $btn_ubah = $this->input->post('btn_ubah');
      $data['error'] = "";
      $data["act"] = "0";
      if ($btn_ubah)
      {
        $data["act"] = "1";
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');

        if ($this->form_validation->run() == TRUE)
        {

          $ubah = $this->m_profil->ubah_data($idnya,$password);
          if($ubah)
          {
            $this->session->set_flashdata('message', 'Data Telah Berhasil Diubah');
            redirect('Profil');
          }
          else
          {
            $data['error'] = "Data Sudah Pernah Tersimpan";
          }
        }
      }
      $this->load->view('Profil/dt_profil',$data);
    }
    else
    {
      redirect('Login');
    }
  }

}
