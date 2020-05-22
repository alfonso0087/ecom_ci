<?php

class Cart_M extends CI_model
{

  public function getAllOrder()
  {
    $query = "SELECT * 
              FROM `tbl_produk`,`tbl_order`
              WHERE `tbl_order`.`id_produk`=`tbl_produk`.`id_produk`
    ";
    return $this->db->query($query)->result_array();
  }
  public function cekOrder()
  {
    $sid = session_id();
    $idProduk = $this->input->get('id_produk');

    $query = "SELECT `id_produk` FROM `tbl_order`
              WHERE `id_produk` = $idProduk
              AND `id_session`='$sid'
            ";
    return $this->db->query($query)->num_rows();
  }

  public function inputData()
  {
    // Jika belum ada barang di tabel order, maka masukkan barang yang dipilih ke tabel order
    $sid = session_id();
    $idProduk = $this->input->get('id_produk');
    $tanggal = date("d-m-Y");
    $harga = $this->input->get('harga');

    $data = [
      'status_order' => 'P',
      'id_produk' => $idProduk,
      'jumlah' => 1,
      'harga' => $harga,
      'id_session' => $sid
    ];

    $this->db->insert('tbl_order', $data);
  }

  //! Belum bisa update jumlah di tbl_order  
  public function updateData()
  {
    $sid = session_id();
    $idProduk = $this->input->get('id_produk');

    $query = "UPDATE `tbl_order`
    SET `jumlah`=`jumlah`+1
    WHERE `id_produk`=$idProduk
    AND `id_session`='$sid'
    ";
    $this->db->query($query);
  }

  public function Sub_Total()
  {
    $this->db->select_sum('harga');
    $query = $this->db->get('tbl_order');
    if ($query->num_rows() > 0) {
      return $query->row()->harga;
    } else {
      return 0;
    }
  }

  public function hapusData($id)
  {
    $this->db->delete('tbl_order', ['id_produk' => $id]);
  }

  public function cekKeranjang()
  {
    $sid = session_id();
    $query = " SELECT * FROM `tbl_order`
               WHERE `id_session`='$sid'
    ";
    return $this->db->query($query)->result_array();
  }

  public function isiKeranjang()
  {
    $isiKeranjang = array();
    $r = $this->cekKeranjang();
    while ($r) {
      $isiKeranjang[] = $r;
    }
    return $isiKeranjang;
  }

  public function kosong()
  {
    return $this->db->truncate('tbl_order');
  }

  public function terimakasih()
  {
    $tgl = date('d-m-Y');
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');
    $telpon = $this->input->post('telpon');
    $biaya = $this->input->post('biaya');

    $data = [
      'nama' => $nama,
      'alamat' => $alamat,
      'email' => $email,
      'no_telp' => $telpon,
      'tanggal_beli' => $tgl,
      'status_order' => 'P',
      'biaya_kirim' => $biaya
    ];
    $this->db->insert('tbl_pembelian', $data);

    $id_orders = $this->db->insert_id();
    $isiKeranjang = $this->isiKeranjang();
    var_dump($isiKeranjang);
    die;
    $jml = count($isiKeranjang);

    for ($i = 0; $i < $jml; $i++) {
      $data2 = [
        'id_order' => $id_orders,
        'id_produk' => $isiKeranjang[$i]['id_produk'],
        'jumlah' => $isiKeranjang[$i]['jumlah'],
        'harga' => $isiKeranjang[$i]['harga']
      ];
      $this->db->insert('tbl_detail_order', $data2);
    }

    // redirect('cart/terimakasih', $id_orders);

    for ($i = 0; $i < $jml; $i++) {
      $this->db->where('id_order', $isiKeranjang[$i]['id_order']);
      $this->db->delete('tbl_order');
    }
  }
}
