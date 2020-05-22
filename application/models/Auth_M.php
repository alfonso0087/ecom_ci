<?php

class Auth_M extends CI_model
{
  public function registrasi()
  {
    $data = [
      'username' => htmlspecialchars($this->input->post('username', true)),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'nama' => htmlspecialchars($this->input->post('nama', true)),
      'email' => htmlspecialchars($this->input->post('email', true))
    ];
    $this->db->insert('tbl_admin', $data);
  }
}
