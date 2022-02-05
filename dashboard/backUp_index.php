<?php 
include '../asdf/sanitazer.php';
include '../asdf/index.php'; 
include '../098/koneksi_databases.php';
include '../asdf/riwayat_absen.php';

// data waktu asbsen masuk dan keluar

$nama = $_SESSION['login']['nama'];
$result = mysqli_query($con, "SELECT * FROM absensi WHERE nama = '$nama'");
$row = mysqli_fetch_assoc($result);


// data untuk riwayat absensi jangka panjang
$query_read = mysqli_query($con, "SELECT * FROM absensi WHERE nama = '$nama'");
$get_all = get_all($query_read);

// hapus absen karna sudah lewat 24 jam
if ($row === null) {
  
} else {
  if (date('d', $row['waktu']) < date('d', time())) {
    mysqli_query($con, "DELETE FROM absensi WHERE nama = '$nama'");
  }
}


if (isset($_POST['tombol_izin'])) {

  $nama = htmlspecialchars($_SESSION['login']['nama']);
  $waktu_izin = time();
  $alasan_izin = htmlspecialchars($_POST['alasan_izin']);

  // input ke tabel absensi
  mysqli_query($con, "INSERT INTO absensi VALUES('', '$nama', '', '', '$waktu_izin', '$alasan_izin', '$waktu_izin')");
  // input ke tabel absensi_backup
  mysqli_query($con, "INSERT INTO absensi_backup VALUES('', '$nama', '', '', '$waktu_izin', '$alasan_izin', '$waktu_izin')");
  echo "<script>
                alert('Berhasil Izin');
                window.location='index';
            </script>";
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
            <a href="index" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="riwayat_absen" class="nav-link">Riwayat Absen</a>
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
            <h1 class="m-0">Absensi, <small><?= date('d F Y') ?></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Absensi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <p class="msg" style="color: red; font-style: bold;">Jika sudah tekan absen nya, jangan di tekan lagi ya ....</p>
        <div class="row">

          <div class="col-lg-3">
            <a onclick="return confirm('Lakukan Absensi Masuk?')" style="color: #000" href='ultraman.php?email=<?= $_SESSION["login"]["email"]; ?>&status=absen_masuk'>
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-running"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Absensi Masuk</span>
                <?php if (mysqli_affected_rows($con) > 0) { ?>
                  <?php if ( date('d', $row['waktu'] == date('d', time())) ) { ?>
                    <?php if ($row['absen_masuk']  === ''){ ?>
                      <span class="info-box-number">-</span>
                    <?php } else { ?>
                      <span class="info-box-number"><?= date('H:i', $row['absen_masuk']); ?></span>
                    <?php } ?>
                  <?php } else { ?>
                    <span class="info-box-number">-</span>
                  <?php } ?>
                <?php } else { ?>
                  <span class="info-box-number">-</span>
                <?php } ?>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a onclick="return confirm('Lakukan Absensi Pulang?')" style="color: #000" href="ultraman.php?email=<?= $_SESSION["login"]["email"]; ?>&status=absen_keluar">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-sign-out-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Absensi Keluar</span>
                <?php if (mysqli_affected_rows($con) > 0) { ?>
                  <?php if ( date('d', $row['waktu'] == date('d', time())) ) { ?>
                    <?php if ( $row['absen_keluar'] == null) { ?>
                      <span class="info-box-number">-</span>
                    <?php } else { ?>
                      <span class="info-box-number"><?= date('H:i',$row['absen_keluar']); ?></span>
                    <?php } ?>
                  <?php } else { ?>
                    <span class="info-box-number">-</span>
                  <?php } ?>
                <?php } else { ?>
                  <span class="info-box-number">-</span>
                <?php } ?>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-3">
            <a href="#">
              <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Waktu Server</span>
                  <span class="info-box-number" id="timestamp"></span>
                </div>
              </div>
            <a>
          </div>

          <!-- /.col-md-6 -->
          <!-- /.col-md-6 -->
          <div class="row">
            <div class="col-lg-12 ml-2">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Catatan Izin</h5>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    <table class="table" style="font-size: 14px">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>:</th>
                          <th name="nama"><?= $_SESSION['login']['nama']; ?></th>
                        </tr>
                        <tr>
                          <th>Waktu Izin</th>
                          <th>:</th>
                          <th>Waktu Server</th>
                        </tr>
                        <tr>
                          <th>Alasan Izin</th>
                          <th></th>
                          <th></th>
                        </tr>
                        <tr>
                          <th>
                            <div class="form-floating">
                              <textarea class="form-control" style="font-size: 14px" rows="6" name="alasan_izin" required=""></textarea>
                            </div>
                          </th>
                          <th></th>
                        </tr>
                      </thead>
                    </table>
                    <button type="submit" name="tombol_izin" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
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
$(function(){
  setInterval(timestamp, 1000);
});
function timestamp() {
    $.ajax({
      url: '../asdf/index.php',
      success: function(data) {
        $('#timestamp').html(data);
    },
  });
}
</script>
</body>
</html>