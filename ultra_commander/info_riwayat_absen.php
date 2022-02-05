<?php 
include '../admin/sanitazer.php';
date_default_timezone_set('Asia/Jakarta');

include '../admin/admin.php';
include '../098/koneksi_databases.php';


$query = mysqli_query($con, "SELECT * FROM absensi_backup");
$get_all = get_all_data($query);

if (isset($_POST['search'])) {
  $keyword = htmlspecialchars($_POST['keyword']);
  $get_all = search_info_riwayat_absen($keyword);
}

?>
 
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; // data from ../asdf/login.php ?></title>

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
        <span class="brand-text font-weight-light"><?= $navbar_title; // data from ../asdf/login.php ?></span>
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
            <a href="info_riwayat_absen" class="nav-link">Riwayat Absen</a>
          </li>
          <li class="nav-item">
            <a href="user" class="nav-link">User</a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-users"></i> Hai! admin <strong><?= $_SESSION['login']['nama']; ?></strong>
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
            <h1 class="m-0">Riwayat Absen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Riwayat Absen</li>
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
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="float-right">
                  <form action="" method="post">
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="keyword" class="form-control float-right" placeholder="Search" autocomplete="off">

                        <div class="input-group-append">
                          <button type="submit" name="search" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <a class="btn btn-sm btn-danger" href="../admin/hapus_semua?action=hapus_semua_nya" onclick="return confirm('Yakin mau hapus semua data absen pak ? ')">Hapus Semua ?</a>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead> 
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Absen Masuk</th>
                      <th>Absen Keluar</th>
                      <th>Izin</th>
                      <th>Alasan Izin</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($get_all as $row): ?>
                      <tr>
                        <td><?= $i; ?></td> 


                        <?php if ($row['waktu'] == null) { ?>
                          <td>-</td>
                        <?php } else { ?>
                          <td>
                            <?= $row['nama']; ?>
                              <br><span class="badge bg-warning">
                                <?= date('d F Y', $row['waktu']); ?>
                              </span></br>                         
                            </td>
                        <?php } ?>



                        <?php if ($row['absen_masuk'] == null) { ?>
                          <td>-</td>
                        <?php } else { ?>
                          <td><?= date('H:i', $row['absen_masuk']); ?></td>
                        <?php } ?>



                        <?php if ($row['absen_keluar'] == null) { ?>
                          <td>-</td>
                        <?php } else { ?>
                          <td><?= date('H:i', $row['absen_keluar']); ?></td>
                        <?php } ?>



                        <?php if ($row['izin'] == null) { ?>
                          <td>-</td>
                        <?php } else { ?>
                          <td><?= date('H:i', $row['izin']); ?></td>
                        <?php } ?>


                        <?php if ($row['alasan_izin'] == null) { ?>
                          <td>-</td>
                        <?php } else { ?>
                          <td><?= substr($row['alasan_izin'], 0,40); ?> .... </td>
                        <?php } ?>

                        <td>
                          <a href="../admin/info?id=<?= $row['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                          <a href="../admin/hapus?id=<?= $row['id']; ?>&action=hapus_absen_backup" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Mau Hapus pak ?')"><i class="fas fa-trash-alt"></i></a>
                        </td>

                      </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
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
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="#"><?= $navbar_title; // data from ../asdf/login.php ?></a>.</strong> All rights reserved.
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
</script>
</body>
</html>


