<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    if ($this->session->userdata('ses_user_id') == TRUE)
    {
      $this->load->view('Home/home');
    }
    else
    {
      redirect('Login');
    }
  }
}
