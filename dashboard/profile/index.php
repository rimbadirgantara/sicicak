<?php 
include '../../asdf/sanitazer.php';

include '../../asdf/profile.php';
include '../../098/koneksi_databases.php';
$nama = $_SESSION['login']['nama'];
$result = mysqli_query($con, "SELECT * FROM user WHERE nama = '$nama'");
$row = mysqli_fetch_assoc($result);


if ( isset( $_POST['edit_profile'] ) ) {

  $nama_user = stripcslashes($_POST['nama']);
  $password = mysqli_real_escape_string( $con, $_POST['password'] );

  if ($nama_user === '') {

    $error = true;

  } else {

    if ($password === '') {

      mysqli_query($con, "UPDATE user SET nama = '$nama_user' WHERE nama = '$nama'");

      // set ulang session
      $_SESSION['login'] = [
          'email' => $row['email'],
          'nama' => $nama_user,
          'level' => $row['level']
        ];

        // update data di absnsi
        mysqli_query($con, "UPDATE absensi SET nama = '$nama_user' WHERE nama = '$nama'");
        // udpate data di absensi_backup
        mysqli_query($con, "UPDATE absensi_backup SET nama = '$nama_user' WHERE nama = '$nama'");

      echo "<script>
          alert('Berhasil Update Nama');
          window.location='index';
        </script>"; 
        exit;

    } else {

      $password = password_hash($password, PASSWORD_DEFAULT);
      mysqli_query($con, "UPDATE user SET nama = '$nama', password = '$password' WHERE nama = '$nama'");
      echo "<script>
          alert('Berhasil Update Password');
          window.location='index';
        </script>"; 
      exit;

    }

  }
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
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="../../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $navbar_title; // data from index.php ?></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../../dashboard/index" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="../../dashboard/riwayat_absen" class="nav-link">Riwayat Absen</a>
          </li>
          <li class="nav-item">
            <a href="../../portopolio" class="nav-link">Generate Portofolio</a>
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
              <a href="#" class="dropdown-item">
                Profil
              </a>
              <a href="../../asdf/logout" class="dropdown-item">
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
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
          <div class="col-lg-5">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Profile</h5>
              </div>
              <div class="card-body">
                <form action="" method="post">
                  <table class="table" style="font-size: 14px" width="100%">
                    <?php if (isset($error)) : ?>
                      <p class="login-box-msg" style="color: red; font-style: italic;">Nama harus di isi!</p>
                    <?php endif; ?>
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <th><input type="text" class="form-control form-control-sm" name="nama" value="<?= $row['nama']; ?>" autocomplate="off"></th>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <th>:</th>
                        <th><input type="text" class="form-control form-control-sm" disabled="" value="<?= $row['email']; ?>"></th>
                      </tr>
                      <tr>
                        <th>Reset Password</th>
                        <th>:</th>
                        <th><input type="password" class="form-control form-control-sm" name="password"></th>
                      </tr>
                    </thead>
                  </table>
                  <button type="submit" name="edit_profile" class="btn btn-primary mt-1">Simpan</button>
                </form>
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
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>
</script>
</body>
</html>
