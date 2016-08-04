<?php
	
	if(isset($_REQUEST['user_assign'])){
		$user_assign_id = $_REQUEST['user_assign'];
	}
	if(isset($_REQUEST['flag_activation'])){
		$active = $_REQUEST['flag_activation'];
	}
	if(isset($_REQUEST['user_access'])){
		$access = $_REQUEST['user_access'];
	}

	if ($active == 1 AND $access == 'Sekolah') {
		$status = 'OK';
		$msg = 'DATA EXIST';

		$query = mysql_query("SELECT tbl_proyek.*, tbl_user.user_id, tbl_user.nama, tbl_sekolah.nama_sekolah, tbl_sekolah.npsn, tbl_sekolah.nama_pic
			FROM tbl_proyek 
			INNER JOIN tbl_user ON tbl_proyek.user_assign=tbl_user.id 
			LEFT JOIN tbl_sekolah ON tbl_proyek.sekolah_id=tbl_sekolah.id 
			WHERE tbl_user.flag_activation='$active' AND tbl_user.user_access='$access' AND tbl_proyek.user_assign='$user_assign_id'", $conn) or die ('Failed conn.');

		$proyek_arr = array();

		while(($row = mysql_fetch_assoc($query))) {
			$proyek_arr[] = (object)array(
				'proyek_id' => $row['id'],
				'nama_proyek' => $row['nama_proyek'],
				'sekolah_id' => $row['sekolah_id'],
				'nama_sekolah' => $row['nama_sekolah'],
				'npsn' => $row['npsn'],
				'nama_pic' => $row['nama_pic'],
				'user_assign_id' => $row['user_assign'],
				'user_id' => $row['user_id'],
			);
		}
		mysql_data_seek($query, 0);

		$i = 0;
		foreach ($proyek_arr as $proyek_api) {
			$data_proyek[$i] = $proyek_api;
			$i++;
		}
		#$data_proyek = (object)$data_proyek;
		
		$response = (object)array(
				'status' => $status,
				'msg' => $msg,
				'data' => $data_proyek
		);
		$proyekresponse = json_encode($response);
		print_r($proyekresponse);

	} else if ($active == 0 || $access == 'Dinas') {
		// Jika account belum aktif atau access merupakan Dinas
		$status = 'NOK';
		$msg = 'INVALID DATA';

		$response = (object)array(
				'status' => $status,
				'msg' => $msg,
				'data' => 'EMPTY DATA'
		);
		$proyekresponse = json_encode($response);
		print_r($proyekresponse);

	}
	
?>