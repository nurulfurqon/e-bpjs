<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_super_admin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    if ($this->session->userdata('ses_s_adm_id') == TRUE)
    {
      $this->load->view('Home_super_admin/home');
    }
    else
    {
      redirect('Login_super_admin');
    }
  }
}
