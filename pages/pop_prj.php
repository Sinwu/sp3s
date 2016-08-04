<?php
include "data/api/db.php";

#$user_assign=$_SESSION['login_id'];

// populate menu pilih instansi ~  WHERE user_assign=$user_assign
$proyek=mysql_query("SELECT id,nomor_po,nama_proyek FROM tbl_proyek WHERE user_assign=27");

$proyek_arr = array();

while(($row = mysql_fetch_assoc($proyek))) {
	$proyek_arr[] = array(
		'id' => $row['id'],
		'proyek_id' => $row['nomor_po'],
		'nama_proyek' => $row['nama_proyek']
	);
}

$selectvalue = $_GET['svalue'];

$result = mysql_query("SELECT id,nama_proses FROM tbl_proses WHERE proyek_id=".$selectvalue);

$dataJSON = json_encode($proyek_arr);
#echo $proyek_arr[0]['id'];
print_r($dataJSON);

?>