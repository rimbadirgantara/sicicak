<?php 
require '../098/koneksi_databases.php';

$title = 'ABLEN | SISTEM MONITORING ABSEN ONLINE';
$navbar_title = 'SICICAK';

function get_all($result){
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}	

function get_info($query){
	return $get_data_by_id = mysqli_fetch_assoc($query);
}

 ?>
