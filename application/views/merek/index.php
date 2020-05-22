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
              <?= $this->session->flashdata('pesan'); ?>
              <div class="row">
                <div class="col-9">
                  <!-- Kiri -->
                </div>
                <div class="col-3 mb-3">
                  <a href="<?= base_url('merek/tambah'); ?>"><button class="btn btn-primary"><i class='fas fa-plus'></i> Tambah Merek</button></a>
                  <a href="<?= base_url('merek/kosong'); ?>"" onclick=" return confirm('Anda yakin akan mengosongkan tabel ini?')"><button class="btn btn-primary"><i class='fas fa-trash'></i> Kosongkan Merek</button></a>
                </div>
                <table class="table table-bordered">
                  <thead class="table-primary">
                    <tr>
                      <th>No</th>
                      <th>Nama Merek</th>
                      <th colspan="2" style="text-align: center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($merek as $m) : ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $m['nama_merek']; ?></td>
                        <td style="text-align: center">
                          <a href="<?= base_url('merek/ubah/') . $m['id_merek']; ?>" class="btn btn-success"><i class='fas fa-pen'></i> Ubah</a>
                        </td>
                        <td style="text-align: center">
                          <a href="<?= base_url('merek/hapus/') . $m['id_merek']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class='fas fa-power-off'></i> Hapus</a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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