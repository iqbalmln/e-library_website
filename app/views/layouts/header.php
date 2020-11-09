<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin E-Library</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <?php if ( $data["page"] == "table" ) : ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <?php endif; ?>

  <?php if ( $data["page"] == "dashboard" ) : ?>
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <?php endif; ?>
  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/dist/css/adminlte.min.css">

  <?php if ( $data["page"] == "dashboard" ) : ?>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= BASEURL ?>/AdminLTE-3.0.5/plugins/summernote/summernote-bs4.css">
  <?php endif; ?>
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= BASEURL ?>/" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= BASEURL ?>/" class="brand-link">
      <img src="<?= BASEURL ?>/AdminLTE-3.0.5/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin E-Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="object-fit: cover;" class="img-circle elevation-2" 
            src="<?= BASEURL ?>/img/<?= $data["auth_user"]["foto"] == "avatar.png" ? "{$data["auth_user"]['foto']}" : "uploaded/{$data["auth_user"]['foto']}" ?>" 
            width="50" height="50">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $data["auth_user"]["username"] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <label for="" class="font-weight-normal bg-dark">Main Navigation</label>
          <li class="nav-item" id="dashboardLink">
            <a href="<?= BASEURL ?>/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview" id="manageDataLink">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Manage Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" id="bukuLink">
                <a href="<?= BASEURL ?>/buku" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Buku</p>
                </a>
              </li>
              <li class="nav-item" id="anggotaLink">
                <a href="<?= BASEURL ?>/anggota" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Anggota</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" id="sirkulasiLink">
            <a href="<?= BASEURL ?>/sirkulasi" class="nav-link">
              <i class="nav-icon fas fa-sync-alt"></i>
              <p>
                Sirkulasi
              </p>
            </a>
          </li>
          <label for="" class="font-weight-normal bg-dark">Setting</label>
          <?php if ( $_SESSION["idl"] == "superadmin" ) : ?>
          <li class="nav-item" id="userLink">
            <a href="<?= BASEURL ?>/user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengguna Sistem
              </p>
            </a>
          </li>
          <?php endif ?>
          <li class="nav-item">
            <a href="<?= BASEURL ?>/logout" class="nav-link">
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