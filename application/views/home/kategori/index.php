<div class="col-sm-9 padding-right">
  <div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Produk <?= $JudulKategori['nama_kategori']; ?></h2>
    <?php foreach ($KategoriProduk as $KP) : ?>
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="<?= base_url('asset/BE/dist/img/gambar_produk/') . $KP['gambar']; ?>" />
              <h2>Rp. <?= number_format($KP['harga'], 0, ",", "."); ?></h2>
              <p><?= $KP['deskripsi']; ?></p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <div class="product-overlay">
              <div class="overlay-content">
                <h2>Rp. <?= number_format($KP['harga'], 0, ",", "."); ?></h2>
                <p><?= $KP['nama_produk']; ?></p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
  <!--features_items-->

  <div class="recommended_items pt-3">
    <!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active">
          <?php foreach ($rekomendasi as $rekom) : ?>
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="<?= base_url('asset/BE/dist/img/gambar_produk/') . $rekom['gambar']; ?>" />
                    <h2>Rp. <?= number_format($rekom['harga'], 0, ",", "."); ?></h2>
                    <p><?= $rekom['nama_produk']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="item">
          <?php foreach ($rekomendasi2 as $rekom2) : ?>
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="<?= base_url('asset/BE/dist/img/gambar_produk/') . $rekom2['gambar']; ?>" />
                    <h2>Rp. <?= number_format($rekom2['harga'], 0, ",", "."); ?></h2>
                    <p><?= $rekom2['nama_produk']; ?></p>
                  </div>

                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
      </a>
    </div>
  </div>
  <!--/recommended_items-->

</div>
</div>
</div>
</section>