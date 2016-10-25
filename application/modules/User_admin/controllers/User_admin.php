<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class User_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_user_admin','',TRUE);
  }

  function index($id=NULL)
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $cari_status = $this->input->post('cari_status');
      $cari_nik = $this->input->post('cari_nik');
			$this->form_validation->set_rules('cari_status');

      //query untuk mengambil nilai dari tabel Produk_admin
      $query = $this->db->query("SELECT * FROM tb_login_user ORDER BY nik_pegawai");
      $n = $query->num_rows(count($query));

      //pengaturan pagination
			$config["base_url"]=base_url().'User_admin/index';
			$config["per_page"]=25;
			$config["total_rows"]=$n;
			$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin pull-right'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			$data['halaman'] = $this->pagination->create_links();//untuk memunculkan pagination di view
      if (!empty($cari_status)||!empty($cari_nik))
      {
        $config["per_page"]='';
        $data["tampil"]=$this->m_user_admin->tampil_data($config['per_page'],$id);
      }
      else {
        $data["tampil"]=$this->m_user_admin->tampil_data($config['per_page'],$id);
      }
			$data["no"]=$id;

      if($this->form_validation->run()==TRUE)
			{

			}

      $this->load->view('User_admin/vw_user_admin',$data);
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
      $nik_pegawai = $this->input->post('nik_pegawai');
      $password = $this->input->post('password');
      $status = "2";
      $btn_tambah = $this->input->post('btn_tambah');
      $data['error'] = "";
      $data['level_jabatan'] = $this->m_user_admin->ambil_level();
      if ($btn_tambah)
      {
        $this->form_validation->set_rules('nik_pegawai','Nik Pegawai','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('passconf','Ulangi Password','required|matches[password]');

        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');
        $this->form_validation->set_message('matches','%s Tidak Sama Dengan Password');

        if ($this->form_validation->run() == TRUE)
        {
          $simpan = $this->m_user_admin->tambah_data($nik_pegawai,$password,$status);
          if ($simpan)
          {
            $this->session->set_flashdata('message', 'Data Telah Berhasil Ditambah');
            redirect('User_admin');
          }
          else
          {
            $data['error'] = "Data Sudah Pernah Tersimpan";
          }
        }
      }
      $this->load->view('User_admin/en_user_admin',$data);
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
      $data['detail'] = $this->m_user_admin->detail_data($idnya);

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

          $ubah = $this->m_user_admin->ubah_data($idnya,$password);
          if($ubah)
          {
            $this->session->set_flashdata('message', 'Data Telah Berhasil Diubah');
            redirect('User_admin');
          }
          else
          {
            $data['error'] = "Data Sudah Pernah Tersimpan";
          }
        }
      }
      $this->load->view('User_admin/dt_user_admin',$data);
    }
    else
    {
      redirect('Login_admin');
    }
  }

  function ambil_jabatan()
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $level_jabatan = $this->input->post('level_jabatan');
      $ambil = $this->m_user_admin->getJabatan($level_jabatan);
      $data .= "<option value=''>-Pilih-</option>";
      foreach ($ambil as $mp){
        $data .= "<option value='$mp->nik'>$mp->nik</option>\n";
      }
      echo $data;
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
      $this->m_user_admin->hapus_data($idnya);
      $this->session->set_flashdata('message', 'Data Telah Berhasil Dihapus');
      redirect('User_admin');
    }
    else
    {
      redirect('Login_admin');
    }
  }

}
