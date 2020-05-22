<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Cart_M');
    $this->load->model('Biayakirim_M');
    $this->load->model('Pembelian_M');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['keranjang'] = $this->Cart_M->getAllOrder();
    $data['subTotal'] = $this->Cart_M->Sub_Total();

    $this->load->view('templates/FE/cart/cart_header');
    $this->load->view('home/cart/cart', $data);
    $this->load->view('templates/FE/cart/cart_footer');
  }

  public function addCart()
  {
    $cekOrder = $this->Cart_M->cekOrder();
    // var_dump($cekOrder);
    // die;
    // Jika baru ada 1 produk maka langsung masukkan ke tbl_order
    if ($cekOrder == 0) {
      $this->Cart_M->inputData();
      redirect('cart');
    } else {
      // jika produk yg dipilih sudah ada, maka tambahkan jumlahnya
      $this->Cart_M->updateData();
      redirect('cart');
    }
  }

  public function hapus($id)
  {
    $this->Cart_M->hapusData($id);
    redirect('cart');
  }

  public function selesai()
  {
    $data['kota'] = $this->Biayakirim_M->getAllBiaya();
    $data['order'] = $this->Cart_M->getAllOrder();

    $this->load->view('templates/FE/cart/cart_header');
    $this->load->view('home/cart/selesai', $data);
    $this->load->view('templates/FE/cart/cart_footer');
  }

  public function validasi()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('telpon', 'Telepon', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');

    // $id = $this->input->post('id');

    if ($this->form_validation->run() == false) {
      // Jika form terdapat error
      $this->selesai();
    } else {
      $this->Cart_M->terimakasih();
      redirect('cart/terimakasih');
    }
  }

  public function terimakasih()
  {
    // $id = $this->Pembelian_M->id();
    // var_dump($id);
    // die;
    // var_dump($id);
    // die;
    // $data['konsumen'] = $this->Pembelian_M->getPembeliID($id);

    $this->load->view('templates/FE/cart/cart_header');
    $this->load->view('home/cart/terimakasih');
    $this->load->view('templates/FE/cart/cart_footer');
  }
}
