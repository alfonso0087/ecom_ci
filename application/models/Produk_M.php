<?php

class Produk_M extends CI_model
{
  public function getAllProduk()
  {
    return $this->db->get('tbl_produk')->result_array();
  }

  public function getIdProduk($id)
  {
    //? Query untuk get data di tabel kriteria
    $query = "SELECT `tbl_produk`.`id_produk`,`tbl_produk`.`id_kategori_produk`,`tbl_produk`.`id_merek`,`tbl_produk`.`nama_produk`,`tbl_produk`.`deskripsi`,`tbl_produk`.`harga`,`tbl_produk`.`gambar`,`tbl_produk`.`slide`,`tbl_produk`.`rekomendasi`, `tbl_merek`.`id_merek`,`tbl_merek`.`nama_merek`,`tbl_kategori`.`id_kategori_produk`,`tbl_kategori`.`nama_kategori` FROM `tbl_produk` JOIN `tbl_merek` ON `tbl_produk`.`id_merek`=`tbl_merek`.`id_merek` JOIN `tbl_kategori` ON `tbl_produk`.`id_kategori_produk`=`tbl_kategori`.`id_kategori_produk` WHERE `tbl_produk`.`id_produk`=$id
    ";
    return $this->db->query($query)->row_array();
  }

  public function slideProduk()
  {
    $query = "SELECT *
    FROM `tbl_produk`
    WHERE `tbl_produk`.`slide`='Y'
    ";
    return $this->db->query($query)->result_array();
  }

  public function rekomendasiProduk()
  {
    $query = "SELECT *
    FROM `tbl_produk`
    WHERE `tbl_produk`.`rekomendasi`='Y'
    ORDER BY `tbl_produk`.`harga`
    DESC LIMIT 3
    ";
    return $this->db->query($query)->result_array();
  }
  public function rekomendasiAscProduk()
  {
    $query = "SELECT *
    FROM `tbl_produk`
    WHERE `tbl_produk`.`rekomendasi`='Y'
    ORDER BY `tbl_produk`.`harga`
    ASC LIMIT 3
    ";
    return $this->db->query($query)->result_array();
  }

  public function kosongkan()
  {
    return $this->db->truncate('tbl_produk');
  }

  public function tambahData()
  {
    $data = [
      'id_kategori_produk' => $this->input->post('kategori'),
      'id_merek' => $this->input->post('merek'),
      'nama_produk' => htmlspecialchars($this->input->post('nama_produk', true)),
      'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
      'harga' => htmlspecialchars($this->input->post('harga', true)),
      'gambar' => $this->upload->data('file_name'),
      'slide' => $this->input->post('slide'),
      'rekomendasi' => $this->input->post('rekomendasi')
    ];
    $this->db->insert('tbl_produk', $data);
  }

  public function ubahData()
  {
    $id = $this->input->post('id');
    $data = [
      'id_kategori_produk' => $this->input->post('kategori'),
      'id_merek' => $this->input->post('merek'),
      'nama_produk' => htmlspecialchars($this->input->post('nama_produk', true)),
      'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
      'harga' => htmlspecialchars($this->input->post('harga', true)),
      'gambar' => $this->upload->data('file_name'),
      'slide' => $this->input->post('slide'),
      'rekomendasi' => $this->input->post('rekomendasi')
    ];
    $this->db->where('id_produk', $id);
    $this->db->update('tbl_produk', $data);
  }

  public function hapusData($id)
  {
    $this->db->delete('tbl_produk', ['id_produk' => $id]);
  }

  public function KategoriProduk($id)
  {
    $query = "SELECT `tbl_produk`.*,`tbl_kategori`.`id_kategori_produk`,`tbl_kategori`.`nama_kategori`
    FROM `tbl_produk` JOIN `tbl_kategori`
    ON `tbl_produk`.`id_kategori_produk`=`tbl_kategori`.`id_kategori_produk`
    WHERE `tbl_produk`.`id_kategori_produk`= $id
    ";
    return $this->db->query($query)->result_array();
  }

  public function JudulKategoriProduk($id)
  {
    //? Query untuk get data di tabel kriteria
    return $this->db->get_where('tbl_kategori', ['id_kategori_produk' => $id])->row_array();
  }

  public function MerekProduk($id)
  {
    $query = "SELECT `tbl_produk`.*,`tbl_merek`.`id_merek`,`tbl_merek`.`nama_merek`
    FROM `tbl_produk` JOIN `tbl_merek`
    ON `tbl_produk`.`id_merek`=`tbl_merek`.`id_merek`
    WHERE `tbl_produk`.`id_merek`= $id
    ";
    return $this->db->query($query)->result_array();
  }

  public function JudulMerekProduk($id)
  {
    //? Query untuk get data di tabel kriteria
    return $this->db->get_where('tbl_merek', ['id_merek' => $id])->row_array();
  }
}
