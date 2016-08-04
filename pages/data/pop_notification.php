<?php
include 'api/db.php';

$access = $_SESSION['login_access'];
$uid = $_SESSION['login_id'];
switch ($access) {
	case 'pelaksana':
		$getApp = mysql_query("SELECT id, user_assign, task_name, photo_name, photo_filepath, tgl_approved, approved, datediff(curdate(),tgl_upload) as diff FROM tbl_task WHERE approved=1 AND user_assign=$uid LIMIT 4");
		$countNotif = mysql_num_rows($getApp);
		break;

	case 'admin':
		$getApp = mysql_query("SELECT id, user_id, datediff(curdate(),created_at) as diff FROM tbl_user WHERE flag_activation=0 AND user_access!='admin' LIMIT 4");
		$countNotif = mysql_num_rows($getApp);
		break;
	
	default:
		# code...
		break;
}

/*
while (($resApp = mysql_fetch_array($getApp))) {
	$resApp_arr[] = array(
			'id' => $resApp['id'],
			'user_assign' => $resApp['user_assign'],
			'task_name' => $resApp['task_name'],
			'photo_name' => $resApp['photo_name'],
			'tgl_approved' => $resApp['tgl_approved'],
			'diff' => $resApp['diff']
		);
	echo '<li><!-- start message -->';
  echo '<a href="#">';
    echo '<div class="pull-left">';
      echo '<img src="../../dist/img/logo.png" class="img-circle" alt="User Image">';
    echo '</div>';
    echo '<h4>';
      echo 'Admin SP3S';
      echo '<small><i class="fa fa-clock-o"></i> '. $resApp['diff'].' days</small>';
    echo '</h4>';
    echo '<p>'.$resApp['task_name'].'</p>';
  echo '</a>';
	echo '</li><!-- end message -->';
}
*/

#print_r($resApp_arr);

?>