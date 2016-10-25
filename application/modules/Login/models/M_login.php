<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function __construct()
  {
    //parent::__construct();

  }

  function cekLogin($nik,$password)
  {
    $cek = $this->db->query("SELECT * FROM tb_login_user WHERE nik_pegawai = '$nik' AND password = '$password' AND status = '1'");
    $tes = $cek->num_rows(count($cek));
    if ($tes == 0)
    {
      return false;
    }
    else
    {
      $row = $cek->row();
			$id = $row->id_login_user;

			$this->session->set_userdata('ses_user_id',$id);
			$this->session->set_userdata('ses_user_nik',$nik);
			return true;
    }
  }
}
