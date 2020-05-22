<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url('auth/registrasi'); ?>"><b>Admin</b> Ecommerce</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Registrasi Akun</p>

        <form action="<?= base_url('auth/registrasi'); ?>" method="post">
          <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <!-- Kiri -->
            </div>
            <!-- /.col -->
            <div class="col-4">
              <!-- Tengah -->
              <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
            <div class="col-4">
              <!-- Kanan -->
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>

        </div>
        <!-- /.social-auth-links -->
        <p class="mb-3" style="text-align: center">
          <a href="<?= base_url('auth'); ?>" class="text-center">Sudah Punya Akun?</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->