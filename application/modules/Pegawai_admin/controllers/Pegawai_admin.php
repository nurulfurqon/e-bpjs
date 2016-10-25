<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Pegawai_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_pegawai_admin','',TRUE);
  }

  function index($id=NULL)
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $cari_jabatan = $this->input->post('cari_jabatan');
      $cari_nik = $this->input->post('cari_nik');
			$this->form_validation->set_rules('cari_jabatan');

      //query untuk mengambil nilai dari tabel Produk_admin
      $query = $this->db->query("SELECT * FROM tb_pegawai ORDER BY nama");
      $n = $query->num_rows(count($query));

      //pengaturan pagination
			$config["base_url"]=base_url().'Pegawai_admin/index';
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
			$data["tampil"]=$this->m_pegawai_admin->tampil_data($config['per_page'],$id);
			$data["no"]=$id;
      $data["jabatan"] = $this->m_pegawai_admin->ambil_level();

      if($this->form_validation->run()==TRUE)
			{

			}

      $this->load->view('Pegawai_admin/vw_pegawai_admin',$data);
    }
    else
    {
      redirect('Login_admin');
    }
  }

  function update_quota()
  {
    /* update quota otomatis */
    $bulan = date('m');
    $tgl_update = date('Y-m-d');

    if ($bulan == 12)
    {

      $update = $this->m_pegawai_admin->update_quota($tgl_update);
      if ($update)
      {
        $this->session->set_flashdata('message', 'Quota Telah Diperbarui');
        redirect('Pegawai_admin');
      }
    }
    else
    {
      $this->session->set_flashdata('message', 'Belum Waktunya Quota Diperbarui');
      redirect('Pegawai_admin');
    }
  }

  function tambah()
  {
    if ($this->session->userdata('ses_adm_id') == TRUE)
    {
      $nik = $this->input->post('nik');
      $nama = $this->input->post('nama');
      $alamat = $this->input->post('alamat');
      $tempat_lahir = $this->input->post('tempat_lahir');
      $tgl_lahir = $this->input->post('tgl_lahir');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $telepon = $this->input->post('telepon');
      $status = $this->input->post('status');
      $level_pegawai = $this->input->post('level_pegawai');
      $tgl_mulai_kerja = $this->input->post('tgl_mulai_kerja');
      $no_bpjs = $this->input->post('no_bpjs');


      $btn_tambah = $this->input->post('btn_tambah');
      $data['error'] = "";

      /* Configure upload */
      $this->upload->initialize(array(
      "allowed_types" => "gif|jpg|png|jpeg",
      "upload_path"   => "./assets/img/",
      "max_size"      => "2000"
      ));
      /* ambil data level jabatan */
      $data['level_jabatan'] = $this->m_pegawai_admin->ambil_level();

      if ($btn_tambah)
      {
        $this->form_validation->set_rules('nik','Nik','required');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('telepon','Telepon','required');
        $this->form_validation->set_rules('status','status','required');
        $this->form_validation->set_rules('level_pegawai','Jabatan','required');
        $this->form_validation->set_rules('tgl_mulai_kerja','Tanggal Mulai kerja','required');
        $this->form_validation->set_rules('no_bpjs','No Bpjs','required');

        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');

        if ($this->form_validation->run()==TRUE)
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
            $foto = $uploaded['file_name'];//data upload yang pertama

            /* manipulasi tanggal mulai kerja */
            $tgl = explode('/',$tgl_mulai_kerja);
            $tgl_mulai_kerja = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
            $tgl_l = explode('/',$tgl_lahir);
            $tgl_lahir = $tgl_l[2].'-'.$tgl_l[1].'-'.$tgl_l[0];
            $tgl_update = date('Y-m-d');

            $simpan = $this->m_pegawai_admin->tambah_data($nik,$nama,$alamat,$tempat_lahir,$tgl_lahir,$jenis_kelamin,$telepon,$status,$foto,$level_pegawai,$tgl_mulai_kerja,$no_bpjs,$tgl_update);

            if ($simpan)
            {
              $this->session->set_flashdata('message', 'Data Telah Berhasil Ditambah');
              redirect('Pegawai_admin');
            }
            else
            {
              $data['error'] = "Data Sudah Pernah Tersimpan";
              unlink('./assets/img/'.$foto);
            }
          }
        }
      }
      $this->load->view('Pegawai_admin/en_pegawai_admin',$data);
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
      $data['detail'] = $this->m_pegawai_admin->detail_data($idnya);
      $data['level_jabatan'] = $this->m_pegawai_admin->ambil_level();
      $nama = $this->input->post('nama');
      $alamat = $this->input->post('alamat');
      $tempat_lahir = $this->input->post('tempat_lahir');
      $tgl_lahir = $this->input->post('tgl_lahir');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $telepon = $this->input->post('telepon');
      $status = $this->input->post('status');
      $level_pegawai = $this->input->post('level_pegawai');
      $tgl_mulai_kerja = $this->input->post('tgl_mulai_kerja');
      $no_bpjs = $this->input->post('no_bpjs');

      $btn_ubah = $this->input->post('btn_ubah');
      $data['error'] = "";
      $data["act"] = "0";

      if ($btn_ubah)
      {
        $data["act"] = "1";
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('telepon','Telepon','required');
        $this->form_validation->set_rules('status','status','required');
        $this->form_validation->set_rules('level_pegawai','Jabatan','required');
        $this->form_validation->set_rules('tgl_mulai_kerja','Tanggal Mulai kerja','required');
        $this->form_validation->set_rules('no_bpjs','No Bpjs','required');

        $this->form_validation->set_message('required','%s Tidak Boleh Kosong');

        if ($this->form_validation->run() == TRUE)
        {
          /* manipulasi tanggal mulai kerja */
          $tgl = explode('/',$tgl_mulai_kerja);
          $tgl_mulai_kerja = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
          $tgl_l = explode('/',$tgl_lahir);
          $tgl_lahir = $tgl_l[2].'-'.$tgl_l[1].'-'.$tgl_l[0];
          /* end */
          $ubah = $this->m_pegawai_admin->ubah_data($idnya,$nama,$alamat,$tempat_lahir,$tgl_lahir,$jenis_kelamin,$telepon,$status,$level_pegawai,$tgl_mulai_kerja,$no_bpjs);
          if($ubah)
          {
            $this->session->set_flashdata('message', 'Data Telah Berhasil Diubah');
            redirect('Pegawai_admin');
          }
          else
          {
            $data['error'] = "Data Sudah Pernah Tersimpan";
          }
        }
      }

      $this->load->view('Pegawai_admin/dt_pegawai_admin',$data);
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
     "upload_path"   => "./assets/img/",
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
         $ubah_gambar = $this->m_pegawai_admin->ubah_foto($idnya,$foto);

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
      $this->m_pegawai_admin->hapus_data($idnya);
      $this->session->set_flashdata('message', 'Data Telah Berhasil Dihapus');
      redirect('Pegawai_admin');
    }
    else
    {
      redirect('Login_admin');
    }
  }

}
