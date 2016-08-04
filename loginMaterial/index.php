<?php 
include "inc.common.php";
include "inc.db.php";

$u="";
$p="";
$msg="";

if(isset($_POST["u"])){$u=$_POST["u"];}
if(isset($_POST["p"])){$p=$_POST["p"];}
if(isset($_GET["m"])){$msg=$_GET['m'];}


if($u!=""){
  $loggedin=false;

  $sql="select username,userlevel from users where (userid='$u') and userpwd=MD5('$p')";

    $conn = connect() or die($failed_conn);
    $rs = exec_qry($conn,$sql) or die($failed_query);
    if ($row = fetch_row($rs)) {
      session_start();
      if (!isset($_SESSION['s_ID'])) {
          $_SESSION['s_ID'] = $u;
      }
      if (!isset($_SESSION['s_NAME'])) {
          $_SESSION['s_NAME'] = $row[0];
      }
      if (!isset($_SESSION['s_LVL'])) {
          $_SESSION['s_LVL'] = $row[1];
      }
      /*if (!isset($_SESSION['s_ISADMIN'])) {
          $_SESSION['s_ISADMIN'] = $row[4];
      }
      $msg = "Welcome to Site Manager.<br>";
      $title = "Welcome ".$_SESSION['s_NAME'];*/
      $loggedin=true;
    }else{
      $msg="Invalid ID or password.";
    }

    disconnect($conn);
    //if($u=="a"&&$p=="a"){$loggedin=true;session_start();$_SESSION['s_ID']="user";$_SESSION['s_NAME']="Nama User";}else{$msg="Invalid ID or password.";}
  if($loggedin){
    header("Location: home.php");
  }
}
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="loginMaterial/css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="loginMaterial/css/style.css">
    <style type="text/css">
      body {
        background-image: url("City.jpg"); 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
    </style>
  </head>

  <body>

<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form method="POST">
      <div class="input-container">
        <input name="u" type="text" id="Username" required />
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input name="p" type="password" id="Password" required />
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>GO !</span></button>
      </div>
      <!--div class="footer"><a href="#">Forgot your password?</a></div-->
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <!--h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form>
      <div class="input-container">
        <input type="text" id="Username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="textarea" id="name" required="required"/>
        <label for="Your Name">Name</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="textarea" id="name" required="required"/>
        <label for="Your Name">Name</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="textarea" id="name" required="required"/>
        <label for="Your Name">Name</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Next</span></button>
      </div>
    </form-->
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="loginMaterial/js/index.js"></script>
  </body>
</html>
