<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_laporan_pdf extends CI_Model
{
  function tampil_data($idnya)
  {
    $query = $this->db->query("SELECT a.*,b.*,c.nama_jabatan FROM tb_ambil_quota a, tb_pegawai b, tb_jabatan c
      WHERE b.nik = a.nik_pegawai AND c.id_jabatan = b.level_pegawai AND md5(sha1(a.id_ambil_quota)) = '$idnya'");

    return $query->row();
  }




}
