<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin_super_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin_super_admin','',TRUE);
  }

  function index()
  {
    if ($this->session->userdata('ses_s_adm_id') == TRUE)
    {
      $data['tampil_data'] = $this->m_admin_super_admin->tampil_data();
      $this->load->view('Admin_super_admin/vw_admin_super_admin',$data);
    }
    else
    {
      redirect('Login_super_admin');
    }
  }

  function tambah()
  {
    if ($this->session->userdata('ses_s_adm_id') == TRUE)
    {
      $nik_pegawai = $this->input->post('nik_pegawai');
      $password = $this->input->post('password');
      $status = "1";
      $btn_tambah = $this->input->post('btn_tambah');
      $data['error'] = "";
      $data['level_jabatan'] = $this->m_admin_super_admin->ambil_level();
      if ($btn_tambah)
      {
        $this->form_validation->set_rules('nik_pegawai','Nik Pegawai','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('passconf','Ulangi Password','required|matches[password]');

        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');
        $this->form_validation->set_message('matches','%s Tidak Sama Dengan Password');

        if ($this->form_validation->run() == TRUE)
        {
          $simpan = $this->m_admin_super_admin->tambah_data($nik_pegawai,$password,$status);
          if ($simpan)
          {
            $this->session->set_flashdata('message', 'Data Telah Berhasil Ditambah');
            redirect('Admin_super_admin');
          }
          else
          {
            $data['error'] = "Data Sudah Pernah Tersimpan";
          }
        }
      }
      $this->load->view('Admin_super_admin/en_admin_super_admin',$data);
    }
    else
    {
      redirect('Login_super_admin');
    }
  }

  function detail()
  {
    if ($this->session->userdata('ses_s_adm_id') == TRUE)
    {
      $idnya = $this->uri->segment(3);
      $data['detail'] = $this->m_admin_super_admin->detail_data($idnya);

      $password = $this->input->post('password');
      $status = $this->input->post('status');
      $btn_ubah = $this->input->post('btn_ubah');
      $data['error'] = "";
      $data["act"] = "0";
      if ($btn_ubah)
      {
        $data["act"] = "1";
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('status','Status','required');
        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');

        if ($this->form_validation->run() == TRUE)
        {

          $ubah = $this->m_admin_super_admin->ubah_data($idnya,$password,$status);
          if($ubah)
          {
            $this->session->set_flashdata('message', 'Data Telah Berhasil Diubah');
            redirect('Admin_super_admin');
          }
          else
          {
            $data['error'] = "Data Sudah Pernah Tersimpan";
          }
        }
      }
      $this->load->view('Admin_super_admin/dt_admin_super_admin',$data);
    }
    else
    {
      redirect('Login_super_admin');
    }
  }

  function ambil_jabatan()
  {
    if ($this->session->userdata('ses_s_adm_id') == TRUE)
    {
      $level_jabatan = $this->input->post('level_jabatan');
      $ambil = $this->m_admin_super_admin->getJabatan($level_jabatan);
      $data .= "<option value=''>-Pilih-</option>";
      foreach ($ambil as $mp){
        $data .= "<option value='$mp->nik'>$mp->nik</option>\n";
      }
      echo $data;
    }
    else
    {
      redirect('Login_super_admin');
    }
  }

  function hapus()
  {
    if ($this->session->userdata('ses_s_adm_id') == TRUE)
    {
      $idnya = $this->uri->segment(3);
      $this->m_admin_super_admin->hapus_data($idnya);
      $this->session->set_flashdata('message', 'Data Telah Berhasil Dihapus');
      redirect('Admin_super_admin');
    }
    else
    {
      redirect('Login_super_admin');
    }
  }
}
