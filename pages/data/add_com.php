<?php
	include "inc.chksession.php";
	include "api/db.php";
	
	$jenis = $_POST['jenisbarang'];
	$nama = $_POST['namabarang'];
	$satuan = $_POST['satuanbarang'];
	$harga = $_POST['hargabarang'];

	$update = mysql_query("INSERT into components (cat, comp_name, unit, price)
		values ('$jenis','$nama','$satuan','$harga')");

	header("url=home.php");

?>