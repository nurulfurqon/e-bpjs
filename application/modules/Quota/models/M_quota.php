<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_quota extends CI_Model
{
  function id_otomatis(&$idnya)//membuat id otomatis
	{
		$query=$this->db->query("SELECT id_ambil_quota FROM tb_ambil_quota ORDER BY id_ambil_quota DESC");
		$cek = $query->num_rows(count($query));
		if ($cek == 0)
		{
			$id = 1;
		}
		else
		{
			$row = $query->row();
			$id = $row->id_ambil_quota+1;
      //((int)$row->id)+1;
		}
		$idnya = $id;
	}

  function ambil_level()
  {
    $query = $this->db->query("SELECT * FROM tb_jabatan ORDER BY nama_jabatan");
    return $query->result();
  }
  function ambil_pegawai($nik)
  {
    $query = $this->db->query("SELECT * FROM tb_pegawai WHERE nik = '$nik'");
    return $query->row();
  }

  function ambil_quota($nik)
  {
    $query = $this->db->query("SELECT SUM(ambil_quota) as jml_quota FROM tb_ambil_quota WHERE nik_pegawai = '$nik'");
    return $query->row();
  }

  function tampil_data($perpage,$uri)
  {
    $cari_tanggal = $this->input->post('cari_tanggal');
    $nik = $this->session->userdata('ses_user_nik');

    $tgl = explode('/',$cari_tanggal);
    if(count($tgl) == 3)
		{
      $cari_tanggal = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
    }

    if (empty($cari_tanggal))
    {
      $this->db->select("a.*,b.nama");
      $this->db->from("tb_ambil_quota a,tb_pegawai b");
      $this->db->where("a.nik_pegawai = '$nik' AND b.nik = a.nik_pegawai");
      $this->db->order_by("a.tgl_ambil_quota","DESC");
    }
    else
    {
      $this->db->select("a.*,b.nama");
      $this->db->from("tb_ambil_quota a,tb_pegawai b");
      $this->db->where("a.nik_pegawai = '$nik' AND b.nik = a.nik_pegawai AND a.tgl_ambil_quota LIKE '$cari_tanggal%'");
      $this->db->order_by("a.tgl_ambil_quota","DESC");
    }
    $query = $this->db->get('',$perpage,$uri);
		return $query->result();
  }

  function tambah_data($nik_pegawai,$nama_pengguna,$jenis_kelamin,$ket_pengguna,$ket_dokter,$ket_obat,$tgl_berobat,$ambil_quota,$status_quota,$foto_bukti,$tgl_ambil_quota,$tgl_terima_quota)
  {
    $query = $this->db->query("SELECT nik_pegawai, nama_pengguna, jenis_kelamin, ket_pengguna, ket_dokter, ket_obat
            FROM tb_ambil_quota WHERE nik_pegawai = '$nik_pegawai' AND nama_pengguna = '$nama_pengguna' AND jenis_kelamin = '$jenis_kelamin'
            AND ket_pengguna = '$ket_pengguna' AND ket_dokter = '$ket_dokter' AND ket_obat = '$ket_obat' AND tgl_berobat ='$tgl_berobat'");
    $cek = $query->num_rows(count($query));

    if($cek != 0)
		{
			return false;
		}
    else
    {
      $data_pegawai = $this->db->query("SELECT * FROM tb_pegawai WHERE nik = '$nik_pegawai'");
      $dt_pegawai = $data_pegawai->row();
      $nik = $dt_pegawai->nik;
      $quota = $dt_pegawai->quota_pegawai;
      $total_quota = $quota - $ambil_quota;//jumlah quota yg sudah di kurang
      $tahun_sekarang = date('y');

      /* kode otomatis */
      $kode_v1 = $nik.$tahun_sekarang;
      //konfigurasi no urut
      $urut = $this->db->query("SELECT MAX(kode_bukti) as max_id FROM tb_ambil_quota WHERE kode_bukti LIKE '$kode_v1%'");
			$kode = "";
			if($urut->num_rows(count($urut))>0)
			{
				foreach ($urut->result() as $kode)
				{
					$next_urut  = ((int)substr($kode->max_id,9))+1;
					$next_kode  = $kode_v1.sprintf("%04s", $next_urut);
				}
			}
			else
			{
				$next_kode = "0001";
			}
      $kode_bukti = $next_kode;

      $update_pegawai = $this->db->query("UPDATE tb_pegawai SET quota_pegawai = '$total_quota' WHERE nik = '$nik_pegawai'");

      //id otomatis
      $id = "";
			$this->id_otomatis($id);

      $simpan = $this->db->query("INSERT INTO tb_ambil_quota
        (id_ambil_quota,nik_pegawai,nama_pengguna,jenis_kelamin,ket_pengguna,ket_dokter,ket_obat,tgl_berobat,foto_bukti,tgl_ambil_quota,ambil_quota,status_quota,tgl_terima_quota,kode_bukti) VALUES
        ('$id','$nik_pegawai','$nama_pengguna','$jenis_kelamin','$ket_pengguna','$ket_dokter','$ket_obat','$tgl_berobat','$foto_bukti','$tgl_ambil_quota','$ambil_quota','$status_quota','$tgl_terima_quota','$kode_bukti')
      ");

      return true;
    }
  }

  function getJabatan($level_jabatan)
  {
    $this->db->where('level_pegawai',$level_jabatan);
    $result = $this->db->get('tb_pegawai');
    return $result->result();
  }

  function getQuota($nik_pegawai)
  {
    $this->db->where('nik',$nik_pegawai);
    $result = $this->db->get('tb_pegawai');
    return $result->row();
  }

  function download_data($idnya)
  {
    $this->db->where('id_ambil_quota',$idnya);
    $result = $this->db->get('tb_ambil_quota');
    return $result->row()->foto_bukti;
  }

  function detail_data($idnya)
  {
    $query = $this->db->query("SELECT *,tb_ambil_quota.jenis_kelamin AS jenis_kelamin_p FROM tb_ambil_quota INNER JOIN tb_pegawai ON tb_pegawai.nik = tb_ambil_quota.nik_pegawai WHERE md5(sha1(id_ambil_quota)) = '$idnya'");
    return $query->row();
  }

  function ubah_data($idnya,$nama_pengguna,$jenis_kelamin,$ket_pengguna,$ket_dokter,$ket_obat,$tgl_berobat)
  {
    $query = $this->db->query("SELECT nama_pengguna, jenis_kelamin, ket_pengguna, ket_dokter, ket_obat FROM tb_ambil_quota
      WHERE nama_pengguna = '$nama_pengguna' AND jenis_kelamin = '$jenis_kelamin' AND ket_pengguna = '$ket_pengguna' AND ket_dokter = '$ket_dokter' AND ket_obat = '$ket_obat' AND tgl_berobat = '$tgl_berobat' AND md5(sha1(id_ambil_quota)) != '$idnya'");
    $cek = $query->num_rows(count($query));

    if ($cek != 0)
    {
      return false;
    }
    else
    {
      $ubah = $this->db->query("UPDATE tb_ambil_quota SET
        nama_pengguna = '$nama_pengguna',
        jenis_kelamin = '$jenis_kelamin',
        ket_pengguna = '$ket_pengguna',
        ket_dokter = '$ket_dokter',
        ket_obat = '$ket_obat',
        tgl_berobat = '$tgl_berobat'
        WHERE md5(sha1(id_ambil_quota)) = '$idnya'");

      return true;
    }
  }

  function ubah_foto($idnya,$foto)
  {

    $this->db->where('md5(sha1(id_ambil_quota))',$idnya);
    $query = $this->db->get('tb_ambil_quota');
    $row = $query->row();
    $depan = unlink('./assets/img/slip/'.$row->foto_bukti);//untuk hapus foto
    $ubah = $this->db->query("UPDATE tb_ambil_quota SET foto_bukti = '$foto' WHERE md5(sha1(id_ambil_quota)) = '$idnya'");
    return true;

  }

  function hapus_data($idnya)
  {
    $this->db->where('id_ambil_quota',$idnya);
    $query = $this->db->get('tb_ambil_quota');
    $row = $query->row();
    $foto = unlink('./assets/img/slip/'.$row->foto_bukti);//untuk hapus gambar depan

    $hapus = $this->db->query("DELETE FROM tb_ambil_quota WHERE id_ambil_quota = '$idnya'");
  }

}
