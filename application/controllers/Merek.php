<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merek extends CI_Controller
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
    $data['judul'] = "Halaman Merek";
    $data['title'] = "Manajemen Merek";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $data['merek'] = $this->Merek_M->getAllMerek();

    $this->load->view('templates/BE/admin_header', $data);
    $this->load->view('templates/BE/admin_sidebar', $data);
    $this->load->view('merek/index',  $data);
    $this->load->view('templates/BE/admin_footer');
  }

  public function kosong()
  {
    $this->Merek_M->kosongkan();
    redirect('merek');
  }

  public function tambah()
  {
    $data['judul'] = "Halaman Merek";
    $data['title'] = "Tambah Data Merek";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('nama_merek', 'Merek', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/admin_header', $data);
      $this->load->view('templates/BE/admin_sidebar', $data);
      $this->load->view('merek/tambah_merek',  $data);
      $this->load->view('templates/BE/admin_footer');
    } else {
      $this->Merek_M->tambahData();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data Merek Berhasil Ditambahkan !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('merek');
    }
  }

  public function ubah($id)
  {
    $data['judul'] = "Halaman Merek";
    $data['title'] = "Ubah Data Merek";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['merek'] = $this->Merek_M->getIdMerek($id);

    $this->form_validation->set_rules('nama_merek', 'Merek', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/admin_header', $data);
      $this->load->view('templates/BE/admin_sidebar', $data);
      $this->load->view('merek/ubah_merek',  $data);
      $this->load->view('templates/BE/admin_footer');
    } else {
      $this->Merek_M->ubahData();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data Merek Berhasil Diubah !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('merek');
    }
  }

  public function hapus($id)
  {
    $this->Merek_M->hapusData($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Data Merek Berhasil DiHapus !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('merek');
  }
}
