<?php
session_start();
$s_ID = "";
$s_NAME = "";
$s_ACC = "";
if(isset($_SESSION['login_id'])){$s_ID = $_SESSION['login_id'];}
if(isset($_SESSION['login_name'])){$s_NAME = $_SESSION['login_name'];}
if(isset($_SESSION['login_access'])){$s_ACC = $_SESSION['login_access'];}

if($s_ID==""){
	header("Location: ../index.php");
}//end if
?>