<?php 

include '../098/koneksi_databases.php';

$title = 'ABLEN | SISTEM MONITORING ABSEN ONLINE';
$navbar_title = 'SICICAK';

function get_all_data($query){
	$rows = [];
	while($data = mysqli_fetch_assoc($query)){
		$rows[] = $data;
	}
	return $rows;
}

function search($keyword){
	global $con;
	$query = mysqli_query($con, "SELECT * FROM absensi
				WHERE
			nama LIKE '%$keyword%'
		");
	return get_all_data($query);
}

function search_info_riwayat_absen($keyword){
	global $con;
	$query = mysqli_query($con, "SELECT * FROM absensi_backup
				WHERE
			nama LIKE '%$keyword%'

		");
	return get_all_data($query);
}

 ?>