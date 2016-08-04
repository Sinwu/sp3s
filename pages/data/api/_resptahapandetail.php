<?php

	if(isset($_REQUEST['proses_id'])){
		$proses_id = $_REQUEST['proses_id'];
	}
	if(isset($_REQUEST['user_assign'])){
		$user_assign_id = $_REQUEST['user_assign'];
	}
	
	$tahapan = mysql_query("SELECT * FROM tbl_tahapan_detail WHERE proses_id='$proses_id' AND user_assign='$user_assign_id'", $conn) or die('Failed conn.');

	$tahapan_arr = array();

		while(($row = mysql_fetch_assoc($tahapan))) {
			$tahapan_arr[] = (object)array(				
				'proses_id' => $row['proses_id'],
				'tahapan_detail_id' => $row['id'],
				'milestone' => $row['milestone'],
				'prosentase' => $row['prosentase']
			);
		}
		mysql_data_seek($tahapan, 0);

		$i = 0;
		foreach ($tahapan_arr as $tahapan_api) {
			$data_tahapan[$i] = $tahapan_api;
			$i++;
		}
		#$data_tahapan = (object)$data_tahapan;
		
		$status = 'OK';
		$msg = 'Data tahapan exist';

		$response = (object)array(
				'status' => $status,
				'msg' => $msg,
				'data' => $data_tahapan
		);
		$tahapanresponse = json_encode($response);
		print_r($tahapanresponse);

?>