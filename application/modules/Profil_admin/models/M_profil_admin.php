<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_profil_admin extends CI_Model
{

  function tampil_data($nik)
  {
    $query = $this->db->query("SELECT a.*,b.nama,c.nama_jabatan FROM tb_login_admin a,tb_pegawai b,tb_jabatan c
       WHERE a.nik_pegawai = '$nik' AND b.nik = a.nik_pegawai AND c.id_jabatan = b.level_pegawai ORDER BY b.nama,'ASC'");
    return $query->result();
  }


  function detail_data($idnya)
  {
    $detail = $this->db->query("SELECT * FROM tb_login_admin WHERE md5(sha1(id_login_admin)) = '$idnya'");
		$baris = $detail->row();
		return $baris;
  }

  function ubah_data($idnya,$password)
  {
    $query = $this->db->query("SELECT password FROM tb_login_admin WHERE password = '$password' AND md5(sha1(id_login_admin)) != '$idnya'");
    $cek = $query->num_rows(count($query));

    if ($cek != 0)
    {
      return false;
    }
    else
    {
      $ubah = $this->db->query("UPDATE tb_login_admin SET
        password = '$password'
        WHERE md5(sha1(id_login_admin)) = '$idnya'");

      return true;
    }
  }


}
