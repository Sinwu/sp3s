<?php
include "api/db.php";
// us_upload page
$proyekId = $_POST['proyek'];
$prosesId = $_POST['proses'];
$milestoneId = $_POST['milestone'];

$namaAktifitas = mysql_query("SELECT milestone FROM tbl_tahapan_detail WHERE id=$milestoneId");
$namaAktifitas_arr = array();
$row3 = mysql_fetch_array($namaAktifitas);
	$namaAktifitas = $row3['milestone'];

#mysql_data_seek($namaAktifitas, 0);

#print_r($namaAktifitas);

?>