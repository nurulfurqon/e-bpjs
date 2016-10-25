<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists('nama_bulan'))
{
	function nama_bulan($bulan)
	{
		$nama_bulan = array(
			'01'=>'Januari',
			'02'=>'Febuari',
			'03'=>'Maret',
			'04'=>'April',
			'05'=>'Mei',
			'06'=>'Juni',
			'07'=>'Juli',
			'08'=>'Agustus',
			'09'=>'Septemper',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
		);

		return $nama_bulan[$bulan];
	}
}
if ( ! function_exists('nama_super_admin'))
{
  function nama_super_admin()
  {
    $CI =& get_instance();
    $nik = $CI->session->userdata('ses_s_adm_nik');
    $query = $CI->db->query("SELECT * FROM tb_pegawai WHERE nik = '$nik'");
    $row = $query->row();
    $nama_super_admin = $row->nama;

    return $nama_super_admin;
  }

}

if ( ! function_exists('foto_super_admin'))
{
  function foto_super_admin()
  {
    $CI =& get_instance();
    $nik = $CI->session->userdata('ses_s_adm_nik');
    $query = $CI->db->query("SELECT * FROM tb_pegawai WHERE nik = '$nik'");
    $row = $query->row();
    $foto_super_admin = $row->foto;

    return $foto_super_admin;
  }

}

if ( ! function_exists('jabatan_super_admin'))
{
  function jabatan_super_admin()
  {
    $CI =& get_instance();
    $nik = $CI->session->userdata('ses_s_adm_nik');
    $query = $CI->db->query("SELECT a.*,b.nama_jabatan FROM tb_pegawai a, tb_jabatan b WHERE a.nik = '$nik' AND a.level_pegawai = b.id_jabatan");
    $row = $query->row();
    $jabatan_super_admin = $row->nama_jabatan;

    return $jabatan_super_admin;
  }

}

if ( ! function_exists('nama_admin'))
{
  function nama_admin()
  {
    $CI =& get_instance();
    $nik = $CI->session->userdata('ses_adm_nik');
    $query = $CI->db->query("SELECT * FROM tb_pegawai WHERE nik = '$nik'");
    $row = $query->row();
    $nama_admin = $row->nama;

    return $nama_admin;
  }

}

if ( ! function_exists('foto_admin'))
{
  function foto_admin()
  {
    $CI =& get_instance();
    $nik = $CI->session->userdata('ses_adm_nik');
    $query = $CI->db->query("SELECT * FROM tb_pegawai WHERE nik = '$nik'");
    $row = $query->row();
    $foto_admin = $row->foto;

    return $foto_admin;
  }

}

if ( ! function_exists('jabatan_admin'))
{
  function jabatan_admin()
  {
    $CI =& get_instance();
    $nik = $CI->session->userdata('ses_adm_nik');
    $query = $CI->db->query("SELECT a.*,b.nama_jabatan FROM tb_pegawai a, tb_jabatan b WHERE a.nik = '$nik' AND a.level_pegawai = b.id_jabatan");
    $row = $query->row();
    $jabatan_admin = $row->nama_jabatan;

    return $jabatan_admin;
  }

}


if ( ! function_exists('nama_user'))
{
  function nama_user()
  {
    $CI =& get_instance();
    $nik = $CI->session->userdata('ses_user_nik');
    $query = $CI->db->query("SELECT * FROM tb_pegawai WHERE nik = '$nik'");
    $row = $query->row();
    $nama_user = $row->nama;

    return $nama_user;
  }

}

if ( ! function_exists('foto_user'))
{
  function foto_user()
  {
    $CI =& get_instance();
    $nik = $CI->session->userdata('ses_user_nik');
    $query = $CI->db->query("SELECT * FROM tb_pegawai WHERE nik = '$nik'");
    $row = $query->row();
    $foto_user = $row->foto;

    return $foto_user;
  }

}

if ( ! function_exists('jabatan_user'))
{
  function jabatan_user()
  {
    $CI =& get_instance();
    $nik = $CI->session->userdata('ses_user_nik');
    $query = $CI->db->query("SELECT a.*,b.nama_jabatan FROM tb_pegawai a, tb_jabatan b WHERE a.nik = '$nik' AND a.level_pegawai = b.id_jabatan");
    $row = $query->row();
    $jabatan_user = $row->nama_jabatan;

    return $jabatan_user;
  }

}
