<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Quota_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_quota_admin','',TRUE);
  }

  function index($id=NULL)
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $cari_tanggal = $this->input->post('cari_tanggal');
      $cari_nik = $this->input->post('cari_nik');
			$this->form_validation->set_rules('cari_tanggal');

      //query untuk mengambil nilai dari tabel Produk_admin
      $query = $this->db->query("SELECT * FROM tb_ambil_quota ORDER BY tgl_ambil_quota,'DESC'");
      $n = $query->num_rows(count($query));

      //pengaturan pagination
			$config["base_url"]=base_url().'Quota_admin/index';
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
      if (!empty($cari_tanggal)||!empty($cari_nik))
      {
        $config["per_page"]='';
        $data["tampil"]=$this->m_quota_admin->tampil_data($config['per_page'],$id);
      }
      else
      {
        $data["tampil"]=$this->m_quota_admin->tampil_data($config['per_page'],$id);
      }

			$data["no"]=$id;

      if($this->form_validation->run()==TRUE)
			{

			}

      $this->load->view('Quota_admin/vw_quota_admin',$data);
    }
    else
    {
      redirect('Login_admin');
    }
  }

  function download()
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $idnya = $this->uri->segment(3);
      $foto_bukti = $this->m_quota_admin->download_data($idnya);
      $file_path = FCPATH . 'assets/img/slip/' . $foto_bukti; // absolute path to file
      if (is_file($file_path)) {
          $mime = 'assets/img/slip/';
          header('Pragma: public');
          header('Expires: 0');
          header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
          header('Cache-Control: private',false);
          header('Content-Type: ' . $mime);
          header('Content-Disposition: attachment; filename="' . $foto_bukti . '"');
          header('Content-Transfer-Encoding: binary');
          header('Connection: close');
          readfile(base_url() . 'assets/img/slip/' . $foto_bukti); // relative path to file
          exit();
      }
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
      $data['level_jabatan'] = $this->m_quota_admin->ambil_level();
      $nik_pegawai = $this->input->post('nik_pegawai');
      $nama_pengguna = $this->input->post('nama_pengguna');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $ket_pengguna = $this->input->post('ket_pengguna');
      $ket_dokter = $this->input->post('ket_dokter');
      $ket_obat = $this->input->post('ket_obat');
      $tgl_berobat = $this->input->post('tgl_berobat');
      $ambil_quota = $this->input->post('ambil_quota');
      $btn_tambah = $this->input->post('btn_tambah');

      $data['error'] = "";

      /* Configure upload */
      $this->upload->initialize(array(
      "allowed_types" => "gif|jpg|png|jpeg",
      "upload_path"   => "./assets/img/slip/",
      "max_size"      => "2000"
      ));

      if ($btn_tambah)
      {
        $this->form_validation->set_rules('nik_pegawai','Nik Pegawai','required');
        $this->form_validation->set_rules('nama_pengguna','Nama Pengguna','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('ket_pengguna','Keterangan Pengguna','required');
        $this->form_validation->set_rules('ket_dokter','Keterangan Dokter','required');
        $this->form_validation->set_rules('ket_obat','Keterangan Obat','required');
        $this->form_validation->set_rules('ambil_quota','Ambil Quota','required');

        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');

        if ($this->form_validation->run() == TRUE)
        {
          if (!$this->upload->do_upload("images"))
          {
            if ($this->upload->set_error('upload_no_file_selected','debug')) {
              $data['error'] = "File upload belum dipilih";
            }
            else {
              $data['error'] = $this->upload->display_errors();
            }
          }
          else
          {
            $uploaded = $this->upload->data();//untuk mengambil data upload
            $foto_bukti = $uploaded['file_name'];//data upload yang pertama

            $tgl = explode('/',$tgl_berobat);
            $tgl_berobat = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];

            $status_quota = '0';
            $tgl_ambil_quota = date('Y-m-d h:i:s');//tanggal ambil quota
            $tgl_terima_quota = '0000-00-00';

            $simpan = $this->m_quota_admin->tambah_data($nik_pegawai,$nama_pengguna,$jenis_kelamin,$ket_pengguna,$ket_dokter,$ket_obat,$tgl_berobat,$ambil_quota,$status_quota,$foto_bukti,$tgl_ambil_quota,$tgl_terima_quota);
            print_r($simpan);
            exit;
            if ($simpan)
            {
              $this->session->set_flashdata('message', 'Data Telah Berhasil Ditambah');
              redirect('Quota_admin');
            }
            else
            {
              $data['error'] = "Data Sudah Pernah Tersimpan";
              unlink('./assets/img/slip/'.$foto_bukti);
            }
          }
        }
      }

      $this->load->view('Quota_admin/en_quota_admin',$data);
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
      $ambil = $this->m_quota_admin->getJabatan($level_jabatan);
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

  function tes()
  {
    echo $this->load->view('Quota_admin/test');
  }

  function ambil_quota()
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $nik_pegawai = $this->input->post('nik_pegawai');
      $ambil['ambil'] = $this->m_quota_admin->getQuota($nik_pegawai);
      if ($nik_pegawai == 0) {
        $data = $this->load->view('Quota_admin/ajaxRange2');
        echo $data;
      }
      else
      {
        $data = $this->load->view('Quota_admin/ajaxRange',$ambil);
        echo $data;
      }
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
      $data['detail'] = $this->m_quota_admin->detail_data($idnya);

      $nama_pengguna = $this->input->post('nama_pengguna');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $ket_pengguna = $this->input->post('ket_pengguna');
      $ket_dokter = $this->input->post('ket_dokter');
      $ket_obat = $this->input->post('ket_obat');
      $tgl_berobat = $this->input->post('tgl_berobat');
      $status_quota = $this->input->post('status_quota');
      $tgl_terima_quota = $this->input->post('tgl_terima_quota');

      $btn_ubah = $this->input->post('btn_ubah');
      $data['error'] = "";
      $data["act"] = "0";

      if ($btn_ubah)
      {
        $data["act"] = "1";
        $this->form_validation->set_rules('nama_pengguna','Nama Pengguna','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('ket_pengguna','Keterangan Pengguna','required');
        $this->form_validation->set_rules('ket_dokter','Keterangan Dokter','required');
        $this->form_validation->set_rules('ket_obat','Keterangan Obat','required');
        $this->form_validation->set_rules('tgl_berobat','Tanggal Berobat','required');
        $this->form_validation->set_rules('status_quota','Status Quota','required');

        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');

        if ($this->form_validation->run() == TRUE)
        {
          /* manipulasi Tanggal Berobat */
          $tgl = explode('/',$tgl_berobat);
          $tgl_berobat = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];

          $tgl_t = explode('/',$tgl_terima_quota);
          $tgl_terima_quota = $tgl_t[2].'-'.$tgl_t[1].'-'.$tgl_t[0];

          $ubah = $this->m_quota_admin->ubah_data($idnya,$nama_pengguna,$jenis_kelamin,$ket_pengguna,$ket_dokter,$ket_obat,$tgl_berobat);
          if($ubah)
          {
            $this->session->set_flashdata('message', 'Data Telah Berhasil Diubah');
            redirect('Quota_admin');
          }
          else
          {
            $data['error'] = "Data Sudah Pernah Tersimpan";
          }
        }
      }

      $this->load->view('Quota_admin/dt_quota_admin',$data);
    }
    else
    {
      redirect('Login_admin');
    }
  }

  function ubah_foto($idnya)
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;
     $this->upload->initialize(array(
     "allowed_types" => "gif|jpg|png|jpeg",
     "upload_path"   => "./assets/img/slip/",
     "max_size"      => "2000"
     ));

     if (!empty($_FILES)) {
       if (!$this->upload->do_upload("imagesx"))
       {
         if ($this->upload->set_error('upload_no_file_selected','debug')) {
          $data['error_string'][] = "<div class='alert alert-warning' role='alert'>
          <center>
          <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
          <span class='sr-only'>Error:</span>
          File upload belum dipilih
          </center>
          </div>";
          $data['status'] = FALSE;
         }
         else {
           $data['error_string'][] = $this->upload->display_errors();
           $data['status'] = FALSE;
         }

       }
       else
       {
         $uploaded = $this->upload->data();//untuk mengambil data upload
         $foto = $uploaded['file_name'];//data upload yang pertama
         $ubah_gambar = $this->m_quota_admin->ubah_foto($idnya,$foto);

       }
     }
     if($data['status'] === FALSE)
      {
          echo json_encode($data);
          exit();
      }

      echo json_encode(array("status" => TRUE));
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
      $this->m_quota_admin->hapus_data($idnya);
      $this->session->set_flashdata('message', 'Data Telah Berhasil Dihapus');
      redirect('Quota_admin');
    }
    else
    {
      redirect('Login_admin');
    }
  }
}
