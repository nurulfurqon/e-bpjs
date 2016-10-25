<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_jabatan_admin extends CI_Model
{

  function tampil_data()
  {
    $query = $this->db->query("SELECT * FROM tb_jabatan ORDER BY id_jabatan,'ASC'");
    return $query->result();
  }

  function tambah_data($level_jabatan,$nama_jabatan,$quota)
  {
    $query = $this->db->query("SELECT id_jabatan FROM tb_jabatan WHERE id_jabatan = '$level_jabatan'");
    $cek = $query->num_rows(count($query));

    if ($cek != 0)
    {
      return false;
    }
    else
    {
      $simpan = $this->db->query("INSERT INTO tb_jabatan (id_jabatan,nama_jabatan,quota) VALUES ('$level_jabatan','$nama_jabatan','$quota') ");
      return true;
    }
  }

  function detail_data($idnya)
  {
    $detail = $this->db->query("SELECT * FROM tb_jabatan WHERE md5(sha1(id_jabatan)) = '$idnya'");
		$baris = $detail->row();
		return $baris;
  }

  function ubah_data($idnya,$nama_jabatan,$quota)
  {
    $query = $this->db->query("SELECT nama_jabatan FROM tb_jabatan WHERE nama_jabatan = '$nama_jabatan' AND md5(sha1(id_jabatan)) != '$idnya'");
    $cek = $query->num_rows(count($query));

    if ($cek != 0)
    {
      return false;
    }
    else
    {
      $ubah = $this->db->query("UPDATE tb_jabatan SET
        nama_jabatan = '$nama_jabatan',
        quota = '$quota'
        WHERE md5(sha1(id_jabatan)) = '$idnya'");

      return true;
    }
  }

  function hapus_data($idnya)
  {
    $hapus = $this->db->query("DELETE FROM tb_jabatan WHERE id_jabatan = '$idnya'");
  }

}
