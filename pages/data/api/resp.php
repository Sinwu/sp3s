<?php 
include 'db.php';

$cmd = $_REQUEST['cmd'];

switch ($cmd) {
	case 'registrasi':
		// INCLUDE FUNGSI REGISTRASI
		include '_respregis.php';
		break;
	case 'login':
		// INCLUDE FUNGSI LOGIN
		include '_resplogin.php';
		break;
	case 'data_proyek':
		// INCLUDE FUNGSI LISTING PROYEK
		include '_respproyek.php';
		break;
	case 'data_proses':
		// INCLUDE FUNGSI LISTING PROSES PROYEK
		include '_respproses.php';
		break;
	case 'data_tahapan_detail':
		// INCLUDE FUNGSI LISTING PROSES PROYEK
		include '_resptahapandetail.php';
		break;
	case 'task_detail':
		// INCLUDE FUNGSI LISTING PROSES PROYEK
		include '_resptaskdetail.php';
		break;
	
	default:
		# code...
		break;
}

?>