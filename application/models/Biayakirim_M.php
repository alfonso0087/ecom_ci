<?php

class Biayakirim_M extends CI_model
{
  public function getAllBiaya()
  {
    return $this->db->get('tbl_biaya_kirim')->result_array();
  }

  public function getIdBiaya($id)
  {
    return $this->db->get_where('tbl_biaya_kirim', ['id_biaya_kirim' => $id])->row_array();
  }

  public function tambahData()
  {
    $data = [
      'kota' => htmlspecialchars($this->input->post('kota', true)),
      'biaya' => htmlspecialchars($this->input->post('biaya', true))
    ];
    return $this->db->insert('tbl_biaya_kirim', $data);
  }

  public function ubahData()
  {
    $id = $this->input->post('id');
    $data = [
      'kota' => htmlspecialchars($this->input->post('kota', true)),
      'biaya' => htmlspecialchars($this->input->post('biaya', true)),
    ];
    $this->db->where('id_biaya_kirim', $id);
    $this->db->update('tbl_biaya_kirim', $data);
  }

  public function hapusData($id)
  {
    $this->db->delete('tbl_biaya_kirim', ['id_biaya_kirim' => $id]);
  }
}
