<?php
include "inc.chksession.php";
include "api/db.php";
// us_upload page
	$user_assign=$_SESSION['login_id'];
  $tahapan_detail_id = $_GET['milid'];
    
  if(isset($_REQUEST['aktifitas'])) {
    $task_name = $_REQUEST['aktifitas'];
  }

  if (isset($_REQUEST['deskripsi'])) { 	
    $desc = $_REQUEST['deskripsi'];
  }
  if (isset($_REQUEST['biaya'])) {
  	$biaya = $_REQUEST['biaya'];
  }

  /* Resize Function */
  function compress_image($source_url, $destination_url, $quality) {

    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source_url);

    elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source_url);

    elseif ($info['mime'] == 'image/png')
                $image = imagecreatefrompng($source_url);

    imagejpeg($image, $destination_url, $quality);
    return $destination_url;
  }

  // Default variable when uploading
  $approved = 0;
  $status = '';
  $msg = array();
  //validasi form
  if($tahapan_detail_id!="" && $user_assign!="" && $task_name!="" && $biaya!="" && $desc!=""){
  	if(isset($_FILES['aktifitas'])){
      print_r($_FILES);
      foreach($_FILES['aktifitas']['tmp_name'] as $key => $tmp_name ){
        print_r($_FILES);
        $file_name = $key.$_FILES['aktifitas']['name'][$key];
        $file_name = strtolower($file_name);
        $file_size =$_FILES['aktifitas']['size'][$key];
        $file_tmp =$_FILES['aktifitas']['tmp_name'][$key];
        $file_type=$_FILES['aktifitas']['type'][$key];  
        if($file_size > 2097152){
          $msg[]='File size must be less than 2 MB';

          // Response
          $response = (object)array(
          'status' => 'NOK',
          'msg' => $msg,
          'data' => ''
          );
          $taskresponse = json_encode($response);
          print_r($taskresponse);
          header('Location: ../redirects/re_us_prj0.php');
        } else {
        $url = 'destination.jpg';
        $filename = compress_image($_FILES["aktifitas"]["tmp_name"][$key], $url, 80);     
        $getBin = file_get_contents($url);      
         
        $year = date("Y");
        $stryear = strval($year);
        $month = date("m");
        $strmonth = strval($month);

        $filepath="user_data/$stryear/$strmonth/";
        if(empty($msg)  ==true){
          if(is_dir($filepath)==false){
            mkdir("$filepath", 0777, true);    // Create directory if it does not exist
          }
          if(is_dir("$filepath".$file_name)==false){
            file_put_contents($filepath.$file_name, $getBin);
          }else{                  //rename the file if another one exist
            $new_dir="$filepath".$file_name.time();
            rename($file_tmp,$new_dir) ;        
          }

          echo $filepath;

          // execute query to upload task detail
          $query = mysql_query("INSERT into tbl_task (tahapan_detail_id, task_name, user_assign, photo_name, photo_size, photo_type, photo_filepath, approved, description, tgl_upload, biaya)
          	VALUES
          	($tahapan_detail_id, '$task_name', $user_assign, '$file_name','$file_size','$file_type', '$filepath', $approved, '$desc', now(), $biaya)");
          header('Location: ../redirects/re_us_prj1.php');      
        }else{
        	// Response ada error pada upload file
          $msg[] = 'There are some error while uploading data.';
			    $response = (object)array(
			      'status' => 'NOK',
			      'msg' => $msg,
			      'data' => ''
			    );
			    $taskresponse = json_encode($response);
			    print_r($taskresponse);
			    header('Location: ../redirects/re_us_prj0.php');
        }
      }
      } 
      if(empty($msg)){
      	// Response upload success
        $msg[] = 'Upload success.';
        $response = (object)array(
          'status' => 'OK',
          'msg' => $msg,
          'data' => ''
        );
        $taskresponse = json_encode($response);
        print_r($taskresponse);
        header('Location: ../redirects/re_us_prj1.php');
      }
    } else {
	  	// Response jika ada field yg kosong
	    $msg[] = 'Some fields are empty.';
	    $response = (object)array(
	      'status' => 'NOK',
	      'msg' => $msg,
	      'data' => ''
	    );
	    $taskresponse = json_encode($response);
	    print_r($taskresponse);
	    header('Location: ../redirects/re_us_prj0.php');
		}
  } else {
  	// Response jika ada field yg kosong
    $msg[] = 'Some fields are empty.';
    $response = (object)array(
      'status' => 'NOK',
      'msg' => $msg,
      'data' => ''
    );
    $taskresponse = json_encode($response);
    print_r($taskresponse);
    header('Location: ../redirects/re_us_prj0.php');
	}

#mysql_data_seek($namaAktifitas, 0);

#print_r($namaAktifitas);

?>