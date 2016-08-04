<?php

	if(isset($_REQUEST['proyek_id'])){
		$proyek_id = $_REQUEST['proyek_id'];
	}
	if(isset($_REQUEST['user_assign'])){
		$user_assign_id = $_REQUEST['user_assign'];
	}
	
	$proses = mysql_query("SELECT * FROM tbl_proses WHERE proyek_id='$proyek_id' AND user_assign='$user_assign_id'", $conn) or die('Failed conn.');

	$proses_arr = array();

		while(($row = mysql_fetch_assoc($proses))) {
			$proses_arr[] = (object)array(				
				'proyek_id' => $row['proyek_id'],
				'proses_id' => $row['id'],
				'tahapan' => $row['tahapan'],
				'urutan' => $row['urutan'],
				'user_assign' => $row['user_assign'],
				'prosentase' => $row['prosentase']
			);
		}
		mysql_data_seek($proses, 0);

		$i = 0;
		foreach ($proses_arr as $proses_api) {
			$data_proses[$i] = $proses_api;
			$i++;
		}
		#$data_proses = (object)$data_proses;
		
		$status = 'OK';
		$msg = 'Data proses exist';

		$response = (object)array(
				'status' => $status,
				'msg' => $msg,
				'data' => $data_proses
		);
		$prosesresponse = json_encode($response);
		print_r($prosesresponse);

?>