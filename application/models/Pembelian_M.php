<?php

class Pembelian_M extends CI_model
{
  public function getPembeli()
  {
    return $this->db->get('tbl_pembelian')->result_array();
  }

  // public function id()
  // {

  //   $id = array_column($cek, 'id_order');
  //   $cek = $this->getPembeliID($id);
  //   var_dump($id);
  //   die;
  //   $pembeli = $cek['id_order'];
  //   return $pembeli;
  // }
  public function getPembeliID($id)
  {
    return $this->db->get_where('tbl_pembelian', ['id_order' => $id])->row_array();
  }
}
