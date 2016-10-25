<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_pegawai_admin extends CI_Model
{

  function update_quota($tgl_update)
  {
    $quota = $this->db->query("SELECT * FROM tb_pegawai ORDER BY nama");
    $tes = $quota->result();

    foreach ($tes as $key) {

      $query[] = $this->db->query("UPDATE tb_pegawai AS tb1,(SELECT a.quota_pegawai,b.quota FROM tb_pegawai a, tb_jabatan b WHERE a.nik = '$key->nik' AND b.id_jabatan = a.level_pegawai) AS tb2
SET tb1.quota_pegawai = tb2.quota_pegawai + tb2.quota, tb1.tgl_update_quota = '$tgl_update' WHERE tb1.nik = '$key->nik'");
    }

    return true;
  }

  function ambil_level()
  {
    $query = $this->db->query("SELECT * FROM tb_jabatan ORDER BY nama_jabatan");
    return $query->result();
  }

  function tampil_data($perpage,$uri)
  {
    $cari_jabatan = $this->input->post('cari_jabatan');
    $cari_nik = $this->input->post('cari_nik');

    if (empty($cari_jabatan) && empty($cari_nik))
    {
      $this->db->select("*");
      $this->db->from("tb_pegawai");
      $this->db->join('tb_jabatan','tb_jabatan.id_jabatan = tb_pegawai.level_pegawai','inner');
      $this->db->order_by("nama","ASC");
    }
    else
    {
      $this->db->select("*");
      $this->db->from("tb_pegawai");
      $this->db->join('tb_jabatan','tb_jabatan.id_jabatan = tb_pegawai.level_pegawai','inner');
      $this->db->where("level_pegawai = '$cari_jabatan' AND nik LIKE '$cari_nik%'");
      $this->db->order_by("nama","ASC");
    }
    $query = $this->db->get('',$perpage,$uri);
		return $query->result();
  }

  function tambah_data($nik,$nama,$alamat,$tempat_lahir,$tgl_lahir,$jenis_kelamin,$telepon,$status,$foto,$level_pegawai,$tgl_mulai_kerja,$no_bpjs,$tgl_update)
  {
    $query = $this->db->query("SELECT nik FROM tb_pegawai WHERE nik = '$nik'");
    $cek = $query->num_rows(count($query));

    /* ambil quota */
    $jabatan = $this->db->query("SELECT quota FROM tb_jabatan WHERE id_jabatan = '$level_pegawai'");
    $quota = $jabatan->row()->quota;

    if($cek != 0)
		{
			return false;
		}
    else
    {
      $simpan=$this->db->query("INSERT INTO tb_pegawai (nik,nama,alamat,tempat_lahir,tgl_lahir,jenis_kelamin,telepon,status,foto,level_pegawai,tgl_mulai_kerja,no_bpjs,quota_pegawai,tgl_update_quota)
      VALUES('$nik','$nama','$alamat','$tempat_lahir','$tgl_lahir','$jenis_kelamin','$telepon','$status','$foto','$level_pegawai','$tgl_mulai_kerja','$no_bpjs','$quota','$tgl_update')");
			return true;
    }
  }

  function detail_data($idnya)
  {
    $query = $this->db->query("SELECT * FROM tb_pegawai INNER JOIN tb_jabatan ON tb_jabatan.id_jabatan = tb_pegawai.level_pegawai WHERE md5(sha1(nik)) = '$idnya'");
    return $query->row();
  }
  function ubah_data($idnya,$nama,$alamat,$tempat_lahir,$tgl_lahir,$jenis_kelamin,$telepon,$status,$level_pegawai,$tgl_mulai_kerja,$no_bpjs)
  {
    $query = $this->db->query("SELECT nama, alamat, tempat_lahir, tgl_lahir FROM tb_pegawai WHERE nama = '$nama' AND alamat = '$alamat' AND tempat_lahir = '$tempat_lahir' AND tgl_lahir = '$tgl_lahir' AND md5(sha1(nik)) != '$idnya'");
    $cek = $query->num_rows(count($query));

    if ($cek != 0)
    {
      return false;
    }
    else
    {
      $ambil_jabatan = $this->db->query("SELECT level_pegawai, quota_pegawai FROM tb_pegawai WHERE md5(sha1(nik)) = '$idnya'");
      $jabatan = $ambil_jabatan->row()->level_pegawai;
      if ($level_pegawai != $jabatan) {
        $quota = '0';
      }
      else {
        $quota = $ambil_jabatan->row()->quota_pegawai;
      }

      $ubah = $this->db->query("UPDATE tb_pegawai SET
        nama = '$nama',
        alamat = '$alamat',
        tempat_lahir = '$tempat_lahir',
        tgl_lahir = '$tgl_lahir',
        jenis_kelamin = '$jenis_kelamin',
        telepon = '$telepon',
        status = '$status',
        level_pegawai = '$level_pegawai',
        tgl_mulai_kerja = '$tgl_mulai_kerja',
        no_bpjs = '$no_bpjs',
        quota_pegawai = '$quota'
        WHERE md5(sha1(nik)) = '$idnya'");

      return true;
    }
  }

  function ubah_foto($idnya,$foto)
  {

    $this->db->where('md5(sha1(nik))',$idnya);
    $query = $this->db->get('tb_pegawai');
    $row = $query->row();
    $depan = unlink('./assets/img/'.$row->foto);//untuk hapus foto
    $ubah = $this->db->query("UPDATE tb_pegawai SET foto = '$foto' WHERE md5(sha1(nik)) = '$idnya'");
    return true;

  }

  function hapus_data($idnya)
  {
    $this->db->where('nik',$idnya);
    $query = $this->db->get('tb_pegawai');
    $row = $query->row();
    $foto = unlink('./assets/img/'.$row->foto);//untuk hapus gambar depan

    $hapus = $this->db->query("DELETE FROM tb_pegawai WHERE nik = '$idnya'");
  }
}
