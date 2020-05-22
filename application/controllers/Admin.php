<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Merek_M');
    $this->load->library('form_validation');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['judul'] = "Halaman Dashboard";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/BE/admin_header', $data);
    $this->load->view('templates/BE/admin_sidebar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/BE/admin_footer');
  }
}
