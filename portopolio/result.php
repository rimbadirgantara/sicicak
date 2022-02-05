<?php 
include '../098/koneksi_databases.php';
include 'generate.php';
$title = 'Pentolan Polbeng 2021';

$token = mysqli_real_escape_string($con, $_GET['token']);

$query = mysqli_query($con, "SELECT * FROM porto WHERE token = '$token'");
$get_datas = query($query);
 
$query_ = mysqli_query($con, "SELECT * FROM porto WHERE token = '$token'");
$get_data = mysqli_fetch_assoc($query_); 

$navbar_title = $get_data['nama'];
$nama = $navbar_title;

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Boostrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- My css -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <title><?= $title; ?></title>
  </head>
  <body id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><?= $navbar_title; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#pictures">Pictures</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron text-center">
      <img src="img/guest/<?= $get_data['your_pict']; ?>" alt="Rimba Dirgantara" width="200" class="rounded-circle img-thumbnail" />
      <h1 class="display-4"><?= $get_data['nama']; ?></h1>
      <p class="lead"><?= $get_data['hoby']; ?></p>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,288L34.3,261.3C68.6,235,137,181,206,176C274.3,171,343,213,411,208C480,203,549,149,617,144C685.7,139,754,181,823,213.3C891.4,245,960,267,1029,261.3C1097.1,256,1166,224,1234,218.7C1302.9,213,1371,235,1406,245.3L1440,256L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- about -->
    <section id="about">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>About Me</h2>
                </div>
            </div>
            <div class="row justify-content-center fs-5 text-center">
                <div class="col-md-4">
                    <p><?= $get_data['about']; ?></p>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,288L48,256C96,224,192,160,288,117.3C384,75,480,53,576,85.3C672,117,768,203,864,213.3C960,224,1056,160,1152,160C1248,160,1344,224,1392,256L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    <!-- akhir about -->

    <!-- Project -->
    <section id="pictures" style="background-color: #e2edff;">
        <div class="container">
            <div class="row text-center">
                <div class="col mb-3">
                    <h2>My Pictures</h2>
                </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <a href="img/guest/<?= $get_data['pict_1']; ?>">
                    <img src="img/guest/<?= $get_data['pict_1']; ?>" class="card-img-top" alt="<?= $get_data['pict_1']; ?>">
                  </a>
             <!-- <div class="card-body">
                    <p class="card-text text-center"><b></b></p>
                  </div> -->
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <div class="card">
                  <a href="img/guest/<?= $get_data['pict_2']; ?>">
                    <img src="img/guest/<?= $get_data['pict_2']; ?>" class="card-img-top" alt="<?= $get_data['pict_2']; ?>">
                  </a>
             <!-- <div class="card-body">
                    <p class="card-text text-center"><b></b></p>
                  </div> -->
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <div class="card">
                  <a href="img/guest/<?= $get_data['pict_3']; ?>">
                    <img src="img/guest/<?= $get_data['pict_3']; ?>" class="card-img-top" alt="<?= $get_data['pict_3']; ?>">
                  </a>
             <!-- <div class="card-body">
                    <p class="card-text text-center"><b></b></p>
                  </div> -->
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <div class="card">
                  <a href="img/guest/<?= $get_data['pict_4']; ?>">
                    <img src="img/guest/<?= $get_data['pict_4']; ?>" class="card-img-top" alt="<?= $get_data['pict_4']; ?>">
                  </a>
             <!-- <div class="card-body">
                    <p class="card-text text-center"><b></b></p>
                  </div> -->
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <div class="card">
                  <a href="img/guest/<?= $get_data['pict_5']; ?>">
                    <img src="img/guest/<?= $get_data['pict_5']; ?>" class="card-img-top" alt="<?= $get_data['pict_5']; ?>">
                  </a>
             <!-- <div class="card-body">
                    <p class="card-text text-center"><b></b></p>
                  </div> -->
                </div>
              </div>
            </div>
        </div>
    </section>
    <!-- Akhir Project -->

    <!-- contact -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,32L21.8,37.3C43.6,43,87,53,131,64C174.5,75,218,85,262,90.7C305.5,96,349,96,393,90.7C436.4,85,480,75,524,74.7C567.3,75,611,85,655,112C698.2,139,742,181,785,176C829.1,171,873,117,916,90.7C960,64,1004,64,1047,74.7C1090.9,85,1135,107,1178,138.7C1221.8,171,1265,213,1309,213.3C1352.7,213,1396,171,1418,149.3L1440,128L1440,0L1418.2,0C1396.4,0,1353,0,1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,175,0,131,0C87.3,0,44,0,22,0L0,0Z"></path></svg>
        <section class="container" id="contact">
            <div class="row text-center">
                <div class="col">
                    <h2>Contact Me</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                      <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" disabled="">
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" disabled="">
                      </div>
                      <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="3" disabled=""></textarea>
                      </div>
                      <button class="btn btn-primary" disabled="">Submit</button>
                    </form>
                </div>
            </div>
        </section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,0L80,26.7C160,53,320,107,480,117.3C640,128,800,96,960,74.7C1120,53,1280,43,1360,37.3L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
    </section>
    <!-- akhircontact -->

    <!-- footer -->
    <footer class="bg-primary text-white  pb-5">
        <p class="text-center">Created with  <i class="bi bi-heart-fill text-danger"></i><br> Developer By Pentolan KSI <a href="https://github.com/rimbadirgantara" class="text-white fw-bold">Rimba Dirgantara</a></br></p>
    </footer>
    <!-- akhir footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>