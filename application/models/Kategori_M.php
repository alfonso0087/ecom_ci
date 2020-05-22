<?php

class Kategori_M extends CI_model
{
  public function getAllKategori()
  {
    //? Query untuk get data di tabel kriteria
    return $this->db->get('tbl_kategori')->result_array();
  }

  public function getIdKategori($id)
  {
    //? Query untuk get data di tabel kriteria
    return $this->db->get_where('tbl_kategori', ['id_kategori_produk' => $id])->row_array();
  }

  public function kosongkan()
  {
    return $this->db->truncate('tbl_kategori');
  }

  public function tambahData()
  {
    $data = ['nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true))];
    return $this->db->insert('tbl_kategori', $data);
  }

  public function ubahData()
  {
    $id = $this->input->post('id');
    $data = [
      'nama_kategori' => $this->input->post('nama_kategori')
    ];
    $this->db->where('id_kategori_produk', $id);
    $this->db->update('tbl_kategori', $data);
  }

  public function hapusData($id)
  {
    $this->db->delete('tbl_kategori', ['id_kategori_produk' => $id]);
  }
}
