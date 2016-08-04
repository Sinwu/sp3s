<?php	
	
	require_once 'pages/data/phpmailer/mail.php';
	require_once 'pages/data/api/db.php';
	//Default variable registrasi
	$user_access="pelaksana";
	$flag_activation = "0";

	if(isset($_REQUEST['email'])){
		$email = mysql_real_escape_string($_REQUEST['email']);
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
	if(isset($_REQUEST['kode_unik'])){
		$unik = mysql_real_escape_string($_REQUEST['kode_unik']);
	}

	if($email!="" && $pass!="" && $nama!="" && $unik!=""){
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
			#print_r($regisresponse);
			header('Location: pages/redirects/re_regis0.php?id=0');
		} else {
			$email = mysql_real_escape_string($_REQUEST['email']);
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
				#print_r($regisresponse);
				header('Location: pages/redirects/re_regis0.php?id=1');
			} else {

				$insert = mysql_query("INSERT INTO tbl_user (user_id,user_pass,nama,flag_activation,user_access,created_at,salt) 
					values 
					('$email','$hashedpass','$nama','$flag_activation','$user_access', now(), '$salt')", $conn) 
					or die('Gagal menyimpan data.');

				$msg = "Registrasi berhasil.";
				$status = "OK";

				$dataUser = (object)array(
					'email' => $email,
					'nama' => $nama,
					'kode_unik' => $unik,
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
				#print_r($regisresponse);
				header('Location: pages/redirects/re_regis1.php');
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
		header('Location: pages/redirects/re_regis0.php?id=3');
	}

?>