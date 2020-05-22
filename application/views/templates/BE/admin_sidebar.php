    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="<?= base_url('asset/BE'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin E-Commerce</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('asset/BE'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $user['nama']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item mt-2">
              <a href="<?= base_url('admin'); ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="<?= base_url('kategori'); ?>" class="nav-link">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                  Kategori
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="<?= base_url('merek'); ?>" class="nav-link">
                <i class="nav-icon fas fa-eye"></i>
                <p>
                  Merek
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="<?= base_url('produk'); ?>" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Produk
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="<?= base_url('biaya_kirim'); ?>" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>
                  Biaya Kirim
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="<?= base_url('penjualan'); ?>" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                  Penjualan
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="../widgets.html" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Member
                </p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a href="<?= base_url('auth/logout'); ?>" class="nav-link" onclick="return confirm('Anda yakin ingin keluar?')">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>