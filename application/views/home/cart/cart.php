<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Keranjang</li>
      </ol>
    </div>
    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image" style="width: 250px">Gambar</td>
            <td class="description">Deskripsi Produk</td>
            <td class="price">Harga</td>
            <td class="quantity">Jumlah</td>
            <td class="total">Total</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($keranjang as $kr) : ?>
            <tr>
              <td class="cart_product">
                <a href=""><img src="<?= base_url('asset/BE/dist/img/gambar_produk/') . $kr['gambar']; ?>" width="30%" height="30%"></a>
              </td>
              <td class="cart_description">
                <h4><a href=""><?= $kr['nama_produk']; ?></a></h4>
                <p><?= $kr['deskripsi']; ?></p>
              </td>
              <td class="cart_price">
                <p>Rp. <?= number_format($kr['harga'], 0, ",", "."); ?></p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_down" href=""> - </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="<?= $kr['jumlah']; ?>" autocomplete="off" size="2">
                  <a class="cart_quantity_up" href=""> + </a>
                </div>
              </td>
              <td class="cart_total">
                <?php $total = $kr['jumlah'] * $kr['harga']; ?>
                <p class="cart_total_price">Rp. <?= number_format($total, 0, ",", "."); ?></p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?= base_url('cart/hapus/') . $kr['id_produk']; ?>"><i class="fa fa-times"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>


        </tbody>
      </table>
    </div>
    <a href="<?= base_url('cart/selesai'); ?>" class="btn btn-default add-to-cart"></i>Selesai Belanja</a>
  </div>
</section>
<!--/#cart_items-->