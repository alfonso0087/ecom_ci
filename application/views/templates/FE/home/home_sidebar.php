<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
          <h2>Kategori</h2>
          <div class="panel-group category-products" id="accordian">
            <!--Kategori-products-->
            <?php foreach ($kategori as $kat) : ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><a href="<?= base_url('home/produkbyKategori/') . $kat['id_kategori_produk'] ?>"><?= $kat['nama_kategori']; ?></a></h4>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <!--/Kategori-products-->

          <div class="brands_products">
            <h2>Merek</h2>
            <!--Merek_products-->
            <div class="brands-name">
              <ul class="nav nav-pills nav-stacked">
                <?php foreach ($merek as $m) : ?>
                  <li><a href="<?= base_url('home/produkbyMerek/') . $m['id_merek'] ?>"><?= $m['nama_merek']; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <!--/Merek_products-->
        </div>
      </div>