<?php 

include '../098/koneksi_databases.php';

$pelatuk = mysqli_real_escape_string($con, $_GET['action']);
if ($pelatuk === 'hapus_semua_nya') {
	mysqli_query($con, "DELETE FROM absensi_backup");
	header("Location: ../ultra_commander/info_riwayat_absen");
} elseif ($pelatuk === 'hapus_semua_absen'){
	mysqli_query($con, "DELETE FROM absensi");
	header("Location: ../ultra_commander");
}

 ?>