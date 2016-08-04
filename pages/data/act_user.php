<?php
include "inc.chksession.php";
include "inc.common.php";

require_once 'phpmailer/mail.php';

$status=$_GET['t'];
$userid=$_GET['id'];

include "inc.db.php";
$conn=connect();

$sendMail = new utilMail;

if ($status == 'act') {
	// Aktifasi
	$sql = mysqli_query($conn, "UPDATE tbl_user SET flag_activation=1 WHERE user_id='$userid'") or die ('Fail');
	// Include PHPMailer untuk email notification						
	$sendMail -> actMail($userid);
	
	header('Location: ../redirects/re_act_user1.php?id=0');
	
} else {		
	// Deaktifasi 
	$sql = mysqli_query($conn, "UPDATE tbl_user SET flag_activation=0 WHERE user_id='$userid'") or die ('Fail');
	// Include PHPMailer untuk email notification						
	$sendMail -> deactMail($userid);

	header('Location: ../redirects/re_act_user1.php?id=1');

}

