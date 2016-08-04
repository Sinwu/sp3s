<?php
include "api/db.php";

// populate menu us_prj ~  WHERE user_assign=$user_assign
$listProyekId=mysql_query("SELECT id FROM tbl_proyek");

$listProyekId_arr = array();

while(($row = mysql_fetch_assoc($listProyekId))) {
	$listProyekId_arr[] = $row['id'];
}
#mysql_data_seek($listProyekId, 0);

$listProyekData=mysql_query("SELECT nomor_po,nama_proyek FROM tbl_proyek");

#$listProyekData_arr = array();

while (($row2 = mysql_fetch_assoc($listProyekData))) {
	$listProyekData_arr[] = array (
		'nopo' => $row2['nomor_po'],
		'nama_proyek' => $row2['nama_proyek']
	);
}
#mysql_data_seek($listProyekData, 0);
// end of populate menu us_prj

?>