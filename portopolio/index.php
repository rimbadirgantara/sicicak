<?php
include '../asdf/sanitazer.php';
include '../098/koneksi_databases.php';
include 'generate.php';

$navbar_title = 'Sicicak | Portopolio';
$title = 'Pentolan Polbeng 2021';

$nama = $_SESSION['login']['nama'];
$query = mysqli_query($con, "SELECT * FROM porto WHERE nama = '$nama'");
$get_all = query($query);

// hapus data
$id = mysqli_real_escape_string($con, $_GET['id']);
$action = mysqli_real_escape_string($con, $_GET['action']);

if ($id === '') {
  
} else {
  if ($action === '') {
    # code...
  } else {
    if ($action === 'hapus_lio') {
      mysqli_query($con, "DELETE FROM porto WHERE id = '$id'");
    }
  }
}

// generate portfoliop
if (isset($_POST['generate_it'])) {
  
  if (generate($_POST) > 0) {
    echo "<script>
            alert('Success to generate');
            window.location='index';
          </script>";
    exit;
  } else {
    echo "<script>
            alert('failed to generate');
            window.location='index';
          </script>";
    exit;
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
            <a href="../dashboard/index" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="../dashboard/riwayat_absen" class="nav-link">Riwayat Absen</a>
          </li>
          <li class="nav-item">
            <a href="../portopolio" class="nav-link">Generate Portofolio</a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-users"></i> <strong><?= $_SESSION['login']['nama']; ?></strong>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="../dashboard/profile" class="dropdown-item">
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
            <h1 class="m-0">Generate Portofolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Generate Portofolio</li>
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
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Get data</h5>
              </div>
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">

                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" autocomplete="" value="<?= $_SESSION['login']['nama']; ?> " hidden>
                        <input type="text" class="form-control" id="name" name="name" autocomplete="" value="<?= $_SESSION['login']['nama']; ?> " disabled>
                      </div>                      
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="pict_1">Picture 1</label>
                        <input type="file" class="form-control" id="pict_1" name="pict_1" autocomplete="">
                      </div>                      
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="pict_2">Picture 2</label>
                        <input type="file" class="form-control" id="pict_2" name="pict_2" autocomplete="">
                      </div>                      
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="pict_3">Picture 3</label>
                        <input type="file" class="form-control" id="pict_3" name="pict_3" autocomplete="">
                      </div>                      
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="your_pict">Your Pict</label>
                        <input type="file" class="form-control" id="your_pict" name="your_pict" autocomplete="">
                      </div>                      
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="pict_4">Picture 4</label>
                        <input type="file" class="form-control" id="pict_4" name="pict_4" autocomplete="">
                      </div>                      
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="pict_5">Picture 5</label>
                        <input type="file" class="form-control" id="pict_5" name="pict_5" autocomplete="">
                      </div>                      
                    </div>

                  </div>

                  <div class="form-group">
                    <label for="hobbys">Your Hobbys</label>
                    <textarea type="text" class="form-control" id="hobbys" name="hobbys" placeholder="Ex : Programmer | studying | Content Creator" autocomplete=""></textarea>
                  </div>

                  <div class="form-group">
                    <label for="about_me">Describe About Yourself</label>
                    <textarea type="text" class="form-control" id="about_me" name="about_me" placeholder="Ex : Hi, my name is Rimba Dirgantara, commonly called cicak, I'm 18 years old, my hobby is programming" autocomplete=""></textarea>
                  </div>

                  <button type="submit" name="generate_it" class="btn btn-primary mb-1">Generate</button>

                  <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Nama Mahasiswa : <b><?= $_SESSION['login']['nama']; ?></b></h5>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Link</th>
                      <th>About</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($get_all as $row): ?>
                      <tr>
                        <td><?= $i; ?></td> 

                        <td>
                          <?= $row['nama']; ?>
                        </td>

                        <td>
                          <?php $token = $row['token']; ?>
                          <a href="/ablen/portopolio/result?token=<?= urlencode($token); ?>">LINK</a>
                        </td>

                        <td>
                          <?= substr($row['about'], 0, 30). '...'; ?>
                        </td>

                        <td>
                          <a href="index?id=<?= $row['id']; ?>&action=hapus_lio" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Mau Hapus pak ?')"><i class="fas fa-trash-alt"></i></a>
                        </td>

                      </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
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
