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
              <div class="row">
                <div class="col-9">
                  <!-- Kiri -->
                </div>
                <table class="table table-bordered">
                  <thead class="table-primary">
                    <tr>
                      <th>No</th>
                      <th>Tanggal Beli</th>
                      <th>Nama Konsumen</th>
                      <th>Alamat</th>
                      <th>Biaya Pengiriman</th>
                      <th style="text-align: center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penjualan as $p) : ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $p['tanggal_beli']; ?></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['alamat']; ?></td>
                        <td>Rp. <?= number_format($p['biaya_kirim'], 0, ",", "."); ?></td>
                        <?php if ($p['status_order'] == "P") : ?>
                          <td style="background-color: red; color: white; text-align: center"><?= $p['status_order']; ?></td>
                        <?php else : ?>
                          <td style="background-color: green; color: white; text-align: center"><?= $p['status_order']; ?></td>
                        <?php endif; ?>
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