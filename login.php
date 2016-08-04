<?php
  include "pages/inc.common.php";
  #include "pages/inc.db.php";
  require_once 'pages/data/api/db.php';

  if(isset($_REQUEST['email'])){
    $email = mysql_real_escape_string($_REQUEST['email']);
  }
  if(isset($_REQUEST['pass'])){
    $pass = mysql_real_escape_string($_REQUEST['pass']);
  }

  if($email!="" && $pass!="") {
    // Jika field email dan password lengkap, lanjut ke validasi:
    $saltquery = "SELECT salt FROM tbl_user where user_id='$email';";
    $result = mysql_query($saltquery);
    $row = mysql_fetch_assoc($result);
    $salt = $row['salt'];
    $saltedpass = $pass . $salt;
    $hashedpass = hash('sha256', $saltedpass);

    $check = mysql_query("SELECT id,user_id,nama,user_access,flag_activation FROM tbl_user WHERE user_id='$email' AND user_pass='$hashedpass'",$conn) or die('Koneksi gagal.');
    $check_arr = mysql_fetch_array($check);

    // Login response
    if (mysql_num_rows($check) == 1 && $check_arr['flag_activation'] == 1) {
      // Validasi account sudah aktif, id dan password benar
      $msg = "Login sukses.";
      $status = "OK";

      $datacheck = (object)array(
        'id' => $check_arr['id'],
        'user_id' => $check_arr['user_id'],
        'nama' => $check_arr['nama'],
        'flag_activation' => $check_arr['flag_activation'],
        'user_access' => $check_arr['user_access']
      );

      $response = (object)array(
        'status' => $status,
        'msg' => $msg,
        'data' => $datacheck
      );
      $loginresponse = json_encode($response);
      #print_r($loginresponse);

      /* Saving to Session */
      session_start();
      $_SESSION['login_id']=$check_arr['id'];
      $_SESSION['login_name']=$check_arr['nama'];
      $_SESSION['login_access']=$check_arr['user_access'];

      /* go to page defined from user_access*/
      if ($_SESSION['login_access'] == "pelaksana") {
        echo "<script>window.location='pages/home_pic.php'</script>";
      } else if ($_SESSION['login_access'] == "admin") {
        echo "<script>window.location='pages/home.php'</script>";
      }
      
    } else if (mysql_num_rows($check) == 1 && $check_arr['flag_activation'] == 0) {
      // Validasi account belum diaktifasi
      $msg = "Account belum teraktifasi.";
      $status = "NOK";

      $response = (object)array(
        'status' => $status,
        'msg' => $msg,
        'data' => 'NOT ACTIVATED'
      );
      $loginresponse = json_encode($response);
      #print_r($loginresponse);
      header('Location: pages/redirects/re_login0.php?id=0');

    } else {
      // Validasi id atau password salah
      $msg = "Masukkan email dan password dengan benar.";
      $status = "NOK";

      $response = (object)array(
        'status' => $status,
        'msg' => $msg,
        'data' => 'WRONG ID PASS'
      );
      $loginresponse = json_encode($response);
      #print_r($loginresponse);
      header('Location: pages/redirects/re_login0.php?id=1');

    }

  } else {
    // Jika field id atau password kurang lengkap
    $msg = "Harap lengkapi email dan password untuk login.";
    $status = "NOK";

    $response = (object)array(
      'status' => $status,
      'msg' => $msg,
      'data' => 'EMPTY FIELD'
    );
    $loginresponse = json_encode($response);
    #print_r($loginresponse);
    header('Location: pages/redirects/re_login0.php?id=2');

  }

?>