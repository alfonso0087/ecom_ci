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

              <form action="<?= base_url('biaya_kirim/tambah'); ?>" method="POST">
                <div class="form-group row">
                  <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="kota" name="kota">
                    <?= form_error('kota', '<small class="text-danger">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="biaya" name="biaya">
                    <?= form_error('biaya', '<small class="text-danger">', '</small>'); ?>
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