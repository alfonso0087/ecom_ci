<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kategori_M');
    $this->load->library('form_validation');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }

  public function kosong()
  {
    $this->Kategori_M->kosongkan();
    redirect('kategori');
  }

  public function index()
  {
    $data['judul'] = "Halaman Kategori";
    $data['title'] = "Manajemen Kategori";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $data['kategori'] = $this->Kategori_M->getAllKategori();


    $this->load->view('templates/BE/admin_header', $data);
    $this->load->view('templates/BE/admin_sidebar', $data);
    $this->load->view('kategori/index',  $data);
    $this->load->view('templates/BE/admin_footer');
  }

  public function tambah()
  {
    $data['judul'] = "Halaman Kategori";
    $data['title'] = "Tambah Data Kategori";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/admin_header', $data);
      $this->load->view('templates/BE/admin_sidebar', $data);
      $this->load->view('kategori/tambah_kategori',  $data);
      $this->load->view('templates/BE/admin_footer');
    } else {
      $this->Kategori_M->tambahData();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data Kategori Berhasil Ditambahkan !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('kategori');
    }
  }

  public function ubah($id)
  {
    $data['judul'] = "Halaman Kategori";
    $data['title'] = "Ubah Data Kategori";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['kategori'] = $this->Kategori_M->getIdKategori($id);

    $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/admin_header', $data);
      $this->load->view('templates/BE/admin_sidebar', $data);
      $this->load->view('kategori/ubah_kategori',  $data);
      $this->load->view('templates/BE/admin_footer');
    } else {
      $this->Kategori_M->ubahData();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data Kategori Berhasil Diubah !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('kategori');
    }
  }

  public function hapus($id)
  {
    $this->Kategori_M->hapusData($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Data Kategori Berhasil DiHapus !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('kategori');
  }
}
