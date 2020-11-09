<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> Beta
    </div>
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">AdminAja</a>.</strong> All rights
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
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>

<?php if ( $data["page"] == "dashboard" ) : ?>
<!-- jQuery UI 1.11.4 -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<?php endif; ?>

<!-- Bootstrap 4 -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php if ( $data["page"] == "dashboard" ) : ?>
<!-- ChartJS -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/moment/moment.min.js"></script>
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<?php endif; ?>

<?php if ( $data["page"] == "table" ) : ?>
<!-- DataTables -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<?php endif; ?>

<!-- AdminLTE App -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

<?php if ( $data["page"] == "dashboard" ) : ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/dist/js/pages/dashboard.js"></script>
<?php endif; ?>

<!-- AdminLTE for demo purposes -->
<script src="<?= BASEURL ?>/AdminLTE-3.0.5/dist/js/demo.js"></script>

<?php if ( $data["page"] == "table" ) : ?>
<script>
  $(function () {
    $("#table").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
<?php endif; ?>

<!-- Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  <?php Flasher::flash(); ?>
</script>
</body>
</html>