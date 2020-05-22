<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kategori_M');
    $this->load->model('Merek_M');
    $this->load->model('Produk_M');
  }

  public function index()
  {
    $data['kategori'] = $this->Kategori_M->getAllKategori();
    $data['merek'] = $this->Merek_M->getAllMerek();
    // Slider belum fix
    $data['slider'] = $this->Produk_M->slideProduk();
    $data['rekomendasi'] = $this->Produk_M->rekomendasiProduk();
    $data['rekomendasi2'] = $this->Produk_M->rekomendasiAscProduk();
    $data['produk'] = $this->Produk_M->getAllProduk();

    $this->load->view('templates/FE/home/home_header', $data);
    $this->load->view('templates/FE/home/home_sidebar', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/FE/home/home_footer');
  }

  public function produkbyKategori($id)
  {
    $data['kategori'] = $this->Kategori_M->getAllKategori();
    $data['merek'] = $this->Merek_M->getAllMerek();
    // Slider belum fix
    $data['slider'] = $this->Produk_M->slideProduk();
    $data['rekomendasi'] = $this->Produk_M->rekomendasiProduk();
    $data['rekomendasi2'] = $this->Produk_M->rekomendasiAscProduk();
    $data['JudulKategori'] = $this->Produk_M->JudulKategoriProduk($id);
    $data['KategoriProduk'] = $this->Produk_M->KategoriProduk($id);

    $this->load->view('templates/FE/home/home_header', $data);
    $this->load->view('templates/FE/home/home_sidebar', $data);
    $this->load->view('home/kategori/index', $data);
    $this->load->view('templates/FE/home/home_footer');
  }

  public function produkbyMerek($id)
  {
    $data['kategori'] = $this->Kategori_M->getAllKategori();
    $data['merek'] = $this->Merek_M->getAllMerek();
    // Slider belum fix
    $data['slider'] = $this->Produk_M->slideProduk();
    $data['rekomendasi'] = $this->Produk_M->rekomendasiProduk();
    $data['rekomendasi2'] = $this->Produk_M->rekomendasiAscProduk();
    $data['JudulMerek'] = $this->Produk_M->JudulMerekProduk($id);
    $data['MerekProduk'] = $this->Produk_M->MerekProduk($id);

    $this->load->view('templates/FE/home/home_header', $data);
    $this->load->view('templates/FE/home/home_sidebar', $data);
    $this->load->view('home/merek/index', $data);
    $this->load->view('templates/FE/home/home_footer');
  }
}
