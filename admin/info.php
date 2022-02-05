<?php 


include '../asdf/riwayat_absen.php';
include '../098/koneksi_databases.php';
date_default_timezone_set('Asia/Jakarta');


$id = mysqli_real_escape_string($con, $_GET['id']);

if ($id === null) {
  header('Location: ../index');
  exit;
} else {
  $get_data_by_id = mysqli_query($con, "SELECT * FROM absensi_backup WHERE id = '$id'");
  $get_info = mysqli_fetch_assoc($get_data_by_id);
}
 ?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; // data from index.php ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $navbar_title; // data from index.php ?></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../ultra_commander/index" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="../ultra_commander/info_riwayat_absen" class="nav-link">Riwayat Absen</a>
          </li>
          <li class="nav-item">
            <a href="../ultra_commander/user" class="nav-link">User</a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-users"></i> <?= $_SESSION['login']['nama']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="profile" class="dropdown-item">
                Profil
              </a>
              <a href="../asdf/logout" class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Info Absensi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">

          <!-- /.col-md-6 -->
          <div class="row"> 
          <div class="col-lg-12">
          
            <div class="card">
            <div class="card-header"><h5 class="card-title">Data <?= $get_info['nama']; ?></h5></div>
              <div class="card-body">
                <table class="table" style="font-size: 14px" width="100%">
                  
                  <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <th><?= $get_info['nama']; ?></th>
                  </tr>

                  <tr>
                    <th>Absen Masuk</th>
                    <th>:</th>
                    <?php if ($get_info['absen_masuk'] === ''){ ?>
                      <th>-</th>
                    <?php } else { ?>
                      <th><?= date('d F Y, H:i', $get_info['absen_masuk']); ?></th>
                    <?php } ?>
                  </tr>

                  <tr>
                    <th>Absen Keluar</th>
                    <th>:</th>
                    <?php if ($get_info['absen_keluar'] === ''){ ?>
                      <th>-</th>
                    <?php } else { ?>
                     <th><?= date('d F Y, H:i', $get_info['absen_keluar']); ?></th>
                     <?php } ?>
                  </tr>
                       
                  <tr>
                    <th>Waktu Izin</th>
                    <th>:</th>
                    <?php if ($get_info['izin'] === '') { ?>
                      <th>-</th>
                     <?php } else { ?>
                      <th><?= date('d F Y, H:i', $get_info['izin']); ?></th>
                    <?php } ?>
                  </tr>

                  <tr>
                    <td>Alasan Izin</td>
                    <td></td>
                    <td></td>
                  </tr>
                  
                  <tr>
                    <td colspan="3">
                      <textarea style="font-size: 14px" rows="10" class="form-control" disabled=""><?= $get_info['alasan_izin']; ?></textarea>
                    </td>
                  </tr>
                </table>
                                                
              </div>
            </div>


          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="#"><?= $navbar_title; // data from ../asdf/index.php ?></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<script>
</body>
</html>