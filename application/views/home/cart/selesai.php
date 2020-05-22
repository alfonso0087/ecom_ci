<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Check out</li>
      </ol>
    </div>
    <!--/breadcrums-->


    <div class="shopper-informations">
      <div class="row">
        <div class="col-sm-8">
          <div class="shopper-info">
            <p>Masukkan Data Konsumen</p>
            <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?= base_url('cart/validasi'); ?>">
              <?php foreach ($order as $o) : ?>
                <input type="hidden" name="id" value="<?= $o['id_order']; ?>">
              <?php endforeach; ?>
              <div class="form-group col-md-6">
                <input type="text" name="nama" class="form-control" placeholder="Nama (Wajib di isi)">
              </div>
              <div class="form-group col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Email (Wajib di isi)">
              </div>
              <div class="form-group col-md-6">
                <input type="text" name="telpon" class="form-control" placeholder="No Telpon (Wajib di isi)">
              </div>
              <div class="form-group col-md-6">
                <select class="form-control" name="biaya">
                  <?php foreach ($kota as $kt) : ?>
                    <option value="<?= $kt['biaya']; ?>"><?= $kt['kota']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-12">
                <textarea name="alamat" id="message" class="form-control" rows="4" placeholder="Alamat (Wajib di isi)"></textarea>
              </div>
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary pull-right">Selesai</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
    <div class="review-payment">
      <h2>Review & Payment</h2>
    </div>

    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image" style="width: 300px">Item</td>
            <td class="description">Deskripsi</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>

          </tr>
        </thead>
        <?php foreach ($order as $o) : ?>
          <tbody>
            <tr>
              <td class="cart_product">
                <a href=""><img src="<?= base_url('asset/BE/dist/img/gambar_produk/') . $o['gambar']; ?>" width="30%" height="30%"></a>
              </td>
              <td class="cart_description">
                <h4><a href=""><?= $o['deskripsi']; ?></a></h4>

              </td>
              <td class="cart_price">
                <p>Rp. <?= number_format($o['harga'], 0, ",", "."); ?></p>
              </td>
              <td class="cart_quantity" style="text-align: center">
                <?= $o['jumlah']; ?>
              </td>
              <td class="cart_total">
                <?php $total = $o['jumlah'] * $o['harga']; ?>
                <p class="cart_total_price">Rp. <?= number_format($total, 0, ",", "."); ?></p>
              </td>

            </tr>

          </tbody>
        <?php endforeach; ?>
      </table>
    </div>

  </div>
</section>
<!--/#cart_items-->