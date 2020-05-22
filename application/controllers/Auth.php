<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_M');
  }


  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]', [
      'min_length' => 'Password Minimal 3 karakter'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/auth_header.php');
      $this->load->view('auth/index');
      $this->load->view('templates/BE/auth_footer.php');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $admin = $this->db->get_where('tbl_admin', ['email' => $email])->row_array();

    // Cek jika adminnya ada
    if ($admin) {
      if (password_verify($password, $admin['password'])) {
        // Jika Password Benar
        $data = [
          'email' => $admin['email']
        ];
        $this->session->set_userdata($data);
        redirect('admin');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Password salah !!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div> 
     '
        );
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Akun Tidak Ditemukan !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div> 
   '
      );
      redirect('auth');
    }
  }


  public function registrasi()
  {
    // Set validasi
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_admin.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
      'min_length' => 'Password Minimal 3 karakter'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/BE/auth_header.php');
      $this->load->view('auth/registrasi');
      $this->load->view('templates/BE/auth_footer.php');
    } else {
      $this->Auth_M->registrasi();
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Akun berhasil dibuat !
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div> 
   '
      );
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Anda telah keluar !!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    redirect('auth');
  }
}
