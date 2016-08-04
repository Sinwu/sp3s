<?php
	switch ($_SESSION['login_access']) {
		case 'pelaksana':
			while (($resApp = mysql_fetch_array($getApp))) {
        /*$resApp_arr[] = array(
            'id' => $resApp['id'],
            'user_assign' => $resApp['user_assign'],
            'task_name' => $resApp['task_name'],
            'photo_name' => $resApp['photo_name'],
            'tgl_approved' => $resApp['tgl_approved'],
            'diff' => $resApp['diff']
          );*/
        echo '<li><!-- start message -->';
        echo '<a href="#">';
          echo '<div class="pull-left">';
            echo '<img src="../dist/img/logo.png" class="img-circle" alt="User Image">';
          echo '</div>';
          echo '<h4>';
            echo 'Admin SP3S';
            echo '<small><i class="fa fa-clock-o"></i> '. $resApp['diff'].' hari</small>';
          echo '</h4>';
          echo '<p>'.$resApp['task_name'].' telah diverifikasi.</p>';
        echo '</a>';
        echo '</li><!-- end message -->';
      }
			break;

		case 'admin':
			while (($resApp = mysql_fetch_array($getApp))) {
        /*$resApp_arr[] = array(
            'id' => $resApp['id'],
            'user_assign' => $resApp['user_assign'],
            'task_name' => $resApp['task_name'],
            'photo_name' => $resApp['photo_name'],
            'tgl_approved' => $resApp['tgl_approved'],
            'diff' => $resApp['diff']
          );*/
        echo '<li><!-- start message -->';
        echo '<a href="#">';
          echo '<div class="pull-left">';
            echo '<img src="../dist/img/logo.png" class="img-circle" alt="User Image">';
          echo '</div>';
          echo '<h4>';
            echo 'Admin SP3S';
            echo '<small><i class="fa fa-clock-o"></i> '. $resApp['diff'].' hari</small>';
          echo '</h4>';
          echo '<p>'.$resApp['user_id'].'<br/> menunggu proses verifikasi.</p>';
        echo '</a>';
        echo '</li><!-- end message -->';
      }
			break;
		
		default:
			# code...
			break;
	}
?>