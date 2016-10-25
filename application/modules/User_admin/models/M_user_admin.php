<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_user_admin extends CI_Model
{

  function id_otomatis(&$idnya)//membuat id otomatis
	{
		$query=$this->db->query("SELECT id_login_user FROM tb_login_user ORDER BY id_login_user DESC");
		$cek = $query->num_rows(count($query));
		if ($cek == 0)
		{
			$id = 1;
		}
		else
		{
			$row = $query->row();
			$id = $row->id_login_user+1;
      //((int)$row->id)+1;
		}
		$idnya = $id;
	}

  function ambil_level()
  {
    $query = $this->db->query("SELECT * FROM tb_jabatan ORDER BY nama_jabatan");
    return $query->result();
  }

  function tampil_data($perpage,$uri)
  {
    $cari_status = $this->input->post('cari_status');
    $cari_nik = $this->input->post('cari_nik');

    if (empty($cari_status) && empty($cari_nik))
    {
      $this->db->select("a.*,b.nama,c.nama_jabatan");
      $this->db->from("tb_login_user a,tb_pegawai b,tb_jabatan c");
      $this->db->where("b.nik = a.nik_pegawai AND c.id_jabatan = b.level_pegawai");
      $this->db->order_by("b.nama","ASC");
    }
    else
    {
      $this->db->select("a.*,b.nama,c.nama_jabatan");
      $this->db->from("tb_login_user a,tb_pegawai b,tb_jabatan c");
      $this->db->where("b.nik = a.nik_pegawai AND c.id_jabatan = b.level_pegawai AND a.status = '$cari_status' AND a.nik_pegawai LIKE '$cari_nik%'");
      $this->db->order_by("b.nama","ASC");
    }
    $query = $this->db->get('',$perpage,$uri);
		return $query->result();
  }
  /*function tampil_data()
  {
    $query = $this->db->query("SELECT a.*,b.nama,c.nama_jabatan FROM tb_login_user a,tb_pegawai b,tb_jabatan c
       WHERE b.nik = a.nik_pegawai AND c.id_jabatan = b.level_pegawai ORDER BY b.nama,'ASC'");
    return $query->result();
  }*/

  function getJabatan($level_jabatan)
  {
    $this->db->where('level_pegawai',$level_jabatan);
    $result = $this->db->get('tb_pegawai');
    return $result->result();
  }

  function tambah_data($nik_pegawai,$password,$status)
  {
    $query = $this->db->query("SELECT nik_pegawai FROM tb_login_user WHERE nik_pegawai = '$nik_pegawai'");
    $quero = $this->db->query("SELECT password FROM tb_login_user WHERE password = '$password'");
    $cek = $query->num_rows(count($query));
    $cok = $quero->num_rows(count($quero));
    if($cek != 0 || $cok != 0)
		{
			return false;
		}
    else
    {
      $id = "";
			$this->id_otomatis($id);

      //simpan data ke database
      $simpan=$this->db->query("INSERT INTO tb_login_user VALUES('$id','$nik_pegawai','$password','$status')");
			return true;
    }
  }

  function detail_data($idnya)
  {
    $detail = $this->db->query("SELECT * FROM tb_login_user WHERE md5(sha1(id_login_user)) = '$idnya'");
		$baris = $detail->row();
		return $baris;
  }

  function ubah_data($idnya,$password)
  {
    $query = $this->db->query("SELECT password FROM tb_login_user WHERE password = '$password' AND md5(sha1(id_login_user)) != '$idnya'");
    $cek = $query->num_rows(count($query));

    if ($cek != 0)
    {
      return false;
    }
    else
    {
      $ubah = $this->db->query("UPDATE tb_login_user SET
        password = '$password'
        WHERE md5(sha1(id_login_user)) = '$idnya'");

      return true;
    }
  }

  function hapus_data($idnya)
  {
    $hapus = $this->db->query("DELETE FROM tb_login_user WHERE id_login_user = '$idnya'");
  }


}
