<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kategori_M');
    $this->load->model('Merek_M');
    $this->load->model('Produk_M');
    $this->load->library('form_validation');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }

  public function kosong()
  {
    $this->Produk_M->kosongkan();
    redirect('produk');
  }

  public function index()
  {
    $data['judul'] = "Halaman Produk";
    $data['title'] = "Manajemen Produk";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $data['produk'] = $this->Produk_M->getAllProduk();

    $this->load->view('templates/BE/admin_header', $data);
    $this->load->view('templates/BE/admin_sidebar', $data);
    $this->load->view('produk/index',  $data);
    $this->load->view('templates/BE/admin_footer');
  }

  public function tambah()
  {
    $data['judul'] = "Halaman Produk";
    $data['title'] = "Tambah Data Produk";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $data['merek'] = $this->Merek_M->getAllMerek();
    $data['kategori'] = $this->Kategori_M->getAllKategori();

    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required|trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|integer');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/admin_header', $data);
      $this->load->view('templates/BE/admin_sidebar', $data);
      $this->load->view('produk/tambah_produk',  $data);
      $this->load->view('templates/BE/admin_footer');
    } else {
      //* Cek gambar yang akan diupload
      $gambar = $_FILES['gambar_produk']['name'];
      // Jika gambarnya ada
      if ($gambar) {
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '4096'; // Max 4MB
        $config['overwrite'] = true; //! Agar file gambar bisa di replace
        $config['upload_path'] = './asset/BE/dist/img/gambar_produk/';

        $this->load->library('upload', $config);
        // Jika gambar berhasil diupload
        if ($this->upload->do_upload('gambar_produk')) {
          $this->Produk_M->tambahData();
          $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Produk Berhasil Ditambahkan !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('produk');
        } else {
          echo $this->upload->display_errors();
        }
      } else {
        echo $this->upload->display_errors();
      }
    }
  }

  public function ubah($id)
  {
    $data['judul'] = "Halaman Produk";
    $data['title'] = "Ubah Data Produk";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['kategori'] = $this->Kategori_M->getAllKategori();
    $data['merek'] = $this->Merek_M->getAllMerek();
    $data['produk'] = $this->Produk_M->getIdProduk($id);

    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required|trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|integer');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/admin_header', $data);
      $this->load->view('templates/BE/admin_sidebar', $data);
      $this->load->view('produk/ubah_produk',  $data);
      $this->load->view('templates/BE/admin_footer');
    } else {
      //* Cek gambar yang akan diupload
      $gambar = $_FILES['gambar_produk']['name'];
      // Jika gambarnya ada
      if ($gambar) {
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '4096'; // Max 4MB
        $config['overwrite'] = true; //! Agar file gambar bisa di replace
        $config['upload_path'] = './asset/BE/dist/img/gambar_produk/';

        $this->load->library('upload', $config);
        // Jika gambar berhasil diupload
        if ($this->upload->do_upload('gambar_produk')) {
          $this->Produk_M->ubahData();
          $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Produk Berhasil Diubah !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('produk');
        } else {
          echo $this->upload->display_errors();
        }
      } else {
        echo $this->upload->display_errors();
      }
    }
  }

  public function hapus($id)
  {
    $this->Produk_M->hapusData($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Data Produk Berhasil DiHapus !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('produk');
  }
}
