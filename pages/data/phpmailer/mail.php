<?php

class utilMail {

	public function sendRegistrationMail ($email, $nama) {
		require 'phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->SMTPDebug = 1;
		$mail->Debugoutput = 'html';
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPSecure = "tls";
		$mail->Port = 587;
		$mail->SMTPAuth = true;

		$mail->Username = "wisnu.ru@gmail.com";
		$mail->Password = "Sapiterbang_281089";
		$mail->setFrom('wisnu.ru@gmail.com', 'Sinwu Ruu');
		$mail->addAddress($email, $nama);

		$mail->Subject = "Registrasi SP3S Depok";
		$mail->msgHTML(
			'<h1>Registrasi Berhasil</h1>
			<p>Account akan segera dapat digunakan setelah dikonfirmasi oleh Admin.</p>'
		    );
		
		if (!$mail->send()) {
		    $status = 'EMAIL GAGAL TERKIRIM';
		    echo $status;
		} else {
		    echo "Email terkirim";
		}
		
	}

	public function actMail ($email) {
		require 'phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->SMTPDebug = 1;
		$mail->Debugoutput = 'html';
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPSecure = "tls";
		$mail->Port = 587;
		$mail->SMTPAuth = true;

		$mail->Username = "wisnu.ru@gmail.com";
		$mail->Password = "Sapiterbang_281089";
		$mail->setFrom('wisnu.ru@gmail.com', 'Sinwu Ruu');
		$mail->addAddress($email, '');

		$mail->Subject = "Deaktifasi Akun SP3S Depok";
		$mail->msgHTML(
			'<h1>Akun Telah di Non-aktifkan</h1>
			<p>Akun anda tidak dapat digunakan untuk kegiatan SP3S.</p>'
		    );
		
		if (!$mail->send()) {
		    $status = 'EMAIL GAGAL TERKIRIM';
		    echo $status;
		} else {
		    echo "Email terkirim";
		}
		
	}

	public function deactMail ($email) {
		require 'phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->SMTPDebug = 1;
		$mail->Debugoutput = 'html';
		$mail->Host = "mail.depok.satunusa.id";
		$mail->SMTPSecure = "tls";
		$mail->Port = 587;
		$mail->SMTPAuth = true;

		$mail->Username = "wisnu.ru@gmail.com";
		$mail->Password = "Sapiterbang_281089";
		$mail->setFrom('wisnu.ru@gmail.com', 'Sinwu Ruu');
		$mail->addAddress($email, '');

		$mail->Subject = "Aktifasi Akun SP3S Depok";
		$mail->msgHTML(
			'<h1>Akun Telah Teraktifasi</h1>
			<p>Akun anda sudah dapat digunakan untuk kegiatan SP3S.</p>'
		    );
		
		if (!$mail->send()) {
		    $status = 'EMAIL GAGAL TERKIRIM';
		    echo $status;
		} else {
		    echo "Email terkirim";
		}
		
	}
}
?>