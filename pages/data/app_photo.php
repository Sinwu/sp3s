<?php
include "inc.chksession.php";
include "inc.common.php";

require_once 'phpmailer/mail.php';

$status=$_GET['t'];
$id=$_GET['id'];

include "inc.db.php";
$conn=connect();

$sendMail = new utilMail;

if ($status == 'act') {
	// Aktifasi
	$sql = mysqli_query($conn, "UPDATE tbl_task SET tgl_approved=curdate() ,approved=1 WHERE id='$id'") or die ('Failact');
	// Include PHPMailer untuk email notification						
	#$sendMail -> actMail($userid);
	echo "<script>alert(5)</script>";
	#header('Location: ../redirects/re_act_user1.php?id=0');
	
} else {		
	// Deaktifasi 
	$sql = mysqli_query($conn, "UPDATE tbl_user SET tgl_approved=curdate() ,approved=0 WHERE id='$id'") or die ('Faildeact');
	// Include PHPMailer untuk email notification						
	#$sendMail -> deactMail($userid);
	echo "<script>alert(5)</script>";
	#header('Location: ../redirects/re_act_user1.php?id=1');

}

