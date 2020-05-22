<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $judul; ?></h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?></h3>

            </div>
            <div class="card-body">
              <!-- Open Multipart untuk upload gambar/file -->
              <?= form_open_multipart('produk/tambah'); ?>
              <!-- Kategori -->
              <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-8">
                  <select class="form-control" name="kategori">
                    <option>-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k) : ?>
                      <option value="<?= $k['id_kategori_produk']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <!-- Merek -->
              <div class="form-group row">
                <label for="merek" class="col-sm-2 col-form-label">Merek</label>
                <div class="col-sm-8">
                  <select class="form-control" name="merek">
                    <option>-- Pilih Merek --</option>
                    <?php foreach ($merek as $m) : ?>
                      <option value="<?= $m['id_merek']; ?>"><?= $m['nama_merek']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <!-- Nama Produk -->
              <div class="form-group row">
                <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                  <?= form_error('nama_produk', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Gambar Produk -->
              <div class="form-group row">
                <label for="gambar_produk" class="col-sm-2 col-form-label">Gambar Produk</label>
                <div class="col-sm-8">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar_produk">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
              <!-- Deskripsi Produk -->
              <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Produk</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                  <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Harga -->
              <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="harga" name="harga">
                  <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <!-- Slide -->
              <div class="form-group row">
                <label for="slide" class="col-sm-2 col-form-label">Slide</label>
                <div class="col-sm-8">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="slide" value="Y">
                    <label class="form-check-label">Ya</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="slide" value="N">
                    <label class="form-check-label">Tidak</label>
                  </div>
                </div>
              </div>
              <!-- Rekomendasi Produk -->
              <div class="form-group row">
                <label for="rekomendasi" class="col-sm-2 col-form-label">Produk Rekomendasi</label>
                <div class="col-sm-8">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="rekomendasi" value="Y">
                    <label class="form-check-label">Ya</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="rekomendasi" value="N">
                    <label class="form-check-label">Tidak</label>
                  </div>
                </div>
              </div>




              <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->