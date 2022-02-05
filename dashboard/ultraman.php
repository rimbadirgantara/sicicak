<?php 
include '../asdf/sanitazer.php';
require '../098/koneksi_databases.php';


if ($_GET['email'] == '') {
	echo "<script>
                alert('Gagal absen');
                window.location='index';
            </script>";
    exit;
} else {

	if ($_GET['status'] == 'absen_masuk') {
		// cek data
		$data_email = $_SESSION['login']['email'];
		$result_1 = mysqli_query($con, "SELECT * FROM user WHERE email = '$data_email'");
		$row = mysqli_fetch_assoc($result_1);
		
		// input ke field absensi
		$waktu = time();
		$nama = $row['nama'];

		// input ke tabel absensi
		mysqli_query($con, "INSERT INTO absensi VALUES('', '$nama', '$waktu', '', '', '', '$waktu')");
		// input ke tabel absensi_backuo
		mysqli_query($con, "INSERT INTO absensi_backup VALUES('', '$nama', '$waktu', '', '', '', '$waktu')");

		header('Location: index');
		
	} elseif ($_GET['status'] == 'absen_keluar') {
		// cek data
		$data_email = $_SESSION['login']['email'];
		$result_1 = mysqli_query($con, "SELECT * FROM user WHERE email = '$data_email'");
		$row = mysqli_fetch_assoc($result_1);

		$waktu = time();
		$nama = $row['nama'];

		// update ke tabel absensi
		mysqli_query($con, "UPDATE absensi SET absen_keluar = '$waktu' WHERE nama = '$nama'");
		// update ke tabel absensi_backup
		mysqli_query($con, "UPDATE absensi_backup SET absen_keluar = '$waktu' WHERE nama = '$nama'");

		header('Location: index');
	} 
} 

 ?>
