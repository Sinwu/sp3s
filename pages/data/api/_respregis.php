<?php	
	
	require_once '../phpmailer/mail.php';
	//Default variable registrasi
	$user_access="Sekolah";
	$flag_activation = "0";

	if(isset($_REQUEST['userid'])){
		$email = mysql_real_escape_string($_REQUEST['userid']);
	}
	if(isset($_REQUEST['pass'])){
		$pass = mysql_real_escape_string($_REQUEST['pass']);
	}
	// Hash PW
	$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	$saltedpass = $pass . $salt;
	$hashedpass = hash('sha256', $saltedpass);
	
	if(isset($_REQUEST['nama'])){
		$nama = $_REQUEST['nama'];
	}
	if(isset($_REQUEST['npsn'])){
		$npsn = mysql_real_escape_string($_REQUEST['npsn']);
	}
	if(isset($_REQUEST['telp'])){
		$telp = mysql_real_escape_string($_REQUEST['telp']);
	}
	if(isset($_REQUEST['telp2'])){
		$telp2 = mysql_real_escape_string($_REQUEST['telp2']);
	}

	if($email!="" && $pass!="" && $nama!="" && $npsn!="" && $telp!=""){
		$dataEmail=mysql_query("SELECT id from tbl_user where user_id='".$email."'",$conn);
		// Cek email sudah terdaftar atau belum
		if (mysql_num_rows($dataEmail) > 0) {
			$msg = "Email Sudah Terdaftar";
			$status = "NOK";

			$response = (object)array(
				'status' => $status,
				'msg' => $msg,
				'data' => 'ALREADY REGISTERED'
			);
			$regisresponse = json_encode($response);
			print_r($regisresponse);

		} else {
			$email = mysql_real_escape_string($_REQUEST['userid']);
			// Validasi penulisan email
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			 	$msg = "Invalid email format";
			 	$status = "NOK";

			 	$response = (object)array(
					'status' => $status,
					'msg' => $msg,
					'data' => 'INVALID EMAIL FORMAT'
				);
				$regisresponse = json_encode($response);
				print_r($regisresponse);
			} else {

				$insert = mysql_query("INSERT INTO tbl_user (user_id,user_pass,nama,npsn,no_telp,no_telp2,flag_activation,user_access,created_at,salt) 
					values 
					('$email','$hashedpass','$nama','$npsn','$telp','$telp2','$flag_activation','$user_access', now(), '$salt')", $conn) 
					or die('Gagal menyimpan data.');

				$msg = "Registrasi berhasil.";
				$status = "OK";

				$dataUser = (object)array(
					'user_id' => $email,
					'nama' => $nama,
					'npsn' => $npsn,
					'no_telp' => $telp,
					'no_telp2' => $telp2
				);	

				// Include PHPMailer untuk email notification						
				$utilMail = new utilMail;
				$utilMail->sendRegistrationMail($email, $nama);

				// Variabel Response
				$response = (object)array(
					'status' => $status,
					'msg' => $msg,
					'data' => $dataUser
				);
				$regisresponse = json_encode($response);
				print_r($regisresponse);
			}
		}
	} else {
		$msg = "Harap lengkapi form untuk registrasi.";
		$status = "NOK";

		$response = (object)array(
			'status' => $status,
			'msg' => $msg,
			'data' => 'EMPTY FIELD'
		);
		$regisresponse = json_encode($response);
		print_r($regisresponse);
	}

?>