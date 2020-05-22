<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
  </div>
  <strong>Copyright &copy; 2020 <a href="http://osnofla.tech">Osnofla.tech</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('asset/BE'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('asset/BE'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('asset/BE'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/BE'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/BE'); ?>/dist/js/demo.js"></script>

<!-- Script Untuk ambil nama file/gambar yang diupload -->
<script>
  $('.custom-file-input').on('change', function() {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
  });
</script>
</body>

</html>