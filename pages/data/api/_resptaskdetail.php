<?php

  if(isset($_REQUEST['tahapan_detail_id'])){
    $tahapan_detail_id = $_REQUEST['tahapan_detail_id'];
  }
  if(isset($_REQUEST['user_assign'])){
    $user_assign = $_REQUEST['user_assign'];
  }
  if(isset($_REQUEST['task_name'])){
    $task_name = $_REQUEST['task_name'];
  }
  if(isset($_REQUEST['description'])){
    $desc = $_REQUEST['description'];
  }
  if(isset($_REQUEST['geo_lat'])){
    $geo_lat = $_REQUEST['geo_lat'];
  }
  if(isset($_REQUEST['geo_long'])){
    $geo_long = $_REQUEST['geo_long'];
  }
  // Default variable when uploading
  $approved = 0;
  $status = '';
  $msg = array();

  if(isset($_FILES['files'])){
  	if($task_name!="" && $user_assign!="" && $desc!="" && $tahapan_detail_id!="" && $geo_lat!="" && $geo_long!=""){
      foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
        $file_name = $key.$_FILES['files']['name'][$key];
        $file_name = strtolower($file_name);
        $file_size =$_FILES['files']['size'][$key];
        $file_tmp =$_FILES['files']['tmp_name'][$key];
        $file_type=$_FILES['files']['type'][$key];  
        if($file_size > 2050000){
          $msg[]='File size must be less than 2 MB';

          // Response
          $response = (object)array(
          'status' => 'NOK',
          'msg' => $msg,
          'data' => ''
          );
          $taskresponse = json_encode($response);
          print_r($taskresponse);
        }   
        
        $year = date("Y");
        $stryear = strval($year);
        $month = date("m");
        $strmonth = strval($month);

        $filepath="user_data"."/".$year."/".$month;
        if(empty($msg)  ==true){
          if(is_dir($filepath)==false){
            mkdir("$filepath", 0700);    // Create directory if it does not exist
          }
          if(is_dir("$filepath/".$file_name)==false){
            move_uploaded_file($file_tmp,"$filepath/".$file_name);
          }else{                  //rename the file if another one exist
            $new_dir="$filepath/".$file_name.time();
            rename($file_tmp,$new_dir) ;        
          }

          echo $filepath;
          // execute query to upload task detail
          #$query = mysql_query("INSERT into tbl_task (tahapan_detail_id, task_name, user_assign, photo_task, photo_size, photo_type, geo_lat, geo_long, approved, description, tgl_upload)
          #	VALUES
          #	('$tahapan_detail_id', '$task_name', '$user_assign', '$file_name','$file_size','$file_type', '$geo_lat', '$geo_long', '$approved', '$desc', now())");      
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

      }
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
	}
?>