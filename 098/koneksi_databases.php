<?php 
// koneksi ke databases mysqli
$con = mysqli_connect('localhost', 'root', '', 'sicicak_db');

if (mysqli_connect_error()){
	echo "<script>
          			alert('Koneksi ke database gagal kawan ');
        		</script>";
    exit;
}

 ?>