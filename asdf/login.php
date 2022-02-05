<?php 
require '098/koneksi_databases.php';

$title = 'ABLEN | SISTEM MONITORING ABSEN ONLINE';
$navbar_title = 'SICICAK';

function register($data){

	global $con;
	$email = strtolower(stripcslashes($data['email']));
	$nama = stripcslashes($data['nama']);
	$password = mysqli_real_escape_string($con, $data['password']);
	$password2 = mysqli_real_escape_string($con, $data['password2']);
	$waktu = time();

	// cek email sudah ada atau belum
	$result = mysqli_query($con, "SELECT email FROM user WHERE email = '$email'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
          			alert('Email Sudah Terdaftar');
        		</script>";
       	return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		 echo "<script>
          			alert('konfirmasi password Tidak Sesuai');
        		</script>"; 
        return false;
	}
	// enc password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// insert ke database
	mysqli_query($con, "INSERT INTO user VALUES('', '$email', '$nama', '$password', 'user', '$waktu')");
	return mysqli_affected_rows($con);
}

// function lupa_password($email){
// 	global $con;
// 	// generate token
// 	$token = base64_encode(random_bytes(32));

// 	// input data
// 	$data_users = ['', $email, $token, 'lupa_password', time()];
// 	mysqli_query($con, "INSERT INTO user_tokens VALUES(".$data_users.")");

// 	// cek email di database
// 	$cek_email = mysqli_query($con, "SELECT email FROM user WHERE email = '$email'");

// 	if (mysqli_fetch_assoc($cek_email)) {
// 		ini_set( 'display_errors', 1 );   
// 	    error_reporting( E_ALL );    
// 	    $from = "sicicak@localhost.com";    
// 	    $to = $email;    
// 	    $subject = "Reset Password";    
// 	    $message = '
// 						<h1> Reset Password </h1>
// 						<br><p>Klik link untuk reset passoword anda! </p><a href="'. $_SERVER['HTTP_HOST'] . 'absen/reset_password?email=' . $email . '&token=' .urlencode($token). '">Reset Password</a></br>
// 						<br><b><p>Link ini akan basi dalam 5 menit</br></b></p>';   
// 	    $headers = "From:" . $from;    
// 	    mail($to,$subject,$message, $headers);    
// 	    echo "Pesan email sudah terkirim.";
// 	}

// }
 ?>
 