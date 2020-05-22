<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pembelian_M');
  }

  public function index()
  {
    $data['judul'] = "Halaman Penjualan";
    $data['title'] = "Data Penjualan";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $data['penjualan'] = $this->Pembelian_M->getPembeli();

    $this->load->view('templates/BE/admin_header', $data);
    $this->load->view('templates/BE/admin_sidebar', $data);
    $this->load->view('penjualan/index',  $data);
    $this->load->view('templates/BE/admin_footer');
  }
}
