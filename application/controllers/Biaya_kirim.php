<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biaya_kirim extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Biayakirim_M');
    $this->load->library('form_validation');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['judul'] = "Halaman Biaya Kirim";
    $data['title'] = "Manajemen Biaya Kirim";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $data['biaya'] = $this->Biayakirim_M->getAllBiaya();

    $this->load->view('templates/BE/admin_header', $data);
    $this->load->view('templates/BE/admin_sidebar', $data);
    $this->load->view('biaya_kirim/index',  $data);
    $this->load->view('templates/BE/admin_footer');
  }

  public function tambah()
  {
    $data['judul'] = "Halaman Biaya Kirim";
    $data['title'] = "Tambah Data Biaya Kirim";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
    $this->form_validation->set_rules('biaya', 'Biaya', 'required|integer');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/admin_header', $data);
      $this->load->view('templates/BE/admin_sidebar', $data);
      $this->load->view('biaya_kirim/tambah_biaya',  $data);
      $this->load->view('templates/BE/admin_footer');
    } else {
      $this->Biayakirim_M->tambahData();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data Biaya Kirim Berhasil Ditambahkan !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('biaya_kirim');
    }
  }

  public function ubah($id)
  {
    $data['judul'] = "Halaman Biaya Kirim";
    $data['title'] = "Ubah Data Biaya Kirim";
    $data['user'] = $this->db->get_where('tbl_admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['biaya'] = $this->Biayakirim_M->getIdBiaya($id);

    $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
    $this->form_validation->set_rules('biaya', 'Biaya', 'required|integer');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/admin_header', $data);
      $this->load->view('templates/BE/admin_sidebar', $data);
      $this->load->view('biaya_kirim/ubah_biaya',  $data);
      $this->load->view('templates/BE/admin_footer');
    } else {
      $this->Biayakirim_M->ubahData();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data Biaya Kirim Berhasil Diubah !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('biaya_kirim');
    }
  }

  public function hapus($id)
  {
    $this->Biayakirim_M->hapusData($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Data Biaya Kirim Berhasil DiHapus !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('biaya_kirim');
  }
}
