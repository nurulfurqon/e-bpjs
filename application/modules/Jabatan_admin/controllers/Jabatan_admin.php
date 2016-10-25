<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Jabatan_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_jabatan_admin','',TRUE);
  }

  function index()
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $data['tampil_data'] = $this->m_jabatan_admin->tampil_data();
      $this->load->view('Jabatan_admin/vw_jabatan_admin',$data);
    }
    else
    {
      redirect('Login_admin');
    }
  }

  function tambah()
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $level_jabatan = $this->input->post('level_jabatan');
      $nama_jabatan = $this->input->post('nama_jabatan');
      $quota = $this->input->post('quota');
      $btn_tambah = $this->input->post('btn_tambah');
      $pesan['error'] = "";

      if ($btn_tambah)
      {
        $this->form_validation->set_rules('level_jabatan','Level','required');
        $this->form_validation->set_rules('nama_jabatan','Nama Jabatan','required');
        $this->form_validation->set_rules('quota','Quota','required');
        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');

        if ($this->form_validation->run() == TRUE)
        {

          /* manipulasi dari rupiah ke bilangan*/
          $satu = array('.','Rp',' ');
          $dua = array('','','');
          $quota = str_replace($satu,$dua,$quota);
          /* end */
          $simpan = $this->m_jabatan_admin->tambah_data($level_jabatan,$nama_jabatan,$quota);
          if ($simpan)
          {
            $this->session->set_flashdata('message', 'Data Telah Berhasil Ditambah');
            redirect('Jabatan_admin');
          }
          else
          {
            $pesan['error'] = "Data Sudah Pernah Tersimpan";
          }
        }
      }
      $this->load->view('Jabatan_admin/en_jabatan_admin',$pesan);
    }
    else
    {
      redirect('Login_admin');
    }
  }

  function detail()
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $idnya = $this->uri->segment(3);
      $data['detail'] = $this->m_jabatan_admin->detail_data($idnya);

      $nama_jabatan = $this->input->post('nama_jabatan');
      $quota = $this->input->post('quota');
      $btn_ubah = $this->input->post('btn_ubah');
      $data['error'] = "";
      $data["act"] = "0";

      if ($btn_ubah)
      {
        $data["act"] = "1";
        $this->form_validation->set_rules('nama_jabatan','Nama Jabatan','required');
        $this->form_validation->set_rules('quota','Quota','required');
        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');

        if ($this->form_validation->run() == TRUE)
        {
          /* manipulasi dari rupiah ke bilangan*/
          $satu = array('.','Rp',' ');
          $dua = array('','','');
          $quota = str_replace($satu,$dua,$quota);
          /* end */
          $ubah = $this->m_jabatan_admin->ubah_data($idnya,$nama_jabatan,$quota);
          if($ubah)
          {
            $this->session->set_flashdata('message', 'Data Telah Berhasil Diubah');
            redirect('Jabatan_admin');
          }
          else
          {
            $data['error'] = "Data Sudah Pernah Tersimpan";
          }
        }
      }

      $this->load->view('Jabatan_admin/dt_jabatan_admin',$data);
    }
    else
    {
      redirect('Login_admin');
    }
  }

  function hapus()
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $idnya = $this->uri->segment(3);
      $this->m_jabatan_admin->hapus_data($idnya);
      $this->session->set_flashdata('message', 'Data Telah Berhasil Dihapus');
      redirect('Jabatan_admin');
    }
    else
    {
      redirect('Login_admin');
    }
  }
}
