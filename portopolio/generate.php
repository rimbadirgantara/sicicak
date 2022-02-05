<?php 
include '../098/koneksi_databases.php';

function query($query){
	$rows = [];
	while($data = mysqli_fetch_assoc($query)){
		$rows[] = $data;
	}
	return $rows;
}

function generate($data){
	global $con;
	
	$pict_1 = $_FILES['pict_1'];
	$pict_2 = $_FILES['pict_2'];
	$pict_3 = $_FILES['pict_3'];
	$pict_4 = $_FILES['pict_4'];
	$pict_5 = $_FILES['pict_5'];
	$your_pict = $_FILES['your_pict'];
	
	// cek apakah file nya ada atau tidak
	if ($pict_1['error'] === 4) {
		echo "<script>
             alert('Picture 1 is empety')
             window.location='index';;
           </script>";
        return false;
	} elseif ($pict_2 === 4) {
		echo "<script>
             alert('Picture 2 is empety')
             window.location='index';;
           </script>";
        return false;
	} elseif ($pict_3 === 4) {
		echo "<script>
             alert('Picture 3 is empety')
             window.location='index';;
           </script>";
        return false;
	} elseif ($pict_4 === 4){
		echo "<script>
             alert('Picture 4 is empety')
             window.location='index';;
           </script>";
        return false;
	} elseif ($pict_5 === 4) {
		echo "<script>
             alert('Picture 5 is empety')
             window.location='index';;
           </script>";
        return false;
	} elseif ($your_pict === 4) {
		echo "<script>
             alert('Your picture is empety')
             window.location='index';;
           </script>";
        return false;
	}

	// cek ekstensi
	$ekstensi_valid = ['jpg', 'jpeg', 'png'];

	// ekstensi pict 1
	$ekstensi_pict_1 = explode('.', $pict_1['name']);
	$ekstensi_pict_1 = strtolower(end($ekstensi_pict_1));

	if ( !in_array($ekstensi_pict_1, $ekstensi_valid) ) {
		echo "<script>
             alert('Only accept picture')
             window.location='index';;
           </script>";
	}

	if ($pict_1['size'] === 1000000) {
		echo "<script>
             alert('Size to big for picture 1');
             window.location='index';
           </script>";
	}

	$name_file_1 = uniqid();
	$name_file_1 .= '.';
	$name_file_1 .=  $ekstensi_pict_1;
	move_uploaded_file($pict_1['tmp_name'], 'img/guest/' . $name_file_1);
	

	// ekstensi pict 2
	$ekstensi_pict_2 = explode('.', $pict_2['name']);
	$ekstensi_pict_2 = strtolower(end($ekstensi_pict_2));

	if ( !in_array($ekstensi_pict_2, $ekstensi_valid) ) {
		echo "<script>
             alert('Only accept picture')
             window.location='index';;
           </script>";
	}

	if ($pict_2['size'] === 1000000) {
		echo "<script>
             alert('Size to big for picture 2');
             window.location='index';
           </script>";
	}

	$name_file_2 = uniqid();
	$name_file_2 .= '.';
	$name_file_2 .=  $ekstensi_pict_2;
	move_uploaded_file($pict_2['tmp_name'], 'img/guest/' . $name_file_2);

	// ekstensi pict 3
	$ekstensi_pict_3 = explode('.', $pict_3['name']);
	$ekstensi_pict_3 = strtolower(end($ekstensi_pict_3));

	if ( !in_array($ekstensi_pict_3, $ekstensi_valid) ) {
		echo "<script>
             alert('Only accept picture')
             window.location='index';;
           </script>";
	}

	if ($pict_3['size'] === 1000000) {
		echo "<script>
             alert('Size to big for picture 3');
             window.location='index';
           </script>";
	}

	$name_file_3 = uniqid();
	$name_file_3 .= '.';
	$name_file_3 .=  $ekstensi_pict_3;
	move_uploaded_file($pict_3['tmp_name'], 'img/guest/' . $name_file_3);

	// ekstensi pict 4
	$ekstensi_pict_4 = explode('.', $pict_4['name']);
	$ekstensi_pict_4 = strtolower(end($ekstensi_pict_4));

	if ( !in_array($ekstensi_pict_4, $ekstensi_valid) ) {
		echo "<script>
             alert('Only accept picture')
             window.location='index';;
           </script>";
	}

	if ($pict_4['size'] === 1000000) {
		echo "<script>
             alert('Size to big for picture 4');
             window.location='index';
           </script>";
	}

	$name_file_4 = uniqid();
	$name_file_4 .= '.';
	$name_file_4 .=  $ekstensi_pict_1;
	move_uploaded_file($pict_4['tmp_name'], 'img/guest/' . $name_file_4);

	// ekstensi pict 1
	$ekstensi_pict_5 = explode('.', $pict_5['name']);
	$ekstensi_pict_5 = strtolower(end($ekstensi_pict_5));

	if ( !in_array($ekstensi_pict_5, $ekstensi_valid) ) {
		echo "<script>
             alert('Only accept picture')
             window.location='index';;
           </script>";
	}

	if ($pict_5['size'] === 1000000) {
		echo "<script>
             alert('Size to big for picture 5');
             window.location='index';
           </script>";
	}

	$name_file_5 = uniqid();
	$name_file_5 .= '.';
	$name_file_5 .=  $ekstensi_pict_1;
	move_uploaded_file($pict_5['tmp_name'], 'img/guest/' . $name_file_5);

	// ekstensi pict 1
	$ekstensi_your_pict = explode('.', $your_pict['name']);
	$ekstensi_your_pict = strtolower(end($ekstensi_your_pict));

	if ( !in_array($ekstensi_your_pict, $ekstensi_valid) ) {
		echo "<script>
             alert('Only accept picture')
             window.location='index';;
           </script>";
	}

	if ($your_pict['size'] === 1000000) {
		echo "<script>
             alert('Size to big for your picture');
             window.location='index';
           </script>";
	}

	$name_file_your_pict = uniqid();
	$name_file_your_pict .= '.';
	$name_file_your_pict .=  $ekstensi_your_pict;
	move_uploaded_file($your_pict['tmp_name'], 'img/guest/' . $name_file_your_pict);

	// insert ke database;
	$nama = htmlspecialchars($data['name']);
	// generate token
	$token = base64_encode(random_bytes(5));
	$token = urlencode($token);
	$hoby = htmlspecialchars($data['hobbys']);
	$about = htmlspecialchars($data['about_me']);
	$waktu = time();

	mysqli_query($con, "
		INSERT INTO porto VALUES(
			'', '$nama', '$token', '$hoby', '$about', '$name_file_1', '$name_file_2', '$name_file_3', '$name_file_4', '$name_file_5', '$name_file_your_pict', '$waktu'
		)
	");
	return mysqli_affected_rows($con);
}


 ?>
