<?php 
error_reporting(0); //sembunyikan error

session_start();
if ($_SESSION['login']['level'] === 'user') {
  header('Location: dashboard');
} elseif ($_SESSION['login']['level'] === 'admin') {
  header('Location: ultra_commander');
}


require 'asdf/login.php';
require '098/koneksi_databases.php'; 

if (isset($_POST['login'])) {
  $email = strtolower(stripcslashes($_POST['email']));
  $password = mysqli_real_escape_string($con, $_POST['password']);  

  if (strlen($password) < 8){
    $error_password = true;
  } else {
    $result = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
    // cek email
    if (mysqli_num_rows($result) === 1) {
      // cek level dan password
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row['password'])) {
        if ($row['level'] === 'user') {
          // set session
          $_SESSION['login'] = [
            'email' => $row['email'],
            'nama' => $row['nama'],
            'level' => $row['level']
          ];

          echo "<script>
            window.location='dashboard/index';
          </script>";     
        } elseif ($row['level'] === 'admin') {

          $_SESSION['login'] = [
            'email' => $row['email'],
            'nama' => $row['nama'],
            'level' => $row['level']
          ];

          echo "<script>
            window.location='ultra_commander';
          </script>"; 
          exit;
        }
      }
    }
    $error = true;    
  }


}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; // data from /asdf/login.php ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><?= $navbar_title; // data from /asdf/login.php ?></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Isi :)</p>
      <?php if (isset($error)) : ?>
        <p class="login-box-msg" style="color: red; font-style: italic;">Username / Password Salah</p>
      <?php endif; ?>
      
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" autofocus="" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <?php if (isset($error_password)): ?>
            <p class="login-box-msg" style="color: red; font-style: italic;">Minimal 8 Karakter</p>
          <?php endif; ?>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" name="login" class="btn btn-primary btn-block">Enter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <center>
          <a href="lupa-passowrd" style="font-size: 14px">Lupa Password?</a> / 
          <a href="registrasi" style="font-size: 14px">Registrasi?</a>
        </center>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
