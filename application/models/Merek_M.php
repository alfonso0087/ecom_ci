<?php

class Merek_M extends CI_model
{

  public function kosongkan()
  {
    return $this->db->truncate('tbl_merek');
  }
  public function getAllMerek()
  {
    return $this->db->get('tbl_merek')->result_array();
  }

  public function getIdMerek($id)
  {
    //? Query untuk get data di tabel kriteria
    return $this->db->get_where('tbl_merek', ['id_merek' => $id])->row_array();
  }

  public function tambahData()
  {
    $data = ['nama_merek' => htmlspecialchars($this->input->post('nama_merek', true))];
    return $this->db->insert('tbl_merek', $data);
  }

  public function ubahData()
  {
    $id = $this->input->post('id');
    $data = [
      'nama_merek' => $this->input->post('nama_merek')
    ];
    $this->db->where('id_merek', $id);
    $this->db->update('tbl_merek', $data);
  }

  public function hapusData($id)
  {
    $this->db->delete('tbl_merek', ['id_merek' => $id]);
  }
}
