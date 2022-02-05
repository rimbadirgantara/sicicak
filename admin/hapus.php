<?php 


include '../098/koneksi_databases.php';

$id = $_GET['id'];
$action = $_GET['action'];

if (!$id) {
	header('Location: ../ultra_commander/index');
	exit;
} else {

	if (!$action) {
		header('Location: ../ultra_commander/index');
		exit;
	} elseif ($action === 'hapus_absen') {
		mysqli_query($con, "DELETE FROM absensi WHERE id = '$id' ");
		echo "<script>
          			window.location='../ultra_commander/index';
        		</script>";
	} elseif ($action === 'hapus_absen_backup') {
		mysqli_query($con, "DELETE FROM absensi_backup WHERE id = '$id' ");
		echo "<script>;
          			window.location='../ultra_commander/info_riwayat_absen';
        		</script>";
	} elseif ($action === 'hapus_user') {
		mysqli_query($con, "DELETE FROM user WHERE id = '$id' ");
		echo "<script>
          			window.location='../ultra_commander/user';
        		</script>";
	} else {
		header('Location: ../ultra_commander/index');

	}
}

 ?>