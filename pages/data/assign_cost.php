<?php
	include "inc.chksession.php";
	include "api/db.php";
	
	$proyek = $_POST['proyek'];
	$proses = $_POST['proses'];
	$miletone = $_POST['milestone'];
	$anggaran = $_POST['anggaran'];

	$updateAnggaran = mysql_query("UPDATE tbl_tahapan_detail SET anggaran=$anggaran WHERE id=$miletone AND proses_id=$proses");

	header("url=home.php");
	
?>