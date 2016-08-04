<?php

	if(isset($_REQUEST['userid'])){
		$email = mysql_real_escape_string($_REQUEST['userid']);
	}
	if(isset($_REQUEST['pass'])){
		$pass = mysql_real_escape_string($_REQUEST['pass']);
	}

	if($email!="" && $pass!="") {
		// Jika field email dan password lengkap, lanjut ke validasi:
		$saltquery = "SELECT salt FROM tbl_user where user_id='$email';";
		$result = mysql_query($saltquery);
		$row = mysql_fetch_assoc($result);
		$salt = $row['salt'];
		$saltedpass = $pass . $salt;
		$hashedpass = hash('sha256', $saltedpass);

		$check = mysql_query("SELECT user_id FROM tbl_user WHERE user_id='$email' AND user_pass='$hashedpass'",$conn) or die('Login gagal.');
		$check_arr = mysql_fetch_array($check);

		// Login response
		if (mysql_num_rows($check) == 1 && $check_arr['flag_activation'] == 1) {
			// Validasi account sudah aktif, id dan password benar
			$msg = "Login sukses.";
			$status = "OK";

			$datacheck = (object)array(
				'id' => $check_arr['id'],
				'user_id' => $check_arr['user_id'],
				'nama' => $check_arr['nama'],
				'npsn' => $check_arr['npsn'],
				'no_telp' => $check_arr['no_telp'],
				'no_telp2' => $check_arr['no_telp2'],
				'flag_activation' => $check_arr['flag_activation'],
				'user_access' => $check_arr['user_access']
			);

			$response = (object)array(
				'status' => $status,
				'msg' => $msg,
				'data' => $datacheck
			);
			$loginresponse = json_encode($response);
			print_r($loginresponse);
			
		} else if (mysql_num_rows($check) == 1 && $check_arr['flag_activation'] == 0) {
			// Validasi account belum diaktifasi
			$msg = "Account belum teraktifasi.";
			$status = "NOK";

			$response = (object)array(
				'status' => $status,
				'msg' => $msg,
				'data' => 'NOT ACTIVATED'
			);
			$loginresponse = json_encode($response);
			print_r($loginresponse);

		} else {
			// Validasi id atau password salah
			$msg = "Masukkan email dan password dengan benar.";
			$status = "NOK";

			$response = (object)array(
				'status' => $status,
				'msg' => $msg,
				'data' => 'WRONG ID PASS'
			);
			$loginresponse = json_encode($response);
			print_r($loginresponse);
		}

	} else {
		// Jika field id atau password kurang lengkap
		$msg = "Harap lengkapi email dan password untuk login.";
		$status = "NOK";

		$response = (object)array(
			'status' => $status,
			'msg' => $msg,
			'data' => 'EMPTY FIELD'
		);
		$loginresponse = json_encode($response);
		print_r($loginresponse);
	}

?>